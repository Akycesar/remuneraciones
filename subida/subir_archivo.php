<?php
if (isset($_FILES['archivo'])) {
	$empresa=$_POST['empresa'];
    $archivo = $_FILES['archivo'];

    $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
	$time = time();
    $nombre = "{$_POST['nombre_archivo']}_$time.$extension";
    if (move_uploaded_file($archivo['tmp_name'], "archivos_subidos/$nombre")) {
        echo 1;
    } else {
        echo 0;
    }
}
$conn = pg_connect("host=190.121.27.148 password=postgres user=postgres dbname=control");
$SQL="INSERT INTO archivos (empresa,archivo) VALUES ('$empresa','$nombre')";
$result = pg_query ($conn, $SQL ) or die("Error en la consulta SQL");

?>
