
function MostrarProductos(id){
            var url = 'mostrarDatosDeUnFormulario.php';
        $.ajax({
            type:'POST',
            url:url,
            data:'id='+id,
            success: function(datos){
                $('#MostrarInformacionRegistrada').html(datos);
                return false;
            }
        });
}


/*
function MostrarProductos(id){
    var url = 'mostrarDatosDeUnFormulario.php';
$.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(datos){
        $('#MostrarDashboard').html(datos);
        return false;
    }
});
}
*/