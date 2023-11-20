<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

require_once '../config.php';

// Registramos los datos del cliente en la tabla 

$resultado = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userid = $_POST['userid']; 
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $descripcion = $_POST['descripcion'];
    $costo_revision = $_POST['costorevision'];
    $estado = $_POST['estado'];
    $fecha_recibo = $_POST['fecharecibo'];
    $direccion = $_POST['direccion'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $color = $_POST['color'];

    $sql = "INSERT INTO clientes (id_user, nombre, email, telefono, direccion, marca, modelo, color, descripcion, costo_revision, estado, fecha_recibo) 
            VALUES ('$userid', '$nombre', '$email', '$telefono', '$direccion', '$marca', '$modelo', '$color', '$descripcion', '$costo_revision', '$estado', '$fecha_recibo')";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        $resultado = "Registrado con éxito";
    } else {
        $resultado = "Error: " . mysqli_error($conn);
    }
}

echo $resultado;

$conn->close();
?>
