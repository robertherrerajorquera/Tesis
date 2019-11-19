
<?php
// Insert de datos en la base de datos tabla documentos
$servername = "arcadespersonalizados.cl";
$username = "car49017_root";
$password = "car49017_root";
$dbname = "car49017_bdproyectoapa";



// Primera parte del formulaio auditor.
    $HoraDeInicio = $_POST['HoraDeInicio'];
    $Fecha = $_POST['Fecha'];
    $idlocales = $_POST['locales'];
    

// Segunda parte del formulario auditor parte instalaciones.
// 1
    $NotaInstalaciones1EstadoPisos = $_POST['NotaInstalaciones1EstadoPisos'];
// 2
    $NotaInstalaciones2EstadoMuros = $_POST['NotaInstalaciones2EstadoMuros'];
// 3
    $NotaInstalaciones3EstadoCielos = $_POST['NotaInstalaciones3EstadoCielos'];
// 4
    $NotaInstalaciones4EstadoPuertas = $_POST['NotaInstalaciones4EstadoPuertas'];
// 5
    $NotaInstalaciones5EstadoIluminacion = $_POST['NotaInstalaciones5EstadoIluminacion'];  
// 6
    $NotaInstalaciones6EstadoSistemaInyeccion = $_POST['NotaInstalaciones6EstadoSistemaInyeccion'];
// 7
    $NotaInstalaciones7TemperaturaAmbiente22cc = $_POST['NotaInstalaciones7TemperaturaAmbiente22cc'];      
// 8
    $NotaInstalaciones8EstadoLavaFondos = $_POST['NotaInstalaciones8EstadoLavaFondos'];  
// 9
    $NotaInstalaciones9EstadoCamaras = $_POST['NotaInstalaciones9EstadoCamaras'];
// 10
    $NotaInstalaciones10EstadoBasureros = $_POST['NotaInstalaciones10EstadoBasureros'];
// 11
    $NotaInstalaciones11BasurerosLimpios = $_POST['NotaInstalaciones11BasurerosLimpios'];
// 12
    $NotaInstalaciones12AusenciaPlagas = $_POST['NotaInstalaciones12AusenciaPlagas'];
// 13
    $NotaInstalaciones13ExisteJavonLavamanos = $_POST['NotaInstalaciones13ExisteJavonLavamanos'];
// 14
    $NotaInstalaciones14EstadoBanios = $_POST['NotaInstalaciones14EstadoBanios'];
// 15
    $NotaInstalaciones15AguaCalienteDisponible = $_POST['NotaInstalaciones15AguaCalienteDisponible'];
// 16
    $NotaInstalaciones16VestidoresLimpios = $_POST['NotaInstalaciones16VestidoresLimpios'];
// 17
    $NotaInstalaciones17AusenciaDePlagas = $_POST['NotaInstalaciones17AusenciaDePlagas'];
// 18
    $NotaInstalaciones18EstadoMesones = $_POST['NotaInstalaciones18EstadoMesones'];
// 19
    $NotaInstalaciones19ExistenciaUntensillos = $_POST['NotaInstalaciones19ExistenciaUntensillos'];
// 20
    $NotaInstalaciones20EstadoUntensillos = $_POST['NotaInstalaciones20EstadoUntensillos'];
// 21
    $NotaInstalaciones21EquiposDeRefrigeracion5C = $_POST['NotaInstalaciones21EquiposDeRefrigeracion5C'];
// 22
    $NotaInstalaciones22EstadoEquiposDeFrio = $_POST['NotaInstalaciones22EstadoEquiposDeFrio'];
// 23
    $NotaInstalaciones23EquiposDeCalor65C = $_POST['NotaInstalaciones23EquiposDeCalor65C'];
// 24
    $NotaInstalaciones24EstadoEquiposDeCalor = $_POST['NotaInstalaciones24EstadoEquiposDeCalor'];



// Segunda parte del formulario auditor parte MANIPULACIONES.
// 25
    $NotaManipulaciones1SanitizacionDeFrutas = $_POST['NotaManipulaciones1SanitizacionDeFrutas'];
// 26
    $NotaManipulaciones2SanitizacionDeUntensillos = $_POST['NotaManipulaciones2SanitizacionDeUntensillos'];
// 27
    $NotaManipulaciones3AlimentosProtegidosYrotulados = $_POST['NotaManipulaciones3AlimentosProtegidosYrotulados'];
// 28
    $NotaManipulaciones4AlimentosCocidosAlmacenados = $_POST['NotaManipulaciones4AlimentosCocidosAlmacenados'];
// 29
    $NotaManipulaciones5OrdenAlTrabajar = $_POST['NotaManipulaciones5OrdenAlTrabajar'];
// 30
    $NotaManipulaciones6UsoProductosAutorizados = $_POST['NotaManipulaciones6UsoProductosAutorizados'];
// 31
    $NotaManipulaciones7AusenciaDeAlimentosSobrantes = $_POST['NotaManipulaciones7AusenciaDeAlimentosSobrantes'];
// 32
    $NotaManipulaciones8AusenciaDeProductosVencidos = $_POST['NotaManipulaciones8AusenciaDeProductosVencidos'];
// 33
    $NotaManipulaciones9ExistenciaYusoCorrectoDetergente = $_POST['NotaManipulaciones9ExistenciaYusoCorrectoDetergente'];
// 34
    $NotaManipulaciones10EstadoDilutores = $_POST['NotaManipulaciones10EstadoDilutores'];
// 35
    $NotaManipulaciones11ExisteArtDeAseoYseguridad = $_POST['NotaManipulaciones11ExisteArtDeAseoYseguridad'];
// 36
    $NotaManipulaciones12AusenciaDeObjtAjenosManipulacion = $_POST['NotaManipulaciones12AusenciaDeObjtAjenosManipulacion'];
// 37
    $NotaManipulaciones13CumplimientoProcedimientos = $_POST['NotaManipulaciones13CumplimientoProcedimientos'];
