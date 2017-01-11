<?php

include 'conexion.php';

$rut=$_POST['rut'];

$sql="SELECT * FROM emergencia_remuneracion WHERE empleado = '".$rut."'";
$res=pg_query($sql);
	if(pg_num_rows($res)==0){
		$registro = 'No existe';
		echo json_encode($registro);
	}else{

	while($fila=pg_fetch_array($res)){
			$registro = array(
				'nombre_emergencia' => $fila['nombre_emergencia'],
				'telefono_emergencia' => $fila['telefono_emergencia']
            );
	}

 echo json_encode($registro);          
}
?>