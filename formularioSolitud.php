<?php
include('conexion.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dni = $_POST['dni'];
    if (!empty($dni)) {
        $query = "SELECT * FROM solicitantes WHERE dni = ?";
        if ($stmt = $conexion->prepare($query)) {
            $stmt->bind_param("s", $dni);  // 's' indica que es una cadena (string)
            $stmt->execute();
            $stmt->store_result(); 
            if ($stmt->num_rows > 0) {
                echo "<p>Indique el codigo del curso que desea solicitar</p>";
                echo "<form action='solicitudes.php' method='post'>";
                echo "<input type='text' placeholder='escriba aquí' name='codigocurso' required>";
                echo "<button type='submit' name='dni' value='$dni'>enviar</button></form>";
            } else {
                header('Location: inscribirSolicitantes.php');
                exit();
            }
            $stmt->close();
        } else {
            echo "Error en la consulta.";
        }
    } else {
        header('Location: index.html');
        exit();
    }
} else {
    header('Location: index.html');
    exit();
}
$conexion->close();
?>
