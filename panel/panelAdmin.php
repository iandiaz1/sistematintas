<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="../style.css" />
    <title>Administrador</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  </head>
  <body>
    <div class="panel">
      <div class="title-admin">
        <h1>Acceso Administrador</h1>
      </div>
        <!-- Creamos el Menú lateral para navegar sobre las distintas secciones -->
      <div class="admin-nav-container">
        <nav class="panel-container">
          <ul class="panel-admin-box">
            <div id="inicio" class="route-nav-box">
              <a class="fa-solid fa-house"> </a><span> Inicio</span>
            </div>
          </ul>
          <ul class="panel-admin-box">
            <div id="empleados" class="route-nav-box">
              <a class="fa-solid fa-user-tie"> </a>
              <span> Empleados</span>
            </div>
          </ul>
          <ul class="panel-admin-box">
            <div id="clientes" class="route-nav-box">
              <a class="fa-solid fa-users"></a> <span>Clientes</span>
            </div>
          </ul>
          <ul class="panel-admin-box">
            <div id="reparaciones" class="route-nav-box">
              <a class="fa-solid fa-wrench"> </a><span> Reparaciones</span>
            </div>
          </ul>
          <ul class="panel-admin-box">
            <div id="proveedores" class="route-nav-box">
              <a class="fa-solid fa-box"> </a><span> Proveedores</span>
            </div>
          </ul>
          <ul class="panel-admin-box">
            <div id="shopping" class="route-nav-box">
              <a class="fa-solid fa-money-check-dollar"> </a
              ><span> Compras</span>
            </div>
          </ul>
          <ul class="panel-admin-box">
            <div id="logout" class="route-nav-box">
              <a class="fa-solid fa-power-off"></a>
              <span> Salir</span>
            </div>
          </ul>
        </nav>
        <div class="content-container" id="content-container"></div>
      </div>
    </div>
    <script src="../routes/routes.js"></script>
    <script src="../js/logout.js"></script>
    <script src="../js/deleteEmployee.js"></script>
    <script src="../js/registerCustomers.js"></script>
    <script src="../js/getDetailsCustom.js"></script>
    <script src="../js/getNameAdmin.js"></script>
    <script src="../js/repairsEquipment.js"></script>
    <script src="../js/registerProvider.js"></script>
    <script src="../js/getDetailsShopping.js"></script>
    <script src="../js/getDetailsSales.js"></script>
    <script src="../js/getDetailsEdited.js"></script>
  </body>
</html>
