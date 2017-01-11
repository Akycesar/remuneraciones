<?php
$conn = pg_connect("host=190.121.27.148 password=postgres user=postgres dbname=control");
$empresa = $_POST["empresa"];
$SQL="SELECT * FROM archivos WHERE empresa= '$empresa'";
$result = pg_query ($conn, $SQL ) or die("Error en la consulta SQL");
$registros= pg_num_rows($result);

$directorio_escaneado = scandir('archivos_subidos');
$archivos = array();

for ($i=0;$i<$registros;$i++)
{

$row = pg_fetch_array ( $result,$i );

foreach ($directorio_escaneado as $item) {
	if($item==$row['archivo']){
   		 if ($item != '.' and $item != '..') {
      		  $archivos[] = '<a href="http://www.gpscontrol.cl/formularios/subida/archivos_subidos/'.$item.'" target="_blank">'.$item.'</a>';
    	 }
	}
}
}
echo json_encode($archivos);
?>
