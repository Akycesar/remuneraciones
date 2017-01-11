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
                                                
                            <ul>
                                <? if($empleado!=NULL){ foreach($empleado-> result() as $valcont){  ?>
                                <li><i class="zmdi zmdi-account-o"></i><?= $valcont->nombres.' '.$valcont->apellido_paterno.' '.$valcont->apellido_materno ?></li>
                                <li><i class="zmdi zmdi-pin-account"></i><?= $valcont->rut ?></li>
                            </br>
                                <? } } ?>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="pm-body clearfix">
                        <table id="data-table-command" class="table table-bordered table-vmiddle">
                        <thead>
                            <tr>
                                <th data-column-id="rut">Mes</th>
                                <th data-column-id="apellidos">Año</th>
                                <th data-column-id="commands" data-sortable="false">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <? if($liquidacion == NULL){ echo 'No hay liquidaciones'; }else{
                                $cont=1;
                                foreach($liquidacion -> result() as $value ){ ?>
                            <tr>
                                <td><?= $value->mes ?></td>
                                <td><?= $value->year ?></td>
                                <td><center><button class="btn btn-primary" onClick="window.open('http://remuneracion.ingetecservice.cl/remuneracion/control/liquidacionpdf/<?= $value->empleado ?>/<?= $value->mes ?>/<?= $value->year ?>')"><li class="zmdi zmdi-eye"></li></button></center></td>
                            </tr>
                            <? $cont=$cont+1; } } ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            
        </section>