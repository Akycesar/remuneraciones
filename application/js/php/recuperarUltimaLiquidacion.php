<?php

include 'conexion.php';

$empleado=$_POST['empleado'];

$sql="SELECT * FROM liquidacion_remuneracion WHERE empleado = '".$empleado."' ORDER BY mes DESC LIMIT 1";
$res=pg_query($sql);
	if(pg_num_rows($res)==0){
		$registro = 'No existe';
		echo json_encode($registro);
	}else{

	while($fila=pg_fetch_array($res)){
			$registro = array(
				'sbase' => $fila['sbase'],
				'imsegces' => $fila['imsegces'],
				'imsis' => $fila['imsis'],
				'colacion' => $fila['colacion'],
				'dntrabajados' => $fila['dntrabajados'],
				'tipo_sueldo' => $fila['tipo_sueldo'],
				'gratificacion' => $fila['gratificacion'],
				'aguinaldo' => $fila['aguinaldo'],
				'comision' => $fila['comision'],
				'mret' => $fila['mret'],
				'movilizacion' => $fila['movilizacion'],
				'dxlic' => $fila['dxlic'],
				'dias_mensuales' => $fila['dias_mensuales'],
				'horas_semanales' => $fila['horas_semanales'],
				'dias_semanales' => $fila['dias_semanales'],
				'atrasos' => $fila['atrasos'],
				'h_ext5' => $fila['h_ext5'],
				'h_ext10' => $fila['h_ext10'],
				'monto' => $fila['monto'],
				'tramo' => $fila['tramo'],
				'fam' => $fila['fam'],
				'mat' => $fila['mat'],
				'inva' => $fila['inva'],
				'empleado' => $fila['empleado'],
				'mes' => $fila['mes'],
				'year' => $fila['year'],
				'empresa' => $fila['empresa']
            );
	}

 echo json_encode($registro);          
}
?>