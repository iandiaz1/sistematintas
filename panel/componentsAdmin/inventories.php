<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: POST');

require_once '../../config.php';


$sqlProduct = "SELECT * FROM compras";
$resulProduct = mysqli_query($conn, $sqlProduct);
$product = array();


if (mysqli_num_rows($resulProduct) > 0) {
    while ($row = mysqli_fetch_assoc($resulProduct)) {
        $product[] = $row;
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
      <h1>Registro de Inventarios</h1>

      <!-- Creamos una tabla para mostrar los registros de compras -->
        <table class="table-container-admin-repairs">
            <thead>
                <tr>
                    <th>Fecha de entrada</th>
                    <th>Id de Venta</th>
                    <th>Empresa</th>
                    <th>Contacto Empresa</th>
                    <th>Producto</th>
                    <th>Clave</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach ($product as $produc): ?>
                  <tr>
                      <td><?php echo $produc['fecha_compra']; ?></td>
                      <td><?php echo $produc['idcompra']; ?></td>
                      <td><?php echo $produc['empresa']; ?></td>
                      <td><?php echo $produc['contacto_empresa']; ?></td>
                      <td><?php echo $produc['producto']; ?></td>
                      <td><?php echo $produc['clave']; ?></td>
                      <td><?php echo $produc['cantidad']; ?></td>
                  </tr>
              <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
  </body>
</html>