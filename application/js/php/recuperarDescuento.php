<?php

include 'conexion.php';

$empleado = $_POST['empleado'];
$mes = $_POST['mes'];
$year = $_POST['year'];

$sql="SELECT * FROM descuento_remuneracion WHERE empleado = '".$empleado."' AND mes = '".$mes."' AND year = '".$year."'";
$res=pg_query($sql);
	if(pg_num_rows($res)==0){
		$registro = 'No existe';
		echo json_encode($registro);
	}else{

	while($fila=pg_fetch_array($res)){
			$registro = array(
				'descripcion' => $fila['descripcion'],
				'monto' => $fila['monto']
            );
	}

 echo json_encode($registro);          
}
?>