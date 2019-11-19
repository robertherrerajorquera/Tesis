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

    $this->Cell(100,10,'Informacion Formulario',1,0,'',0);
    $this->Cell(95,10,'Datos',1,1,'',0);
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
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
        
    $pdf->Cell(100,10, 'Hora De inicio', 1 ,0,'',0);
    $pdf->Cell(95,10, $row['HoraDeInicio'], 1, 1,'', 0);

    $pdf->Cell(100,10, 'Fecha', 1 ,0,'',0);
    $pdf->Cell(95,10, $row['Fecha'], 1, 1,'', 0);

    $pdf->Cell(100,10, 'Nombre Local', 1 ,0,'',0);
    $pdf->Cell(95,10, $row['Nombre'], 1, 1,'', 0);

    $pdf->Cell(100,10, 'Ubicacion', 1 ,0,'',0);
    $pdf->Cell(95,10, $row['Ubicacion'], 1, 1,'', 0);

    $pdf->Cell(10,10, utf8_decode('N°'), 1,0,'',0);
    $pdf->Cell(130,10, utf8_decode('Preguntas Parte Instalaciones'), 1,0,'',0);
    $pdf->Cell(40,10, 'Observacion', 1 ,0,'',0);
    $pdf->Cell(15,10, 'Nota ', 1 ,1,'C',0);

    $pdf->Cell(10,10, utf8_decode('1'), 1,0,'',0);
    if($row['NotaInstalaciones1EstadoPisos'] > 4){
    $pdf->Cell(130,10, utf8_decode('¿Pisos limpios y en buen estado?'), 1,0,'',0);
    $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
    $pdf->Cell(15,10, $row['NotaInstalaciones1EstadoPisos'] , 1 ,1,'C',0);

        }elseif($row['NotaInstalaciones8EstadoLavaFondos'] == 0){
            $pdf->Cell(130,10, utf8_decode('¿Pisos limpios y en buen estado?'), 1,0,'',0);
            $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
            $pdf->Cell(15,10, $row['NotaInstalaciones8EstadoLavaFondos'] , 1 ,1,'C',0);
        }
        elseif($row['NotaInstalaciones1EstadoPisos'] < 4){
            $pdf->Cell(130,10, utf8_decode('¿Pisos limpios y en buen estado?'), 1,0,'',0);
            $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
            $pdf->Cell(15,10, $row['NotaInstalaciones1EstadoPisos'] , 1 ,1,'C',0);
        }elseif($row['NotaInstalaciones1EstadoPisos'] == 4){
            $pdf->Cell(130,10, utf8_decode('¿Pisos limpios y en buen estado?'), 1,0,'',0);
            $pdf->Cell(60,10, 'Regular', 1 ,0,'',0);
            $pdf->Cell(15,10, $row['NotaInstalaciones1EstadoPisos'] , 1 ,1,'C',0);
    }


    $pdf->Cell(10,10, utf8_decode('2'), 1,0,'',0);
    if($row['NotaInstalaciones2EstadoMuros'] > 4){
        $pdf->Cell(130,10, utf8_decode('¿Muros y zócalos limpios y en buen estado?'), 1,0,'',0);
        $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
        $pdf->Cell(15,10, $row['NotaInstalaciones2EstadoMuros'] , 1 ,1,'C',0);
    
        }elseif($row['NotaInstalaciones8EstadoLavaFondos'] == 0){
            $pdf->Cell(130,10, utf8_decode('¿Muros y zócalos limpios y en buen estado?'), 1,0,'',0);
            $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
            $pdf->Cell(15,10, $row['NotaInstalaciones8EstadoLavaFondos'] , 1 ,1,'C',0);
        }elseif($row['NotaInstalaciones2EstadoMuros'] < 4){
                $pdf->Cell(130,10, utf8_decode('¿Muros y zócalos limpios y en buen estado?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaInstalaciones2EstadoMuros'] , 1 ,1,'C',0);
        }elseif($row['NotaInstalaciones2EstadoMuros'] == 4){
                $pdf->Cell(130,10, utf8_decode('¿Muros y zócalos limpios y en buen estado?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaInstalaciones2EstadoMuros'] , 1 ,1,'C',0);
        }

    $pdf->Cell(10,10, utf8_decode('3'), 1,0,'',0);
    if($row['NotaInstalaciones3EstadoCielos'] > 4){
        $pdf->Cell(130,10, utf8_decode('¿Cielos limpios y en buen estado?'), 1,0,'',0);
        $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
        $pdf->Cell(15,10, $row['NotaInstalaciones3EstadoCielos'] , 1 ,1,'C',0);
        
        }elseif($row['NotaInstalaciones8EstadoLavaFondos'] == 0){
            $pdf->Cell(130,10, utf8_decode('¿Cielos limpios y en buen estado?'), 1,0,'',0);
            $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
            $pdf->Cell(15,10, $row['NotaInstalaciones8EstadoLavaFondos'] , 1 ,1,'C',0);
        }
        elseif($row['NotaInstalaciones2EstadoMuros'] < 4){
                $pdf->Cell(130,10, utf8_decode('¿Cielos limpios y en buen estado?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaInstalaciones3EstadoCielos'] , 1 ,1,'C',0);
        }elseif($row['NotaInstalaciones3EstadoCielos'] == 4){
                $pdf->Cell(130,10, utf8_decode('¿Cielos limpios y en buen estado?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);                   
                 $pdf->Cell(15,10, $row['NotaInstalaciones3EstadoCielos'] , 1 ,1,'C',0);
            }

            $pdf->Cell(10,10, utf8_decode('4'), 1,0,'',0);
            if($row['NotaInstalaciones4EstadoPuertas'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Puertas y ventanas limpias y en buen estado?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaInstalaciones4EstadoPuertas'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaInstalaciones8EstadoLavaFondos'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Puertas y ventanas limpias y en buen estado?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaInstalaciones8EstadoLavaFondos'] , 1 ,1,'C',0);
                } elseif($row['NotaInstalaciones4EstadoPuertas'] < 4){
                        $pdf->Cell(130,10, utf8_decode('¿Puertas y ventanas limpias y en buen estado?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones4EstadoPuertas'] , 1 ,1,'C',0);
                    }elseif($row['NotaInstalaciones4EstadoPuertas'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Puertas y ventanas limpias y en buen estado?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones4EstadoPuertas'] , 1 ,1,'C',0);
                    }
        


            $pdf->Cell(10,10, utf8_decode('5'), 1,0,'',0);
            if($row['NotaInstalaciones5EstadoIluminacion'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Iluminación limpias y en buen estado?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaInstalaciones5EstadoIluminacion'] , 1 ,1,'C',0);
                    }elseif($row['NotaInstalaciones8EstadoLavaFondos'] == 0){
                        $pdf->Cell(130,10, utf8_decode('¿Iluminación limpias y en buen estado?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones8EstadoLavaFondos'] , 1 ,1,'C',0);
                    }elseif($row['NotaInstalaciones5EstadoIluminacion'] < 4){

                        $pdf->Cell(130,10, utf8_decode('¿Iluminación limpias y en buen estado?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones5EstadoIluminacion'] , 1 ,1,'C',0);
                        }elseif($row['NotaInstalaciones5EstadoIluminacion'] == 4){
                            
                        $pdf->Cell(130,10, utf8_decode('¿Iluminación limpias y en buen estado?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones5EstadoIluminacion'] , 1 ,1,'C',0);
                            }
                

          $pdf->Cell(10,10, utf8_decode('6'), 1,0,'',0);
         if($row['NotaInstalaciones6EstadoSistemaInyeccion'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Sistema inyección y extracción limpios y en buen estado?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaInstalaciones6EstadoSistemaInyeccion'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaInstalaciones8EstadoLavaFondos'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Sistema inyección y extracción limpios y en buen estado?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaInstalaciones8EstadoLavaFondos'] , 1 ,1,'C',0);
                }elseif($row['NotaInstalaciones6EstadoSistemaInyeccion'] < 4){
                        $pdf->Cell(130,10, utf8_decode('¿Sistema inyección y extracción limpios y en buen estado?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones6EstadoSistemaInyeccion'] , 1 ,1,'C',0);
                    }elseif($row['NotaInstalaciones6EstadoSistemaInyeccion'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Sistema inyección y extracción limpios y en buen estado?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones6EstadoSistemaInyeccion'] , 1 ,1,'C',0);
                    }





        $pdf->Cell(10,10, utf8_decode('7'), 1,0,'',0);
         if($row['NotaInstalaciones7TemperaturaAmbiente22cc'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Temperatura ambiente (22°C)?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaInstalaciones7TemperaturaAmbiente22cc'] , 1 ,1,'C',0);
                    
                } elseif($row['NotaInstalaciones8EstadoLavaFondos'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Temperatura ambiente (22°C)?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaInstalaciones8EstadoLavaFondos'] , 1 ,1,'C',0);
                }elseif($row['NotaInstalaciones7TemperaturaAmbiente22cc'] < 4){
                        $pdf->Cell(130,10, utf8_decode('¿Temperatura ambiente (22°C)?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones7TemperaturaAmbiente22cc'] , 1 ,1,'C',0);
                    }elseif($row['NotaInstalaciones7TemperaturaAmbiente22cc'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Temperatura ambiente (22°C)?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones7TemperaturaAmbiente22cc'] , 1 ,1,'C',0);
                    }


         $pdf->Cell(10,10, utf8_decode('8'), 1,0,'',0);
         if($row['NotaInstalaciones8EstadoLavaFondos'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Lavafondos y lavamanos limpios y en buen estado?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaInstalaciones8EstadoLavaFondos'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaInstalaciones8EstadoLavaFondos'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Lavafondos y lavamanos limpios y en buen estado?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaInstalaciones8EstadoLavaFondos'] , 1 ,1,'C',0);
                }
                elseif($row['NotaInstalaciones8EstadoLavaFondos'] < 4){
                        $pdf->Cell(130,10, utf8_decode('¿Lavafondos y lavamanos limpios y en buen estado?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones8EstadoLavaFondos'] , 1 ,1,'C',0);
                    }elseif($row['NotaInstalaciones8EstadoLavaFondos'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Lavafondos y lavamanos limpios y en buen estado?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones8EstadoLavaFondos'] , 1 ,1,'C',0);
                    }
        
         $pdf->Cell(10,10, utf8_decode('9'), 1,0,'',0);
         if($row['NotaInstalaciones9EstadoCamaras'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Cámaras y desagües limpios y en buen estado?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaInstalaciones9EstadoCamaras'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaInstalaciones9EstadoCamaras'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Cámaras y desagües limpios y en buen estado?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaInstalaciones9EstadoCamaras'] , 1 ,1,'C',0);
                }
                elseif($row['NotaInstalaciones9EstadoCamaras'] < 4){
                        $pdf->Cell(130,10, utf8_decode('¿Cámaras y desagües limpios y en buen estado?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones9EstadoCamaras'] , 1 ,1,'C',0);
                    }elseif($row['NotaInstalaciones9EstadoCamaras'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Cámaras y desagües limpios y en buen estado?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones9EstadoCamaras'] , 1 ,1,'C',0);
                    }
        
         $pdf->Cell(10,10, utf8_decode('10'), 1,0,'',0);
         if($row['NotaInstalaciones10EstadoBasureros'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Basureros lavables, en buen estado, con tapa, sistema de pedal?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaInstalaciones10EstadoBasureros'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaInstalaciones10EstadoBasureros'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Basureros lavables, en buen estado, con tapa, sistema de pedal?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaInstalaciones10EstadoBasureros'] , 1 ,1,'C',0);
                }
                elseif($row['NotaInstalaciones10EstadoBasureros'] < 4){
                        $pdf->Cell(130,10, utf8_decode('¿Basureros lavables, en buen estado, con tapa, sistema de pedal?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones10EstadoBasureros'] , 1 ,1,'C',0);
                    }elseif($row['NotaInstalaciones10EstadoBasureros'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Basureros lavables, en buen estado, con tapa, sistema de pedal?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones10EstadoBasureros'] , 1 ,1,'C',0);
                    }
        
         $pdf->Cell(10,10, utf8_decode('11'), 1,0,'',0);
         if($row['NotaInstalaciones11BasurerosLimpios'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Basureros limpios y con bolsa?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaInstalaciones11BasurerosLimpios'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaInstalaciones11BasurerosLimpios'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Basureros limpios y con bolsa?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaInstalaciones11BasurerosLimpios'] , 1 ,1,'C',0);
                }
                elseif($row['NotaInstalaciones11BasurerosLimpios'] < 4){
                        $pdf->Cell(130,10, utf8_decode('¿Basureros limpios y con bolsa?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones11BasurerosLimpios'] , 1 ,1,'C',0);
                    }elseif($row['NotaInstalaciones11BasurerosLimpios'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Basureros limpios y con bolsa?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones11BasurerosLimpios'] , 1 ,1,'C',0);
                    }




         $pdf->Cell(10,10, utf8_decode('12'), 1,0,'',0);
         if($row['NotaInstalaciones12AusenciaPlagas'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Ausencia de plagas?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaInstalaciones12AusenciaPlagas'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaInstalaciones12AusenciaPlagas'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Ausencia de plagas?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaInstalaciones12AusenciaPlagas'] , 1 ,1,'C',0);
                }
                elseif($row['NotaInstalaciones12AusenciaPlagas'] < 4){
                        $pdf->Cell(130,10, utf8_decode('¿Ausencia de plagas?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones12AusenciaPlagas'] , 1 ,1,'C',0);
                    }elseif($row['NotaInstalaciones12AusenciaPlagas'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Ausencia de plagas?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones12AusenciaPlagas'] , 1 ,1,'C',0);
                    }





            $pdf->Cell(10,10, utf8_decode('13'), 1,0,'',0);
            if($row['NotaInstalaciones13ExisteJavonLavamanos'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Lavamanos: existencia de jabón y papel?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaInstalaciones13ExisteJavonLavamanos'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaInstalaciones13ExisteJavonLavamanos'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Lavamanos: existencia de jabón y papel?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaInstalaciones13ExisteJavonLavamanos'] , 1 ,1,'C',0);
                }
                elseif($row['NotaInstalaciones13ExisteJavonLavamanos'] < 4){
                        $pdf->Cell(130,10, utf8_decode('¿Lavamanos: existencia de jabón y papel?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones13ExisteJavonLavamanos'] , 1 ,1,'C',0);
                    }elseif($row['NotaInstalaciones13ExisteJavonLavamanos'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Lavamanos: existencia de jabón y papel?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones13ExisteJavonLavamanos'] , 1 ,1,'C',0);
                    }



            $pdf->Cell(10,10, utf8_decode('14'), 1,0,'',0);
            if($row['NotaInstalaciones14EstadoBanios'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Baños, artefactos limpios, ordenados y en buen estado?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaInstalaciones14EstadoBanios'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaInstalaciones14EstadoBanios'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Baños, artefactos limpios, ordenados y en buen estado?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaInstalaciones14EstadoBanios'] , 1 ,1,'C',0);
                }
                elseif($row['NotaInstalaciones14EstadoBanios'] < 4){
                        $pdf->Cell(130,10, utf8_decode('¿Baños, artefactos limpios, ordenados y en buen estado?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones14EstadoBanios'] , 1 ,1,'C',0);
                    }elseif($row['NotaInstalaciones14EstadoBanios'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Baños, artefactos limpios, ordenados y en buen estado?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones14EstadoBanios'] , 1 ,1,'C',0);
                    }





            $pdf->Cell(10,10, utf8_decode('15'), 1,0,'',0);
            if($row['NotaInstalaciones15AguaCalienteDisponible'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Disponibilidad de agua caliente?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaInstalaciones15AguaCalienteDisponible'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaInstalaciones15AguaCalienteDisponible'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Disponibilidad de agua caliente?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaInstalaciones15AguaCalienteDisponible'] , 1 ,1,'C',0);
                }
                elseif($row['NotaInstalaciones15AguaCalienteDisponible'] < 4){
                        $pdf->Cell(130,10, utf8_decode('¿Disponibilidad de agua caliente?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones15AguaCalienteDisponible'] , 1 ,1,'C',0);
                    }elseif($row['NotaInstalaciones15AguaCalienteDisponible'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Disponibilidad de agua caliente?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones15AguaCalienteDisponible'] , 1 ,1,'C',0);
                    }

            $pdf->Cell(10,10, utf8_decode('16'), 1,0,'',0);  
            if($row['NotaInstalaciones16VestidoresLimpios'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Vestidores limpios y ordenados?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaInstalaciones16VestidoresLimpios'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaInstalaciones16VestidoresLimpios'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Vestidores limpios y ordenados?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaInstalaciones16VestidoresLimpios'] , 1 ,1,'C',0);
                }
                elseif($row['NotaInstalaciones16VestidoresLimpios'] < 4){
                        $pdf->Cell(130,10, utf8_decode('¿Vestidores limpios y ordenados?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones16VestidoresLimpios'] , 1 ,1,'C',0);
                    }elseif($row['NotaInstalaciones16VestidoresLimpios'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Vestidores limpios y ordenados?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones16VestidoresLimpios'] , 1 ,1,'C',0);
                    }


            $pdf->Cell(10,10, utf8_decode('17'), 1,0,'',0);   
            if($row['NotaInstalaciones17EstadoMaquinas'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Maquinaria y artefactos limpios y en buen estado?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaInstalaciones17EstadoMaquinas'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaInstalaciones17EstadoMaquinas'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Maquinaria y artefactos limpios y en buen estado?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaInstalaciones17EstadoMaquinas'] , 1 ,1,'C',0);
                }
                elseif($row['NotaInstalaciones17EstadoMaquinas'] < 4){
                        $pdf->Cell(130,10, utf8_decode('¿Maquinaria y artefactos limpios y en buen estado?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones17EstadoMaquinas'] , 1 ,1,'C',0);
                    }elseif($row['NotaInstalaciones17EstadoMaquinas'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Maquinaria y artefactos limpios y en buen estado?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones17EstadoMaquinas'] , 1 ,1,'C',0);
                    }


            $pdf->Cell(10,10, utf8_decode('18'), 1,0,'',0);   
            if($row['NotaInstalaciones18EstadoMesones'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Mesones y repisas limpios y en buen estado?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaInstalaciones18EstadoMesones'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaInstalaciones18EstadoMesones'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Mesones y repisas limpios y en buen estado?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaInstalaciones18EstadoMesones'] , 1 ,1,'C',0);
                }
                elseif($row['NotaInstalaciones18EstadoMesones'] < 4){
                        $pdf->Cell(130,10, utf8_decode('Mesones y repisas limpios y en buen estado?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones18EstadoMesones'] , 1 ,1,'C',0);
                    }elseif($row['NotaInstalaciones18EstadoMesones'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Mesones y repisas limpios y en buen estado?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones18EstadoMesones'] , 1 ,1,'C',0);
                    }



            $pdf->Cell(10,10, utf8_decode('19'), 1,0,'',0);  
            if($row['NotaInstalaciones19ExistenciaUntensillos'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Existencia de utensilios necesarios?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaInstalaciones19ExistenciaUntensillos'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaInstalaciones19ExistenciaUntensillos'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Existencia de utensilios necesarios?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaInstalaciones19ExistenciaUntensillos'] , 1 ,1,'C',0);
                }
                elseif($row['NotaInstalaciones19ExistenciaUntensillos'] < 4){
                        $pdf->Cell(130,10, utf8_decode('¿Existencia de utensilios necesarios?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones19ExistenciaUntensillos'] , 1 ,1,'C',0);
                    }elseif($row['NotaInstalaciones19ExistenciaUntensillos'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Existencia de utensilios necesarios?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones19ExistenciaUntensillos'] , 1 ,1,'C',0);
                    }


            $pdf->Cell(10,10, utf8_decode('20'), 1,0,'',0);  
            if($row['NotaInstalaciones20EstadoUntensillos'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Utensilios limpios y en buen estado?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaInstalaciones20EstadoUntensillos'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaInstalaciones20EstadoUntensillos'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Utensilios limpios y en buen estado?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaInstalaciones20EstadoUntensillos'] , 1 ,1,'C',0);
                }
                elseif($row['NotaInstalaciones20EstadoUntensillos'] < 4){
                        $pdf->Cell(130,10, utf8_decode('¿Utensilios limpios y en buen estado?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones20EstadoUntensillos'] , 1 ,1,'C',0);
                    }elseif($row['NotaInstalaciones20EstadoUntensillos'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Utensilios limpios y en buen estado?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones20EstadoUntensillos'] , 1 ,1,'C',0);
                    }



            $pdf->Cell(10,10, utf8_decode('21'), 1,0,'',0);  
            if($row['NotaInstalaciones21EquiposDeRefrigeracion5C'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Equipos de refrigeración (0 a 5°C)?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaInstalaciones21EquiposDeRefrigeracion5C'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaInstalaciones21EquiposDeRefrigeracion5C'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Equipos de refrigeración (0 a 5°C)?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaInstalaciones21EquiposDeRefrigeracion5C'] , 1 ,1,'C',0);
                }
                elseif($row['NotaInstalaciones21EquiposDeRefrigeracion5C'] < 4){
                        $pdf->Cell(130,10, utf8_decode('¿Equipos de refrigeración (0 a 5°C)?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones21EquiposDeRefrigeracion5C'] , 1 ,1,'C',0);
                    }elseif($row['NotaInstalaciones21EquiposDeRefrigeracion5C'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Equipos de refrigeración (0 a 5°C)?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones21EquiposDeRefrigeracion5C'] , 1 ,1,'C',0);
                    }



            $pdf->Cell(10,10, utf8_decode('22'), 1,0,'',0);  
            if($row['NotaInstalaciones22EstadoEquiposDeFrio'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Equipos de frío limpios y en buen estado?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaInstalaciones22EstadoEquiposDeFrio'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaInstalaciones22EstadoEquiposDeFrio'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Equipos de frío limpios y en buen estado?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaInstalaciones22EstadoEquiposDeFrio'] , 1 ,1,'C',0);
                }
                elseif($row['NotaInstalaciones22EstadoEquiposDeFrio'] < 4){
                        $pdf->Cell(130,10, utf8_decode('¿Equipos de frío limpios y en buen estado?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones22EstadoEquiposDeFrio'] , 1 ,1,'C',0);
                    }elseif($row['NotaInstalaciones22EstadoEquiposDeFrio'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Equipos de frío limpios y en buen estado?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones22EstadoEquiposDeFrio'] , 1 ,1,'C',0);
                    }

            $pdf->Cell(10,10, utf8_decode('23'), 1,0,'',0);  
            if($row['NotaInstalaciones23EquiposDeCalor65C'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Equipos de calor (sobre 65°C)?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaInstalaciones23EquiposDeCalor65C'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaInstalaciones23EquiposDeCalor65C'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Equipos de calor (sobre 65°C)?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaInstalaciones23EquiposDeCalor65C'] , 1 ,1,'C',0);
                }
                elseif($row['NotaInstalaciones23EquiposDeCalor65C'] < 4){
                        $pdf->Cell(130,10, utf8_decode('¿Equipos de calor (sobre 65°C)?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones23EquiposDeCalor65C'] , 1 ,1,'C',0);
                    }elseif($row['NotaInstalaciones23EquiposDeCalor65C'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Equipos de calor (sobre 65°C)?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones23EquiposDeCalor65C'] , 1 ,1,'C',0);
                    }

            $pdf->Cell(10,10, utf8_decode('24'), 1,0,'',0);  
            if($row['NotaInstalaciones24EstadoEquiposDeCalor'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Equipos de calor limpios y en buen estado?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaInstalaciones24EstadoEquiposDeCalor'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaInstalaciones24EstadoEquiposDeCalor'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Equipos de calor limpios y en buen estado?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaInstalaciones24EstadoEquiposDeCalor'] , 1 ,1,'C',0);
                }
                elseif($row['NotaInstalaciones24EstadoEquiposDeCalor'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Equipos de calor limpios y en buen estado?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones24EstadoEquiposDeCalor'] , 1 ,1,'C',0);
                    }elseif($row['NotaInstalaciones24EstadoEquiposDeCalor'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Equipos de calor limpios y en buen estado?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaInstalaciones24EstadoEquiposDeCalor'] , 1 ,1,'C',0);
                    }


        $pdf->Cell(10,10, utf8_decode('PI'), 1,0,'',0);  
            if($row['promedioInstalaciones'] > 6){
                $pdf->Cell(130,10, utf8_decode('PROMEDIO INSTALACIONES'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['promedioInstalaciones'] , 1 ,1,'C',0);
                    
                }elseif($row['promedioInstalaciones'] == 0){
                    $pdf->Cell(130,10, utf8_decode('PROMEDIO INSTALACIONES'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['promedioInstalaciones'] , 1 ,1,'C',0);
                }elseif($row['promedioInstalaciones'] == 4){
                    $pdf->Cell(130,10, utf8_decode('PROMEDIO INSTALACIONES'), 1,0,'',0);
                    $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['promedioInstalaciones'] , 1 ,1,'C',0);
                    }elseif($row['promedioInstalaciones'] < 6){
                        $pdf->Cell(130,10,utf8_decode('PROMEDIO INSTALACIONES'), 1,0,'',0);
                        $pdf->Cell(40,10, 'En Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['promedioInstalaciones'] , 1 ,1,'C',0);
                    }


    $pdf->Cell(10,10, utf8_decode('N°'), 1,0,'',0);  
    $pdf->Cell(130,10, utf8_decode('Preguntas Parte Manipulaciones'), 1,0,'','');
    $pdf->Cell(40,10, 'Observacion', 1 ,0,'',0);
    $pdf->Cell(15,10, 'Nota ', 1 ,1,'C',0);
           

        $pdf->Cell(10,10, utf8_decode('25'), 1,0,'',0);  
            if($row['NotaManipulaciones1SanitizacionDeFrutas'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Sanitización de frutas y verduras en solución sanitizante?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaManipulaciones1SanitizacionDeFrutas'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaManipulaciones1SanitizacionDeFrutas'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Sanitización de frutas y verduras en solución sanitizante?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaManipulaciones1SanitizacionDeFrutas'] , 1 ,1,'C',0);
                }
                elseif($row['NotaManipulaciones1SanitizacionDeFrutas'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Sanitización de frutas y verduras en solución sanitizante?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipulaciones1SanitizacionDeFrutas'] , 1 ,1,'C',0);
                    }elseif($row['NotaManipulaciones1SanitizacionDeFrutas'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Sanitización de frutas y verduras en solución sanitizante?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipulaciones1SanitizacionDeFrutas'] , 1 ,1,'C',0);
                    }

        $pdf->Cell(10,10, utf8_decode('26'), 1,0,'',0);  
            if($row['NotaManipulaciones2SanitizacionDeUntensillos'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Sanitización de utensilios y superficies con solución sanitinzate?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaManipulaciones2SanitizacionDeUntensillos'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaManipulaciones2SanitizacionDeUntensillos'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Sanitización de utensilios y superficies con solución sanitinzate?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaManipulaciones2SanitizacionDeUntensillos'] , 1 ,1,'C',0);
                }
                elseif($row['NotaManipulaciones2SanitizacionDeUntensillos'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Sanitización de utensilios y superficies con solución sanitinzate?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipulaciones2SanitizacionDeUntensillos'] , 1 ,1,'C',0);
                    }elseif($row['NotaManipulaciones2SanitizacionDeUntensillos'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Sanitización de utensilios y superficies con solución sanitinzate?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipulaciones2SanitizacionDeUntensillos'] , 1 ,1,'C',0);
                    }

        $pdf->Cell(10,10, utf8_decode('27'), 1,0,'',0);  
            if($row['NotaManipulaciones3AlimentosProtegidosYrotulados'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Alimentos protegidos y rotulados?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaManipulaciones3AlimentosProtegidosYrotulados'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaManipulaciones3AlimentosProtegidosYrotulados'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Alimentos protegidos y rotulados.?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaManipulaciones3AlimentosProtegidosYrotulados'] , 1 ,1,'C',0);
                }
                elseif($row['NotaManipulaciones3AlimentosProtegidosYrotulados'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Alimentos protegidos y rotulados.?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipulaciones3AlimentosProtegidosYrotulados'] , 1 ,1,'C',0);
                    }elseif($row['NotaManipulaciones3AlimentosProtegidosYrotulados'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Alimentos protegidos y rotulados.?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipulaciones3AlimentosProtegidosYrotulados'] , 1 ,1,'C',0);
                    }

        $pdf->Cell(10,10, utf8_decode('28'), 1,0,'',0);  
            if($row['NotaManipulaciones4AlimentosCocidosAlmacenados'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Alimentos cocidos almacenados alejados de crudos?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaManipulaciones4AlimentosCocidosAlmacenados'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaManipulaciones4AlimentosCocidosAlmacenados'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Alimentos cocidos almacenados alejados de crudos?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaManipulaciones4AlimentosCocidosAlmacenados'] , 1 ,1,'C',0);
                }
                elseif($row['NotaManipulaciones4AlimentosCocidosAlmacenados'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Alimentos cocidos almacenados alejados de crudos?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipulaciones4AlimentosCocidosAlmacenados'] , 1 ,1,'C',0);
                    }elseif($row['NotaManipulaciones4AlimentosCocidosAlmacenados'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Alimentos cocidos almacenados alejados de crudos?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipulaciones4AlimentosCocidosAlmacenados'] , 1 ,1,'C',0);
                    }

        $pdf->Cell(10,10, utf8_decode('29'), 1,0,'',0);  
            if($row['NotaManipulaciones5OrdenAlTrabajar'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Orden al trabajar?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaManipulaciones5OrdenAlTrabajar'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaManipulaciones5OrdenAlTrabajar'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Orden al trabajar?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaManipulaciones5OrdenAlTrabajar'] , 1 ,1,'C',0);
                }
                elseif($row['NotaManipulaciones5OrdenAlTrabajar'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Orden al trabajar?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipulaciones5OrdenAlTrabajar'] , 1 ,1,'C',0);
                    }elseif($row['NotaManipulaciones5OrdenAlTrabajar'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Orden al trabajar?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipulaciones5OrdenAlTrabajar'] , 1 ,1,'C',0);
                    }

        $pdf->Cell(10,10, utf8_decode('30'), 1,0,'',0);  
            if($row['NotaManipulaciones6UsoProductosAutorizados'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Uso de productos autorizados?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaManipulaciones6UsoProductosAutorizados'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaManipulaciones6UsoProductosAutorizados'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Uso de productos autorizados?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaManipulaciones6UsoProductosAutorizados'] , 1 ,1,'C',0);
                }
                elseif($row['NotaManipulaciones6UsoProductosAutorizados'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Uso de productos autorizados?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipulaciones6UsoProductosAutorizados'] , 1 ,1,'C',0);
                    }elseif($row['NotaManipulaciones6UsoProductosAutorizados'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Uso de productos autorizados?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipulaciones6UsoProductosAutorizados'] , 1 ,1,'C',0);
                    }

        $pdf->Cell(10,10, utf8_decode('31'), 1,0,'',0);  
            if($row['NotaManipulaciones7AusenciaDeAlimentosSobrantes'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Ausencia de alimentos sobrantes y/o alterados?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaManipulaciones7AusenciaDeAlimentosSobrantes'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaManipulaciones7AusenciaDeAlimentosSobrantes'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Ausencia de alimentos sobrantes y/o alterados?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaManipulaciones7AusenciaDeAlimentosSobrantes'] , 1 ,1,'C',0);
                }
                elseif($row['NotaManipulaciones7AusenciaDeAlimentosSobrantes'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Ausencia de alimentos sobrantes y/o alterados?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipulaciones7AusenciaDeAlimentosSobrantes'] , 1 ,1,'C',0);
                    }elseif($row['NotaManipulaciones7AusenciaDeAlimentosSobrantes'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Ausencia de alimentos sobrantes y/o alterados?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipulaciones7AusenciaDeAlimentosSobrantes'] , 1 ,1,'C',0);
                    }
        $pdf->Cell(10,10, utf8_decode('32'), 1,0,'',0);  
            if($row['NotaManipulaciones8AusenciaDeProductosVencidos'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Ausencia de productos vencidos?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaManipulaciones8AusenciaDeProductosVencidos'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaManipulaciones8AusenciaDeProductosVencidos'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Ausencia de productos vencidos?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaManipulaciones8AusenciaDeProductosVencidos'] , 1 ,1,'C',0);
                }
                elseif($row['NotaManipulaciones8AusenciaDeProductosVencidos'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Ausencia de productos vencidos?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipulaciones8AusenciaDeProductosVencidos'] , 1 ,1,'C',0);
                    }elseif($row['NotaManipulaciones8AusenciaDeProductosVencidos'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Ausencia de productos vencidos?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipulaciones8AusenciaDeProductosVencidos'] , 1 ,1,'C',0);
                    }
        $pdf->Cell(10,10, utf8_decode('33'), 1,0,'',0);  
            if($row['NotaManipulaciones9ExistenciaYusoCorrectoDetergente'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Existencia y uso correcto de detergentes?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaManipulaciones9ExistenciaYusoCorrectoDetergente'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaManipulaciones9ExistenciaYusoCorrectoDetergente'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Existencia y uso correcto de detergentes?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaManipulaciones9ExistenciaYusoCorrectoDetergente'] , 1 ,1,'C',0);
                }
                elseif($row['NotaManipulaciones9ExistenciaYusoCorrectoDetergente'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Existencia y uso correcto de detergentes?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipulaciones9ExistenciaYusoCorrectoDetergente'] , 1 ,1,'C',0);
                    }elseif($row['NotaManipulaciones9ExistenciaYusoCorrectoDetergente'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Existencia y uso correcto de detergentes?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipulaciones9ExistenciaYusoCorrectoDetergente'] , 1 ,1,'C',0);
                    }


        $pdf->Cell(10,10, utf8_decode('34'), 1,0,'',0);  
            if($row['NotaManipulaciones10EstadoDilutores'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Dilutores y rociadores rotulados, limpios y en buen estado?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaManipulaciones10EstadoDilutores'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaManipulaciones10EstadoDilutores'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Dilutores y rociadores rotulados, limpios y en buen estado?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaManipulaciones10EstadoDilutores'] , 1 ,1,'C',0);
                }
                elseif($row['NotaManipulaciones10EstadoDilutores'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Dilutores y rociadores rotulados, limpios y en buen estado?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipulaciones10EstadoDilutores'] , 1 ,1,'C',0);
                    }elseif($row['NotaManipulaciones10EstadoDilutores'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Dilutores y rociadores rotulados, limpios y en buen estado?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipulaciones10EstadoDilutores'] , 1 ,1,'C',0);
                    }


                    
        $pdf->Cell(10,10, utf8_decode('35'), 1,0,'',0);  
            if($row['NotaManipulaciones11ExisteArtDeAseoYseguridad'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Existencia de artículos de aseo y seguridad?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaManipulaciones11ExisteArtDeAseoYseguridad'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaManipulaciones11ExisteArtDeAseoYseguridad'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Existencia de artículos de aseo y seguridad?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaManipulaciones11ExisteArtDeAseoYseguridad'] , 1 ,1,'C',0);
                }
                elseif($row['NotaManipulaciones11ExisteArtDeAseoYseguridad'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Existencia de artículos de aseo y seguridad?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipulaciones11ExisteArtDeAseoYseguridad'] , 1 ,1,'C',0);
                    }elseif($row['NotaManipulaciones11ExisteArtDeAseoYseguridad'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Existencia de artículos de aseo y seguridad?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipulaciones11ExisteArtDeAseoYseguridad'] , 1 ,1,'C',0);
                    }



        $pdf->Cell(10,10, utf8_decode('36'), 1,0,'',0);  
            if($row['NotaManipulaciones12AusenciaDeObjtAjenosManipulacion'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Ausencia de objetos ajenos a la manipulación?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaManipulaciones12AusenciaDeObjtAjenosManipulacion'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaManipulaciones12AusenciaDeObjtAjenosManipulacion'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Ausencia de objetos ajenos a la manipulación?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaManipulaciones12AusenciaDeObjtAjenosManipulacion'] , 1 ,1,'C',0);
                }
                elseif($row['NotaManipulaciones12AusenciaDeObjtAjenosManipulacion'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Ausencia de objetos ajenos a la manipulación?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipulaciones12AusenciaDeObjtAjenosManipulacion'] , 1 ,1,'C',0);
                    }elseif($row['NotaManipulaciones12AusenciaDeObjtAjenosManipulacion'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Ausencia de objetos ajenos a la manipulación?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipulaciones12AusenciaDeObjtAjenosManipulacion'] , 1 ,1,'C',0);
                    }


   $pdf->Cell(10,10, utf8_decode('37'), 1,0,'',0);  
            if($row['NotaManipulaciones13CumplimientoProcedimientos'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Cumplimiento de procedimientos?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaManipulaciones13CumplimientoProcedimientos'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaManipulaciones13CumplimientoProcedimientos'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Cumplimiento de procedimientos?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaManipulaciones13CumplimientoProcedimientos'] , 1 ,1,'C',0);
                }
                elseif($row['NotaManipulaciones13CumplimientoProcedimientos'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Cumplimiento de procedimientos?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipulaciones13CumplimientoProcedimientos'] , 1 ,1,'C',0);
                    }elseif($row['NotaManipulaciones13CumplimientoProcedimientos'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Cumplimiento de procedimientos?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipulaciones13CumplimientoProcedimientos'] , 1 ,1,'C',0);
                    }

        $pdf->Cell(10,10, utf8_decode('38'), 1,0,'',0);  
            if($row['NotaManipulaciones14AusenciaContaminacionCruzada'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Ausencia de contaminación cruzada?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaManipulaciones14AusenciaContaminacionCruzada'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaManipulaciones14AusenciaContaminacionCruzada'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Ausencia de contaminación cruzada?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaManipulaciones14AusenciaContaminacionCruzada'] , 1 ,1,'C',0);
                }
                elseif($row['NotaManipulaciones14AusenciaContaminacionCruzada'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Ausencia de contaminación cruzada?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipulaciones14AusenciaContaminacionCruzada'] , 1 ,1,'C',0);
                    }elseif($row['NotaManipulaciones14AusenciaContaminacionCruzada'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Ausencia de contaminación cruzada?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipulaciones14AusenciaContaminacionCruzada'] , 1 ,1,'C',0);
                    }

        $pdf->Cell(10,10, utf8_decode('39'), 1,0,'',0);  
            if($row['NotaManipulaciones15LavadoDeManosFrecuente'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Lavado frecuente y eficiente de manos?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaManipulaciones15LavadoDeManosFrecuente'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaManipulaciones15LavadoDeManosFrecuente'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Lavado frecuente y eficiente de manos?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaManipulaciones15LavadoDeManosFrecuente'] , 1 ,1,'C',0);
                }
                elseif($row['NotaManipulaciones15LavadoDeManosFrecuente'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Lavado frecuente y eficiente de manos?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipulaciones15LavadoDeManosFrecuente'] , 1 ,1,'C',0);
                    }elseif($row['NotaManipulaciones15LavadoDeManosFrecuente'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Lavado frecuente y eficiente de manos?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipulaciones15LavadoDeManosFrecuente'] , 1 ,1,'C',0);
                    }

        $pdf->Cell(10,10, utf8_decode('PM'), 1,0,'',0);  
            if($row['promedioManipulaciones'] > 6){
                $pdf->Cell(130,10, utf8_decode('PROMEDIO MANIPULACIONES'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['promedioManipulaciones'] , 1 ,1,'C',0);
                    
                }elseif($row['promedioManipulaciones'] == 0){
                    $pdf->Cell(130,10, utf8_decode('PROMEDIO MANIPULACIONES'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['promedioManipulaciones'] , 1 ,1,'C',0);
                }elseif($row['promedioManipulaciones'] == 4){
                    $pdf->Cell(130,10, utf8_decode('PROMEDIO MANIPULACIONES'), 1,0,'',0);
                    $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['promedioManipulaciones'] , 1 ,1,'C',0);
                    }elseif($row['promedioManipulaciones'] < 6){
                        $pdf->Cell(130,10,utf8_decode('PROMEDIO MANIPULACIONES'), 1,0,'',0);
                        $pdf->Cell(40,10, 'En Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['promedioManipulaciones'] , 1 ,1,'C',0);
                    }


    $pdf->Cell(10,10, utf8_decode('N°'), 1,0,'',0);  
    $pdf->Cell(130,10, utf8_decode('Preguntas Parte Manipuladores'), 1,0,'','');
    $pdf->Cell(40,10, 'Observacion', 1 ,0,'',0);
    $pdf->Cell(15,10, 'Nota ', 1 ,1,'C',0);
           

        $pdf->Cell(10,10, utf8_decode('40'), 1,0,'',0);  
            if($row['NotaManipuladores1EstadoUniforme'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Uniforme limpio, completo y en buen estado?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaManipuladores1EstadoUniforme'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaManipuladores1EstadoUniforme'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Uniforme limpio, completo y en buen estado?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaManipuladores1EstadoUniforme'] , 1 ,1,'C',0);
                }
                elseif($row['NotaManipuladores1EstadoUniforme'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Uniforme limpio, completo y en buen estado?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipuladores1EstadoUniforme'] , 1 ,1,'C',0);
                    }elseif($row['NotaManipuladores1EstadoUniforme'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Uniforme limpio, completo y en buen estado?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipuladores1EstadoUniforme'] , 1 ,1,'C',0);
                    }
                    
        $pdf->Cell(10,10, utf8_decode('41'), 1,0,'',0);  
            if($row['NotaManipuladores2UsoDeMascarillas'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Uso de mascarilla y guantes, si corresponde?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaManipuladores2UsoDeMascarillas'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaManipuladores2UsoDeMascarillas'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Uso de mascarilla y guantes, si corresponde?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaManipuladores2UsoDeMascarillas'] , 1 ,1,'C',0);
                }
                elseif($row['NotaManipuladores2UsoDeMascarillas'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Uso de mascarilla y guantes, si corresponde?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipuladores2UsoDeMascarillas'] , 1 ,1,'C',0);
                    }elseif($row['NotaManipuladores2UsoDeMascarillas'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Uso de mascarilla y guantes, si corresponde?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipuladores2UsoDeMascarillas'] , 1 ,1,'C',0);
                    }     

        $pdf->Cell(10,10, utf8_decode('42'), 1,0,'',0);  
            if($row['NotaManipuladores3PresentacionPersonal'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Presentación personal?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaManipuladores3PresentacionPersonal'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaManipuladores3PresentacionPersonal'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Presentación personal?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaManipuladores3PresentacionPersonal'] , 1 ,1,'C',0);
                }
                elseif($row['NotaManipuladores3PresentacionPersonal'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Presentación personal?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipuladores3PresentacionPersonal'] , 1 ,1,'C',0);
                    }elseif($row['NotaManipuladores3PresentacionPersonal'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Presentación personal?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipuladores3PresentacionPersonal'] , 1 ,1,'C',0);
                    }     

        $pdf->Cell(10,10, utf8_decode('43'), 1,0,'',0);  
            if($row['NotaManipuladores4HabitosHigienicos'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Hábitos higiénicos?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaManipuladores4HabitosHigienicos'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaManipuladores4HabitosHigienicos'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Hábitos higiénicos?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaManipuladores4HabitosHigienicos'] , 1 ,1,'C',0);
                }
                elseif($row['NotaManipuladores4HabitosHigienicos'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Hábitos higiénicos?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipuladores4HabitosHigienicos'] , 1 ,1,'C',0);
                    }elseif($row['NotaManipuladores4HabitosHigienicos'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Hábitos higiénicos?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaManipuladores4HabitosHigienicos'] , 1 ,1,'C',0);
                    }   
                    
                    
        $pdf->Cell(10,10, utf8_decode('PM'), 1,0,'',0);  
            if($row['promedioManipuladores'] > 6){
                $pdf->Cell(130,10, utf8_decode('PROMEDIO MANIPULADORES'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['promedioManipuladores'] , 1 ,1,'C',0);
                    
                }elseif($row['promedioManipuladores'] == 0){
                    $pdf->Cell(130,10, utf8_decode('PROMEDIO MANIPULADORES'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['promedioManipuladores'] , 1 ,1,'C',0);
                }elseif($row['promedioManipuladores'] == 4){
                    $pdf->Cell(130,10, utf8_decode('PROMEDIO MANIPULADORES'), 1,0,'',0);
                    $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['promedioManipuladores'] , 1 ,1,'C',0);
                    }elseif($row['promedioManipuladores'] < 6){
                        $pdf->Cell(130,10,utf8_decode('PROMEDIO MANIPULADORES'), 1,0,'',0);
                        $pdf->Cell(40,10, 'En Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['promedioManipuladores'] , 1 ,1,'C',0);
                    }



            $pdf->Cell(10,10, utf8_decode('N°'), 1,0,'',0);  
            $pdf->Cell(130,10, utf8_decode('PREGUNTAS PARTE PUNTOS CRITICOS EN ALIMENTOS'), 1,0,'','');
            $pdf->Cell(40,10, 'Observacion', 1 ,0,'',0);
            $pdf->Cell(15,10, 'Nota ', 1 ,1,'C',0);



 $pdf->Cell(10,10, utf8_decode('44'), 1,0,'',0);  
            if($row['NotaControlesPuntoCriticosEnAlimentos1TemperaturaCoccion65cc'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Temperatura de cocción (mayor a 65°C)?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaControlesPuntoCriticosEnAlimentos1TemperaturaCoccion65cc'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaControlesPuntoCriticosEnAlimentos1TemperaturaCoccion65cc'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Temperatura de cocción (mayor a 65°C)?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaControlesPuntoCriticosEnAlimentos1TemperaturaCoccion65cc'] , 1 ,1,'C',0);
                }
                elseif($row['NotaControlesPuntoCriticosEnAlimentos1TemperaturaCoccion65cc'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Temperatura de cocción (mayor a 65°C)?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaControlesPuntoCriticosEnAlimentos1TemperaturaCoccion65cc'] , 1 ,1,'C',0);
                    }elseif($row['NotaControlesPuntoCriticosEnAlimentos1TemperaturaCoccion65cc'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Temperatura de cocción (mayor a 65°C)?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaControlesPuntoCriticosEnAlimentos1TemperaturaCoccion65cc'] , 1 ,1,'C',0);
                    }   
                    
        $pdf->Cell(10,10, utf8_decode('45'), 1,0,'',0);  
            if($row['NotaControlesPuntoCriticosEnAlimentos2TempCalentMayor75cc'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Temperatura de recalentamiento (mayor 74°C)?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaControlesPuntoCriticosEnAlimentos2TempCalentMayor75cc'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaControlesPuntoCriticosEnAlimentos2TempCalentMayor75cc'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Temperatura de recalentamiento (mayor 74°C)?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaControlesPuntoCriticosEnAlimentos2TempCalentMayor75cc'] , 1 ,1,'C',0);
                }
                elseif($row['NotaControlesPuntoCriticosEnAlimentos2TempCalentMayor75cc'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Temperatura de recalentamiento (mayor 74°C)?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaControlesPuntoCriticosEnAlimentos2TempCalentMayor75cc'] , 1 ,1,'C',0);
                    }elseif($row['NotaControlesPuntoCriticosEnAlimentos2TempCalentMayor75cc'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Temperatura de recalentamiento (mayor 74°C)?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaControlesPuntoCriticosEnAlimentos2TempCalentMayor75cc'] , 1 ,1,'C',0);
                    }
                    
        $pdf->Cell(10,10, utf8_decode('46'), 1,0,'',0);  
            if($row['NotaControlesPuntoCriticosEnAlimentos3TempRefrigeracion0a5cc'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Temperatura de refrigeración (0 a 5°C)?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaControlesPuntoCriticosEnAlimentos3TempRefrigeracion0a5cc'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaControlesPuntoCriticosEnAlimentos3TempRefrigeracion0a5cc'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Temperatura de refrigeración (0 a 5°C)?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaControlesPuntoCriticosEnAlimentos3TempRefrigeracion0a5cc'] , 1 ,1,'C',0);
                }
                elseif($row['NotaControlesPuntoCriticosEnAlimentos3TempRefrigeracion0a5cc'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Temperatura de refrigeración (0 a 5°C)?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaControlesPuntoCriticosEnAlimentos3TempRefrigeracion0a5cc'] , 1 ,1,'C',0);
                    }elseif($row['NotaControlesPuntoCriticosEnAlimentos3TempRefrigeracion0a5cc'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Temperatura de refrigeración (0 a 5°C)?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaControlesPuntoCriticosEnAlimentos3TempRefrigeracion0a5cc'] , 1 ,1,'C',0);
                    } 
                    
                    
        $pdf->Cell(10,10, utf8_decode('47'), 1,0,'',0);  
            if($row['NotaControlesPuntoCriticosEnAlimentos4TempCongelacionMenos18cc'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Temperatura de congelación (-18°C)?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaControlesPuntoCriticosEnAlimentos4TempCongelacionMenos18cc'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaControlesPuntoCriticosEnAlimentos4TempCongelacionMenos18cc'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Temperatura de congelación (-18°C)?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaControlesPuntoCriticosEnAlimentos4TempCongelacionMenos18cc'] , 1 ,1,'C',0);
                }
                elseif($row['NotaControlesPuntoCriticosEnAlimentos4TempCongelacionMenos18cc'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Temperatura de congelación (-18°C)?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaControlesPuntoCriticosEnAlimentos4TempCongelacionMenos18cc'] , 1 ,1,'C',0);
                    }elseif($row['NotaControlesPuntoCriticosEnAlimentos4TempCongelacionMenos18cc'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Temperatura de congelación (-18°C)?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaControlesPuntoCriticosEnAlimentos4TempCongelacionMenos18cc'] , 1 ,1,'C',0);
                    } 

                      
        $pdf->Cell(10,10, utf8_decode('48'), 1,0,'',0);  
            if($row['NotaControlesPuntoCriticosEnAlimentos5ExibiAlimentFormCorrecta'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Exibicion de alimentos de manera correcta y segura?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaControlesPuntoCriticosEnAlimentos5ExibiAlimentFormCorrecta'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaControlesPuntoCriticosEnAlimentos5ExibiAlimentFormCorrecta'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Exibicion de alimentos de manera correcta y segura?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaControlesPuntoCriticosEnAlimentos5ExibiAlimentFormCorrecta'] , 1 ,1,'C',0);
                }
                elseif($row['NotaControlesPuntoCriticosEnAlimentos5ExibiAlimentFormCorrecta'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Exibicion de alimentos de manera correcta y segura?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaControlesPuntoCriticosEnAlimentos5ExibiAlimentFormCorrecta'] , 1 ,1,'C',0);
                    }elseif($row['NotaControlesPuntoCriticosEnAlimentos5ExibiAlimentFormCorrecta'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Exibicion de alimentos de manera correcta y segura?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaControlesPuntoCriticosEnAlimentos5ExibiAlimentFormCorrecta'] , 1 ,1,'C',0);
                    }


        $pdf->Cell(10,10, utf8_decode('PM'), 1,0,'',0);  
            if($row['promedioControlesPuntoCriticosEnAlimentos'] > 6){
                $pdf->Cell(130,10, utf8_decode('PROMEDIO PUNTOS CRITICOS EN ALIMENTOS'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['promedioControlesPuntoCriticosEnAlimentos'] , 1 ,1,'C',0);
                    
                }elseif($row['promedioControlesPuntoCriticosEnAlimentos'] == 0){
                    $pdf->Cell(130,10, utf8_decode('PROMEDIO PUNTOS CRITICOS EN ALIMENTOS'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['promedioControlesPuntoCriticosEnAlimentos'] , 1 ,1,'C',0);
                }elseif($row['promedioControlesPuntoCriticosEnAlimentos'] == 4){
                    $pdf->Cell(130,10, utf8_decode('PROMEDIO PUNTOS CRITICOS EN ALIMENTOS'), 1,0,'',0);
                    $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['promedioControlesPuntoCriticosEnAlimentos'] , 1 ,1,'C',0);
                    }elseif($row['promedioControlesPuntoCriticosEnAlimentos'] < 6){
                        $pdf->Cell(130,10,utf8_decode('PROMEDIO PUNTOS CRITICOS EN ALIMENTOS'), 1,0,'',0);
                        $pdf->Cell(40,10, 'En Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['promedioControlesPuntoCriticosEnAlimentos'] , 1 ,1,'C',0);
                    }


            $pdf->Cell(10,10, utf8_decode('N°'), 1,0,'',0);  
            $pdf->Cell(130,10, utf8_decode('PREGUNTA PARTE RECEPCION Y ALMACENAMIENTO'), 1,0,'','');
            $pdf->Cell(40,10, 'Observacion', 1 ,0,'',0);
            $pdf->Cell(15,10, 'Nota ', 1 ,1,'C',0);


        $pdf->Cell(10,10, utf8_decode('49'), 1,0,'',0);  
            if($row['NotaRecepcionYAlmacenamiento1ControlParametrosRecepcion'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Control de parámetros en la recepción?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaRecepcionYAlmacenamiento1ControlParametrosRecepcion'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaRecepcionYAlmacenamiento1ControlParametrosRecepcion'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Control de parámetros en la recepción?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaRecepcionYAlmacenamiento1ControlParametrosRecepcion'] , 1 ,1,'C',0);
                }
                elseif($row['NotaRecepcionYAlmacenamiento1ControlParametrosRecepcion'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Control de parámetros en la recepción?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaRecepcionYAlmacenamiento1ControlParametrosRecepcion'] , 1 ,1,'C',0);
                    }elseif($row['NotaRecepcionYAlmacenamiento1ControlParametrosRecepcion'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Control de parámetros en la recepción?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaRecepcionYAlmacenamiento1ControlParametrosRecepcion'] , 1 ,1,'C',0);
                    }


        $pdf->Cell(10,10, utf8_decode('50'), 1,0,'',0);  
            if($row['NotaRecepcionYAlmacenamiento2MateriasPrimasRotuladas'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Materias primas rotuladas?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaRecepcionYAlmacenamiento2MateriasPrimasRotuladas'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaRecepcionYAlmacenamiento2MateriasPrimasRotuladas'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Materias primas rotuladas?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaRecepcionYAlmacenamiento2MateriasPrimasRotuladas'] , 1 ,1,'C',0);
                }
                elseif($row['NotaRecepcionYAlmacenamiento2MateriasPrimasRotuladas'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Materias primas rotuladas?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaRecepcionYAlmacenamiento2MateriasPrimasRotuladas'] , 1 ,1,'C',0);
                    }elseif($row['NotaRecepcionYAlmacenamiento2MateriasPrimasRotuladas'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Materias primas rotuladas?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaRecepcionYAlmacenamiento2MateriasPrimasRotuladas'] , 1 ,1,'C',0);
                    }



        $pdf->Cell(10,10, utf8_decode('51'), 1,0,'',0);  
            if($row['NotaRecepcionYAlmacenamiento3AlmEnAlturaYordenado'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Almacenamiento en altura y separado de paredes, ordenado?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaRecepcionYAlmacenamiento3AlmEnAlturaYordenado'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaRecepcionYAlmacenamiento3AlmEnAlturaYordenado'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Almacenamiento en altura y separado de paredes, ordenado?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaRecepcionYAlmacenamiento3AlmEnAlturaYordenado'] , 1 ,1,'C',0);
                }
                elseif($row['NotaRecepcionYAlmacenamiento3AlmEnAlturaYordenado'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Almacenamiento en altura y separado de paredes, ordenado?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaRecepcionYAlmacenamiento3AlmEnAlturaYordenado'] , 1 ,1,'C',0);
                    }elseif($row['NotaRecepcionYAlmacenamiento3AlmEnAlturaYordenado'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Almacenamiento en altura y separado de paredes, ordenado?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaRecepcionYAlmacenamiento3AlmEnAlturaYordenado'] , 1 ,1,'C',0);
                    }


        $pdf->Cell(10,10, utf8_decode('52'), 1,0,'',0);  
            if($row['NotaRecepcionYAlmacenamiento4AlmFueraEmvacesSecun'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Almacenamiento fuera de envase secundario?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaRecepcionYAlmacenamiento4AlmFueraEmvacesSecun'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaRecepcionYAlmacenamiento4AlmFueraEmvacesSecun'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Almacenamiento fuera de envase secundario?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaRecepcionYAlmacenamiento4AlmFueraEmvacesSecun'] , 1 ,1,'C',0);
                }
                elseif($row['NotaRecepcionYAlmacenamiento4AlmFueraEmvacesSecun'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Almacenamiento fuera de envase secundario?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaRecepcionYAlmacenamiento4AlmFueraEmvacesSecun'] , 1 ,1,'C',0);
                    }elseif($row['NotaRecepcionYAlmacenamiento4AlmFueraEmvacesSecun'] == 4){
                        $pdf->Cell(130,10, utf8_decode('Almacenamiento fuera de envase secundario?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaRecepcionYAlmacenamiento4AlmFueraEmvacesSecun'] , 1 ,1,'C',0);
                    }



        $pdf->Cell(10,10, utf8_decode('53'), 1,0,'',0);  
            if($row['NotaRecepcionYAlmacenamiento5CumplimientoDeFEFO'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Cumplimiento de FEFO?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaRecepcionYAlmacenamiento5CumplimientoDeFEFO'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaRecepcionYAlmacenamiento5CumplimientoDeFEFO'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Cumplimiento de FEFO?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaRecepcionYAlmacenamiento5CumplimientoDeFEFO'] , 1 ,1,'C',0);
                }
                elseif($row['NotaRecepcionYAlmacenamiento5CumplimientoDeFEFO'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Cumplimiento de FEFO?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaRecepcionYAlmacenamiento5CumplimientoDeFEFO'] , 1 ,1,'C',0);
                    }elseif($row['NotaRecepcionYAlmacenamiento5CumplimientoDeFEFO'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Cumplimiento de FEFO?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaRecepcionYAlmacenamiento5CumplimientoDeFEFO'] , 1 ,1,'C',0);
                    }
                

        $pdf->Cell(10,10, utf8_decode('54'), 1,0,'',0);  
            if($row['NotaRecepcionYAlmacenamiento6MatAlejadasQuimicos'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Materias primas alejadas de químicos?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaRecepcionYAlmacenamiento6MatAlejadasQuimicos'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaRecepcionYAlmacenamiento6MatAlejadasQuimicos'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Materias primas alejadas de químicos?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaRecepcionYAlmacenamiento6MatAlejadasQuimicos'] , 1 ,1,'C',0);
                }
                elseif($row['NotaRecepcionYAlmacenamiento6MatAlejadasQuimicos'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Materias primas alejadas de químicos?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaRecepcionYAlmacenamiento6MatAlejadasQuimicos'] , 1 ,1,'C',0);
                    }elseif($row['NotaRecepcionYAlmacenamiento6MatAlejadasQuimicos'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Materias primas alejadas de químicos?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaRecepcionYAlmacenamiento6MatAlejadasQuimicos'] , 1 ,1,'C',0);
                    }


        $pdf->Cell(10,10, utf8_decode('PR'), 1,0,'',0);  
            if($row['promedioRecepcionYAlmacenamiento'] > 6){
                $pdf->Cell(130,10, utf8_decode('PROMEDIO RECEPCION Y ALMACENAMIENTO'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['promedioRecepcionYAlmacenamiento'] , 1 ,1,'C',0);
                    
                }elseif($row['promedioRecepcionYAlmacenamiento'] == 0){
                    $pdf->Cell(130,10, utf8_decode('PROMEDIO RECEPCION Y ALMACENAMIENTO'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['promedioRecepcionYAlmacenamiento'] , 1 ,1,'C',0);
                }elseif($row['promedioRecepcionYAlmacenamiento'] == 4){
                    $pdf->Cell(130,10, utf8_decode('PROMEDIO RECEPCION Y ALMACENAMIENTO'), 1,0,'',0);
                    $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['promedioRecepcionYAlmacenamiento'] , 1 ,1,'C',0);
                    }elseif($row['promedioRecepcionYAlmacenamiento'] < 6){
                        $pdf->Cell(130,10,utf8_decode('PROMEDIO RECEPCION Y ALMACENAMIENTO'), 1,0,'',0);
                        $pdf->Cell(40,10, 'En Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['promedioRecepcionYAlmacenamiento'] , 1 ,1,'C',0);
                    }

                    $pdf->Cell(10,10, utf8_decode('N°'), 1,0,'',0);  
                    $pdf->Cell(130,10, utf8_decode('PREGUNTA PARTE DOCUMENTACION'), 1,0,'','');
                    $pdf->Cell(40,10, 'Observacion', 1 ,0,'',0);
                    $pdf->Cell(15,10, 'Nota ', 1 ,1,'C',0);


        $pdf->Cell(10,10, utf8_decode('55'), 1,0,'',0);  
            if($row['NotaDocumentacion1LibroDeInspeccion'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Libro de Inspección y Resoluciones Sanitarias?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaDocumentacion1LibroDeInspeccion'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaDocumentacion1LibroDeInspeccion'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Libro de Inspección y Resoluciones Sanitarias?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaDocumentacion1LibroDeInspeccion'] , 1 ,1,'C',0);
                }
                elseif($row['NotaDocumentacion1LibroDeInspeccion'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Libro de Inspección y Resoluciones Sanitarias?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaDocumentacion1LibroDeInspeccion'] , 1 ,1,'C',0);
                    }elseif($row['NotaDocumentacion1LibroDeInspeccion'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Libro de Inspección y Resoluciones Sanitarias?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaDocumentacion1LibroDeInspeccion'] , 1 ,1,'C',0);
                    }

        $pdf->Cell(10,10, utf8_decode('56'), 1,0,'',0);  
            if($row['NotaDocumentacion2GPMmanualReg6meses'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿GMP, Manual y registros de 6 meses?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaDocumentacion2GPMmanualReg6meses'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaDocumentacion2GPMmanualReg6meses'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿GMP, Manual y registros de 6 meses?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaDocumentacion2GPMmanualReg6meses'] , 1 ,1,'C',0);
                }
                elseif($row['NotaDocumentacion2GPMmanualReg6meses'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿GMP, Manual y registros de 6 meses?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaDocumentacion2GPMmanualReg6meses'] , 1 ,1,'C',0);
                    }elseif($row['NotaDocumentacion2GPMmanualReg6meses'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿GMP, Manual y registros de 6 meses?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaDocumentacion2GPMmanualReg6meses'] , 1 ,1,'C',0);
                    }

        $pdf->Cell(10,10, utf8_decode('57'), 1,0,'',0);  
            if($row['NotaDocumentacion3GPMcompleto'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿GMP completo?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaDocumentacion3GPMcompleto'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaDocumentacion3GPMcompleto'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿GMP completo?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaDocumentacion3GPMcompleto'] , 1 ,1,'C',0);
                }
                elseif($row['NotaDocumentacion3GPMcompleto'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿GMP completo?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaDocumentacion3GPMcompleto'] , 1 ,1,'C',0);
                    }elseif($row['NotaDocumentacion3GPMcompleto'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿GMP completo?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaDocumentacion3GPMcompleto'] , 1 ,1,'C',0);
                    }


        $pdf->Cell(10,10, utf8_decode('58'), 1,0,'',0);  
            if($row['NotaDocumentacion4CertificacionDeFumigacion'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Certificación de fumigación?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaDocumentacion4CertificacionDeFumigacion'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaDocumentacion4CertificacionDeFumigacion'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Certificación de fumigación?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaDocumentacion4CertificacionDeFumigacion'] , 1 ,1,'C',0);
                }
                elseif($row['NotaDocumentacion4CertificacionDeFumigacion'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Certificación de fumigación?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaDocumentacion4CertificacionDeFumigacion'] , 1 ,1,'C',0);
                    }elseif($row['NotaDocumentacion4CertificacionDeFumigacion'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Certificación de fumigación?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaDocumentacion4CertificacionDeFumigacion'] , 1 ,1,'C',0);
                    }

        $pdf->Cell(10,10, utf8_decode('59'), 1,0,'',0);  
            if($row['NotaDocumentacion5CertificadoRetiroAceite'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Certificado de retiro de aceite?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaDocumentacion5CertificadoRetiroAceite'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaDocumentacion5CertificadoRetiroAceite'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Certificado de retiro de aceite?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaDocumentacion5CertificadoRetiroAceite'] , 1 ,1,'C',0);
                }
                elseif($row['NotaDocumentacion5CertificadoRetiroAceite'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Certificado de retiro de aceite?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaDocumentacion5CertificadoRetiroAceite'] , 1 ,1,'C',0);
                    }elseif($row['NotaDocumentacion5CertificadoRetiroAceite'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Certificado de retiro de aceite?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaDocumentacion5CertificadoRetiroAceite'] , 1 ,1,'C',0);
                    }

        $pdf->Cell(10,10, utf8_decode('60'), 1,0,'',0);  
            if($row['NotaDocumentacion6ControlDeAceite'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Control de acidez de aceite usado?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaDocumentacion6ControlDeAceite'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaDocumentacion6ControlDeAceite'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Control de acidez de aceite usado?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaDocumentacion6ControlDeAceite'] , 1 ,1,'C',0);
                }
                elseif($row['NotaDocumentacion6ControlDeAceite'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Control de acidez de aceite usado?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaDocumentacion6ControlDeAceite'] , 1 ,1,'C',0);
                    }elseif($row['NotaDocumentacion6ControlDeAceite'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Control de acidez de aceite usado?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaDocumentacion6ControlDeAceite'] , 1 ,1,'C',0);
                    }


        $pdf->Cell(10,10, utf8_decode('61'), 1,0,'',0);  
            if($row['NotaDocumentacion7AuditoriaAnteriores'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Auditorias anteriores?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaDocumentacion7AuditoriaAnteriores'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaDocumentacion7AuditoriaAnteriores'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Auditorias anteriores?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaDocumentacion7AuditoriaAnteriores'] , 1 ,1,'C',0);
                }
                elseif($row['NotaDocumentacion7AuditoriaAnteriores'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Auditorias anteriores?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaDocumentacion7AuditoriaAnteriores'] , 1 ,1,'C',0);
                    }elseif($row['NotaDocumentacion7AuditoriaAnteriores'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Auditorias anteriores?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaDocumentacion7AuditoriaAnteriores'] , 1 ,1,'C',0);
                    }

        $pdf->Cell(10,10, utf8_decode('62'), 1,0,'',0);  
            if($row['NotaDocumentacion8CarpetaOrdenadaYactualizada'] > 4){
                $pdf->Cell(130,10, utf8_decode('¿Carpeta ordenada y actualizada?'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['NotaDocumentacion8CarpetaOrdenadaYactualizada'] , 1 ,1,'C',0);
                    
                }elseif($row['NotaDocumentacion8CarpetaOrdenadaYactualizada'] == 0){
                    $pdf->Cell(130,10, utf8_decode('¿Carpeta ordenada y actualizada?'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['NotaDocumentacion8CarpetaOrdenadaYactualizada'] , 1 ,1,'C',0);
                }
                elseif($row['NotaDocumentacion8CarpetaOrdenadaYactualizada'] < 4){
                        $pdf->Cell(130,10,utf8_decode('¿Carpeta ordenada y actualizada?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaDocumentacion8CarpetaOrdenadaYactualizada'] , 1 ,1,'C',0);
                    }elseif($row['NotaDocumentacion8CarpetaOrdenadaYactualizada'] == 4){
                        $pdf->Cell(130,10, utf8_decode('¿Carpeta ordenada y actualizada?'), 1,0,'',0);
                        $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['NotaDocumentacion8CarpetaOrdenadaYactualizada'] , 1 ,1,'C',0);
                    }

        $pdf->Cell(10,10, utf8_decode('PD'), 1,0,'',0);  
            if($row['promedioDocumentacion'] > 6){
                $pdf->Cell(130,10, utf8_decode('PROMEDIO DOCUMENTACION'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['promedioDocumentacion'] , 1 ,1,'C',0);
                    
                }elseif($row['promedioDocumentacion'] == 0){
                    $pdf->Cell(130,10, utf8_decode('PROMEDIO DOCUMENTACION'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['promedioDocumentacion'] , 1 ,1,'C',0);
                }elseif($row['promedioDocumentacion'] == 4){
                    $pdf->Cell(130,10, utf8_decode('PROMEDIO DOCUMENTACION'), 1,0,'',0);
                    $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['promedioDocumentacion'] , 1 ,1,'C',0);
                    }elseif($row['promedioDocumentacion'] < 6){
                        $pdf->Cell(130,10,utf8_decode('PROMEDIO DOCUMENTACION'), 1,0,'',0);
                        $pdf->Cell(40,10, 'En Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['promedioDocumentacion'] , 1 ,1,'C',0);
                    }

        $pdf->Cell(10,10, utf8_decode('PG'), 1,0,'',0);  
            if($row['promedio'] > 6){
                $pdf->Cell(130,10, utf8_decode('PROMEDIO GENERAL'), 1,0,'',0);
                $pdf->Cell(40,10, 'Buen estado', 1 ,0,'',0);
                $pdf->Cell(15,10, $row['promedio'] , 1 ,1,'C',0);
                    
                }elseif($row['promedio'] == 0){
                    $pdf->Cell(130,10, utf8_decode('PROMEDIO GENERAL'), 1,0,'',0);
                    $pdf->Cell(40,10, 'No Aplica', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['promedio'] , 1 ,1,'C',0);
                }elseif($row['promedio'] == 4){
                    $pdf->Cell(130,10, utf8_decode('PROMEDIO GENERAL'), 1,0,'',0);
                    $pdf->Cell(40,10, 'Requiere atencion', 1 ,0,'',0);
                    $pdf->Cell(15,10, $row['promedio'] , 1 ,1,'C',0);
                    }elseif($row['promedio'] < 6){
                        $pdf->Cell(130,10,utf8_decode('PROMEDIO GENERAL'), 1,0,'',0);
                        $pdf->Cell(40,10, 'En Mal Estado', 1 ,0,'',0);
                        $pdf->Cell(15,10, $row['promedio'] , 1 ,1,'C',0);
                    }

    $pdf->Cell(70,10, 'Hora De Termino', 1 ,0,'',0);
    $pdf->Cell(125,10, $row['HoraDeTermino'], 1, 1,'', 0);

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