// 38
    $NotaManipulaciones14AusenciaContaminacionCruzada = $_POST['NotaManipulaciones14AusenciaContaminacionCruzada'];
// 39
    $NotaManipulaciones15LavadoDeManosFrecuente = $_POST['NotaManipulaciones15LavadoDeManosFrecuente'];

// Segunda parte del formulario auditor parte MANIPULADORES .
// 40
    $NotaManipuladores1EstadoUniforme = $_POST['NotaManipuladores1EstadoUniforme'];
// 41
    $NotaManipuladores2UsoDeMascarillas = $_POST['NotaManipuladores2UsoDeMascarillas'];
// 42
    $NotaManipuladores3PresentacionPersonal = $_POST['NotaManipuladores3PresentacionPersonal'];
// 43
    $NotaManipuladores4HabitosHigienicos = $_POST['NotaManipuladores4HabitosHigienicos'];


// Segunda parte del formulario auditor parte Controles Puntos Criticos En Alimentos.
// 44
   
    $NotaControlesPuntoCriticosEnAlimentos1TemperaturaCoccion65cc = $_POST['NotaControlesPuntoCriticosEnAlimentos1TemperaturaCoccion65cc'];
// 45
    $NotaControlesPuntoCriticosEnAlimentos2TempCalentMayor75cc = $_POST['NotaControlesPuntoCriticosEnAlimentos2TempCalentMayor75cc'];
// 46
    $NotaControlesPuntoCriticosEnAlimentos3TempRefrigeracion0a5cc = $_POST['NotaControlesPuntoCriticosEnAlimentos3TempRefrigeracion0a5cc'];
// 47
    $NotaControlesPuntoCriticosEnAlimentos4TempCongelacionMenos18cc = $_POST['NotaControlesPuntoCriticosEnAlimentos4TempCongelacionMenos18cc'];
// 48
    $NotaControlesPuntoCriticosEnAlimentos5ExibiAlimentFormCorrecta = $_POST['NotaControlesPuntoCriticosEnAlimentos5ExibiAlimentFormCorrecta'];
    
    
// Segunda parte del formulario auditor parte Recepcion Y Almacenamiento.
// 49
    $NotaRecepcionYAlmacenamiento1ControlParametrosRecepcion = $_POST['NotaRecepcionYAlmacenamiento1ControlParametrosRecepcion'];
// 50
    $NotaRecepcionYAlmacenamiento2MateriasPrimasRotuladas = $_POST['NotaRecepcionYAlmacenamiento2MateriasPrimasRotuladas'];
// 51
    $NotaRecepcionYAlmacenamiento3AlmEnAlturaYordenado = $_POST['NotaRecepcionYAlmacenamiento3AlmEnAlturaYordenado'];
// 52
    $NotaRecepcionYAlmacenamiento4AlmFueraEmvacesSecun = $_POST['NotaRecepcionYAlmacenamiento4AlmFueraEmvacesSecun'];
// 53
    $NotaRecepcionYAlmacenamiento5CumplimientoDeFEFO = $_POST['NotaRecepcionYAlmacenamiento5CumplimientoDeFEFO'];
// 54
    $NotaRecepcionYAlmacenamiento6MatAlejadasQuimicos = $_POST['NotaRecepcionYAlmacenamiento6MatAlejadasQuimicos'];


// Segunda parte del formulario auditor parte DOCUMENTACION.
// 55
    $NotaDocumentacion1LibroDeInspeccion = $_POST['NotaDocumentacion1LibroDeInspeccion'];
// 56
    $NotaDocumentacion2GPMmanualReg6meses = $_POST['NotaDocumentacion2GPMmanualReg6meses'];
// 57
    $NotaDocumentacion3GPMcompleto = $_POST['NotaDocumentacion3GPMcompleto'];
// 58
    $NotaDocumentacion4CertificacionDeFumigacion = $_POST['NotaDocumentacion4CertificacionDeFumigacion'];
// 59
    $NotaDocumentacion5CertificadoRetiroAceite = $_POST['NotaDocumentacion5CertificadoRetiroAceite'];
// 60
    $NotaDocumentacion6ControlDeAceite = $_POST['NotaDocumentacion6ControlDeAceite'];
// 61
    $NotaDocumentacion7AuditoriaAnteriores = $_POST['NotaDocumentacion7AuditoriaAnteriores'];
// 62
    $NotaDocumentacion8CarpetaOrdenadaYactualizada = $_POST['NotaDocumentacion8CarpetaOrdenadaYactualizada'];



// Adjuntacion de imagenes mas su descripcion respectiva :D 

    $Foto1 = addslashes(file_get_contents($_FILES['Foto1']['tmp_name']));
    $DescripcionFoto1 = $_POST['DescripcionFoto1'];

    $Foto2 = addslashes(file_get_contents($_FILES['Foto2']['tmp_name']));
    $DescripcionFoto2 = $_POST['DescripcionFoto2'];

    $Foto3 = addslashes(file_get_contents($_FILES['Foto3']['tmp_name']));
    $DescripcionFoto3 = $_POST['DescripcionFoto3'];

    $Foto4 = addslashes(file_get_contents($_FILES['Foto4']['tmp_name']));
    $DescripcionFoto4 = $_POST['DescripcionFoto4'];

    $Foto5 = addslashes(file_get_contents($_FILES['Foto5']['tmp_name']));
    $DescripcionFoto5 = $_POST['DescripcionFoto5'];

// Tercera parte de Formulario termino

    $ObservacionGeneral = $_POST['ObservacionGeneral'];
    $HoraDeTermino = $_POST['HoraDeTermino'];
   

