/*Creamos una función para obtener los detalles de la Venta realizada */

async function getDetailsSales(idventa) {
  try {
    const response = await fetch(
      `http://localhost/sistematinta/backend/getDetailsSales.php?idventa=${idventa}`
    );
    const data = await response.text();

    openModalSales(data);
  } catch (error) {
    console.error("Error al obtener detalles de la compra", error);
  }
}

/*Creamos una función para abrir un Modal con el comprobante */

function openModalSales(data) {
  var modalBackground = document.getElementById("modalbackground-sales");
  var modal = document.getElementById("myModal-sales");
  var modalContent = document.getElementById("salesModalContent-sales");
  modalContent.innerHTML = data;
  modalBackground.style.display = "block";
  modal.style.display = "block";
}

/*Creamos una función para cerrar el Modal*/

function closeModalSales() {
  var modalBackground = document.getElementById("modalbackground-sales");
  var modal = document.getElementById("myModal-sales");
  modalBackground.style.display = "none";
  modal.style.display = "none";
}

/*Creamos una función para descargar el comprobante */

function openDownloadSales() {
  var printFrame = document.getElementById("printFrame-sales");
  var modalContent = document.getElementById(
    "salesModalContent-sales"
  ).innerHTML;

  var copyrightContent = document.querySelector(
    ".copyrigth-system-sales"
  ).innerHTML;

  printFrame.contentDocument.write(
    "<html><head><title>Comprobante de Venta</title>"
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
