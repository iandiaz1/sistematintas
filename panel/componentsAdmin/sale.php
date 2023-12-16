<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: POST');

require_once '../../config.php';


$sqlRepairs = "SELECT * FROM reparaciones";
$resultRepairs = mysqli_query($conn, $sqlRepairs);
$repairs = array();

if (mysqli_num_rows($resultRepairs) > 0) {
  while ($row = mysqli_fetch_assoc($resultRepairs)) {
      $repairs[] = $row;
  }
}

$sqlShopping = "SELECT producto, clave FROM compras";
$resultShopping = mysqli_query($conn, $sqlShopping);
$shopping = array();


if (mysqli_num_rows($resultShopping) > 0) {
    while ($row = mysqli_fetch_assoc($resultShopping)) {
        $shopping[] = $row;
    }
}

$sqlSales = "SELECT * FROM ventas";
$resultSales = mysqli_query($conn, $sqlSales);
$sales = array();


if (mysqli_num_rows($resultSales) > 0) {
    while ($row = mysqli_fetch_assoc($resultSales)) {
        $sales[] = $row;
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
    <div class="sale">
      

      <form class="sale-form" id="sale-form">
          <h1>Formulario de Registro de Ventas</h1>

          <div class="sale-form-box">
            <div class="sale-form-box-container">

              <div class="sale-box">
                <p>Codigo:</p>
                <input type="text" placeholder="Codigo..." name="codigo">
                <p>Cliente: <i class="fa-solid fa-magnifying-glass"></i></p>
                <select name="cliente">
                  <option value="">Seleccionar Cliente</option>
                  <?php foreach ($repairs as $repair): ?>
                      <option value="<?php echo $repair['nombre']; ?>" ><?php echo $repair['nombre']; ?></option>
                  <?php endforeach; ?>
                </select>
                
                <p>Número:</p>
                <input type="number" placeholder="Número..." name="numero">
                <p>Comprobante:</p>
                <select name="comprobante">
                  <option value="">Seleccionar tipo de Comprobante</option>
                  <option value="FACTURA">FACTURA</option>
                </select>
                <p>Fecha:</p>
                <input type="date" name="fechaventa">
              </div>
  
              <div class="sale-box-product">
                <p>Producto: <i class="fa-solid fa-magnifying-glass"></i></p>
                <select name="producto" id="productoSelect">
                   <option value="">Seleccionar Producto</option>
                   <?php foreach ($shopping as $shoppin): ?>
                     <option value="<?php echo $shoppin['producto']; ?>" data-clave="<?php echo $shoppin['clave']; ?>">
                       <?php echo $shoppin['producto']; ?>
                     </option>
                   <?php endforeach; ?>
                </select>
             
                <p>Cantidad:</p>
                <input type="number" placeholder="Cantidad..." name="cantidad">
                <p>Precio Compra:</p>
                <input type="number" placeholder="Precio compra..." name="preciocompra">
                <p>Precio Venta:</p>
                <input type="number" placeholder="Precio venta..." name="precioventa">
                <p>Fecha Vencimiento:</p>
                <input type="date" name="fechavencimiento">
                <p>Descuento %:</p>
                <input type="number" placeholder="Descuento..." name="descuento">
                <input type="hidden" name="subtotal" id="subtotal" value="">
                <input type="hidden" name="total" id="total" value="">
                <button type="button" onclick="previewData()">Vista Previa
                <i class="fa-solid fa-plus"></i></button>
                <button type="button" onclick="clearForm()">Limpiar
                <i class="fa-solid fa-broom"></i></button>                 
              </div>

            </div>
          
            <table class="table-container-admin-sales" id="previewTable">
                    <thead>
                        <tr>
                            <th>Articulo</th>
                            <th>Cantidad</th>
                            <th>Precio Venta</th>
                            <th>SubTotal</th>
                            <th>Descuento</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
            </table>

            <div class="save-form-sale">
              <button type="buttom" onclick="sendFormSales();">Guardar
              <i class="fa-solid fa-floppy-disk"></i></button>
              <button type="button" onclick="clearFormAll();">Limpiar
              <i class="fa-solid fa-broom"></i></button>
            </div>
           
          </div>
         
      </form>

      <!-- Creamos una tabla para mostrar los registros de los ventas -->
      <h2>Registro de Ventas</h2>
        <table class="table-container-admin-sales">
            <thead>
                <tr>
                    <th>Fecha de la Venta</th>
                    <th>Id de Transacción</th>
                    <th>Nombre Producto</th>
                    <th>Clave</th>
                    <th>Cantidad</th>
                    <th>Precio Venta</th>
                    <th>SubTotal</th>
                    <th>Descuento</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach ($sales as $sale): ?>
                  <tr>
                      <td><?php echo $sale['fecha_venta']; ?></td>
                      <td><?php echo $sale['idventa']; ?></td>
                      <td><?php echo $sale['producto']; ?></td>
                      <td><?php echo $sale['clave']; ?></td>
                      <td><?php echo $sale['cantidad']; ?></td>
                      <td> $ <?php echo $sale['precio_venta']; ?></td>
                      <td> $ <?php echo $sale['subtotal']; ?></td>
                      <td> % <?php echo $sale['descuento']; ?></td>
                      <td> $ <?php echo $sale['total']; ?></td>
                  </tr>
              <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
  </body>
</html>