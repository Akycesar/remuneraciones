<?php
include('conexion.php');
session_start();
$rmi1 = $_POST['rmi1'];
$rmi2 = $_POST['rmi2'];
$rmi3 = $_POST['rmi3'];
$rmi4 = $_POST['rmi4'];
$mes1 = $_POST['mes1'];
$year = $_POST['year'];

$comprobar = pg_num_rows(pg_query("SELECT * FROM rmi_remuneracion WHERE mes='$mes1' AND year='$year'"));

if($comprobar == 0){

pg_query("INSERT INTO rmi_remuneracion (rmi1,rmi2,rmi3,rmi4,mes,year)VALUES('$rmi1','$rmi2','$rmi3','$rmi4','$mes1','$year')");

$registro = 'Ingresado';
echo json_encode($registro);

}else{

pg_query("UPDATE rmi_remuneracion SET rmi1='$rmi1', rmi2='$rmi2', rmi3='$rmi3', rmi4='$rmi4' WHERE mes='$mes1' AND year='$year'");

$registro = 'Actualizado';
echo json_encode($registro);
}
 ?>