$listaNotas = array($NotaInstalaciones1EstadoPisos, $NotaInstalaciones2EstadoMuros, $NotaInstalaciones3EstadoCielos, $NotaInstalaciones4EstadoPuertas, $NotaInstalaciones5EstadoIluminacion, $NotaInstalaciones6EstadoSistemaInyeccion, $NotaInstalaciones7TemperaturaAmbiente22cc, $NotaInstalaciones8EstadoLavaFondos, 
$NotaInstalaciones9EstadoCamaras, $NotaInstalaciones10EstadoBasureros, $NotaInstalaciones11BasurerosLimpios, $NotaInstalaciones12AusenciaPlagas, $NotaInstalaciones13ExisteJavonLavamanos, $NotaInstalaciones14EstadoBanios, $NotaInstalaciones15AguaCalienteDisponible, $NotaInstalaciones16VestidoresLimpios, $NotaInstalaciones17AusenciaDePlagas,
$NotaInstalaciones18EstadoMesones, $NotaInstalaciones19ExistenciaUntensillos, $NotaInstalaciones20EstadoUntensillos, $NotaInstalaciones21EquiposDeRefrigeracion5C, $NotaInstalaciones22EstadoEquiposDeFrio, $NotaInstalaciones23EquiposDeCalor65C, $NotaInstalaciones24EstadoEquiposDeCalor,



$NotaManipulaciones1SanitizacionDeFrutas, $NotaManipulaciones2SanitizacionDeUntensillos, $NotaManipulaciones3AlimentosProtegidosYrotulados, $NotaManipulaciones4AlimentosCocidosAlmacenados, $NotaManipulaciones5OrdenAlTrabajar, $NotaManipulaciones6UsoProductosAutorizados, $NotaManipulaciones7AusenciaDeAlimentosSobrantes, $NotaManipulaciones8AusenciaDeProductosVencidos, $NotaManipulaciones9ExistenciaYusoCorrectoDetergente,
$NotaManipulaciones10EstadoDilutores, $NotaManipulaciones11ExisteArtDeAseoYseguridad, $NotaManipulaciones12AusenciaDeObjtAjenosManipulacion, $NotaManipulaciones13CumplimientoProcedimientos, $NotaManipulaciones14AusenciaContaminacionCruzada, $NotaManipulaciones15LavadoDeManosFrecuente,



$NotaManipuladores1EstadoUniforme, $NotaManipuladores2UsoDeMascarillas, $NotaManipuladores3PresentacionPersonal, $NotaManipuladores4HabitosHigienicos,



$NotaControlesPuntoCriticosEnAlimentos1TemperaturaCoccion65cc, $NotaControlesPuntoCriticosEnAlimentos2TempCalentMayor75cc, $NotaControlesPuntoCriticosEnAlimentos3TempRefrigeracion0a5cc, $NotaControlesPuntoCriticosEnAlimentos4TempCongelacionMenos18cc,$NotaControlesPuntoCriticosEnAlimentos5ExibiAlimentFormCorrecta,






$NotaRecepcionYAlmacenamiento1ControlParametrosRecepcion, $NotaRecepcionYAlmacenamiento2MateriasPrimasRotuladas, $NotaRecepcionYAlmacenamiento3AlmEnAlturaYordenado, $NotaRecepcionYAlmacenamiento4AlmFueraEmvacesSecun, $NotaRecepcionYAlmacenamiento5CumplimientoDeFEFO, $NotaRecepcionYAlmacenamiento6MatAlejadasQuimicos,





$NotaDocumentacion1LibroDeInspeccion, $NotaDocumentacion2GPMmanualReg6meses, $NotaDocumentacion3GPMcompleto, $NotaDocumentacion4CertificacionDeFumigacion, $NotaDocumentacion5CertificadoRetiroAceite, $NotaDocumentacion6ControlDeAceite, $NotaDocumentacion7AuditoriaAnteriores, $NotaDocumentacion8CarpetaOrdenadaYactualizada);

foreach ($listaNotas as $valor) {

        $suma += $valor;

        if($valor > 0){
            // Obtener longitud
           $count++;
        }  
}
// Dividir, y listo
$promedio = $suma / $count;


$listaNotasInstalaciones = array($NotaInstalaciones1EstadoPisos, $NotaInstalaciones2EstadoMuros, $NotaInstalaciones3EstadoCielos, $NotaInstalaciones4EstadoPuertas, $NotaInstalaciones5EstadoIluminacion, $NotaInstalaciones6EstadoSistemaInyeccion, $NotaInstalaciones7TemperaturaAmbiente22cc, $NotaInstalaciones8EstadoLavaFondos, 
$NotaInstalaciones9EstadoCamaras, $NotaInstalaciones10EstadoBasureros, $NotaInstalaciones11BasurerosLimpios, $NotaInstalaciones12AusenciaPlagas, $NotaInstalaciones13ExisteJavonLavamanos, $NotaInstalaciones14EstadoBanios, $NotaInstalaciones15AguaCalienteDisponible, $NotaInstalaciones16VestidoresLimpios, $NotaInstalaciones17AusenciaDePlagas,
$NotaInstalaciones18EstadoMesones, $NotaInstalaciones19ExistenciaUntensillos, $NotaInstalaciones20EstadoUntensillos, $NotaInstalaciones21EquiposDeRefrigeracion5C, $NotaInstalaciones22EstadoEquiposDeFrio, $NotaInstalaciones23EquiposDeCalor65C, $NotaInstalaciones24EstadoEquiposDeCalor);

foreach ($listaNotasInstalaciones as $valorInstalaciones) {

        $sumaInstalaciones += $valorInstalaciones;

        if($valorInstalaciones > 0){
            // Obtener longitud
           $countInstalaciones++;
        }  
}
// Dividir, y listo
$promedioInstalaciones = $sumaInstalaciones / $countInstalaciones;



