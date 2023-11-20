<?php

//getNameAdmin.php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');

require_once '../config.php';

// Obtenemos el Nombre del usuario

$userid = $_GET['userid'];

$sql = "SELECT nombre FROM usuarios WHERE idusuario = '$userid'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $nombreAdmin = $row['nombre'];
    echo $nombreAdmin;
} else {
    echo "Nombre por defecto";
}

$conn->close();
?>