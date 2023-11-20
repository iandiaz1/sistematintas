/*Creamos una función para obtener el Nombre del Técnico */

function updateWelcomeMessage() {
  const userid = localStorage.getItem("userid");
  fetch(
    `http://localhost/sistematinta/backend/getNameAdmin.php?userid=${userid}`
  )
    .then((response) => response.text())
    .then((data) => {
      const welcomeMessageElement = document.getElementById("welcomeMessage");
      if (welcomeMessageElement) {
        welcomeMessageElement.textContent = `Bienvenido Técnico ${data}`;
      }
    })
    .catch((error) => {
      console.error("Error obteniendo el nombre de usuario", error);
    });
}

document.addEventListener("DOMContentLoaded", function () {
  updateWelcomeMessage();
  setInterval(updateWelcomeMessage, 200);
});
