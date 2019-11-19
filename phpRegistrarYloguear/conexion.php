<?php
	class Conexion
	{
		private static $instance;
		private $host = "arcadespersonalizados.cl";
		private $user = "car49017_root";
		private $pass = "car49017_root";
		private $bd = "car49017_bdproyectoapa";


		private function __construct()
		{

		}

		public static function getInstance()
		{
			if(!self::$instance instanceof self)
				{
					self::$instance = new self;
				}
				return self::$instance;
		}

		public function openConnection()
		{
			try
			{
				$this->conexion = mysqli_init();
				$this->conexion->real_connect($this->host, $this->user, $this->pass, $this->bd);
			}
			catch(Exception $e)
			{
				$this->conexion = NULL;
				return 0;
			}
		}
		public function useConnection()
		{
			if($this->conexion !=NULL)
				return $this->conexion;
			else
				return 0;
		}

		public function closeConnection()
		{
			$this->conexion->close();
		}
	}


?>