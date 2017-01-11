<?php

include 'conexion.php';

$rut=$_POST['rut'];

$sql="SELECT * FROM empleado_remuneracion INNER JOIN contrato_remuneracion ON empleado_remuneracion.rut = contrato_remuneracion.empleado WHERE rut = '".$rut."'";
$res=pg_query($sql);
	if(pg_num_rows($res)==0){
		$registro = 'No existe';
		echo json_encode($registro);
	}else{
$sql2="SELECT ruta FROM imagen_remuneracion WHERE empleado='".$rut."'";
$res2=pg_query($sql2);
	if(pg_num_rows($res2)!=0){
		while($fila2=pg_fetch_array($res2)){
			$ruta=$fila2['ruta'];
		}
		while($fila=pg_fetch_array($res)){
			$registro = array(
				'sr' => $fila['sr'],
				'apellido_paterno' => $fila['apellido_paterno'],
				'apellido_materno' => $fila['apellido_materno'],
				'nombres' => $fila['nombres'],
				'fecha_nacimiento' => $fila['fecha_nacimiento'],
				'edad' => $fila['edad'],
				'nacionalidad' => $fila['nacionalidad'],
				'estado_civil' => $fila['estado_civil'],
				'sexo' => $fila['sexo'],
				'fecha_contrato' => $fila['fecha_contrato'],
				'fecha_termino' => $fila['fecha_termino'],
				'tipo_contrato' => $fila['tipo_contrato'],
				'cargo' => $fila['cargo'],
				'observacion' => $fila['observacion'],
				'sindicalizado' => $fila['sindicalizado'],
				'fecha_sindicato' => $fila['fecha_sindicato'],
				'horario' => $fila['horario'],
				'sbase' => $fila['sbase'],
				'empresa' => $fila['empresa'],
				'ruta' => $ruta
            );
		}
				echo json_encode($registro);          
	}else{
		while($fila=pg_fetch_array($res)){
			$registro = array(
				'sr' => $fila['sr'],
				'apellido_paterno' => $fila['apellido_paterno'],
				'apellido_materno' => $fila['apellido_materno'],
				'nombres' => $fila['nombres'],
				'fecha_nacimiento' => $fila['fecha_nacimiento'],
				'edad' => $fila['edad'],
				'nacionalidad' => $fila['nacionalidad'],
				'estado_civil' => $fila['estado_civil'],
				'sexo' => $fila['sexo'],
				'fecha_contrato' => $fila['fecha_contrato'],
				'fecha_termino' => $fila['fecha_termino'],
				'tipo_contrato' => $fila['tipo_contrato'],
				'cargo' => $fila['cargo'],
				'observacion' => $fila['observacion'],
				'sindicalizado' => $fila['sindicalizado'],
				'horario' => $fila['horario'],
				'sbase' => $fila['sbase'],
				'fecha_sindicato' => $fila['fecha_sindicato'],
				'empresa' => $fila['empresa'],
				'ruta' => 'nada'
            );
		}
				echo json_encode($registro);
	} 
}
?>