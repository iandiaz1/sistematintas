<?php
// getDetailsSales.php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

require_once '../config.php';

// Obtenemos los detalles de venta realizada

if (isset($_GET['idreparacion'])) {
    $idReparacion = $_GET['idreparacion'];
    $sql = "SELECT * FROM reparaciones WHERE idreparacion = $idReparacion";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $detallesReparacion = mysqli_fetch_assoc($result);
        echo "<p>Id de Reparacion: {$detallesReparacion['idreparacion']}</p>";
        echo "<p>Nombre: {$detallesReparacion['nombre']}</p>";
        echo "<p>Telefono: {$detallesReparacion['telefono']}</p>";
        echo "<p>Dirección: {$detallesReparacion['direccion']}</p>";
        echo "<p>Descripción del Arreglo: {$detallesReparacion['reparacion']}</p>";
        echo "<p>Fecha de Reparación: {$detallesReparacion['fecha_reparacion']}</p>";
        echo "<p>Precio Final: $ {$detallesReparacion['costo_final']}</p>";
    } else {
        echo "Error al obtener detalles del cliente: " . mysqli_error($conn);
    }
} else {
    echo "ID de compra no proporcionado";
}

$conn->close();

?>