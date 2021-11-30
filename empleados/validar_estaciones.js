function guardar() {

    if (document.getElementById("estacion_n").value == "") {
        alert("Favor Ingresar el nombre de la estacion");
        document.getElementById("estacion_n").focus();
    } else if (document.getElementById("cmbciudad").value=="") {
        alert("Favor Ingresar el nombre de la ciudad");
        document.getElementById("cmbciudad").focus();
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
    $('#tablaCiudad').DataTable();
  });
