<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: POST');

require_once '../../config.php';

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT idcompra, empresa, contacto_empresa, direccion FROM compras";
$result = $conn->query($sql);

$proveedores = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $proveedores[] = $row;
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
    <div class="provider">
      <h1>Comprar Repuestos a Proveedor</h1>
      
      <!-- Creamos el formulario para comprar los Productos al Proveedor -->

      <form action="" id="provider-form" class="provider-form">

      <p style="margin-top: 10px">Seleccionar Proveedor:</p>
        <select name="proveedor-anterior" id="proveedor-anterior" onchange="fillProviderData()">
          <option value="">Seleccionar Proveedor</option>
          <?php foreach ($proveedores as $proveedor) : ?>
            <option value="<?php echo $proveedor['idcompra']; ?>" data-empresa="<?php echo $proveedor['empresa']; ?>" data-contacto="<?php echo $proveedor['contacto_empresa']; ?>" data-direccion="<?php echo $proveedor['direccion']; ?>">
              <?php echo $proveedor['empresa']; ?>
            </option>
          <?php endforeach; ?>
        </select>

        <p style="margin-top: 10px">Datos de la Empresa</p>
        <input type="text" placeholder="Nombre de la Empresa..." name="empresa" id="empresa">
        <input type="number" placeholder="Contacto de la Empresa..." name="contacto" id="contacto">
        <input type="text" placeholder="Dirección de Empresa..." name="direccion" id="direccion">

        
        <div class="product-provider-box">

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
         <button type="submit" onclick="sendFormProvider()">Comprar</button>
      </form>
    </div>
  </body>
</html>
