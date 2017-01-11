function crearUf(){
	var uf1 = $('#uf1').val();
	var mes1 = $('#mes1').val();
	var year = $('#year').val();
 	 $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'uf1='+ uf1 + '&mes1='+ mes1 + '&year='+ year,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/phprevi/crearUf.php',
        success: function(data){
          if(data == 'Ingresado'){
          		$('#mensajeuf').html('<p class="alert alert-success">Registro Ingresado</p>');
          }else if(data == 'Actualizado'){
          		$('#mensajeuf').html('<p class="alert alert-success">Registro Actualizado</p>');   
          }else{
          		$('#mensajeuf').html('<p class="alert alert-danger">Intentalo mas Tarde.</p>'); 
          }
        }
      });
}
function crearUtm(){
	var valor = $('#utm').val();
  var mes1 = $('#mes1').val();
  var year = $('#year').val();
 	 $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'valor='+ valor + '&mes1='+ mes1 + '&year='+ year,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/phprevi/crearUtm.php',
        success: function(data){
          if(data == 'Ingresado'){
          $('#mensajeutm').html('<p class="alert alert-success">Registro Ingresado</p>');
            }else if(data == 'Actualizado'){
          $('#mensajeutm').html('<p class="alert alert-success">Registro Actualizado</p>');   
             }else{
          $('#mensajeutm').html('<p class="alert alert-danger">Intentalo mas Tarde.</p>'); 
             }
        }
      });
}
function crearRti(){
	var rti1 = $('#rti1').val();
	var rti2 = $('#rti2').val();
	var rti3 = $('#rti3').val();
  var mes1 = $('#mes1').val();
  var year = $('#year').val();
 	 $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'rti1='+rti1 + '&rti2='+ rti2 + '&rti3='+ rti3 + '&mes1='+ mes1 + '&year='+ year,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/phprevi/crearRti.php',
        success: function(data){
          if(data == 'Ingresado'){
          $('#mensajerti').html('<p class="alert alert-success">Registro Ingresado</p>');
            }else if(data == 'Actualizado'){
          $('#mensajerti').html('<p class="alert alert-success">Registro Actualizado</p>');   
             }else{
          $('#mensajerti').html('<p class="alert alert-danger">Intentalo mas Tarde.</p>'); 
             }
        }
      });
}
function crearRmi(){
	var rmi1 = $('#rmi1').val();
	var rmi2 = $('#rmi2').val();
	var rmi3 = $('#rmi3').val();
	var rmi4 = $('#rmi4').val();
  var mes1 = $('#mes1').val();
  var year = $('#year').val();
 	 $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'rmi1='+ rmi1 + '&rmi2='+ rmi2 + '&rmi3='+ rmi3 + '&rmi4='+ rmi4 + '&mes1='+ mes1 + '&year='+ year,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/phprevi/crearRmi.php',
        success: function(data){
          if(data == 'Ingresado'){
          $('#mensajermi').html('<p class="alert alert-success">Registro Ingresado</p>');
            }else if(data == 'Actualizado'){
          $('#mensajermi').html('<p class="alert alert-success">Registro Actualizado</p>');   
             }else{
          $('#mensajermi').html('<p class="alert alert-danger">Intentalo mas Tarde.</p>'); 
             }
        }
      });
}
function crearApv(){
	var apv1 = $('#apv1').val();
	var apv2 = $('#apv2').val();
  var mes1 = $('#mes1').val();
  var year = $('#year').val();
 	 $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'apv1='+apv1 + '&apv2='+ apv2 + '&mes1='+ mes1 + '&year='+ year,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/phprevi/crearApv.php',
        success: function(data){
          if(data == 'Ingresado'){
          $('#mensajeapv').html('<p class="alert alert-success">Registro Ingresado</p>');
            }else if(data == 'Actualizado'){
          $('#mensajeapv').html('<p class="alert alert-success">Registro Actualizado</p>');   
             }else{
          $('#mensajeapv').html('<p class="alert alert-danger">Intentalo mas Tarde.</p>'); 
             }
        }
      });
}
function crearDc(){
	var dc1 = $('#dc1').val();
  var mes1 = $('#mes1').val();
  var year = $('#year').val();
 	 $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'dc1='+dc1 + '&mes1='+ mes1 + '&year='+ year,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/phprevi/crearDc.php',
        success: function(data){
          if(data == 'Ingresado'){
          $('#mensajedc').html('<p class="alert alert-success">Registro Ingresado</p>');
            }else if(data == 'Actualizado'){
          $('#mensajedc').html('<p class="alert alert-success">Registro Actualizado</p>');   
             }else{
          $('#mensajedc').html('<p class="alert alert-danger">Intentalo mas Tarde.</p>'); 
             }
        }
      });
}
function crearSc(){
	var sce1 = $('#sce1').val();
	var sce2 = $('#sce2').val();
	var sce3 = $('#sce3').val();
	var sct1 = $('#sct1').val();
	var sct2 = $('#sct2').val();
	var sct3 = $('#sct3').val();
  var mes1 = $('#mes1').val();
  var year = $('#year').val();
 	 $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'sce1='+sce1 + '&sce2='+ sce2 + '&sce3='+ sce3 + '&sct1='+ sct1 + '&sct2='+ sct2 + '&sct3='+ sct3 + '&mes1='+ mes1 + '&year='+ year,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/phprevi/crearSc.php',
        success: function(data){
          if(data == 'Ingresado'){
          $('#mensajesc').html('<p class="alert alert-success">Registro Ingresado</p>');
            }else if(data == 'Actualizado'){
          $('#mensajesc').html('<p class="alert alert-success">Registro Actualizado</p>');   
             }else{
          $('#mensajesc').html('<p class="alert alert-danger">Intentalo mas Tarde.</p>'); 
             }
        }
      });
}
function crearAfp(){
	var afp1 = $('#afp1').val();
	var afp2 = $('#afp2').val();
	var afp3 = $('#afp3').val();
	var afp4 = $('#afp4').val();
	var afp5 = $('#afp5').val();
	var afp6 = $('#afp6').val();

	var tafpd1 = $('#tafpd1').val();
	var tafpd2 = $('#tafpd2').val();
	var tafpd3 = $('#tafpd3').val();
	var tafpd4 = $('#tafpd4').val();
	var tafpd5 = $('#tafpd5').val();
	var tafpd6 = $('#tafpd6').val();

	var sisd1 = $('#sisd1').val();
	var sisd2 = $('#sisd2').val();
	var sisd3 = $('#sisd3').val();
	var sisd4 = $('#sisd4').val();
	var sisd5 = $('#sisd5').val();
	var sisd6 = $('#sisd6').val();

	var tafpi1 = $('#tafpi1').val();
	var tafpi2 = $('#tafpi2').val();
	var tafpi3 = $('#tafpi3').val();
	var tafpi4 = $('#tafpi4').val();
	var tafpi5 = $('#tafpi5').val();
	var tafpi6 = $('#tafpi6').val();
  var mes1 = $('#mes1').val();
  var year = $('#year').val();

 	 $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'afp1='+afp1 + '&afp2='+ afp2 + '&afp3='+ afp3 + '&afp4='+ afp4 + '&afp5='+ afp5 + '&afp6='+ afp6 + '&tafpd1='+tafpd1 + '&tafpd2='+ tafpd2 + '&tafpd3='+ tafpd3 + '&tafpd4='+ tafpd4 + '&tafpd5='+ tafpd5 + '&tafpd6='+ tafpd6 + '&sisd1='+sisd1 + '&sisd2='+ sisd2 + '&sisd3='+ sisd3 + '&sisd4='+ sisd4 + '&sisd5='+ sisd5 + '&sisd6='+ sisd6 + '&tafpi1='+tafpi1 + '&tafpi2='+ tafpi2 + '&tafpi3='+ tafpi3 + '&tafpi4='+ tafpi4 + '&tafpi5='+ tafpi5 + '&tafpi6='+ tafpi6  + '&mes1='+ mes1 + '&year='+ year,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/phprevi/crearAfp.php',
        success: function(data){
          if(data == 'Ingresado'){
          $('#mensajeafp').html('<p class="alert alert-success">Registro Ingresado</p>');
            }else if(data == 'Actualizado'){
          $('#mensajeafp').html('<p class="alert alert-success">Registro Actualizado</p>');   
             }else{
          $('#mensajeafp').html('<p class="alert alert-danger">Intentalo mas Tarde.</p>'); 
             }
        }
      });
}
function crearAf(){
	var monto1 = $('#monto1').val();
	var monto2 = $('#monto2').val();
	var monto3 = $('#monto3').val();
	var monto4 = $('#monto4').val();
  var mes1 = $('#mes1').val();
  var year = $('#year').val();
	
 	 $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'monto1='+ monto1 + '&monto2='+ monto2 + '&monto3='+ monto3 + '&monto4='+ monto4 + '&mes1='+ mes1 + '&year='+ year,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/phprevi/crearAf.php',
        success: function(data){
          if(data == 'Ingresado'){
          $('#mensajeaf').html('<p class="alert alert-success">Registro Ingresado</p>');
            }else if(data == 'Actualizado'){
          $('#mensajeaf').html('<p class="alert alert-success">Registro Actualizado</p>');   
             }else{
          $('#mensajeaf').html('<p class="alert alert-danger">Intentalo mas Tarde.</p>'); 
             }
        }
      });
}
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
function crearImpuesto(){
  var mes1 = $('#mes1').val();
  var year = $('#year').val(); 

  var im_desde1 = $('#im_desde1').val();
  var im_hasta1 = $('#im_hasta1').val();
  var im_factor1 = $('#im_factor1').val();
  var im_descuento1 = $('#im_descuento1').val();

  var im_desde2 = $('#im_desde2').val();
  var im_hasta2 = $('#im_hasta2').val();
  var im_factor2 = $('#im_factor2').val();
  var im_descuento2 = $('#im_descuento2').val();

  var im_desde3 = $('#im_desde3').val();
  var im_hasta3 = $('#im_hasta3').val();
  var im_factor3 = $('#im_factor3').val();
  var im_descuento3 = $('#im_descuento3').val();

   $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'im_desde1='+ im_desde1 + '&im_hasta1='+ im_hasta1 + '&im_factor1='+ im_factor1 + '&im_descuento1='+ im_descuento1 + '&im_desde2='+ im_desde2 + '&im_hasta2='+ im_hasta2 + '&im_factor2='+ im_factor2 + '&im_descuento2='+ im_descuento2 + '&im_desde3='+ im_desde3 + '&im_hasta3='+ im_hasta3 + '&im_factor3='+ im_factor3 + '&im_descuento3='+ im_descuento3 + '&mes1='+ mes1 + '&year='+ year,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/phprevi/crearImpuesto.php',
        success: function(data){
          if(data == 'Ingresado'){
          $('#mensajeimpuesto').html('<p class="alert alert-success">Registro Ingresado</p>');
            }else if(data == 'Actualizado'){
          $('#mensajeimpuesto').html('<p class="alert alert-success">Registro Actualizado</p>');   
             }else{
          $('#mensajeimpuesto').html('<p class="alert alert-danger">Intentalo mas Tarde.</p>'); 
             }
        }
      });
}
function EliminarDuplicados(){
  $.ajax({
        type: 'POST',
        dataType: 'json',
       url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/phprevi/EliminarDuplicados_php.php',
        success: function(data){
          if(data == 'Eliminado'){
          $('#mensajeEliminado').html('<p class="alert alert-success">Bd Limpiada</p>');
            }else{
          $('#mensajeimpuesto').html('<p class="alert alert-danger">Intentalo mas Tarde.</p>'); 
             }
        }
      });
}