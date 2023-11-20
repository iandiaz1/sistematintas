/*Creamos una función para registrar un usuario */

document
  .getElementById("registrationForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();
    fetch("http://localhost/sistematinta/backend/register.php", {
      method: "POST",
      body: new FormData(this),
    })
      .then((response) => response.text())
      .then((message) => {
        const messageElement = document.createElement("p");
        messageElement.textContent = message;
        const responseMessageContainer =
          document.getElementById("responseMessage");
        responseMessageContainer.innerHTML = "";
        responseMessageContainer.appendChild(messageElement);

        document.getElementById("nombre").value = "";
        document.getElementById("correo").value = "";
        document.getElementById("password").value = "";
      })
      .catch((error) => {
        console.error("Error en la solicitud:", error);
      });
  });
