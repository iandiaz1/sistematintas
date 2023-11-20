<?php
// logout.php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');

require_once '../config.php';

// Destruimos la sesión para salir del Panel de Administracíon

session_start();

$_SESSION = array();

session_destroy();

$response = array(
    'status' => 'success',
    'message' => 'Logout successful',
);

echo json_encode($response);

?>