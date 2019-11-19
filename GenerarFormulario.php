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
    <link rel="stylesheet" href="css/styleAuditor.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Generar Formulario</title>
</head>
<body>
    <div class="topnav" id="myTopnav">
    <a href="perfilAuditor.php" class="active">Home</a>
    <a href="GenerarFormulario.php">Nueva Inspeccion</a>
    <a href="phpRegistrarYloguear/cerrarsesion.php">Cerrar Sesion</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
   <a style="color:white">Auditor: <?php 
       echo $user->getCorreo();?></a>
  </div>
  <div style="padding-left:16px">

  
  <div id="cA"></div>
    <h1 class="container">Inspeccion</h1>

    <div id="ContenidoInspeccion" class="container">
      <div class="container" id="ContenedorPorChelist"> 
       
      <form action="RegistrarDocumento.php" method="post" enctype="multipart/form-data">
        

          <p>Hora de inicio </p> <input id="HoraDeInicio" class="container" type="time" name="HoraDeInicio" placeholder="Ingrese la hora de inicio" required>
          <p>Fecha de Inspeccion </p> <input id="Fecha" class="container" type="date" name="Fecha" placeholder="Ingrese la fecha" required><br/>
          <br/>
          <p>Seleciona el Local</p>
          
          <SELECT id="locales" name="locales" placeholder="Seleccione un item" required>
          <OPTION Value="">Selecciona</OPTION>
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

                  $sql = "SELECT id, Nombre, Ubicacion FROM locales";
                  $result = $conn->query($sql);
                  if($result->num_rows>0){
	                    while($row = mysqli_fetch_assoc($result)){
                      ?>     
                           <OPTION Value=<?php echo $row["id"]?>><?php echo utf8_decode($row["Nombre"])?>//<?php echo utf8_decode($row["Ubicacion"])?></OPTION>
                       }
                     <?php
                      }
                    }else{
                   echo '<tr>
                      <td colspan="6">No se encontraron resultados</td>
                        </tr>';
                    }
                   echo '</table>';
                ?>
            </SELECT>
            <!-- Parte de informe auditoria Instalaciones -->
          <h2>Instalaciones</h2>
           <!-- 1 -->
          <strong><label for="exampleInputEmail1">1.- ¿Pisos limpios y en buen estado?</label></strong>
                <label for="exampleInputEmail1">Observacion</label>
          
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaInstalaciones1EstadoPisos" name="NotaInstalaciones1EstadoPisos">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>

             <!-- 2  -->
            <strong><label for="exampleInputEmail1">2.- ¿Muros y zócalos limpios y en buen estado?</label></strong>
                <label for="exampleInputEmail1">Observacion</label>

            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaInstalaciones2EstadoMuros" name="NotaInstalaciones2EstadoMuros">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>
              <!-- 3 -->
            <strong><label for="exampleInputEmail1">3.- ¿Cielos limpios y en buen estado?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
         
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaInstalaciones3EstadoCielos" name="NotaInstalaciones3EstadoCielos">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>

             <!-- 4  -->
            <strong><label for="exampleInputEmail1">4.- ¿Puertas y ventanas limpias y en buen estado?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
          
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaInstalaciones4EstadoPuertas" name="NotaInstalaciones4EstadoPuertas">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>
            <!--5  -->
            <strong><label for="exampleInputEmail1">5.- ¿Iluminación limpias y en buen estado?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
         
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaInstalaciones5EstadoIluminacion" name="NotaInstalaciones5EstadoIluminacion">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>

               <!-- 6 -->
            <strong><label for="exampleInputEmail1">6.- ¿Sistema inyección y extracción limpios y en buen estado?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
           
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaInstalaciones6EstadoSistemaInyeccion" name="NotaInstalaciones6EstadoSistemaInyeccion">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>

                     <!-- 7 -->
            <strong><label for="exampleInputEmail1">7.- ¿Temperatura ambiente (22°C)?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
          
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaInstalaciones7TemperaturaAmbiente22cc" name="NotaInstalaciones7TemperaturaAmbiente22cc">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>

                     <!-- 8 -->
            <strong><label for="exampleInputEmail1">8.- ¿Lavafondos y lavamanos limpios y en buen estado?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
         
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaInstalaciones8EstadoLavaFondos" name="NotaInstalaciones8EstadoLavaFondos">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>

                     <!-- 9 -->
            <strong><label for="exampleInputEmail1">9.- ¿Cámaras y desagües limpios y en buen estado?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
        
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaInstalaciones9EstadoCamaras" name="NotaInstalaciones9EstadoCamaras">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>


             <!-- 10 -->
            <strong><label for="exampleInputEmail1">10.- ¿Basureros lavables, en buen estado, con tapa, sistema de pedal.?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
         
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaInstalaciones10EstadoBasureros" name="NotaInstalaciones10EstadoBasureros">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>


            <!-- 11  -->
            <strong><label for="exampleInputEmail1">11.- ¿Basureros limpios y con bolsa.?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
            
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaInstalaciones11BasurerosLimpios" name="NotaInstalaciones11BasurerosLimpios">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>

                    <!-- 12  -->
            <strong><label for="exampleInputEmail1">12.- ¿Ausencia de plagas?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
           
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaInstalaciones12AusenciaPlagas" name="NotaInstalaciones12AusenciaPlagas">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>

