<?php

$conn_string = "host=localhost port=5432 dbname=contabilidad user=postgres password=kowalczyk";
                $conexion = pg_connect($conn_string); 

                    $sql2="SELECT * FROM lventa_temp";
                    $res2=pg_query($sql2);
                        
                        while($fila2=pg_fetch_array($res2)){
                                  $id=$fila2['id'];
                                  $frec=$fila2['frec'];
                                  $td=$fila2['td'];
                                  $dte=$fila2['dte'];
                                  $ndoc=$fila2['ndoc'];
                                  $iva=$fila2['iva'];
                                  $emision=$fila2['emision'];
                                  $rut=$fila2['rut'];
                                  $rs=$fila2['rs'];
                                  $descrip=$fila2['descrip'];
                                  $afecto1=$fila2['afecto1'];
                                  $afecto2=$fila2['afecto2'];
                                  $afecto3=$fila2['afecto3'];
                                  $exento1=$fila2['exento1'];
                                  $exento2=$fila2['exento2'];
                                  $exento3=$fila2['exento3'];
                                  $iva2=$fila2['iva2'];
                                  $impuesto=$fila2['impuesto'];
                                  $total1=$fila2['total1'];
                                  $total2=$fila2['total2'];
                                  $total3=$fila2['total3'];
                                  $vencimiento=$fila2['vencimiento'];
                                  $af=$fila2['af'];
                                  $estado=$fila2['estado'];
                                  $asociado=$fila2['asociado'];
                                  $usuario=$fila2['usuario'];
                                  $empresa=$fila2['empresa'];
                                                
                                                    pg_query("INSERT INTO lventa (id,frec,td,dte,ndoc,iva,emision,rut,rs,descrip,afecto1,afecto2,afecto3,exento1,exento2,exento3,iva2,impuesto,total1,total2,total3,vencimiento,af,estado,asociado,usuario,empresa)
                                                        VALUES('$id','$frec','$td','$dte','$ndoc','$iva','$emision','$rut','$rs','$descrip','$afecto1','$afecto2','$afecto3','$exento1','$exento2','$exento3','$iva2','$impuesto','$total1','$total2','$total3','$vencimiento','$af','$estado','$asociado','$usuario','$empresa') ");
                                                

                        }
            
//este script toma los registros repetidos de la tabla lventa y la copia en una tabla nueva.

 ?>