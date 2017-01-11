<?php
include('conexion.php');
session_start();
$afp1 = $_POST['afp1'];
$afp2 = $_POST['afp2'];
$afp3 = $_POST['afp3'];
$afp4 = $_POST['afp4'];
$afp5 = $_POST['afp5'];
$afp6 = $_POST['afp6'];

$tafpd1 = $_POST['tafpd1'];
$tafpd2 = $_POST['tafpd2'];
$tafpd3 = $_POST['tafpd3'];
$tafpd4 = $_POST['tafpd4'];
$tafpd5 = $_POST['tafpd5'];
$tafpd6 = $_POST['tafpd6'];

$sisd1 = $_POST['sisd1'];
$sisd2 = $_POST['sisd2'];
$sisd3 = $_POST['sisd3'];
$sisd4 = $_POST['sisd4'];
$sisd5 = $_POST['sisd5'];
$sisd6 = $_POST['sisd6'];

$tafpi1 = $_POST['tafpi1'];
$tafpi2 = $_POST['tafpi2'];
$tafpi3 = $_POST['tafpi3'];
$tafpi4 = $_POST['tafpi4'];
$tafpi5 = $_POST['tafpi5'];
$tafpi6 = $_POST['tafpi6'];
$mes1 = $_POST['mes1'];
$year = $_POST['year'];

$comprobar = pg_num_rows(pg_query("SELECT * FROM afp_remuneracion WHERE mes='$mes1' AND year='$year'"));

if($comprobar == 0){

pg_query("INSERT INTO afp_remuneracion (afp1,tafpd1,sisd1,tafpi1,mes,year)VALUES('$afp1','$tafpd1','$sisd1','$tafpi1','$mes1','$year')");
pg_query("INSERT INTO afp_remuneracion (afp1,tafpd1,sisd1,tafpi1,mes,year)VALUES('$afp2','$tafpd2','$sisd2','$tafpi2','$mes1','$year')");
pg_query("INSERT INTO afp_remuneracion (afp1,tafpd1,sisd1,tafpi1,mes,year)VALUES('$afp3','$tafpd3','$sisd3','$tafpi3','$mes1','$year')");
pg_query("INSERT INTO afp_remuneracion (afp1,tafpd1,sisd1,tafpi1,mes,year)VALUES('$afp4','$tafpd4','$sisd4','$tafpi4','$mes1','$year')");
pg_query("INSERT INTO afp_remuneracion (afp1,tafpd1,sisd1,tafpi1,mes,year)VALUES('$afp5','$tafpd5','$sisd5','$tafpi5','$mes1','$year')");
pg_query("INSERT INTO afp_remuneracion (afp1,tafpd1,sisd1,tafpi1,mes,year)VALUES('$afp6','$tafpd6','$sisd6','$tafpi6','$mes1','$year')");

$registro = 'Ingresado';
echo json_encode($registro);

}else{
pg_query("DELETE FROM afp_remuneracion WHERE mes='$mes1' AND year='$year'");

pg_query("INSERT INTO afp_remuneracion (afp1,tafpd1,sisd1,tafpi1,mes,year)VALUES('$afp1','$tafpd1','$sisd1','$tafpi1','$mes1','$year')");
pg_query("INSERT INTO afp_remuneracion (afp1,tafpd1,sisd1,tafpi1,mes,year)VALUES('$afp2','$tafpd2','$sisd2','$tafpi2','$mes1','$year')");
pg_query("INSERT INTO afp_remuneracion (afp1,tafpd1,sisd1,tafpi1,mes,year)VALUES('$afp3','$tafpd3','$sisd3','$tafpi3','$mes1','$year')");
pg_query("INSERT INTO afp_remuneracion (afp1,tafpd1,sisd1,tafpi1,mes,year)VALUES('$afp4','$tafpd4','$sisd4','$tafpi4','$mes1','$year')");
pg_query("INSERT INTO afp_remuneracion (afp1,tafpd1,sisd1,tafpi1,mes,year)VALUES('$afp5','$tafpd5','$sisd5','$tafpi5','$mes1','$year')");
pg_query("INSERT INTO afp_remuneracion (afp1,tafpd1,sisd1,tafpi1,mes,year)VALUES('$afp6','$tafpd6','$sisd6','$tafpi6','$mes1','$year')");


$registro = 'Actualizado';
echo json_encode($registro);
}


?>