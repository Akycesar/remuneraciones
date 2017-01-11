<?php
include('conexion.php');
session_start();
$descripcion = $_POST['descripcion'];
$monto = $_POST['monto'];
$empleado = $_POST['empleado'];
$mes = $_POST['mes'];
$year = $_POST['year'];

$comprobar = pg_num_rows(pg_query("SELECT * FROM prestamo_remuneracion WHERE empleado = '$empleado' AND mes = '$mes' AND year = '$year'"));

if($comprobar == 0){

pg_query("INSERT INTO prestamo_remuneracion (descripcion, monto, empleado, mes, year)VALUES('$descripcion', '$monto', '$empleado', '$mes', '$year')");

$registro = 'Ingresado';
echo json_encode($registro);

}else{

pg_query("UPDATE prestamo_remuneracion SET descripcion='$descripcion', monto='$monto' WHERE empleado='$empleado' AND mes = '$mes' AND year = '$year'");

$registro = 'Actualizado';
echo json_encode($registro);
}
?>