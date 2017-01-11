<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <style type="text/css">
        body {
    font: 14px "Lucida Grande", "Trebuchet MS", Verdana, sans-serif;
    color: #3b3b3b;
}

h1,h2 {
    font-family: Georgia;
}

h1 {
    border-bottom: 3px solid #aaa;
    background-color: #3b3b3b;
    color: #ddd;
    padding: 5px;   
}

h2 {
    border-top: 1px solid #ccc;
    border-bottom: 1px solid #ccc;
    background-color: #DDD;
    padding-left: 5px;
    margin: 0 0 0 -15px;
    font-weight: normal;
}

.secao {
    background-color: #eee;

    padding-left: 15px;
    
    border: #ccc 1px dotted;
    
    margin-top: 1em;
}

a {
    text-decoration:none;
    color: #f33;
}

a:visited {
    text-decoration:none;
    color: #700;
}

a:hover {
    text-decoration:none;
    color: #fa0;
}

#menu {
    margin: 0;
}

#menu ul, #menu li {
    display: inline;
    list-style-type: none;
    margin: 0;
    padding: 0;
}

#menu .ativo {
    background-color: #ddd;
}

.vcard {
    padding: 5px;
}

.url, .email {
    display: block;
}

.email:after {
    content: url('img/mail.png');
    margin-left:0.3em;
}

.url:after {
    content: url('img/url.png');
    margin-left:0.3em;
}



.photo {
    float: right;
    margin-right: 5em;
    border: #fff 1em solid;
    
    -webkit-box-shadow: 0px 0px 5px 5px #191b30;
    -moz-box-shadow: 0px 0px 5px 5px #191b30;
    box-shadow: 0px 0px 5px 5px #191b30;
}

#footnote {
    border-top: 1px dashed #aaa;
    padding: 5px;
    font: 75% "Lucida Grande", "Trebuchet MS", Verdana, sans-serif;
    
}
table {border-collapse:collapse}
#footnote li {
    list-style-type: none;
    margin-top: 3px;
}

fieldset {
    border: #ccc 1px dotted;
    margin-top: 1em;
}

label {
    font-weight: bold;
    margin-right: 10px;
    width: 15em;
}

label:after {
    content: ":";
}

form label {
    display: block;
}

input, textarea {
    border: #669 2px solid;
    display: block;
    width: 30em;
}

input[type=submit] {
    border: #bbb 1px solid;
    margin-top: 0.5em;
}
</style>
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

