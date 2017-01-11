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
<link rel="icon" type="image/png" href="<?= base_url(); ?>application/img/favicon.png" />
<title>Informe Empleado</title>
</head>

<body>
<table width="100%" border="0">
  <tr>
    <td colspan="2" rowspan="8"><div class="pmo-pic">
                            <div class="p-relative">
                                    <? if($imagen!=NULL){ foreach($imagen-> result() as $valimg){ ?>
                                    <img class="img-responsive" src="<?= base_url(); ?>uploads/<?= $valimg->ruta ?>" alt="" width="150px" height="200px"> 
                                    <? } }else{ echo ''; }?>
                            </div>
                            
                        </div></td>
    <td height="55" colspan="3"><h2>Informacion Basica</h2></td>
  </tr>
  <? if($empleado!=NULL){ foreach($empleado -> result() as $value1){ ?>
  <tr>
    <td width="28%"></td>
    <td width="4%">&nbsp;</td>
    <td width="50%"></td>
  </tr>
  <tr>
    <td>Rut</td>
    <td>&nbsp;</td>
    <td><?= $value1->rut ?></td>
  </tr>
  <tr>
    <td>Nombre Completo</td>
    <td>&nbsp;</td>
    <td><?= $value1->nombres.' '.$value1->apellido_paterno.' '.$value1->apellido_materno; ?></td>
  </tr>
  <tr>
    <td>Genero</td>
    <td>&nbsp;</td>
    <td><?= $value1->sexo ?></td>
  </tr>
  <tr>
    <td>Fecha Nacimiento</td>
    <td>&nbsp;</td>
    <td><?= date("d-m-Y",strtotime($value1->fecha_nacimiento)) ?></td>
  </tr>
  <tr>
    <td>Nacionalidad</td>
    <td>&nbsp;</td>
    <td><?= $value1->nacionalidad ?></td>
  </tr>
  <tr>
    <td>Estado Civil</td>
    <td>&nbsp;</td>
    <td><?= $value1->estado_civil ?></td>
  </tr>
  <? } }else{ echo 'No existen datos.'; } ?>
  <tr>
    <td width="15%" height="46"><h3>Contacto</h3></td>
    <td width="2%">&nbsp;</td>
    <td colspan="3"><h2>Datos Personales</h2></td>
  </tr>
  <? if($personales!=NULL){ foreach($personales-> result() as $value2){ ?>
  <tr>
    <td><?= $value2->telefono ?></td>
    <td>&nbsp;</td>
    <td>Direccion</td>
    <td>&nbsp;</td>
    <td><?= $value2->direccion ?></td>
  </tr>
  <tr>
    <td><?= $value2->celular ?></td>
    <td>&nbsp;</td>
    <td>Comuna</td>
    <td>&nbsp;</td>
    <td><?= $value2->comuna ?></td>
  </tr>
  <tr>
    <td><?= $value2->email ?></td>
    <td>&nbsp;</td>
    <td>Ciudad</td>
    <td>&nbsp;</td>
    <td><?= $value2->ciudad ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Banco</td>
    <td>&nbsp;</td>
    <td><?= $value2->banco ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Cuenta</td>
    <td>&nbsp;</td>
    <td><?= $value2->cuenta ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Numero Cuenta</td>
    <td>&nbsp;</td>
    <td><?= $value2->ncuenta ?></td>
  </tr>
  <? } }else{ ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Sin datos</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <? } ?>
  <tr>
    <td height="38">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3"><h2>Contrato</h2></td>
  </tr>
  <? if($contrato!=NULL){ foreach($contrato-> result() as $value3){ ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Fecha de Inicio</td>
    <td>&nbsp;</td>
    <td><?= date("d-m-Y",strtotime($value3->fecha_contrato)) ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Termino de Contrato</td>
    <td>&nbsp;</td>
    <td><? if($value3->fecha_termino!=NULL){ echo date("d-m-Y",strtotime($value3->fecha_termino)); }else{ echo 'Vigente'; } ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Tipo de Contrato</td>
    <td>&nbsp;</td>
    <td><?= $value3->tipo_contrato ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Cargo</td>
    <td>&nbsp;</td>
    <td><?= $value3->cargo ?></td>
  </tr>
  <? } }else{ ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Sin datos</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <? } ?>
  <tr>
    <td height="43">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3"><h2>Prevision</h2></td>
  </tr>
  <? if($prevision!=NULL){ foreach($prevision-> result() as $value4){ ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Salud</td>
    <td>&nbsp;</td>
    <td><?= $value4->salud ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Afp</td>
    <td>&nbsp;</td>
    <td><?= $value4->afp ?></td>
  </tr>
  <? } }else{ ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Sin datos</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <? } ?>
</table>
</body>
</html>