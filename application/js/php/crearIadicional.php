<?php
include('conexion.php');
session_start();
$rut = $_POST['rut'];
$fprimeraco = $_POST['fprimeraco'];
$aantco = $_POST['aantco'];
$vacaus = $_POST['vacaus'];
$check1 = $_POST['check1'];
$check2 = $_POST['check2'];
$check3 = $_POST['check3'];

$comprobar = pg_num_rows(pg_query("SELECT * FROM iadicional_remuneracion WHERE empleado = '$rut'"));

if($comprobar == 0){

pg_query("INSERT INTO iadicional_remuneracion (fprimeraco,aantco,vacaus,check1,check2,check3,empleado)VALUES('$fprimeraco','$aantco','$vacaus','$check1','$check2','$check3','$rut') ");

$registro = 'Ingresado';
echo json_encode($registro);

}else{

pg_query("UPDATE iadicional_remuneracion SET fprimeraco='$fprimeraco', aantco='$aantco', vacaus='$vacaus', check1='$check1', check2='$check2', check3='$check3' WHERE empleado='$rut' ");

$registro = 'Actualizado';
echo json_encode($registro);
}
?>