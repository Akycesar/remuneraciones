<?php

include 'conexion.php';

$rut=$_POST['rut'];

$sql="SELECT * FROM referencia_remuneracion WHERE rut = '".$rut."'";
$res=pg_query($sql);
	if(pg_num_rows($res)==0){
		$registro = 'No existe';
		echo json_encode($registro);
	}else{

	while($fila=pg_fetch_array($res)){
			$registro = array(
				'empresa' => $fila['empresa'],
				'nombre' => $fila['nombre'],
				'fono' => $fila['fono'],
				'causal' => $fila['causal']
            );
	}

 echo json_encode($registro);          
}
?>