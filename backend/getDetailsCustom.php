<?php
// getDetailsCustom.php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

require_once '../config.php';

// Obtenemos los detalles de los datos del cliente

if (isset($_GET['idcliente'])) {
    $idCliente = $_GET['idcliente'];
    $sql = "SELECT * FROM clientes WHERE id_cliente = $idCliente";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $detallesCliente = mysqli_fetch_assoc($result);
        echo "<p>Nombre: {$detallesCliente['nombre']}</p>";
        echo "<p>Email: {$detallesCliente['email']}</p>";
        echo "<p>Telefono: {$detallesCliente['telefono']}</p>";
        echo "<p>Dirección: {$detallesCliente['direccion']}</p>";
        echo "<p>Marca de la Impresora: {$detallesCliente['marca']}</p>";
        echo "<p>Modelo: {$detallesCliente['modelo']}</p>";
        echo "<p>Color: {$detallesCliente['color']}</p>";
        echo "<p>Costo de Revision: $ {$detallesCliente['costo_revision']}</p>";
        echo "<p>Estado: {$detallesCliente['estado']}</p>";
        echo "<p>Fecha de Recibo: {$detallesCliente['fecha_recibo']}</p>";
        echo "<p>Descripción: {$detallesCliente['descripcion']}</p>";
    } else {
        echo "Error al obtener detalles del cliente: " . mysqli_error($conn);
    }
} else {
    echo "ID de cliente no proporcionado";
}

$conn->close();

?>