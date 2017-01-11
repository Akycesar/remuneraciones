<?php
include('conexion.php');
session_start();
$rut = $_POST['rut'];
$empresant = $_POST['empresant'];
$nom_referencia = $_POST['nom_referencia'];
$fono_referencia = $_POST['fono_referencia'];
$causal = $_POST['causal'];

$comprobar = pg_num_rows(pg_query("SELECT * FROM referencia_remuneracion WHERE rut = '$rut'"));

if($comprobar == 0){

pg_query("INSERT INTO referencia_remuneracion (rut,empresa,nombre,fono,causal)VALUES('$rut','$empresant','$nom_referencia','$fono_referencia','$causal') ");

$registro = 'Ingresado';
echo json_encode($registro);

}else{

pg_query("UPDATE referencia_remuneracion SET empresa='$empresant', nombre='$nom_referencia', fono='$fono_referencia', causal='$causal' WHERE rut='$rut' ");

$registro = 'Actualizado';
echo json_encode($registro);
}
?>