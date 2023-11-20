<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: POST');

require_once '../../config.php';

// Obtenemos de la tabla todos los registros de Ventas

$sqlReparaciones = "SELECT * FROM reparaciones";
$resultReparaciones = mysqli_query($conn, $sqlReparaciones);
$reparaciones = array();

if (mysqli_num_rows($resultReparaciones) > 0) {
    while ($row = mysqli_fetch_assoc($resultReparaciones)) {
        $reparaciones[] = $row;
    }
}


$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <div class="house-panel">
      <div class="house-panel-box">
      <h1 id="welcomeMessage"></h1>
      </div>

      <!-- Creamos una tabla para mostrar los registros de Ventas -->
      <h2 class="title-table-admin">Últimas ventas realizadas</h2>
      <table class="table-container-admin-house">
            <thead>
                <tr>
                <th>Id de Venta</th>
                  <th>Nombre</th>
                  <th>Número de Teléfono</th>
                  <th>Descripción</th>
                  <th>Estado</th>
                  <th>Fecha de Reparación</th>
                  <th>Monto Final</th>
                  <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach ($reparaciones as $reparacion): ?>
                  <tr>
                      <td><?php echo $reparacion['idreparacion']; ?></td>
                      <td><?php echo $reparacion['nombre']; ?></td>
                      <td><?php echo $reparacion['telefono']; ?></td>
                      <td><?php echo $reparacion['reparacion']; ?></td>
                      <td><?php echo $reparacion['estado']; ?></td>
                      <td><?php echo $reparacion['fecha_reparacion']; ?></td>
                      <td>$<?php echo $reparacion['costo_final']; ?></td>
                      <td>
                      <button onclick="getDetailsSales(<?php echo $reparacion['idreparacion']; ?>)">
                         <i class="fa fa-file"></i>
                      </button>
                      </td>
                  </tr>
              <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Creamos un comprobante de pago para cada venta realizada -->
    <div class="modalbackground-sales" id="modalbackground-sales"></div>
    <div class="modal-sales" id="myModal-sales">
      <div class="title-ticket-sales">
        <h3>Comprobante de Registro de Ventas</h3>
        <hr />
      </div>

      <div
        class="modal-content-sales"
        id="salesModalContent-sales"
      ></div>

      <div class="copyrigth-system-sales">
        <p>&copy;Sistema de Tinta</p>
        <div class="copyrigth-system-sales-box">
          <img src="imagen.png" alt="imagen.png" />
          <img src="imagen2.png" alt="imagen2.png" />
        </div>
      </div>

      <button class="modal-close-sales" onclick="closeModalSales()">
        Cerrar
      </button>
      <button class="open-download-sales" onclick="openDownloadSales()">Imprimir</button>
      <iframe id="printFrame-sales" style="display: none;"></iframe>
    </div>
  </body>
</html>
