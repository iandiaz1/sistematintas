<?php
// deleteShopping.php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Headers: Content-Type");

require_once '../config.php';

// Eliminamos una compra hecha al Proveedor

$idcompra = $_GET['idcompra'];

$sql = "DELETE FROM compras WHERE idcompra = $idcompra";

if ($conn->query($sql) === TRUE) {
    http_response_code(204);
} else {
    http_response_code(500);
    echo json_encode(array("error" => "Error al eliminar la compra: " . $conn->error));
}

$conn->close();
?>