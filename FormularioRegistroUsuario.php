<?php
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
    <link rel="stylesheet" href="css/styleAdministrador.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

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

<div class="container">
<form action="RegistrarUsuarios.php" method="post">
    Correo Usuario:<br>
    <input id="correo" type="email" class="form-control" name="correo">
    <br>
   
    Crear Contraseña:<br>
    <input id="contrasena"  type="text" class="form-control" name="contrasena">
    <br><br>
    <select id="perfil" name="perfil">
              <option Value="0">Auditor</option>
              <option Value="1">Administrador</option>
    <p><input type="submit" class="btn btn-primary"  /></p>

    </form>
  </div>

</body>
</html>
<?php
}
else
{
  echo "Debe realizar el login primero<br />";
  echo "<a href='logilnPrincipal.php'>logear</a>";
}
?>