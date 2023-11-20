<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: POST');

require_once '../../config.php';

// Obtenemos datos especificos para poder realizar acciones sobre los empleados y ténicos registrados

$sqlListar = "SELECT idusuario, nombre, correo_electronico, role FROM usuarios WHERE role IN ('Empleado', 'Tecnico')";
$resultListar = mysqli_query($conn, $sqlListar);
$usuarios = array();

if (mysqli_num_rows($resultListar) > 0) {
    while ($row = mysqli_fetch_assoc($resultListar)) {
        $usuarios[] = $row;
    }
} else {
    $usuarios = array();
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="employee">
        <h1>Empleados y Técnicos</h1>

        <!-- Creamos una tabla para mostrar los empleados y técnicos -->
        <table class="table-container-admin-employee">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?php echo $usuario['idusuario']; ?></td>
                        <td><?php echo $usuario['nombre']; ?></td>
                        <td><?php echo $usuario['correo_electronico']; ?></td>
                        <td><?php echo $usuario['role']; ?></td>
                        <td>
                            <form id="eliminarForm<?php echo $usuario['idusuario']; ?>" method="post">
                               <input type="hidden" name="idusuario" value="<?php echo $usuario['idusuario']; ?>">
                               <button type="button" onclick="eliminarUsuario(<?php echo $usuario['idusuario']; ?>)">Eliminar</button>
                           </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <!-- Creamos un modal que muestra un mensaje al eliminarse un empleado o técnico -->
    <div class="modal-background" id="modalBackground"></div>
    <div class="modal" id="myModal">
        <div class="modal-content">
            <p id="modalMessage"></p>
            <button class="modal-close" onclick="cerrarModalEmpleado()">Cerrar</button>
        </div>
    </div>
</body>
</html>
