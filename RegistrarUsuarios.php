<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/sweetalert2/6.0.1/sweetalert2.min.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/sweetalert2/6.0.1/sweetalert2.min.js"></script>
</head>
<body>
<?php
$servername = "arcadespersonalizados.cl";
$username = "car49017_root";
$password = "car49017_root";
$dbname = "car49017_bdproyectoapa";

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$perfil = $_POST['perfil'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO usuario (correo, contrasena, perfil)
VALUES ('".$correo."', '".$contrasena."', '".$perfil."')";

if ($conn->query($sql) === TRUE) {
    ?>
   <script type="text/javascript">
   $(document).ready(function(){
    swal({
  title: 'REGISTRO EXITOSO!!!',
  text: 'Se redireccionara en 5 segundos',
  timer: 5000
}).then(
  function () {
    window.location.href = "FormularioRegistroUsuario.php";
  },
  // handling the promise rejection
  function (dismiss) {
    if (dismiss === 'timer') {
      console.log('La alerta fue cerrada en 2 segundos');
      window.location.href = "FormularioRegistroUsuario.php";
    }
  }
)
   });
   </script>
    <?php
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    
}

$conn->close();
?>     




</body>
</html>
