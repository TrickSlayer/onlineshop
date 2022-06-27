<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div id="block">
        <iframe src="/login" width="100%" height="100%" id="iframe"></iframe>
    </div>

    <script>
        const iframe = $("#iframe");
        iframe.on("load", function() {
            console.log(iframe);
        });
    </script>
</body>

</html>
