<script src="<?= base_url(); ?>application/js/liquidacion.js"></script>
<script type="text/javascript">
function passDat(){
    document.getElementById('empleado_inri').value=document.getElementById('empleado').value;
    document.getElementById('mes_inri').value=document.getElementById('mes').value;
    document.getElementById('year_inri').value=document.getElementById('year').value;
}
</script>
<section id="content">
<div class="tile">
                    <div class="t-header">
                        <div class="th-title">Ficha Mensual Empleado <small></small></div>
                    </div>
                    
                    <div class="t-body tb-padding">
                        <div class="row">
                            <div class="col-md-2">  Empresa Activa:</div>
                            <div class="col-md-4"><input type="text" class="form-control" id="rs" name="rs" value="<?= $rs ?>" readonly> </div>
                             <div class="col-md-6"><input type="hidden" class="form-control" id="rut_empresa" name="rut_empresa" value="<?= $rut_empresa ?>" readonly></div>
                        </div>
                        <hr>
                            <div class="col-sm-3">
                                
                                    <label class="sr-only" for="exampleInputEmail2">Empleado</label>
                                    <select id="empleado" name="empleado" class="form-control">
                                        <option></option>
                                        <? if($empleados==NULL){ echo 'No hay empleados'; }else{ foreach($empleados ->result() as $value1){ ?>
                                        <option value="<?= $value1->rut ?>"><?= $value1->nombres.' '.$value1->apellido_paterno.' '.$value1->apellido_materno; ?></option>
                                        <? } } ?>
                                    </select>
                                
                            </div>
                            
                            <div class="col-sm-3">
                                
                                    <label class="sr-only" for="exampleInputPassword2">Mes</label>
                                    <select id="mes" name="mes" class="form-control"><option><?= $mes; ?></option><option></option><option>Enero</option><option>Febrero</option><option>Marzo</option><option>Abril</option>
                                        <option>Mayo</option><option>Junio</option><option>Julio</option><option>Agosto</option><option>Septiembre</option><option>Octubre</option><option>Noviembre</option><option>Diciembre</option></select>
                                
                            </div>
                            
                            <div class="col-sm-3">
                                
                                    <label class="sr-only" for="exampleInputPassword2">Año</label>
                                    <select id="year" name="year" class="form-control"><option>2010</option><option>2011</option><option>2012</option><option>2013</option><option>2014</option><option>2015</option><option selected>2016</option></select>
                               
                            </div>
                            
                            <div class="col-sm-3">
                                <button type="submit" class="btn btn-primary btn-sm m-t-5" onClick="getLiq()"><i class="zmdi zmdi-search"></i></span></button>       <button class="btn btn-success" onClick="getUlLiq()">Ultima Liquidacion</button>
                            </div>
                            <div class="col-md-12" id="mensajebusc"></div>
                       </br></br>
                    </div>
</div>
<div class="tile">
    <div class="t-body tb-padding">
                        
                            <div class="col-sm-2">
                                <div class="form-group">
                                    Sueldo Base<input type="text" name="sueldo_base" id="sueldo_base" class="form-control" required value="0" onBlur="calcularTope()">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    Imp. Seg. Ces.<input type="text" name="imsegces" id="imsegces" class="form-control" value="0">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    Imp. SIS.<input type="text" name="imsis" id="imsis" class="form-control" value="0">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    Colación<input type="text" name="colacion" id="colacion" class="form-control" value="0">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    D. no Trabajados<input type="text" name="dntrabajados" id="dntrabajados" class="form-control" value="0">
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    Tipo Sueldo<select id="tsueldo" name="tsueldo" class="form-control">
                                        <option selected>Mensual</option><option>Por Proyecto</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    Gratificación<input type="text" name="gratificacion" id="gratificacion" class="form-control" value="0">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    Aguinaldo<input type="text" name="aguinaldo" id="aguinaldo" class="form-control" value="0">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    Comisión<input type="text" name="comision" id="comision" class="form-control" value="0">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    Mayor Ret.<input type="text" name="mret" id="mret" class="form-control" value="0">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    Movilización<input type="text" name="movilizacion" id="movilizacion" class="form-control" value="0">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                   Dias Lic. x Emp.<input type="text" class="form-control" id="lxemp" name="lxemp" value="0">
                                </div>
                            </div>
                        </br></br></br></br></br></br>
        </div>
