<?php
include_once('phpRegistrarYloguear/usuario.php');
session_start();
if (isset($_SESSION["logiado"])) {

  $user = $_SESSION["logiado"];

  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/styleAdministrador.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Perfil Administrador</title>
  </head>

  <body>
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
    <div class="topnav" id="myTopnav">
      <a href="perfilAdministrador.php" class="active">Home</a>

      <a href="PerfilAdministradorGenerarDashboard.php">Locales Auditados</a>

      <a href="FormularioRegistroUsuario.php">Registrar Usuarios</a>

      <a href="phpRegistrarYloguear/cerrarsesion.php" onclick="cerrar()">Cerrar Sesion</a>

      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
      <a style="color:white">Administrador: <?php
                                              echo $user->getCorreo(); ?></a>
    </div>
    <div style="padding-left:16px">
    </div>

    <!-- <div  class="container-fluid">-->
    <div class="container-fluid">
      <div class="d-flex row justify-content-center">

        <?php
          $servername = "arcadespersonalizados.cl";
          $username = "car49017_root";
          $password = "car49017_root";
          $dbname = "car49017_bdproyectoapa";


          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);
          // Check connection
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          $sql = "SELECT * FROM locales";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              ?>

            <a data-toggle="modal" id="historial" data-target="#localCard" onclick='MostrarInformesLocales(<?php echo $row["id"]; ?>)' class="card col-sm-3  card-local d-flex justify-content-between ml-2 mt-2">
              <div class="card-body">

                <div class="card-img-top">
                  <img class="localImg" src="data:image/jpg;base64,<?php echo base64_encode($row["foto"]) ?>">
                </div>
                <div class="card-title">
                  <td scope="row">Nombre Local: <?php echo $row["Nombre"] ?></td>
                </div>
                <div class="card-subtitle">
                  <td scope="row">Ubicacion: <?php echo $row["Ubicacion"] ?></td>
                </div>

              </div>
            </a>
        <?php
            }
          } else {
            echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
          }

          echo '</table>';
          ?>

        <div class="modal fade" id="localCard" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" id="dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Historial</h5>


                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">


                <!-- lllllllllllllllllllllllllllllllll ---->





                <div class="MostrarInformacionRegistrada1" id="MostrarInformacionRegistrada1">

                  <script src="js/myAJAXmostrarDatosLocales.js"></script>
                </div><!-- fin mostrarInformacion -->

              </div><!-- fin del modal-body -->
            </div><!--  fin del modal-content -->
          </div><!--  fin del modal-dialog -->
        </div><!--  fin del modal que contiene todo -->
      </div><!-- div row -->
        </div><!-- container fluid -->
  </body>

  </html>
<?php
} else {
  echo "Debe realizar el login primero<br />";
  echo "<a href='inicio.html'>logear</a>";
}
?>