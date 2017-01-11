 <aside id="sidebar">
            
            <!--| MAIN MENU |-->
            <ul class="side-menu">
                <li class="sm-sub sms-profile">
                    <a class="clearfix" href="#">
                        <img src="<?= base_url(); ?>asset/img/profile-pic.jpg" alt="">
        
                        <span class="f-11">
                            <span class="d-block"><?= $usuario ?></span>
                            <small class="text-lowercase"><?= $nivel ?></small>
                        </span>
                    </a>
                </li>
                
                <li class="active">
                    <a href="<?= base_url(); ?>control/principal">
                        <i class="zmdi zmdi-home"></i>
                        <span>Inicio</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url(); ?>control/nuevo">
                        <i class="zmdi zmdi-account-add"></i>
                        <span>Nuevo Empleado</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url(); ?>control/liquidacion">
                        <i class="zmdi zmdi-file-plus"></i>
                        <span>Nueva Liquidacion</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url(); ?>control/listaLiquidaciones">
                        <i class="zmdi zmdi zmdi-view-list"></i>
                        <span>Liquidaciones</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url(); ?>control/empleados">
                        <i class="zmdi zmdi zmdi-folder-person"></i>
                        <span>Ficha Personal</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url(); ?>control/exempleados">
                        <i class="zmdi zmdi zmdi-accounts-list"></i>
                        <span>Ex Empleados</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url(); ?>control/libro" target="parent">
                        <i class="zmdi zmdi-collection-text"></i>
                        <span>Libro Remuneraciones</span>
                    </a>
                </li>
               <li>
                    <a href="<?= base_url(); ?>control/documentos">
                        <i class="zmdi zmdi-file-text"></i>
                        <span>Documentos</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url(); ?>control/SeleccionNomina">
                        <i class="zmdi zmdi-balance"></i>
                        <span>Archivo pagos</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url(); ?>control/configuracion">
                        <i class="zmdi zmdi-money"></i>
                        <span>Previred</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url(); ?>control/cambio">
                        <i class="zmdi zmdi-settings"></i>
                        <span>Configuracion</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url(); ?>login/logout_ci">
                        <i class="zmdi zmdi zmdi-power"></i>
                        <span>Salir</span>
                    </a>
                </li>
        </aside>