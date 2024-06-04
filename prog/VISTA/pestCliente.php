<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pestaña Cliente</title>
</head>
<body>
    <form action="valClient.php" method="post">     
        <h2>Datos del Cliente</h2>
        <label for="nombreCompleto">Nombre Completo:</label>
        <input type="text" name="nombreCompleto" id="nombreCompleto" required>
        <br>
        <label for="tipoDocumento">Tipo de Documento:</label><br>
        <select id="tipoDocumento" name="tipoDocumento" required>
            <option value="CC">Cédula de Ciudadanía</option>
            <option value="Carnet de Extranjería">Carnet de Extranjería</option>
            <option value="NIT">NIT</option>
            <option value="TI">Tarjeta de Identidad</option>
        </select><br><br>
        <label for="numeroDocumento">Número Documento:</label>
        <input type="text" name="numeroDocumento" id="numeroDocumento" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="telefono">Teléfono:</label>
        <input type="tel" name="telefono" id="telefono" required>
        <br>
        <input type="submit" value="Validar Cliente">
    </form>
</body>
</html>
