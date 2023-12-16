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
    <title>Técnico</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  </head>
  <body>
    <div class="panel">
      <div class="title-admin">
        <h1>Acceso Técnico</h1>
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
            <div id="reparaciones" class="route-nav-box">
              <a class="fa-solid fa-wrench"> </a><span> Reparaciones</span>
            </div>
          </ul>
          <ul class="panel-admin-box">
            <div id="inventarios" class="route-nav-box">
              <a class="fa-solid fa-book"> </a><span> Inventarios</span>
            </div>
          </ul>
          <ul class="panel-admin-box">
            <div id="ventas" class="route-nav-box">
              <a class="fa-solid fa-chart-simple"> </a><span> Ventas</span>
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
    <script src="../routes/routesTechnical.js"></script>
    <script src="../js/logout.js"></script>
    <script src="../js/getNameTechnical.js"></script>
    <script src="../js/repairsEquipment.js"></script>
    <script src="../js/getDetailsSales.js"></script>
  </body>
</html>
