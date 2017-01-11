<?php
include('conexion.php');
session_start();
$descripcion = $_POST['descripcion'];
$monto = $_POST['monto'];
$estado = $_POST['estado'];
$empleado = $_POST['empleado'];
$mes = $_POST['mes'];
$year = $_POST['year'];

$comprobar = pg_num_rows(pg_query("SELECT * FROM cretroactivo_remuneracion WHERE empleado = '$empleado' AND mes = '$mes' AND year = '$year'"));

if($comprobar == 0){

pg_query("INSERT INTO cretroactivo_remuneracion (descripcion, monto, empleado, mes, year)VALUES('$descripcion', '$monto', '$empleado', '$mes', '$year')");

$registro = 'Ingresado';
echo json_encode($registro);

}else{

pg_query("UPDATE cretroactivo_remuneracion SET descripcion='$descripcion', monto='$monto' WHERE empleado='$empleado' AND mes = '$mes' AND year = '$year'");

$registro = 'Actualizado';
echo json_encode($registro);
}
?>