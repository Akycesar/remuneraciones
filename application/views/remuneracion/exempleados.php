<script type="text/javascript">
function sure(line){
    var rut = $('#rut_emp'+line).val();
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
            window.setTimeout(location.href='eliminar/'+rut, 6000);
          } else {
            swal("Cancelado", "Su registro esta a salvo", "error");
          }
        });
         
     };
function sure2(line){
    var rut = $('#rut_emp'+line).val();
   swal({
          title: "Seguro?",
          text: "Estas a punto de vincular este empleado!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: 'btn-danger',
          confirmButtonText: 'Si, Vincular',
          cancelButtonText: "Cancelar",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm){
            swal("Vinculado!", "Redirigimos Enseguida!", "success");
            window.setTimeout(location.href='vincular/'+rut, 6000);
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
            <div class="heading"><h3>Ex-Empleados</h3></div>        
            <div class="tile">

                    <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                        <thead>
                            <tr>
                                <th data-field="rut" data-sortable="true">RUT</th>
                                <th data-field="apellidos" data-sortable="true">APELLIDOS</th>
                                <th data-field="nombres" data-sortable="true">NOMBRES</th>
                                <th data-field="empresa" data-sortable="true">EMPRESA</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <? if($empleados == NULL){ echo ''; }else{
                                $cont=1;
                                foreach($empleados -> result() as $value ){ ?>
                            <tr>
                                <td><?= $value->rut ?><input type="hidden" id="rut_emp<?= $cont ?>" value="<?= $value->rut ?>"></td>
                                <td><?= $value->apellido_paterno.' '.$value->apellido_materno ?></td>
                                <td><?= $value->nombres ?></td>
                                <td><?= $value->empresa ?></td>
                                <td><center><button class="btn btn-primary" onClick="location.href='perfil/<?= $value->rut ?>'"><li class="zmdi zmdi-eye"></li></button> <button class="btn btn-info" onClick="location.href='editar/<?= $value->rut ?>'"><li class="zmdi zmdi-edit"></li></button> <button class="btn btn-warning sweet-13" onclick="sure(<?= $cont ?>)"><li class="zmdi zmdi-delete"></li></button> <button class="btn btn-success sweet-13" onclick="location.href='listLiq/<?= $value->rut ?>'"><li class="zmdi zmdi-file-text"></li></button> <button class="btn btn-success sweet-13" onclick="sure2(<?= $cont ?>)"><li class="zmdi zmdi-lock-open"></li></button></center></td>
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