$listaNotasManipulaciones = array($NotaManipulaciones1SanitizacionDeFrutas, $NotaManipulaciones2SanitizacionDeUntensillos, $NotaManipulaciones3AlimentosProtegidosYrotulados, $NotaManipulaciones4AlimentosCocidosAlmacenados, $NotaManipulaciones5OrdenAlTrabajar, $NotaManipulaciones6UsoProductosAutorizados, $NotaManipulaciones7AusenciaDeAlimentosSobrantes, $NotaManipulaciones8AusenciaDeProductosVencidos, $NotaManipulaciones9ExistenciaYusoCorrectoDetergente,
$NotaManipulaciones10EstadoDilutores, $NotaManipulaciones11ExisteArtDeAseoYseguridad, $NotaManipulaciones12AusenciaDeObjtAjenosManipulacion, $NotaManipulaciones13CumplimientoProcedimientos, $NotaManipulaciones14AusenciaContaminacionCruzada, $NotaManipulaciones15LavadoDeManosFrecuente);

foreach ($listaNotasManipulaciones as $valorManipulaciones) {

        $sumaManipulaciones += $valorManipulaciones;

        if($valorManipulaciones > 0){
            // Obtener longitud
           $countManipulaciones++;
        }  
}
// Dividir, y listo
$promedioManipulaciones = $sumaManipulaciones / $countManipulaciones;


$listaNotasManipuladores = array($NotaManipuladores1EstadoUniforme, $NotaManipuladores2UsoDeMascarillas, $NotaManipuladores3PresentacionPersonal, $NotaManipuladores4HabitosHigienicos);

foreach ($listaNotasManipuladores as $valorManipuladores) {

        $sumaManipuladores += $valorManipuladores;

        if($valorManipuladores > 0){
            // Obtener longitud
           $countManipuladores++;
        }  
}
// Dividir, y listo
$promedioManipuladores = $sumaManipuladores / $countManipuladores;




//------------------------
$listaControlesPuntoCriticosEnAlimentos = array($NotaControlesPuntoCriticosEnAlimentos1TemperaturaCoccion65cc, $NotaControlesPuntoCriticosEnAlimentos2TempCalentMayor75cc, $NotaControlesPuntoCriticosEnAlimentos3TempRefrigeracion0a5cc, $NotaControlesPuntoCriticosEnAlimentos4TempCongelacionMenos18cc, $NotaControlesPuntoCriticosEnAlimentos5ExibiAlimentFormCorrecta);

foreach ($listaControlesPuntoCriticosEnAlimentos as $valorControlesPuntoCriticosEnAlimentos) {

        $sumaControlesPuntoCriticosEnAlimentos += $valorControlesPuntoCriticosEnAlimentos;

        if($valorControlesPuntoCriticosEnAlimentos > 0){
            // Obtener longitud
           $countControlesPuntoCriticosEnAlimentos++;
        }  
}
// Dividir, y listo
$promedioControlesPuntoCriticosEnAlimentos = $sumaControlesPuntoCriticosEnAlimentos / $countControlesPuntoCriticosEnAlimentos;





//------------NotaRecepcionYAlmacenamiento------------
$listaRecepcionYAlmacenamiento = array($NotaRecepcionYAlmacenamiento1ControlParametrosRecepcion, $NotaRecepcionYAlmacenamiento2MateriasPrimasRotuladas, $NotaRecepcionYAlmacenamiento3AlmEnAlturaYordenado, $NotaRecepcionYAlmacenamiento4AlmFueraEmvacesSecun, $NotaRecepcionYAlmacenamiento5CumplimientoDeFEFO, $NotaRecepcionYAlmacenamiento6MatAlejadasQuimicos);

foreach ($listaRecepcionYAlmacenamiento as $valorRecepcionYAlmacenamiento) {

        $sumaRecepcionYAlmacenamiento += $valorRecepcionYAlmacenamiento;

        if($valorRecepcionYAlmacenamiento > 0){
            // Obtener longitud
           $countRecepcionYAlmacenamiento++;
        }  
}
// Dividir, y listo
$promedioRecepcionYAlmacenamiento = $sumaRecepcionYAlmacenamiento / $countRecepcionYAlmacenamiento;




//------------------------
$listaDocumentacion = array($NotaDocumentacion1LibroDeInspeccion, $NotaDocumentacion2GPMmanualReg6meses, $NotaDocumentacion3GPMcompleto, $NotaDocumentacion4CertificacionDeFumigacion, $NotaDocumentacion5CertificadoRetiroAceite, $NotaDocumentacion6ControlDeAceite, $NotaDocumentacion7AuditoriaAnteriores, $NotaDocumentacion8CarpetaOrdenadaYactualizada);

foreach ($listaDocumentacion as $valorDocumentacion) {

        $sumaDocumentacion += $valorDocumentacion;

        if($valorDocumentacion > 0){
            // Obtener longitud
           $countDocumentacion++;
        }  
}
// Dividir, y listo
$promedioDocumentacion = $sumaDocumentacion/ $countDocumentacion;


