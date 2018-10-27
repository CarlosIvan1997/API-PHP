<?php 
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

require('Conexion2.php');

	
	if (isset($_GET['monedas']) && isset($_GET['id_usuario'])) {

		$conexion=mysqli_connect($host,$user,$pass,$dbname);
		
		$monedas=$_GET['monedas'];
		$id=$_GET['id_usuario'];

		$update="UPDATE usuario SET monedas = '{$monedas}' WHERE id_usuario = '{$id}'";

		$resultado_update=mysqli_query($conexion,$update);

		if($resultado_update){
			
			$json=true;
			mysqli_close($conexion);
			echo json_encode($json);

		}else{
			
			$json="FEIK";
			mysqli_close($conexion);
			echo json_encode($json);

		}
	}else{
		$json='No se pudo comunicar con el servidor';
		mysqli_close($conexion);
		echo json_encode($json);
	}
	

 ?>