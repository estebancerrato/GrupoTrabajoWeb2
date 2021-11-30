function guardar() {


  if (document.getElementById("txtusuario").value == "") {
      alert("Favor Ingresar el Nombre del Usuario");
      document.getElementById("txtusuario").focus();
  } else if (document.getElementById("txtclave").value=="") {
    alert("Favor Ingresar la clave del Usuario");
    document.getElementById("txtclave").focus();
  } else if (document.getElementById("cmbempleado").value== "") {
    alert("Favor seleccionar el Empleado");
    document.getElementById("cmbempleado").focus();
  } else if (document.getElementById("cmbEstado").value== "") {
    alert("Favor seleccionar el Estado");
    document.getElementById("cmbEstado").focus();
  } else {
  
      document.getElementById("accion").value="guardar";
      return true;

  }
  return false;

}


// funcion para implementar dataTable
$(document).ready(function() {
  $('#tablaUsuario').DataTable();
});