// Cuarta parte Pormediar las Notas
/*

// Prueba de que si suma si le quitamos el count y la division en el array
foreach ($listaNotas as $valor) {

        $suma += $valor;
}

// Dividir, y listo
$promedio = $suma;

    $NotaPromedioTotalInforme = (($NotaInstalaciones1 + 
    $NotaInstalaciones2 + 
    $NotaInstalaciones3 + 
    $NotaInstalaciones4 +
    $NotaInstalaciones5 +
    $NotaInstalaciones6 +
    $NotaInstalaciones7 +
    $NotaInstalaciones8 +
    $NotaInstalaciones9 +
    $NotaInstalaciones10 +
    $NotaInstalaciones11 +
    $NotaInstalaciones12 +
    $NotaInstalaciones13 +
    $NotaInstalaciones14 +
    $NotaInstalaciones15 +
    $NotaInstalaciones16 +
    $NotaInstalaciones17 +
    $NotaInstalaciones18 +
    $NotaInstalaciones19 +
    $NotaInstalaciones20 +
    $NotaInstalaciones21 +
    $NotaInstalaciones22 +
    $NotaInstalaciones23 +
    $NotaInstalaciones24 +

    $NotaManipulaciones1 +
    $NotaManipulaciones2 +
    $NotaManipulaciones3 +
    $NotaManipulaciones4 +
    $NotaManipulaciones5 +
    $NotaManipulaciones6 +
    $NotaManipulaciones7 +
    $NotaManipulaciones8 +
    $NotaManipulaciones9 +
    $NotaManipulaciones10 +
    $NotaManipulaciones11 +
    $NotaManipulaciones12 +
    $NotaManipulaciones13 +
    $NotaManipulaciones14 +
    $NotaManipulaciones15 +

    $NotaManipuladores1 +
    $NotaManipuladores2 +
    $NotaManipuladores3 +
    $NotaManipuladores4 +

    $NotaControlesPuntoCriticosEnAlimentos1 +
    $NotaControlesPuntoCriticosEnAlimentos2 +
    $NotaControlesPuntoCriticosEnAlimentos3 +
    $NotaControlesPuntoCriticosEnAlimentos4 +
    $NotaControlesPuntoCriticosEnAlimentos5 +

    $NotaRecepcionYAlmacenamiento1 +
    $NotaRecepcionYAlmacenamiento2 +
    $NotaRecepcionYAlmacenamiento3 +
    $NotaRecepcionYAlmacenamiento4 +
    $NotaRecepcionYAlmacenamiento5 +
    $NotaRecepcionYAlmacenamiento6 +

    $NotaDocumentacion1 +
    $NotaDocumentacion2 +
    $NotaDocumentacion3 +
    $NotaDocumentacion4 +
    $NotaDocumentacion5 +
    $NotaDocumentacion6 +
    $NotaDocumentacion7 +
    $NotaDocumentacion8
)/62);
*/

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO formulario (HoraDeInicio,
   Fecha,
   idlocales,
   NotaInstalaciones1EstadoPisos,
   NotaInstalaciones2EstadoMuros, 
   NotaInstalaciones3EstadoCielos, 
   NotaInstalaciones4EstadoPuertas, 
   NotaInstalaciones5EstadoIluminacion, 
   NotaInstalaciones6EstadoSistemaInyeccion, 
   NotaInstalaciones7TemperaturaAmbiente22cc, 
   NotaInstalaciones8EstadoLavaFondos,
   NotaInstalaciones9EstadoCamaras, 
   NotaInstalaciones10EstadoBasureros, 
   NotaInstalaciones11BasurerosLimpios, 
   NotaInstalaciones12AusenciaPlagas, 
   NotaInstalaciones13ExisteJavonLavamanos, 
   NotaInstalaciones14EstadoBanios, 
   NotaInstalaciones15AguaCalienteDisponible, 
   NotaInstalaciones16VestidoresLimpios, 
   NotaInstalaciones17AusenciaDePlagas, 
   NotaInstalaciones18EstadoMesones,
   NotaInstalaciones19ExistenciaUntensillos,
   NotaInstalaciones20EstadoUntensillos, 
   NotaInstalaciones21EquiposDeRefrigeracion5C, 
   NotaInstalaciones22EstadoEquiposDeFrio, 
   NotaInstalaciones23EquiposDeCalor65C, 
   NotaInstalaciones24EstadoEquiposDeCalor,
   promedioInstalaciones,


   NotaManipulaciones1SanitizacionDeFrutas,
   NotaManipulaciones2SanitizacionDeUntensillos,
   NotaManipulaciones3AlimentosProtegidosYrotulados,
   NotaManipulaciones4AlimentosCocidosAlmacenados,
   NotaManipulaciones5OrdenAlTrabajar,
   NotaManipulaciones6UsoProductosAutorizados,
   NotaManipulaciones7AusenciaDeAlimentosSobrantes,
   NotaManipulaciones8AusenciaDeProductosVencidos,
   NotaManipulaciones9ExistenciaYusoCorrectoDetergente,
   NotaManipulaciones10EstadoDilutores,
   NotaManipulaciones11ExisteArtDeAseoYseguridad,
   NotaManipulaciones12AusenciaDeObjtAjenosManipulacion,
   NotaManipulaciones13CumplimientoProcedimientos,
   NotaManipulaciones14AusenciaContaminacionCruzada,
   NotaManipulaciones15LavadoDeManosFrecuente,
   promedioManipulaciones,



   NotaManipuladores1EstadoUniforme,
   NotaManipuladores2UsoDeMascarillas,
   NotaManipuladores3PresentacionPersonal,
   NotaManipuladores4HabitosHigienicos,
   promedioManipuladores,


   NotaControlesPuntoCriticosEnAlimentos1TemperaturaCoccion65cc,
   NotaControlesPuntoCriticosEnAlimentos2TempCalentMayor75cc,
   NotaControlesPuntoCriticosEnAlimentos3TempRefrigeracion0a5cc,
   NotaControlesPuntoCriticosEnAlimentos4TempCongelacionMenos18cc,
   NotaControlesPuntoCriticosEnAlimentos5ExibiAlimentFormCorrecta,
   promedioControlesPuntoCriticosEnAlimentos,



   NotaRecepcionYAlmacenamiento1ControlParametrosRecepcion,
   NotaRecepcionYAlmacenamiento2MateriasPrimasRotuladas,
   NotaRecepcionYAlmacenamiento3AlmEnAlturaYordenado,
   NotaRecepcionYAlmacenamiento4AlmFueraEmvacesSecun,
   NotaRecepcionYAlmacenamiento5CumplimientoDeFEFO,
   NotaRecepcionYAlmacenamiento6MatAlejadasQuimicos,
   promedioRecepcionYAlmacenamiento,



   NotaDocumentacion1LibroDeInspeccion,
   NotaDocumentacion2GPMmanualReg6meses,
   NotaDocumentacion3GPMcompleto,
   NotaDocumentacion4CertificacionDeFumigacion,
   NotaDocumentacion5CertificadoRetiroAceite,
   NotaDocumentacion6ControlDeAceite,
   NotaDocumentacion7AuditoriaAnteriores,
   NotaDocumentacion8CarpetaOrdenadaYactualizada,
   promedioDocumentacion,
   promedio,

   Foto1,
   DescripcionFoto1,

   Foto2,
   DescripcionFoto2,

   Foto3,
   DescripcionFoto3,

   Foto4,
   DescripcionFoto4,

   Foto5,
   DescripcionFoto5,


   HoraDeTermino, 
   ObservacionGeneral)

