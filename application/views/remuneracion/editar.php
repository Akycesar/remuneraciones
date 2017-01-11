<script src="<?= base_url(); ?>application/js/empleado.js"></script>
<script type="text/javascript">
function copiar(){
  document.getElementById("empleado_imagen").value=document.getElementById("rut").value;
}
</script>
<section id="content">
<div class="tile">
  <div class="t-header">
                        <div class="th-title">Datos Empleado <small></small></div>
  </div>
  <div class="row">
    <div class="col-md-8">
      <?// formulario ?>
      <form name="empleado" action="http://remuneracion.ingetecservice.cl/remuneracion/control/editarEmpleado" method="post">
        <div class="row">
              <div class="col-md-4">  Empresa:</div>
              <div class="col-md-4"><input type="text" name="empresa" id="empresa" class="form-control" value="" disabled></div>
              <div class="col-md-4"></div>
          </div>
          <div class="row">
              <div class="col-md-4">  RUT:</div>
              <div class="col-md-4"><input type="text" name="rut" id="rut" class="form-control" value="<?= $rut ?>"></div>
              <div class="col-md-4"><img src="<?= base_url(); ?>application/img/ver.png" style="cursor: pointer;" onClick="buscar()"></div>
          </div>
          <div class="col-md-12" id="mensaje"></div>
          <div class="row">
              <div class="col-md-4">  Apellido Paterno:</div>
              <div class="col-md-4"><input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control" autocomplete="off"></div>
              <div class="col-md-4"><select class="form-control" name="sr"><option>Sr.</option><option>Srta.</option></select></div>
          </div>
          <div class="row">
              <div class="col-md-4">  Apellido Materno:</div>
              <div class="col-md-4"><input type="text" name="apellido_materno" id="apellido_materno" class="form-control" autocomplete="off"></div>
              <div class="col-md-4"></div>
          </div>
          <div class="row">
              <div class="col-md-4">  Nombres:</div>
              <div class="col-md-4"><input type="text" name="nombres" id="nombres" class="form-control" autocomplete="off"></div>
              <div class="col-md-4"></div>
          </div>
          <div class="row">
              <div class="col-md-4">  Fecha Nacimiento:</div>
              <div class="col-md-4"><input type="text" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" placeholder="dd-mm-YY" autocomplete="off"></div>
              <div class="col-md-4"><input type="text" class="form-control" name="edad" id="edad" value="" placeholder="Edad" autocomplete="off"></div>
          </div>
          <div class="row">
              <div class="col-md-4">  Nacionalidad:</div>
              <div class="col-md-4"><select class="form-control" name="nacionalidad"><option>Chilena</option><option>Otra</option></select></div>
              <div class="col-md-4"><select class="form-control" name="estado_civil"><option>(Estado civil)</option><option>Soltero</option><option>Casado</option><option>Viudo</option><option>Separado</option></select></div>
          </div>
          <div class="row">
              <div class="col-md-4">  Sexo:</div>
              <div class="col-md-4"><select class="form-control" name="sexo"><option>Hombre</option><option>Mujer</option></select></div>
              <div class="col-md-4"></div>
            </br>
          </div>
        
        
      <?//termino formulario ?>
    </div>
    <div class="col-md-2"><div class="panel panel-primary"><div class="panel panel-heading"><center>Imagen Perfil</center></div><center><img src="<?= base_url(); ?>application/img/ang.png" id="picprofile"></center></br></div></div>
    <div class="col-md-2"></br></br><button class="btn btn-primary btn-info btn-block" onClick="document.empleado.submit()">Actualizar</button></div>
  </div>
