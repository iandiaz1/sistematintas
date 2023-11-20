<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: POST');

require_once '../../config.php';

// Obtenemos los datos de los clientes de la tabla 

$sql = "SELECT * FROM clientes";
$result = mysqli_query($conn, $sql);
$clientes = array();

if (mysqli_num_rows($result) > 0) { 
  while ($row = mysqli_fetch_assoc($result)) { 
    $clientes[] = $row; } 
  } else {
    $clientes = array(); 
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
    <div class="customers-main">
      <div class="customers">
        <h1>Agregar Clientes</h1>

        <!-- Creamos el formulario para registrar los clientes -->   

        <form class="customers-form" id="customerForm">
          <input type="text" name="nombre" placeholder="Nombre..." />
          <input type="text" name="email" placeholder="Email..." />
          <input type="number" name="telefono" placeholder="Telefono..." />
          <input
            type="text"
            name="direccion"
            placeholder="Dirección..."
          />
        
          <input
            type="text"
            name="marca"
            placeholder="Marca..."
          />
          <input
            type="text"
            name="modelo"
            placeholder="Modelo..."
          />
          <input
            type="text"
            name="color"
            placeholder="Color..."
          />
          <input
            type="number"
            name="costorevision"
            placeholder="Costo de Revisión..."
          />
          <select name="estado" id="">
            <option value="Revision">Revisión</option>
            <option value="Arreglado">Arreglado</option>
            <option value="Cancelado">Cancelado</option>
          </select>
          <input
            type="date"
            name="fecharecibo"
          />
          <textarea name="descripcion" placeholder="Descripción"></textarea>
          <button type="button" onclick="enviarFormulario()">Registrar</button>
        </form>
        <div id="resultEmployee"></div>
      </div>
      <div class="customers-data-table">

      <!-- Creamos la tabla para mostrar algunos datos de esos clientes -->
        <table class="customers-container-admin">
          <thead>
            <tr>
              <th>Id Cliente</th>
              <th>Nombre del Cliente</th>
              <th>Estado</th>
              <th>Comprobante</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($clientes as $cliente): ?>
            <tr>
              <td><?php echo $cliente['id_cliente']; ?></td>
              <td><?php echo $cliente['nombre']; ?></td>
              <td><?php echo $cliente['estado']; ?></td>
              <td>
                <i
                  class="fa-solid fa-file"
                  style="cursor: pointer"
                  onclick="getDetailsAdmin(<?php echo $cliente['id_cliente']; ?>)"
                ></i>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Creamos un comprobante de revisión -->
    <div class="modalbackground-customers" id="modalbackground-customers"></div>
    <div class="modal-customers" id="myModal-customers">
      <div class="title-ticket-customers">
        <h3>Comprobante de Registro del equipo</h3>
        <hr />
      </div>

      <div
        class="modal-content-customers"
        id="clienteModalContent-customers"
      ></div>

      <div class="copyrigth-system-customs">
        <p>&copy;Sistema de Tinta</p>
        <div class="copyrigth-system-customs-box">
          <img src="imagen.png" alt="imagen.png" />
          <img src="imagen2.png" alt="imagen2.png" />
        </div>
      </div>

      <button class="modal-close-customers" onclick="cerrarModal()">
        Cerrar
      </button>

      <button class="open-download" onclick="openDownload()">Imprimir</button>
      
      <iframe id="printFrame" style="display: none;"></iframe>
    </div>
  </body>
</html>
