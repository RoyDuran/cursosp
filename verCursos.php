<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos Disponibles</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="container">
        <h1>Cursos Disponibles</h1>
        <?php
        require 'conexion.php';
        try {
            $consulta = "SELECT * FROM `cursos` WHERE plazoinscripcion < CURRENT_DATE() AND abierto = true";
            $stmt = $conexion->prepare($consulta);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Verificar si hay resultados
            if (!empty($resultados)) {
                echo "<table class='tabla-cursos'>";
                echo "<tr>";
                // Mostrar encabezados de tabla (los nombres de las columnas)
                foreach (array_keys($resultados[0]) as $columna) {
                    echo "<th>" . htmlspecialchars($columna) . "</th>";
                }
                echo "</tr>";
                // Mostrar los datos de cada fila
                foreach ($resultados as $fila) {
                    echo "<tr>";
                    foreach ($fila as $valor) {
                        echo "<td>" . htmlspecialchars($valor) . "</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p class='mensaje-error'>No se encontraron resultados.</p>";
            }
        } catch (PDOException $e) {
            echo "<p class='mensaje-error'>Error en la conexión: " . htmlspecialchars($e->getMessage()) . "</p>";
        }
        ?>
    </div>
</body>
</html>
