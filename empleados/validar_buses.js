function guardar() {
    

    if (document.getElementById("cod_buses").value == "") {
        alert("Favor Ingresar el codigo del bus");
        document.getElementById("cod_buses").focus();

    } else if (document.getElementById("sMarca").value=="") {
        alert("Favor Ingresar la marca del bus");
        document.getElementById("sMarca").focus();

    } else if (document.getElementById("sModelo").value=="") {
        alert("Favor Ingresar el modelo del bus");
        document.getElementById("sModelo").focus();

    } else if (document.getElementById("sPlaca").value==""){
         alert("Favor Ingresar la placa del bus");
         document.getElementById("sPlaca").focus();

    } else if (document.getElementById("cmbrutas").value==""){
        alert("Favor Ingresar el codigo de ruta");
        document.getElementById("cmbrutas").focus();

    } else if (document.getElementById("cmbempleados").value==""){
      alert("Favor Ingresar el codigo del empleado");
      document.getElementById("cmbempleados").focus();
    }
    else {

        document.getElementById("accion").value="guardar";
        return true;

    }
    return false;

  }

// funcion para implementar dataTable
$(document).ready(function() {
    $('#tablaBuses').DataTable();
  });
