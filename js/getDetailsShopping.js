/*Creamos una función para obtener los detalles de la compra al proveedor */

async function getDetailsShopping(idcompra) {
  try {
    const response = await fetch(
      `http://localhost/sistematinta/backend/getDetailsShopping.php?idcompra=${idcompra}`
    );
    const data = await response.text();

    openModalShopping(data);
  } catch (error) {
    console.error("Error al obtener detalles de la compra", error);
  }
}

/*Creamos una función para abrir un Modal con el comprobante */

function openModalShopping(data) {
  var modalBackground = document.getElementById("modalbackground-shopping");
  var modal = document.getElementById("myModal-shopping");
  var modalContent = document.getElementById("compraModalContent-shopping");
  modalContent.innerHTML = data;
  modalBackground.style.display = "block";
  modal.style.display = "block";
}

/*Creamos una función para cerrar el Modal*/

function closeModalShopping() {
  var modalBackground = document.getElementById("modalbackground-shopping");
  var modal = document.getElementById("myModal-shopping");
  modalBackground.style.display = "none";
  modal.style.display = "none";
}

/*Creamos una función para descargar el comprobante */

function openDownloadShopping() {
  var printFrame = document.getElementById("printFrame-shopping");
  var modalContent = document.getElementById(
    "compraModalContent-shopping"
  ).innerHTML;

  var copyrightContent = document.querySelector(
    ".copyrigth-system-shopping"
  ).innerHTML;

  printFrame.contentDocument.write(
    "<html><head><title>Comprobante de Registro del Compras</title>"
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
