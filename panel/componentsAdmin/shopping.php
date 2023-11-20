<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: POST');

require_once '../../config.php';

// Accedemos a la tabla compras y obtenemos los datos para mostrarlos en la tabla

$sqlCompras = "SELECT * FROM compras";
$resultCompras = mysqli_query($conn, $sqlCompras);
$compras = array();

if (mysqli_num_rows($resultCompras) > 0) {
    while ($row = mysqli_fetch_assoc($resultCompras)) {
        $compras[] = $row;
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
    <div class="shopping">
      <h1>Registro de Compras a Proveedores</h1>
      <!-- Creamos la tabla para mostrar los registros de compras -->
      <table class="table-container-admin-shopping">
            <thead>
                <tr>
                    <th>Id Cliente</th>
                    <th>Nombre del Proveedor</th>
                    <th>Apellido</th>
                    <th>Número de Telefono</th>
                    <th>Productos</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Fecha de Compra</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach ($compras as $compra): ?>
                  <tr>
                      <td><?php echo $compra['idcompra']; ?></td>
                      <td><?php echo $compra['nombre_proveedor']; ?></td>
                      <td><?php echo $compra['apellido']; ?></td>
                      <td><?php echo $compra['telefono']; ?></td>
                      <td><?php echo $compra['producto']; ?></td>
                      <td>$<?php echo $compra['precio']; ?></td>
                      <td><?php echo $compra['cantidad']; ?></td>
                      <td><?php echo $compra['fecha_compra']; ?></td>
                      <td>
                      <button onclick="getDetailsShopping(<?php echo $compra['idcompra']; ?>)">
                         <i class="fa fa-file"></i>
                      </button>
                      <button onclick="openModalEdited()">
                         <i class="fa fa-edit"></i>
                      </button>
                      <button onclick="deleteCompra(<?php echo $compra['idcompra']; ?>)">
                         <i class="fa fa-trash"></i>
                      </button>
                      
                      </td>
                      
                  </tr>
              <?php endforeach; ?>
            </tbody>
        </table>
    </div>

     <!-- Creamos un comprobante de pago sobre la compra hecha al proveedor -->
    <div class="modalbackground-shopping" id="modalbackground-shopping"></div>
    <div class="modal-shopping" id="myModal-shopping">
      <div class="title-ticket-shopping">
        <h3>Comprobante de Registro del Compras</h3>
        <hr />
      </div>

      <div
        class="modal-content-shopping"
        id="compraModalContent-shopping"
      ></div>

      <div class="copyrigth-system-shopping">
        <p>&copy;Sistema de Tinta</p>
        <div class="copyrigth-system-shopping-box">
          <img src="imagen.png" alt="imagen.png" />
          <img src="imagen2.png" alt="imagen2.png" />
        </div>
      </div>

      <button class="modal-close-shopping" onclick="closeModalShopping()">
        Cerrar
      </button>
      <button class="open-download-shopping" onclick="openDownloadShopping()">Imprimir</button>
      <iframe id="printFrame-shopping" style="display: none;"></iframe>
    </div>



    <div class="modalbackground-shopping-edited" id="modalbackground-shopping-edited"></div>
    <div class="modal-shopping-edited" id="myModal-shopping-edited">
      <div class="title-ticket-shopping-edited">
        <h3>Editar Productos</h3>
        <hr />
      </div>

      <!-- Creamos el Formulario para Editar las compras guardadas en el inventario -->
      <form id="provider-form-edited" class="provider-form-edited" onsubmit="editCompra(<?php echo $compra['idcompra']; ?>)">
        <p>Datos Personales del Proveedor</p>
        <input type="text" placeholder="Nombre..." name="nombre">
        <input type="text" placeholder="Apellido..." name="apellido">
        <input type="number" placeholder="telefono..." name="telefono">

        <div class="product-provider-box-edited">
         <p>Seleccionar Producto:</p>
         <select name="producto" id="producto">
           <optgroup label="Tinta para Impresoras">
             <option value="Tinta Inyeccion">Tinta para Impresoras de Inyección de Tinta <span>$19.99</span></option>
             <option value="Tinta Laser">Tinta para Impresoras Láser <span>$10.99</span></option>
             <option value="Tinta Especializada">Tinta Especializada para Impresoras de Formato Amplio <span>$25.99</span></option>
           </optgroup>
       
           <optgroup label="Cartuchos de Tinta">
             <option value="Cartuchos Originales">Cartuchos de Tinta Originales <span>$35.99</span></option>
             <option value="Cartuchos Remanufacturados">Cartuchos de Tinta Remanufacturados <span>$7.99</span></option>
             <option value="Cartuchos Compatibles">Cartuchos de Tinta Compatibles <span>$12.99</span></option>
           </optgroup>
       
           <optgroup label="Repuestos y Accesorios">
             <option value="Tambor Impresora">Tambor de Impresora <span>$38.99</span></option>
             <option value="Rodillos Papel">Rodillos de Papel y Kits de Mantenimiento <span>$22.99</span></option>
             <option value="Unidades Fusion">Unidades de Fusión para Impresoras Láser <span>$54.99</span></option>
           </optgroup>
       
           <optgroup label="Kits de Recarga de Tinta">
             <option value="Kit Recarga">Kit para Recargar Cartuchos de Tinta <span>$44.99</span></option>
             <option value="Herramientas Recarga">Herramientas y Suministros para Recargar Tinta <span>$32.99</span></option>
           </optgroup>
       
           <optgroup label="Papel Fotográfico">
             <option value="Papel Fotografico">Papel Fotográfico de Diferentes Tamaños y Gramajes <span>$60.99</span></option>
           </optgroup>
       
           <optgroup label="Servicios de Mantenimiento">
             <option value="Kit Limpieza">Kit de Limpieza para Impresoras <span>$50.99</span></option>
             <option value="Mantenimiento Preventivo">Servicios de Mantenimiento Preventivo para Impresoras <span>$25.99</span></option>
           </optgroup>
       
           <optgroup label="Sistemas Continuos de Tinta (CISS)">
             <option value="Sistemas CISS">Sistemas Continuos de Tinta (CISS) <span>$70.99</span></option>
           </optgroup>
         </select>
        </div>
        
         <input type="date" name="fechacompra">
         <p>Seleccionar Cantidad:</p>
         <input type="number" name="cantidad" id="cantidad" value="1" min="1">
         <button type="submit">Actualizar</button>
      </form>

      <button class="modal-close-shopping-edited" onclick="closeModalEdited()">
        Cerrar
      </button>
    </div>
  </body>
</html>
