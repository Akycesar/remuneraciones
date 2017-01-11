<script src="<?= base_url(); ?>application/js/previred.js"></script>
<section id="content">
            <div class="container">
                <header class="page-header">
                    <h3>Indicadores Previsionales Previred </h3>
                </header>
                
                <div class="row">
                    <div class="col-sm-6">
                        <!-- Margin -->
                        <div class="tile">
                            <div class="t-header bg-ace">
                                <div class="th-title">Valor UF</div>
                            </div>
        					<div class="t-body tb-padding">
                                <? if($uf!=NULL){ foreach($uf -> result() as $value){ ?>
                            <div class="row">
                  				<div class="col-md-4"><input type="text" class="form-control" name="uf1" id="uf1" placeholder="valor" value="<?= $value->uf1 ?>"></div>
                  				<div class="col-md-4"><input type="text" class="form-control" name="mes1" id="mes1" placeholder="mes" value="<?= $mes; ?>" readonly></div>
                  				<div class="col-md-4"><input type="text" class="form-control" name="year" id="year" placeholder="year" value="<?= $year; ?>" readonly></div>
              				</div>
              				<br>
              				<div class="row">
                  				<div class="col-md-4"></div>
                  				<div class="col-md-4"></div>
                                <div class="col-md-12" id="mensajeuf"></div>
                  				<div class="col-md-4"><button class="btn btn-primary" onClick="crearUf()">Guardar</button></div>
              				</div>
                            <? } }else{ ?>
                            <div class="row">
                                <div class="col-md-4"><input type="text" class="form-control" name="uf1" id="uf1" placeholder="valor" value=""></div>
                                <div class="col-md-4"><input type="text" class="form-control" name="mes1" id="mes1" placeholder="mes" value="<?= $mes; ?>" readonly></div>
                                <div class="col-md-4"><input type="text" class="form-control" name="year" id="year" placeholder="year" value="<?= $year; ?>" readonly></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                                <div class="col-md-12" id="mensajeuf"></div>
                                <div class="col-md-4"><button class="btn btn-primary" onClick="crearUf()">Guardar</button></div>
                            </div>
                        <? }  ?>
              			</div>
                        </div>
                        <div class="tile">
                            <div class="t-header bg-ace">
                                <div class="th-title">UTM</div>
                            </div>
        					<div class="t-body tb-padding">
                                <? if($utm!=NULL){ foreach($utm -> result() as $value2){ ?>
              				<div class="row">
                  				<div class="col-md-4"><input type="text" class="form-control" name="utm" id="utm" placeholder="Periodo" value="<?= $value2->valor ?>"></div>
                  				<div class="col-md-4"><input type="text" class="form-control" name="mes1" id="mes1" placeholder="mes" value="<?= $mes; ?>" readonly></div>
                                <div class="col-md-4"><input type="text" class="form-control" name="year" id="year" placeholder="year" value="<?= $year; ?>" readonly></div>
                                <div class="col-md-12" id="mensajeutm"></div>
                  				<div class="col-md-4"><button class="btn btn-primary" onClick="crearUtm()">Guardar</button></div>
              				</div>
                                 <? } }else{ ?>
                            <div class="row">
                                <div class="col-md-4"><input type="text" class="form-control" name="utm" id="utm" placeholder="Valor" value=""></div>
                                <div class="col-md-4"><input type="text" class="form-control" name="mes1" id="mes1" placeholder="mes" value="<?= $mes; ?>" readonly></div>
                                <div class="col-md-4"><input type="text" class="form-control" name="year" id="year" placeholder="year" value="<?= $year; ?>" readonly></div>
                                <div class="col-md-12" id="mensajeutm"></div>
                                <div class="col-md-4"><button class="btn btn-primary" onClick="crearUtm()">Guardar</button></div>
                            </div>
                                 <? } ?>
              			</div>
                        </div>
        
                        <!-- Font Size -->
                        <div class="tile">
                            <div class="t-header bg-ace">
                                <div class="th-title">Rentas Topes Imponibles</div>
                            </div>
        
                            <div class="t-body tb-padding">
                        <? if($rti!=NULL){ foreach($rti -> result() as $value3){ ?>
                                <table class="table">
                            <tbody>
                                <tr>
                                    <td><input type="text" class="form-control" name="mes1" id="mes1" placeholder="mes" value="<?= $mes; ?>" readonly></td>
                                    <td><input type="text" class="form-control" name="year" id="year" placeholder="year" value="<?= $year; ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Para Afiliados a una AFP (74,3 UF):</td>
                                    <td><input id="rti1" value="<?= $value3->rti1 ?>" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Para Afiliados al Inp (60 UF):</td>
                                    <td><input id="rti2" value="<?= $value3->rti2 ?>" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Para Seguro de Cesartia (111,4 UF):</td>
                                    <td><input id="rti3" value="<?= $value3->rti3 ?>" class="form-control"></td>
                                </tr>
                            </tbody>
                        </table>
                        <? } }else{ ?>
                            <table class="table">
                            <tbody>
                                <tr>
                                    <td><input type="text" class="form-control" name="mes1" id="mes1" placeholder="mes" value="<?= $mes; ?>" readonly></td>
                                    <td><input type="text" class="form-control" name="year" id="year" placeholder="year" value="<?= $year; ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Para Afiliados a una AFP (74,3 UF):</td>
                                    <td><input id="rti1" value="" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Para Afiliados al Inp (60 UF):</td>
                                    <td><input id="rti2" value="" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Para Seguro de Cesartia (111,4 UF):</td>
                                    <td><input id="rti3" value="" class="form-control"></td>
                                </tr>
                            </tbody>
                        </table>
                        <? } ?>
                        <div class="col-md-12" id="mensajerti"></div>
                        <div class="row">
                  				<div class="col-md-4"></div>
                  				<div class="col-md-4"></div>
                  				<div class="col-md-4"><button class="btn btn-primary" onClick="crearRti()">Guardar</button></div>
              				</div>
                        </div>
                        
                        </div>
        
                        <!-- Text Color -->
                        <div class="tile">
                            <div class="t-header bg-ace">
                                <div class="th-title">Rentas Minimas Imponibles</div>
                            </div>
        
                            <div class="t-body tb-padding">
                        <? if($rmi!=NULL){ foreach($rmi -> result() as $value4){ ?>
                                <table class="table">
                            <tbody>
                                <tr>
                                    <td><input type="text" class="form-control" name="mes1" id="mes1" placeholder="mes" value="<?= $mes; ?>" readonly></td>
                                    <td><input type="text" class="form-control" name="year" id="year" placeholder="year" value="<?= $year; ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Trab. Dependientes e Independientes:</td>
                                    <td><input id="rmi1" value="<?= $value4->rmi1 ?>"></td>
                                </tr>
                                <tr>
                                    <td>Menores de 18 y mayores de 65:</td>
                                    <td><input id="rmi2" value="<?= $value4->rmi2 ?>"></td>
                                </tr>
                                <tr>
                                    <td>Trabajadores de Casa Particular:</td>
                                    <td><input id="rmi3" value="<?= $value4->rmi3 ?>"></td>
                                </tr>
                                <tr>
                                    <td>Para fines no Remunerados:</td>
                                    <td><input id="rmi4" value="<?= $value4->rmi4 ?>"></td>
                                </tr>
                            </tbody>
                        </table>
                        <? } }else{ ?>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><input type="text" class="form-control" name="mes1" id="mes1" placeholder="mes" value="<?= $mes; ?>" readonly></td>
                                    <td><input type="text" class="form-control" name="year" id="year" placeholder="year" value="<?= $year; ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Trab. Dependientes e Independientes:</td>
                                    <td><input id="rmi1" value=""></td>
                                </tr>
                                <tr>
                                    <td>Menores de 18 y mayores de 65:</td>
                                    <td><input id="rmi2" value=""></td>
                                </tr>
                                <tr>
                                    <td>Trabajadores de Casa Particular:</td>
                                    <td><input id="rmi3" value=""></td>
                                </tr>
                                <tr>
                                    <td>Para fines no Remunerados:</td>
                                    <td><input id="rmi4" value=""></td>
                                </tr>
                            </tbody>
                        </table>
                        <? } ?>
                        <div class="col-md-12" id="mensajermi"></div>
                        <div class="row">
                  				<div class="col-md-4"></div>
                  				<div class="col-md-4"></div>
                  				<div class="col-md-4"><button class="btn btn-primary" onClick="crearRmi()">Guardar</button></div>
              				</div>
                            </div>
                            
                        </div>
        
                        <!-- Text Align-->
                        <div class="tile">
                            <div class="t-header bg-ace">
                                <div class="th-title">Ahorro Previsional Voluntario (APV)</div>
                            </div>
        
                            <div class="t-body tb-padding">
                        <? if($apv!=NULL){ foreach($apv -> result() as $value5){ ?>
                                <table class="table">
                            <tbody>
                                <tr>
                                    <td><input type="text" class="form-control" name="mes1" id="mes1" placeholder="mes" value="<?= $mes; ?>" readonly></td>
                                    <td><input type="text" class="form-control" name="year" id="year" placeholder="year" value="<?= $year; ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Tope Mensual (50 UF):</td>
                                    <td><input id="apv1" value="<?= $value5->apv1 ?>"></td>
                                </tr>
                                <tr>
                                    <td>Tope Anual (600 UF):</td>
                                    <td><input id="apv2" value="<?= $value5->apv2 ?>"></td>
                                </tr>
                            </tbody>
                        </table>
                        <? } }else{ ?>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><input type="text" class="form-control" name="mes1" id="mes1" placeholder="mes" value="<?= $mes; ?>" readonly></td>
                                    <td><input type="text" class="form-control" name="year" id="year" placeholder="year" value="<?= $year; ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Tope Mensual (50 UF):</td>
                                    <td><input id="apv1" value=""></td>
                                </tr>
                                <tr>
                                    <td>Tope Anual (600 UF):</td>
                                    <td><input id="apv2" value=""></td>
                                </tr>
                            </tbody>
                        </table>
                        <? } ?>
                        <div class="col-md-12" id="mensajeapv"></div>
                        <div class="row">
                  				<div class="col-md-4"></div>
                  				<div class="col-md-4"></div>
                  				<div class="col-md-4"><button class="btn btn-primary" onClick="crearApv()">Guardar</button></div>
              				</div>
                            </div>
                            
                        </div>
        
                        <!-- Overflow -->
                        <div class="tile">
                            <div class="t-header bg-ace">
                                <div class="th-title">Deposito Convenido</div>
                            </div>
        
                            <div class="t-body tb-padding">
                        <? if($dc!=NULL){ foreach($dc -> result() as $value6){ ?>
                                <table class="table">
                            <tbody>
                                 <tr>
                                    <td><input type="text" class="form-control" name="mes1" id="mes1" placeholder="mes" value="<?= $mes; ?>" readonly></td>
                                    <td><input type="text" class="form-control" name="year" id="year" placeholder="year" value="<?= $year; ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Tope Anual (900 UF):</td>
                                    <td><input id="dc1" value="<?= $value6->dc1 ?>"></td>
                                </tr>
                            </tbody>
                        </table>
                        <? } }else{ ?>
                        <table class="table">
                            <tbody>
                                 <tr>
                                    <td><input type="text" class="form-control" name="mes1" id="mes1" placeholder="mes" value="<?= $mes; ?>" readonly></td>
                                    <td><input type="text" class="form-control" name="year" id="year" placeholder="year" value="<?= $year; ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Tope Anual (900 UF):</td>
                                    <td><input id="dc1" value=""></td>
                                </tr>
                            </tbody>
                        </table>
                        <? } ?>
                        <div class="col-md-12" id="mensajedc"></div>
                        <div class="row">
                  				<div class="col-md-4"></div>
                  				<div class="col-md-4"></div>
                  				<div class="col-md-4"><button class="btn btn-primary" onClick="crearDc()">Guardar</button></div>
              				</div>
                            </div>
                            
                        </div>
        
                        <!-- Image replacement -->
                        <div class="tile">
                            <div class="t-header bg-ace">
                                <div class="th-title">Seguro de Cesantia (AFC)</div>
                            </div>
        
                            <div class="t-body tb-padding">
                        <? if($sc!=NULL){ foreach($sc -> result() as $value7){ ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Tipo Contrato</th>
                                    <th>empleador</th>
                                    <th>Trabajador</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Plazo Indefinido:</td>
                                    <td><input id="sce1" value="<?= $value7->sce1 ?>"></td>
                                    <td><input id="sct1" value="<?= $value7->sct1 ?>"></td>
                                </tr>
                                <tr>
                                    <td>Plazo Fijo:</td>
                                    <td><input id="sce2" value="<?= $value7->sce2 ?>"></td>
                                    <td><input id="sct2" value="<?= $value7->sct2 ?>"></td>
                                </tr>
                                <tr>
                                    <td>Plazo Indefinido 11 Años o mas:</td>
                                    <td><input id="sce3" value="<?= $value7->sce3 ?>"></td>
                                    <td><input id="sct3" value="<?= $value7->sct3 ?>"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="text" class="form-control" name="mes1" id="mes1" placeholder="mes" value="<?= $mes; ?>" readonly></td>
                                    <td><input type="text" class="form-control" name="year" id="year" placeholder="year" value="<?= $year; ?>" readonly></td>
                                </tr>
                            </tbody>
                        </table>
                        <? } }else{ ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Tipo Contrato</th>
                                    <th>empleador</th>
                                    <th>Trabajador</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Plazo Indefinido:</td>
                                    <td><input id="sce1" value=""></td>
                                    <td><input id="sct1" value=""></td>
                                </tr>
                                <tr>
                                    <td>Plazo Fijo:</td>
                                    <td><input id="sce2" value=""></td>
                                    <td><input id="sct2" value="0"></td>
                                </tr>
                                <tr>
                                    <td>Plazo Indefinido 11 Años o mas:</td>
                                    <td><input id="sce3" value=""></td>
                                    <td><input id="sct3" value="0"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="text" class="form-control" name="mes1" id="mes1" placeholder="mes" value="<?= $mes; ?>" readonly></td>
                                    <td><input type="text" class="form-control" name="year" id="year" placeholder="year" value="<?= $year; ?>" readonly></td>
                                </tr>
                            </tbody>
                        </table>
                        <? } ?>
                        <div class="col-md-12" id="mensajesc"></div>
                        <div class="row">
                  				<div class="col-md-4"></div>
                  				<div class="col-md-4"></div>
                  				<div class="col-md-4"><button class="btn btn-primary" onClick="crearSc()">Guardar</button></div>
              				</div>
                            </div>
                            
                        </div>
                          
                    </div>
            
                    <div class="col-sm-6">
                        <!-- Padding -->
                        <div class="tile">
                            <div class="t-header bg-ace">
                                <div class="th-title"</div>
                            </div>
        
                            <div class="t-body tb-padding">
