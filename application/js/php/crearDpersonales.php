<?php
include('conexion.php');
session_start();
$rut = $_POST['rut'];
$direccion = $_POST['direccion'];
$comuna = $_POST['comuna'];
$telefono = $_POST['telefono'];
$celular = $_POST['celular'];
$ciudad = $_POST['ciudad'];
$email = $_POST['email'];
$banco = $_POST['banco'];
$cuenta = $_POST['cuenta'];
$ncuenta = $_POST['ncuenta'];
$pagar = $_POST['pagar'];

$comprobar = pg_num_rows(pg_query("SELECT * FROM dpersonales_remuneracion WHERE empleado = '$rut'"));

if($comprobar == 0){

pg_query("INSERT INTO dpersonales_remuneracion (direccion,comuna,ciudad,telefono,celular,email,banco,cuenta,ncuenta,empleado,pagar)VALUES('$direccion','$comuna','$ciudad','$telefono','$celular','$email','$banco','$cuenta','$ncuenta','$rut','$pagar') ");

$registro = 'Ingresado';
echo json_encode($registro);

}else{

pg_query("UPDATE dpersonales_remuneracion SET direccion='$direccion', comuna='$comuna', ciudad='$ciudad', telefono='$telefono', celular='$celular', email='$email', banco='$banco', cuenta='$cuenta', ncuenta='$ncuenta', pagar='$pagar' WHERE empleado='$rut' ");

$registro = 'Actualizado';
echo json_encode($registro);
}
?>