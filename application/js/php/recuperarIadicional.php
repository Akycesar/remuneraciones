<?php

include 'conexion.php';

$rut=$_POST['rut'];

$sql="SELECT * FROM iadicional_remuneracion WHERE empleado = '".$rut."'";
$res=pg_query($sql);
	if(pg_num_rows($res)==0){
		$registro = 'No existe';
		echo json_encode($registro);
	}else{

	while($fila=pg_fetch_array($res)){
			$registro = array(
				'fprimeraco' => $fila['fprimeraco'],
				'aantco' => $fila['aantco'],
				'vacaus' => $fila['vacaus'],
				'check1' => $fila['check1'],
				'check2' => $fila['check2'],
				'check3' => $fila['check3']
            );
	}

 echo json_encode($registro);          
}
?>