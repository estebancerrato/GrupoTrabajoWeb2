function guardarPaquete() {


    if (document.getElementById("cmb_buses").value == "0") {
        alert("Favor seleccionar una unidad de trasporte");
        document.getElementById("cmb_buses").focus();

    } else if (document.getElementById("cmb_clientes").value == "0") {
        alert("Favor seleccionar un cliente");
        document.getElementById("cmb_clientes").focus();

    } else if (document.getElementById("speso").value == "0") {
        alert("Favor Ingresar la cantidad en libras");
        document.getElementById("speso").focus();

    } else if (document.getElementById("scmb_estado").value == "") {
        alert("Debe seleccionar el estado del paquete");
        document.getElementById("scmb_estado").focus();

    } else if (document.getElementById("cmb_tipo_paquetes").value == "0") {
        alert("Debe seleccionar el tipo de paquete");
        document.getElementById("cmb_tipo_paquetes").focus();

    } else {

        document.getElementById("accion").value = "guardar";
        return true;

    }
    return false;

}


// funcion para implementar dataTable
$(document).ready(function() {
    $('#tablapaquetes').DataTable();
});