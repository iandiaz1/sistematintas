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
        <p>Datos Personales del Proveedor</p>
        <input type="text" placeholder="Nombre..." name="nombre">
        <input type="text" placeholder="Apellido..." name="apellido">
        <input type="number" placeholder="telefono..." name="telefono">

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
