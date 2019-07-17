<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Echo</title>
    <script src="./bundle.js" ></script>

    <script>
            Echo.channel('chat{{session('chat')}}')
                .listen('SendChatEvent', (e) => {
                    console.log(e);
            });
    </script>
</head>
<body onload="onload">

  <h1> {{session('chat')}} </h1>
</body>
</html>
