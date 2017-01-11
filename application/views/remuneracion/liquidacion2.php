<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Liquidacion</title>
<script type="text/javascript">
function calctot(){
  var tothab = $('#tot_hab').val();
  var totdesc = $('#tot_desc').val();
  document.getElementById('total_liq').value=parseInt(tothab-totdesc);
  console.log(tothab);
  console.log(totdesc);
}
</script>
<?
setlocale(LC_MONETARY, 'es_ES');
?>
</head>
<body style="margin:0">
<?= $rs.'<br>'.$direccion .'<br>'.'RUT: '.$rut_empresa?><br>
________________

<h2 align="center"><strong>Liquidación de Sueldo del mes de <?= $mes ?> de <?= $year ?></strong></h2>
<table width="100%" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <? foreach ($empleado -> result() as $value) { ?>
      <tr>
        <td width="81%"><strong>Nombre: <?= $value->nombres.' '.$value->apellido_paterno.' '.$value->apellido_materno ?></strong></td>
        <td colspan="4" align="right"><strong>Rut:</strong><strong>
          <?= $value->rut ?>
        </strong></td>
        </tr>
      <? } ?>
      <tr>
        <td>Cargo: <?= $cargo ?></td>
        </tr>
      <tr>
        <td>Fecha Ingreso: <?= date("d-m-Y",strtotime($ingreso)) ?></td>
        </tr>
      <tr>
        <td>
