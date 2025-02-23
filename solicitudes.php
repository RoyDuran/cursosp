<?php

include('conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $dni = $_POST['dni'];
    $codigocurso = $_POST['codigocurso'];

    if (!empty($dni) && !empty($codigocurso)) {

        $fechasolicitud = date('Y-m-d'); 
        $admitido = false;
        $query = "INSERT INTO solicitudes (dni, codigocurso, fechasolicitud, admitido) VALUES (?, ?, ?, ?)";
   
        if ($stmt = $conexion->prepare($query)) {
            $stmt->bind_param("ssss", $dni, $codigocurso, $fechasolicitud, $admitido);  // 'ssss' porque todos son cadenas o booleano
            if ($stmt->execute()) {
                echo 'tu solicitud ya está registrada';
                echo "<p><a href='index.html'>volver a inicio</a></p>";
            } else {
                echo "Error al insertar los datos: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error en la preparación de la consulta: " . $conexion->error;
        }
    } else {
        echo "Por favor complete todos los campos.";
    }
} else {
    header('Location: index.html');
    exit();
}
$conexion->close();
?>
