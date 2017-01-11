function buscar(){
	var rut = $('#rut').val();
  var url = 'http://remuneracion.ingetecservice.cl/remuneracion/uploads/thumbs/';
	if(rut.length>0){
      $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'rut='+rut,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/php/recuperarEmpleado.php',
        success: function(data){
          $('#mensaje').html('');
          if(data == 'No existe'){
          $('#apellido_paterno').val('no encontrado').focus();
          }else{
          //empleado
          $('#mensaje').html('');
          $('#empresa').val(data.empresa);
          $("select[name=rs]").append('<option value="' + data.rs + '" selected>'+ data.rs + '</option>');
          $('#apellido_paterno').val(data.apellido_paterno);
          $('#apellido_materno').val(data.apellido_materno);
          $('#nombres').val(data.nombres);
          $('#fecha_nacimiento').val(data.fecha_nacimiento);
          $('#edad').val(data.edad);
          $("select[name=nacionalidad]").append('<option value="' + data.nacionalidad + '" selected>'+ data.nacionalidad + '</option>');
          $("select[name=estado_civil]").append('<option value="' + data.estado_civil + '" selected>'+ data.estado_civil + '</option>');
          $("select[name=sexo]").append('<option value="' + data.sexo + '" selected>'+ data.sexo + '</option>');
          //contrato
          $('#fecha_contrato').val(data.fecha_contrato);
          $('#fecha_termino').val(data.fecha_termino);
          $("select[name=tipo_contrato]").append('<option value="' + data.tipo_contrato + '" selected>'+ data.tipo_contrato + '</option>');
          $('#cargo').val(data.cargo);
          $('#observacion').val(data.observacion);
          $('#sbase').val(data.sbase);
          $('#horario').val(data.horario);
          if(data.sindicalizado == 'on'){ $('#sindicalizado').attr('checked',true); }else{ $('#sindicalizado').removeAttr('checked'); }
          $('#fecha_sindicato').val(data.fecha_sindicato);
          if(data.ruta!='nada'){$('#picprofile').attr("src",url+data.ruta);}

          $('#bt0').removeAttr('disabled');
          $('#bt1').removeAttr('disabled');
          $('#bt2').removeAttr('disabled');
          $('#bt3').removeAttr('disabled');
          $('#bt4').removeAttr('disabled');
          $('#bt5').removeAttr('disabled');
          $('#bt6').removeAttr('disabled');
          $('#bt7').removeAttr('disabled');
          $('#bt8').removeAttr('disabled');
          }
        }
      });
    }else{
      $('#rut').val('Ingrese el Rut');
    }
}
function crearPrevision(){
	var rut = $('#rut').val();
	var salud = $("select[name=salud]").val();
	var afp = $("select[name=afp]").val();
	var opciones = $("input[name=opciones]:checked").val();
	var pensionado = $("input[name=pensionado]:checked").val();
	var cuota = $('#cuota').val();
  if(rut.length>0){
	$.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'rut='+rut + '&salud='+ salud + '&afp='+ afp + '&opciones='+ opciones + '&pensionado='+ pensionado + '&cuota='+ cuota,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/php/crearPrevision.php',
        success: function(data){
          $('#mensaje').html('');
            if(data == 'Ingresado'){
          $('#mensajepre').html('<p class="alert alert-success">Registro Ingresado</p>');
            }else if(data == 'Actualizado'){
          $('#mensajepre').html('<p class="alert alert-success">Registro Actualizado</p>');   
             }else{
          $('#mensajepre').html('<p class="alert alert-danger">Intentalo mas Tarde.</p>'); 
             }
        }
      });
  }else{
      $('#mensajepre').html('<p class="alert alert-danger">No existe rut asociado.</p>');
    }
}
function crearSeguro(){
  var rut = $('#rut').val();
  var seguro = $("select[name=seguro]").val();
  var recaudadora = $("select[name=recaudadora]").val();
  var spatronal = $("input[name=spatronal]:checked").val();
  if(rut.length>0){
  $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'rut='+rut + '&seguro='+ seguro + '&recaudadora='+ recaudadora + '&spatronal='+ spatronal,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/php/crearSeguro.php',
        success: function(data){
          $('#mensaje').html('');
            if(data == 'Ingresado'){
          $('#mensajeseguro').html('<p class="alert alert-success">Registro Ingresado</p>');
            }else if(data == 'Actualizado'){
          $('#mensajeseguro').html('<p class="alert alert-success">Registro Actualizado</p>');   
             }else{
          $('#mensajeseguro').html('<p class="alert alert-danger">Intentalo mas Tarde.</p>'); 
             }
        }
      });
  }else{
      $('#mensajeseguro').html('<p class="alert alert-danger">No existe rut asociado.</p>');
    }
}
function crearIadicional(){
  var rut = $('#rut').val();
  var fprimeraco = $('#fprimeraco').val();
  var aantco = $('#aantco').val();
  var vacaus = $('#vacaus').val();
  var check1 = $("input[name=check1]:checked").val();
  var check2 = $("input[name=check2]:checked").val();
  var check3 = $("input[name=check3]:checked").val();
  if(rut.length>0){
  $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'rut='+rut + '&fprimeraco='+ fprimeraco + '&aantco='+ aantco + '&vacaus='+ vacaus + '&check1='+ check1 + '&check2='+ check2 + '&check3='+ check3,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/php/crearIadicional.php',
        success: function(data){
          $('#mensajead').html('');
            if(data == 'Ingresado'){
          $('#mensajead').html('<p class="alert alert-success">Registro Ingresado</p>');
            }else if(data == 'Actualizado'){
          $('#mensajead').html('<p class="alert alert-success">Registro Actualizado</p>');   
             }else{
          $('#mensajead').html('<p class="alert alert-danger">Intentalo mas Tarde.</p>'); 
             }
        }
      });
  }else{
      $('#mensajead').html('<p class="alert alert-danger">No existe rut asociado.</p>');
    }
}
function crearAvoluntario(){
  var rut = $('#rut').val();
  var rut_emp = $('#rut_emp').val();
  var apepatern = $('#apepatern').val();
  var apematern = $('#apematern').val();
  var nom_emp = $('#nom_emp').val();
  var checkvo = $("input[name=checkvo]:checked").val();
  if(rut.length>0){
  $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'rut='+rut + '&rut_emp='+ rut_emp + '&apepatern='+ apepatern + '&apematern='+ apematern + '&nom_emp='+ nom_emp + '&checkvo='+ checkvo,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/php/crearAvoluntario.php',
        success: function(data){
          $('#mensajevo').html('');
            if(data == 'Ingresado'){
          $('#mensajevo').html('<p class="alert alert-success">Registro Ingresado</p>');
            }else if(data == 'Actualizado'){
          $('#mensajevo').html('<p class="alert alert-success">Registro Actualizado</p>');   
             }else{
          $('#mensajevo').html('<p class="alert alert-danger">Intentalo mas Tarde.</p>'); 
             }
        }
      });
  }else{
      $('#mensajevo').html('<p class="alert alert-danger">No existe rut asociado.</p>');
    }
}
function crearDpersonales(){
  var rut = $('#rut').val();
  var direccion = $('#direccion').val();
  var comuna = $('#comuna').val();
  var telefono = $('#telefono').val();
  var celular = $('#celular').val();
  var ciudad = $('#ciudad').val();
  var email = $('#email').val();
  var banco = $("select[name=banco]").val();
  var cuenta = $("select[name=cuenta]").val();
  var ncuenta = $('#ncuenta').val();
  var estado = $("input[name=pagar]:checked").val();
  if(estado=='on'){ var pagar = 'on'; }else{ var pagar='off'; }
  if(rut.length>0){
  $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'rut='+rut + '&direccion='+ direccion + '&comuna='+ comuna + '&telefono='+ telefono + '&celular='+ celular + '&ciudad='+ ciudad + '&email='+ email + '&banco='+ banco + '&cuenta='+ cuenta + '&ncuenta='+ ncuenta + '&pagar='+ pagar,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/php/crearDpersonales.php',
        success: function(data){
          $('#mensajeper').html('');
            if(data == 'Ingresado'){
          $('#mensajeper').html('<p class="alert alert-success">Registro Ingresado</p>');
            }else if(data == 'Actualizado'){
          $('#mensajeper').html('<p class="alert alert-success">Registro Actualizado</p>');   
             }else{
          $('#mensajeper').html('<p class="alert alert-danger">Intentalo mas Tarde.</p>'); 
             }
        }
      });
  }else{
      $('#mensajeper').html('<p class="alert alert-danger">No existe rut asociado.</p>');
    }
}
function crearEmergencia(){
  var rut = $('#rut').val();
  var nombre_emergencia = $('#nombre_emergencia').val();
  var telefono_emergencia = $('#telefono_emergencia').val();
  if(rut.length>0){
  $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'rut='+rut + '&nombre_emergencia='+ nombre_emergencia + '&telefono_emergencia='+ telefono_emergencia,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/php/crearEmergencia.php',
        success: function(data){
          $('#mensajeemergencia').html('');
            if(data == 'Ingresado'){
          $('#mensajeemergencia').html('<p class="alert alert-success">Registro Ingresado</p>');
            }else if(data == 'Actualizado'){
          $('#mensajeemergencia').html('<p class="alert alert-success">Registro Actualizado</p>');   
             }else{
          $('#mensajeemergencia').html('<p class="alert alert-danger">Intentalo mas Tarde.</p>'); 
             }
        }
      });
  }else{
      $('#mensajeemergencia').html('<p class="alert alert-danger">No existe rut asociado.</p>');
    }
}
function verificarRut(){
	var rut = $('#rut').val();
	if(rut.length>0){
      $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'rut='+rut,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/php/confirmarEmpleado.php',
        success: function(data){
          $('#mensaje').html('');
          	if(data == 'No existe'){
          $('#apellido_paterno').val('').focus();
          	}else{
          $('#mensaje').html('<p class="alert alert-danger">El Rut ingresado ya existe en el sistema.</p>');
					
        }
        }
      });
    }else{
      $('#rut').val('Ingrese el Rut');
    }
	}
  function getPrevision(){
    var rut = $('#rut').val();
    if(rut.length>0){
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
          if(data.opciones == 'Actual'){ $('#opciones_1').attr('checked',true); $('#opciones_2').removeAttr('checked'); }else{ $('#opciones_1').removeAttr('checked'); $('#opciones_2').attr('checked',true);}
          if(data.pension == 'on'){ $('#pensionado').attr('checked',true); }else{ $('#pensionado').removeAttr('checked'); }
          $('#cuota').val(data.cuota);
          }
        }
      });
    }else{
      $('#rut').val('Ingrese el Rut');
    }
  }
  function getSeguro(){
    var rut = $('#rut').val();
    if(rut.length>0){
      $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'rut='+rut,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/php/recuperarSeguro.php',
        success: function(data){
          $('#mensajeseguro').html('');
          $("select[name=seguro]").append('<option value="" selected></option>');
          $("select[name=recaudadora]").append('<option value="" selected></option>');
          $('#spatronal').removeAttr('checked');
          if(data == 'No existe'){

          }else{
          $("select[name=seguro]").append('<option value="' + data.seguro + '" selected>'+ data.seguro + '</option>');
          $("select[name=recaudadora]").append('<option value="' + data.recaudadora + '" selected>'+ data.recaudadora + '</option>');
          if(data.spatronal == 'on'){ $('#spatronal').attr('checked',true); }else{ $('#spatronal').removeAttr('checked'); }
          }
        }
      });
    }else{
      $('#rut').val('Ingrese el Rut');
    }
  }
  function getIadicional(){
    var rut = $('#rut').val();
    if(rut.length>0){
      $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'rut='+rut,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/php/recuperarIadicional.php',
        success: function(data){
          $('#mensajead').html('');
          $('#fprimeraco').val('');
          $('#aantco').val('');
          $('#vacaus').val('');
          if(data == 'No existe'){

          }else{
          $('#fprimeraco').val(data.fprimeraco);
          $('#aantco').val(data.aantco);
          $('#vacaus').val(data.vacaus);
          if(data.check1 == 'on'){ $('#check1').attr('checked',true); }
          if(data.check2 == 'on'){ $('#check2').attr('checked',true); }
          if(data.check3 == 'on'){ $('#check3').attr('checked',true); }
          }
        }
      });
    }else{
      $('#rut').val('Ingrese el Rut');
    }
  }
  function getAvoluntario(){
    var rut = $('#rut').val();
    if(rut.length>0){
      $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'rut='+rut,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/php/recuperarAvoluntario.php',
        success: function(data){
          $('#mensajevo').html('');
          $('#rut_emp').val('');
          $('#apepatern').val('');
          $('#apematern').val('');
          $('#nom_emp').val('');
          if(data == 'No existe'){

          }else{
          $('#rut_emp').val(data.rut_emp);
          $('#apepatern').val(data.apepatern);
          $('#apematern').val(data.apematern);
          $('#nom_emp').val(data.nom_emp);
          if(data.checkvo == 'on'){ $('#checkvo').attr('checked',true); }
          }
        }
      });
    }else{
      $('#rut').val('Ingrese el Rut');
    }
  }
   function getDpersonales(){
    var rut = $('#rut').val();
    if(rut.length>0){
      $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'rut='+rut,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/php/recuperarDpersonales.php',
        success: function(data){
          $('#mensajeper').html('');
          $('#direccion').val('');
          $('#comuna').val('');
          $('#telefono').val('');
          $('#celular').val('');
          $('#ciudad').val('');
          $('#email').val('');
          $("select[name=banco]").append('<option selected></option>');
          $("select[name=cuenta]").append('<option selected></option>');
          $('#ncuenta').val('');
          $('#pagar').removeAttr('checked');
          if(data != 'No existe'){
          $('#direccion').val(data.direccion);
          $('#comuna').val(data.comuna);
          $('#telefono').val(data.telefono);
          $('#celular').val(data.celular);
          $('#ciudad').val(data.ciudad);
          $('#email').val(data.email);
          $("select[name=banco]").append('<option selected>'+ data.banco + '</option>');
          $("select[name=cuenta]").append('<option selected>'+ data.cuenta + '</option>');
          $('#ncuenta').val(data.ncuenta);
          if(data.pagar=='on'){ $('#pagar').prop('checked',true); }
          }
        }
      });
    }else{
      $('#rut').val('Ingrese el Rut');
    }
  }
  function getEmergencia(){
    var rut = $('#rut').val();
    if(rut.length>0){
      $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'rut='+rut,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/php/recuperarEmergencia.php',
        success: function(data){
          $('#mensajeemergencia').html('');
          $('#nombre_emergencia').val('');
          $('#telefono_emergencia').val('');
          if(data == 'No existe'){

          }else{
          $('#nombre_emergencia').val(data.nombre_emergencia);
          $('#telefono_emergencia').val(data.telefono_emergencia);
          }
        }
      });
    }else{
      $('#rut').val('Ingrese el Rut');
    }
  }
  function limpiar(){
    var url = 'http://remuneracion.ingetecservice.cl/remuneracion/application/img/ang.png';
          $('#rut').val('');
          $('#mensaje').val('');
          $('#apellido_paterno').val('');
          $('#apellido_materno').val('');
          $('#nombres').val('');
          $('#fecha_nacimiento').val('');
          $('#edad').val('');
          $('#picprofile').attr("src",url);
          $('#fecha_contrato').val('');
          $('#fecha_termino').val('');
          $('#cargo').val('');
          $('#observacion').val('');
          $('#fecha_sindicato').val('');

          $('#bt0').attr('disabled',true);
          $('#bt1').attr('disabled',true);
          $('#bt2').attr('disabled',true);
          $('#bt3').attr('disabled',true);
          $('#bt4').attr('disabled',true);
          $('#bt5').attr('disabled',true);
          $('#bt6').attr('disabled',true);
          
          
  }
  function crearReferencia(){
  var rut = $('#rut').val();
  var empresant = $('#empresant').val();
  var nom_referencia = $('#nom_referencia').val();
  var fono_referencia = $('#fono_referencia').val();
  var causal = $('#causal').val();
  if(rut.length>0){
  $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'rut='+rut + '&empresant='+ empresant + '&nom_referencia='+ nom_referencia + '&fono_referencia='+ fono_referencia + '&causal='+ causal,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/php/crearReferencia.php',
        success: function(data){
          $('#mensajereferencia').html('');
            if(data == 'Ingresado'){
          $('#mensajereferencia').html('<p class="alert alert-success">Registro Ingresado</p>');
            }else if(data == 'Actualizado'){
          $('#mensajereferencia').html('<p class="alert alert-success">Registro Actualizado</p>');   
             }else{
          $('#mensajereferencia').html('<p class="alert alert-danger">Intentalo mas Tarde.</p>'); 
             }
        }
      });
  }else{
      $('#mensajetalla').html('<p class="alert alert-danger">No existe rut asociado.</p>');
    }
  }
  function crearTallas(){
  var rut = $('#rut').val();
  var estatura = $('#estatura').val();
  var tallax = $('#tallax').val();
  var zapatos = $('#zapatos').val();
  if(rut.length>0){
  $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'rut='+rut + '&estatura='+ estatura + '&tallax='+ tallax + '&zapatos='+ zapatos,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/php/crearTalla.php',
        success: function(data){
          $('#mensajetalla').html('');
            if(data == 'Ingresado'){
          $('#mensajetalla').html('<p class="alert alert-success">Registro Ingresado</p>');
            }else if(data == 'Actualizado'){
          $('#mensajetalla').html('<p class="alert alert-success">Registro Actualizado</p>');   
             }else{
          $('#mensajetalla').html('<p class="alert alert-danger">Intentalo mas Tarde.</p>'); 
             }
        }
      });
  }else{
      $('#mensajetalla').html('<p class="alert alert-danger">No existe rut asociado.</p>');
    }
  }
  function getTalla(){
  var rut = $('#rut').val();
    if(rut.length>0){
      $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'rut='+rut,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/php/recuperarTalla.php',
        success: function(data){
          $('#mensajetalla').html('');
          $('#estatura').val(data.estatura);
          $('#tallax').val(data.talla);
          $('#zapatos').val(data.zapatos);
        }
      });
    }else{
      $('#rut').val('Ingrese el Rut');
    }
  }
  function getReferencia(){
    var rut = $('#rut').val();
    if(rut.length>0){
      $.ajax({
        type: 'POST',
        dataType: 'json',
        data: 'rut='+rut,
        url: 'http://remuneracion.ingetecservice.cl/remuneracion/application/js/php/recuperarReferencia.php',
        success: function(data){
          $('#mensajereferencia').html('');
          $('#empresant').val(data.empresa);
          $('#nom_referencia').val(data.nombre);
          $('#fono_referencia').val(data.fono);
          $('#causal').val(data.causal);
        }
      });
    }else{
      $('#rut').val('Ingrese el Rut');
    }
  }
   function actualizarUsuario(){
    $('#mensajeUser').html('');
    var newuser = $('#user').val();
    var lastuser = $('#lastuser').val();
    if(newuser!=lastuser){
     swal({
          title: "¿Quiere Actualizar el Usuario?",
          text: "Este proceso cerrará la sesión activa.",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: 'btn-danger',
          confirmButtonText: 'Si, Actualizar',
          cancelButtonText: "Cancelar",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm){
            swal("Actualizado!", "Ingresa con el nuevo Usuario!", "success");
            window.setTimeout(location.href='actualizarUser/'+newuser, 6000);
          } else {
            swal("Cancelado", "No se han efectuado cambios", "error");
          }
        });
   }else{
    $('#mensajeUser').html('<p class="alert alert-danger">El nuevo usuario es igual al activo.</p>');
   }
  }
  function actualizarClave(){
    $('#mensajeUser').html('');
    var clave1 = $('#password1').val();
    var clave2 = $('#password2').val();
    if(clave1.length>5){
    if(clave1==clave2){
     swal({
          title: "Modificacion de Contraseña",
          text: "Este proceso cerrará la sesión activa.",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: 'btn-danger',
          confirmButtonText: 'Si, Actualizar',
          cancelButtonText: "Cancelar",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm){
            swal("Actualizado!", "Ingresa con la nueva Clave!", "success");
            window.setTimeout(location.href='actualizarClave/'+clave1, 6000);
          } else {
            swal("Cancelado", "No se han efectuado cambios", "error");
          }
        });
   }else{
     $('#mensajeUser').html('<p class="alert alert-danger">No coinciden las Claves</p>');
   }
 }else{
 $('#mensajeUser').html('<p class="alert alert-danger">Debe tener como mínimo 5 caracteres entre letras y números.</p>');
 }
  }
function guardarNomina(){
var convenio = $('#convenio').val();
var empresa = $('#empresa').val();
var rut = $('#rut').val();
var f_abono = $('#f_abono').val();
var mes = $('#mes').val();
var periodo = $('#periodo').val();
var tipo = $('#tipo').val();
console.log(convenio);
console.log(empresa);
console.log(rut);
console.log(f_abono);
console.log(mes);
console.log(periodo);
console.log(tipo);

}