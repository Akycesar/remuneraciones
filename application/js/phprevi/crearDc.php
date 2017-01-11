<?php
include('conexion.php');
session_start();
$dc1 = $_POST['dc1'];
$mes1 = $_POST['mes1'];
$year = $_POST['year'];

$comprobar = pg_num_rows(pg_query("SELECT * FROM dc_remuneracion WHERE mes='$mes1' AND year='$year'"));

if($comprobar == 0){

pg_query("INSERT INTO dc_remuneracion (dc1,mes,year)VALUES('$dc1','$mes1','$year')");

$registro = 'Ingresado';
echo json_encode($registro);

}else{

pg_query("UPDATE dc_remuneracion SET dc1='$dc1' WHERE mes='$mes1' AND year='$year'");

$registro = 'Actualizado';
echo json_encode($registro);
}
?>