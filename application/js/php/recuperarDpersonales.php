<?php

include 'conexion.php';

$rut=$_POST['rut'];

$sql="SELECT * FROM dpersonales_remuneracion WHERE empleado = '".$rut."'";
$res=pg_query($sql);
	if(pg_num_rows($res)==0){
		$registro = 'No existe';
		echo json_encode($registro);
	}else{

	while($fila=pg_fetch_array($res)){
			$registro = array(
				'direccion' => $fila['direccion'],
				'comuna' => $fila['comuna'],
				'telefono' => $fila['telefono'],
				'celular' => $fila['celular'],
				'ciudad' => $fila['ciudad'],
				'email' => $fila['email'],
				'banco' => $fila['banco'],
				'cuenta' => $fila['cuenta'],
				'ncuenta' => $fila['ncuenta'],
				'pagar' => $fila['pagar']
            );
	}

 echo json_encode($registro);          
}
?>