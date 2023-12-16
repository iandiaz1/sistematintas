<?php

// registerProvider.php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

require_once '../config.php';

// Registramos la Venta Realizada

$resultado = "";	

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST['codigo'];
    $cliente = $_POST['cliente'];
    $numero = $_POST['numero'];
    $comprobante = $_POST['comprobante'];
    $fechaVenta = $_POST['fechaventa'];
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    $precioCompra = $_POST['preciocompra'];
    $precioVenta = $_POST['precioventa'];
    $fechaVencimiento = $_POST['fechavencimiento'];
    $subTotal = $_POST['subtotal'];
    $descuento = $_POST['descuento'];
    $total = $_POST['total'];
    $clave = $_POST['clave'];
    
    $sql = "INSERT INTO ventas (codigo, cliente, fecha_venta, comprobante, numero, producto, clave, cantidad, precio_compra, precio_venta, fecha_vencimiento, subtotal, descuento, total) VALUES ('$codigo', '$cliente', '$fechaVenta', '$comprobante', '$numero', '$producto', '$clave', '$cantidad', '$precioCompra', '$precioVenta', '$fechaVencimiento', '$subTotal', '$descuento', '$total')";

    if ($conn->query($sql) === TRUE) {
        $resultado = "Venta registrada con éxito";
    } else {
        $resultado = "Error al registrar Venta: " . $conn->error;
    }
}

echo json_encode(array("message" => $resultado));

$conn->close();
?>