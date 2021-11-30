function guardar() {
    

    if (document.getElementById("txthorasalida").value == "") {
        alert("Favor Ingresar Hora de Salida");
        document.getElementById("txthorasalida").focus();
    } 

    else if (document.getElementById("txthorallegada").value == "") {
      alert("Favor Ingresar Hora de LLegada");
      document.getElementById("txthorallegada").focus();
    } 
    else if (document.getElementById("cmbruta").value == "") {
      alert("Favor seleccionar una ruta");
      document.getElementById("cmbruta").focus();
    } 

    else {

        document.getElementById("accion").value="guardar";
        return true;
       
    }
    return false;

  }



// funcion para implementar dataTable
$(document).ready(function() {
    $('#tablaHorarioRuta').DataTable();
  }); 