VALUES ('".$HoraDeInicio."', 
'".$Fecha."', 
'".$idlocales."',

'".$NotaInstalaciones1EstadoPisos."',
'".$NotaInstalaciones2EstadoMuros."',
'".$NotaInstalaciones3EstadoCielos."',
'".$NotaInstalaciones4EstadoPuertas."',
'".$NotaInstalaciones5EstadoIluminacion."',
'".$NotaInstalaciones6EstadoSistemaInyeccion."',
'".$NotaInstalaciones7TemperaturaAmbiente22cc."',
'".$NotaInstalaciones8EstadoLavaFondos."',
'".$NotaInstalaciones9EstadoCamaras."',
'".$NotaInstalaciones10EstadoBasureros."',
'".$NotaInstalaciones11BasurerosLimpios."',
'".$NotaInstalaciones12AusenciaPlagas."',
'".$NotaInstalaciones13ExisteJavonLavamanos."',
'".$NotaInstalaciones14EstadoBanios."',
'".$NotaInstalaciones15AguaCalienteDisponible."',
'".$NotaInstalaciones16VestidoresLimpios."',
'".$NotaInstalaciones17AusenciaDePlagas."',
'".$NotaInstalaciones18EstadoMesones."',
'".$NotaInstalaciones19ExistenciaUntensillos."',
'".$NotaInstalaciones20EstadoUntensillos."',
'".$NotaInstalaciones21EquiposDeRefrigeracion5C."',
'".$NotaInstalaciones22EstadoEquiposDeFrio."',
'".$NotaInstalaciones23EquiposDeCalor65C."',
'".$NotaInstalaciones24EstadoEquiposDeCalor."',
'".$promedioInstalaciones."',


'".$NotaManipulaciones1SanitizacionDeFrutas."',
'".$NotaManipulaciones2SanitizacionDeUntensillos."',
'".$NotaManipulaciones3AlimentosProtegidosYrotulados."',
'".$NotaManipulaciones4AlimentosCocidosAlmacenados."',
'".$NotaManipulaciones5OrdenAlTrabajar."',
'".$NotaManipulaciones6UsoProductosAutorizados."',
'".$NotaManipulaciones7AusenciaDeAlimentosSobrantes."',
'".$NotaManipulaciones8AusenciaDeProductosVencidos."',
'".$NotaManipulaciones9ExistenciaYusoCorrectoDetergente."',
'".$NotaManipulaciones10EstadoDilutores."',
'".$NotaManipulaciones11ExisteArtDeAseoYseguridad."',
'".$NotaManipulaciones12AusenciaDeObjtAjenosManipulacion."',
'".$NotaManipulaciones13CumplimientoProcedimientos."',
'".$NotaManipulaciones14AusenciaContaminacionCruzada."',
'".$NotaManipulaciones15LavadoDeManosFrecuente."',
'".$promedioManipulaciones."',


'".$NotaManipuladores1EstadoUniforme."',
'".$NotaManipuladores2UsoDeMascarillas."',
'".$NotaManipuladores3PresentacionPersonal."',
'".$NotaManipuladores4HabitosHigienicos."',
'".$promedioManipuladores."',


'".$NotaControlesPuntoCriticosEnAlimentos1TemperaturaCoccion65cc."',
'".$NotaControlesPuntoCriticosEnAlimentos2TempCalentMayor75cc."',
'".$NotaControlesPuntoCriticosEnAlimentos3TempRefrigeracion0a5cc."',
'".$NotaControlesPuntoCriticosEnAlimentos4TempCongelacionMenos18cc."',
'".$NotaControlesPuntoCriticosEnAlimentos5ExibiAlimentFormCorrecta."',
'".$promedioControlesPuntoCriticosEnAlimentos."',



'".$NotaRecepcionYAlmacenamiento1ControlParametrosRecepcion."',
'".$NotaRecepcionYAlmacenamiento2MateriasPrimasRotuladas."',
'".$NotaRecepcionYAlmacenamiento3AlmEnAlturaYordenado."',
'".$NotaRecepcionYAlmacenamiento4AlmFueraEmvacesSecun."',
'".$NotaRecepcionYAlmacenamiento5CumplimientoDeFEFO."',
'".$NotaRecepcionYAlmacenamiento6MatAlejadasQuimicos."',
'".$promedioRecepcionYAlmacenamiento."',


'".$NotaDocumentacion1LibroDeInspeccion."',
'".$NotaDocumentacion2GPMmanualReg6meses."',
'".$NotaDocumentacion3GPMcompleto."',
'".$NotaDocumentacion4CertificacionDeFumigacion."',
'".$NotaDocumentacion5CertificadoRetiroAceite."',
'".$NotaDocumentacion6ControlDeAceite."',
'".$NotaDocumentacion7AuditoriaAnteriores."',
'".$NotaDocumentacion8CarpetaOrdenadaYactualizada."',
'".$promedioDocumentacion."',
'".$promedio."',


'".$Foto1."', 
'".$DescripcionFoto1."',
'".$Foto2."', 
'".$DescripcionFoto2."',
'".$Foto3."', 
'".$DescripcionFoto3."',
'".$Foto4."', 
'".$DescripcionFoto4."',
'".$Foto5."', 
'".$DescripcionFoto5."',


 '".$HoraDeTermino."', 
 '".$ObservacionGeneral."')";


if ($conn->query($sql) === TRUE) {

    echo '<script language="javascript">alert("Documento Registrado");window.location.href="GenerarFormulario.php"</script>';

} else {

    //Realizar que al momento de que salga error que no muestre los errores como tal si no que no se han ingresado los campos 
    echo '<script language="javascript">alert("Error, Debe Seleccionar un local");window.location.href="GenerarFormulario.php"</script>';
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}

