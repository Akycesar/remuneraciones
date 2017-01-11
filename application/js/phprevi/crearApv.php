<?php
include('conexion.php');
session_start();
$apv1 = $_POST['apv1'];
$apv2 = $_POST['apv2'];
$mes1 = $_POST['mes1'];
$year = $_POST['year'];

$comprobar = pg_num_rows(pg_query("SELECT * FROM apv_remuneracion WHERE mes='$mes1' AND year='$year'"));

if($comprobar == 0){

pg_query("INSERT INTO apv_remuneracion (apv1, apv2,mes,year)VALUES('$apv1','$apv2','$mes1','$year')");

$registro = 'Ingresado';
echo json_encode($registro);

}else{

pg_query("UPDATE apv_remuneracion SET apv1='$apv1', apv2='$apv2' WHERE mes='$mes1' AND year='$year'");

$registro = 'Actualizado';
echo json_encode($registro);
}
?>