<?php

//config.php

//Configuración de la Base de datos

$servername = "localhost";
$username = "root";
$password = "";
$base = "sistematintas";

$conn = mysqli_connect($servername, $username, $password, $base);

if (!$conn) {
    echo "Error de conexion a la base de datos". mysqli_connect_error();
}

?>