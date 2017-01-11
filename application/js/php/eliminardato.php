<?php
include('conexion.php');
session_start();
$dato = $_POST['dato'];
$mes = $_POST['mes'];
$year = $_POST['year'];
$empleado = $_POST['empleado'];

if($dato == 'anticipo'){

pg_query("DELETE FROM anticipo_remuneracion WHERE empleado='$empleado' AND mes='$mes' AND year='$year'");

$registro = 'anticipo';
echo json_encode($registro);

}elseif($dato == 'prestamo'){

pg_query("DELETE FROM prestamo_remuneracion WHERE empleado='$empleado' AND mes='$mes' AND year='$year'");

$registro = 'prestamo';
echo json_encode($registro);

}elseif($dato == 'bono'){

pg_query("DELETE FROM bono_remuneracion WHERE empleado='$empleado' AND mes='$mes' AND year='$year'");

$registro = 'bono';
echo json_encode($registro);

}elseif($dato == 'descuento'){

pg_query("DELETE FROM descuento_remuneracion WHERE empleado='$empleado' AND mes='$mes' AND year='$year'");

$registro = 'descuento';
echo json_encode($registro);

}elseif($dato == 'cargas'){

pg_query("DELETE FROM cretroactivo_remuneracion WHERE empleado='$empleado' AND mes='$mes' AND year='$year'");

$registro = 'cargas';
echo json_encode($registro);
}
?>