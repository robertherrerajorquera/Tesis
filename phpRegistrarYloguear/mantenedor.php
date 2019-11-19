<?php
	include_once('usuario.php');
	session_start();
	if (isset($_SESSION["logiado"])) 
	{
		?>
		<html>
			<head></head>
			<body>
				<h1>Modificar mis datos</h1>
				<form action="modificar.php" method="post">
					Correo Electronico: <input type="text" name="txtCorreo"><br />
					Contraseña: <input type="text" name="txtContrasena"><br />
					Nombre de usuario: <input type="text" name="txtNombredeusuario"><br />
					Nombre completo:<input type="text" name="txtNombre"><br />
					<input type="submit" name="enviar" value="modificar">
				</form>
			</body>
		</html>
	<?php
}
	else
	{
		echo "Debe realizar el login primero<br />";
		echo "<a href='login.php'>logear</a>";
	}
?>