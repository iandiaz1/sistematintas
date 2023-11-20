/*Rutas de el componente de Técnicos*/

document.addEventListener("DOMContentLoaded", function () {
  const contentContainer = document.getElementById("content-container");
  const inicioNavItem = document.getElementById("inicio");
  const reparacionesNavItem = document.getElementById("reparaciones");
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

  reparacionesNavItem.addEventListener("click", function () {
    cargarContenido("componentsAdmin/repairs.php");
  });
});
