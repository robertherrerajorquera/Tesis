<?php
	include_once("usuario.php");
	include_once("inicio.html");

	$correo = $_POST["correoelectrónico"];
	$contrasena = $_POST["Contraseña"];
	$nombredeusuario = $_POST["Nombredeusuario"];
	$nombre = $_POST["Nombrecompleto"];
	$perfil = false;



	$usuario = new Usuario();
	$usuario->setCorreo($correo);
	$usuario->setContrasena($contrasena);
	$usuario->setNombredeusuario($nombredeusuario);
	$usuario->setNombre($nombre);
	$usuario->setPerfil($perfil);
	$usuario->creaUsuario(); 

	session_start();
	$_SESSION["user"] = $usuario;

	header("Location: ../inicio.html");
?>