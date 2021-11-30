
// funcion para implementar dataTable
$(document).ready(function() {
  $('#tablaTipoPaquetes').DataTable();
});



function guardar() {
    

  if (document.getElementById("txtnombreCiudad").value == "") {
      alert("Favor Ingresar el Nombre de la Ciudad");
      document.getElementById("txtnombreCiudad").focus();
  } 
  else {
      document.getElementById("accion").value="guardar";
      return true;
     
  }
  return false;

}
