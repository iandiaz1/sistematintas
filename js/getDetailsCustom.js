/*Creamos una función para obtener los detalles del comprobante de Revisión */

async function getDetailsAdmin(idCliente) {
  try {
    const response = await fetch(
      `http://localhost/sistematinta/backend/getDetailsCustom.php?idcliente=${idCliente}`
    );
    const data = await response.text();

    mostrarModal(data);
  } catch (error) {
    console.error("Error al obtener detalles del cliente", error);
  }
}

/*Creamos una función para abrir el Comprobante*/

function mostrarModal(data) {
  var modalBackground = document.getElementById("modalbackground-customers");
  var modal = document.getElementById("myModal-customers");
  var modalContent = document.getElementById("clienteModalContent-customers");
  modalContent.innerHTML = data;
  modalBackground.style.display = "block";
  modal.style.display = "block";
}

/*Creamos una función para cerrar el Modal del comprobante */

function cerrarModal() {
  var modalBackground = document.getElementById("modalbackground-customers");
  var modal = document.getElementById("myModal-customers");
  modalBackground.style.display = "none";
  modal.style.display = "none";
}

/*Creamos una función para descargar el comprobante*/

function openDownload() {
  var printFrame = document.getElementById("printFrame");
  var modalContent = document.getElementById(
    "clienteModalContent-customers"
  ).innerHTML;

  var copyrightContent = document.querySelector(
    ".copyrigth-system-customs"
  ).innerHTML;

  printFrame.contentDocument.write(
    "<html><head><title>Comprobante de Registro del equipo</title>"
  );
  printFrame.contentDocument.write("<style>");
  printFrame.contentDocument.write("img { width: 80px;}");
  printFrame.contentDocument.write("</style></head><body>");
  printFrame.contentDocument.write(modalContent);
  printFrame.contentDocument.write(copyrightContent);
  printFrame.contentDocument.write("</body></html>");
  printFrame.contentDocument.close();

  printFrame.contentWindow.focus();
  printFrame.contentWindow.print();
}
