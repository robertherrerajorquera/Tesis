<?php
	include_once ("usuario.php");
	session_start();
	$usuario = $_SESSION["user"];

	echo "Correo Electronico: ".$usuario->getCorreo()."<br />";
	echo "Contraseña: ".$usuario->getContrasena()."<br />";
	echo "Nombre de usuario: ".$usuario->getNombredeusuario()."<br />";
	echo "Nombre: ".$usuario->getNombre()."<br />";
?>