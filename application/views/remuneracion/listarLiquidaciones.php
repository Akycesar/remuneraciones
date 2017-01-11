<script type="text/javascript">
function sure(line){
    var rut = $('#rut'+line).val();
    var mes = $('#mes'+line).val();
    var year = $('#year'+line).val();
   swal({
          title: "Seguro?",
          text: "Estas a punto de eliminar este registro!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: 'btn-danger',
          confirmButtonText: 'Si, Eliminar',
          cancelButtonText: "Cancelar",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm){
            swal("Eliminando!", "Lo eliminamos en Seguida!", "success");
            window.setTimeout(location.href='eliminarLiq/'+rut+'/'+mes+'/'+year, 6000);
          } else {
            swal("Cancelado", "Su registro esta a salvo", "error");
          }
        });
         
     };
</script>
<link href="<?= base_url(); ?>asset/css/bootstrap-table.css" rel="stylesheet">
<link href="<?= base_url(); ?>asset/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
<section id="content">
            <div class="container">       
            <div class="tile">
                    
                     <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                        <thead>
                            <tr>
                                <th data-field="empleado" data-sortable="true">Empleado</th>
                                <th data-field="mes" data-sortable="true">Mes</th>
                                <th data-field="año" data-sortable="true">Año</th>
                                <th data-field="empresa" data-sortable="true">EMPRESA</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <? if($liquidaciones == NULL){ echo ''; }else{
                                $cont=1;
                                foreach($liquidaciones -> result() as $value ){ ?>
                            <tr>
                                <td><? foreach($empleados -> result() as $valemp){ if($value->empleado==$valemp->rut){ echo $valemp->nombres.' '.$valemp->apellido_paterno.' '.$valemp->apellido_materno; } } ?><input type="hidden" id="rut<?= $cont ?>" value="<?= $value->empleado ?>" ></td>
                                <td><?= $value->mes ?><input type="hidden" id="mes<?= $cont ?>" value="<?= $value->mes ?>" ></td>
                                <td><?= $value->year ?><input type="hidden" id="year<?= $cont ?>" value="<?= $value->year ?>" ></td>
                                <td><?= $value->empresa ?></td>
                                <td><center><button title="Ver liquidacion" class="btn btn-primary" onClick="window.open('http://remuneracion.ingetecservice.cl/remuneracion/control/liquidacionpdf/<?= $value->empleado ?>/<?= $value->mes ?>/<?= $value->year ?>')"><li class="zmdi zmdi-eye"></li></button> <button title="Eliminar Liquidacion" class="btn btn-warning sweet-13" onclick="sure(<?= $cont ?>)"><li class="zmdi zmdi-delete"></li></button></center></td>
                            </tr>
                            <? $cont=$cont+1; } } ?>
                        </tbody>
                    </table>

            </div>
        </div>
        </section>
        <script src="<?= base_url(); ?>asset/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
         <script src="<?= base_url(); ?>asset/js/jquery-1.11.1.min.js"></script>
        <script src="<?= base_url(); ?>asset/js/bootstrap.min.js"></script>
        <script src="<?= base_url(); ?>asset/js/bootstrap-table.js"></script>