<?php
include('conexion.php');
session_start();
$im_desde1 = $_POST['im_desde1'];
$im_hasta1 = $_POST['im_hasta1'];
$im_factor1 = $_POST['im_factor1'];
$im_descuento1 = $_POST['im_descuento1'];

$im_desde2 = $_POST['im_desde2'];
$im_hasta2 = $_POST['im_hasta2'];
$im_factor2 = $_POST['im_factor2'];
$im_descuento2 = $_POST['im_descuento2'];

$im_desde3 = $_POST['im_desde3'];
$im_hasta3 = $_POST['im_hasta3'];
$im_factor3 = $_POST['im_factor3'];
$im_descuento3 = $_POST['im_descuento3'];

$mes1 = $_POST['mes1'];
$year = $_POST['year'];

$comprobar = pg_num_rows(pg_query("SELECT * FROM impuesto_remuneracion WHERE mes='$mes1' AND year='$year'"));

if($comprobar == 0){

pg_query("INSERT INTO impuesto_remuneracion (desde,hasta,factor,descuento,mes,year,tramo)VALUES('$im_desde1','$im_hasta1','$im_factor1','$im_descuento1','$mes1','$year','tramo 1')");
pg_query("INSERT INTO impuesto_remuneracion (desde,hasta,factor,descuento,mes,year,tramo)VALUES('$im_desde2','$im_hasta2','$im_factor2','$im_descuento2','$mes1','$year','tramo 2')");
pg_query("INSERT INTO impuesto_remuneracion (desde,hasta,factor,descuento,mes,year,tramo)VALUES('$im_desde3','$im_hasta3','$im_factor3','$im_descuento3','$mes1','$year','tramo 3')");

$registro = 'Ingresado';
echo json_encode($registro);

}else{

pg_query("DELETE FROM impuesto_remuneracion WHERE mes='$mes1' AND year='$year'");

pg_query("INSERT INTO impuesto_remuneracion (desde,hasta,factor,descuento,mes,year,tramo)VALUES('$im_desde1','$im_hasta1','$im_factor1','$im_descuento1','$mes1','$year','tramo 1')");
pg_query("INSERT INTO impuesto_remuneracion (desde,hasta,factor,descuento,mes,year,tramo)VALUES('$im_desde2','$im_hasta2','$im_factor2','$im_descuento2','$mes1','$year','tramo 2')");
pg_query("INSERT INTO impuesto_remuneracion (desde,hasta,factor,descuento,mes,year,tramo)VALUES('$im_desde3','$im_hasta3','$im_factor3','$im_descuento3','$mes1','$year','tramo 3')");

$registro = 'Actualizado';
echo json_encode($registro);
}
 ?>