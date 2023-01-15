<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Un usuario quiere trabajar con nosotros</h1>
        <h2>Datos de usuario: </h2>
        <p>Nombre: {{ $user->name }} </p>
        <p>Email: {{ $user->email }} </p>
        <p>Si quieres que sea parte del equipo, pulse aqui: </p>
        <a href="{{ route('revisor.make',$user) }}">Aceptar solicitud</a>
    </div>
</body>
</html>