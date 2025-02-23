<?php
// Datos de conexión
$servidor = "localhost"; // Cambia según tu configuración
$usuario = "root";       // Tu usuario de MySQL
$contraseña = "";        // Tu contraseña de MySQL
$base_datos = "cursoscp"; // Nombre de la base de datos

try {
    // Crear una instancia de PDO
    $conexion = new PDO("mysql:host=$servidor;dbname=$base_datos;charset=utf8", $usuario, $contraseña);

    // Configurar el modo de error de PDO a excepciones
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // Manejo de errores
    die("Error en la conexión: " . $e->getMessage());
}
?>
