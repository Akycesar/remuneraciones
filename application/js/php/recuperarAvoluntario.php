<?php

include 'conexion.php';

$rut=$_POST['rut'];

$sql="SELECT * FROM avoluntario_remuneracion WHERE empleado = '".$rut."'";
$res=pg_query($sql);
	if(pg_num_rows($res)==0){
		$registro = 'No existe';
		echo json_encode($registro);
	}else{

	while($fila=pg_fetch_array($res)){
			$registro = array(
				'rut_emp' => $fila['rut_emp'],
				'apepatern' => $fila['apepatern'],
				'apematern' => $fila['apematern'],
				'nom_emp' => $fila['nom_emp'],
				'checkvo' => $fila['checkvo']
            );
	}

 echo json_encode($registro);          
}
?>