</div>
    <div class="tile">
      <div class="row">
        <div class="col-md-10"> <?// formulario ?>
          <div class="panel panel-primary">
            <div class="t-header">
                            <div class="th-title">Contrato <small></small></div>
      </div>
              <div class="row">
                  <div class="col-md-4">  Fecha Contrato:</div>
                  <div class="col-md-4"><input type="text" class="form-control" name="fecha_contrato" id="fecha_contrato" placeholder="dd-mm-YY" autocomplete="off"></div>
                  <div class="col-md-4"><input class="form-control" name="sbase" id="sbase" placeholder="Sueldo Base"></div>
              </div>
              <div class="row">
                  <div class="col-md-4">  Fecha Termino:</div>
                  <div class="col-md-4"><input type="text" class="form-control" name="fecha_termino" id="fecha_termino" placeholder="dd-mm-YY" autocomplete="off"></div>
                  <div class="col-md-4"><select class="form-control" name="tipo_contrato"><option>Indefinido</option><option>A plazo</option><option>Por proyecto</option></select></div>
              </div>
              <div class="row">
                  <div class="col-md-4">  Cargo:</div>
                  <div class="col-md-4"><input type="text" name="cargo" id="cargo" class="form-control" autocomplete="off"></div>
                  <div class="col-md-4"><input type="text" class="form-control" id="horario" name="horario" placeholder="horario"></div>
              </div>
              <div class="row">
                  <div class="col-md-4">  Observaciones:</div>
                  <div class="col-md-4"><input type="text" class="form-control" name="observacion" id="observacion" autocomplete="off"></div>
                  <div class="col-md-4"></div>
              </div>
              <div class="row">
                  <div class="col-md-4">  <input type="checkbox" id="sindicalizado"> Sindicalizado</div>
                  <div class="col-md-4">  Fecha Ingreso Sindicato</div>
                  <div class="col-md-4"><input type="text" class="form-control" name="fecha_sindicato" id="fecha_sindicato" placeholder="dd-mm-YY" autocomplete="off"></div>
              </div>
            </div>
          </form>
          <?//termino formulario ?></div>
                <div class="col-md-2"></br><button class="btn btn-primary btn-info btn-block" onClick="limpiar()">Limpiar</button></br><button class="btn btn-primary btn-info btn-block" onClick="document.empleado.submit()">Imprimir</button></br><button class="btn btn-primary btn-info btn-block" id="bt0" data-toggle="modal" data-target="#upload" onClick="copiar()" disabled>Subir Imagen</button></br><button class="btn btn-primary btn-info btn-block" id="bt7" data-toggle="modal" data-target="#talla" onClick="getTalla()" disabled>Tallas</button></br><button class="btn btn-primary btn-info btn-block" id="bt8" data-toggle="modal" data-target="#modal_ref" onClick="getReferencia()" disabled>Referencia</button></div>
                <div class="col-md-2"></div>
      </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="row">
                      <div class="col-md-2"><button id="bt1" class="btn btn-primary btn-info btn-block" data-toggle="modal" data-target="#prevision" onClick="getPrevision()" disabled>Prevision</button></div>
                      <div class="col-md-2"><button id="bt2" class="btn btn-primary btn-info btn-block" data-toggle="modal" data-target="#cesantia" onClick="getSeguro()" disabled>Seguro Cesantia</button></div>
                      <div class="col-md-2"><button id="bt3" class="btn btn-primary btn-info btn-block" data-toggle="modal" data-target="#adicional" onClick="getIadicional()" disabled>Info. Adicional</button></div>
                      <div class="col-md-2"><button id="bt4" class="btn btn-primary btn-info btn-block" data-toggle="modal" data-target="#voluntario" onClick="getAvoluntario()" disabled>Afiliado Voluntario</button></div>
                      <div class="col-md-2"><button id="bt5" class="btn btn-primary btn-info btn-block" data-toggle="modal" data-target="#personales" onClick="getDpersonales()" disabled>Datos Personales</button></div>
                      <div class="col-md-2"><button id="bt6" class="btn btn-primary btn-info btn-block" data-toggle="modal" data-target="#emergencia" onClick="getEmergencia()" disabled>Emergencia</button></div>
                    </br></br>
                    </div>
                </div>
              </div>


 </div>