Dias Trabajados: <?= $dtrabajados-$dntrabajados; ?><br>
</td></tr>
      <tr>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td><strong>Haberes Tributables e Imponibles</strong></td>
        <td width="2%" align="right">&nbsp;</td>
        <td width="2%">&nbsp;</td>
        <td width="3%" align="right">&nbsp;</td>
        <td width="14%">&nbsp;</td>
        </tr>
        <tr>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td>                      Sueldo Base:</td>
        <td align="right">&nbsp;</td>
        <td>$</td>
        <td align="right"><?= number_format($sbase,0,",",".") ?></td>
        <td>&nbsp;</td>
        </tr>
      <? if($bono!=0){ ?>
      <tr>
        <td>                      <? if($tipo_bono=='Aguinaldo'){ ?>Aguinaldo: (<?= $descripcion_bono ?>) <? }elseif($tipo_bono=='Bono'){ ?>Bono: (<?= $descripcion_bono ?>) <? } ?></td>
        <td align="right">&nbsp;</td>
        <td>$</td>
        <td align="right"><?= number_format($bono,0,",",".") ?></td>
        <td>&nbsp;</td>
        </tr>
        <? } ?>
     <? if($dntrabajados>0){ ?>
      <tr>
        <td>                      Dias no Trabajados (<?= $dntrabajados ?>)</td>
        <td align="right">(</td>
        <td>$</td>
        <td align="right"><?= number_format($tot_dntrab,0,",",".") ?></td>
        <td> )</td>
      </tr>
     <? } ?>
     <? if($atrasos>0){ ?>
      <tr>
        <td>                      Horas no Trabajadas (<?= $atrasos ?>)</td>
        <td align="right">(</td>
        <td>$</td>
        <td align="right"><?= number_format($hntrabajados,0,",",".") ?></td>
        <td> )</td>
      </tr>
     <? } ?>
     <? if($h_5>0){ ?>
      <tr>
        <td>                      Horas Extras 50% (<?= $h_5 ?>)</td>
        <td align="right">(</td>
        <td>$</td>
        <td align="right"><?= number_format($vh5,0,",",".") ?></td>
        <td> )</td>
      </tr>
     <? } ?>
     <? if($h_10>0){ ?>
      <tr>
        <td>                      Horas Extras 100% (<?= $h_10 ?>)</td>
        <td align="right">(</td>
        <td>$</td>
        <td align="right"><?= number_format($vh10,0,",",".") ?></td>
        <td> )</td>
      </tr>
     <? } ?>
      <tr>
        <td>                      Gratificacion:</td>
        <td align="right">&nbsp;</td>
        <td>$</td>
        <td align="right"><?= number_format($gratificacion,0,",",".") ?></td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td>             <strong>Totales Haberes Tributables e Imponibles</strong></td>
        <td align="right">&nbsp;</td>
        <td>$</td>
        <td align="right"><?= number_format($total_imponible,0,",",".") ?></td>
        <td>&nbsp;</td>
        </tr>
     <? if($cargas>0){ ?>
      <tr>
        <td>                      Asignacion Familiar (Integrantes: <?= $familia ?>,Tramo: <?= $tramo ?>)</td>
        <td align="right"></td>
        <td>$</td>
        <td align="right"><?= number_format($cargas,0,",",".") ?></td>
        <td>&nbsp;</td>
        </tr>
        <? } ?>
      <? if($monRet>0){ ?>
      <tr>
        <td>                      Carga Retroactiva (<?= $desRet ?>)</td>
        <td align="right"></td>
        <td>$</td>
        <td align="right"><?= number_format($monRet,0,",",".") ?></td>
        <td>&nbsp;</td>
        </tr>
        <? } ?>
        <? if($aguinaldo>0){ ?>
      <tr>
        <td>                      Aguinaldo</td>
        <td align="right">&nbsp;</td>
        <td>$</td>
        <td align="right"><?= number_format($aguinaldo,0,",",".") ?></td>
        <td>&nbsp;</td>
      </tr>
      <? } ?>
        <? if($movilizacion>0){ ?>
      <tr>
        <td>                      Movilización</td>
        <td align="right">&nbsp;</td>
        <td>$</td>
        <td align="right"><?= number_format($movilizacion,0,",",".") ?></td>
        <td>&nbsp;</td>
      </tr>
      <? } ?>
       <? if($colacion>0){ ?>
      <tr>
        <td>                      Colacion</td>
        <td align="right">&nbsp;</td>
        <td>$</td>
        <td align="right"><?= number_format($colacion,0,",",".") ?></td>
        <td>&nbsp;</td>
      </tr>
      <? } ?>
      <tr>
        <td>&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><strong>Descuentos Varios</strong></td>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
        <tr>
        <td>&nbsp;</td>
        </tr>
      <? if($anticipo>0){ ?>
      <tr>
        <td>                      Anticipo: (<?= $detalle_anticipo ?>)</td>
        <td align="right">(</td>
        <td>$</td>
        <td align="right"><?= number_format($anticipo,0,",",".") ?></td>
        <td> )</td>
        </tr>
        <? } ?>
        <? if($prestamo>0){ ?>
      <tr>
        <td>                      Prestamos: (<?= $detalle_prestamo ?>)</td>
        <td align="right">(</td>
        <td>$</td>
        <td align="right"><?= number_format($prestamo,0,",",".") ?></td>
        <td> )</td>
        </tr>
      <? } ?>
      <? if($descuento>0){ ?>
      <tr>
        <td>                      Descuento: (<?= $detalle_descuento ?>)</td>
        <td align="right">(</td>
        <td>$</td>
        <td align="right"><?= number_format($descuento,0,",",".") ?></td>
        <td> )</td>
        </tr>
      <? } ?>
      <tr>
        <td>             <strong>Total Descuentos Varios</strong></td>
        <td align="right">(</td>
        <td>$</td>
        <td align="right"><?= number_format($anticipo+$prestamo+$descuento,0,",",".") ?></td>
        <td> )</td>
        </tr>
      <tr>
        <td><strong>Descuentos Legales</strong></td>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
        <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>                      Imponible Previsional: $ <? if($total_imponible>$tope_imponible){ echo number_format($tope_imponible,0,",","."); }else{ echo number_format($total_imponible,0,",","."); } ?></td>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td>                      AFP <?= $afp.' '.'('.$tasa.'%)';?></td>
        <td align="right">&nbsp;</td>
        <td>$</td>
        <td align="right"><?= number_format(round($total_valor_afp),0,",","."); ?></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>            <strong>Total AFP</strong></td>
        <td align="right">(</td>
        <td>$</td>
        <td align="right"><?= number_format(round($total_valor_afp),0,",","."); ?></td>
        <td> )</td>
      </tr>

      <? if($salud=='Fonasa'){ ?>
      <tr>
        <td>              <strong>Fonasa</strong></td>
        </tr>
      <tr>
        <td>                      Salud 7%</td>
        <td align="right">&nbsp;</td>
        <td>$</td>
        <td align="right"><?= number_format($total_valor_salud,0,",",".") ?></td>
        <td>&nbsp;</td>
        </tr>
        <? }else{ ?>
      <tr>
        <td>              <strong>Isapre</strong></td>
        </tr>
      <tr>
        <td>                      <?= $salud.' '.'('.$cuota.' UF)'; ?></td>
        <td align="right">&nbsp;</td>
        <td>$</td>
        <td align="right"><?= number_format($total_valor_salud,0,",",".") ?></td>
        <td>&nbsp;</td>
        </tr>
        <? } ?>
      <? if($adicional>0){ ?>
      <tr>
        <td>                      Adicional</td>
        <td align="right">&nbsp;</td>
        <td>$</td>
        <td align="right"><?= number_format($adicional,0,",",".") ?></td>
        <td>&nbsp;</td>
        </tr>
        <? } ?>
      <tr>
        <td>            <strong>Total Salud</strong></td>
        <td align="right">(</td>
        <td>$</td>
        <td align="right"><?= number_format($total_valor_salud+$adicional,0,",",".") ?></td>
        <td> )</td>
        </tr>
        <tr>
        <td>&nbsp;</td>
      </tr>
      <? if($cesantia>0){ ?>
      <tr>
        <td>                      Seguro de Cesantia 0,6% (imponible: <? if($total_imponible>$tope_cesantia){ echo number_format($tope_cesantia,0,",","."); }else{ echo number_format($total_imponible,0,",","."); } ?>)</td>
        <td align="right">&nbsp;</td>
        <td>$</td>
        <td align="right"><?= number_format($cesantia,0,",",".") ?></td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><strong>Total Descuentos Previsionales</strong></td>
        <td align="right">&nbsp;</td>
        <td>$</td>
        <td align="right"><?= number_format($descuentos_previsionales,0,",",".") ?></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
        <? } ?>
      <tr>
        <td>                      Impuesto Unico: (Base: $<?= number_format($base_impuesto,0,",",".") ?>)</td>
        <td align="right">&nbsp;</td>
        <td>$</td>
        <td align="right"><?= number_format($impuesto,0,",",".") ?></td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td><strong>Total Descuentos Legales</strong></td>
        <td align="right">(</td>
        <td>$</td>
        <td align="right"><?= number_format($total_descuentos,0,",",".") ?></td>
        <td>)</td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td><strong>Total Haberes</strong></td>
        <td align="right">&nbsp;</td>
        <td>$</td>
        <td align="right"><?= number_format($total_haberes,0,",",".") ?></td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td><strong>Total Descuentos</strong></td>
        <td align="right">(</td>
        <td>$</td>
        <td align="right"><?= number_format($total_descuentos+$anticipo+$prestamo+$descuento,0,",",".") ?></td>
        <td> )</td>
        </tr>
      <tr>
        <td><strong>Total Liquido</strong></td>
        <td align="right">&nbsp;</td>
        <td>$</td>
        <td align="right"><?= number_format($total_liquido,0,",",".") ?></td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td>UF del mes: <?= $uf ?></td>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
    </table></td>
  </tr>
</table>
<br>
<p align="center">________________________
<br>
<p align="center"><strong>Certifico que he recibido de mi Empleador Sr (a)</strong>:
  <?= $rs ?>
, a mi total satisfaccion el saldo liquido indicado en la presente liquidacion, sin tener cargo ni cobro posterior alguno que hacer, por los conceptos de esta liquidacion. 
<p align="center">&nbsp;
</body>
