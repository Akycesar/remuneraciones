<script src="<?= base_url(); ?>application/js/empleado.js"></script>
<section id="content">
<div class="tile">
                    <div class="t-header">
                        <div class="th-title">Nomina de pagos de Remuneraciones Quincenal<small></small></div>
                    </div>
                    
                    <div class="t-body tb-padding">
                    	<form name="detalle" method="post" action="CrearTxtmensual">
		                        <div class="row">
		                            <div class="col-md-3"><input class="form-control" type="text" name="convenio" id="convenio" placeholder="Convenio" value="0010000000" readonly><input type="hidden" name="mes" value="<?= $mes ?>"></div>
		                            <div class="col-md-3"><input class="form-control" type="text" name="empresa" id="empresa" placeholder="Nombre Empresa" value="<?= $n_empresa ?>" readonly><input type="hidden" name="periodo" value="<?= $periodo ?>"></div>
		                            <div class="col-md-3"><input class="form-control" type="text" name="rut_empresa" id="rut" placeholder="Rut Empresa" value="<?= $rut_empresa ?>" readonly><input type="hidden" name="tipo" value="mensual"></div>
		                            <div class="col-md-3"><input class="form-control" type="text" name="f_abono" id="f_abono" placeholder="Fecha de Abono" value="<?= $fecha_final ?>"></div>
		                        </div>
                    			</br>
		                        
                    			</br>
		                    	<div class="row">
		                    		<table width="100%" border="1">
									  <tr>
									    <td width="10%">Codigo Banco</td>
									    <td width="10%">Tipo Transaccion</td>
									    <td>Cuenta Abono</td>
									    <td>Rut Receptor</td>
									    <td>Nombre Receptor</td>
									    <td>Monto</td>
									  </tr>
									  <? if($detalle==null){ echo 'No hay datos'; }else{ foreach($detalle -> result() as $value){ 
									  	if($value->anticipo!=0){
									  	$codigo_banco="014";
									  	$transaccion="22";
									  	$cuenta="00000000000000001";
									  	$rut3=str_replace('.','',$value->empleado);
									  	$rut2=str_replace('-','',$rut3);
									  	$rut1=str_replace('K','K',$rut2);
									  	$rut=str_replace('k','K',$rut1);
									  	$rutreal=str_pad($rut, 15, "0", STR_PAD_LEFT);
									  	$total_liquido=round($value->anticipo);
									  	$liquido=str_pad($total_liquido, 10, "0", STR_PAD_LEFT);
									  ?>
									  <tr>
									    <td><input type="text" class="form-control" name="banco[]" id="banco" value="<?= $codigo_banco ?>"></td>
									    <td><input type="text" class="form-control" name="transaccion[]" id="transaccion" value="<?= $transaccion ?>"></td>
									    <td><input type="text" class="form-control" name="cuenta[]" id="cuenta" value="<?= $cuenta ?>"></td>
									    <td><input type="text" class="form-control" name="rut[]" id="rut" value="<?= $rutreal ?>"></td>
									    <? foreach($empleado -> result() as $val_nom){  if($val_nom->rut==$value->empleado){
									   	$apellido_paterno=str_replace(' ','',strtoupper($val_nom->apellido_paterno));
									   	$apellido_materno=str_replace(' ','',strtoupper($val_nom->apellido_materno));
									 	$nombres=strtoupper($val_nom->nombres);
									 	$nombre=$apellido_paterno.' '.$apellido_materno.' '.$nombres;
									 	$rest = substr($nombre,0,22);
									 	?>
									    <td><input type="text" class="form-control" name="nombre[]" id="nombre" value="<?= $rest ?>"></td>
									    <? } } ?>
									    <td><input type="text" class="form-control" name="monto[]" id="monto" value="<?= $liquido ?>"></td>
									  </tr>
									  <?  } } } ?>
									</table>
								</br>
								<center><button class="btn btn-primary">Generar txt</button></center>
							</form>
		                    	</div>
                	</div>
</div>
</section>