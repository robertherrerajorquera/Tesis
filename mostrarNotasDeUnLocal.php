<?php 

$id = $_POST['id'];

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
/* Selecciono la tabla de la base de datos que hemos creado y realiamos la consulta */
$sql = "SELECT * FROM formulario inner join locales on formulario.idLocales=locales.id WHERE formulario.idLocales = '$id'";

echo '  

      <!-- aqui comienza la tabla-->


<table class="table">
<thead>
  <tr>
    <th scope="col">Fecha</th>
    <th scope="col">Hora</th>
    <th scope="col">Promedio</th>
  </tr>
</thead>

                ';

$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
      echo '
            <tr>
              <td>'.$row["Fecha"].'</td>
              <td>'.$row["HoraDeInicio"].'</td>
              <td>'.$row["promedio"].'</td>
            </tr>
        </div>
    </div>
  </div>
</div>
  
  
  ';?>
 
<?php

  }
} else {
  echo '<tr>
<td colspan="6">No se encontraron resultados</td>
  </tr>';
}





?>
 </table>
<div class="modal-footer">
<button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
</div>
<script>


</script>
