<?php

include 'conexion.php';

$sql="SELECT * FROM rmi_remuneracion";
$res=pg_query($sql);
	
	while($fila=pg_fetch_array($res)){
			$registro = array(
				'rmi1' => $fila['rmi1']
            );
	}

 echo json_encode($registro);          
}
?>