<?php

include 'conexion.php';

$rut=$_POST['rut'];

$sql="SELECT rut FROM  empleado_remuneracion WHERE rut = '".$rut."'";
$res=pg_query($sql);
	if(pg_num_rows($res)==0){
		$registro = 'No existe';
		echo json_encode($registro);
	}else{
		$registro='Existe';
 echo json_encode($registro);          
}
?>