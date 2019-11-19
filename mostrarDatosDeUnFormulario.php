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
$sql = "SELECT * FROM formulario inner join locales on formulario.idLocales=locales.id WHERE formulario.id = '$id'";


echo '<table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Informacion Formulario</th>
                <th scope="col">Datos</th>
                <th scope="col"></th>
            </tr>
        </thead>
                ';
$result = $conn->query($sql);

if($result->num_rows>0){
	while($row = mysqli_fetch_assoc($result)){
        echo '<br>
        <tbody>
            <tr>
                <th scope="row">Hora De Inicio</th>
                <td>'.$row['HoraDeInicio'].'</td>
                <th scope="col"></th>
            </tr>
            <tr>
              <th scope="row">Fecha</th>
              <td>'.$row['Fecha'].'</td>
              <th scope="col"></th>
            </tr>
            <tr>
              <th scope="row">Codigo Local</th>
              <td>'.$row['idLocales'].'</td>
              <th scope="col"></th>
            </tr>
            <tr>
            <th scope="row">Nombre Local</th>
            <td>'.$row['Nombre'].'</td>
            <th scope="col"></th>
          </tr>
          <tr>
            <th scope="row">Ubicacion Local</th>
            <td>'.utf8_decode($row['Ubicacion']).'</td>
            <th scope="col"></th>
          </tr>




          <thead class="thead-dark">
          <tr>
              <th scope="col">Preguntas Instalaciones</th>
              <th scope="col">Observacion</th>
              <th scope="col">Nota</th>
          </tr>
        </thead>


        <tr>
        <th scope="row">¿Pisos limpios y en buen estado?</th>';
        if($row['NotaInstalaciones1EstadoPisos'] == 0){
          echo '<td class="table-info">No Aplica</td>';
          echo '<td class="table-info">'.$row['NotaInstalaciones1EstadoPisos'].'</td>';
         }elseif($row['NotaInstalaciones1EstadoPisos'] > 4){
          echo '<td class="table-success">Si Cumple</td>';
          echo '<td class="table-success">'.$row['NotaInstalaciones1EstadoPisos'].'</td>';
         }elseif($row['NotaInstalaciones1EstadoPisos'] == 4){
          echo '<td class="table-warning">Regular</td>';
          echo '<td class="table-warning">'.$row['NotaInstalaciones1EstadoPisos'].'</td>';
         }elseif($row['NotaInstalaciones1EstadoPisos'] < 4){
          echo '<td class="table-danger">No Cumple</td>';
          echo '<td class="table-danger">'.$row['NotaInstalaciones1EstadoPisos'].'</td>';
         }
       echo '</tr>


       <tr>
       <th scope="row">¿Muros y zócalos limpios y en buen estado?</th>';
       if($row['NotaInstalaciones2EstadoMuros'] == 0){
         echo '<td class="table-info">No Aplica</td>';
         echo '<td class="table-info">'.$row['NotaInstalaciones2EstadoMuros'].'</td>';
        }elseif($row['NotaInstalaciones2EstadoMuros'] > 4){
         echo '<td class="table-success">Si Cumple</td>';
         echo '<td class="table-success">'.$row['NotaInstalaciones2EstadoMuros'].'</td>';
        }elseif($row['NotaInstalaciones2EstadoMuros'] == 4){
         echo '<td class="table-warning">Regular</td>';
         echo '<td class="table-warning">'.$row['NotaInstalaciones2EstadoMuros'].'</td>';
        }elseif($row['NotaInstalaciones2EstadoMuros'] < 4){
         echo '<td class="table-danger">No Cumple</td>';
         echo '<td class="table-danger">'.$row['NotaInstalaciones2EstadoMuros'].'</td>';
        }
      echo '</tr>

        <tr>
          <th scope="row">¿Cielos limpios y en buen estado?</th>';
          if($row['NotaInstalaciones3EstadoCielos'] == 0){
            echo '<td class="table-info">No Aplica</td>';
            echo '<td class="table-info">'.$row['NotaInstalaciones3EstadoCielos'].'</td>';
           }elseif($row['NotaInstalaciones3EstadoCielos'] > 4){
            echo '<td class="table-success">Si Cumple</td>';
            echo '<td class="table-success">'.$row['NotaInstalaciones3EstadoCielos'].'</td>';
           }elseif($row['NotaInstalaciones3EstadoCielos'] == 4){
            echo '<td class="table-warning">Regular</td>';
            echo '<td class="table-warning">'.$row['NotaInstalaciones3EstadoCielos'].'</td>';
           }elseif($row['NotaInstalaciones3EstadoCielos'] < 4){
            echo '<td class="table-danger">No Cumple</td>';
            echo '<td class="table-danger">'.$row['NotaInstalaciones3EstadoCielos'].'</td>';
           }
         echo '</tr>


         <tr>
         <th scope="row">¿Puertas y ventanas limpias y en buen estado?</th>';
         if($row['NotaInstalaciones4EstadoPuertas'] == 0){
           echo '<td class="table-info">No Aplica</td>';
           echo '<td class="table-info">'.$row['NotaInstalaciones4EstadoPuertas'].'</td>';
          }elseif($row['NotaInstalaciones4EstadoPuertas'] > 4){
           echo '<td class="table-success">Si Cumple</td>';
           echo '<td class="table-success">'.$row['NotaInstalaciones4EstadoPuertas'].'</td>';
          }elseif($row['NotaInstalaciones4EstadoPuertas'] == 4){
           echo '<td class="table-warning">Regular</td>';
           echo '<td class="table-warning">'.$row['NotaInstalaciones4EstadoPuertas'].'</td>';
          }elseif($row['NotaInstalaciones4EstadoPuertas'] < 4){
           echo '<td class="table-danger">No Cumple</td>';
           echo '<td class="table-danger">'.$row['NotaInstalaciones4EstadoPuertas'].'</td>';
          }
        echo '</tr>

    

        <tr>
        <th scope="row">¿Iluminación limpias y en buen estado?</th>';
        if($row['NotaInstalaciones5EstadoIluminacion'] == 0){
          echo '<td class="table-info">No Aplica</td>';
          echo '<td class="table-info">'.$row['NotaInstalaciones5EstadoIluminacion'].'</td>';
         }elseif($row['NotaInstalaciones5EstadoIluminacion'] > 4){
          echo '<td class="table-success">Si Cumple</td>';
          echo '<td class="table-success">'.$row['NotaInstalaciones5EstadoIluminacion'].'</td>';
         }elseif($row['NotaInstalaciones5EstadoIluminacion'] == 4){
          echo '<td class="table-warning">Regular</td>';
          echo '<td class="table-warning">'.$row['NotaInstalaciones5EstadoIluminacion'].'</td>';
         }elseif($row['NotaInstalaciones5EstadoIluminacion'] < 4){
          echo '<td class="table-danger">No Cumple</td>';
          echo '<td class="table-danger">'.$row['NotaInstalaciones5EstadoIluminacion'].'</td>';
         }
       echo '</tr>



       <tr>
       <th scope="row">¿Sistema inyección y extracción limpios y en buen estado?</th>';
       if($row['NotaInstalaciones6EstadoSistemaInyeccion'] == 0){
         echo '<td class="table-info">No Aplica</td>';
         echo '<td class="table-info">'.$row['NotaInstalaciones6EstadoSistemaInyeccion'].'</td>';
        }elseif($row['NotaInstalaciones6EstadoSistemaInyeccion'] > 4){
         echo '<td class="table-success">Si Cumple</td>';
         echo '<td class="table-success">'.$row['NotaInstalaciones6EstadoSistemaInyeccion'].'</td>';
        }elseif($row['NotaInstalaciones6EstadoSistemaInyeccion'] == 4){
         echo '<td class="table-warning">Regular</td>';
         echo '<td class="table-warning">'.$row['NotaInstalaciones6EstadoSistemaInyeccion'].'</td>';
        }elseif($row['NotaInstalaciones6EstadoSistemaInyeccion'] < 4){
         echo '<td class="table-danger">No Cumple</td>';
         echo '<td class="table-danger">'.$row['NotaInstalaciones6EstadoSistemaInyeccion'].'</td>';
        }
      echo '</tr>



      
      <tr>
      <th scope="row">Temperatura ambiente (22°C)</th>';
      if($row['NotaInstalaciones7TemperaturaAmbiente22cc'] == 0){
        echo '<td class="table-info">No Aplica</td>';
        echo '<td class="table-info">'.$row['NotaInstalaciones7TemperaturaAmbiente22cc'].'</td>';
       }elseif($row['NotaInstalaciones7TemperaturaAmbiente22cc'] > 4){
        echo '<td class="table-success">Si Cumple</td>';
        echo '<td class="table-success">'.$row['NotaInstalaciones7TemperaturaAmbiente22cc'].'</td>';
       }elseif($row['NotaInstalaciones7TemperaturaAmbiente22cc'] == 4){
        echo '<td class="table-warning">Regular</td>';
        echo '<td class="table-warning">'.$row['NotaInstalaciones7TemperaturaAmbiente22cc'].'</td>';
       }elseif($row['NotaInstalaciones7TemperaturaAmbiente22cc'] < 4){
        echo '<td class="table-danger">No Cumple</td>';
        echo '<td class="table-danger">'.$row['NotaInstalaciones7TemperaturaAmbiente22cc'].'</td>';
       }
     echo '</tr>



     <tr>
     <th scope="row">¿Lavafondos y lavamanos limpios y en buen estado?</th>';
     if($row['NotaInstalaciones8EstadoLavaFondos'] == 0){
       echo '<td class="table-info">No Aplica</td>';
       echo '<td class="table-info">'.$row['NotaInstalaciones8EstadoLavaFondos'].'</td>';
      }elseif($row['NotaInstalaciones8EstadoLavaFondos'] > 4){
       echo '<td class="table-success">Si Cumple</td>';
       echo '<td class="table-success">'.$row['NotaInstalaciones8EstadoLavaFondos'].'</td>';
      }elseif($row['NotaInstalaciones8EstadoLavaFondos'] == 4){
       echo '<td class="table-warning">Regular</td>';
       echo '<td class="table-warning">'.$row['NotaInstalaciones8EstadoLavaFondos'].'</td>';
      }elseif($row['NotaInstalaciones8EstadoLavaFondos'] < 4){
       echo '<td class="table-danger">No Cumple</td>';
       echo '<td class="table-danger">'.$row['NotaInstalaciones8EstadoLavaFondos'].'</td>';
      }
    echo '</tr>



    <tr>
    <th scope="row">¿Cámaras y desagües limpios y en buen estado?</th>';
    if($row['NotaInstalaciones9EstadoCamaras'] == 0){
      echo '<td class="table-info">No Aplica</td>';
      echo '<td class="table-info">'.$row['NotaInstalaciones9EstadoCamaras'].'</td>';
     }elseif($row['NotaInstalaciones9EstadoCamaras'] > 4){
      echo '<td class="table-success">Si Cumple</td>';
      echo '<td class="table-success">'.$row['NotaInstalaciones9EstadoCamaras'].'</td>';
     }elseif($row['NotaInstalaciones9EstadoCamaras'] == 4){
      echo '<td class="table-warning">Regular</td>';
      echo '<td class="table-warning">'.$row['NotaInstalaciones9EstadoCamaras'].'</td>';
     }elseif($row['NotaInstalaciones9EstadoCamaras'] < 4){
      echo '<td class="table-danger">No Cumple</td>';
      echo '<td class="table-danger">'.$row['NotaInstalaciones9EstadoCamaras'].'</td>';
     }
   echo '</tr>

     
    <tr>
    <th scope="row">¿Basureros lavables, en buen estado, con tapa, sistema de pedal.?</th>';
    if($row['NotaInstalaciones10EstadoBasureros'] == 0){
      echo '<td class="table-info">No Aplica</td>';
      echo '<td class="table-info">'.$row['NotaInstalaciones10EstadoBasureros'].'</td>';
     }elseif($row['NotaInstalaciones10EstadoBasureros'] > 4){
      echo '<td class="table-success">Si Cumple</td>';
      echo '<td class="table-success">'.$row['NotaInstalaciones10EstadoBasureros'].'</td>';
     }elseif($row['NotaInstalaciones10EstadoBasureros'] == 4){
      echo '<td class="table-warning">Regular</td>';
      echo '<td class="table-warning">'.$row['NotaInstalaciones10EstadoBasureros'].'</td>';
     }elseif($row['NotaInstalaciones10EstadoBasureros'] < 4){
      echo '<td class="table-danger">No Cumple</td>';
      echo '<td class="table-danger">'.$row['NotaInstalaciones10EstadoBasureros'].'</td>';
     }
   echo '</tr>


   <tr>
   <th scope="row">¿Basureros limpios y con bolsa?</th>';
   if($row['NotaInstalaciones11BasurerosLimpios'] == 0){
     echo '<td class="table-info">No Aplica</td>';
     echo '<td class="table-info">'.$row['NotaInstalaciones11BasurerosLimpios'].'</td>';
    }elseif($row['NotaInstalaciones11BasurerosLimpios'] > 4){
     echo '<td class="table-success">Si Cumple</td>';
     echo '<td class="table-success">'.$row['NotaInstalaciones11BasurerosLimpios'].'</td>';
    }elseif($row['NotaInstalaciones11BasurerosLimpios'] == 4){
     echo '<td class="table-warning">Regular</td>';
     echo '<td class="table-warning">'.$row['NotaInstalaciones11BasurerosLimpios'].'</td>';
    }elseif($row['NotaInstalaciones11BasurerosLimpios'] < 4){
     echo '<td class="table-danger">No Cumple</td>';
     echo '<td class="table-danger">'.$row['NotaInstalaciones11BasurerosLimpios'].'</td>';
    }
  echo '</tr>

  <tr>
  <th scope="row">¿Ausencia de plagas?</th>';
  if($row['NotaInstalaciones12AusenciaPlagas'] == 0){
    echo '<td class="table-info">No Aplica</td>';
    echo '<td class="table-info">'.$row['NotaInstalaciones12AusenciaPlagas'].'</td>';
   }elseif($row['NotaInstalaciones12AusenciaPlagas'] > 4){
    echo '<td class="table-success">Si Cumple</td>';
    echo '<td class="table-success">'.$row['NotaInstalaciones12AusenciaPlagas'].'</td>';
   }elseif($row['NotaInstalaciones12AusenciaPlagas'] == 4){
    echo '<td class="table-warning">Regular</td>';
    echo '<td class="table-warning">'.$row['NotaInstalaciones12AusenciaPlagas'].'</td>';
   }elseif($row['NotaInstalaciones12AusenciaPlagas'] < 4){
    echo '<td class="table-danger">No Cumple</td>';
    echo '<td class="table-danger">'.$row['NotaInstalaciones12AusenciaPlagas'].'</td>';
   }
 echo '</tr>


 <tr>
 <th scope="row">¿Lavamanos: existencia de jabón y papel?</th>';
 if($row['NotaInstalaciones13ExisteJavonLavamanos'] == 0){
   echo '<td class="table-info">No Aplica</td>';
   echo '<td class="table-info">'.$row['NotaInstalaciones13ExisteJavonLavamanos'].'</td>';
  }elseif($row['NotaInstalaciones13ExisteJavonLavamanos'] > 4){
   echo '<td class="table-success">Si Cumple</td>';
   echo '<td class="table-success">'.$row['NotaInstalaciones13ExisteJavonLavamanos'].'</td>';
  }elseif($row['NotaInstalaciones13ExisteJavonLavamanos'] == 4){
   echo '<td class="table-warning">Regular</td>';
   echo '<td class="table-warning">'.$row['NotaInstalaciones13ExisteJavonLavamanos'].'</td>';
  }elseif($row['NotaInstalaciones13ExisteJavonLavamanos'] < 4){
   echo '<td class="table-danger">No Cumple</td>';
   echo '<td class="table-danger">'.$row['NotaInstalaciones13ExisteJavonLavamanos'].'</td>';
  }
echo '</tr>


<tr>
<th scope="row">¿Baños, artefactos limpios, ordenados y en buen estado?</th>';
if($row['NotaInstalaciones14EstadoBanios'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaInstalaciones14EstadoBanios'].'</td>';
 }elseif($row['NotaInstalaciones14EstadoBanios'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaInstalaciones14EstadoBanios'].'</td>';
 }elseif($row['NotaInstalaciones14EstadoBanios'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaInstalaciones14EstadoBanios'].'</td>';
 }elseif($row['NotaInstalaciones14EstadoBanios'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaInstalaciones14EstadoBanios'].'</td>';
 }
echo '</tr>


<tr>
<th scope="row">¿Disponibilidad de agua caliente?</th>';
if($row['NotaInstalaciones15AguaCalienteDisponible'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaInstalaciones15AguaCalienteDisponible'].'</td>';
 }elseif($row['NotaInstalaciones15AguaCalienteDisponible'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaInstalaciones15AguaCalienteDisponible'].'</td>';
 }elseif($row['NotaInstalaciones15AguaCalienteDisponible'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaInstalaciones15AguaCalienteDisponible'].'</td>';
 }elseif($row['NotaInstalaciones15AguaCalienteDisponible'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaInstalaciones15AguaCalienteDisponible'].'</td>';
 }
echo '</tr>


<tr>
<th scope="row">¿Vestidores limpios y ordenados?</th>';
if($row['NotaInstalaciones16VestidoresLimpios'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaInstalaciones16VestidoresLimpios'].'</td>';
 }elseif($row['NotaInstalaciones16VestidoresLimpios'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaInstalaciones16VestidoresLimpios'].'</td>';
 }elseif($row['NotaInstalaciones16VestidoresLimpios'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaInstalaciones16VestidoresLimpios'].'</td>';
 }elseif($row['NotaInstalaciones16VestidoresLimpios'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaInstalaciones16VestidoresLimpios'].'</td>';
 }
echo '</tr>


<tr>
<th scope="row">¿Maquinaria y artefactos limpios y en buen estado?</th>';
if($row['NotaInstalaciones17EstadoMaquinas'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaInstalaciones17EstadoMaquinas'].'</td>';
 }elseif($row['NotaInstalaciones17EstadoMaquinas'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaInstalaciones17EstadoMaquinas'].'</td>';
 }elseif($row['NotaInstalaciones17EstadoMaquinas'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaInstalaciones17EstadoMaquinas'].'</td>';
 }elseif($row['NotaInstalaciones17EstadoMaquinas'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaInstalaciones17EstadoMaquinas'].'</td>';
 }
echo '</tr>



<tr>
<th scope="row">¿Mesones y repisas limpios y en buen estado?</th>';
if($row['NotaInstalaciones18EstadoMesones'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaInstalaciones18EstadoMesones'].'</td>';
 }elseif($row['NotaInstalaciones18EstadoMesones'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaInstalaciones18EstadoMesones'].'</td>';
 }elseif($row['NotaInstalaciones18EstadoMesones'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaInstalaciones18EstadoMesones'].'</td>';
 }elseif($row['NotaInstalaciones18EstadoMesones'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaInstalaciones18EstadoMesones'].'</td>';
 }
echo '</tr>


<tr>
<th scope="row">¿Existencia de utensilios necesarios?</th>';
if($row['NotaInstalaciones19ExistenciaUntensillos'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaInstalaciones19ExistenciaUntensillos'].'</td>';
 }elseif($row['NotaInstalaciones19ExistenciaUntensillos'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaInstalaciones19ExistenciaUntensillos'].'</td>';
 }elseif($row['NotaInstalaciones19ExistenciaUntensillos'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaInstalaciones19ExistenciaUntensillos'].'</td>';
 }elseif($row['NotaInstalaciones19ExistenciaUntensillos'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaInstalaciones19ExistenciaUntensillos'].'</td>';
 }
echo '</tr>

<tr>
<th scope="row">¿Utensilios limpios y en buen estado?</th>';
if($row['NotaInstalaciones20EstadoUntensillos'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaInstalaciones20EstadoUntensillos'].'</td>';
 }elseif($row['NotaInstalaciones20EstadoUntensillos'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaInstalaciones20EstadoUntensillos'].'</td>';
 }elseif($row['NotaInstalaciones20EstadoUntensillos'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaInstalaciones20EstadoUntensillos'].'</td>';
 }elseif($row['NotaInstalaciones20EstadoUntensillos'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaInstalaciones20EstadoUntensillos'].'</td>';
 }
echo '</tr>


<tr>
<th scope="row">¿Equipos de refrigeración (0 a 5°C)?</th>';
if($row['NotaInstalaciones21EquiposDeRefrigeracion5C'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaInstalaciones21EquiposDeRefrigeracion5C'].'</td>';
 }elseif($row['NotaInstalaciones21EquiposDeRefrigeracion5C'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaInstalaciones21EquiposDeRefrigeracion5C'].'</td>';
 }elseif($row['NotaInstalaciones21EquiposDeRefrigeracion5C'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaInstalaciones21EquiposDeRefrigeracion5C'].'</td>';
 }elseif($row['NotaInstalaciones21EquiposDeRefrigeracion5C'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaInstalaciones21EquiposDeRefrigeracion5C'].'</td>';
 }
echo '</tr>


<tr>
<th scope="row">¿Equipos de frío limpios y en buen estado?</th>';
if($row['NotaInstalaciones22EstadoEquiposDeFrio'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaInstalaciones22EstadoEquiposDeFrio'].'</td>';
 }elseif($row['NotaInstalaciones22EstadoEquiposDeFrio'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaInstalaciones22EstadoEquiposDeFrio'].'</td>';
 }elseif($row['NotaInstalaciones22EstadoEquiposDeFrio'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaInstalaciones22EstadoEquiposDeFrio'].'</td>';
 }elseif($row['NotaInstalaciones22EstadoEquiposDeFrio'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaInstalaciones22EstadoEquiposDeFrio'].'</td>';
 }
echo '</tr>

<tr>
<th scope="row">Equipos de calor (sobre 65°C)</th>';
if($row['NotaInstalaciones23EquiposDeCalor65C'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaInstalaciones23EquiposDeCalor65C'].'</td>';
 }elseif($row['NotaInstalaciones23EquiposDeCalor65C'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaInstalaciones23EquiposDeCalor65C'].'</td>';
 }elseif($row['NotaInstalaciones23EquiposDeCalor65C'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaInstalaciones23EquiposDeCalor65C'].'</td>';
 }elseif($row['NotaInstalaciones23EquiposDeCalor65C'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaInstalaciones23EquiposDeCalor65C'].'</td>';
 }
echo '</tr>


<tr>
<th scope="row">Equipos de calor limpios y en buen estado</th>';
if($row['NotaInstalaciones24EstadoEquiposDeCalor'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaInstalaciones24EstadoEquiposDeCalor'].'</td>';
 }elseif($row['NotaInstalaciones24EstadoEquiposDeCalor'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaInstalaciones24EstadoEquiposDeCalor'].'</td>';
 }elseif($row['NotaInstalaciones24EstadoEquiposDeCalor'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaInstalaciones24EstadoEquiposDeCalor'].'</td>';
 }elseif($row['NotaInstalaciones24EstadoEquiposDeCalor'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaInstalaciones24EstadoEquiposDeCalor'].'</td>';
 }
echo '</tr>


<tr>';

if($row['promedioInstalaciones'] == 0){
  echo '<th class="table-info" scope="row">Promedio Instalaciones</th>';
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['promedioInstalaciones'].'</td>';
 }elseif($row['promedioInstalaciones'] > 4){
  echo '<th class="table-success" scope="row">Promedio Instalaciones</th>';
  echo '<td class="table-success">Instalaciones mayormente en buen estado</td>';
  echo '<td class="table-success">'.$row['promedioInstalaciones'].'</td>';
 }elseif($row['promedioInstalaciones'] == 4){
  echo '<th class="table-warning" scope="row">Promedio Instalaciones</th>';
  echo '<td class="table-warning">Instalacion Requiere Atencion</td>';
  echo '<td class="table-warning">'.$row['promedioInstalaciones'].'</td>';
 }elseif($row['promedioInstalaciones'] < 4){
  echo '<th class="table-danger" scope="row">Promedio Instalaciones</th>';
  echo '<td class="table-danger">Requiere Atencion Inmediata</td>';
  echo '<td class="table-danger">'.$row['promedioInstalaciones'].'</td>';
 }
echo '</tr>


<thead class="thead-dark">
<tr>
    <th scope="col">Preguntas Manipulaciones</th>
    <th scope="col">Observacion</th>
    <th scope="col">Nota</th>
</tr>
</thead>



<th scope="row">¿Sanitización de frutas y verduras en solución sanitizante?</th>';
if($row['NotaInstalaciones24EstadoEquiposDeCalor'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaInstalaciones24EstadoEquiposDeCalor'].'</td>';
 }elseif($row['NotaInstalaciones24EstadoEquiposDeCalor'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaInstalaciones24EstadoEquiposDeCalor'].'</td>';
 }elseif($row['NotaInstalaciones24EstadoEquiposDeCalor'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaInstalaciones24EstadoEquiposDeCalor'].'</td>';
 }elseif($row['NotaInstalaciones24EstadoEquiposDeCalor'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaInstalaciones24EstadoEquiposDeCalor'].'</td>';
 }
echo '</tr>


<th scope="row">¿Sanitización de utensilios y superficies con solución sanitinzate?</th>';
if($row['NotaManipulaciones2SanitizacionDeUntensillos'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaManipulaciones2SanitizacionDeUntensillos'].'</td>';
 }elseif($row['NotaManipulaciones2SanitizacionDeUntensillos'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaManipulaciones2SanitizacionDeUntensillos'].'</td>';
 }elseif($row['NotaManipulaciones2SanitizacionDeUntensillos'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaManipulaciones2SanitizacionDeUntensillos'].'</td>';
 }elseif($row['NotaManipulaciones2SanitizacionDeUntensillos'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaManipulaciones2SanitizacionDeUntensillos'].'</td>';
 }
echo '</tr>


<th scope="row">¿Alimentos protegidos y rotulados?</th>';
if($row['NotaManipulaciones3AlimentosProtegidosYrotulados'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaManipulaciones3AlimentosProtegidosYrotulados'].'</td>';
 }elseif($row['NotaManipulaciones3AlimentosProtegidosYrotulados'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaManipulaciones3AlimentosProtegidosYrotulados'].'</td>';
 }elseif($row['NotaManipulaciones3AlimentosProtegidosYrotulados'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaManipulaciones3AlimentosProtegidosYrotulados'].'</td>';
 }elseif($row['NotaManipulaciones3AlimentosProtegidosYrotulados'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaManipulaciones3AlimentosProtegidosYrotulados'].'</td>';
 }
echo '</tr>


<th scope="row">¿Alimentos cocidos almacenados alejados de crudos?</th>';
if($row['NotaManipulaciones4AlimentosCocidosAlmacenados'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaManipulaciones4AlimentosCocidosAlmacenados'].'</td>';
 }elseif($row['NotaManipulaciones4AlimentosCocidosAlmacenados'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaManipulaciones4AlimentosCocidosAlmacenados'].'</td>';
 }elseif($row['NotaManipulaciones4AlimentosCocidosAlmacenados'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaManipulaciones4AlimentosCocidosAlmacenados'].'</td>';
 }elseif($row['NotaManipulaciones4AlimentosCocidosAlmacenados'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaManipulaciones4AlimentosCocidosAlmacenados'].'</td>';
 }
echo '</tr>


<th scope="row">¿Orden al trabajar?</th>';
if($row['NotaManipulaciones5OrdenAlTrabajar'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaManipulaciones5OrdenAlTrabajar'].'</td>';
 }elseif($row['NotaManipulaciones5OrdenAlTrabajar'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaManipulaciones5OrdenAlTrabajar'].'</td>';
 }elseif($row['NotaManipulaciones5OrdenAlTrabajar'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaManipulaciones5OrdenAlTrabajar'].'</td>';
 }elseif($row['NotaManipulaciones5OrdenAlTrabajar'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaManipulaciones5OrdenAlTrabajar'].'</td>';
 }
echo '</tr>


<th scope="row">¿Uso de productos autorizados?</th>';
if($row['NotaManipulaciones6UsoProductosAutorizados'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaManipulaciones6UsoProductosAutorizados'].'</td>';
 }elseif($row['NotaManipulaciones6UsoProductosAutorizados'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaManipulaciones6UsoProductosAutorizados'].'</td>';
 }elseif($row['NotaManipulaciones6UsoProductosAutorizados'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaManipulaciones6UsoProductosAutorizados'].'</td>';
 }elseif($row['NotaManipulaciones6UsoProductosAutorizados'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaManipulaciones6UsoProductosAutorizados'].'</td>';
 }
echo '</tr>

<th scope="row">¿Ausencia de alimentos sobrantes y/o alterados?</th>';
if($row['NotaManipulaciones7AusenciaDeAlimentosSobrantes'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaManipulaciones7AusenciaDeAlimentosSobrantes'].'</td>';
 }elseif($row['NotaManipulaciones7AusenciaDeAlimentosSobrantes'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaManipulaciones7AusenciaDeAlimentosSobrantes'].'</td>';
 }elseif($row['NotaManipulaciones7AusenciaDeAlimentosSobrantes'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaManipulaciones7AusenciaDeAlimentosSobrantes'].'</td>';
 }elseif($row['NotaManipulaciones7AusenciaDeAlimentosSobrantes'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaManipulaciones7AusenciaDeAlimentosSobrantes'].'</td>';
 }
echo '</tr>


<th scope="row">¿Ausencia de productos vencidos?</th>';
if($row['NotaManipulaciones8AusenciaDeProductosVencidos'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaManipulaciones8AusenciaDeProductosVencidos'].'</td>';
 }elseif($row['NotaManipulaciones8AusenciaDeProductosVencidos'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaManipulaciones8AusenciaDeProductosVencidos'].'</td>';
 }elseif($row['NotaManipulaciones8AusenciaDeProductosVencidos'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaManipulaciones8AusenciaDeProductosVencidos'].'</td>';
 }elseif($row['NotaManipulaciones8AusenciaDeProductosVencidos'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaManipulaciones8AusenciaDeProductosVencidos'].'</td>';
 }
echo '</tr>


<th scope="row">¿Existencia y uso correcto de detergentes?</th>';
if($row['NotaManipulaciones9ExistenciaYusoCorrectoDetergente'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaManipulaciones9ExistenciaYusoCorrectoDetergente'].'</td>';
 }elseif($row['NotaManipulaciones9ExistenciaYusoCorrectoDetergente'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaManipulaciones9ExistenciaYusoCorrectoDetergente'].'</td>';
 }elseif($row['NotaManipulaciones9ExistenciaYusoCorrectoDetergente'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaManipulaciones9ExistenciaYusoCorrectoDetergente'].'</td>';
 }elseif($row['NotaManipulaciones9ExistenciaYusoCorrectoDetergente'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaManipulaciones9ExistenciaYusoCorrectoDetergente'].'</td>';
 }
echo '</tr>



<th scope="row">¿Dilutores y rociadores rotulados, limpios y en buen estado?</th>';
if($row['NotaManipulaciones10EstadoDilutores'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaManipulaciones10EstadoDilutores'].'</td>';
 }elseif($row['NotaManipulaciones10EstadoDilutores'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaManipulaciones10EstadoDilutores'].'</td>';
 }elseif($row['NotaManipulaciones10EstadoDilutores'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaManipulaciones10EstadoDilutores'].'</td>';
 }elseif($row['NotaManipulaciones10EstadoDilutores'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaManipulaciones10EstadoDilutores'].'</td>';
 }
echo '</tr>



<th scope="row">¿Existencia de artículos de aseo y seguridad?</th>';
if($row['NotaManipulaciones11ExisteArtDeAseoYseguridad'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaManipulaciones11ExisteArtDeAseoYseguridad'].'</td>';
 }elseif($row['NotaManipulaciones11ExisteArtDeAseoYseguridad'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaManipulaciones11ExisteArtDeAseoYseguridad'].'</td>';
 }elseif($row['NotaManipulaciones11ExisteArtDeAseoYseguridad'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaManipulaciones11ExisteArtDeAseoYseguridad'].'</td>';
 }elseif($row['NotaManipulaciones11ExisteArtDeAseoYseguridad'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaManipulaciones11ExisteArtDeAseoYseguridad'].'</td>';
 }
echo '</tr>



<th scope="row">¿Ausencia de objetos ajenos a la manipulación?</th>';
if($row['NotaManipulaciones12AusenciaDeObjtAjenosManipulacion'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaManipulaciones12AusenciaDeObjtAjenosManipulacion'].'</td>';
 }elseif($row['NotaManipulaciones12AusenciaDeObjtAjenosManipulacion'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaManipulaciones12AusenciaDeObjtAjenosManipulacion'].'</td>';
 }elseif($row['NotaManipulaciones12AusenciaDeObjtAjenosManipulacion'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaManipulaciones12AusenciaDeObjtAjenosManipulacion'].'</td>';
 }elseif($row['NotaManipulaciones12AusenciaDeObjtAjenosManipulacion'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaManipulaciones12AusenciaDeObjtAjenosManipulacion'].'</td>';
 }
echo '</tr>



<th scope="row">¿Cumplimiento de procedimientos?</th>';
if($row['NotaManipulaciones13CumplimientoProcedimientos'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaManipulaciones13CumplimientoProcedimientos'].'</td>';
 }elseif($row['NotaManipulaciones13CumplimientoProcedimientos'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaManipulaciones13CumplimientoProcedimientos'].'</td>';
 }elseif($row['NotaManipulaciones13CumplimientoProcedimientos'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaManipulaciones13CumplimientoProcedimientos'].'</td>';
 }elseif($row['NotaManipulaciones13CumplimientoProcedimientos'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaManipulaciones13CumplimientoProcedimientos'].'</td>';
 }
echo '</tr>

<th scope="row">¿Ausencia de contaminación cruzada?</th>';
if($row['NotaManipulaciones14AusenciaContaminacionCruzada'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaManipulaciones14AusenciaContaminacionCruzada'].'</td>';
 }elseif($row['NotaManipulaciones14AusenciaContaminacionCruzada'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaManipulaciones14AusenciaContaminacionCruzada'].'</td>';
 }elseif($row['NotaManipulaciones14AusenciaContaminacionCruzada'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaManipulaciones14AusenciaContaminacionCruzada'].'</td>';
 }elseif($row['NotaManipulaciones14AusenciaContaminacionCruzada'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaManipulaciones14AusenciaContaminacionCruzada'].'</td>';
 }
echo '</tr>



<th scope="row">?Lavado frecuente y eficiente de manos?</th>';
if($row['NotaManipulaciones15LavadoDeManosFrecuente'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaManipulaciones15LavadoDeManosFrecuente'].'</td>';
 }elseif($row['NotaManipulaciones15LavadoDeManosFrecuente'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaManipulaciones15LavadoDeManosFrecuente'].'</td>';
 }elseif($row['NotaManipulaciones15LavadoDeManosFrecuente'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaManipulaciones15LavadoDeManosFrecuente'].'</td>';
 }elseif($row['NotaManipulaciones15LavadoDeManosFrecuente'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaManipulaciones15LavadoDeManosFrecuente'].'</td>';
 }
echo '</tr>';

if($row['promedioManipulaciones'] == 0){
  echo '<th class="table-info" scope="row">Promedio Manipulaciones</th>';
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['promedioManipulaciones'].'</td>';
 }elseif($row['promedioManipulaciones'] > 4){
  echo '<th class="table-success" scope="row">Promedio Manipulaciones</th>';
  echo '<td class="table-success">Manipulaciones mayormente en buen estado</td>';
  echo '<td class="table-success">'.$row['promedioManipulaciones'].'</td>';
 }elseif($row['promedioManipulaciones'] == 4){
  echo '<th class="table-warning" scope="row">Promedio Manipulaciones</th>';
  echo '<td class="table-warning">Instalacion Requiere Atencion</td>';
  echo '<td class="table-warning">'.$row['promedioManipulaciones'].'</td>';
 }elseif($row['promedioManipulaciones'] < 4){
  echo '<th class="table-danger" scope="row">Promedio Manipulaciones</th>';
  echo '<td class="table-danger">Requiere Atencion Inmediata</td>';
  echo '<td class="table-danger">'.$row['promedioManipulaciones'].'</td>';
 }
echo '</tr>

<thead class="thead-dark">
<tr>
    <th scope="col">Preguntas Manipuladores</th>
    <th scope="col">Observacion</th>
    <th scope="col">Nota</th>
</tr>
</thead>



<th scope="row">¿Uniforme limpio, completo y en buen estado?</th>';
if($row['NotaManipuladores1EstadoUniforme'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaManipuladores1EstadoUniforme'].'</td>';
 }elseif($row['NotaManipuladores1EstadoUniforme'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaManipuladores1EstadoUniforme'].'</td>';
 }elseif($row['NotaManipuladores1EstadoUniforme'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaManipuladores1EstadoUniforme'].'</td>';
 }elseif($row['NotaManipuladores1EstadoUniforme'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaManipuladores1EstadoUniforme'].'</td>';
 }
echo '</tr>


<th scope="row">¿Uso de mascarilla y guantes, si corresponde?</th>';
if($row['NotaManipuladores2UsoDeMascarillas'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaManipuladores2UsoDeMascarillas'].'</td>';
 }elseif($row['NotaManipuladores2UsoDeMascarillas'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaManipuladores2UsoDeMascarillas'].'</td>';
 }elseif($row['NotaManipuladores2UsoDeMascarillas'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaManipuladores2UsoDeMascarillas'].'</td>';
 }elseif($row['NotaManipuladores2UsoDeMascarillas'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaManipuladores2UsoDeMascarillas'].'</td>';
 }
echo '</tr>

<th scope="row">¿Presentación personal?</th>';
if($row['NotaManipuladores3PresentacionPersonal'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaManipuladores3PresentacionPersonal'].'</td>';
 }elseif($row['NotaManipuladores3PresentacionPersonal'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaManipuladores3PresentacionPersonal'].'</td>';
 }elseif($row['NotaManipuladores3PresentacionPersonal'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaManipuladores3PresentacionPersonal'].'</td>';
 }elseif($row['NotaManipuladores3PresentacionPersonal'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaManipuladores3PresentacionPersonal'].'</td>';
 }
echo '</tr>

<th scope="row">¿Hábitos higiénicos?</th>';
if($row['NotaManipuladores4HabitosHigienicos'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaManipuladores4HabitosHigienicos'].'</td>';
 }elseif($row['NotaManipuladores4HabitosHigienicos'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaManipuladores4HabitosHigienicos'].'</td>';
 }elseif($row['NotaManipuladores4HabitosHigienicos'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaManipuladores4HabitosHigienicos'].'</td>';
 }elseif($row['NotaManipuladores4HabitosHigienicos'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaManipuladores4HabitosHigienicos'].'</td>';
 }
echo '</tr>';



if($row['promedioManipuladores'] == 0){
  echo '<th class="table-info" scope="row">Promedio Manipuladores</th>';
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['promedioManipuladores'].'</td>';
 }elseif($row['promedioManipuladores'] > 4){
  echo '<th class="table-success" scope="row">Promedio Manipuladores</th>';
  echo '<td class="table-success">Manipuladores mayormente en buen estado</td>';
  echo '<td class="table-success">'.$row['promedioManipuladores'].'</td>';
 }elseif($row['promedioManipuladores'] == 4){
  echo '<th class="table-warning" scope="row">Promedio Manipuladores</th>';
  echo '<td class="table-warning">Manipulaciones Requiere Atencion</td>';
  echo '<td class="table-warning">'.$row['promedioManipuladores'].'</td>';
 }elseif($row['promedioManipuladores'] < 4){
  echo '<th class="table-danger" scope="row">Promedio Manipuladores</th>';
  echo '<td class="table-danger">Requiere Atencion Inmediata</td>';
  echo '<td class="table-danger">'.$row['promedioManipuladores'].'</td>';
 }
echo '</tr>


<thead class="thead-dark">
<tr>
    <th scope="col">Preguntas promedio Controles Punto Criticos En Alimentos</th>
    <th scope="col">Observacion</th>
    <th scope="col">Nota</th>
</tr>
</thead>


<th scope="row">¿Temperatura de cocción (mayor a 65°C)?</th>';
if($row['NotaControlesPuntoCriticosEnAlimentos1TemperaturaCoccion65cc'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaControlesPuntoCriticosEnAlimentos1TemperaturaCoccion65cc'].'</td>';
 }elseif($row['NotaControlesPuntoCriticosEnAlimentos1TemperaturaCoccion65cc'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaControlesPuntoCriticosEnAlimentos1TemperaturaCoccion65cc'].'</td>';
 }elseif($row['NotaControlesPuntoCriticosEnAlimentos1TemperaturaCoccion65cc'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaControlesPuntoCriticosEnAlimentos1TemperaturaCoccion65cc'].'</td>';
 }elseif($row['NotaControlesPuntoCriticosEnAlimentos1TemperaturaCoccion65cc'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaControlesPuntoCriticosEnAlimentos1TemperaturaCoccion65cc'].'</td>';
 }
echo '</tr>



<th scope="row">¿Temperatura de recalentamiento (mayor 74°C)?</th>';
if($row['NotaControlesPuntoCriticosEnAlimentos2TempCalentMayor75cc'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaControlesPuntoCriticosEnAlimentos2TempCalentMayor75cc'].'</td>';
 }elseif($row['NotaControlesPuntoCriticosEnAlimentos2TempCalentMayor75cc'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaControlesPuntoCriticosEnAlimentos2TempCalentMayor75cc'].'</td>';
 }elseif($row['NotaControlesPuntoCriticosEnAlimentos2TempCalentMayor75cc'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaControlesPuntoCriticosEnAlimentos2TempCalentMayor75cc'].'</td>';
 }elseif($row['NotaControlesPuntoCriticosEnAlimentos2TempCalentMayor75cc'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaControlesPuntoCriticosEnAlimentos2TempCalentMayor75cc'].'</td>';
 }
echo '</tr>


<th scope="row">¿Temperatura de refrigeración (0 a 5°C)?</th>';
if($row['NotaControlesPuntoCriticosEnAlimentos3TempRefrigeracion0a5cc'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaControlesPuntoCriticosEnAlimentos3TempRefrigeracion0a5cc'].'</td>';
 }elseif($row['NotaControlesPuntoCriticosEnAlimentos3TempRefrigeracion0a5cc'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaControlesPuntoCriticosEnAlimentos3TempRefrigeracion0a5cc'].'</td>';
 }elseif($row['NotaControlesPuntoCriticosEnAlimentos3TempRefrigeracion0a5cc'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaControlesPuntoCriticosEnAlimentos3TempRefrigeracion0a5cc'].'</td>';
 }elseif($row['NotaControlesPuntoCriticosEnAlimentos3TempRefrigeracion0a5cc'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaControlesPuntoCriticosEnAlimentos3TempRefrigeracion0a5cc'].'</td>';
 }
echo '</tr>


<th scope="row">¿Temperatura de congelación (-18°C)?</th>';
if($row['NotaControlesPuntoCriticosEnAlimentos4TempCongelacionMenos18cc'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaControlesPuntoCriticosEnAlimentos4TempCongelacionMenos18cc'].'</td>';
 }elseif($row['NotaControlesPuntoCriticosEnAlimentos4TempCongelacionMenos18cc'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaControlesPuntoCriticosEnAlimentos4TempCongelacionMenos18cc'].'</td>';
 }elseif($row['NotaControlesPuntoCriticosEnAlimentos4TempCongelacionMenos18cc'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaControlesPuntoCriticosEnAlimentos4TempCongelacionMenos18cc'].'</td>';
 }elseif($row['NotaControlesPuntoCriticosEnAlimentos4TempCongelacionMenos18cc'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaControlesPuntoCriticosEnAlimentos4TempCongelacionMenos18cc'].'</td>';
 }
echo '</tr>

<th scope="row">¿Exibicion de alimentos de manera correcta y segura?</th>';
if($row['NotaControlesPuntoCriticosEnAlimentos5ExibiAlimentFormCorrecta'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaControlesPuntoCriticosEnAlimentos5ExibiAlimentFormCorrecta'].'</td>';
 }elseif($row['NotaControlesPuntoCriticosEnAlimentos5ExibiAlimentFormCorrecta'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaControlesPuntoCriticosEnAlimentos5ExibiAlimentFormCorrecta'].'</td>';
 }elseif($row['NotaControlesPuntoCriticosEnAlimentos5ExibiAlimentFormCorrecta'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaControlesPuntoCriticosEnAlimentos5ExibiAlimentFormCorrecta'].'</td>';
 }elseif($row['NotaControlesPuntoCriticosEnAlimentos5ExibiAlimentFormCorrecta'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaControlesPuntoCriticosEnAlimentos5ExibiAlimentFormCorrecta'].'</td>';
 }
echo '</tr>';



if($row['promedioControlesPuntoCriticosEnAlimentos'] == 0){
  echo '<th class="table-info" scope="row">Promedio promedio Controles Punto Criticos En Alimentos</th>';
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['promedioControlesPuntoCriticosEnAlimentos'].'</td>';
 }elseif($row['promedioControlesPuntoCriticosEnAlimentos'] > 4){
  echo '<th class="table-success" scope="row">Promedio Punto Criticos En Alimentos</th>';
  echo '<td class="table-success">Punto Criticos En Alimentos mayormente en buen estado</td>';
  echo '<td class="table-success">'.$row['promedioControlesPuntoCriticosEnAlimentos'].'</td>';
 }elseif($row['promedioControlesPuntoCriticosEnAlimentos'] == 4){
  echo '<th class="table-warning" scope="row">Promedio Punto Criticos En Alimentos</th>';
  echo '<td class="table-warning">Instalacion Requiere Atencion</td>';
  echo '<td class="table-warning">'.$row['promedioControlesPuntoCriticosEnAlimentos'].'</td>';
 }elseif($row['promedioControlesPuntoCriticosEnAlimentos'] < 4){
  echo '<th class="table-danger" scope="row">Promedio Punto Criticos En Alimentos</th>';
  echo '<td class="table-danger">Requiere Atencion Inmediata</td>';
  echo '<td class="table-danger">'.$row['promedioControlesPuntoCriticosEnAlimentos'].'</td>';
 }
echo '</tr>




<thead class="thead-dark">
<tr>
    <th scope="col">Preguntas Recepcion y Almacenamiento</th>
    <th scope="col">Observacion</th>
    <th scope="col">Nota</th>
</tr>
</thead>



<th scope="row">¿Control de parámetros en la recepción?</th>';
if($row['NotaRecepcionYAlmacenamiento1ControlParametrosRecepcion'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaRecepcionYAlmacenamiento1ControlParametrosRecepcion'].'</td>';
 }elseif($row['NotaRecepcionYAlmacenamiento1ControlParametrosRecepcion'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaRecepcionYAlmacenamiento1ControlParametrosRecepcion'].'</td>';
 }elseif($row['NotaRecepcionYAlmacenamiento1ControlParametrosRecepcion'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaRecepcionYAlmacenamiento1ControlParametrosRecepcion'].'</td>';
 }elseif($row['NotaRecepcionYAlmacenamiento1ControlParametrosRecepcion'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaRecepcionYAlmacenamiento1ControlParametrosRecepcion'].'</td>';
 }
echo '</tr>


<th scope="row">¿Materias primas rotuladas?</th>';
if($row['NotaRecepcionYAlmacenamiento2MateriasPrimasRotuladas'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaRecepcionYAlmacenamiento2MateriasPrimasRotuladas'].'</td>';
 }elseif($row['NotaRecepcionYAlmacenamiento2MateriasPrimasRotuladas'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaRecepcionYAlmacenamiento2MateriasPrimasRotuladas'].'</td>';
 }elseif($row['NotaRecepcionYAlmacenamiento2MateriasPrimasRotuladas'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaRecepcionYAlmacenamiento2MateriasPrimasRotuladas'].'</td>';
 }elseif($row['NotaRecepcionYAlmacenamiento2MateriasPrimasRotuladas'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaRecepcionYAlmacenamiento2MateriasPrimasRotuladas'].'</td>';
 }
echo '</tr>


<th scope="row">¿Almacenamiento en altura y separado de paredes, ordenado?</th>';
if($row['NotaRecepcionYAlmacenamiento3AlmEnAlturaYordenado'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaRecepcionYAlmacenamiento3AlmEnAlturaYordenado'].'</td>';
 }elseif($row['NotaRecepcionYAlmacenamiento3AlmEnAlturaYordenado'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaRecepcionYAlmacenamiento3AlmEnAlturaYordenado'].'</td>';
 }elseif($row['NotaRecepcionYAlmacenamiento3AlmEnAlturaYordenado'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaRecepcionYAlmacenamiento3AlmEnAlturaYordenado'].'</td>';
 }elseif($row['NotaRecepcionYAlmacenamiento3AlmEnAlturaYordenado'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaRecepcionYAlmacenamiento3AlmEnAlturaYordenado'].'</td>';
 }
echo '</tr>


<th scope="row">¿Almacenamiento fuera de envase secundario?</th>';
if($row['NotaRecepcionYAlmacenamiento4AlmFueraEmvacesSecun'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaRecepcionYAlmacenamiento4AlmFueraEmvacesSecun'].'</td>';
 }elseif($row['NotaRecepcionYAlmacenamiento4AlmFueraEmvacesSecun'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaRecepcionYAlmacenamiento4AlmFueraEmvacesSecun'].'</td>';
 }elseif($row['NotaRecepcionYAlmacenamiento4AlmFueraEmvacesSecun'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaRecepcionYAlmacenamiento4AlmFueraEmvacesSecun'].'</td>';
 }elseif($row['NotaRecepcionYAlmacenamiento4AlmFueraEmvacesSecun'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaRecepcionYAlmacenamiento4AlmFueraEmvacesSecun'].'</td>';
 }
echo '</tr>



<th scope="row">¿Cumplimiento de FEFO?</th>';
if($row['NotaRecepcionYAlmacenamiento5CumplimientoDeFEFO'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaRecepcionYAlmacenamiento5CumplimientoDeFEFO'].'</td>';
 }elseif($row['NotaRecepcionYAlmacenamiento5CumplimientoDeFEFO'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaRecepcionYAlmacenamiento5CumplimientoDeFEFO'].'</td>';
 }elseif($row['NotaRecepcionYAlmacenamiento5CumplimientoDeFEFO'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaRecepcionYAlmacenamiento5CumplimientoDeFEFO'].'</td>';
 }elseif($row['NotaRecepcionYAlmacenamiento5CumplimientoDeFEFO'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaRecepcionYAlmacenamiento5CumplimientoDeFEFO'].'</td>';
 }
echo '</tr>



<th scope="row">¿Materias primas alejadas de químicos?</th>';
if($row['NotaRecepcionYAlmacenamiento6MatAlejadasQuimicos'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaRecepcionYAlmacenamiento6MatAlejadasQuimicos'].'</td>';
 }elseif($row['NotaRecepcionYAlmacenamiento6MatAlejadasQuimicos'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaRecepcionYAlmacenamiento6MatAlejadasQuimicos'].'</td>';
 }elseif($row['NotaRecepcionYAlmacenamiento6MatAlejadasQuimicos'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaRecepcionYAlmacenamiento6MatAlejadasQuimicos'].'</td>';
 }elseif($row['NotaRecepcionYAlmacenamiento6MatAlejadasQuimicos'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaRecepcionYAlmacenamiento6MatAlejadasQuimicos'].'</td>';
 }
echo '</tr>';


if($row['promedioRecepcionYAlmacenamiento'] == 0){
  echo '<th class="table-info" scope="row">Promedio Recepcion y Almacenamiento</th>';
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['promedioRecepcionYAlmacenamiento'].'</td>';
 }elseif($row['promedioRecepcionYAlmacenamiento'] > 4){
  echo '<th class="table-success" scope="row">Promedio Recepcion y Almacenamiento</th>';
  echo '<td class="table-success">Punto Criticos En Alimentos mayormente en buen estado</td>';
  echo '<td class="table-success">'.$row['promedioRecepcionYAlmacenamiento'].'</td>';
 }elseif($row['promedioRecepcionYAlmacenamiento'] == 4){
  echo '<th class="table-warning" scope="row">Promedio Recepcion y Almacenamiento</th>';
  echo '<td class="table-warning">Recepcion y Almacenamiento Requiere Atencion</td>';
  echo '<td class="table-warning">'.$row['promedioRecepcionYAlmacenamiento'].'</td>';
 }elseif($row['promedioRecepcionYAlmacenamiento'] < 4){
  echo '<th class="table-danger" scope="row">Promedio Recepcion y Almacenamiento</th>';
  echo '<td class="table-danger">Requiere Atencion Inmediata</td>';
  echo '<td class="table-danger">'.$row['promedioRecepcionYAlmacenamiento'].'</td>';
 }
echo '</tr>



<thead class="thead-dark">
<tr>
    <th scope="col">Preguntas Documentacion</th>
    <th scope="col">Observacion</th>
    <th scope="col">Nota</th>
</tr>
</thead>



<th scope="row">¿Libro de Inspección y Resoluciones Sanitarias?</th>';
if($row['NotaDocumentacion1LibroDeInspeccion'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaDocumentacion1LibroDeInspeccion'].'</td>';
 }elseif($row['NotaDocumentacion1LibroDeInspeccion'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaDocumentacion1LibroDeInspeccion'].'</td>';
 }elseif($row['NotaDocumentacion1LibroDeInspeccion'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaDocumentacion1LibroDeInspeccion'].'</td>';
 }elseif($row['NotaDocumentacion1LibroDeInspeccion'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaDocumentacion1LibroDeInspeccion'].'</td>';
 }
echo '</tr>



<th scope="row">¿GMP, Manual y registros de 6 meses?</th>';
if($row['NotaDocumentacion2GPMmanualReg6meses'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaDocumentacion2GPMmanualReg6meses'].'</td>';
 }elseif($row['NotaDocumentacion2GPMmanualReg6meses'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaDocumentacion2GPMmanualReg6meses'].'</td>';
 }elseif($row['NotaDocumentacion2GPMmanualReg6meses'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaDocumentacion2GPMmanualReg6meses'].'</td>';
 }elseif($row['NotaDocumentacion2GPMmanualReg6meses'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaDocumentacion2GPMmanualReg6meses'].'</td>';
 }
echo '</tr>

<th scope="row">¿GMP completo?</th>';
if($row['NotaDocumentacion3GPMcompleto'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaDocumentacion3GPMcompleto'].'</td>';
 }elseif($row['NotaDocumentacion3GPMcompleto'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaDocumentacion3GPMcompleto'].'</td>';
 }elseif($row['NotaDocumentacion3GPMcompleto'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaDocumentacion3GPMcompleto'].'</td>';
 }elseif($row['NotaDocumentacion3GPMcompleto'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaDocumentacion3GPMcompleto'].'</td>';
 }
echo '</tr>


<th scope="row">¿Certificación de fumigación?</th>';
if($row['NotaDocumentacion4CertificacionDeFumigacion'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaDocumentacion4CertificacionDeFumigacion'].'</td>';
 }elseif($row['NotaDocumentacion4CertificacionDeFumigacion'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaDocumentacion4CertificacionDeFumigacion'].'</td>';
 }elseif($row['NotaDocumentacion4CertificacionDeFumigacion'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaDocumentacion4CertificacionDeFumigacion'].'</td>';
 }elseif($row['NotaDocumentacion4CertificacionDeFumigacion'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaDocumentacion4CertificacionDeFumigacion'].'</td>';
 }
echo '</tr>

<th scope="row">¿Certificado de retiro de aceite?</th>';
if($row['NotaDocumentacion5CertificadoRetiroAceite'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaDocumentacion5CertificadoRetiroAceite'].'</td>';
 }elseif($row['NotaDocumentacion5CertificadoRetiroAceite'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaDocumentacion5CertificadoRetiroAceite'].'</td>';
 }elseif($row['NotaDocumentacion5CertificadoRetiroAceite'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaDocumentacion5CertificadoRetiroAceite'].'</td>';
 }elseif($row['NotaDocumentacion5CertificadoRetiroAceite'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaDocumentacion5CertificadoRetiroAceite'].'</td>';
 }
echo '</tr>

<th scope="row">¿Control de acidez de aceite usado?</th>';
if($row['NotaDocumentacion6ControlDeAceite'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaDocumentacion6ControlDeAceite'].'</td>';
 }elseif($row['NotaDocumentacion6ControlDeAceite'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaDocumentacion6ControlDeAceite'].'</td>';
 }elseif($row['NotaDocumentacion6ControlDeAceite'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaDocumentacion6ControlDeAceite'].'</td>';
 }elseif($row['NotaDocumentacion6ControlDeAceite'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaDocumentacion6ControlDeAceite'].'</td>';
 }
echo '</tr>


<th scope="row">¿Auditorias anteriores?</th>';
if($row['NotaDocumentacion7AuditoriaAnteriores'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaDocumentacion7AuditoriaAnteriores'].'</td>';
 }elseif($row['NotaDocumentacion7AuditoriaAnteriores'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaDocumentacion7AuditoriaAnteriores'].'</td>';
 }elseif($row['NotaDocumentacion7AuditoriaAnteriores'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaDocumentacion7AuditoriaAnteriores'].'</td>';
 }elseif($row['NotaDocumentacion6ControlDeAceite'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaDocumentacion7AuditoriaAnteriores'].'</td>';
 }
echo '</tr>




<th scope="row">¿Carpeta ordenada y actualizada?</th>';
if($row['NotaDocumentacion8CarpetaOrdenadaYactualizada'] == 0){
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['NotaDocumentacion8CarpetaOrdenadaYactualizada'].'</td>';
 }elseif($row['NotaDocumentacion8CarpetaOrdenadaYactualizada'] > 4){
  echo '<td class="table-success">Si Cumple</td>';
  echo '<td class="table-success">'.$row['NotaDocumentacion8CarpetaOrdenadaYactualizada'].'</td>';
 }elseif($row['NotaDocumentacion8CarpetaOrdenadaYactualizada'] == 4){
  echo '<td class="table-warning">Regular</td>';
  echo '<td class="table-warning">'.$row['NotaDocumentacion8CarpetaOrdenadaYactualizada'].'</td>';
 }elseif($row['NotaDocumentacion6ControlDeAceite'] < 4){
  echo '<td class="table-danger">No Cumple</td>';
  echo '<td class="table-danger">'.$row['NotaDocumentacion8CarpetaOrdenadaYactualizada'].'</td>';
 }
echo '</tr>';

if($row['promedioDocumentacion'] == 0){
  echo '<th class="table-info" scope="row">Promedio Documentacion</th>';
  echo '<td class="table-info">No Aplica</td>';
  echo '<td class="table-info">'.$row['promedioDocumentacion'].'</td>';
 }elseif($row['promedioDocumentacion'] > 4){
  echo '<th class="table-success" scope="row">Promedio Documentacion</th>';
  echo '<td class="table-success">Documentacion</td>';
  echo '<td class="table-success">'.$row['promedioDocumentacion'].'</td>';
 }elseif($row['promedioDocumentacion'] == 4){
  echo '<th class="table-warning" scope="row">Promedio Documentacion</th>';
  echo '<td class="table-warning">Recepcion y Almacenamiento Requiere Atencion</td>';
  echo '<td class="table-warning">'.$row['promedioDocumentacion'].'</td>';
 }elseif($row['promedioDocumentacion'] < 4){
  echo '<th class="table-danger" scope="row">Promedio Documentacion</th>';
  echo '<td class="table-danger">Requiere Atencion Inmediata</td>';
  echo '<td class="table-danger">'.$row['promedioDocumentacion'].'</td>';
 }
echo '</tr>


          <tr>
            <th scope="row">Promedio General del local</th>'; 
             if($row['promedio'] < 4){
              echo '<td class="table-danger">Promedio</td>';
              echo '<td class="table-danger">'.$row['promedio'].'</td>';
             }elseif($row['promedio'] > 4){
              echo '<td class="table-success">Promedio</td>';
              echo '<td class="table-success">'.$row['promedio'].'</td>';
             }
           echo '</tr>



           
          <tr>
             <th scope="row">Hora De Termino</th>
             <td>'.$row['HoraDeTermino'].'</td>
             <th scope="col"></th>
          </tr>
          <tr>
            <th scope="row">ObservacionGeneral</th>
            <td>'.$row['ObservacionGeneral'].'</td>
            <th scope="col"></th>
         </tr>


 <thead class="thead-dark">
<tr>
    <th scope="col">Fotos Adjuntas</th>
    <th scope="col">Observacion</th>
    <th scope="col">Fotos</th>
</tr>
</thead>



         <tr>
            <th scope="row">Foto</th>
            <th scope="col">'.$row['DescripcionFoto1'].'</th>
            <td>';?><img src="data:image/jpg;base64,<?php echo base64_encode($row["Foto1"])?>"><?php echo'</td>
         </tr>   
            <br>
              <tr>
         <th scope="row">Foto</th>
              <th scope="col">'.$row['DescripcionFoto2'].'</th>
              <td>';?><img src="data:image/jpg;base64,<?php echo base64_encode($row["Foto2"])?>"><?php echo '</td>
         </tr>   
      <br>
         </tbody>
         

         <thead class="thead-dark">
         <tr>
             <th scope="col">Documentacion Completa</th>
             <th scope="col">¿Exportar a PDF?</th>
             <th scope="col"></th>
         </tr>
         <tr>
         <th scope="col"></th>';?>

<?php 
          
$id = $_POST['id'];

$servername = "arcadespersonalizados.cl";
$username = "car49017_root";
$password = "car49017_root";
$dbname = "car49017_bdproyectoapa";

// Create connection
$conn1 = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn1->connect_error) {
    die("Connection failed: " . $conn1->connect_error);
} 

          $sql1 = "SELECT id FROM formulario WHERE id = '$id'";
          $result1 = $conn1->query($sql1);

          if($result1->num_rows>0){
            while($row1 = mysqli_fetch_assoc($result1)){
             
                echo '   <th scope="col"><a target="_blank" href="pdfCompletoFormularioAdministrador.php?varid='.$row1['id'].'" class="btn btn-danger">Exportar PDF</a></th><th scope="col">';
              }
            }else{
              echo '<tr>
                    <td colspan="6">No se encontraron resultados</td>
                  </tr>';
            }
            echo '</table>';
             ?>

      <?php
      echo '
         <th scope="col"></th>
     </tr>
         </thead>
         
       
      </tr>  
         
         ';
            ?>
            <script>
              var ctx = document.getElementById('myChart').getContext('2d');
              var nota1 =  "<?php echo $row['promedioInstalaciones'];?>";
              var nota2 =  "<?php echo $row['promedioManipulaciones'];?>";
              var nota3 =  "<?php echo $row['promedioManipuladores'];?>";
              var nota4 =  "<?php echo $row['promedioControlesPuntoCriticosEnAlimentos'];?>";
              var nota5 =  "<?php echo $row['promedioRecepcionYAlmacenamiento'];?>";
              var nota6 =  "<?php echo $row['promedioDocumentacion'];?>";
              var myBarChart = new Chart(ctx, {
               type: 'bar',
               data: {
               labels: ['Promedio Instalaciones', 'Promedio Manipulaciones','Promedio Manipuladores','Promedio Puntos Criticos', 'Promedio Almacenado','Promedio Documentacion'],
               datasets: [{
                   label: 'Ocultar valores',
                   data: [nota1, nota2, nota3, nota4, nota5, nota6],
                   backgroundColor: [
                    'rgba(0, 0, 0, 0.1)'
                   ],
                   borderColor: [
                    'rgba(0, 0, 0, 0.1)'
                    ],
                      borderWidth: [3
                    ],
                    borderCapStyle: ['butt'
                    ],

                    fill:[ true
                    ],

                    lineTension:[ 0.4
                    ],
       
                    pointBackgroundColor:[ 'rgba(0, 0, 0, 0.1)'
                    ],
                    pointBorderColor:[ 'rgba(0, 0, 0, 0.1)'
                    ],

                    pointBorderWidth:[ 1
                    ],
                    pointHitRadius:[ 1
                    ],
                    pointHoverBorderWidth:[ 1
                    ],
                    pointHoverRadius:[ 4
                    ],
                    pointRadius:[ 3
                    ],
                    pointStyle:[ 'circle'
                    ],
                    pointStyle:[ false
                    ],
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
<?php


	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';











/* reciclar codigo 


if para la solucion de las notas si es menor a 4 que salga en rojo, si es mayor que salga en verde 
    if($row['promedio'] < 4){
            echo '<tr">
            <th scope="row"></th>
                  <td>'.$row['promedio'].'</td>
           </tr>';
           }elseif ($row['promedio'] > 4){
             echo '<tr">
             <th scope="row"></th>
                <td>'.$row['promedio'].'</td>
            </tr>';
           };
           echo 
           
           
           */
?>

