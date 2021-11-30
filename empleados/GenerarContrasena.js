function generarContrasenaAleatoria() {
    characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    type ='rand';
    var pass = "";
    for (i=0; i < 15; i++){
        if(type == 'rand'){
            pass += characters.charAt(Math.floor(Math.random()*characters.length)); 
        }
    }
    var inputNombre = document.getElementById("txtclave");
    inputNombre.value = pass;
    return false;//evitar que la pagina se recargue
}