// Insertar tabla En Evaluaciones

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql1 = "INSERT INTO evaluaciones (idlocales,
    Fecha,
    NotaInstalaciones1EstadoPisos,
    NotaInstalaciones2EstadoMuros, 
    NotaInstalaciones3EstadoCielos, 
    NotaInstalaciones4EstadoPuertas, 
    NotaInstalaciones5EstadoIluminacion, 
    NotaInstalaciones6EstadoSistemaInyeccion, 
    NotaInstalaciones7TemperaturaAmbiente22cc, 
    NotaInstalaciones8EstadoLavaFondos,
    NotaInstalaciones9EstadoCamaras, 
    NotaInstalaciones10EstadoBasureros, 
    NotaInstalaciones11BasurerosLimpios, 
    NotaInstalaciones12AusenciaPlagas, 
    NotaInstalaciones13ExisteJavonLavamanos, 
    NotaInstalaciones14EstadoBanios, 
    NotaInstalaciones15AguaCalienteDisponible, 
    NotaInstalaciones16VestidoresLimpios, 
    NotaInstalaciones17AusenciaDePlagas, 
    NotaInstalaciones18EstadoMesones,
    NotaInstalaciones19ExistenciaUntensillos,
    NotaInstalaciones20EstadoUntensillos, 
    NotaInstalaciones21EquiposDeRefrigeracion5C, 
    NotaInstalaciones22EstadoEquiposDeFrio, 
    NotaInstalaciones23EquiposDeCalor65C, 
    NotaInstalaciones24EstadoEquiposDeCalor,
   promedioInstalaciones,


   NotaManipulaciones1SanitizacionDeFrutas,
   NotaManipulaciones2SanitizacionDeUntensillos,
   NotaManipulaciones3AlimentosProtegidosYrotulados,
   NotaManipulaciones4AlimentosCocidosAlmacenados,
   NotaManipulaciones5OrdenAlTrabajar,
   NotaManipulaciones6UsoProductosAutorizados,
   NotaManipulaciones7AusenciaDeAlimentosSobrantes,
   NotaManipulaciones8AusenciaDeProductosVencidos,
   NotaManipulaciones9ExistenciaYusoCorrectoDetergente,
   NotaManipulaciones10EstadoDilutores,
   NotaManipulaciones11ExisteArtDeAseoYseguridad,
   NotaManipulaciones12AusenciaDeObjtAjenosManipulacion,
   NotaManipulaciones13CumplimientoProcedimientos,
   NotaManipulaciones14AusenciaContaminacionCruzada,
   NotaManipulaciones15LavadoDeManosFrecuente,
   promedioManipulaciones,



   NotaManipuladores1EstadoUniforme,
   NotaManipuladores2UsoDeMascarillas,
   NotaManipuladores3PresentacionPersonal,
   NotaManipuladores4HabitosHigienicos,
   promedioManipuladores,


   NotaControlesPuntoCriticosEnAlimentos1TemperaturaCoccion65cc,
   NotaControlesPuntoCriticosEnAlimentos2TempCalentMayor75cc,
   NotaControlesPuntoCriticosEnAlimentos3TempRefrigeracion0a5cc,
   NotaControlesPuntoCriticosEnAlimentos4TempCongelacionMenos18cc,
   NotaControlesPuntoCriticosEnAlimentos5ExibiAlimentFormCorrecta,
   promedioControlesPuntoCriticosEnAlimentos,



   NotaRecepcionYAlmacenamiento1ControlParametrosRecepcion,
   NotaRecepcionYAlmacenamiento2MateriasPrimasRotuladas,
   NotaRecepcionYAlmacenamiento3AlmEnAlturaYordenado,
   NotaRecepcionYAlmacenamiento4AlmFueraEmvacesSecun,
   NotaRecepcionYAlmacenamiento5CumplimientoDeFEFO,
   NotaRecepcionYAlmacenamiento6MatAlejadasQuimicos,
   promedioRecepcionYAlmacenamiento,



   NotaDocumentacion1LibroDeInspeccion,
   NotaDocumentacion2GPMmanualReg6meses,
   NotaDocumentacion3GPMcompleto,
   NotaDocumentacion4CertificacionDeFumigacion,
   NotaDocumentacion5CertificadoRetiroAceite,
   NotaDocumentacion6ControlDeAceite,
   NotaDocumentacion7AuditoriaAnteriores,
   NotaDocumentacion8CarpetaOrdenadaYactualizada,
   promedioDocumentacion,
   promedio)

