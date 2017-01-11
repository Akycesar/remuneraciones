<?php

include 'conexion.php';

$rut=$_POST['rut'];

$sql="SELECT * FROM prevision_remuneracion WHERE empleado = '".$rut."'";
$res=pg_query($sql);
	if(pg_num_rows($res)==0){
		$registro = 'No existe';
		echo json_encode($registro);
	}else{

	while($fila=pg_fetch_array($res)){
			$registro = array(
				'salud' => $fila['salud'],
				'afp' => $fila['afp'],
				'opciones' => $fila['opciones'],
				'pension' => $fila['pension'],
				'cuota' => $fila['cuota'],
            );
	}

 echo json_encode($registro);          
}
?>