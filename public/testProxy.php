<?php
if (!empty($_POST['phoneNumber'])) {
    $appId = "1249193970";
    $verifyToken = "";
    $sToken = "";
    $stype = "1";
    $phoneNumber = $_POST['phoneNumber'];
    $phones = preg_split('/\r\n|\r|\n/', $phoneNumber);
    $username = 'lum-customer-hl_c732d13d-zone-static';
    $password = 'bh8s7octoh54';
    $port = 22225;
    $output = [];
    $total_success = 0;
    $total_fail = 0;
    $countries = [
    "us",
    "gb",
    "al",
    "ar",
    "am",
    "au",
    "at",
    "az",
    "bd",
    "by",
    "be",
    "bo",
    "br",
    "bg",
    "ca",
    "cl",
    "cn",
    "co",
    "cr",
    "hr",
    "cy",
    "cz",
    "dk",
    "do",
    "ec",
    "eg",
    "ee",
    "fi",
    "fr",
    "ge",
    "de",
    "gr",
    "gt",
    "hk",
    "hu",
    "is",
    "in",
    "id",
    "ie",
    "im",
    "il",
    "it",
    "jm",
    "jp",
    "jo",
    "kz",
    "kg",
    "la",
    "lv",
    "lt",
    "lu",
    "my",
    "mx",
    "md",
    "nl",
    "nz",
    "no",
    "pe",
    "ph",
    "ru",
    "sa",
    "sg",
    "kr",
    "es",
    "lk",
    "se",
    "ch",
    "tw",
    "tj",
    "th",
    "tr",
    "tm",
    "ua",
    "ae",
    "uz",
    "vn"
    ];
    
    header('content-type:application/json');
    shuffle($phones);
    foreach ($phones as $key => $pn) {
        # code...
        $country = mt_rand(0,75);
        $country = $countries[$country];
        $session = mt_rand()*mt_rand();
        $curl = curl_init(
            "https://os-lgn.hamo.tv/lgn/login/authorize.do?appid=1249193970&callback=https://www.hamo.tv/loading&lang=en-my&dir=ltr#/"
        );
        curl_setopt(
            $curl,
            CURLOPT_PROXY,
            'http://servercountry-US.zproxy.lum-superproxy.io:22225'
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, true);
        curl_setopt(
            $curl,
            CURLOPT_PROXYUSERPWD,
            "$username-country-$country-dns-local-session-$session:$password"
        );
        $regex = "stoken: '[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*'";
        $content = curl_exec($curl);
        
        preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $content, $matches);
        $cookies = implode(';',$matches[1]);
        preg_match_all(
            '/\'[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};\':\"\\|,.<>\/?]*\'/',
            $content,
            $output_array
        );

        $sToken = str_replace("'", '', $output_array[0][0]);
        $ip = "";
        preg_match('/x-hola-ip[: \t\n]+\b(?:(?:2(?:[0-4][0-9]|5[0-5])|[0-1]?[0-9]?[0-9])\.){3}(?:(?:2([0-4][0-9]|5[0-5])|[0-1]?[0-9]?[0-9]))\b/', $content, $output_array);
        $ip = $output_array[0];
        $ip = str_replace("x-hola-ip: ","",$ip);
        // die($sToken);
        $curl = curl_init(
            "https://os-lgn.hamo.tv/lgn/login/sendSms.do?appid=$appId&verifyToken=&stoken=$sToken&stype=$stype&acct=$pn"
        );
        curl_setopt(
            $curl,
            CURLOPT_PROXY,
            'http://servercountry-US.zproxy.lum-superproxy.io:22225'
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Cookie: $cookies"));
        curl_setopt(
            $curl,
            CURLOPT_PROXYUSERPWD,
            "$username-ip-$ip-session-$session:$password"
        );
        $content = curl_exec($curl);
        $ip2 = "";
        preg_match('/x-hola-ip[: \t\n]+\b(?:(?:2(?:[0-4][0-9]|5[0-5])|[0-1]?[0-9]?[0-9])\.){3}(?:(?:2([0-4][0-9]|5[0-5])|[0-1]?[0-9]?[0-9]))\b/', $content, $output_array);
        $ip2 = $output_array[0];
        $ip2 = str_replace("x-hola-ip: ","",$ip2);
        $start = strpos($content,"{");
        $content = substr($content,$start,strlen($content)-$start);
        $content = json_decode($content);

        // if($content->rescode == 2 )
        // {

        //     preg_match('/[A-Z0-9]{256}/', $content->data->cajs, $verifyTokenRaw);
        //     $verifyToken=$verifyTokenRaw[0];
        //     $sToken=$content->sToken;
        //     $curl = curl_init(
        //         "https://os-lgn.hamo.tv/lgn/login/sendSms.do?appid=$appId&verifyToken=$verifyToken&stoken=$sToken&stype=$stype&acct=$pn"
        //     );
        //     curl_setopt(
        //         $curl,
        //         CURLOPT_PROXY,
        //         'http://servercountry-US.zproxy.lum-superproxy.io:22225'
        //     );
        //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        //     curl_setopt($ch, CURLOPT_POST, 1);
        //     curl_setopt($curl, CURLOPT_HEADER, true);
        //     curl_setopt($ch, CURLOPT_HTTPHEADER, array("Cookie: $cookies"));
        //     curl_setopt(
        //         $curl,
        //         CURLOPT_PROXYUSERPWD,
        //         "$username-ip-$ip-session-$session:$password"
        //     );
        //     $content = curl_exec($curl);
        //     $ip2 = "";
        //     preg_match('/x-hola-ip[: \t\n]+\b(?:(?:2(?:[0-4][0-9]|5[0-5])|[0-1]?[0-9]?[0-9])\.){3}(?:(?:2([0-4][0-9]|5[0-5])|[0-1]?[0-9]?[0-9]))\b/', $content, $output_array);
        //     $ip2 = $output_array[0];
        //     $ip2 = str_replace("x-hola-ip: ","",$ip2);
        //     $start = strpos($content,"{");
        //     $content = substr($content,$start,strlen($content)-$start);
        //     $content = json_decode($content);
    
        // }
        if (!empty($content->resmsg)) {
            if ($content->resmsg == "succ") {
                $total_success++;
                $output[]["success"] = [
                    "PhoneNumber" => $pn,
                    "stoken"=>$sToken,
                    "ip" => [$ip,$ip2],
                    "rand" => $session,
                    "Status" => true
                ];
            } else {
                $total_fail++;
                $output[][$content->resmsg] = [
                    "PhoneNumber" => $pn,
                    // "request"=>$content,
                    "stoken"=>$sToken,
                    "ip" => [$ip,$ip2],
                    "Status" => false,
                    "rand" => $session
                ];
            }
        } else {
            $total_fail++;
            $output[][$content->resmsg] = [
                "PhoneNumber" => $pn,
                    "stoken"=>$sToken,
                    "ip" => [$ip,$ip2],
                // "Response"=>$content,
                "Status" => false,
                "rand" => $session
            ];
        }
    }
    $data = [
        "total" => $total_success + $total_fail,
        "success" => $total_success,
        "fail" => $total_fail,
        "resutls" => $output
    ];
    echo json_encode($data);
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