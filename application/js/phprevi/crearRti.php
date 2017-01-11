<?php
include('conexion.php');
session_start();
$rti1 = $_POST['rti1'];
$rti2 = $_POST['rti2'];
$rti3 = $_POST['rti3'];
$mes1 = $_POST['mes1'];
$year = $_POST['year'];

$comprobar = pg_num_rows(pg_query("SELECT * FROM rti_remuneracion WHERE mes='$mes1' AND year='$year'"));

if($comprobar == 0){

pg_query("INSERT INTO rti_remuneracion (rti1,rti2,rti3,mes,year)VALUES('$rti1','$rti2','$rti3','$mes1','$year')");

$registro = 'Ingresado';
echo json_encode($registro);

}else{

pg_query("UPDATE rti_remuneracion SET rti1='$rti1', rti2='$rti2', rti3='$rti3' WHERE mes='$mes1' AND year='$year'");

$registro = 'Actualizado';
echo json_encode($registro);
}
 ?>