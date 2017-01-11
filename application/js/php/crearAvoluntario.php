<?php
include('conexion.php');
session_start();
$rut = $_POST['rut'];
$rut_emp = $_POST['rut_emp'];
$apepatern = $_POST['apepatern'];
$apematern = $_POST['apematern'];
$nom_emp = $_POST['nom_emp'];
$checkvo = $_POST['checkvo'];

$comprobar = pg_num_rows(pg_query("SELECT * FROM avoluntario_remuneracion WHERE empleado = '$rut'"));

if($comprobar == 0){

pg_query("INSERT INTO avoluntario_remuneracion (rut_emp,apepatern,apematern,nom_emp,checkvo,empleado)VALUES('$rut_emp','$apepatern','$apematern','$nom_emp','$checkvo','$rut') ");

$registro = 'Ingresado';
echo json_encode($registro);

}else{

pg_query("UPDATE avoluntario_remuneracion SET rut_emp='$rut_emp', apepatern='$apepatern', apematern='$apematern', nom_emp='$nom_emp', checkvo='$checkvo' WHERE empleado='$rut' ");

$registro = 'Actualizado';
echo json_encode($registro);
}
?>