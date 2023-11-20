<?php
// register.php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

require_once '../config.php';

// Insertamos en la tabla los datos de usuario

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $rol = $_POST["rol"];

    $sql = "INSERT INTO usuarios (nombre, correo_electronico, password, role) VALUES ('$nombre', '$correo', '$password', '$rol')";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo "Registrado con éxito";
    } else {
        echo "Error";
    }

}

$conn->close();
?>