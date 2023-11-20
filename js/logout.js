/*Creamos una función para salir del panel de administración */

document.getElementById("logout").addEventListener("click", function () {
  fetch("http://localhost/sistematinta/backend/logout.php")
    .then((response) => response.json())
    .then((data) => {
      if (data.status === "success") {
        localStorage.removeItem("userid");
        window.location.href = "/sistematinta/login.php";
      } else {
        console.error("Error al cerrar sesión:", data.message);
      }
    })
    .catch((error) => console.error("Error al cerrar sesión:", error));
});
