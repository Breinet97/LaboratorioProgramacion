<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ForUs</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <form action="valUser.php" method="POST">
        <h1>Bienvenidos A nuestra Tienda ForUs</h1>
        <div>
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" placeholder="Ingrese su usuario">
        </div>
        <div>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" placeholder="Ingrese su contraseña">
        </div>
        <div>
            <input type="submit" value="Ingresar">
        </div>
    </form>
</body>
</html>
