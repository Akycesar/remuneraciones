<?php
if (isset($_POST['archivo'])) {
    $archivo = $_POST['archivo'];
    if (file_exists("archivos_subidos/$archivo")) {
        unlink("archivos_subidos/$archivo");
        echo 1;
    } else {
        echo 0;
    }
}
$conn = pg_connect("host=190.121.27.148 password=postgres user=postgres dbname=control");
$SQL="DELETE FROM archivos WHERE archivo ='$archivo'";
$result = pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
?>
