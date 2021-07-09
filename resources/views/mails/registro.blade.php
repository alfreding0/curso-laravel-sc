<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Gracias por registrarse</h1>
    <h2>Sus datos son:</h2>
    <p>Nombre: {{ $persona->nombre }}</p>
    <p>Correo: {{ $persona->correo }}</p>
    <p>Teléfono: {{ $persona->telefono }}</p>
</body>
</html>
