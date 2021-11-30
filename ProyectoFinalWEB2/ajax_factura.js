$('#cmbRuta').on('change', function(){
    var id = $('#cmbRuta').val() //obtengo el valor que tiene el select de cmbruta
    $.ajax({
    type: 'POST',
    url: 'php/rutafactura.php',
    data: {'id': id}
    })
    .done(function(respuesta){
    $('#mostrarPrecio').html(respuesta)
    })
    .fail(function(){
    alert('Hubo un errror al cargar precio Ruta')
    })
})