<!-- 13  -->
            <strong><label for="exampleInputEmail1">13.- ¿Lavamanos: existencia de jabón y papel?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
          
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaInstalaciones13ExisteJavonLavamanos" name="NotaInstalaciones13ExisteJavonLavamanos">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>

<!-- 14  -->
            <strong><label for="exampleInputEmail1">14.- ¿Baños, artefactos limpios, ordenados y en buen estado?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
         
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaInstalaciones14EstadoBanios" name="NotaInstalaciones14EstadoBanios">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>

     <!-- 15  -->
            <strong><label for="exampleInputEmail1">15.- ¿Disponibilidad de agua caliente?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
          
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaInstalaciones15AguaCalienteDisponible" name="NotaInstalaciones15AguaCalienteDisponible">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>

<!-- 16  -->
            <strong><label for="exampleInputEmail1">16.- ¿Vestidores limpios y ordenados?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
          
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaInstalaciones16VestidoresLimpios" name="NotaInstalaciones16VestidoresLimpios">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>

<!-- 17  -->
            <strong><label for="exampleInputEmail1">17.- ¿Maquinaria y artefactos limpios y en buen estado?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
          
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaInstalaciones17AusenciaDePlagas" name="NotaInstalaciones17AusenciaDePlagas">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>


<!-- 18  -->
            <strong><label for="exampleInputEmail1">18.- ¿Mesones y repisas limpios y en buen estado?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
        
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaInstalaciones18EstadoMesones" name="NotaInstalaciones18EstadoMesones">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>

            <!-- 19 -->
            <strong><label for="exampleInputEmail1">19.- ¿Existencia de utensilios necesarios?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
        
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaInstalaciones19ExistenciaUntensillos" name="NotaInstalaciones19ExistenciaUntensillos">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>

            <!-- 20 -->
            <strong><label for="exampleInputEmail1">20.- ¿Utensilios limpios y en buen estado?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
           
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaInstalaciones20EstadoUntensillos" name="NotaInstalaciones20EstadoUntensillos">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>

                     <!-- 21 -->
            <strong><label for="exampleInputEmail1">21.- ¿Equipos de refrigeración (0 a 5°C)?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
         
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaInstalaciones21EquiposDeRefrigeracion5C" name="NotaInstalaciones21EquiposDeRefrigeracion5C">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>


            <!-- 22 -->
            <strong><label for="exampleInputEmail1">22.- ¿Equipos de frío limpios y en buen estado?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
           
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaInstalaciones22EstadoEquiposDeFrio" name="NotaInstalaciones22EstadoEquiposDeFrio">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>


            <!-- 23 -->
            <strong><label for="exampleInputEmail1">23.- ¿Equipos de calor (sobre 65°C)?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
           
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaInstalaciones23EquiposDeCalor65C" name="NotaInstalaciones23EquiposDeCalor65C">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>

            <!-- 24 -->
            <strong><label for="exampleInputEmail1">24.- ¿Equipos de calor limpios y en buen estado?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
          
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaInstalaciones24EstadoEquiposDeCalor" name="NotaInstalaciones24EstadoEquiposDeCalor">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>   
            <br/>
            <br/>

                    
 <!-- Parte de informe auditoria MANIPULACIONES -->
              <!-- 25 -->
              <h2>Manipulacion</h2>
        <strong><label for="exampleInputEmail1">25.- ¿Sanitización de frutas y verduras en solución sanitizante?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
         
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaManipulaciones1SanitizacionDeFrutas" name="NotaManipulaciones1SanitizacionDeFrutas">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>

 <!-- 26 -->
 <strong><label for="exampleInputEmail1">26.- ¿Sanitización de utensilios y superficies con solución sanitinzate			
