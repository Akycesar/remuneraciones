<script type="text/javascript">
function imprSelec(nombre) {
      var ficha = document.getElementById(nombre);
      var ventimp = window.open(' ', 'popimpr');
      ventimp.document.write( ficha.innerHTML );
      ventimp.document.close();
      ventimp.print( );
      ventimp.close();
    } 
</script>
<div id="muestra">
    <style type="text/css">
    table.tableizer-table {
        font-size: 12px;
        border-collapse: collapse; 
        font-family: Arial, Helvetica, sans-serif;
    } 
    .tableizer-table td {
        padding: 4px;
        margin: 3px;
        border: 1px solid #CCC;
    }
    .tableizer-table th {
        background-color: #104E8B; 
        color: #FFF;
        font-weight: bold;
        border: 1px solid #CCC;
    }
</style>
<title>Libro</title>
<center><strong><h2>Libro de Remuneraciones mes de <?= $mes ?> del año <?= $year ?></h2></strong></center></br>
<table class="tableizer-table">
<tr>
    <th colspan="14" scope="col">&nbsp;</th>
    <th colspan="5" scope="col">Descuentos</th>
    <th colspan="6" scope="col">&nbsp;</th>
    <th colspan="2" scope="col">Empleador</th>
  </tr>
  <tr class="tableizer-firstrow">
    <th scope="col">Nº</th>
    <th scope="col">Rut</th>
    <th scope="col">Trabajadores</th>
    <th scope="col">Dias Trabajados</th>
    <th scope="col">Sueldo Base</th>
    <th scope="col">Horas Extras (5)</th>
    <th scope="col">Horas Extras (10)</th>
    <th scope="col">Bono Produccion</th>
    <th scope="col">Comision</th>
    <th scope="col">Gratificacion</th>
    <th scope="col">Total Imponible</th>
    <th scope="col">Bono Movilizacion</th>
    <th scope="col">Bono Colacion</th>
    <th scope="col">Total Haber</th>
    <th scope="col">AFP</th>
    <th scope="col">$ AFP</th>
    <th scope="col">Fonasa Isapre</th>
    <th scope="col">Adicion al Isapre</th>
    <th scope="col">AFC</th>
    <th scope="col">Impuesto Unico</th>
    <th scope="col">Total Descuentos</th>
    <th scope="col">Alcance Liquido</th>
    <th scope="col">Anticipo</th>
    <th scope="col">Prestamo</th>
    <th scope="col">Liquido a Pagar</th>
    <th scope="col">Afc 2.4%</th>
    <th scope="col">Afc 3%</th>
  </tr>
  <? $count=1;
  $total_base=0; $total_bono=0; $total_gratificacion=0; $total_ti=0; $total_movilizacion=0; $total_hb=0; $total_afp=0; $tot_h5=0; $tot_h10=0;
  $total_fi=0; $total_adicional=0; $total_impuesto=0; $total_des=0; $total_al=0; $total_lap=0; $total_ces=0; $total_colacion=0;$total_asc2=0; $total_asc3=0;
  $total_anticipo=0; $total_prestamo=0;
    if($detalle!=null){ foreach($detalle -> result() as $val_liqui){  ?>
  <tr>
    <td><?= $count; ?></td>
    <td nowrap><?= $val_liqui->empleado ?></td>
    <? foreach($empleado -> result() as $val_emp){ if($val_liqui->empleado==$val_emp->rut){ ?>
    <td nowrap><?= $val_emp->nombres.' '.$val_emp->apellido_paterno.' '.$val_emp->apellido_materno ?></td>
    <? } } ?>
    <td><? if($val_liqui->dntrabajados!=0){ echo 30-$val_liqui->dntrabajados; }else{ echo '30'; } ?></td>
    <td><?= number_format($val_liqui->sbase, 0, ",", "."); $total_base=$total_base+$val_liqui->sbase; ?></td>
    <td><?= number_format(round($val_liqui->h_ext5), 0, ",", "."); $tot_h5=$tot_h5+$val_liqui->h_ext5; ?></td>
    <td><?= number_format(round($val_liqui->h_ext10), 0, ",", "."); $tot_h10=$tot_h10+$val_liqui->h_ext10; ?></td>
    <td><?= number_format($val_liqui->bono, 0, ",", "."); $total_bono=$total_bono+$val_liqui->bono; ?></td>
    <td>0</td>
    <td><?= number_format($val_liqui->gratificacion,0,",","."); $total_gratificacion=$total_gratificacion+$val_liqui->gratificacion; ?></td>
    <td><?= number_format($val_liqui->total_imponible,0,",","."); $total_ti=$total_ti+$val_liqui->total_imponible; ?></td>
    <td><?= number_format($val_liqui->movilizacion,0,",","."); $total_movilizacion=$total_movilizacion+$val_liqui->movilizacion; ?></td>
    <td><?= number_format($val_liqui->colacion,0,",","."); $total_colacion=$total_colacion+$val_liqui->colacion; ?></td>
    <td><?= number_format($val_liqui->total_haberes,0,",","."); $total_hb=$total_hb+$val_liqui->total_haberes; ?></td>
    <td nowrap><? if($val_liqui->afp!=null){ echo $val_liqui->afp.' '.$val_liqui->tasa.'%'; }else{ echo 'Regimen Antiguo INP'; } ?></td>
    <td><?= number_format($val_liqui->total_valor_afp,0,",","."); $total_afp=$total_afp+$val_liqui->total_valor_afp; ?></td>
    <td><?= number_format($val_liqui->total_valor_salud,0,",","."); $total_fi=$total_fi+$val_liqui->total_valor_salud; ?></td>
    <td><?= number_format($val_liqui->adicional,0,",","."); $total_adicional=$total_adicional+$val_liqui->adicional; ?></td>
    <td><?= number_format($val_liqui->cesantia,0,",","."); $total_ces=$total_ces+$val_liqui->cesantia; ?></td>
    <td><?= number_format($val_liqui->impuesto,0,",","."); $total_impuesto=$total_impuesto+$val_liqui->impuesto; ?></td>
    <td><?= number_format($val_liqui->total_descuentos,0,",","."); $total_des=$total_des+$val_liqui->total_descuentos; ?></td>
    <td><?= number_format($val_liqui->alcance_liquido,0,",","."); $total_al=$total_al+$val_liqui->alcance_liquido; ?></td>
    <td><?= number_format($val_liqui->anticipo,0,",","."); $total_anticipo=$total_anticipo+$val_liqui->anticipo; ?></td>
    <td><?= number_format($val_liqui->prestamo,0,",","."); $total_prestamo=$total_prestamo+$val_liqui->prestamo; ?></td>
    <td><?= number_format($val_liqui->total_liquido,0,",","."); $total_lap=$total_lap+$val_liqui->total_liquido; ?></td>
    <? if($val_liqui->contrato=='Indefinido'){ ?> 
    <td><?= number_format(round($val_liqui->total_imponible*0.024),0,",","."); $total_asc2=$total_asc2+round($val_liqui->total_imponible*0.024); ?></td>
    <td>0</td>
    <? }else{ ?>
    <td>0</td>
    <td><?= number_format(round($val_liqui->total_imponible*0.03),0,",","."); $total_asc3=$total_asc3+round($val_liqui->total_imponible*0.03); ?></td>
    <? } ?>
  </tr>
  <? $count=$count+1; } ?> 
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td>Totales</td>
    <td><?= number_format($total_base,0,",",".") ?></td>
    <td><?= number_format(round($tot_h5),0,",",".") ?></td>
    <td><?= number_format(round($tot_h10),0,",",".") ?></td>
    <td><?= number_format($total_bono,0,",",".") ?></td>
    <td></td>
    <td><?= number_format($total_gratificacion,0,",",".") ?></td>
    <td><?= number_format($total_ti,0,",",".") ?></td>
    <td><?= number_format($total_movilizacion,0,",",".") ?></td>
    <td><?= number_format($total_colacion,0,",",".") ?></td>
    <td><?= number_format($total_hb,0,",",".") ?></td>
    <td></td>
    <td><?= number_format($total_afp,0,",",".") ?></td>
    <td><?= number_format($total_fi,0,",",".") ?></td>
    <td><?= number_format($total_adicional,0,",",".") ?></td>
    <td><?= number_format($total_ces,0,",",".") ?></td>
    <td><?= number_format($total_impuesto,0,",",".") ?></td>
    <td><?= number_format($total_des,0,",",".") ?></td>
    <td><?= number_format($total_al,0,",",".") ?></td>
    <td><?= number_format($total_anticipo,0,",",".") ?></td>
    <td><?= number_format($total_prestamo,0,",",".") ?></td>
    <td><?= number_format($total_lap,0,",",".") ?></td>
    <td><?= number_format($total_asc2,0,",",".") ?></td>
    <td><?= number_format($total_asc3,0,",",".") ?></td>
  </tr>
  <? }else{ echo 'No hay datos'; } ?>
