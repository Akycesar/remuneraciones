<?php
include('conexion.php');
session_start();
$rut = $_POST['rut'];
$nombre_emergencia = $_POST['nombre_emergencia'];
$telefono_emergencia = $_POST['telefono_emergencia'];

$comprobar = pg_num_rows(pg_query("SELECT * FROM emergencia_remuneracion WHERE empleado = '$rut'"));

if($comprobar == 0){

pg_query("INSERT INTO emergencia_remuneracion (nombre_emergencia,telefono_emergencia,empleado)VALUES('$nombre_emergencia','$telefono_emergencia','$rut') ");

$registro = 'Ingresado';
echo json_encode($registro);

}else{

pg_query("UPDATE emergencia_remuneracion SET nombre_emergencia='$nombre_emergencia', telefono_emergencia='$telefono_emergencia' WHERE empleado='$rut' ");

$registro = 'Actualizado';
echo json_encode($registro);
}
?>