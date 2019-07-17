<?php
header('content-type:application/json');

$username = 'lum-customer-hl_97254475-zone-static';
$password = 'gzupzu7mzr9w';
$port = 22225;
$usedAddresses = [];
$sessions = [];
class Mcurl
{
    private $mh;
    private $curl_handlers;
    public $responses = [];
    public function __construct(){
        $this->mh = curl_multi_init();
        $this->curl_handlers = array();
    }
    public function __destruct(){
        curl_multi_close($this->mh);
    }
    public function async_get($curl_options, $handler){
        $curl = curl_init();
        curl_setopt_array($curl, $curl_options);
        $this->async_exec($curl, $handler);
    }
    private function async_exec($curl, $handler){
        $this->curl_handlers[(string)$curl] = $handler;
        curl_multi_add_handle($this->mh, $curl);
    }
    public function run(){
        global $usedAddresses;
        $active = 0;
        $mrc = 0;
        do {
            $mrc = curl_multi_exec($this->mh, $active);
        } while ($mrc == CURLM_CALL_MULTI_PERFORM);
        while ($active && $mrc == CURLM_OK) {
            $mrc = curl_multi_select($this->mh);
            do {
                $mrc = curl_multi_exec($this->mh, $active);
            } while ($mrc == CURLM_CALL_MULTI_PERFORM);
            while ($info = curl_multi_info_read($this->mh)) {
                $curl = $info['handle'];
                $key = (string)$curl;
                $handler = $this->curl_handlers[$key];
                unset($this->curl_handlers[$key]);
                $info = curl_getinfo($curl);
                $http_code = $info['http_code'];
                $content = curl_multi_getcontent($curl);
                // $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
                // $header = substr($response, 0, $header_size);
                // var_dump($info);
                // var_dump($content);
                $ip = "";
                preg_match('/x-hola-ip[: \t\n]+\b(?:(?:2(?:[0-4][0-9]|5[0-5])|[0-1]?[0-9]?[0-9])\.){3}(?:(?:2([0-4][0-9]|5[0-5])|[0-1]?[0-9]?[0-9]))\b/', $content, $output_array);
                $ip = $output_array[0];
                
                $ip = str_replace("x-hola-ip: ","",$ip);
                $usedAddresses[] = $ip;
                $this->responses[] = $content;
                // echo $content;
                //echo "http_code:$http_code curl:$curl content: $content\n";
                $handler($http_code, $content);
                curl_multi_remove_handle($this->mh, $curl);
                curl_close($curl);
            }
        }
    }
};

class LoginPage
{
    public $super_proxy;
    public $session_id;
    public $fail_count;
    public $n_req_for_exit_node;
    public $mcurl;
    private $proxy, $auth;
    public $response;

    public function __construct($mcurl)
    {
        $this->session_id = "";
        $this->fail_count = 0;
        $this->n_req_for_exit_node = 0;
        $this->mcurl = $mcurl;
        $this->switch_session_id();
    }
    private function switch_session_id(){
        $this->session_id = mt_rand();
        #echo "switched session ID to: ".$this->session_id."\n\n";
        $this->n_req_for_exit_node = 0;
        $this->update_super_proxy();
    }
    private function update_super_proxy(){
        global $port, $username, $password;
        $this->fail_count = 0;
        $super_proxy = gethostbyname("session-glob_".$this->session_id."-servercountry-CN.zproxy.lum-superproxy.io");
        $this->proxy = "http://".$super_proxy.":$port";
        $this->auth = "$username-session-glob_".$this->session_id.":$password";
    }
    private function have_good_super_proxy(){
        global $max_failures;
        return $this->fail_count < $max_failures;
    }
    private function make_request(){
        $curl_options = array(
            CURLOPT_URL => 'https://os-lgn.hamo.tv/lgn/login/authorize.do?appid=1249193970&callback=https://www.hamo.tv/loading&lang=en-my&dir=ltr#/',
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HEADER => 1,
            CURLOPT_PROXY => $this->proxy,
            CURLOPT_PROXYUSERPWD => $this->auth,
        );
        $client = $this;
        
        $handler = function($http_code, $content) use ($client){
            global $sessions;
            $sessions[] = $client->session_id;
            $client->handle_response($http_code, $content); 
        };
        
        $this->mcurl->async_get($curl_options, $handler);
    }
    private function handle_response($http_code, $content){
        if ($this->should_switch_exit_node($http_code, $content)){
           $this->switch_session_id();
           $this->fail_count++;
           $this->run_next();
        }else{
            // success or other client/website error like 404...
            // echo "$content\n";
            $this->n_req_for_exit_node++;
            $this->fail_count = 0;
            $this->run();
        }
    }
    private function should_switch_exit_node($http_code, $content){
        return $content=="" ||
            $this->status_code_requires_exit_node_switch($http_code);
    }
    private function status_code_requires_exit_node_switch($code){
        if (!$code) // curl_multi timed out or failed
            return true;
        return $code==403 || $code==429 || $code==502 || $code==503;
    }
    private function run_next(){
        global $switch_ip_every_n_req;
        if (!$this->have_good_super_proxy()){
            $this->switch_session_id();
            return;
        }
        if ($this->n_req_for_exit_node == $switch_ip_every_n_req)
            $this->switch_session_id();
        $this->make_request();
    }
    public function run(){
        global $n_total_req, $at_req;
        if ($at_req++ < $n_total_req){
            $this->run_next();
        }
    }
};

