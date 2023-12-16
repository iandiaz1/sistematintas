function previewData() {
  const producto = document.querySelector(".sale-box-product select").value;
  const cantidad = parseFloat(
    document.querySelector('.sale-box-product input[placeholder="Cantidad..."]')
      .value
  );
  const precioVenta = parseFloat(
    document.querySelector(
      '.sale-box-product input[placeholder="Precio venta..."]'
    ).value
  );
  const descuento = parseFloat(
    document.querySelector(
      '.sale-box-product input[placeholder="Descuento..."]'
    ).value
  );

  if (isNaN(cantidad) || isNaN(precioVenta) || isNaN(descuento)) {
    alert("Ingresa valores numéricos válidos.");
    return;
  }

  const subTotal = (cantidad * precioVenta).toFixed(2);
  const total = (subTotal * (1 - descuento / 100)).toFixed(2);

  const previewRow = document.createElement("tr");
  previewRow.innerHTML = `
          <td>${producto}</td>
          <td>${cantidad}</td>
          <td>${precioVenta}</td>
          <td>${subTotal}</td>
          <td>% ${descuento}</td>
          <td>${total}</td>
      `;

  const subtotalInput = document.createElement("input");
  subtotalInput.type = "hidden";
  subtotalInput.name = "subtotal";
  subtotalInput.value = subTotal;
  document.querySelector("#sale-form").appendChild(subtotalInput);

  const totalInput = document.createElement("input");
  totalInput.type = "hidden";
  totalInput.name = "total";
  totalInput.value = total;
  document.querySelector("#previewTable tbody").appendChild(previewRow);

  const existingTotalInput = document.querySelector(
    "#sale-form input[name='total']"
  );
  if (existingTotalInput) {
    existingTotalInput.replaceWith(totalInput);
  } else {
    document.querySelector("#sale-form").appendChild(totalInput);
  }
}

function clearForm() {
  const saleBoxProductInputs = document.querySelectorAll(
    ".sale-box-product input"
  );
  saleBoxProductInputs.forEach((input) => {
    input.value = "";
  });

  const select = document.querySelector(".sale-box-product select");
  select.selectedIndex = 0;

  document.querySelector("#previewTable tbody").innerHTML = "";
}

/************************************************************************/

async function sendFormSales() {
  const formulario = document.getElementById("sale-form");

  const productoSelect = document.getElementById("productoSelect");
  const selectedOption = productoSelect.options[productoSelect.selectedIndex];
  const clave = selectedOption.getAttribute("data-clave");

  let claveHiddenInput = formulario.querySelector("input[name='clave']");
  if (!claveHiddenInput) {
    claveHiddenInput = document.createElement("input");
    claveHiddenInput.type = "hidden";
    claveHiddenInput.name = "clave";
    formulario.appendChild(claveHiddenInput);
  }
  claveHiddenInput.value = clave;

  const formdata = new FormData(formulario);

  try {
    const response = await fetch(
      "http://localhost/sistematinta/backend/registerSales.php",
      {
        method: "POST",
        body: formdata,
      }
    );
    const data = await response.json();
    console.log(data);
  } catch (error) {
    console.log("Error al enviar formulario:", error);
  }
}

function clearFormAll() {
  document.querySelector(".sale-form").reset();
  document.querySelector("#previewTable tbody").innerHTML = "";
}