</div>
</div>


        </div>
 <div id="prevision" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                    <center><h3 class="modal-title">Previsión</h3></center>
                </div>
                <div class="modal-body">
              <div class="row">
                  <div class="col-md-4">Salud<select class="form-control" name="salud"><option>BanMedica</option><option>Colmena Golden Cross</option><option>Consalud</option><option>Cruz Blanca</option><option>Fonasa</option><option>ING Salud Isapre</option><option>MasVida</option><option>Vida Tres</option></select></div>
                  <div class="col-md-4">AFP<select class="form-control" name="afp"><option>(sin AFP)</option><option>Capital</option><option>Cuprum</option><option>Habitat</option><option>Modelo</option><option>PlanVital</option><option>Provida</option></select></div>
                  <div class="col-md-4"><div class="radio">
  <label>
    <input type="radio" name="opciones" id="opciones_1" value="Actual" checked>
    Regimen Actual
  </label>
</div>
<div class="radio">
  <label>
    <input type="radio" name="opciones" id="opciones_2" value="Antiguo">
    Regimen Antiguo (IPS)
  </label>
</div>
</div>
<div class="row">
<div class="col-md-4"><center><div class="checkbox">
  <label>
    <input type="checkbox" id="pensionado" name="pensionado">
       Pensionado
  </label>
</div></center></div>
<div class="col-md-4">Valor Cuota en UF<input class="form-control" name="cuota" id="cuota"></div>
<div class="col-md-4"></div>
</div>
<div class="row">
  <div class="col-md-4"><center><button class="btn btn-primary" onClick="crearPrevision()">Guardar</button></center></div>
  <div class="col-md-8"><div id="mensajepre"></div></div>
</div>
              </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cerrar</button>
                    </div>
                </div>
 
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dalog -->
    </div><!-- /.modal -->

    <div id="cesantia" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                    <center><h3 class="modal-title">Seguro de Cesantía</h3></center>
                </div>
                <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">Seguro de Cesantía</div>
                  <div class="col-md-6"><select name="seguro" class="form-control"><option></option><option>Acogido al Seguro de Cesantía</option><option>Acogido al Seg. Ces. por más de 11 años</option><option>Contrato de aprendizaje sin Seg. Cesantía</option>
                    <option>Menor de 18 años sin Seg. Cesantía</option><option>Pensionado sin invalidez parcial sin Seg. Cesantía</option><option>Otro sin Seguro de Cesantía</option><option>Contrato anterior a 3 oct 2002, sin Seg. Cesantía</option></select></div>
                </div>
                <div class="row">
                  <div class="col-md-6">AFP Recaudadora</div>
                  <div class="col-md-6"><select name="recaudadora" class="form-control"><option></option><option>Capital</option><option>Cuprum</option><option>Habitat</option><option>Modelo</option><option>Planvital</option><option>Provida</option></select></div>
                </div>
                <div class="row">
                  <div class="col-md-6"><center><div class="checkbox">
  <label>
    <input type="checkbox" name="spatronal" id="spatronal">
       Sueldo Patronal
  </label>
