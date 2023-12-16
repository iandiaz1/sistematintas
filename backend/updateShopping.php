<?php
// updateShopping.php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

require_once '../config.php';

// Actualizamos los datos de la tabla compras

$idcompra = $_POST['idcompra'];
$empresa = $_POST['empresa'];
$contactoEmpresa = $_POST['contacto'];
$producto = $_POST['producto'];
$precio = $_POST['precio'];
$fechacompra = $_POST['fechacompra'];
$cantidad = $_POST['cantidad'];
$totalGastado = $precio * $cantidad;

$sql = "UPDATE compras SET empresa = '$empresa', contacto_empresa = '$contactoEmpresa', producto = '$producto', precio = '$precio', fecha_compra = '$fechacompra', cantidad = '$cantidad', total_gastado = '$totalGastado' WHERE idcompra = $idcompra";

if ($conn->query($sql) === TRUE) {
    echo "Compra actualizada con éxito";
} else {
    echo "Error al actualizar la compra: " . $conn->error;
}

$conn->close();
?>