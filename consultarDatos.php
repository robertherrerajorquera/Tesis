<?php

/* Resivo los datos de ajax para poder rewlizar la consulta */
$desde = $_POST['desde'];
$hasta = $_POST['hasta'];

/* Pregunto si los datos son falsos, si uno es falso tomara el valor de otro */
if(isset($desde)==false){
	$desde = $hasta;
}
if(isset($hasta)==false){
	$hasta = $desde;
}

/* Convierto la fecha en formato ingles para poder tomarla en la base de datos  */
function fechaNormal($Fecha){
	$nfecha = date('d/m/Y',strtotime($Fecha));
	return $nfecha;
}
/* Conexion a la base de datos y consulta sobre los datos del formulario siempre y cuando este dentro de la fechas ingresadas */
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
/* Selecciono la tabla de la base de datos que hemos creado y realiamos la consulta 
Arreglar la consulta para mostrar el nombre
*/
$sql = "SELECT HoraDeInicio, Fecha, idLocales, id FROM formulario WHERE Fecha BETWEEN '$desde' AND '$hasta' ORDER BY id ASC";

echo '<table class="table table-striped">
        	<tr>
            	<th scope="col">Hora de Inicio</th>
                <th  scope="col">Fecha</th>
				<th  scope="col">CodigoLocal</th>
				<th  scope="col">Informacion</th>
				<th  scope="col">PDF</th>
            </tr>';
$result = $conn->query($sql);

if($result->num_rows>0){
	while($row = mysqli_fetch_assoc($result)){
		echo '<tr>
				<td>'.$row['HoraDeInicio'].'</td>
				<td>'.fechaNormal($row['Fecha']).'</td>
				<td>'.$row['idLocales'].'</td>
				<td> <a href="javascript:MostrarProductos('.$row['id'].');">Mostrar Informacion</a></td>
				<td width="200" height="100"><a target="_blank" href="pdfFormularioAdministrador.php?varid='.$row['id'].'" class="btn btn-danger">Exportar PDF</a></td>
				</tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';

?>