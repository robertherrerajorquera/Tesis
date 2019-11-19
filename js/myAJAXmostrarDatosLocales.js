function MostrarInformesLocales(id){
$.ajax({
    type:'POST',
    url:'../mostrarNotasDeUnLocal.php',
    data:'id='+id,
    success: function(datos){
        $('#MostrarInformacionRegistrada1').html(datos);
        return false;
    }
});
}


