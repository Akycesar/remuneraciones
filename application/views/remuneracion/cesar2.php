<?php

$conn_string = "host=localhost port=5432 dbname=contabilidad user=postgres password=kowalczyk";
                $conexion = pg_connect($conn_string); 

$sql="SELECT id, COUNT(*) AS c FROM lventa GROUP BY id HAVING COUNT(*) > 1";
$res=pg_query($sql);
    
    while($fila=pg_fetch_array($res)){
               $num=$fila['id'];
               $cant=$fila['c'];
               echo $num.' ';
               echo $cant.'</br>';

                  /* $sql="DELETE FROM lventa WHERE id='$num'";
                    pg_query($sql);
                   
                    echo 'El id: '.$num.' ha sido eliminado'.'</br>'; */
            
    }
//este script elimina los registros duplicados.

 ?>