VALUES (
'".$idlocales."',
'".$Fecha."',

'".$NotaInstalaciones1EstadoPisos."',
'".$NotaInstalaciones2EstadoMuros."',
'".$NotaInstalaciones3EstadoCielos."',
'".$NotaInstalaciones4EstadoPuertas."',
'".$NotaInstalaciones5EstadoIluminacion."',
'".$NotaInstalaciones6EstadoSistemaInyeccion."',
'".$NotaInstalaciones7TemperaturaAmbiente22cc."',
'".$NotaInstalaciones8EstadoLavaFondos."',
'".$NotaInstalaciones9EstadoCamaras."',
'".$NotaInstalaciones10EstadoBasureros."',
'".$NotaInstalaciones11BasurerosLimpios."',
'".$NotaInstalaciones12AusenciaPlagas."',
'".$NotaInstalaciones13ExisteJavonLavamanos."',
'".$NotaInstalaciones14EstadoBanios."',
'".$NotaInstalaciones15AguaCalienteDisponible."',
'".$NotaInstalaciones16VestidoresLimpios."',
'".$NotaInstalaciones17AusenciaDePlagas."',
'".$NotaInstalaciones18EstadoMesones."',
'".$NotaInstalaciones19ExistenciaUntensillos."',
'".$NotaInstalaciones20EstadoUntensillos."',
'".$NotaInstalaciones21EquiposDeRefrigeracion5C."',
'".$NotaInstalaciones22EstadoEquiposDeFrio."',
'".$NotaInstalaciones23EquiposDeCalor65C."',
'".$NotaInstalaciones24EstadoEquiposDeCalor."',
'".$promedioInstalaciones."',


'".$NotaManipulaciones1SanitizacionDeFrutas."',
'".$NotaManipulaciones2SanitizacionDeUntensillos."',
'".$NotaManipulaciones3AlimentosProtegidosYrotulados."',
'".$NotaManipulaciones4AlimentosCocidosAlmacenados."',
'".$NotaManipulaciones5OrdenAlTrabajar."',
'".$NotaManipulaciones6UsoProductosAutorizados."',
'".$NotaManipulaciones7AusenciaDeAlimentosSobrantes."',
'".$NotaManipulaciones8AusenciaDeProductosVencidos."',
'".$NotaManipulaciones9ExistenciaYusoCorrectoDetergente."',
'".$NotaManipulaciones10EstadoDilutores."',
'".$NotaManipulaciones11ExisteArtDeAseoYseguridad."',
'".$NotaManipulaciones12AusenciaDeObjtAjenosManipulacion."',
'".$NotaManipulaciones13CumplimientoProcedimientos."',
'".$NotaManipulaciones14AusenciaContaminacionCruzada."',
'".$NotaManipulaciones15LavadoDeManosFrecuente."',
'".$promedioManipulaciones."',


'".$NotaManipuladores1EstadoUniforme."',
'".$NotaManipuladores2UsoDeMascarillas."',
'".$NotaManipuladores3PresentacionPersonal."',
'".$NotaManipuladores4HabitosHigienicos."',
'".$promedioManipuladores."',


'".$NotaControlesPuntoCriticosEnAlimentos1TemperaturaCoccion65cc."',
'".$NotaControlesPuntoCriticosEnAlimentos2TempCalentMayor75cc."',
'".$NotaControlesPuntoCriticosEnAlimentos3TempRefrigeracion0a5cc."',
'".$NotaControlesPuntoCriticosEnAlimentos4TempCongelacionMenos18cc."',
'".$NotaControlesPuntoCriticosEnAlimentos5ExibiAlimentFormCorrecta."',
'".$promedioControlesPuntoCriticosEnAlimentos."',



'".$NotaRecepcionYAlmacenamiento1ControlParametrosRecepcion."',
'".$NotaRecepcionYAlmacenamiento2MateriasPrimasRotuladas."',
'".$NotaRecepcionYAlmacenamiento3AlmEnAlturaYordenado."',
'".$NotaRecepcionYAlmacenamiento4AlmFueraEmvacesSecun."',
'".$NotaRecepcionYAlmacenamiento5CumplimientoDeFEFO."',
'".$NotaRecepcionYAlmacenamiento6MatAlejadasQuimicos."',
'".$promedioRecepcionYAlmacenamiento."',


'".$NotaDocumentacion1LibroDeInspeccion."',
'".$NotaDocumentacion2GPMmanualReg6meses."',
'".$NotaDocumentacion3GPMcompleto."',
'".$NotaDocumentacion4CertificacionDeFumigacion."',
'".$NotaDocumentacion5CertificadoRetiroAceite."',
'".$NotaDocumentacion6ControlDeAceite."',
'".$NotaDocumentacion7AuditoriaAnteriores."',
'".$NotaDocumentacion8CarpetaOrdenadaYactualizada."',
'".$promedioDocumentacion."',
'".$promedio."')";



if ($conn->query($sql1) === TRUE) {
    echo '<script language="javascript">alert("Documento Registrado");window.location.href="GenerarFormulario.php"</script>';

} else {
    echo '<script language="javascript">alert("Error, Debe Seleccionar un local");window.location.href="GenerarFormulario.php"</script>';
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}

$conn->close();

/*
RECICLAGE DE CODIGO POR SI SE MODIFICA EL REAL.


Funcion de array en notas para la sumatoria y divicion de los numeros.


$listaNotas = array($NotaInstalaciones1, $NotaInstalaciones2, $NotaInstalaciones3, $NotaInstalaciones4, $NotaInstalaciones5, $NotaInstalaciones6, $NotaInstalaciones7, $NotaInstalaciones8, 
$NotaInstalaciones9, $NotaInstalaciones10, $NotaInstalaciones11, $NotaInstalaciones12, $NotaInstalaciones13, $NotaInstalaciones14, $NotaInstalaciones15, $NotaInstalaciones16, $notaInstalaciones17,
$NotaInstalaciones18, $NotaInstalaciones19, $NotaInstalaciones20, $NotaInstalaciones21, $NotaInstalaciones22, $NotaInstalaciones23, $NotaInstalaciones24,
$NotaManipulaciones1, $NotaManipulaciones2, $NotaManipulaciones3, $NotaManipulaciones4, $NotaManipulaciones5, $NotaManipulaciones6, $NotaManipulaciones7, $NotaManipulaciones8, $NotaManipulaciones9,
$NotaManipulaciones10, $NotaManipulaciones11, $NotaManipulaciones12, $NotaManipulaciones13, $NotaManipulaciones14, $NotaManipulaciones15,
$NotaManipuladores1, $NotaManipuladores2, $NotaManipuladores3, $NotaManipuladores4,
$NotaControlesPuntoCriticosEnAlimentos1, $NotaControlesPuntoCriticosEnAlimentos2, $NotaControlesPuntoCriticosEnAlimentos3, $NotaControlesPuntoCriticosEnAlimentos4,
$NotaRecepcionYAlmacenamiento1, $NotaRecepcionYAlmacenamiento2, $NotaRecepcionYAlmacenamiento3, $NotaRecepcionYAlmacenamiento4, $NotaRecepcionYAlmacenamiento5, $NotaRecepcionYAlmacenamiento6,
$NotaDocumentacion1, $NotaDocumentacion2, $NotaDocumentacion3, $NotaDocumentacion4, $NotaDocumentacion5, $NotaDocumentacion6, $NotaDocumentacion7, $NotaDocumentacion8);
*/




?>