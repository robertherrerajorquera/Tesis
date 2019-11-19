<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$bd = "bdproyectoapa";

	try {
	    $conn = new PDO("mysql:host=$servername;dbname=$bd", $username, $password);

	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "Connected successfully"; 
	}
	catch(PDOException $e){
	    echo "Connection failed: " . $e->getMessage();
	}
	finally{
		$conn = null;
	}

?>