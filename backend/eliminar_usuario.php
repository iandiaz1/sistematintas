<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: POST');

require_once '../config.php';

// Eliminamos a un Empleado o Técnico de la base de datos desde el usuario Admnistrador

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idusuario = $_POST['idusuario'];
    $sqlEliminar = "DELETE FROM usuarios WHERE idusuario = $idusuario";
    $resultadoEliminar = mysqli_query($conn, $sqlEliminar);

    if ($resultadoEliminar) {
        echo "Empleado eliminado correctamente.";
    } else {
        echo "Error al eliminar usuario: " . mysqli_error($conn);
    }
}

$conn->close();

?>
