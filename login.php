<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Sistema de Tintas</title>
  </head>
  <body>
     <!-- Formulario para Iniciar Sesión -->
    <div class="inks">
      <div class="system-register">
        <form class="form-container" id="form-container" method="POST">
          <h1>Sistema de Tintas</h1>
          <input
            type="text"
            name="correo"
            placeholder="Correo Electronico..."
          />
          <input type="password" name="password" placeholder="Contraseña..." />
          <button type="submit">Acceder</button>
          <div class="access-register">
            <a href="http://localhost/sistematinta/index.html">¿No tienes cuenta? <span>Accede</span></a>
          </div>
        </form>
      </div>
      <div id="responseMessage"></div>
    </div>
    <script src="./js/access.js"></script>
  </body>
</html>
