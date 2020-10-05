<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje Recibido</title>
</head>
<body>
    <p>Recibiste un mensaje de: {{$msg['name']}} - {{$msg['email']}}</p>
    <p><strong>Asunto:</strong>{{$msg['affair']}}</p>
    <p><strong>Mensaje:</strong>{{$msg['message']}}</p>
</body>
</html>
