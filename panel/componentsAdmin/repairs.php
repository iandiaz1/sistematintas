<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: POST');

require_once '../../config.php';

// Obtenemos todos los datos de la tabla clientes y lo insertamos en la tabla

$sqlClientes = "SELECT * FROM clientes";
$resultClientes = mysqli_query($conn, $sqlClientes);
$clientes = array();

// Obtenemos el producto para insertarlo en el formulario y enviarlo a la tabla reparaciones

$sqlProductos = "SELECT producto FROM compras";
$resultProductos = mysqli_query($conn, $sqlProductos);
$productos = array();

if (mysqli_num_rows($resultClientes) > 0) {
    while ($row = mysqli_fetch_assoc($resultClientes)) {
        $clientes[] = $row;
    }
}

if (mysqli_num_rows($resultProductos) > 0) {
    while ($row = mysqli_fetch_assoc($resultProductos)) {
        $productos[] = $row['producto'];
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
    <div class="repairs">
      <h1>Reparaciones de Equipos</h1>

      <!-- Creamos una tabla para mostrar los registros de los clientes agregados -->
        <table class="table-container-admin-repairs">
            <thead>
                <tr>
                    <th>Id Cliente</th>
                    <th>Id Empleado</th>
                    <th>Nombre del Cliente</th>
                    <th>Email</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Color</th>
                    <th>Motivo</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach ($clientes as $cliente): ?>
                  <tr>
                      <td><?php echo $cliente['id_cliente']; ?></td>
                      <td><?php echo $cliente['id_user']; ?></td>
                      <td><?php echo $cliente['nombre']; ?></td>
                      <td><?php echo $cliente['email']; ?></td>
                      <td><?php echo $cliente['marca']; ?></td>
                      <td><?php echo $cliente['modelo']; ?></td>
                      <td><?php echo $cliente['color']; ?></td>
                      <td><?php echo $cliente['descripcion']; ?></td>
                      <td><?php echo $cliente['estado']; ?></td>
                      <td>
                      <button onclick="abrirModal(<?php echo $cliente['id_cliente']; ?>, <?php echo $cliente['id_user']; ?>, '<?php echo $cliente['nombre']; ?>', '<?php echo $cliente['direccion']; ?>', '<?php echo $cliente['telefono']; ?>', '<?php echo $cliente['marca']; ?>', '<?php echo $cliente['modelo']; ?>', '<?php echo $cliente['color']; ?>', '<?php echo $cliente['estado']; ?>')">
                         <i class="fas fa-screwdriver-wrench"></i>
                      </button>
                      </td>
                  </tr>
              <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
     <!-- Creamos formulario para Arreglar o Agregar una Venta sobre una impresora -->
    <div class="modalbackground-repairs" id="modalBackground-repairs"></div>
    <div id="myModal-repairs" class="modal-form-repairs">
        <h2>Arreglar Equipo</h2>
        <hr>
        <div class="modal-content-repairs">
          <div class="data-repairs-form">
            <p id="idcliente"></p>
            <p id="idempleado"></p>
            <p id="nombre"></p>
            <p id="marca"></p>
            <p id="modelo"></p>
            <p id="color"></p>
            <p id="direccion"></p>
            <p id="estado"></p>
          </div>
           
            <div class="state-form-repairs">
              <form id="reparacionForm">

                <div class="new-state-form">

                  <div class="new-state-form-box">
                    <p>Seleccionar nuevo estado</p>
                    <select name="estadonuevo" id="estadonuevo">
                      <option value="Revision">Revisión</option>
                      <option value="Arreglado">Arreglado</option>
                      <option value="Cancelado">Cancelado</option>
                    </select>
                  </div>
                  <div class="new-state-form-box">
                    <p>Seleccionar producto del proveedor</p>
                    <select name="producto" id="producto">
                      <?php foreach ($productos as $producto): ?>
                        <option value="<?php echo $producto; ?>"><?php echo $producto; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="date-repairs-equipment">
                  <p>Fecha de entrega</p>
                   <input type="date" name="fechaentrega" id="fechaentrega">
                   <input type="number" name="costoentrega" id="costoentrega" placeholder="Costo de Reparación...">
                   <textarea name="reparacion" id="reparacion" cols="30" rows="10" placeholder="Descripción de Reparación..."></textarea>
                   <button type="submit">Enviar</button>
                </div>
                
              </form>
            </div>
           
        </div>
        <button class="button-close-repairs" onclick="closeModal()">Cerrar</button>
    </div>
 
  </body>
</html>