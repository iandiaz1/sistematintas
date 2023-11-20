/*Rutas de el componente de Administracion*/

document.addEventListener("DOMContentLoaded", function () {
  const contentContainer = document.getElementById("content-container");
  const inicioNavItem = document.getElementById("inicio");
  const empleadosNavItem = document.getElementById("empleados");
  const clientesNavItem = document.getElementById("clientes");
  const reparacionesNavItem = document.getElementById("reparaciones");
  const proveedoresNavItem = document.getElementById("proveedores");
  const shoppingNavItem = document.getElementById("shopping");

  function cargarContenido(pagina) {
    fetch(pagina)
      .then((response) => response.text())
      .then((html) => {
        contentContainer.innerHTML = html;
        history.replaceState(null, null, `#${pagina}`);
      })
      .catch((error) => console.error("Error al cargar el contenido", error));
  }

  /*Cargamos el contenido de las rutas internas */

  const fragmento = window.location.hash.substr(1);
  const ultimaPagina = fragmento || "componentsAdmin/house.php";
  cargarContenido(ultimaPagina);

  inicioNavItem.addEventListener("click", function () {
    cargarContenido("componentsAdmin/house.php");
  });

  empleadosNavItem.addEventListener("click", function () {
    cargarContenido("componentsAdmin/employee.php");
  });

  clientesNavItem.addEventListener("click", function () {
    cargarContenido("componentsAdmin/customers.php");
  });

  reparacionesNavItem.addEventListener("click", function () {
    cargarContenido("componentsAdmin/repairs.php");
  });

  proveedoresNavItem.addEventListener("click", function () {
    cargarContenido("componentsAdmin/provider.php");
  });

  shoppingNavItem.addEventListener("click", function () {
    cargarContenido("componentsAdmin/shopping.php");
  });
});