</div></center></div>
                  <div class="col-md-6" id="mensajeseguro"></div>
              </div>
                <div class="row">
                  <div class="col-md-6"></div>
                  <div class="col-md-6"><button class="btn btn-primary pull-right" onClick="crearSeguro()">Guardar</button></div>
              </div>              
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cerrar</button>
                    </div>
                </div>
 
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dalog -->
    </div><!-- /.modal -->

    <div id="adicional" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                    <center><h3 class="modal-title">Información Adicional</h3></center>
                </div>
            <div class="modal-body">
              <div class="row">
                  <div class="col-md-4">Fecha primera cotización: </div>
                  <div class="col-md-4"><input type="text" class="form-control" id="fprimeraco" name="fprimeraco" placeholder="dd-mm-YY"></div>
                  <div class="col-md-4"><label style="font-size:8px"><input type="checkbox" id="check1" name="check1">No incluir en Libro de Remuneraciones</label></div>
              </div>
              <div class="row">
                  <div class="col-md-4">Años anteriores cotizando: </div>
                  <div class="col-md-4"><input type="text" class="form-control" id="aantco" placeholder="ej: 5"></div>
                  <div class="col-md-4"><label style="font-size:10px"><input type="checkbox" id="check2" name="check2">Subsidio Trabajador Joven</label></div>
              </div>
              <div class="row">
                  <div class="col-md-4">Dias de vacaciones ya usados:</div>
                  <div class="col-md-4"><input type="text" class="form-control" id="vacaus" name="vacaus" placeholder="ej: 5"></div>
                  <div class="col-md-4"><label style="font-size:12px"><input type="checkbox" id="check3" name="check3">Trabajador Agricola</label></div></div>
              </div>
              <div class="row">
                  <div class="col-md-6" id="mensajead"></div>
                  <div class="col-md-4"><button class="btn btn-primary" onClick="crearIadicional()">Guardar</button></div>
                </div>
              <div class="modal-footer">
                    <div class="btn-group">
                        <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cerrar</button>
                    </div>
            </div>
 
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dalog -->
    </div><!-- /.modal -->

    <div id="voluntario" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                    <center><h3 class="modal-title">Afiliado Voluntario</h3></center>
                </div>
                <div class="modal-body">
                   
                  <div class="row">
                        <div class="col-md-3">RUT<input type="text" class="form-control" id="rut_emp" name="rut_emp" placeholder="Formato 00000000-0"></div>
                        <div class="col-md-3">Apellido Paterno<input type="text" class="form-control" id="apepatern" name="apepatern"></div>
                        <div class="col-md-3">Apellido Materno<input type="text" class="form-control" id="apematern" name="apematern"></div>
                        <div class="col-md-3">Nombres<input type="text" class="form-control" id="nom_emp" name="nom_emp"></div>
                  </div>
                  <div class="row">
                        <div class="col-md-3"><input type="checkbox" id="checkvo" name="checkvo">Vigente</div>
                        <div class="col-md-6" id="mensajevo"></div>
                        <div class="col-md-3"><button class="btn btn-primary pull-right" onClick="crearAvoluntario()">Guardar</button></div>
                  </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cerrar</button>
                    </div>
                </div>
 
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dalog -->
    </div><!-- /.modal -->

    <div id="personales" class="modal fade in">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                    <center><h3 class="modal-title">Datos Personales</h3></center>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-6">Direccion<input class="form-control" name="direccion" id="direccion"></div>
                    <div class="col-md-6">Comuna<input class="form-control" name="comuna" id="comuna"></div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">Ciudad<input class="form-control" name="ciudad" id="ciudad"></div>
                    
                    <div class="col-md-4">Teléfono<input class="form-control" name="telefono" id="telefono"></div>
                    
                    <div class="col-md-4">Celular<input class="form-control" name="celular" id="celular"></div>
                    
                  </div>

                 <div class="row">
                    
                    <div class="col-md-3">Email<input class="form-control" name="email" id="email"></div>
                    
                    <div class="col-md-3">Banco<select name="banco" class="form-control"><option>SCOTIABANK</option><option>BANCO ESTADO</option><option>BANCO DE CHILE</option><option>BCI</option><option>SANTANDER</option><option>FALABELLA</option><option>BBVA</option></select></div>

                    <div class="col-md-3">Cuenta<select name="cuenta" class="form-control"><option>CUENTA VISTA</option><option>CUENTA CORRIENTE</option><option>CUENTA RUT</option></select></div>
                  
                    <div class="col-md-3">N° Cuenta<input class="form-control" name="ncuenta" id="ncuenta"></div>

                  </div>
                  <div class="row">
                    <div class="col-md-4"><input type="checkbox" id="pagar" name="pagar">Aparecer en Tranferencia</div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                  </div>
                </br>
                <div class="row">
                  <div class="col-md-12" id="mensajeper"></div>
                </div>
                  <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"><center><button class="btn btn-primary" onClick="crearDpersonales()">Guardar</button></center></div>
                    <div class="col-md-4"></div>
                  </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cerrar</button>
                    </div>
                </div>
 
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dalog -->
    </div><!-- /.modal -->

    <div id="emergencia" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                    <center><h3 class="modal-title">Telefono de Emergencia</h3></center>
                </div>
                <div class="modal-body">
              <div class="row">
                  <div class="col-md-4"><input type="text" class="form-control" name="nombre_emergencia" id="nombre_emergencia" placeholder="Nombre de Contacto"></div>
                  <div class="col-md-4"><input type="text" class="form-control" name="telefono_emergencia" id="telefono_emergencia" placeholder="Telefono de Contacto"></div>
                  <div class="col-md-4"><button class="btn btn-primary" onClick="crearEmergencia()">Guardar</button></div>
              </div>
              <div class="row">
                <div class="col-md-12" id="mensajeemergencia"></div>
              </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cerrar</button>
                    </div>
                </div>
 
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dalog -->
    </div><!-- /.modal -->

    <div id="upload" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                    <center><h3 class="modal-title">Cargar Imagen de Perfil</h3></center>
                </div>
                <div class="modal-body">
                   
                 <div id="formulario_imagenes">
          <span><?php echo validation_errors(); ?></span>
  <?=form_open_multipart(base_url()."control/do_upload")?>
    <input type="hidden" name="empleado_imagen" id="empleado_imagen" class="form-control"/>
    <label>Imagen 1:</label><input type="file" name="userfile" class="form-control"/><br /><br />
    <input type="submit" value="Subir imágenes" />
  <?=form_close()?>
  </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cerrar</button>
                    </div>
                </div>
 
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dalog -->
    </div><!-- /.modal -->

     <div id="modal_ref" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                    <center><h3 class="modal-title">Referencias Anteriores</h3></center>
                </div>
            <div class="modal-body">
              <div class="row">
                  <div class="col-md-4">Empresa Anterior: </div>
                  <div class="col-md-8"><input type="text" class="form-control" id="empresant" name="empresant" placeholder="Empresa"></div>
              </div>
              <div class="row">
                  <div class="col-md-4">Nombre: </div>
                  <div class="col-md-8"><input type="text" class="form-control" id="nom_referencia" placeholder="Nombre de referencia"></div>
              </div>
              <div class="row">
                  <div class="col-md-4">Fono:</div>
                  <div class="col-md-8"><input type="text" class="form-control" id="fono_referencia" name="fono_referencia" placeholder="Telefono de Referencia"></div>
              </div>
              <div class="row">
                  <div class="col-md-4">Causal de Retiro:</div>
                  <div class="col-md-8"><input type="text" class="form-control" id="causal" name="causal" placeholder="Causal de Retiro"></div>
              </div>
              <div class="row">
                  <div class="col-md-12" id="mensajereferencia"></div>
                </div>
              <div class="modal-footer">
                    <div class="btn-group">
                        <button class="btn btn-primary" onClick="crearReferencia()">Guardar</button><button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cerrar</button>
                    </div>
            </div>
 
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dalog -->
    </div><!-- /.modal -->
    </section>


  <div id="talla" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                    <center><h3 class="modal-title">Tallas</h3></center>
                </div>
            <div class="modal-body">
              <div class="row">
                  <div class="col-md-4">Estatura: </div>
                  <div class="col-md-8"><input type="text" class="form-control" id="estatura" name="estatura" placeholder="Estatura"></div>
              </div>
              <div class="row">
                  <div class="col-md-4">Talla: </div>
                  <div class="col-md-8"><input type="text" class="form-control" id="tallax" placeholder="Talla"></div>
              </div>
              <div class="row">
                  <div class="col-md-4">Zapatos: </div>
                  <div class="col-md-8"><input type="text" class="form-control" id="zapatos" name="vacaus" placeholder="Zapatos"></div>
              </div>
              <div class="row">
                  <div class="col-md-12" id="mensajetalla"></div>
                </div>
              <div class="modal-footer">
                    <div class="btn-group">
                        <button class="btn btn-primary" onClick="crearTallas()">Guardar</button>    <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cerrar</button>
                    </div>
            </div>
 
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dalog -->
    </div><!-- /.modal -->
