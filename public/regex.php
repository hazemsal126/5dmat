<?php
if (!empty($_POST['phoneNumber'])) {
    preg_match_all('/\d{8,20}/', $_POST['phoneNumber'], $output_array);
    // var_dump($output_array);
    foreach ($output_array[0] as $key => $value) {
        # code...
        echo "$value<br/>";
    }
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
    <form action="regex.php" method="post">
        <textarea name="phoneNumber"  cols="30" rows="10"></textarea>
        <button type="submit">Test</button>
    </form>
</body>
</html>