function validar() {
			
    if (document.getElementById("txtcodigo").value == "") {
        alert("Favor Ingresar el codigo del Alumno");
        document.getElementById("txtcodigo").focus();
    }
    else if (document.getElementById("txtnomrbres").value == "") {
        alert("Favor Ingresar los Nombres del Alumno");
        document.getElementById("txtnomrbres").focus();
    } else if (document.getElementById("txtapellidos").value == "") {
        alert("Favor Ingresar los Apellidos del Alumno");
        document.getElementById("txtapellidos").focus();
    } else if (document.getElementById("dnac").value == "") {
        alert("Favor Ingresar la fecha de nacimiento del Alumno");
        document.getElementById("dnac").focus();
    } else if (document.getElementById("cmbgrado").value == "") {
        alert("Favor seleccionar el grado del Alumno");
        document.getElementById("cmbgrado").focus();
    } else if (document.getElementById("dmatricula").value == "") {
        alert("Favor Seleccionar la fecha de matricula del alumno");
        document.getElementById("dmatricula").focus();
    } else if (document.getElementById("txtTelefono").value == "") {
        alert("Favor Ingresar el numero de telefono del Alumno");
        document.getElementById("txtTelefono").focus();
    } else if (document.getElementById("txtDireccion").value == "") {
        alert("Favor ingresar la direccion del Alumno");
        document.getElementById("txtDireccion").focus();
    }else if(document.getElementById("dnac").value >= document.getElementById("dmatricula").value ) {
        alert("Fecha ingresada incorrecta, La fecha de nacimiento no puede ser mayor o igual a la fecha de matricula");
        document.getElementById("dnac").focus();
    }
    else {
        document.getElementById("accion").value="guardar";
        return true;
    }
    return false;
}