<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="format-detection" content="telephone=no">
        <meta charset="UTF-8">

        <meta name="description" content="remuneracion">
        <meta name="keywords" content="remuneracion">

        <title>Sistema Remuneracion</title>
        <link rel="icon" type="image/png" href="<?= base_url(); ?>application/img/favicon.png" />
        <link href="<?= base_url(); ?>asset/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="<?= base_url(); ?>asset/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        
        <link href="<?= base_url(); ?>asset/css/app.min.css" rel="stylesheet">
    </head>

    <body class="login-content">
    <?php
    $username = array('name' => 'username', 'placeholder' => 'nombre de usuario', 'autocomplete'=>'off', 'class' => 'form-control');
    $password = array('name' => 'password', 'placeholder' => 'introduce tu clave', 'class' => 'form-control');
    $submit = array('name' => 'submit', 'value' => 'Iniciar sesión', 'title' => 'Iniciar sesión', 'class' => 'btn btn-primary btn-info btn-block');
    ?>
        <!-- Login -->
        
        <div class="lc-block toggled" id="l-login">
        <img src="<?= base_url(); ?>application/img/logopng2.png" width="240px"> 
        </br> 
        <?= form_open(base_url().'index.php/Login/new_user')?>
               
                    <?=form_open(base_url().'index.php/Login/new_user')?>
                    <?=form_input($username)?><p><?=form_error('username')?></p>
                    <?=form_password($password)?><p><?=form_error('password')?></p>
                    <?=form_hidden('token',$token)?>
                    <?=form_submit($submit)?>
                    <?=form_close()?>
                    <?php 
                    if($this->session->flashdata('usuario_incorrecto'))
                    {
                    ?>
                    <p><?=$this->session->flashdata('usuario_incorrecto')?></p>
                    <?php
                    }
                    ?> 
        </div>

                  
        </div>
        
        <script src="<?= base_url(); ?>asset/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?= base_url(); ?>asset/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        
        <script src="<?= base_url(); ?>asset/js/functions.js"></script>
    </body>
</html>