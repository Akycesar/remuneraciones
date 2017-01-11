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
          text: "Estas a punto de desvincular este empleado!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: 'btn-danger',
          confirmButtonText: 'Si, Desvincular',
          cancelButtonText: "Cancelar",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm){
            swal("Desvinculado!", "Redirigimos Enseguida!", "success");
            window.setTimeout(location.href='desvinculado/'+rut, 6000);
          } else {
            swal("Cancelado", "Su registro esta a salvo", "error");
          }
        });
         
     };
function copiar(line){
  var cont = line;
  document.getElementById('empleado_documento').value=document.getElementById('rut_emp'+cont).value;
  document.getElementById('wow').value=document.getElementById('nombre_emp'+cont).value;
}
</script>
<link href="<?= base_url(); ?>asset/css/bootstrap-table.css" rel="stylesheet">
<link href="<?= base_url(); ?>asset/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
<section id="content">
            <div class="container">
            <div class="heading"><h3>Documentos</h3></div>       
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
                                <td><?= $value->apellido_paterno.' '.$value->apellido_materno ?><input type="hidden" id="nombre_emp<?= $cont ?>" value="<?= $value->nombres.' '.$value->apellido_paterno ?>"></td>
                                <td><?= $value->nombres ?></td>
                                <td><?= $value->empresa ?></td>
                                <td><center> <button title="Cargar Documentos" class="btn btn-danger sweet-13" data-toggle="modal" data-target="#upload" onClick="copiar(<?= $cont ?>)"><li class="zmdi zmdi-cloud-upload"></li></button>    <button title="Ver Documentos" class="btn btn-success sweet-13" onclick="location.href='listDoc/<?= $value->rut ?>'"><li class="zmdi zmdi-file-text"></li></button></center></td>
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


<div id="upload" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                    <center><h3 class="modal-title">Nuevo Documento</h3></center>
                </div>
                <div class="modal-body">
                   
                 <div id="formulario_imagenes" class="row">
          <span><?php echo validation_errors(); ?></span>
  <?=form_open_multipart(base_url()."control/cargar_archivo")?>
    <div class="col-md-2">Empleado</div><div class="col-md-4"><input type="text" name="empleado_documento" id="empleado_documento" class="form-control" readonly/></div><div class="col-md-6"><input id="wow" class="form-control" readonly></div>
    <div class="col-md-12"></div>
    <div class="col-md-2">Tipo</div><div class="col-md-10"><select name="tipo_doc" class="form-control"><option>ANEXO</option><option>CONTRATO</option><option>CERTIFICADO</option><option>FINIQUITO</option><option>FOTOCOPIA</option><option>INFORME</option><option>OTRO</option></select></div>
    <div class="col-md-12"></div>
    <div class="col-md-2">Descripcion</div><div class="col-md-10"><textarea name="descripcion" placeholder="Descripcion" class="form-control"></textarea></div>
    <div class="col-md-12"></div>
    <div class="col-md-2"></div><div class="col-md-8"><input type="file" name="userfile" class="form-control"/></div><div class="col-md-2"><button class="btn btn-primary" onClick="submit()">Subir</button></div>
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