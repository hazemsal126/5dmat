<?php
require 'vendor/autoload.php';
if (!empty($_POST['phoneNumber'])) {
    $client = new GuzzleHttp\Client();
    $appId = "1249193970";
    $verifyToken = "";
    $stype = "1";
    $phoneNumber = $_POST['phoneNumber'];
    $phones = preg_split('/\r\n|\r|\n/', $phoneNumber);
    $username = 'lum-customer-hl_97254475-zone-static';
    $password = 'gzupzu7mzr9w';
    $port = 22225;
    $output = [];
    $total_success = 0;
    $total_fail = 0;
    $sToken=[];
    header('content-type:application/json');

    $promises = [];

    foreach ($phones as $pn) {
        $session = mt_rand();
        $password = "$username-session-$session:$password";
        $proxy = "https://$password@zproxy.lum-superproxy.io:22225";
        $promises[] = $client->requestAsync('GET', 'https://os-lgn.hamo.tv/lgn/login/authorize.do?appid=1249193970&callback=https://www.hamo.tv/loading&lang=en-my&dir=ltr#/',
        ["proxy"=>$proxy]);
        
    }
        

    GuzzleHttpPromiseall($promises)->then(function (array $responses) {
        foreach ($responses as $x=>$response) {
            $profile = json_decode($response->getBody(), true);
            $regex = "stoken: '[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*'";
            $content = curl_exec($curl);
            preg_match_all(
                '/\'[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};\':\"\\|,.<>\/?]*\'/',
                $content,
                $output_array
            );
            $sToken[$x] = str_replace("'", '', $output_array[0][0]);
            // Do something with the profile.
        }
    })->wait();
    var_dump($sToken);

    // foreach ($phones as $key => $pn) {
    //     # code...
    //     $proxy = "http://username:password@192.168.16.1:10";
    //     $curl = curl_init(
    //         "https://os-lgn.hamo.tv/lgn/login/authorize.do?appid=1249193970&callback=https://www.hamo.tv/loading&lang=en-my&dir=ltr#/"
    //     );

    //     curl_setopt(
    //         $curl,
    //         CURLOPT_PROXY,
    //         'http://zproxy.lum-superproxy.io:22225'
    //     );
    //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt(
    //         $curl,
    //         CURLOPT_PROXYUSERPWD,
    //         "$username-session-$session:$password"
    //     );
    //     $regex = "stoken: '[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*'";
    //     $content = curl_exec($curl);
    //     preg_match_all(
    //         '/\'[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};\':\"\\|,.<>\/?]*\'/',
    //         $content,
    //         $output_array
    //     );

    //     $sToken = str_replace("'", '', $output_array[0][0]);
    //     // die($sToken);
    //     $curl = curl_init(
    //         "https://os-lgn.hamo.tv/lgn/login/sendSms.do?appid=$appId&verifyToken=&stoken=$sToken&stype=$stype&acct=$pn"
    //     );
    //     curl_setopt(
    //         $curl,
    //         CURLOPT_PROXY,
    //         'http://zproxy.lum-superproxy.io:22225'
    //     );
    //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt(
    //         $curl,
    //         CURLOPT_PROXYUSERPWD,
    //         "$username-session-$session:$password"
    //     );
    //     $content = curl_exec($curl);
    //     $content = json_decode($content);
    //     if (!empty($content->resmsg)) {
    //         if ($content->resmsg == "succ") {
    //             $total_success++;
    //             $output[] = ["PhoneNumber" => $pn, "Status" => true];
    //         } else {
    //             $total_fail++;
    //             $output[] = ["PhoneNumber" => $pn, "Status" => false];
    //         }
    //     } else {
    //         $total_fail++;
    //         $output[] = ["PhoneNumber" => $pn, "Status" => false];
    //     }
    // }
    // $data = [
    //     "total" => $total_success + $total_fail,
    //     "success" => $total_success,
    //     "fail" => $total_fail,
    //     "resutls" => $output
    // ];
    // echo json_encode($data);
    die();
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="testProxy.php" method="post">
        <textarea name="phoneNumber"  cols="30" rows="10"></textarea>
        <button type="submit">Test</button>
    </form>
</body>
</html>