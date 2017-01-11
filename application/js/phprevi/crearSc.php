<?php
include('conexion.php');
session_start();
$sce1 = $_POST['sce1'];
$sce2 = $_POST['sce2'];
$sce3 = $_POST['sce3'];
$sct1 = $_POST['sct1'];
$sct2 = $_POST['sct2'];
$sct3 = $_POST['sct3'];
$mes1 = $_POST['mes1'];
$year = $_POST['year'];

$comprobar = pg_num_rows(pg_query("SELECT * FROM sc_remuneracion WHERE mes='$mes1' AND year='$year'"));

if($comprobar == 0){

pg_query("INSERT INTO sc_remuneracion (sce1,sce2,sce3,sct1,sct2,sct3,mes,year)VALUES('$sce1','$sce2','$sce3','$sct1','$sct2','$sct3','$mes1','$year')");

$registro = 'Ingresado';
echo json_encode($registro);

}else{

pg_query("UPDATE sc_remuneracion SET sce1='$sce1', sce2='$sce2', sce3='$sce3', sct1='$sct1', sct2='$sct2', sct3='$sct3' WHERE mes='$mes1' AND year='$year'");

$registro = 'Actualizado';
echo json_encode($registro);
}
 ?>