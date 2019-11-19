<?php
	include_once('usuario.php');
	
	$correo = $_POST["login"];
	$contrasena = $_POST["contrasena"];

	$usuario = new usuario();
	$usuario->setCorreo($correo);
	$usuario->setContrasena($contrasena);
	$user2 = $usuario->buscaUnUsuario();

	if($user2 != null)
	{
		if ($user2->getCorreo()==($correo) && $user2->getContrasena()==($contrasena))
		{
			if($user2->getPerfil()==0){
				if($user2->getContrasena()==$contrasena){
					session_start();
					$_SESSION["logiado"] = $user2; 
					header("location: ../perfilAuditor.php");
					echo "logiado";
				}else{
					echo '<script language="javascript">alert("Correro o contraseña no coincide");window.location.href="../logilnPrincipal.php"</script>';
				}
					
			}
			if($user2->getPerfil()==1){
				if($user2->getContrasena()==$contrasena){
					session_start();
					$_SESSION["logiado"] = $user2; 
					header("location: ../perfilAdministrador.php");
				}else{
					echo '<script language="javascript">alert("Correro o contraseña no coincide");window.location.href="../logilnPrincipal.php"</script>';
				}
			}
		}
		else
		{
			echo '<script language="javascript">alert("Error de autentificacion");window.location.href="../logilnPrincipal.php"</script>';
		}
	}
	else
	{
		echo '<script language="javascript">alert("Error de autentificacion");window.location.href="../logilnPrincipal.php"</script>';
		
	}
?>