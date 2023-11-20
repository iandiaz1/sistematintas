<?php
// access.php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

require_once '../config.php';

// Autentificamos los datos y creamos una Sesión para el usuario hacia el panel de Administración

$response = array();

if (mysqli_connect_error()) {
    $response['status'] = 'error';
    $response['message'] = 'Error en la conexión a la base de datos: ' . mysqli_connect_error();
} else {
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    
    $sql = "SELECT idusuario, password, role FROM usuarios WHERE correo_electronico = '$correo'";
    $result = mysqli_query($conn, $sql);
    
    if ($result === false) {
        $response['status'] = 'error';
        $response['message'] = 'Error en la consulta: ' . mysqli_error($conn);
    } else {
        if ($row = mysqli_fetch_assoc($result)) {
            $hashedPassword = $row['password'];
    
            if (password_verify($password, $hashedPassword)) {
                session_start();
                $userid = $row['idusuario'];
                $_SESSION['userid'] = $userid;

                $role = $row['role'];
                $response['status'] = 'success';
                $response['message'] = 'Acceso permitido';
                $response['role'] = $role;
                $response['userid'] = $userid;
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Credenciales inválidas';
            }
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Credenciales inválidas';
        }
    }

    $conn->close();
}

header('Content-Type: application/json');
echo json_encode($response);
?>