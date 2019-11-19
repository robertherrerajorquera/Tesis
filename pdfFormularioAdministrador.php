<?php
session_start();

require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
   /* $this->Image('logo_pb.png',10,8,33);*/
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'Formulario APA',0,0,'C'); // Definimos el titulo y el border en este caso es 0 por lo tanto no tendra
    // Salto de línea
    $this->Ln(20);

    $this->Cell(70,10,'Informacion Formulario',1,0,'',0);
    $this->Cell(120,10,'Datos',1,1,'',0);
}
// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Pagina ').$this->PageNo().'/{nb}',0,0,'C');
}
}
$servername = "arcadespersonalizados.cl";
$username = "car49017_root";
$password = "car49017_root";
$dbname = "car49017_bdproyectoapa";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$idformulario = $_GET['varid'];
$sql = "SELECT * FROM formulario inner join locales on formulario.idLocales=locales.id WHERE formulario.id = '$idformulario'";
$result = $conn->query($sql);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);


if($result->num_rows>0){
	while($row = mysqli_fetch_assoc($result)){
        
    $pdf->Cell(70,10, 'Hora De inicio', 1 ,0,'',0);
    $pdf->Cell(120,10, $row['HoraDeInicio'], 1, 1,'', 0);
    $pdf->Cell(70,10, 'Nombre Local', 1 ,0,'',0);
    $pdf->Cell(120,10, $row['Nombre'], 1, 1,'', 0);
    $pdf->Cell(70,10, 'Ubicacion', 1 ,0,'',0);
    $pdf->Cell(120,10, $row['Ubicacion'], 1, 1,'', 0);

    $pdf->Cell(70,10, 'Promedio Instalaciones', 1 ,0,'',0);
    $pdf->Cell(120,10, $row['promedioInstalaciones'], 1, 1,'', 0);

    $pdf->Cell(70,10, 'Promedio Manipulaciones', 1 ,0,'',0);
    $pdf->Cell(120,10, $row['promedioManipulaciones'], 1, 1,'', 0);

    $pdf->Cell(70,10, 'Promedio Manipuladores', 1 ,0,'',0);
    $pdf->Cell(120,10, $row['promedioManipuladores'], 1, 1,'', 0);

    $pdf->Cell(70,10, 'Promedio Control Alimentario ', 1 ,0,'',0);
    $pdf->Cell(120,10, $row['promedioControlesPuntoCriticosEnAlimentos'], 1, 1,'', 0);

    $pdf->Cell(70,10, 'Promedio Almacenado', 1 ,0,'',0);
    $pdf->Cell(120,10, $row['promedioRecepcionYAlmacenamiento'], 1, 1,'', 0);

    $pdf->Cell(70,10, 'Promedio Documentacion', 1 ,0,'',0);
    $pdf->Cell(120,10, $row['promedioDocumentacion'], 1, 1,'', 0);

    $pdf->Cell(70,10, 'Promedio General', 1 ,0,'',0);
    $pdf->Cell(120,10, $row['promedio'], 1, 1,'', 0);

    $pdf->Cell(70,10, 'Hora De Termino', 1 ,0,'',0);
    $pdf->Cell(120,10, $row['HoraDeTermino'], 1, 1,'', 0);

    $pdf->Cell(70,50, 'Observacion General', 1 ,0,'',0);
    $pdf->Cell(120,50, $row['ObservacionGeneral'], 1, 1,'', 0);

    /*
    Problema 
    $pdf->Cell(100,50, 'Foto', 1 ,0,'C',0);
    $pdf->Cell(80,50,?><img src="data:image/jpg;base64,<?php echo base64_encode($row['Foto1'])?>"><?php, 1, 1,'C', 0);
    */
}
}

$pdf->Output();
?>