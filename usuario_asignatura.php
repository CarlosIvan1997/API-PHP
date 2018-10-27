<?php
	include 'Conexion.php';
	ini_set('mssql.charset', 'UTF-8');
	header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    
	$conexion = new Conexion();
	$cnn = $conexion->getConexion();
    
    if(isset($_GET["id_usuario"])){
        $sql = "select a.id_asignatura,a2.nombre,a.porcentaje,a2.imagen from usuario_asignatura as a inner join asignatura a2 on a.id_asignatura = a2.id_asignatura where a.id_usuario=?;";
        $id_usuario=$_GET["id_usuario"];
        $resultado=$cnn->prepare($sql);
        $resultado->execute(array($id_usuario));
        if($resultado){
            while( $result = $resultado->fetch(PDO::FETCH_ASSOC)){
                $data[] = $result;
            }
            echo json_encode($data,true);
        }else{
            echo "error";
        }
        
    }
?>