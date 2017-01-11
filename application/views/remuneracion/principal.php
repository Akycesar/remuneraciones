<head>        
        <link href="<?= base_url(); ?>asset/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="<?= base_url(); ?>asset/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="<?= base_url(); ?>asset/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">
        
        <link href="<?= base_url(); ?>asset/css/app.min.css" rel="stylesheet">
        <link href="<?= base_url(); ?>asset/css/demo.css" rel="stylesheet">
    </head>
 <section id="content">
            <div class="container">
                <div class="tile">
                    <div class="t-header">
                        <div class="th-title"><center><font color="red"><h3><?= $rs.' / '.$mes.' '.$year ?></h3></font></center></div>
                    </div>
                     <?
                    $mes=date('m');
                    $año=date("Y");
                    switch ($mes) {
                        case '01':
                            $mes_actual="Enero";
                            break;
                        case '02':
                            $mes_actual="Febrero";
                            break;
                        case '03':
                            $mes_actual="Marzo";
                            break;
                        case '04':
                            $mes_actual="Abril";
                            break;
                        case '05':
                            $mes_actual="Mayo";
                            break;
                        case '06':
                            $mes_actual="Junio";
                            break;
                        case '07':
                            $mes_actual="Julio";
                            break;
                        case '08':
                            $mes_actual="Agosto";
                            break;
                        case '09':
                            $mes_actual="Septiembre";
                            break;
                        case '10':
                            $mes_actual="Octubre";
                            break;
                        case '11':
                            $mes_actual="Noviembre";
                            break;
                        case '12':
                            $mes_actual="Diciembre";
                            break;
                    }
                    ?>
                <div class="row">
                    <div class="col-sm-2">
                    </div>
                        
                    <div class="col-sm-8">
                        <div class="tile">
                            <div class="t-header th-alt bg-orange">
                                <div class="th-title">Seleccione un Mes distinto para el sistema.</div>
                            </div>
                            <div class="t-body tb-padding bg-bluegray">
                                <form name="seleccion" action="changeDate" method="post">
                                <div class="row">
                                <div class="col-sm-4"><select id="mes" name="mes" class="form-control"><option><?= $mes_actual ?></option><option></option><option>Enero</option><option>Febrero</option><option>Marzo</option><option>Abril</option>
                                <option>Mayo</option><option>Junio</option><option>Julio</option><option>Agosto</option><option>Septiembre</option><option>Octubre</option><option>Noviembre</option><option>Diciembre</option></select></div>
                                <div class="col-sm-4"><select id="year" name="year" class="form-control"><option><?= $año ?></option><option></option><option>2010</option><option>2011</option><option>2012</option><option>2013</option><option>2014</option><option>2015</option><option>2016</option><option>2017</option><option>2018</option></select></div>
                                <div class="col-sm-4"><button class="btn btn-primary">Validar</button> </div> 
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-2">
                        
                    </div>
                </div>
            </div>

                    <div class="t-body tb-padding">
                        <div class="row">
                            <div class="col-sm-3 col-xs-6"></div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="t-header th-alt bg-red">
                                <div class="th-title"><h4><center>Crear Empresa</center></h4></div>
                                </div>
                                <div class="t-body tb-padding bg-orange">
                                    <center><span class="code"><a href="crearEmpresa"><img src="<?= base_url(); ?>application/img/enterprice.png"></a></span></center>
                                </div>
                            </div>
                        
                            <div class="col-sm-3 col-xs-6">
                                <div class="t-header th-alt bg-blue">
                                <div class="th-title"><h4><center>Editar Empresa</center></h4></div>
                                </div>
                                <div class="t-body tb-padding bg-orange">
                                    <center><span class="code"><a href="editarEmpresa"><img src="<?= base_url(); ?>application/img/enterprice.png"></a></span></center>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6"></div>
                        </div>
                        <div class="row">
                            <hr>
        <? if($empresa!=null){ ?>
                    <div class="t-header">
                        <div class="th-title"><small>Pinche una empresa para mantenerla activa en esta sesion.</small></div>
                    </div>

        <? foreach($empresa -> result() as $value){ ?>

                            <div class="col-sm-3 col-xs-6">
                                <div class="color-block bg-green">
                                    <p><span class="color">
                                    <?= $value->rs ?>
                                      </span>
                                      <span class="code"><a href="globalEmpresa/<?= $value->rut ?>/"><img src="<?= base_url(); ?>application/img/empresa.png"></a></span>
                                      <span class="less">
                                      <?= $value->rut ?>
                                      </span>
                                </div>
                            </div>
        <? } }else{ echo 'No hay empresas creadas.'; } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="<?= base_url(); ?>asset/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?= base_url(); ?>asset/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?= base_url(); ?>asset/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="<?= base_url(); ?>asset/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>