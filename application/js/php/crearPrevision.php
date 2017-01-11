<?php
include('conexion.php');
session_start();
$rut = $_POST['rut'];
$salud = $_POST['salud'];
$afp = $_POST['afp'];
$opciones = $_POST['opciones'];
$pensionado = $_POST['pensionado'];
$cuota = $_POST['cuota'];

$comprobar = pg_num_rows(pg_query("SELECT * FROM prevision_remuneracion WHERE empleado = '$rut'"));

if($comprobar == 0){

pg_query("INSERT INTO prevision_remuneracion (salud,afp,opciones,pension,cuota,empleado)VALUES('$salud','$afp','$opciones','$pensionado','$cuota','$rut') ");

$registro = 'Ingresado';
echo json_encode($registro);

}else{

pg_query("UPDATE prevision_remuneracion SET salud='$salud', afp='$afp', opciones='$opciones', pension='$pension', cuota='$cuota' WHERE empleado='$rut' ");

$registro = 'Actualizado';
echo json_encode($registro);
}
?>