<?php
include('conexion.php');
session_start();
$monto1 = $_POST['monto1'];
$monto2 = $_POST['monto2'];
$monto3 = $_POST['monto3'];
$monto4 = $_POST['monto4'];
$mes1 = $_POST['mes1'];
$year = $_POST['year'];

$comprobar = pg_num_rows(pg_query("SELECT * FROM af_remuneracion WHERE mes='$mes1' AND year='$year'"));

if($comprobar == 0){

pg_query("INSERT INTO af_remuneracion (monto1,monto2,monto3,monto4,mes,year)VALUES('$monto1','$monto2','$monto3','$monto4','$mes1','$year')");

$registro = 'Ingresado';
echo json_encode($registro);

}else{

pg_query("UPDATE af_remuneracion SET monto1='$monto1', monto2='$monto2', monto3='$monto3', monto4='$monto4' WHERE mes='$mes1' AND year='$year'");

$registro = 'Actualizado';
echo json_encode($registro);
}
 ?>