function fillProviderData() {
  var select = document.getElementById("proveedor-anterior");
  var selectedOption = select.options[select.selectedIndex];

  var empresa = selectedOption.getAttribute("data-empresa");
  var contacto = selectedOption.getAttribute("data-contacto");
  var direccion = selectedOption.getAttribute("data-direccion");

  document.getElementById("empresa").value = empresa;
  document.getElementById("contacto").value = contacto;
  document.getElementById("direccion").value = direccion;
}