</div>
<div class="tile">
    <div class="row">
        <div class="col-md-2"><button id="bt0" class="btn bg-cyan btn-block" data-toggle="modal" data-target="#salud" onClick="getPrev()" disabled>Salud</button></div>
        <div class="col-md-2"><button id="bt1" class="btn bg-teal btn-block" data-toggle="modal" data-target="#anticipos" onClick="getAnticipo()" disabled>Anticipos</button></div>
        <div class="col-md-2"><button id="bt2" class="btn bg-amber btn-block" data-toggle="modal" data-target="#prestamos" onClick="getPrestamo()" disabled>Prestamos</button></div>
        <div class="col-md-2"><button id="bt3" class="btn bg-orange btn-block" data-toggle="modal" data-target="#bonos" onClick="getBono()" disabled>Bonos</button></div>
        <div class="col-md-2"><button id="bt4" class="btn bg-blue btn-block" data-toggle="modal" data-target="#descuentos" onClick="getDesc()" disabled>Descuentos</button></div>
        <div class="col-md-2"><button id="bt5" class="btn bg-indigo btn-block" data-toggle="modal" data-target="#cretro" onClick="getCretro()" disabled>Cargas Retroactivas</button></div>
    </div>
</div>
<div class="tile">
                    <div class="t-header">
                        <div class="th-title">Horario Laboral <small></small></div>
                    </div>
                    <div class="t-body tb-padding">
                       
                            <div class="col-sm-2">
                                <div class="form-group">
                                    Dias Mens.<input type="text" name="dmensuales" id="dmensuales" class="form-control" value="0">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    Horas Sem.<input type="text" name="hsemanales" id="hsemanales" class="form-control" value="0">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    Dias Sem.<input type="text" name="dsemanales" id="dsemanales" class="form-control" value="0">
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    Atrasos<input type="text" name="atrasos" id="atrasos" class="form-control" placeholder="min" value="0">
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    H. Extra 50%<input type="text" name="hextra5" id="hextra5" class="form-control" placeholder="50%" value="0">
                                </div>
                            </div>
                             <div class="col-sm-2">
                                <div class="form-group">
                                    H. Extra 100%<input type="text" name="hextra10" id="hextra10" class="form-control" placeholder="100%" value="0">
                                </div>
                            </div>
                        </br></br>
</div></div>
<div class="tile">
                    <div class="t-header">
                        <div class="th-title">Asignacion Familiar <small></small></div>
                    </div>
                    <div class="t-body tb-padding">
                        
                            <div class="col-sm-2">
                                <div class="form-group">
                                    Monto<input type="text" name="monto" id="monto" class="form-control" value="0">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    Tramo<select class="form-control" name="tramo" id="tramo"><option></option><option>A</option><option>B</option><option>C</option><option>D</option></select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                Numero de Cargas
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    Familiares<input type="text" name="familiares" id="familiares" class="form-control" value="0">
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    Maternales<input type="text" name="maternales" id="maternales" class="form-control" value="0">
                                </div>
                            </div>
                             <div class="col-sm-2">
                                <div class="form-group">
                                    Invalidas<input type="text" name="invalidas" id="invalidas" class="form-control" value="0">
                                </div>
                            </div>
                         </br></br>
</div></div>
<input type="hidden" id="rmi1" name="rmi1" value="<?= $rmi1 ?>">
<div class="tile">
</br>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4" id="mensaje"></div>
                    </div>
                  <div class="row">
                      <div class="col-md-2"><button id="bt1" class="btn btn-success btn-block" onClick="setLiq()">Grabar</button></div>
                      <div class="col-md-2"><button id="bt2" class="btn btn-danger btn-block">Cancelar</button></div>
                      <div class="col-md-2"></div>
                      <div class="col-md-2"></div>
                      <div class="col-md-2"><button id="bt5" class="btn btn-primary btn-block">Ficha Personal</button></div>
                      <div class="col-md-2"><button id="bt6" class="btn btn-primary btn-block" onClick="location.href='liquidacionpdf'">Generar Liquidacion</button></div>
                    </br></br>
                    </div>
                </div>
              </div>
</div>
</section>

<div id="salud" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                    <center><h3 class="modal-title">Previsión</h3></center>
                </div>
                <div class="modal-body">
              <div class="row">
                  <div class="col-md-4">Salud<select class="form-control" name="salud"><option>BanMedica</option><option>Colmena Golden Cross</option><option>Consalud</option><option>Cruz Blanca</option><option>Fonasa</option><option>ING Salud Isapre</option><option>MasVida</option><option>Vida Tres</option></select></div>
                  <div class="col-md-4">AFP<select class="form-control" name="afp"><option>(sin AFP)</option><option>Capital</option><option>Cuprum</option><option>Habitat</option><option>Modelo</option><option>Planvital</option><option>Provida</option></select></div>
                  <div class="col-md-4">Valor Cuota en UF<input class="form-control" name="cuota" id="cuota"></div>
