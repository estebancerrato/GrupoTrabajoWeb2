function guardar() {
  

  if (document.getElementById("nom_ruta").value == "") {
      alert("Favor Ingresar el Nombre de la ruta");
      document.getElementById("nom_ruta").focus();
  } else if (document.getElementById("cmborigen").value=="") {
    alert("Favor Ingresar el Nombre de la ruta");
    document.getElementById("cmborigen").focus();
  } else if (document.getElementById("cmbdestino").value=="") {
    alert("Favor Ingresar el Nombre del destino");
    document.getElementById("cmbdestino").focus();
  } else if (document.getElementById("precio_ruta").value=="") {
    alert("Favor Ingresar el precio de la ruta");
    document.getElementById("precio_ruta").focus();
  } else if (document.getElementById("km_ruta").value=="") {
    alert("Favor ingresar la distancia de la ruta");
    document.getElementById("km_ruta").focus();
  } 
  else {

      document.getElementById("accion").value="guardar";
      return true;

  }
  return false;

}



// funcion para implementar dataTable
$(document).ready(function() {
  $('#tablaRuta').DataTable();
});
