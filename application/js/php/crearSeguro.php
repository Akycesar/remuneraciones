<?php
include('conexion.php');
session_start();
$rut = $_POST['rut'];
$seguro = $_POST['seguro'];
$recaudadora = $_POST['recaudadora'];
$spatronal = $_POST['spatronal'];

$comprobar = pg_num_rows(pg_query("SELECT * FROM seguro_remuneracion WHERE empleado = '$rut'"));

if($comprobar == 0){

pg_query("INSERT INTO seguro_remuneracion (seguro,recaudadora,spatronal,empleado)VALUES('$seguro','$recaudadora','$spatronal','$rut') ");

$registro = 'Ingresado';
echo json_encode($registro);

}else{

pg_query("UPDATE seguro_remuneracion SET seguro='$seguro', recaudadora='$recaudadora', spatronal='$spatronal' WHERE empleado='$rut' ");

$registro = 'Actualizado';
echo json_encode($registro);
}
?>