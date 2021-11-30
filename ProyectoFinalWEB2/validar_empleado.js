function guardar() {

  if (document.getElementById("cedula").value == "") {
      alert("Favor Ingresar la cedula del Empleado");
      document.getElementById("cedula").focus();

  } else if (document.getElementById("txtnombre1").value == "") {
    alert("Favor Ingresar el primer nombre");
    document.getElementById("txtnombre1").focus();

  } else if (document.getElementById("papellido").value == "") {
      alert("Favor Ingresar el primer apellido");
      document.getElementById("papellido").focus();

  } else if (document.getElementById("cmbGenero").value == "") {
    alert("Favor selecionar genero");
    document.getElementById("cmbGenero").focus();

  } else if (document.getElementById("txttelefono").value == "") {
    alert("Favor ingresar el telefono");
    document.getElementById("txttelefono").focus();

  } else if (document.getElementById("txtcorreoelectronico").value == "") {
    alert("Favor ingresar el correo Electronico");
    document.getElementById("txtcorreoelectronico").focus();

  } else if (document.getElementById("cmbcargo").value == "") {
    alert("Favor ingresar el cargo");
    document.getElementById("cmbcargo").focus();

  } else if (document.getElementById("dfechaIngre").value == "") {
    alert("Favor ingresar el fecha de ingreso");
    document.getElementById("dfechaIngre").focus();

  } else if (document.getElementById("direcc").value == "") {
    alert("Favor ingresar la direccion");
    document.getElementById("direcc").focus();
  }
  else  {
    if (confirm("Seguro que desea actualizar esta informacion")) {
        document.getElementById("accion").value = "1";
        return true;
      }
  }

  return false;

}


// funcion para implementar dataTable
$(document).ready(function() {
$('#tablaEmpleado').DataTable();
});
