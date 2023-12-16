function abrirModal(
  idcliente,
  iduser,
  nombre,
  direccion,
  telefono,
  marca,
  modelo,
  color,
  estado
) {
  var modalBackground = document.getElementById("modalBackground-repairs");
  var modal = document.getElementById("myModal-repairs");
  var idClienteElem = document.getElementById("idcliente");
  var idEmpleadoElem = document.getElementById("idempleado");
  var nombreElem = document.getElementById("nombre");
  var marcaElem = document.getElementById("marca");
  var direccionElem = document.getElementById("direccion");
  var estadoElem = document.getElementById("estado");
  var modeloElem = document.getElementById("modelo");
  var colorElem = document.getElementById("color");

  modalBackground.style.display = "block";
  idClienteElem.textContent = "ID Cliente: " + idcliente;
  idEmpleadoElem.textContent = "ID Empleado: " + iduser;
  nombreElem.textContent = "Nombre: " + nombre;
  marcaElem.textContent = "Marca: " + marca;
  direccionElem.textContent = "Direccion: " + direccion;
  estadoElem.textContent = "Estado previo del Equipo: " + estado;
  modeloElem.textContent = "modelo: " + modelo;
  colorElem.textContent = "color: " + color;

  modal.style.display = "block";
  var reparacionForm = document.getElementById("reparacionForm");

  reparacionForm.dataset.idcliente = idcliente;
  reparacionForm.dataset.nombre = nombre;
  reparacionForm.dataset.direccion = direccion;
  reparacionForm.dataset.telefono = telefono;

  reparacionForm.onsubmit = function (event) {
    event.preventDefault();

    var idcliente = reparacionForm.dataset.idcliente;
    var nombre = reparacionForm.dataset.nombre;
    var direccion = reparacionForm.dataset.direccion;
    var telefono = reparacionForm.dataset.telefono;
    var estadonuevo = document.getElementById("estadonuevo").value;
    var fechaentrega = document.getElementById("fechaentrega").value;
    var reparacion = document.getElementById("reparacion").value;
    var costoentrega = document.getElementById("costoentrega").value;
    var cantidad = document.getElementById("cantidad").value;

    var selectedProducto = document.getElementById("producto");
    var productoNombre =
      selectedProducto.options[selectedProducto.selectedIndex].text;
    var productoClave = selectedProducto.value;

    var userid = localStorage.getItem("userid");
    fetch("http://localhost/sistematinta/backend/updateRepairs.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body:
        "idcliente=" +
        idcliente +
        "&estadonuevo=" +
        estadonuevo +
        "&fechaentrega=" +
        fechaentrega +
        "&userid=" +
        userid +
        "&nombre=" +
        nombre +
        "&direccion=" +
        direccion +
        "&telefono=" +
        telefono +
        "&reparacion=" +
        reparacion +
        "&costoentrega=" +
        costoentrega +
        "&productoNombre=" +
        productoNombre +
        "&productoClave=" +
        productoClave +
        "&cantidad=" +
        cantidad,
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
  };
}

/*Función para cerrar el modal */
function closeModal() {
  var modalBackground = document.getElementById("modalBackground-repairs");
  var modal = document.getElementById("myModal-repairs");
  modalBackground.style.display = "none";
  modal.style.display = "none";
}