?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
          
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaManipulaciones2SanitizacionDeUntensillos" name="NotaManipulaciones2SanitizacionDeUntensillos">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>
            

              <!-- 27 -->
              <strong><label for="exampleInputEmail1">27.- ¿Alimentos protegidos y rotulados?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
           
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaManipulaciones3AlimentosProtegidosYrotulados" name="NotaManipulaciones3AlimentosProtegidosYrotulados">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>   

            <!-- 28 -->
            <strong><label for="exampleInputEmail1">28.- ¿Alimentos cocidos almacenados alejados de crudos?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
         
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaManipulaciones4AlimentosCocidosAlmacenados" name="NotaManipulaciones4AlimentosCocidosAlmacenados">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>  


            <!-- 29 -->
            <strong><label for="exampleInputEmail1">29.- ¿Orden al trabajar?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
           
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaManipulaciones5OrdenAlTrabajar" name="NotaManipulaciones5OrdenAlTrabajar">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/> 

                <!-- 30 -->
                <strong><label for="exampleInputEmail1">30.- ¿Uso de productos autorizados?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
        
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaManipulaciones6UsoProductosAutorizados" name="NotaManipulaciones6UsoProductosAutorizados">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>  


                 <!-- 31 -->
                 <strong><label for="exampleInputEmail1">31.- ¿Ausencia de alimentos sobrantes y/o alterados?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
          
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaManipulaciones7AusenciaDeAlimentosSobrantes" name="NotaManipulaciones7AusenciaDeAlimentosSobrantes">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>


                  <!-- 32 -->
                  <strong><label for="exampleInputEmail1">32.- ¿Ausencia de productos vencidos?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
        
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaManipulaciones8AusenciaDeProductosVencidos" name="NotaManipulaciones8AusenciaDeProductosVencidos">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/> 


              
             <!-- 33 -->
             <strong><label for="exampleInputEmail1">33.- ¿Existencia y uso correcto de detergentes?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
         
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaManipulaciones9ExistenciaYusoCorrectoDetergente" name="NotaManipulaciones9ExistenciaYusoCorrectoDetergente">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/> 


        <!-- 34 -->
           <strong><label for="exampleInputEmail1">34.- ¿Dilutores y rociadores rotulados, limpios y en buen estado?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
          
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaManipulaciones10EstadoDilutores" name="NotaManipulaciones10EstadoDilutores">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/> 


            <!-- 35 -->
        <strong><label for="exampleInputEmail1">35.- ¿Existencia de artículos de aseo y seguridad?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
          
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaManipulaciones11ExisteArtDeAseoYseguridad" name="NotaManipulaciones11ExisteArtDeAseoYseguridad">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>
            



          <!-- 36 -->
        <strong><label for="exampleInputEmail1">36.- ¿Ausencia de objetos ajenos a la manipulación?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
           
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaManipulaciones12AusenciaDeObjtAjenosManipulacion" name="NotaManipulaciones12AusenciaDeObjtAjenosManipulacion">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/> 



            
          <!-- 37 -->
        <strong><label for="exampleInputEmail1">37.- ¿Cumplimiento de procedimientos?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
           
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaManipulaciones13CumplimientoProcedimientos" name="NotaManipulaciones13CumplimientoProcedimientos">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>



            <!-- 38 -->
          <strong><label for="exampleInputEmail1">38.- ¿Ausencia de contaminación cruzada?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
          
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaManipulaciones14AusenciaContaminacionCruzada" name="NotaManipulaciones14AusenciaContaminacionCruzada">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>



             <!-- 39 -->
        <strong><label for="exampleInputEmail1">39.- ¿Lavado frecuente y eficiente de manos?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
          
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaManipulaciones15LavadoDeManosFrecuente" name="NotaManipulaciones15LavadoDeManosFrecuente">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>

          <h2>Manipuladores</h2>


          <!-- 40 -->
              <strong><label for="exampleInputEmail1">40.- ¿Uniforme limpio, completo y en buen estado?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
           
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaManipuladores1EstadoUniforme" name="NotaManipuladores1EstadoUniforme">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>


                    <!-- 41 -->
              <strong><label for="exampleInputEmail1">41.- ¿Uso de mascarilla y guantes, si corresponde?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
           
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaManipuladores2UsoDeMascarillas" name="NotaManipuladores2UsoDeMascarillas">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>

                           <!-- 42 -->
              <strong><label for="exampleInputEmail1">42.- ¿Presentación personal?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
          
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaManipuladores3PresentacionPersonal" name="NotaManipuladores3PresentacionPersonal">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>

            <br/>
            <br/>

                          <!-- 43 -->
              <strong><label for="exampleInputEmail1">43.- ¿Hábitos higiénicos?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
        
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaManipuladores4HabitosHigienicos" name="NotaManipuladores4HabitosHigienicos">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>







            <h2>Controles Puntos Criticos En Alimentos</h2>

                             <!-- 44 -->
              <strong><label for="exampleInputEmail1">43.- ¿Temperatura de cocción (mayor a 65°C)?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
          
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaControlesPuntoCriticosEnAlimentos1TemperaturaCoccion65cc" name="NotaControlesPuntoCriticosEnAlimentos1TemperaturaCoccion65cc">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
    
            <br/>
            <br/>

                    <!-- 45 -->
              <strong><label for="exampleInputEmail1">45.- ¿Temperatura de recalentamiento (mayor 74°C)?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
           
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaControlesPuntoCriticosEnAlimentos2TempCalentMayor75cc" name="NotaControlesPuntoCriticosEnAlimentos2TempCalentMayor75cc">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
 
            <br/>
            <br/>

                    <!-- 46 -->
              <strong><label for="exampleInputEmail1">46.- ¿Temperatura de refrigeración (0 a 5°C)?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
            
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaControlesPuntoCriticosEnAlimentos3TempRefrigeracion0a5cc" name="NotaControlesPuntoCriticosEnAlimentos3TempRefrigeracion0a5cc">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
    
            <br/>
            <br/>


                      <!-- 47 -->
              <strong><label for="exampleInputEmail1">47.- ¿Temperatura de congelación (-18°C)?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
           
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaControlesPuntoCriticosEnAlimentos4TempCongelacionMenos18cc" name="NotaControlesPuntoCriticosEnAlimentos4TempCongelacionMenos18cc">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
          
            <br/>
            <br/>


                       <!-- 48 -->
              <strong><label for="exampleInputEmail1">48.- ¿Exibicion de alimentos de manera correcta y segura?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
          
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaControlesPuntoCriticosEnAlimentos5ExibiAlimentFormCorrecta" name="NotaControlesPuntoCriticosEnAlimentos5ExibiAlimentFormCorrecta">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
     
            <br/>
            <br/>


            <h2>Recepcion Y Almacenamiento</h2>

              <!-- 49-->
              <strong><label for="exampleInputEmail1">49.- ¿Control de parámetros en la recepción?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
         
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaRecepcionYAlmacenamiento1ControlParametrosRecepcion" name="NotaRecepcionYAlmacenamiento1ControlParametrosRecepcion">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
     
            <br/>
            <br/>


                      <!-- 50-->
              <strong><label for="exampleInputEmail1">50.- ¿Materias primas rotuladas?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
          
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaRecepcionYAlmacenamiento2MateriasPrimasRotuladas" name="NotaRecepcionYAlmacenamiento2MateriasPrimasRotuladas">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
      
            <br/>
            <br/>

                    <!-- 51-->
              <strong><label for="exampleInputEmail1">51.- ¿Almacenamiento en altura y separado de paredes, ordenado?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
           
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaRecepcionYAlmacenamiento3AlmEnAlturaYordenado" name="NotaRecepcionYAlmacenamiento3AlmEnAlturaYordenado">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
    
            <br/>
            <br/>

                        <!-- 52-->
              <strong><label for="exampleInputEmail1">52.- ¿Almacenamiento fuera de envase secundario?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
           
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaRecepcionYAlmacenamiento4AlmFueraEmvacesSecun" name="NotaRecepcionYAlmacenamiento4AlmFueraEmvacesSecun">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>



       <!-- 53-->
       <strong><label for="exampleInputEmail1">53.- ¿Cumplimiento de FEFO?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
           
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaRecepcionYAlmacenamiento5CumplimientoDeFEFO" name="NotaRecepcionYAlmacenamiento5CumplimientoDeFEFO">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>




            <!-- 54-->
          <strong><label for="exampleInputEmail1">54.- ¿Materias primas alejadas de químicos?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
            
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaRecepcionYAlmacenamiento6MatAlejadasQuimicos" name="NotaRecepcionYAlmacenamiento6MatAlejadasQuimicos">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>


            <h2>Documentacion</h2>


              <!-- 55-->
              <strong><label for="exampleInputEmail1">54.- ¿Libro de Inspección y Resoluciones Sanitarias?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
         
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaDocumentacion1LibroDeInspeccion" name="NotaDocumentacion1LibroDeInspeccion">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>


             <!-- 56-->
            <strong><label for="exampleInputEmail1">56.- ¿GMP, Manual y registros de 6 meses?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
           
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaDocumentacion2GPMmanualReg6meses" name="NotaDocumentacion2GPMmanualReg6meses">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>



            <!-- 57-->
            <strong><label for="exampleInputEmail1">57.- ¿GMP completo?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
            
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaDocumentacion3GPMcompleto" name="NotaDocumentacion3GPMcompleto">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>


             <!-- 58-->
            <strong><label for="exampleInputEmail1">58.- ¿Certificación de fumigación?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
        
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaDocumentacion4CertificacionDeFumigacion" name="NotaDocumentacion4CertificacionDeFumigacion">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>


                     <!-- 59-->
            <strong><label for="exampleInputEmail1">59.- ¿Certificado de retiro de aceite?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
            
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaDocumentacion5CertificadoRetiroAceite" name="NotaDocumentacion5CertificadoRetiroAceite">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>



            <!-- 60-->
            <strong><label for="exampleInputEmail1">60.- ¿Control de acidez de aceite usado?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
          
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaDocumentacion6ControlDeAceite" name="NotaDocumentacion6ControlDeAceite">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>

                     <!-- 61-->
            <strong><label for="exampleInputEmail1">61.- ¿Auditorias anteriores?</label></strong>
                    <label for="exampleInputEmail1">Observacion</label>
          
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaDocumentacion7AuditoriaAnteriores" name="NotaDocumentacion7AuditoriaAnteriores">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>

             <!-- 62-->
              <strong><label for="exampleInputEmail1">62.- ¿Carpeta ordenada y actualizada?</label></strong>
                <label for="exampleInputEmail1">Observacion</label>
           
            <label for="exampleInputPassword1">Nota</label>
            <SELECT id="NotaDocumentacion8CarpetaOrdenadaYactualizada" name="NotaDocumentacion8CarpetaOrdenadaYactualizada">
            <OPTION Value="0">Selecciona</OPTION>
                <OPTION Value="7">(7) Bueno</OPTION>
                <OPTION Value="4">(4) Regular</OPTION>
                <OPTION Value="1">(1) Critico</OPTION>
                <OPTION Value="0">-No Aplica-</OPTION>
            </SELECT><br/>
            <br/>
            <br/>
            <br/>
            <div class="table-responsive">
 <table class="table">
  <thead>
    <tr>
    <th scope="col">Imagenes</th>
      <th scope="col">Descripcion</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <th scope="col"><input type="file" accept="image/*" id="Foto1" name="Foto1" capture="camera"></th>
      <th scope="col"><textarea class="form-control" aria-label="With textarea" id="DescripcionFoto1" name="DescripcionFoto1"></textarea></th>
    </tr>
    <tr>
    <th scope="col"><input type="file" accept="image/*" id="Foto2" name="Foto2" capture="camera"></th>
      <th scope="col"><textarea class="form-control" aria-label="With textarea" id="DescripcionFoto2" name="DescripcionFoto2"></textarea></th>
    </tr>
    <tr>
    <th scope="col"><input type="file" accept="image/*" id="Foto3" name="Foto3" capture="camera"></th>
      <th scope="col"><textarea class="form-control" aria-label="With textarea" id="DescripcionFoto3" name="DescripcionFoto3"></textarea></th>
    </tr>
    <tr>
    <th scope="col"><input type="file" accept="image/*" id="Foto4" name="Foto4" capture="camera"></th>
      <th scope="col"><textarea class="form-control" aria-label="With textarea" id="DescripcionFoto4" name="DescripcionFoto4"></textarea></th>
    </tr>
    <tr>
    <th scope="col"><input type="file" accept="image/*" id="Foto5" name="Foto5" capture="camera"></th>
      <th scope="col"><textarea class="form-control" aria-label="With textarea" id="DescripcionFoto5" name="DescripcionFoto5"></textarea></th>
    </tr>
  </tbody>
</table>
</div>
         <!-- fin table responsive -->


          </div>
          <div class="container">
                  <label for="exampleInputEmail1">Descripcion</label>
                  <textarea type="text" class="form-control" id="ObservacionGeneral" name="ObservacionGeneral" rows="10" cols="50"></textarea><br>
                  <p>Hora de Termino </p><input id="HoraDeTermino" class="container" type="time" name="HoraDeTermino" placeholder="Ingrese la hora de termino" required>
                </div>
                <br/>
                <div class="container">
                  <div class="row">
                    <div class="col-sm-4"></div>
                    <input class="btn btn-primary btn-lg" type="submit" value="Guardar"><br/>
                    <div class="col-sm-4" stye="width:100px;"></div>
                  </div>
              
                </div>
         </form>
  </div>
  <div id="abajo" stye="width:200px;"></div>
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