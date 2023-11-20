<?php

//updateRepairs.php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: POST');

require_once '../config.php';

// Actualizamos los datos de la tabla reparaciones

$idCliente = $_POST['idcliente'];
$nuevoEstado = $_POST['estadonuevo']; 
$fechaEntrega = $_POST['fechaentrega'];
$userid = $_POST['userid'];
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$reparacion = $_POST['reparacion'];
$costoentrega = $_POST['costoentrega'];
$producto = $_POST['producto'];

$sqlUpdateClientes = "UPDATE clientes SET estado = '$nuevoEstado', fecha_recibo = '$fechaEntrega' WHERE id_cliente = $idCliente";

if ($conn->query($sqlUpdateClientes) === TRUE) {
    $sqlInsertReparaciones = "INSERT INTO reparaciones (id_cliente, id_empleado, nombre, direccion, telefono, reparacion, estado, producto, fecha_reparacion, costo_final) VALUES ('$idCliente', '$userid', '$nombre', '$direccion', '$telefono', '$reparacion', '$nuevoEstado', '$producto', '$fechaEntrega', '$costoentrega')";

    if ($conn->query($sqlInsertReparaciones) === TRUE) {
        echo json_encode(array("message" => "Actualización y inserción exitosas"));
    } else {
        echo json_encode(array("message" => "Error al insertar en la tabla reparaciones: " . $conn->error));
    }
} else {
    echo json_encode(array("message" => "Error al actualizar la tabla clientes: " . $conn->error));
}

$conn->close();
?>