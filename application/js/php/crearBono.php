<?php
include('conexion.php');
session_start();
$tipo = $_POST['tipo'];
$descripcion = $_POST['descripcion'];
$monto = $_POST['monto'];
$estado = $_POST['estado'];
$empleado = $_POST['empleado'];
$mes = $_POST['mes'];
$year = $_POST['year'];

$comprobar = pg_num_rows(pg_query("SELECT * FROM bono_remuneracion WHERE empleado = '$empleado' AND mes = '$mes' AND year = '$year'"));

if($comprobar == 0){

pg_query("INSERT INTO bono_remuneracion (descripcion, monto, estado, empleado, mes, year, tipo)VALUES('$descripcion', '$monto', '$estado', '$empleado', '$mes', '$year', '$tipo')");

$registro = 'Ingresado';
echo json_encode($registro);

}else{

pg_query("UPDATE bono_remuneracion SET descripcion='$descripcion', monto='$monto' , estado='$estado', tipo='$tipo' WHERE empleado='$empleado' AND mes = '$mes' AND year = '$year'");

$registro = 'Actualizado';
echo json_encode($registro);
}
?>