<div class="row">
<div class="col-md-8"><div id="mensajepre"></div></div>
<div class="col-md-4"></div>
</div>
<div class="row">
  <div class="col-md-4"></div>
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

    <div id="anticipos" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                    <center><h3 class="modal-title">Anticipos</h3></center>
                </div>
                <div class="modal-body">
              <div class="row">
                  <div class="col-md-8"><input type="text" class="form-control" name="descripcion_ant" id="descripcion_ant" placeholder="Descripcion"></div>
                  <div class="col-md-4"><input type="text" class="form-control" name="monto_ant" id="monto_ant" placeholder="Monto"></div>
              </div>
            
              <div class="row">
                <div class="col-md-12" id="mensajeant"></div>
              </div>
              <center><button class="btn btn-primary" onClick="crearAnticipo()">Guardar</button> <button class="btn btn-danger" id="btnelAnt" onClick="eliminarD('anticipo')" disabled>Eliminar</button></center>
                </div>

                <div class="modal-footer">
                    <div class="btn-group">
                        <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cerrar</button>
                    </div>
                </div>
 
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dalog -->
    </div><!-- /.modal -->

    <div id="prestamos" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                    <center><h3 class="modal-title">Prestamos</h3></center>
                </div>
                <div class="modal-body">
              <div class="row">
                  <div class="col-md-8"><input type="text" class="form-control" name="descripcion_prestamo" id="descripcion_prestamo" placeholder="Descripcion"></div>
                  <div class="col-md-4"><input type="text" class="form-control" name="monto_prestamo" id="monto_prestamo" placeholder="Monto"></div>
              </div>
              <div class="row">
                <div class="col-md-12" id="mensajeprestamo"></div>
              </div>
              <center><button class="btn btn-primary" onClick="crearPrestamo()">Guardar</button> <button class="btn btn-danger" id="btnelPres" onClick="eliminarD('prestamo')" disabled>Eliminar</button></center>
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cerrar</button>
                    </div>
                </div>
 
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dalog -->
    </div><!-- /.modal -->

    <div id="bonos" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                    <center><h3 class="modal-title">Bonos</h3></center>
                </div>
                <div class="modal-body">
             <div class="row">
                  <div class="col-md-4"><select class=" form-control" name="tipo_bono"><option>Bono</option><option>Aguinaldo</option></select></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="descripcion_bono" id="descripcion_bono" placeholder="Detalle"></div>
                  
              </div>
          </br>
              <div class="row">
                <div class="col-md-4"><input type="text" class="form-control" name="monto_bono" id="monto_bono" placeholder="Monto"></div>
                  <div class="col-md-4"><select class="form-control" id="estado_bono" name="estado_bono"><option>Imponible</option><option>No Imponible</option></select></div>
                  <div class="col-md-4"><center><button class="btn btn-primary"  onClick="crearBono()">Guardar</button> <button class="btn btn-danger" id="btnelBono" onClick="eliminarD('bono')" disabled>Eliminar</button></center></div>
              </div>
              <div class="row">
                <div class="col-md-12" id="mensajebono"></div>
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

    <div id="descuentos" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                    <center><h3 class="modal-title">Descuentos</h3></center>
                </div>
                <div class="modal-body">
              <div class="row">
                  <div class="col-md-8"><input type="text" class="form-control" name="descripcion_descuento" id="descripcion_descuento" placeholder="Detalle"></div>
                  <div class="col-md-4"><input type="text" class="form-control" name="monto_descuento" id="monto_descuento" placeholder="Monto"></div>
              </div>
              <div class="row">
                <div class="col-md-12" id="mensajedes"></div>
              </div>
              <center><button class="btn btn-primary" onClick="crearDescuento()">Guardar</button> <button class="btn btn-danger" id="btnelDesc" onClick="eliminarD('descuento')" disabled>Eliminar</button></center>
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cerrar</button>
                    </div>
                </div>
 
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dalog -->
    </div><!-- /.modal -->

    <div id="cretro" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                    <center><h3 class="modal-title">Cargas Retroactivas</h3></center>
                </div>
                <div class="modal-body">
              <div class="row">
                  <div class="col-md-4"><input type="text" class="form-control" name="descripcion_cretro" id="descripcion_cretro" placeholder="Nombre"></div>
                  <div class="col-md-4"><input type="text" class="form-control" name="monto_cretro" id="monto_cretro" placeholder="Monto"></div>
                  <div class="col-md-4"><center><button class="btn btn-primary" onClick="crearCpro()">Guardar</button> <button class="btn btn-danger" id="btnelCret" onClick="eliminarD('cargas')" disabled>Eliminar</button></center></div>
              </div>
              <div class="row">
                <div class="col-md-12" id="mensajecretro"></div>
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