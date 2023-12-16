<?php

// registerProvider.php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

require_once '../config.php';

// Registramos la compra hecha al proveedor

$resultado = "";	

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empresa = $_POST['empresa'];
    $contactoEmpresa = $_POST['contacto'];
    $direccion = $_POST['direccion'];
    $producto = $_POST['producto'];
    $precio = $_POST['precio']; 
    $cantidad = $_POST['cantidad'];
    $fechaCompra = $_POST['fechacompra'];

    // Generaramos una clave aleatoria de 10 dígitos
    $clave = $conn->query("SELECT UUID()")->fetch_row()[0];

    // Calculamos el total gastado Precio * Cantidad
    $totalGastado = $precio * $cantidad;

    $sql = "INSERT INTO compras (empresa, contacto_empresa, direccion, producto, precio, cantidad, total_gastado, clave, fecha_compra) VALUES ('$empresa', '$contactoEmpresa', '$direccion', '$producto', '$precio', '$cantidad', '$totalGastado', '$clave', '$fechaCompra')";

    if ($conn->query($sql) === TRUE) {
        $resultado = "Compra registrada con éxito";
    } else {
        $resultado = "Error al registrar compra: " . $conn->error;
    }
}

echo json_encode(array("message" => $resultado));

$conn->close();
?>