function calcularTope(){
  var sbase = $('#sueldo_base').val();
  var rmi1 = $('#rmi1').val();
  var ctsbase = parseInt(sbase * 0.25);
  var ctsminimo = parseInt((rmi1 * 4.75)/12);
  if(ctsbase>ctsminimo){ 
      $('#gratificacion').val(ctsminimo);
  }else{
      $('#gratificacion').val(ctsbase);
  }
}
function getLiq(){
	var empleado = $("select[name=empleado]").val();
	var mes = $("select[name=mes]").val();
	var year = $("select[name=year]").val();
	if(empleado.length>0){
	$.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'empleado='+empleado + '&mes='+ mes + '&year='+ year,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/php/recuperarLiquidacion.php',
        success: function(data){
          $('#mensajebusc').html('');
          
          	$('#sueldo_base').val(data.sbase);
			$('#imsegces').val(data.imsegces);
			$('#imsis').val(data.imsis);
			$('#colacion').val(data.colacion);
			$('#dntrabajados').val(data.dntrabajados);
			$("select[name=tsueldo]").val(data.tipo_sueldo);
			$('#gratificacion').val(data.gratificacion);
			$('#aguinaldo').val(data.aguinaldo);
			$('#comision').val(data.comision);
			$('#mret').val(data.mret);
			$('#movilizacion').val(data.movilizacion);
			$('#lxemp').val(data.dxlic);
			$('#dmensuales').val(data.dias_mensuales);
			$('#hsemanales').val(data.horas_semanales);
			$('#dsemanales').val(data.dias_semanales);
			$('#atrasos').val(data.atrasos);
			$('#hextra5').val(data.h_ext5);
			$('#hextra10').val(data.h_ext10);
			$('#monto').val(data.monto);
			$("select[name=tramo]").val(data.tramo);
			$('#familiares').val(data.fam);
			$('#maternales').val(data.mat);
			$('#invalidas').val(data.inva);

          $('#bt0').removeAttr('disabled');
          $('#bt1').removeAttr('disabled');
          $('#bt2').removeAttr('disabled');
          $('#bt3').removeAttr('disabled');
          $('#bt4').removeAttr('disabled');
          $('#bt5').removeAttr('disabled');
        }
      });
  }else{
      $('#mensajebusc').html('<p class="alert alert-danger">Seleccione un Empleado.</p>');
    }
}
function getUlLiq(){
  var empleado = $("select[name=empleado]").val();
  if(empleado.length>0){
  $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'empleado='+empleado + '&mes='+ mes + '&year='+ year,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/php/recuperarUltimaLiquidacion.php',
        success: function(data){
          $('#mensajebusc').html('');
          
            $('#sueldo_base').val(data.sbase);
      $('#imsegces').val(data.imsegces);
      $('#imsis').val(data.imsis);
      $('#colacion').val(data.colacion);
      $('#dntrabajados').val(data.dntrabajados);
      $("select[name=tsueldo]").val(data.tipo_sueldo);
      $('#gratificacion').val(data.gratificacion);
      $('#aguinaldo').val(data.aguinaldo);
      $('#comision').val(data.comision);
      $('#mret').val(data.mret);
      $('#movilizacion').val(data.movilizacion);
      $('#lxemp').val(data.dxlic);
      $('#dmensuales').val(data.dias_mensuales);
      $('#hsemanales').val(data.horas_semanales);
      $('#dsemanales').val(data.dias_semanales);
      $('#atrasos').val(data.atrasos);
      $('#hextra5').val(data.h_ext5);
      $('#hextra10').val(data.h_ext10);
      $('#monto').val(data.monto);
      $("select[name=tramo]").val(data.tramo);
      $('#familiares').val(data.fam);
      $('#maternales').val(data.mat);
      $('#invalidas').val(data.inva);

          $('#bt0').removeAttr('disabled');
          $('#bt1').removeAttr('disabled');
          $('#bt2').removeAttr('disabled');
          $('#bt3').removeAttr('disabled');
          $('#bt4').removeAttr('disabled');
          $('#bt5').removeAttr('disabled');
        }
      });
  }else{
      $('#mensajebusc').html('<p class="alert alert-danger">Seleccione un Empleado.</p>');
    }
}
function setLiq(){
	var sbase = $('#sueldo_base').val();
	var imsegces = $('#imsegces').val();
	var imsis = $('#imsis').val();
	var colacion = $('#colacion').val();
	var dntrabajados = $('#dntrabajados').val();
	var tipo_sueldo = $("select[name=tsueldo]").val();
	var gratificacion = $('#gratificacion').val();
	var aguinaldo = $('#aguinaldo').val();
	var comision = $('#comision').val();
	var mret = $('#mret').val();
	var movilizacion  =$('#movilizacion').val();
	var dxlic = $('#lxemp').val();
	var dias_mensuales = $('#dmensuales').val();
	var horas_semanales = $('#hsemanales').val();
	var dias_semanales = $('#dsemanales').val();
	var atrasos  =$('#atrasos').val();
	var h_ext5 = $('#hextra5').val();
	var h_ext10 = $('#hextra10').val();
	var monto = $('#monto').val();
	var tramo = $("select[name=tramo]").val();
	var fam = $('#familiares').val();
	var mat = $('#maternales').val();
	var inva = $('#invalidas').val();
	var empleado = $("select[name=empleado]").val();
	var mes = $("select[name=mes]").val();
	var year = $("select[name=year]").val();
	var empresa = $('#rut_empresa').val();
  if(empleado.length>0){
    if(sbase.length>2){
    $.ajax({
    	type: 'POST',
        dataType: 'json',
        data: 'sbase='+sbase + '&imsegces='+ imsegces + '&imsis='+ imsis + '&colacion='+ colacion + '&dntrabajados='+ dntrabajados + '&tipo_sueldo='+ tipo_sueldo + '&gratificacion='+ gratificacion + '&aguinaldo='+ aguinaldo + '&comision='+ comision + '&mret='+ mret + '&movilizacion='+ movilizacion + '&dxlic='+ dxlic + '&dias_mensuales='+ dias_mensuales + '&horas_semanales='+ horas_semanales + '&dias_semanales='+ dias_semanales + '&atrasos='+ atrasos + '&h_ext5='+ h_ext5 + '&h_ext10='+ h_ext10 + '&monto='+ monto + '&tramo='+ tramo + '&fam='+ fam + '&mat='+ mat + '&inva='+ inva + '&empleado='+ empleado + '&mes='+ mes + '&year='+ year + '&empresa='+ empresa,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/php/crearLiquidacion.php',
        success: function(data){
        $('#mensaje').html('');
          if(data == 'Ingresado'){
          			$('#mensaje').html('<p class="alert alert-success">Liquidacion Ingresada</p>');
            }else if(data == 'Actualizado'){
          			$('#mensaje').html('<p class="alert alert-success">Liquidacion Actualizada</p>');   
             }else{
          			$('#mensaje').html('<p class="alert alert-danger">Intentalo mas Tarde.</p>'); 
           }
          $('#bt0').removeAttr('disabled');
          $('#bt1').removeAttr('disabled');
          $('#bt2').removeAttr('disabled');
          $('#bt3').removeAttr('disabled');
          $('#bt4').removeAttr('disabled');
          $('#bt5').removeAttr('disabled');
        }
    });
}else{ $('#mensaje').html('<p class="alert alert-danger">Ingrese el Sueldo Base.</p>'); }
}else{ $('#mensaje').html('<p class="alert alert-danger">Seleccione el Empleado.</p>'); }
	
}
function getPrev(){
    var rut = $('#empleado').val();
      $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'rut='+rut,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/php/recuperarPrevision.php',
        success: function(data){
          $('#mensajepre').html('');
          $("select[name=salud]").append('<option value="" selected></option>');
          $("select[name=afp]").append('<option value="" selected></option>');
          $('#pensionado').removeAttr('checked');
          $('#cuota').val('');
          if(data == 'No existe'){

          }else{
          //prevision
          $("select[name=salud]").append('<option value="' + data.salud + '" selected>'+ data.salud + '</option>');
          $("select[name=afp]").append('<option value="' + data.afp + '" selected>'+ data.afp + '</option>');
          $('#cuota').val(data.cuota);
          }
        }
      });
  }
  function crearAnticipo(){
    var descripcion = $('#descripcion_ant').val();
    var monto = $('#monto_ant').val();
    var empleado = $('#empleado').val();
    var mes = $('#mes').val();
    var year = $('#year').val();
     $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'descripcion='+descripcion + '&monto='+ monto + '&empleado='+ empleado + '&mes='+ mes + '&year='+ year,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/php/crearAnticipo.php',
        success: function(data){
          $('#mensajeant').html('');
            if(data == 'Ingresado'){
          $('#mensajeant').html('<p class="alert alert-success">Registro Ingresado</p>');
            }else if(data == 'Actualizado'){
          $('#mensajeant').html('<p class="alert alert-success">Registro Actualizado</p>');   
             }else{
          $('#mensajeant').html('<p class="alert alert-danger">Intentalo mas Tarde.</p>'); 
             }
        }
      });
  }
  function crearPrestamo(){
    var descripcion = $('#descripcion_prestamo').val();
    var monto = $('#monto_prestamo').val();
    var empleado = $('#empleado').val();
    var mes = $('#mes').val();
    var year = $('#year').val();
     $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'descripcion='+descripcion + '&monto='+ monto + '&empleado='+ empleado + '&mes='+ mes + '&year='+ year,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/php/crearPrestamo.php',
        success: function(data){
          $('#mensajeprestamo').html('');
            if(data == 'Ingresado'){
          $('#mensajeprestamo').html('<p class="alert alert-success">Registro Ingresado</p>');
            }else if(data == 'Actualizado'){
          $('#mensajeprestamo').html('<p class="alert alert-success">Registro Actualizado</p>');   
             }else{
          $('#mensajeprestamo').html('<p class="alert alert-danger">Intentalo mas Tarde.</p>'); 
             }
        }
      });
  }
  function crearBono(){
    var tipo = $("select[name=tipo_bono]").val();
    var descripcion = $('#descripcion_bono').val();
    var monto = $('#monto_bono').val();
    var estado = $("select[name=estado_bono]").val();
    var empleado = $('#empleado').val();
    var mes = $('#mes').val();
    var year = $('#year').val();
     $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'tipo='+tipo +'&descripcion='+descripcion + '&monto='+ monto + '&estado='+ estado + '&empleado='+ empleado + '&mes='+ mes + '&year='+ year,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/php/crearBono.php',
        success: function(data){
          $('#mensajebono').html('');
            if(data == 'Ingresado'){
          $('#mensajebono').html('<p class="alert alert-success">Registro Ingresado</p>');
            }else if(data == 'Actualizado'){
          $('#mensajebono').html('<p class="alert alert-success">Registro Actualizado</p>');   
             }else{
          $('#mensajebono').html('<p class="alert alert-danger">Intentalo mas Tarde.</p>'); 
             }
        }
      });
  }
  function crearDescuento(){
    var descripcion = $('#descripcion_descuento').val();
    var monto = $('#monto_descuento').val();
    var empleado = $('#empleado').val();
    var mes = $('#mes').val();
    var year = $('#year').val();
     $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'descripcion='+descripcion + '&monto='+ monto + '&empleado='+ empleado + '&mes='+ mes + '&year='+ year,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/php/crearDescuento.php',
        success: function(data){
          $('#mensajedes').html('');
            if(data == 'Ingresado'){
          $('#mensajedes').html('<p class="alert alert-success">Registro Ingresado</p>');
            }else if(data == 'Actualizado'){
          $('#mensajedes').html('<p class="alert alert-success">Registro Actualizado</p>');   
             }else{
          $('#mensajedes').html('<p class="alert alert-danger">Intentalo mas Tarde.</p>'); 
             }
        }
      });
  }
  function crearCpro(){
    var descripcion = $('#descripcion_cretro').val();
    var monto = $('#monto_cretro').val();
    var empleado = $('#empleado').val();
    var mes = $('#mes').val();
    var year = $('#year').val();
     $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'descripcion='+descripcion + '&monto='+ monto + '&empleado='+ empleado + '&mes='+ mes + '&year='+ year,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/php/crearCretro.php',
        success: function(data){
          $('#mensajecretro').html('');
            if(data == 'Ingresado'){
          $('#mensajecretro').html('<p class="alert alert-success">Registro Ingresado</p>');
            }else if(data == 'Actualizado'){
          $('#mensajecretro').html('<p class="alert alert-success">Registro Actualizado</p>');   
             }else{
          $('#mensajecretro').html('<p class="alert alert-danger">Intentalo mas Tarde.</p>'); 
             }
        }
      });
  }
  