<table width="100%" border="1">
  <tr>
    <th width="20%" rowspan="4" scope="col"><center>AFP</center></th>
    <th colspan="3" scope="col"><center>TASA COTIZACION OBLIGATORIA AFP</center></th>
  </tr>
  <tr>
    <td colspan="3" align="center">Tasa AFP Trabajadores</td>
  </tr>
  <tr>
    <td colspan="2" align="center">Dependientes</td>
    <td width="30%" align="center">Independientes</td>
  </tr>
  <tr>
    <td width="24%" align="center">Tasa AFP</td>
    <input type="hidden" class="form-control" name="mes1" id="mes1" placeholder="mes" value="<?= $mes; ?>" readonly>
    <input type="hidden" class="form-control" name="year" id="year" placeholder="year" value="<?= $year; ?>" readonly>
    <td width="26%" align="center">SIS (1) (2)</td>
    <td align="center">Tasa AFP (3)</td>
  </tr>
  <? if($afp!=NULL){ foreach($afp -> result() as $value8) { ?>
  <tr>
    <th scope="col"><input size="8" id="afp1" value="<?= $value8->afp1 ?>" class="form-control"></th>
    <td align="center"><input size="16" id="tafpd1" value="<?= $value8->tafpd1 ?>" class="form-control"></td>
    <td align="center"><input size="16" id="sisd1" value="<?= $value8->sisd1 ?>" class="form-control"></td>
    <td align="center"><input size="16" id="tafpi1" value="<?= $value8->tafpi1 ?>" class="form-control"></td>
  </tr>
  <? } }else{ ?>
  <? for($i = 1; $i <= 6; $i++){ ?>
  <tr>
    <th scope="col"><input size="8" id="afp<?= $i; ?>" value="" class="form-control" placeholder="Afp <?= $i ?>"></th>
    <td align="center"><input size="16" id="tafpd<?= $i; ?>" value="" class="form-control"></td>
    <td align="center"><input size="16" id="sisd<?= $i; ?>" value="" class="form-control"></td>
    <td align="center"><input size="16" id="tafpi<?= $i; ?>" value="" class="form-control"></td>
  </tr>
  <? } ?>
  <? } ?>