<body>
<?= $rs.'<br>'.$rut_empresa.'<br>'.$direccion ?>
<table width="100%" border="1" >
  <tr>
    <td><table width="100%" border="0">
      <tr>
        <td width="20%">&nbsp;</td>
        <td width="62%" align="center" bgcolor="#993399"><font style="color:white">LIQUIDACION DE SUELDO MENSUAL</font></td>
        <td width="18%">&nbsp;</td>
      </tr>
    </table>
    <br>
    <? foreach ($empleado -> result() as $value) { ?>
      <table width="100%" border="0">
        <tr>
          <td>DATOS DEL TRABAJADOR</td>
        </tr>
        <tr>
          <td><br><table width="100%" border="0">
            <tr>
              <td colspan="2" bgcolor="#E0DEDE"><p>RUT: <?= $value->rut ?></p>
                <p>NOMBRE: <?= $value->nombres.' '.$value->apellido_paterno.' '.$value->apellido_materno ?></p></td>
            </tr>
          </table><? } ?></td>
        </tr>
      </table>
    </br></br>
      <table width="100%" border="0">
        <tr>
          <td width="24%" bgcolor="#E0DEDE">Periodo de Remuneración</td>
          <td width="7%" bgcolor="#E0DEDE">Mes</td>
          <td width="16%" bgcolor="#E0DEDE">: <?= $mes ?> </td>
          <td width="7%" bgcolor="#E0DEDE">Año</td>
          <td width="46%" bgcolor="#E0DEDE">: <?= $year ?></td>
        </tr>
      </table>
      <br>
      <table width="100%" border="0">
        <tr>
          <td>DETALLE DE REMUNERACION</td>
        </tr>
      </table>
      <br>
      <table width="100%" border="1">
        <tr>
          <td scope="col"><table width="100%" border="0">
        <tr>
          <th width="75%" align="left" bgcolor="#CEDAFF" scope="col">Haberes del Trabajador</th>
          <th width="3%" align="left" bgcolor="#CEDAFF" scope="col">&nbsp;</th>
          <th width="22%" align="left" bgcolor="#CEDAFF" scope="col">Valor</th>
        </tr>
        <tr>
          <td align="left">Sueldo Base</td>
          <td align="left"> $</td>
          <td align="left"><?= number_format($sbase,0,",",".") ?></td>
        </tr>
        <? if($dntrabajados>0){ ?>
        <tr>
          <td align="left">Dias no Trabajados (<?= $dntrabajados ?> )</td>
          <td align="left">($</td>
          <td align="left"><?= number_format($tot_dntrab,0,",",".") ?>)</td>
        </tr>
        <? } ?>
        <tr>
          <td align="left">Gratificacion</td>
          <td align="left"> $</td>
          <td align="left"><?= number_format($gratificacion,0,",",".") ?></td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td align="left">&nbsp;</td>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td align="left">Total Remuneración Imponible</td>
          <td align="left"> $</td>
          <td align="left"><?= number_format($total_imponible,0,",",".") ?></td>
        </tr>
        <? if($cargas>0){ ?>
        <tr>
          <td align="left">Asignacion Familiar</td>
          <td align="left"> $</td>
          <td align="left"><?= number_format($cargas,0,",",".") ?></td>
        </tr>
        <? } ?>
        <? if($aguinaldo>0){ ?>
        <tr>
          <td align="left">Aguinaldo</td>
          <td align="left"> $</td>
          <td align="left"><?= number_format($aguinaldo,0,",",".") ?></td>
        </tr>
        <? } ?>
        <? if($movilizacion>0){ ?>
        <tr>
          <td align="left">Movilización</td>
          <td align="left"> $</td>
          <td align="left"><?= number_format($movilizacion,0,",",".") ?></td>
        </tr>
        <? } ?>
        <tr>
          <td align="left">&nbsp;</td>
          <td align="left">&nbsp;</td>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" bgcolor="#FFFF99">Total Haberes </td>
          <td align="left" bgcolor="#FFFF99"> $</td>
          <td align="left" bgcolor="#FFFF99"><?= number_format($total_haberes,0,",",".") ?></td>
        </tr>
      </table></td>
        </tr>
      </table>
      <br><table width="100%" border="1">
        <tr>
          <td scope="col"><table width="100%" border="0">
            <tr>
              <th width="42%" align="left" bgcolor="#CEDAFF" scope="col">Descuentos</th>
              <th width="33%" align="left" bgcolor="#CEDAFF" scope="col">&nbsp;</th>
              <th width="3%" align="left" bgcolor="#CEDAFF" scope="col">&nbsp;</th>
              <th width="22%" align="left" bgcolor="#CEDAFF" scope="col">Valor</th>
            </tr>
            <tr>
              <td align="left">Cotizacion Previsional <?= $afp.' '.'('.$tasa.'%)';?></td>
              <td align="left"><? if($total_imponible>$tope_imponible){ echo 'Tope Imponible: '.$tope_imponible; } ?></td>
              <td align="left">$</td>
              <td align="left"><?= number_format(round($total_valor_afp),0,",","."); ?></td>
            </tr>
            <tr>
              <td align="left">Cotizacion Salud <? if($salud=='Fonasa'){echo '('.$salud.' '.'7%)'; }else{ echo $salud.' '.'('.$cuota.' UF)'; } ?></td>
              <td align="left"></td>
              <td align="left">$</td>
              <td align="left"><?= number_format($total_valor_salud,0,",",".") ?></td>
            </tr>
            <? if($adicional>0){ ?>
            <tr>
              <td align="left">Adicional </td>
              <td align="left">&nbsp;</td>
              <td align="left">$</td>
              <td align="left"><?= number_format($adicional,0,",",".") ?></td>
            </tr>
            <? } ?>
            <? if($cesantia>0){ ?>
            <tr>
              <td align="left">Seguro de cesantia 0.6%</td>
              <td align="left">&nbsp;</td>
              <td align="left">$</td>
              <td align="left"><?= number_format($cesantia,0,",",".") ?></td>
            </tr>
            <? } ?>
            <tr>
              <td align="left">&nbsp;</td>
              <td align="left">&nbsp;</td>
              <td align="left">&nbsp;</td>
              <td align="left">&nbsp;</td>
            </tr>
            <tr>
              <td align="left" bgcolor="#FFFF99">Total Descuentos Previsionales</td>
              <td align="left" bgcolor="#FFFF99">&nbsp;</td>

              <td align="left" bgcolor="#FFFF99">$</td>
              <td align="left" bgcolor="#FFFF99"><?= number_format($total_descuentos,0,",",".") ?></td>
            </tr>
          </table></td>
        </tr>
      </table>
      <br>
      <? if($prestamo>0){ ?>
      <table width="100%" border="1">
        <tr>
          <td height="60" scope="col"><table width="100%" border="0">
            
            <tr>
              <td align="left">Otros Descuentos (<?= $detalle_prestamo ?>)</td>
              <td align="left">$</td>
              <td align="left"><?= number_format($prestamo,0,",",".") ?></td>
            </tr>
            <tr>
              <td align="left" bgcolor="#FFFF99">Total Descuentos</td>
              <td align="left" bgcolor="#FFFF99">$</td>
              <td align="left" bgcolor="#FFFF99"><?= number_format($prestamo,0,",",".") ?></td>
            </tr>
          </table><? } ?></td>
        </tr>
      </table>
      <table width="100%" border="0">
        <tr>
          <td height="80" scope="col"><table width="100%" height="71" border="0">
            <tr>
              <td width="51%" align="left">&nbsp;</td>
              <td width="33%" align="left">ALCANCE LIQUIDO </td>
              <td width="1%" align="left">$</td>
              <td width="15%" align="left"><?= number_format($alcance_liquido,0,",",".") ?></td>
            </tr>
            <? if($anticipo>0){ ?>
            <tr>
              <td height="21" align="right">&nbsp;</td>
              <td align="left">ANTICIPOS O PRESTAMOS </td>
              <td align="left">$</td>
              <td align="left"><?= number_format($anticipo,0,",",".") ?></td>
            </tr>
            <? } ?>
            <tr>
              <td height="21" align="right">&nbsp;</td>
              <td align="left"><strong>SALDO LIQUIDO A PAGAR</strong></td>
              <td align="left"><strong>$</strong></td>
              <td align="left"><strong>
              <?= number_format($total_liquido,0,",",".") ?>
              </strong></td>
            </tr>
          </table></td>
        </tr>
      </table>

    <p>&nbsp;</p>
    <strong>Certifico que he recibido de mi Empleador Sr (a)</strong>: <?= $rs ?>, a mi total satisfaccion el saldo liquido indicado en la presente liquidacion, sin tener cargo ni cobro posterior alguno que hacer, por los conceptos de esta liquidacion.
  <hr>
  <p>Fecha: <?= date('d-m-Y'); ?></p>
    <table width="100%" border="0">
      <tr>
        <th width="36%" scope="col">&nbsp;</th>
        <th width="25%" scope="col">&nbsp;</th>
        <th width="39%" scope="col"><p>_______________________________</p>
          <p>Firma del Trabajador</p></th>
      </tr>
  </table>
    <p>&nbsp;</p></td>
    
  </tr>
</table>
</body>
</html>