function getAnticipo(){
    var empleado = $('#empleado').val();
    var mes = $('#mes').val();
    var year = $('#year').val();
      $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'empleado='+empleado + '&mes='+mes + '&year='+year,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/php/recuperarAnticipo.php',
        success: function(data){
          $('#descripcion_ant').val(data.descripcion);
          $('#monto_ant').val(data.monto);
          $('#btnelAnt').removeAttr('disabled');
        }
      });
}
function getPrestamo(){
    var empleado = $('#empleado').val();
    var mes = $('#mes').val();
    var year = $('#year').val();
      $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'empleado='+empleado + '&mes='+mes + '&year='+year,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/php/recuperarPrestamo.php',
        success: function(data){
          $('#descripcion_prestamo').val(data.descripcion);
          $('#monto_prestamo').val(data.monto);
          $('#btnelPres').removeAttr('disabled');
        }
      });
}
function getBono(){
    var empleado = $('#empleado').val();
    var mes = $('#mes').val();
    var year = $('#year').val();
      $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'empleado='+empleado + '&mes='+mes + '&year='+year,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/php/recuperarBono.php',
        success: function(data){
          $('#descripcion_bono').val(data.descripcion);
          $('#monto_bono').val(data.monto);
          $("select[name=estado_bono]").append('<option value="' + data.estado+ '" selected>'+ data.estado+ '</option>');
          $('#btnelBono').removeAttr('disabled');
        }
      });
}
function getDesc(){
    var empleado = $('#empleado').val();
    var mes = $('#mes').val();
    var year = $('#year').val();
      $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'empleado='+empleado + '&mes='+mes + '&year='+year,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/php/recuperarDescuento.php',
        success: function(data){
          $('#descripcion_descuento').val(data.descripcion);
          $('#monto_descuento').val(data.monto);
          $('#btnelDesc').removeAttr('disabled');
        }
      });
}
function getCretro(){
    var empleado = $('#empleado').val();
    var mes = $('#mes').val();
    var year = $('#year').val();
      $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'empleado='+empleado + '&mes='+mes + '&year='+year,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/php/recuperarCretro.php',
        success: function(data){
          $('#descripcion_cretro').val(data.descripcion);
          $('#monto_cretro').val(data.monto);
          $('#btnelCret').removeAttr('disabled');
        }
      });
}
function eliminarD(dato){
  var dato = dato;
  var mes=$('#mes').val();
  var year=$('#year').val();
  var empleado=$('#empleado').val();
    $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'empleado='+empleado + '&mes='+mes + '&year='+year + '&dato='+dato,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/php/eliminardato.php',
        success: function(data){
          if(data == 'anticipo'){
              $('#mensajeant').html('<p class="alert alert-success">Registro Eliminado</p>');
          }else if(data == 'prestamo'){
              $('#mensajeprestamo').html('<p class="alert alert-success">Registro Eliminado</p>');
          }else if(data == 'bono'){
              $('#mensajebono').html('<p class="alert alert-success">Registro Eliminado</p>');
          }else if(data == 'descuento'){
              $('#mensajedes').html('<p class="alert alert-success">Registro Eliminado</p>');
          }else if(data == 'cargas'){
              $('#mensajecretro').html('<p class="alert alert-success">Registro Eliminado</p>');            
          }
        }
      });
}