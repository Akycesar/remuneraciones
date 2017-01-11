<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Css -->
        <link href="css/bootstrap.css" rel="stylesheet" media="screen">
        <!-- Javascript -->
        <script src="js/jquery-2.0.2.js"></script>
        <script src="js/upload.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <style type="text/css">
        a.list-group-item {
    height:auto;
    min-height:220px;
}
a.list-group-item.active small {
    color:#fff;
}
.stars {
    margin:20px auto 1px;    
}
</style>
        <script type="text/javascript">
            function subirArchivos() {
                $("#archivo").upload('subir_archivo.php',
                {
                    nombre_archivo: $("#nombre_archivo").val(),
                    empresa: $("#empresa").val()
                },
                function(respuesta) {
                    //Subida finalizada.
                    $("#barra_de_progreso").val(0);
                    if (respuesta === 1) {
                        mostrarRespuesta('El archivo ha sido subido correctamente.', true);
                        $("#nombre_archivo, #archivo").val('');
                    } else {
                        mostrarRespuesta('El archivo NO se ha podido subir.', false);
                    }
                    mostrarArchivos();
                }, function(progreso, valor) {
                    //Barra de progreso.
                    $("#barra_de_progreso").val(valor);
                });
            }
            function eliminarArchivos(archivo) {
                $.ajax({
                    url: 'eliminar_archivo.php',
                    type: 'POST',
                    timeout: 10000,
                    data: {archivo: archivo},
                    error: function() {
                        mostrarRespuesta('Error al intentar eliminar el archivo.', false);
                    },
                    success: function(respuesta) {
                        if (respuesta == 1) {
                            mostrarRespuesta('El archivo ha sido eliminado.', true);
                        } else {
                            mostrarRespuesta('Error al intentar eliminar el archivo.', false);                            
                        }
                        mostrarArchivos();
                    }
                });
            }
            function mostrarArchivos() {
                var empresa = $("#empresa").val()
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    data: 'empresa='+empresa,
                    url: 'mostrar_archivos.php',
                    success: function(respuesta) {
                        if (respuesta) {
                            var html = '';
                            for (var i = 0; i < respuesta.length; i++) {
                                if (respuesta[i] != undefined) {
                                    html += '<div class="row"> <span class="col-md-6"> ' + respuesta[i] + ' </span> <div class="col-lg-2"> <a class="eliminar_archivo btn btn-danger" href="javascript:void(0);"> Eliminar </a> </div> </div> <hr />';
                                }
                            }
                            $("#archivos_subidos").html(html);
                        }
                    }
                });
            }
            function mostrarRespuesta(mensaje, ok){
                $("#respuesta").removeClass('alert-success').removeClass('alert-danger').html(mensaje);
                if(ok){
                    $("#respuesta").addClass('alert-success');
                }else{
                    $("#respuesta").addClass('alert-danger');
                }
            }
            $(document).ready(function() {
                mostrarArchivos();
                $("#boton_subir").on('click', function() {
                    subirArchivos();
                });
                $("#archivos_subidos").on('click', '.eliminar_archivo', function() {
                    var archivo = $(this).parents('.row').eq(0).find('span').text();
                    archivo = $.trim(archivo);
                    eliminarArchivos(archivo);
                });
            });
        </script>
    </head>
    <body>
  
    </body>
</html>


<div class="container">
    <div class="row">
        <div class="well">
        <h1 class="text-center">Seleccione los Archivos</h1>
        <h3 class="text-center">Cliente Rut: <?= $_GET['rut']; ?></h3>
        <div class="list-group">
          <a href="" class="list-group-item active">
                <div class="media col-md-3">
                    <figure class="pull-left">
                        <img class="media-object img-rounded img-responsive"  src="http://www.gpscontrol.cl/formularios/application/img/logo2.png" alt="gpscontol.cl" >
                    </figure>
                </div>
                <div class="col-md-6">
                    <h4 class="list-group-item-heading"> Información </h4>
                    <br>
                    <p class="list-group-item-text"> Adjuntar copia digitalizada del Rut de la Empresa y del Representante Legal, estas pueden estar en cualquier formato de imagen, texto, o de compresión.</p> 
                    <p class="list-group-item-text"> Si es Persona Natural, debe adjuntar copia de carnet de identidad por ambos lados.
                    </p>
                </div>
                <div class="col-md-3 text-center">
                    <img class="media-object img-rounded img-responsive"  src="http://www.gpscontrol.cl/formularios/application/img/abc.png" alt="gpscontol.cl" >
                </div>
          </a>
            <div class="container">
            <div id="respuesta" class="alert"></div>
            <form action="javascript:void(0);">
                <?
                $rut_empresa = $_GET['rut'];
                ?>
                <div class="row">
                    <input type="text" name="empresa" id="empresa" value="<?= $rut_empresa; ?>" hidden/>
                    <div class="col-lg-2"> 
                        <label> Nombre el archivo: </label> 
                    </div>
                    <div class="col-lg-2">
                        <input type="text" name="nombre_archivo" id="nombre_archivo" autocomplete="off" placeholder="Etiqueta para el archivo"/>
                    </div>
                    <div class="col-lg-2">
                        <input type="file" name="archivo" id="archivo" />
                    </div>                    
                </div>
                <hr />
                <div class="row">
                    <div class="col-lg-2">
                        <input type="submit" id="boton_subir" value="Subir" class="btn btn-success" />
                    </div>
                    <div class="col-lg-4">
                        <progress id="barra_de_progreso" value="0" max="100"></progress>
                    </div>
                </div>
            </form>
            <hr />
            <div id="archivos_subidos"></div>
    
                </div>
            
          <br><br>
                      <center><a href="http://www.gpscontrol.cl/formularios/index.php/registro/susses"><button type="submit" class="btn btn-primary">Finalizar</button></a></center>
        </div>
        </div>
    </div>
</div>