<?php
// updateShopping.php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

require_once '../config.php';

// Actualizamos los datos de la tabla compras

$idcompra = $_POST['idcompra'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$producto = $_POST['producto'];
$precio = $_POST['precio']; 
$fechacompra = $_POST['fechacompra'];
$cantidad = $_POST['cantidad'];

$sql = "UPDATE compras SET nombre_proveedor = '$nombre', apellido = '$apellido', telefono = '$telefono', producto = '$producto', precio = '$precio', fecha_compra = '$fechacompra', cantidad = '$cantidad' WHERE idcompra = $idcompra";

if ($conn->query($sql) === TRUE) {
    echo "Compra actualizada con éxito";
} else {
    echo "Error al actualizar la compra: " . $conn->error;
}

$conn->close();
?>