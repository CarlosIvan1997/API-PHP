<?php
	class Conexion{
		private $host = "localhost";
		private $dbname = "u826817051_bd";
		private $user = "u826817051_alexz";
		private $password = "meCmgfPH0I4N";
		private $conexion = null;
		
		public function getConexion(){
			try{
				$this->conexion = new PDO(
									"mysql:host=$this->host; dbname=$this->dbname;charset=utf8",
									$this->user,
									$this->password
									);

			return $this->conexion;
			}catch(Exception $e){
				echo $e->getMessage();
			}finally{
				$this->conexion = null;
			}
		}
	}
?>