</table>
<div class="col-md-12" id="mensajeafp"></div>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4"><button class="btn btn-primary" onClick="crearAfp()">Guardar</button></div>
    <div class="col-md-4"></div>
</div>
                            </div>
                        </div></div>
        
                        <!-- Background Color -->
                        <div class="tile">
                            <div class="t-header bg-ace">
                                <div class="th-title">Asignación Familiar</div>
                            </div>
                    
                            <div class="t-body tb-padding">
                         <? if($af!=NULL){ foreach($af -> result() as $value9){ ?>   
                            <table class="table">
                            <thead>
                                <tr>
                                    <th>Tramo</th>
                                    <th>Monto</th>
                                    <th>Requisitos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>A</td>
                                    <td><input id="monto1" value="<?= $value9->monto1 ?>" class="form-control"></td>
                                    <td>Renta < o = $262.326</td>
                                </tr>
                                <tr>
                                    <td>B</td>
                                    <td><input id="monto2" value="<?= $value9->monto2 ?>" class="form-control"></td>
                                    <td>Renta > $262.326 < = 383.156</td>
                                </tr>
                                <tr>
                                    <td>C</td>
                                    <td><input id="monto3" value="<?= $value9->monto3 ?>" class="form-control"></td>
                                    <td>Renta > $383.156 < = 597.593</td>
                                </tr>
                                <tr>
                                    <td>D</td>
                                    <td><input id="monto4" value="<?= $value9->monto4 ?>" class="form-control"></td>
                                    <td>Renta > $ 597.593</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="text" class="form-control" name="mes1" id="mes1" placeholder="mes" value="<?= $mes; ?>" readonly></td>
                                    <td><input type="text" class="form-control" name="year" id="year" placeholder="year" value="<?= $year; ?>" readonly></td>
                                </tr>
                            </tbody>
                        </table>
                        <? } }else{ ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Tramo</th>
                                    <th>Monto</th>
                                    <th>Requisitos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>A</td>
                                    <td><input id="monto1" value="" class="form-control"></td>
                                    <td>Renta < o = $262.326</td>
                                </tr>
                                <tr>
                                    <td>B</td>
                                    <td><input id="monto2" value="" class="form-control"></td>
                                    <td>Renta > $262.326 < = 383.156</td>
                                </tr>
                                <tr>
                                    <td>C</td>
                                    <td><input id="monto3" value="" class="form-control"></td>
                                    <td>Renta > $383.156 < = 597.593</td>
                                </tr>
                                <tr>
                                    <td>D</td>
                                    <td><input id="monto4" value="" class="form-control"></td>
                                    <td>Renta > $ 597.593</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="text" class="form-control" name="mes1" id="mes1" placeholder="mes" value="<?= $mes; ?>" readonly></td>
                                    <td><input type="text" class="form-control" name="year" id="year" placeholder="year" value="<?= $year; ?>" readonly></td>
                                </tr>
                            </tbody>
                        </table>
                        <? } ?>
                        <div class="col-md-12" id="mensajeaf"></div>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4"><button class="btn btn-primary" onClick="crearAf()">Guardar</button></div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                </div>
                        <div class="tile">
                            <div class="t-header bg-ace">
                                <div class="th-title">MONTO DE CÁLCULO DEL IMPUESTO ÚNICO DE SEGUNDA CATEGORÍA</div>
                            </div>
                    
                            <div class="t-body tb-padding">
                                <input type="text" class="form-control" name="mes1" id="mes1" placeholder="mes" value="<?= $mes; ?>" readonly>
                                <input type="text" class="form-control" name="year" id="year" placeholder="year" value="<?= $year; ?>" readonly>
                                <table class="table">
                                    <thead>
                                        <th>Desde</th>
                                        <th>Hasta</th>
                                        <th>Factor</th>
                                        <th>Descuento</th>
                                    </thead>
                                    <? if($impuesto!=NULL){ $count=1; foreach($impuesto -> result() as $value10) { ?>
                                    <tbody>
                                        <tr>
                                            <td><input class="form-control" id="im_desde<?= $count; ?>" value="<?= $value10->desde ?>"></td>
                                            <td><input class="form-control" id="im_hasta<?= $count; ?>" value="<?= $value10->hasta ?>"></td>
                                            <td><input class="form-control" id="im_factor<?= $count; ?>" value="<?= $value10->factor ?>"></td>
                                            <td><input class="form-control" id="im_descuento<?= $count; ?>" value="<?= $value10->descuento ?>"></td>
                                        </tr>
                                    <? $count=$count+1; } }else{ ?>
                                     <tr>
                                            <td><input class="form-control" id="im_desde1"></td>
                                            <td><input class="form-control" id="im_hasta1"></td>
                                            <td><input class="form-control" id="im_factor1"></td>
                                            <td><input class="form-control" id="im_descuento1"></td>
                                        </tr>
                                        <tr>
                                            <td><input class="form-control" id="im_desde2"></td>
                                            <td><input class="form-control" id="im_hasta2"></td>
                                            <td><input class="form-control" id="im_factor2"></td>
                                            <td><input class="form-control" id="im_descuento2"></td>
                                        </tr>
                                        <tr>
                                            <td><input class="form-control" id="im_desde3"></td>
                                            <td><input class="form-control" id="im_hasta3"></td>
                                            <td><input class="form-control" id="im_factor3"></td>
                                            <td><input class="form-control" id="im_descuento3"></td>
                                        </tr>
                                    <? } ?>  
                                    </tbody>
                                </table>
                        <div class="col-md-12" id="mensajeimpuesto"></div>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4"><button class="btn btn-primary" onClick="crearImpuesto()">Guardar</button></div>
                            <div class="col-md-4"></div>
                        </div>
                            </div>
                        </div><!-- div del tile -->
                            </div>
                        </div>
            </div>
        </section>