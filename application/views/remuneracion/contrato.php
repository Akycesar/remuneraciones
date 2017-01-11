<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contrato Normal</title>
<script type="text/javascript">
function imprSelec(nombre) {
    ////////
      var ficha = document.getElementById(nombre);
      var ventimp = window.open(' ', 'popimpr');
      ventimp.document.write( ficha.innerHTML );
      ventimp.document.close();
      ventimp.print( );
      ventimp.close();
    } 
</script>
</head>

<body>
<div id="muestra">
<table cellspacing="0" cellpadding="0" hspace="0" vspace="0" width="100%">
  <tr>
    <td valign="top" align="left"><p align="center"><strong><u>CONTRATO DE TRABAJO </u></strong></p></td>
  </tr>
</table>
<p>&nbsp; </p>

<div>
  <table cellspacing="0" cellpadding="0" hspace="0" vspace="0" width="100%">
    <tr>
      <td valign="top" align="left"><p><br />
        Hoy: <?= date('d-m-Y'); ?> entre el trabajador <strong><?= $sr.' '.$nombre; ?></strong> Nacionalidad: <?= $nacionalidad; ?>, Estado Civil: <?= $estadocivil; ?>, Rut: <strong><?= $rut; ?></strong>, Fecha de Nacimiento: <?= $fnacimiento; ?>, Domicilio, , y el Empleador:., RUT:, Domiciliado en N, se ha    establecido lo siguiente: </p>
        <p>&nbsp;</p></td>
    </tr>
  </table>
</div>
<div>
  <table cellspacing="0" cellpadding="0" hspace="0" vspace="0" width="100%" height="656">
    <tr>
      <td valign="top" align="left"><p>1.- El trabajador se    compromete a ejecutar la labor de. En la sección o en cualquier otro lugar en que la Empresa tenga un establecimiento o faena, que ahora está ubicada en el    siguiente lugar de trabajo : 2.- La jornada de trabajo será la siguiente: </p>
        <p>2.- El horario será de: <?= $horario ?> con 1 Hora de Colacion.</p>
        <p>3.- El sueldo base mensual será de <?= '$'.' '.number_format($sueldo)?>.-</p>
        <p>4.- Se deja constancia que el Empleado Sr(a entró a nuestro servicio el <?= $fecha_contrato ?></p>
        <p>5.- El 25 % de gratificación se pagará en 12 cuotas mensuales.</p>
        <p>6.- La Remuneración se cancelará Mensualmente por períodos vencidos, los 05 de cada mes, en dinero efectivo con moneda Nacional y del monto de ellas el Empleador hará las deducciones que establecen las leyes vigentes.</p>
        <p>7.- El presente contrato tendrá una duración hasta término de obra o faena. No obstante, este contrato caduca al no cumplir con las estipulaciones del mismo y cuando concurran para ello causas justificadas en conformidad a las leyes vigentes, o sea permitido    dar al empleado el aviso de desahucio con a lo menos 30 días de anticipación.</p>
        <p>8- Todas las clausulas tipificadas en el reglamento interno de Orden, Higiene y Seguridad de SERVICIOS FACILITADOS E.I.R.L., pasan a ser parte integra del Contrato de Trabajo.</p>
        <p>9.- El presente contrato se firma en dos ejemplares, quedando uno en poder del trabajador y otro en poder de la empresa SERVICIOS FACILITADOS E.I.R.L.</p></td>
    </tr>
  </table>
</div>
<div>
  <table cellspacing="0" cellpadding="0" hspace="0" vspace="0" width="100%" height="87">
    <tr>
      <td width="47%" align="left" valign="top"><p align="center">________________________________</p>
      <p align="center">Firma    Trabajador </p></td>
      <td width="53%" align="left" valign="top"><div align="center">
        <p>________________________________</p>
        <p>Firma Empleador <br />
          SERVICIOS FACILITADOS  E.I.<br />
          76175996-5</p>
      </div></td>
    </tr>
  </table>
</div>
<div></div>
<div>
  <table cellspacing="0" cellpadding="0" hspace="0" vspace="0" width="100%" height="69">
    <tr>
      <td valign="top" align="left"><p>Entre las partes arriba    individualizadas que fijan su domicilio en la ciudad de CHILLAN, donde se  suscribe el presente contrato de trabajo.</p></td>
    </tr>
  </table>
</div>
</div>
<center><button class="btn btn-primary" onClick="javascript:imprSelec('muestra')"> Imprimir </button></center>
</body>
</html>
