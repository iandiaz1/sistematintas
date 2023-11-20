/*Creamos una función para autentificar los datos de usuario y poder ingresar al panel de administración*/

document
  .getElementById("form-container")
  .addEventListener("submit", function (event) {
    event.preventDefault();

    const formData = new FormData(this);

    fetch("http://localhost/sistematinta/backend/access.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        const messageElement = document.createElement("p");
        messageElement.textContent = data.message;

        const responseMessageContainer =
          document.getElementById("responseMessage");
        responseMessageContainer.innerHTML = "";
        responseMessageContainer.appendChild(messageElement);

        if (data.status === "success") {
          localStorage.setItem("userid", data.userid);
          if (data.role === "Administrador") {
            window.location.href = "panel/panelAdmin.php";
          } else if (data.role === "Empleado") {
            window.location.href = "panel/employeePanel.php";
          } else if (data.role === "Tecnico") {
            window.location.href = "panel/technicalPanel.php";
          }
        }
      })
      .catch((error) => {
        console.error("Error en la solicitud:", error);
      });
  });
