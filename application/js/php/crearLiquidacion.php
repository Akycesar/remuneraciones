<?php
include('conexion.php');
session_start();
$sbase = $_POST['sbase'];
$imsegces = $_POST['imsegces'];
$imsis = $_POST['imsis'];
$colacion = $_POST['colacion'];
$dntrabajados = $_POST['dntrabajados'];
$tipo_sueldo = $_POST['tipo_sueldo'];
$gratificacion = $_POST['gratificacion'];
$aguinaldo = $_POST['aguinaldo'];
$comision = $_POST['comision'];
$mret = $_POST['mret'];
$movilizacion = $_POST['movilizacion'];
$dxlic = $_POST['dxlic'];
$dias_mensuales = $_POST['dias_mensuales'];
$horas_semanales = $_POST['horas_semanales'];
$dias_semanales = $_POST['dias_semanales'];
$atrasos = $_POST['atrasos'];
$h_ext5 = $_POST['h_ext5'];
$h_ext10 = $_POST['h_ext10'];
$monto = $_POST['monto'];
$tramo = $_POST['tramo'];
$fam = $_POST['fam'];
$mat = $_POST['mat'];
$inva = $_POST['inva'];
$empleado = $_POST['empleado'];
$mes = $_POST['mes'];
$year = $_POST['year'];
$empresa = $_POST['empresa'];

$comprobar = pg_num_rows(pg_query("SELECT * FROM liquidacion_remuneracion WHERE empleado = '$empleado' AND mes = '$mes' AND year = '$year'"));

if($comprobar == 0){

pg_query("INSERT INTO liquidacion_remuneracion (sbase, imsegces, imsis, colacion, dntrabajados, tipo_sueldo, gratificacion, aguinaldo, comision, mret, movilizacion, dxlic, dias_mensuales, horas_semanales, dias_semanales, atrasos, h_ext5, h_ext10, monto, tramo, fam, mat, inva, empleado, mes, year, empresa)VALUES('$sbase', '$imsegces', '$imsis', '$colacion', '$dntrabajados', '$tipo_sueldo', '$gratificacion', '$aguinaldo', '$comision', '$mret', '$movilizacion', '$dxlic', '$dias_mensuales', '$horas_semanales', '$dias_semanales', '$atrasos', '$h_ext5', '$h_ext10', '$monto', '$tramo', '$fam', '$mat', '$inva', '$empleado', '$mes', '$year', '$empresa') ");

$registro = 'Ingresado';
echo json_encode($registro);

}else{

pg_query("UPDATE liquidacion_remuneracion SET sbase='$sbase', imsegces='$imsegces', imsis='$imsis', colacion='$colacion', dntrabajados='$dntrabajados', tipo_sueldo='$tipo_sueldo', gratificacion='$gratificacion', aguinaldo='$aguinaldo', comision='$comision', mret='$mret', movilizacion='$movilizacion', dxlic='$dxlic', dias_mensuales='$dias_mensuales', horas_semanales='$horas_semanales', dias_semanales='$dias_semanales', atrasos='$atrasos', h_ext5='$h_ext5', h_ext10='$h_ext10', monto='$monto', tramo='$tramo', fam='$fam', mat='$mat', inva='$inva', empleado='$empleado', mes='$mes', year='$year', empresa='$empresa' WHERE empleado='$empleado' AND mes = '$mes' AND year = '$year' ");

$registro = 'Actualizado';
echo json_encode($registro);
}
?>