</table>
</div>
</br>
<center><button class="btn btn-primary" onClick="javascript:imprSelec('muestra')"> Imprimir </button></center>
<? /*
<table class="tableizer-table">
<thead>
    <tr class="tableizer-firstrow">
        <th>N°</th>
        <th>RUT</th>
        <th>VIGENCIA</th>
        <th>NOMBRES</th>
        <th>APELLIDO PATERNO</th>
        <th>APELLIDO MATERNO</th>
        <th>NACIONALIDAD</th>
        <th>TIPO CONTRATO</th>
        <th>SUELDO BASE</th>
        <th>GRATIFICACION LEGAL</th>
        <th>BONO</th>
        <th>AGUINALDO</th>
        <th>DIAS TRABAJADOS</th>
        <th>DIAS AUSENCIA LABORAL</th>
        <th>AUSENCIA LABORAL $</th>
        <th>TOTAL ANTICIPOS</th>
        <th>AHORRO VOLUNTARIO</th>
        <th>PRESTAMO EMPRESA</th>
        <th>CREDITO SOCIAL</th>
        <th>SEGURO DE VIDA</th>
        <th>IMPUESTO UNICO</th>
        <th>TOTAL  DESCUENTOS NO PREVISIONALES</th>
        <th>TOTAL IMPONIBLE</th>
        <th>TOTAL HABERES</th>
        <th>TOTAL DESCUENTOS LEGALES</th>
        <th>TOTAL DESCUENTOS</th>
        <th>RETENCION SII = SI</th>
        <th>RET. IMPUESTO SII (10%)</th>
        <th>TOT. HONORARIOS (Bruto)</th>
        <th>LIQUIDO A PAGO</th>
        <th>$ AFC EMPRESA</th>
        <th>$ SIS</th>
        <th>ACCIDENTES DEL TRABAJO</th>
        <th>COTIZACION OBLIGATORIA</th>
        <th>CODIGO MOVIMIENTO DEL PERSONAL</th>
    </tr> 
</thead>
<tbody>
    <? $total_imponible=0; $total_haberes=0; $total_descuentos_legales=0; $total_liquido=0; $total_descuentos=0; $ausencia_laboral=0; $anticipos=0;
    $count=1;
    foreach($empleado -> result() as $value){ ?>
 <tr>
    <td nowrap><?= $count; ?></td>
    <td nowrap><?= $value->rut ?></td>
    <? foreach($contratos -> result() as $val_con){ if($val_con->empleado==$value->rut){ ?>
    <td nowrap><? if($val_con->fecha_termino==null){ echo 'Indefinido'; }else{ echo $val_con->fecha_termino; } ?></td>
    <td nowrap><?= $value->nombres ?></td>
    <td nowrap><?= $value->apellido_paterno ?></td>
    <td nowrap><?= $value->apellido_materno ?></td>
    <td nowrap><?= $value->nacionalidad ?></td>
    <td nowrap><?= $val_con->tipo_contrato ?></td>
    <? } }
     foreach($liquidacion -> result() as $val_liq){ if($val_liq->empleado==$value->rut){ ?>
    <td nowrap><?= number_format($val_liq->sbase,0,",",".") ?></td>
    <td nowrap><?= number_format($val_liq->gratificacion,0,",",".") ?></td>
    <td nowrap>0</td>
    <td nowrap>0</td>
    <td nowrap><? if($val_liq->dntrabajados!=0){ echo 30-$val_liq->dntrabajados; }else{ echo '30'; } ?></td>
    <td nowrap><?= $val_liq->dntrabajados; ?></td>
    <td nowrap><? $calculo=$val_liq->sbase/30; if($val_liq->dntrabajados!=0){ echo number_format($val_liq->dntrabajados*$calculo,0,",","."); $ausencia_laboral=$ausencia_laboral+($val_liq->dntrabajados*$calculo);}else{ echo 0; }?></td>
    <? } } 
     foreach($detalle -> result() as $val_detalle){ if($val_detalle->empleado==$value->rut){?>
    <td nowrap><?= number_format($val_detalle->anticipo,0,",","."); $anticipos=$anticipos+$val_detalle->anticipo; ?></td>
    <td nowrap>0</td>
    <td nowrap><?= number_format($val_detalle->prestamo,0,",",".") ?></td>
    <td nowrap>0</td>
    <td nowrap>0</td>
    <td nowrap><?= number_format($val_detalle->impuesto,0,",","."); ?></td>
    <td nowrap><?= number_format($val_detalle->impuesto+$val_detalle->prestamo,0,",","."); ?></td>
    <td nowrap><?= number_format($val_detalle->total_imponible,0,",","."); $total_imponible=$total_imponible+$val_detalle->total_imponible; ?></td>
    <td nowrap><?= number_format($val_detalle->total_haberes,0,",","."); $total_haberes=$total_haberes+$val_detalle->total_haberes; ?></td>
    <td nowrap><?= number_format($val_detalle->descuentos_previsionales,0,",","."); $total_descuentos_legales=$total_descuentos_legales+$val_detalle->descuentos_previsionales; ?></td>
    <td nowrap><?= number_format($val_detalle->total_descuentos,0,",","."); $total_descuentos=$total_descuentos+$val_detalle->total_descuentos; ?></td>
    <td nowrap>&nbsp;</td>
    <td nowrap>&nbsp;</td>
    <td nowrap>&nbsp;</td>
    <td nowrap><?= number_format($val_detalle->total_liquido,0,",","."); $total_liquido=$total_liquido+$val_detalle->total_liquido; ?></td>
    <td nowrap>&nbsp;</td>
    <td nowrap>&nbsp;</td>
    <td nowrap>&nbsp;</td>
    <td nowrap>&nbsp;</td>
    <? } } ?>
    <td></td>
 </tr>
 <? $count=$count+1; } ?>
 <tr>
    <td nowrap></td>
    <td nowrap></td>
    <td nowrap></td>
    <td nowrap></td>
    <td nowrap></td>
    <td nowrap></td>
    <td nowrap></td>
    <td nowrap></td>
    <td nowrap></td>
    <td nowrap></td>
    <td nowrap></td>
    <td nowrap></td>
    <td nowrap><?= number_format($ausencia_laboral,0,",","."); ?></td>
    <td nowrap><?= number_format($anticipos,0,",","."); ?></td>
    <td nowrap></td>
    <td nowrap></td>
    <td nowrap></td>
    <td nowrap></td>
    <td nowrap></td>
    <td nowrap></td>
    <td nowrap><?= number_format($total_imponible,0,",","."); ?></td>
    <td nowrap><?= number_format($total_haberes,0,",","."); ?></td>
    <td nowrap><?= number_format($total_descuentos_legales,0,",","."); ?></td>
    <td nowrap><?= number_format($total_descuentos,0,",","."); ?></td>
    <td nowrap></td>
    <td nowrap></td>
    <td nowrap></td>
    <td nowrap><?= number_format($total_liquido,0,",","."); ?></td>
    <td nowrap></td>
    <td nowrap></td>
    <td nowrap></td>
    <td nowrap></td>
    <td></td>
 </tr>
</tbody>
</table>
</br></br>
*/ ?>