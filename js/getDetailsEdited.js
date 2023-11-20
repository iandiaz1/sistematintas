/*Creamos una función para Editar el formulario de Inventario */

function editCompra(idcompra) {
  const formulario = document.getElementById("provider-form-edited");
  const formData = new FormData(formulario);

  const productoSelect = document.getElementById("producto");
  const precioSeleccionado =
    productoSelect.options[productoSelect.selectedIndex].textContent;

  const precioSinSimbolo = parseFloat(
    precioSeleccionado.replace(/[^\d.]/g, "")
  );

  formData.append("idcompra", idcompra);
  formData.append("precio", precioSinSimbolo);

  fetch("http://localhost/sistematinta/backend/updateShopping.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => {
      if (response.ok) {
      } else {
        console.error("Error al enviar la solicitud.");
      }
    })
    .catch((error) => {
      console.error("Error en la solicitud:", error);
    });

  openModalEdited();
}

/*Creamos una función para abrir el formulario */

function openModalEdited() {
  var modalBackground = document.getElementById(
    "modalbackground-shopping-edited"
  );
  var modal = document.getElementById("myModal-shopping-edited");

  modalBackground.style.display = "block";
  modal.style.display = "block";
}

/*Creamos una función para cerrar el formulario */

function closeModalEdited() {
  var modalBackground = document.getElementById(
    "modalbackground-shopping-edited"
  );
  var modal = document.getElementById("myModal-shopping-edited");

  modalBackground.style.display = "none";
  modal.style.display = "none";
}

/*Creamos una función para eliminar del Inventario la compra */

async function deleteCompra(idcompra) {
  const confirmDelete = confirm("¿Estás seguro de eliminar esta compra?");

  if (confirmDelete) {
    try {
      const response = await fetch(
        `http://localhost/sistematinta/backend/deleteShopping.php?idcompra=${idcompra}`,
        {
          method: "DELETE",
          headers: {
            "Content-Type": "application/json",
          },
        }
      );

      if (response.ok) {
        const rowToRemove = document.getElementById(`row-${idcompra}`);
        rowToRemove.remove();
      } else {
        console.error("Error al eliminar la compra.");
      }
    } catch (error) {
      console.error("Error en la solicitud:", error);
    }
  }
}
