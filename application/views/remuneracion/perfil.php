<script type="text/javascript">
function setPdf(){
    var rut = document.getElementById('parserut').value;
    var url = '<?= base_url(); ?>control/infopdf/'+rut;
    window.open(url);    
}
</script>
<section id="content">
            <div class="container">
                
                <div class="tile" id="profile-main">
                    <div class="pm-overview c-overflow-dark">
                        <div class="pmo-pic">
                            <div class="p-relative">
                                    <? if($imagen!=NULL){ foreach($imagen-> result() as $valimg){ ?>
                                    <img class="img-responsive" src="<?= base_url(); ?>uploads/<?= $valimg->ruta ?>" alt=""> 
                                    <? } }else{ echo ''; }?>
                            </div>
                            
                        </div>
                        <div class="pmo-block pmo-contact hidden-xs">
                            <h2>Contacto</h2>
                            
                            <ul>
                                <? if($personales!=NULL){ foreach($personales-> result() as $valcont){  ?>
                                <li><i class="zmdi zmdi-phone"></i><?= $valcont->telefono ?></li>
                                <li><i class="zmdi zmdi-phone"></i><?= $valcont->celular ?></li>
                                <li><i class="zmdi zmdi-email"></i><?= $valcont->email ?></li>
                                <? } }else{ ?>
                                <li><i class="zmdi zmdi-phone"></i>0</li>
                                <li><i class="zmdi zmdi-phone"></i>0</li>
                                <li><i class="zmdi zmdi-email"></i>0</li>
                               <? } ?>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="pm-body clearfix">
                        <ul class="tab-nav tn-justified">
                            <li class="active"><a href="#">Información</a></li>
                        </ul>
                        
                        <div class="pmb-block">
                            <div class="pmbb-header">
                                <h2><i class="zmdi zmdi-account m-r-5"></i> Información Basica</h2>
                                
                                <ul class="actions">
                                    <li class="dropdown">
                                        <a href="" data-toggle="dropdown">
                                            <i class="zmdi zmdi-more-vert"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                           
                            <div class="pmbb-body p-l-30">
                                <div class="pmbb-view">
                                    <? if($empleado!=NULL){ foreach($empleado -> result() as $value1){ ?>
                                    <input type="hidden" id="parserut" value="<?= $value1->rut ?>"> 
                                    <dl class="dl-horizontal">
                                        <dt>RUT</dt>
                                        <dd><?= $value1->rut ?></dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Nombre Completo</dt>
                                        <dd><?= $value1->nombres.' '.$value1->apellido_paterno.' '.$value1->apellido_materno; ?></dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Genero</dt>
                                        <dd><?= $value1->sexo ?></dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Fecha Nacimiento</dt>
                                        <dd><?= date("d-m-Y",strtotime($value1->fecha_nacimiento)) ?></dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Nacionalidad</dt>
                                        <dd><?= $value1->nacionalidad ?></dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Estado Civil</dt>
                                        <dd><?= $value1->estado_civil ?></dd>
                                    </dl>
                                    <? } }else{ echo 'No existen datos.'; } ?>
                                </div>
                            </div>
                            
                        </div>
                    
                    
                        <div class="pmb-block">
                            <div class="pmbb-header">
                                <h2><i class="zmdi zmdi-account m-r-5"></i> Datos Personales</h2>
                                
                                <ul class="actions">
                                    <li class="dropdown">
                                        <a href="" data-toggle="dropdown">
                                            <i class="zmdi zmdi-more-vert"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="pmbb-body p-l-30">
                                <div class="pmbb-view">
                                    <? if($personales!=NULL){ foreach($personales-> result() as $value2){ ?> 
                                    <dl class="dl-horizontal">
                                        <dt>Dirección</dt>
                                        <dd><?= $value2->direccion ?></dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Comuna</dt>
                                        <dd><?= $value2->comuna ?></dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Ciudad</dt>
                                        <dd><?= $value2->ciudad ?></dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Banco</dt>
                                        <dd><?= $value2->banco ?></dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Cuenta</dt>
                                        <dd><?= $value2->cuenta ?></dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Numero de Cuenta</dt>
                                        <dd><?= $value2->ncuenta ?></dd>
                                    </dl>
                                    <? } }else{ echo 'No existen datos.'; } ?>
                                </div>
                            </div>
                        </div>

                        <div class="pmb-block">
                            <div class="pmbb-header">
                                <h2><i class="zmdi zmdi-account m-r-5"></i> Contrato</h2>
                                
                                <ul class="actions">
                                    <li class="dropdown">
                                        <a href="" data-toggle="dropdown">
                                            <i class="zmdi zmdi-more-vert"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="pmbb-body p-l-30">
                                <div class="pmbb-view">
                                    <? if($contrato!=NULL){ foreach($contrato-> result() as $value3){ ?>
                                    <dl class="dl-horizontal">
                                        <dt>Fecha de Inicio</dt>
                                        <dd><?= date("d-m-Y",strtotime($value3->fecha_contrato)) ?></dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Termino Contrato</dt>
                                        <dd><? if($value3->fecha_termino!=NULL){ echo date("d-m-Y",strtotime($value3->fecha_termino)); }else{ echo 'Vigente'; } ?></dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Tipo de Contrato</dt>
                                        <dd><?= $value3->tipo_contrato ?></dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Cargo</dt>
                                        <dd><?= $value3->cargo ?></dd>
                                    </dl>
                                    <? if($value3->observacion!=NULL){ ?>
                                    <dl class="dl-horizontal">
                                        <dt>Observacion</dt>
                                        <dd><?= $value3->observacion ?></dd>
                                    <? } ?>
                                    </dl>
                                    <? } }else{ echo 'No existen datos.'; } ?>
                                </div>
                            </div>
                        </div>
                         <div class="pmb-block">
                            <div class="pmbb-header">
                                <h2><i class="zmdi zmdi-account m-r-5"></i> Datos Previsionales</h2>
                                
                                <ul class="actions">
                                    <li class="dropdown">
                                        <a href="" data-toggle="dropdown">
                                            <i class="zmdi zmdi-more-vert"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="pmbb-body p-l-30">
                                <div class="pmbb-view">
                                     <? if($prevision!=NULL){ foreach($prevision-> result() as $value4){ ?>
                                    <dl class="dl-horizontal">
                                        <dt>Salud</dt>
                                        <dd><?= $value4->salud ?></dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Afp</dt>
                                        <dd><?= $value4->afp ?></dd>
                                    </dl>
                                    <? } }else{echo 'No existen datos.'; } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6"><button class="btn btn-primary" onClick="setPdf()">Descargar</button></div>
            <div class="col-md-6"></div>
            </div>
        </section>