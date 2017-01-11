<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="format-detection" content="telephone=no">
        <meta charset="UTF-8">
        <title>Sistema Remuneracion</title>
        <link rel="icon" type="image/png" href="<?= base_url(); ?>application/img/favicon.png" />
        <link href="<?= base_url(); ?>asset/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="<?= base_url(); ?>asset/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="<?= base_url(); ?>asset/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
        <link href="<?= base_url(); ?>asset/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">
        
        <link href="<?= base_url(); ?>asset/css/app.min.css" rel="stylesheet">
    </head>

    <body>
        <header id="header" class="clearfix" data-spy="affix" data-offset-top="65">
            <ul class="header-inner">
                
                <!-- Logo -->
                <li class="logo">
                    <a href=""><img src="<?= base_url(); ?>asset/img/logo2.png" alt=""></a>
                    <div id="menu-trigger"><i class="zmdi zmdi-menu"></i></div>
                </li>
                
                
                
                <!-- Quick Apps -->
                 <!-- Quick Apps -->
                <li class="hidden-xs dropdown pull-right">
                    <a href="" data-toggle="dropdown">
                        <i class="zmdi zmdi-apps"></i>    
                    </a>
                    
                    <div class="dropdown-menu pull-right" id="launch-apps">
                        <div class="dropdown-header bg-teal">Accesos</div>
                        
                        <div class="la-body">
                            <div class="lab-item">
                                <a href="https://www.previred.com/web/previred/indicadores-previsionales" class="bg-red" target="_blank">
                                    <i class="zmdi zmdi-calendar"></i>
                                </a>
                                <small>Previred</small>
                            </div>
                            
                            <div class="lab-item">
                                <a href="http://control.gpscontrol.cl" class="bg-orange" target="_blank">
                                    <i class="zmdi zmdi-trending-up"></i>
                                </a>
                                <small>Panel GPS</small>
                            </div>
                            
                            <div class="lab-item">
                                <a href="<?= base_url(); ?>control/SeleccionNomina" class="bg-blue">
                                    <i class="zmdi zmdi-balance"></i>
                                </a>
                                <small>Nomina</small>
                            </div>
                        </div>
                    </div>
                <!-- Time -->
                <li class="pull-right hidden-xs">
                    <div id="time">
                        <span id="t-hours"></span>
                        <span id="t-min"></span>
                        <span id="t-sec"></span>
                    </div>
                </li>
            </ul>
        </header>
    
        
        <script src="<?= base_url(); ?>asset/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?= base_url(); ?>asset/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        
        <script src="<?= base_url(); ?>asset/vendors/bower_components/flot/jquery.flot.js"></script>
        <script src="<?= base_url(); ?>asset/vendors/bower_components/flot/jquery.flot.resize.js"></script>
        <script src="<?= base_url(); ?>asset/vendors/bower_components/flot-orderBars/js/jquery.flot.orderBars.js"></script>
        <script src="<?= base_url(); ?>asset/vendors/bower_components/flot.curvedlines/curvedLines.js"></script>                         
        <script src="<?= base_url(); ?>asset/vendors/bower_components/flot-orderBars/js/jquery.flot.orderBars.js"></script>
        <script src="<?= base_url(); ?>asset/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="<?= base_url(); ?>asset/vendors/sparklines/jquery.sparkline.min.js"></script>
        <script src="<?= base_url(); ?>asset/vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>

        <script src="<?= base_url(); ?>asset/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script src="<?= base_url(); ?>asset/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="<?= base_url(); ?>asset/vendors/bower_components/moment/min/moment.min.js"></script>
        <script src="<?= base_url(); ?>asset/vendors/bower_components/fullcalendar/dist/fullcalendar.min.js "></script>
        
        <!-- Charts - Please read the read-me.txt inside the js folder-->
        <script src="<?= base_url(); ?>asset/js/flot-charts/curved-line-chart.js"></script>
        <script src="<?= base_url(); ?>asset/js/flot-charts/bar-chart.js"></script>
        <script src="<?= base_url(); ?>asset/js/charts.js"></script>
        
        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]>
            <script src="vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
        <![endif]-->
        
        <script src="<?= base_url(); ?>asset/js/functions.js"></script>
        <script src="<?= base_url(); ?>asset/js/demo.js"></script>
    