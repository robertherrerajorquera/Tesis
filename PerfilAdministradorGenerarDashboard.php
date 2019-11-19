<?php
// Iniciar sesion de logeo para el usuario activo pueda ingresar a la pagina, Modo de seguridad
  include_once('phpRegistrarYloguear/usuario.php');
  session_start();
  if(isset($_SESSION["logiado"]))
  {

  $user = $_SESSION["logiado"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/styleAdministradorConsultarFechas.css">

  <!-- Script importantes para el funcionamiento de la pagina -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/myAJAX.js"></script>



    <link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-theme.css" rel="stylesheet">
<link href="css/bootstrap-theme.min.css" rel="stylesheet">
<script src="css/bootstrap.min.js"></script>
<script src="css/bootstrap.js"></script>


  <!-- Script importante para el uso de chart js Graficos -- Libreria completa -->
<script src="node_modules/chart.js/dist/Chart.js"></script>



    <title>Document</title>
</head>
<body>
    <!-- Contenedor del perfil auditor, pagina generar dashboard-->
<div class="topnav" id="myTopnav">
  <a href="perfilAdministrador.php" class="active">Home</a>
  <a href="PerfilAdministradorGenerarDashboard.php">Locales Auditados</a>
  <a href="FormularioRegistroUsuario.php">Registrar Usuarios</a>
  <a href="phpRegistrarYloguear/cerrarsesion.php" onclick="cerrar()">Cerrar Sesion</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
  <i class="fa fa-bars"></i>
  </a>
  <a style="color:white">Administrador: <?php 
       echo $user->getCorreo();?></a>
  </div>
  <div style="padding-left:16px">
  </div>
  <script>
  function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
  }
  </script>
</div>
<script>

/* Funciones ajax para la consulta de la informacion a la BD de mysql, esta ingresa la fecha desde y hasta para buscar todos los 
formularios realizados dentro de las fechas */
$(function(){

  $('#FechaDesde').on('change', function(){
    var desde = $('#FechaDesde').val();
    var hasta = $('#FechaHasta').val();
    var url = 'consultarDatos.php';
    $.ajax({
        type:'POST',
        url:url,
        data:'desde='+desde+'&hasta='+hasta,
        success: function(datos){
            $('#agregaRegistros').html(datos);
        }
    });
    return false;
});

$('#FechaHasta').on('change', function(){
    var desde = $('#FechaDesde').val();
    var hasta = $('#FechaHasta').val();
    var url = 'consultarDatos.php';
    $.ajax({
        type:'POST',
        url:url,
        data:'desde='+desde+'&hasta='+hasta,
        success: function(datos){
            $('#agregaRegistros').html(datos);
        }
    });
    return false;
  });
});

/* Contenido de HTML que muestra la interfas para ingresar las fechas que desea buscar */
</script>
<div class="container" id="myCenternav">

    <!-- Consulta de datos  -->

    <table class="table">
  <thead>
    <tr>
      <th scope="col"><div class="container" id="contenedorTexto" style="background-color: white; width:200px;">Filtro por fecha</div></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">
      <div class="container" id="contenedorInputFechas" style="background-color: white; width:400px;">
      Desde:<input type="date" id="FechaDesde" name="FechaDesde"/>
        
      Hasta:<input type="date" id="FechaHasta" name="FechaHasta"/>
      
      
      </div>
      
      </th>
     </tr>
    <section>
    <table border="0" align="center">
    	<tr>  
            
        </tr>
    </table>
   </section>
 <!-- Contenedor de mostrar informacion generica -->
<div class="registros" id="agregaRegistros">

</div>

 <!-- Contenedor de mostrar grafico a terminar -->
<div class="MostrarDashboard" id="MostrarDashboard">

        <canvas id="myChart" width="400" height="100"></canvas>
        
</div>
 <!-- Contenedor de mostrar informacion de todo los datos del documento registrado por el auditor -->
<div class="MostrarInformacionRegistrada" id="MostrarInformacionRegistrada">

</div>


</div>
<script src="js/myAJAX.js"></script>
</body>
</html>
<?php
}
else
{
  echo "Debe realizar el login primero<br />";
  echo "<a href='inicio.html'>logear</a>";
}
?>