class CallPage
{
    public $super_proxy;
    public $session_id;
    public $fail_count;
    public $n_req_for_exit_node;
    public $mcurl;
    private $proxy, $auth,$url;
    public $response;

    public function __construct($mcurl,$url)
    {
        $this->session_id = "";
        $this->url = $url;
        $this->fail_count = 0;
        $this->n_req_for_exit_node = 0;
        $this->mcurl = $mcurl;
        $this->switch_session_id();
    }
    private function switch_session_id(){
        $this->session_id = mt_rand();
        #echo "switched session ID to: ".$this->session_id."\n\n";
        $this->n_req_for_exit_node = 0;
        $this->update_super_proxy();
    }
    private function update_super_proxy(){
        global $port, $username, $password;
        $this->fail_count = 0;
        $super_proxy = gethostbyname("session-glob_".$this->session_id."-servercountry-CN.zproxy.lum-superproxy.io");
        $this->proxy = "http://".$super_proxy.":$port";
        $this->auth = "$username-session-glob_".$this->session_id.":$password";
    }
    private function have_good_super_proxy(){
        global $max_failures;
        return $this->fail_count < $max_failures;
    }
    private function make_request(){
        $curl_options = array(
            CURLOPT_URL => $this->url,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HEADER => 1,
            CURLOPT_PROXY => $this->proxy,
            CURLOPT_PROXYUSERPWD => $this->auth,
        );
        $client = $this;
        $handler = function($http_code, $content) use ($client){
            $client->handle_response($http_code, $content); 
        };
        $this->mcurl->async_get($curl_options, $handler);
    }
    private function handle_response($http_code, $content){
        if ($this->should_switch_exit_node($http_code, $content)){
           $this->switch_session_id();
           $this->fail_count++;
           $this->run_next();
        }else{
            // success or other client/website error like 404...
            // echo "$content\n";
            $this->n_req_for_exit_node++;
            $this->fail_count = 0;
            $this->run();
        }
    }
    private function should_switch_exit_node($http_code, $content){
        return $content=="" ||
            $this->status_code_requires_exit_node_switch($http_code);
    }
    private function status_code_requires_exit_node_switch($code){
        if (!$code) // curl_multi timed out or failed
            return true;
        return $code==403 || $code==429 || $code==502 || $code==503;
    }
    private function run_next(){
        global $switch_ip_every_n_req,$sessions;
        // if (!$this->have_good_super_proxy()){
        //     $this->switch_session_id();
        //     return;
        // }
        // if ($this->n_req_for_exit_node == $switch_ip_every_n_req)
        //     $this->switch_session_id();
        $this->have_good_super_proxy();
        $this->make_request();
    }
    public function run(){
        global $n_total_req, $at_req;
        if ($at_req++ < $n_total_req){
            $this->run_next();
        }
    }
};

$pn = [
    0 => "0015632774536"
];
$mcurl1 = new Mcurl();
$mcurl2 = new Mcurl();

$appId = "1249193970";
$stype = "1";

$max_failures = 1;
$n_parallel_exit_nodes = 10;
$n_total_req = count($pn);
$switch_ip_every_n_req = 1;
$at_req = 0;

for ($i=0; $i<$n_parallel_exit_nodes; ++$i){
    $client = new LoginPage($mcurl1);
    $client->run();
}

$mcurl1->run();
$sToken = [];

foreach ($mcurl1->responses as $request) {
    # code...
    $output_array = null;
    preg_match_all(
        '/\'[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};\':\"\\|,.<>\/?]*\'/',
        $request,
        $output_array
    );
    $sToken[] = str_replace("'", '', $output_array[0][0]);
}
$max_failures = 1;
$n_parallel_exit_nodes = 10;
$n_total_req = count($pn);
$switch_ip_every_n_req = 1;
$at_req = 0;
$total_success = 0;
$total_fail = 0;
foreach ($sToken as $x => $value) {
    if(!empty($pn[$x]))
    {
        $client = new CallPage($mcurl2,"https://os-lgn.hamo.tv/lgn/login/sendSms.do?appid=$appId&verifyToken=&stoken=$value&stype=$stype&acct=".$pn[$x]);
        $client->session_id = $sessions[$x];
        $client->run();
    }
}
$mcurl2->run();
$results = [];
foreach ($mcurl2->responses as $key => $value) {
    # code...
    $results[] = json_decode($value);
}
$output=[];
foreach ($results as $x=>$result) {
    if ($result->resmsg == "succ") {
        $total_success++;
        $output[]["success"] = [
            "PhoneNumber" => $pn[$x],
            "Status" => true
        ];
    } else {
        $total_fail++;
        $output[][$result->resmsg] = [
            "PhoneNumber" => $pn[$x],
            "Status" => false,
        ];
    }
}
$data = [
    "total" => $total_success + $total_fail,
    "used_ips" => $usedAddresses,
    "success" => $total_success,
    "fail" => $total_fail,
    "resutls" => $output
];
echo json_encode($data);
?>