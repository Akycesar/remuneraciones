<section id="content">
	<div class="tile">
                    <div class="t-header">
                        <div class="th-title">Editar Empresa</div>
                    </div>
                    <div class="t-body tb-padding">
                        <? if($empresa!=NULL){ foreach($empresa -> result() as $value){ ?>
                        <form class="row" role="form" action="actualizarempresa" method="post">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    Rut<input type="text" class="form-control" id="rut" name="rut" placeholder="Rut de la Empresa" value="<?= $value->rut ?>" readonly>
                                </div>
                            </div>
                            
                            <div class="col-sm-3">
                                <div class="form-group">
                                    Razon Social<input type="text" class="form-control" id="rs" name="rs" placeholder="Razon social" value="<?= $value->rs ?>">
                                </div>
                            </div>
                            
                            <div class="col-sm-3">
                                <div class="form-group">
                                    Direccion<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Razon social" value="<?= $value->direccion ?>">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    Telefono<input type="text" class="form-control" id="telefono" name="telefono" placeholder="Razon social" value="<?= $value->telefono ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary btn-sm m-t-5">Actualizar</button>
                            </div>
                        </form>
                        <? } }else{ echo 'No hay Una empresa Seleccionada'; } ?>
                    </div>
                </div>
</section>