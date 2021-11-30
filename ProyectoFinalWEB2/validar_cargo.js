function guardar() {
    

    if (document.getElementById("txtcargo").value == "") {
        alert("Favor Ingresar el Nombre del cargo");
        document.getElementById("txtcargo").focus();
    }
    else {
      if (confirm("Seguro que desea actualizar esta informacion")) {
        document.getElementById("accion").value = "1";
        return true;
      }
    }
    return false;
  }

// funcion para implementar dataTable
$(document).ready(function() {
    $('#tablaCargo').DataTable();
  });
