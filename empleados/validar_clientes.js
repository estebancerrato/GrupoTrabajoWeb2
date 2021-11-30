function guardar() {
    

    if (document.getElementById("cedul_client").value == "") {
        alert("Favor Ingresar la cedula del cliente");
        document.getElementById("cedul_client").focus();

    } else if (document.getElementById("prime_nombr").value=="") {
      alert("Favor Ingresar el primer nombre");
      document.getElementById("prime_nombr").focus();

    } else if (document.getElementById("segundo_nombr").value==""){
      alert("Favor Ingresar el Segundo Nombre");
      document.getElementById("segundo_nombr").focus();

    } else if (document.getElementById("prime_apell").value==""){
      alert("Favor Ingresar el Primer Apellido");
      document.getElementById("prime_apell").focus();

    } else if (document.getElementById("segun_apelli").value==""){
      alert("Favor Ingresar el Segundo Apellido");
      document.getElementById("segun_apelli").focus();

    } else if (document.getElementById("rtn").value==""){
      alert("Favor Ingresar el RTN del cliente");
      document.getElementById("rtn").focus();

    } else if (document.getElementById("telefon").value==""){
      alert("Favor Ingresar el Telefono del cliente");
      document.getElementById("telefon").focus();

    } 
    else {
        document.getElementById("accion").value="guardar";
        return true;

    }
    return false;

  }



// funcion para implementar dataTable
$(document).ready(function() {
    $('#tablaCliente').DataTable();
  });
