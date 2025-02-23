<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Buscar Profesor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="estilos.css">
</head>
<body>
    <div class="container">
        <h1>Buscar Profesor</h1>
        <form action="buscarProfesor.php" method="POST" class="formulario">
            <label for="dni">DNI del Profesor:</label>
            <input type="text" id="dni" name="dni" class="input-text" required>
            <input type="submit" value="Buscar" class="boton">
        </form>
    </div>
</body>
</html>
