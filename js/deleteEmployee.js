/*Creamos una función para Eliminar a un empleado o Técnico*/

async function eliminarUsuario(idUsuario) {
  try {
    const response = await fetch(
      "http://localhost/sistematinta/backend/eliminar_usuario.php",
      {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: new URLSearchParams($("#eliminarForm" + idUsuario).serialize()),
      }
    );
    if (!response.ok) {
      throw new Error(
        `Error al eliminar usuario: ${response.status} - ${response.statusText}`
      );
    }
    const data = await response.text();
    mostrarModalEmpleado(data);
  } catch (error) {
    console.error("Error al eliminar usuario:", error);
  }
}

/*Creamos una función para mostrar un mensaje de eliminado*/

function mostrarModalEmpleado(message) {
  $("#modalMessage").text(message);
  $("#modalBackground").css("display", "block");
  $("#myModal").css("display", "block");
}

/*Creamos una función para cerrar el modal */

function cerrarModalEmpleado() {
  $("#modalBackground").css("display", "none");
  $("#myModal").css("display", "none");
  location.reload(true);
}
