<?php
// getDetailsSales.php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

require_once '../config.php';

// Obtenemos los detalles de venta realizada

if (isset($_GET['idventa'])) {
    $idventa = $_GET['idventa'];
    $sql = "SELECT * FROM ventas WHERE idventa = $idventa";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $detallesVenta = mysqli_fetch_assoc($result);
        echo "<p>Id de Venta: {$detallesVenta['idventa']}</p>";
        echo "<p>Fecha de Venta: {$detallesVenta['fecha_venta']}</p>";
        echo "<p>Nombre de Cliente: {$detallesVenta['cliente']}</p>";
        echo "<p>Telefono: {$detallesVenta['numero']}</p>";
        echo "<p>Producto: {$detallesVenta['producto']}</p>";
        echo "<p>Cantidad: {$detallesVenta['cantidad']}</p>";
        echo "<p>Precio de Venta: $ {$detallesVenta['precio_venta']}</p>";
        echo "<p>Subtotal: $ {$detallesVenta['subtotal']}</p>";
        echo "<p>Descuento: % {$detallesVenta['descuento']}</p>";
        echo "<p>Total con descuento aplicado: $ {$detallesVenta['total']}</p>";
    } else {
        echo "Error al obtener detalles del cliente: " . mysqli_error($conn);
    }
} else {
    echo "ID de compra no proporcionado";
}

$conn->close();

?>