<?php

// registerProvider.php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

require_once '../config.php';

// Registramos la compra hecha al proveedor

$resultado = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $producto = $_POST['producto'];
    $precio = $_POST['precio']; 
    $cantidad = $_POST['cantidad'];
    $fechaCompra = $_POST['fechacompra'];

    $sql = "INSERT INTO compras (nombre_proveedor, apellido, telefono, producto, precio, cantidad, fecha_compra) VALUES ('$nombre', '$apellido', '$telefono', '$producto', '$precio', '$cantidad', '$fechaCompra')";

    if ($conn->query($sql) === TRUE) {
        $resultado = "Compra registrada con éxito";
    } else {
        $resultado = "Error al registrar compra: " . $conn->error;
    }
}

echo json_encode(array("message" => $resultado));

$conn->close();
?>