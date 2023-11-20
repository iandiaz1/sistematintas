/*Creamos una función para registrar al nuevo cliente */

async function enviarFormulario() {
  const userid = localStorage.getItem("userid");
  if (!userid) {
    console.error("No se encontró el userid en localStorage.");
    return;
  }
  const formulario = document.getElementById("customerForm");
  const formData = new FormData(formulario);
  formData.append("userid", userid);
  try {
    const response = await fetch(
      "http://localhost/sistematinta/backend/registerCustomers.php",
      {
        method: "POST",
        body: formData,
      }
    );

    if (!response.ok) {
      throw new Error(
        `Error al enviar formulario: ${response.status} - ${response.statusText}`
      );
    }
    const data = await response.text();
    const nuevoParrafo = document.createElement("p");
    nuevoParrafo.textContent = data;
    const contenedorResultado = document.getElementById("resultEmployee");
    contenedorResultado.innerHTML = "";
    contenedorResultado.appendChild(nuevoParrafo);
  } catch (error) {
    console.error("Error al enviar formulario:", error);
  }
}
