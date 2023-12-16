/*Creamos una función para registrar la compra al proveedor */

function sendFormProvider() {
  const formulario = document.getElementById("provider-form");
  const formData = new FormData(formulario);

  const productoSelect = document.getElementById("producto");
  const precioSeleccionado =
    productoSelect.options[productoSelect.selectedIndex].textContent;

  const precioSinSimbolo = parseFloat(
    precioSeleccionado.replace(/[^\d.]/g, "")
  );

  formData.append("precio", precioSinSimbolo);

  fetch("http://localhost/sistematinta/backend/registerProvider.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => {
      if (response.ok) {
        closeModal();
      } else {
        console.error("Error al enviar la solicitud.");
      }
    })
    .catch((error) => {
      console.error("Error en la solicitud:", error);
    });
}
