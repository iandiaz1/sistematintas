<?php
// getDetailsShopping.php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

require_once '../config.php';

// Obtenemos los detalles de compra al proveedor

if (isset($_GET['idcompra'])) {
    $idCompra = $_GET['idcompra'];
    $sql = "SELECT * FROM compras WHERE idcompra = $idCompra";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $detallesCompra = mysqli_fetch_assoc($result);
        echo "<p>Id de compra: {$detallesCompra['idcompra']}</p>";
        echo "<p>Nombre: {$detallesCompra['nombre_proveedor']}</p>";
        echo "<p>Apellido: {$detallesCompra['apellido']}</p>";
        echo "<p>Telefono: {$detallesCompra['telefono']}</p>";
        echo "<p>Producto comprado: {$detallesCompra['producto']}</p>";
        echo "<p>Precio: $ {$detallesCompra['precio']}</p>";
        echo "<p>Cantidad: {$detallesCompra['cantidad']}</p>";
        echo "<p>Fecha de compra: {$detallesCompra['fecha_compra']}</p>";
    } else {
        echo "Error al obtener detalles del cliente: " . mysqli_error($conn);
    }
} else {
    echo "ID de compra no proporcionado";
}

$conn->close();

?>