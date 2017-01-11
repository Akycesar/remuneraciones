<?php
include('conexion.php');
session_start();
$rut = $_POST['rut'];
$estatura = $_POST['estatura'];
$tallax = $_POST['tallax'];
$zapatos = $_POST['zapatos'];

$comprobar = pg_num_rows(pg_query("SELECT * FROM talla_remuneracion WHERE rut = '$rut'"));

if($comprobar == 0){

pg_query("INSERT INTO talla_remuneracion (rut,estatura,talla,zapatos)VALUES('$rut','$estatura','$tallax','$zapatos') ");

$registro = 'Ingresado';
echo json_encode($registro);

}else{

pg_query("UPDATE talla_remuneracion SET estatura='$estatura', talla='$tallax', zapatos='$zapatos' WHERE rut='$rut' ");

$registro = 'Actualizado';
echo json_encode($registro);
}
?>