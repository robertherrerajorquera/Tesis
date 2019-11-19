<?php
	include_once('conexion.php');
	include_once('arraylist.php'); 


	// CLASE DE USUARIO, CONSTRUCTOR QUE SOLO CONTIENE CORREO, CONTRASEÑA Y PERFIL DEL USUARIO
	class Usuario
	{
		private $correo;
		private $contrasena;
		private $perfil;

		public function __construct()
		{

		}
		// PUBLIC CORREO
		public function setCorreo($correo)
		{
			$this->correo = $correo;
		}

		public function getCorreo()
		{
			return $this->correo;
		}


		// PUBLIC CONTRASEÑA
		public function setContrasena($contrasena)
		{
			$this->contrasena = $contrasena;
		}

		public function getContrasena()
		{
			return $this->contrasena; 
		}


		// PUBLIC PERFIL

		public function setPerfil($perfil)
		{
			$this->perfil = $perfil;
		}

		public function getPerfil()
		{
			return $this->perfil;
		}








		/*






		// PUBLIC FUNCION DE CREAR USUARIO 
		public function creaUsuario()
		{
			$this->conexion = Conexion::getInstance();
			$this->conexion->openConnection();
			$var = $this->conexion->useConnection();
			$consulta = "INSERT INTO usuario (correo, contrasena, nombredeusuario, nombre, perfil) VALUES".
			"('".$this->correo."','".$this->contrasena."','".$this->nombredeusuario."','".$this->nombre."','".$this->perfil."')";
			if($var->query($consulta))
			{
				$this->conexion->closeConnection();
				return true;
			}
			else
			{
				$this->conexion->closeConnection();
				return false;
			}
		}

		// PUBLIC FUNCION DE MODIFICAR USUARIO 
		public function modificaUsuario()
		{
			$this->conexion = Conexion::getInstance();
			$this->conexion->openConnection();
			$var = $this->conexion->useConnection();
			$consulta = "UPDATE usuario SET contrasena='".$this->contrasena."', nombredeusuario='".
			$this->nombredeusuario."', nombre='".$this->nombre."'WHERE correo='".$this->correo."'";
			if($var->query($consulta))
			{
				$this->conexion->closeConnection();
				return true;
			}
			else
			{
				$this->conexion->closeConnection();
				return false;
			}
		}
		// PUBLIC FUNCION DE ELIMINAR USUARIO 
		public function eliminaUsuario()
		{
			$this->conexion = Conexion::getInstance();
			$this->conexion->openConnection();
			$var = $this->conexion->useConnection();
			$consulta = "DELETE FROM usuario WHERE correo='".$this->correo."'";
			if($var->query($consulta))
			{
				$this->conexion->closeConnection();
				return true;
			}
			else
			{
				$this->conexion->closeConnection();
				return false;
			}
		}



		*/

		// PUBLIC FUNCION DE BUSCAR USUARIO 
		public function buscaUnUsuario()
		{
			$this->conexion = Conexion::getInstance();
			$this->conexion->openConnection();
			$var = $this->conexion->useConnection();
			$consulta = "SELECT * FROM usuario WHERE correo='".$this->correo."' AND contrasena='".$this->contrasena."'";
			$usuario = new Usuario();

			if($resultado = $var->query($consulta))
			{
				if(mysqli_num_rows($resultado)>0)
				{
					while ($fila = $resultado->fetch_array()) 
					{
						$usuario->setCorreo($fila["correo"]);
						$usuario->setContrasena($fila["contrasena"]);
						$usuario->setPerfil($fila["perfil"]);
					}
					$this->conexion->closeConnection();
					return $usuario;
				}
			}
		}

		public function buscaTodos()
		{
			$this->conexion = Conexion::getInstance();
			$this->conexion->openConnection();
			$var = $this->conexion->useConnection();
			$consulta = "SELECT * FROM usuarios";
			$lista  = new Arraylist();

			if($resultado = $var->query($consulta))
			{
				if(mysql_num_rows($resultado)>0)
				{
					while($fila = $resultado->fetch_array())
					{
						$usuario = new Usuario();
						$usuario->setCorreo($fila["correo"]);
						$usuario->setConstraseña($fila["contrasena"]);
						$lista->add($usuario); 
					}
				}
			}
			$this->conexion->closeConnection(); 
			return $lista; 
		}
	}
?>