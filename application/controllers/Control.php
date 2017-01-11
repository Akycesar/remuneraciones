<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Control extends CI_Controller 
{
        function __construct() 
    {   //en el constructor cargamos nuestro modelo
        parent::__construct();
        $this->load->library(array('session','form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->model('empleado_model');
        $this->load->model('previred_model');
        $this->load->library('html2pdf'); 

    }
    public function globalEmpresa(){
        if($this->session->userdata('usuario') == FALSE || $this->session->userdata('nivel_acceso') != 'Administrador')
        {
            redirect(base_url().'login');
        }
        $rut_empresa=$this->uri->segment(3);
        $empresa=$this->empleado_model->getEmpresa($rut_empresa);
            foreach($empresa -> result() as $value){
                $rs=$value->rs;
            }
        $this->session->set_userdata('empresa',$rs);
        $this->session->set_userdata('rut_empresa',$rut_empresa);
        redirect('control/principal');

    }
     public function principal(){
        if($this->session->userdata('usuario') == FALSE || $this->session->userdata('nivel_acceso') != 'Administrador')
        {
            redirect(base_url().'login');
        }
        $usuario=$this->session->userdata('usuario');
        $nivel=$this->session->userdata('nivel_acceso');
        $rut_usuario=$this->session->userdata('rut_usuario');
        $data['empresa']=$this->empleado_model->getEmpresas();
        $rs=$this->session->userdata('empresa');
        $mes=$this->session->userdata('mes');
        $year=$this->session->userdata('year');
        $rut_empresa=$this->session->userdata('rut_empresa');
        if($rs==null){ $rs='No seleccionada'; }
        $datos=array(
            'usuario' => $usuario,
            'nivel' => $nivel,
            'rut_usuario' => $rut_usuario,
            'rs' => $rs,
            'mes' => $mes,
            'year' => $year
            );
        $dat=array(
            'empresa' => $data['empresa'],
            'rut_empresa' => $rut_empresa
            );
        $this->load->view('header');
        $this->load->view('nav', $datos);
        $this->load->view('remuneracion/principal',$dat);
        $this->load->view('footer');
     }
     public function nuevo(){
        if($this->session->userdata('usuario') == FALSE || $this->session->userdata('nivel_acceso') != 'Administrador')
        {
            redirect(base_url().'login');
        }
        $usuario=$this->session->userdata('usuario');
        $nivel=$this->session->userdata('nivel_acceso');
        $rut_usuario=$this->session->userdata('rut_usuario');
        $rs=$this->session->userdata('empresa');
        $rut_empresa=$this->session->userdata('rut_empresa');
        if($rs==null){ $rs='No seleccionada'; }
        $datos=array(
            'usuario' => $usuario,
            'nivel' => $nivel,
            'rut_usuario' => $rut_usuario,
            'rs' => $rs
            );
        $dat=array(
            'rut_empresa' => $rut_empresa
            );
        $this->load->view('header');
        $this->load->view('nav', $datos);
        $this->load->view('remuneracion/datos',$dat);
        //$this->load->view('footer');*/
     }
     public function perfil(){
       if($this->session->userdata('usuario') == FALSE || $this->session->userdata('nivel_acceso') != 'Administrador')
        {
            redirect(base_url().'login');
        }
        $empleado=$this->uri->segment(3);
        $data['empleado']=$this->empleado_model->getEmpleado($empleado);
        $data['personales']=$this->empleado_model->getPersonales($empleado);
        $data['contrato']=$this->empleado_model->getContrato($empleado);
        $data['prevision']=$this->empleado_model->getPrevision($empleado);
        $data['emergencia']=$this->empleado_model->getEmergencia($empleado);
        $data['imagen']=$this->empleado_model->getImagen($empleado);
        $rut_usuario=$this->session->userdata('rut_usuario');

        $datos_perfil=array(
            'empleado' => $data['empleado'],
            'personales' => $data['personales'],
            'contrato' => $data['contrato'],
            'prevision' => $data['prevision'],
            'emergencia' => $data['emergencia'],
            'imagen' => $data['imagen']
            );

        $usuario=$this->session->userdata('usuario');
        $nivel=$this->session->userdata('nivel_acceso');
        
        $datos=array(
            'usuario' => $usuario,
            'nivel' => $nivel,
            'rut_usuario' => $rut_usuario
            );
        //print '<pre>';print_r($datos);print '</pre>';
        $this->load->view('header');
        $this->load->view('nav', $datos);
        $this->load->view('remuneracion/perfil',$datos_perfil);
        $this->load->view('footer');
     }
     public function calendario(){
       if($this->session->userdata('usuario') == FALSE || $this->session->userdata('nivel_acceso') != 'Administrador')
        {
            redirect(base_url().'login');
        }
        $usuario=$this->session->userdata('usuario');
        $nivel=$this->session->userdata('nivel_acceso');
        $rut_usuario=$this->session->userdata('rut_usuario');
        $datos=array(
            'usuario' => $usuario,
            'nivel' => $nivel,
            'rut_usuario' => $rut_usuario
            );
        $this->load->view('header');
        $this->load->view('nav', $datos);
        $this->load->view('remuneracion/calendario');
        $this->load->view('footer');
     }
     public function empleados(){
       if($this->session->userdata('usuario') == FALSE || $this->session->userdata('nivel_acceso') != 'Administrador')
        {
            redirect(base_url().'login');
        }
        $usuario=$this->session->userdata('usuario');
        $nivel=$this->session->userdata('nivel_acceso');
        $rut_empresa=$this->session->userdata('rut_empresa');
        $estado='activo';
        $empleados=$this->empleado_model->getEmpleados($rut_empresa,$estado);
        $rut_usuario=$this->session->userdata('rut_usuario');
        $datos=array(
            'usuario' => $usuario,
            'nivel' => $nivel,
            'empleados' => $empleados,
            'rut_usuario' => $rut_usuario
            );
        $this->load->view('header');
        $this->load->view('nav', $datos);
        $this->load->view('remuneracion/empleados');
        $this->load->view('footer');
     }
     public function exempleados(){
       if($this->session->userdata('usuario') == FALSE || $this->session->userdata('nivel_acceso') != 'Administrador')
        {
            redirect(base_url().'login');
        }
        $usuario=$this->session->userdata('usuario');
        $nivel=$this->session->userdata('nivel_acceso');
        $rut_empresa=$this->session->userdata('rut_empresa');
        $estado='inactivo';
        $empleados=$this->empleado_model->getEmpleados($rut_empresa,$estado);
        $rut_usuario=$this->session->userdata('rut_usuario');
        $datos=array(
            'usuario' => $usuario,
            'nivel' => $nivel,
            'empleados' => $empleados,
            'rut_usuario' => $rut_usuario
            );
        $this->load->view('header');
        $this->load->view('nav', $datos);
        $this->load->view('remuneracion/exempleados');
        $this->load->view('footer');
     }
     public function liquidacion(){
        if($this->session->userdata('usuario') == FALSE || $this->session->userdata('nivel_acceso') != 'Administrador')
        {
            redirect(base_url().'login');
        }
        $mes=$this->session->userdata('mes');//is very important!
        $year=$this->session->userdata('year');//is very important!
        $usuario=$this->session->userdata('usuario');
        $nivel=$this->session->userdata('nivel_acceso');
        $rut_empresa=$this->session->userdata('rut_empresa');
        $estado='activo';
        $empleados=$this->empleado_model->getEmpleados($rut_empresa,$estado);
        $rut_usuario=$this->session->userdata('rut_usuario');
        $rs=$this->session->userdata('empresa');
        $rmi=$this->previred_model->getRmi($mes,$year);
        if($rmi!=null){
            foreach ($rmi -> result() as $value) {
                $rmi1= $value->rmi1; }
            }else{
                $rmi1=0;
            }
        if($rs==null){ $rs='No ha seleccionado una empresa.'; }
        $datos=array(
            'usuario' => $usuario,
            'nivel' => $nivel,
            'empleados' => $empleados,
            'rut_usuario' => $rut_usuario,
            'rut_empresa' => $rut_empresa,
            'rs' => $rs,
            'mes' => $mes
            );
        $liq=array(
            'rmi1' => $rmi1
            );
        $this->load->view('header');
        $this->load->view('nav', $datos);
        $this->load->view('remuneracion/liquidacion',$liq);
        $this->load->view('footer');
       
     }
     public function crearempleado(){
        if($this->session->userdata('usuario') == FALSE || $this->session->userdata('nivel_acceso') != 'Administrador')
        {
            redirect(base_url().'login');
        }
        $usuario=$this->session->userdata('usuario');
        $nivel=$this->session->userdata('nivel_acceso');
        $datos=array(
            'usuario' => $usuario,
            'nivel' => $nivel
            );
        $formulario_empleado=array(
            'rut' => set_value('rut'),
            'sr' => set_value('sr'),
            'apellido_paterno' => set_value('apellido_paterno'),
            'apellido_materno' => set_value('apellido_materno'),
            'nombres' => set_value('nombres'),
            'fecha_nacimiento' => set_value('fecha_nacimiento'),
            'edad' => set_value('edad'),
            'nacionalidad' => set_value('nacionalidad'),
            'estado_civil' => set_value('estado_civil'),
            'sexo' => set_value('sexo'),
            'empresa' => set_value('rut_empresa'),
            'estado' => 'activo'
            );
        $formulario_contrato=array(
            'fecha_contrato' => set_value('fecha_contrato'),
            'fecha_termino' => set_value('fecha_termino'),
            'tipo_contrato' => set_value('tipo_contrato'),
            'cargo' => set_value('cargo'),
            'observacion' => set_value('observacion'),
            'sindicalizado' => set_value('sindicalizado'),
            'fecha_sindicato' => set_value('fecha_sindicato'),
            'empleado' => set_value('rut'),
            'estado' => 'activo',
            'horario' => set_value('horario'),
            'sbase' => set_value('sbase'),
            'contrato' => set_value('contrato_doc'),
            'colacion' => set_value('horario_colacion')
            );
       $this->empleado_model->setEmpleado($formulario_empleado);
      $this->empleado_model->setContrato($formulario_contrato);

        //print '<pre>';print_r($formulario_empleado);print '</pre>';
        //print '<pre>';print_r($formulario_contrato);print '</pre>';
        
        redirect('control/empleados');
     }
     function do_upload() {
        $usuario=$this->session->userdata('usuario');
        $nivel=$this->session->userdata('nivel_acceso');
        $datos=array(
            'usuario' => $usuario,
            'nivel' => $nivel
            );
        //SI EL FORMULARIO PASA LA VALIDACIÓN HACEMOS TODO LO QUE SIGUE
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2000';
        $config['max_width'] = '2024';
        $config['max_height'] = '2008';
 
        $this->load->library('upload', $config);
        //SI LA IMAGEN FALLA AL SUBIR MOSTRAMOS EL ERROR EN LA VISTA UPLOAD_VIEW
        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
        } else {
        //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS 
        //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
            $file_info = $this->upload->data();
            //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
            //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA
            $this->_create_thumbnail($file_info['file_name']);
            $data = array('upload_data' => $this->upload->data());
            $titulo = $this->input->post('empleado_imagen');
            $imagen = $file_info['file_name'];
            $empleado = set_value('empleado_imagen');
            $subir = $this->empleado_model->subir($titulo,$imagen,$empleado);      
            $data['titulo'] = $titulo;
            $data['imagen'] = $imagen;
        
        }
        redirect('control/perfil/'.$empleado.'');
    }
    //FUNCIÓN PARA CREAR LA MINIATURA A LA MEDIDA QUE LE DIGAMOS
    function _create_thumbnail($filename){
        $config['image_library'] = 'gd2';
        //CARPETA EN LA QUE ESTÁ LA IMAGEN A REDIMENSIONAR
        $config['source_image'] = 'uploads/'.$filename;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        //CARPETA EN LA QUE GUARDAMOS LA MINIATURA
        $config['new_image']='uploads/thumbs/';
        $config['width'] = 150;
        $config['height'] = 150;
        $this->load->library('image_lib', $config); 
        $this->image_lib->resize();
    }
    private function createFolder()
    {
        if(!is_dir("./files"))
        {
            mkdir("./files", 0777);
            mkdir("./files/pdfs", 0777);
        }
    }
public function infopdf()
        {

        //establecemos la carpeta en la que queremos guardar los pdfs,
        //si no existen las creamos y damos permisos
        $this->createFolder();

        //importante el slash del final o no funcionará correctamente
        $this->html2pdf->folder('./files/pdfs/');
        
        //establecemos el nombre del archivo
        $this->html2pdf->filename('test.pdf');

        //establecemos el tipo de papel
        $this->html2pdf->paper('a4', 'portrait'); //('portrait' or 'landscape')

        $empleado=$this->uri->segment(3);
        $data['empleado']=$this->empleado_model->getEmpleado($empleado);
        $data['personales']=$this->empleado_model->getPersonales($empleado);
        $data['contrato']=$this->empleado_model->getContrato($empleado);
        $data['prevision']=$this->empleado_model->getPrevision($empleado);
        $data['emergencia']=$this->empleado_model->getEmergencia($empleado);
        $data['imagen']=$this->empleado_model->getImagen($empleado);

        $datos_perfil=array(
            'empleado' => $data['empleado'],
            'personales' => $data['personales'],
            'contrato' => $data['contrato'],
            'prevision' => $data['prevision'],
            'emergencia' => $data['emergencia'],
            'imagen' => $data['imagen']
            );

        //hacemos que coja la vista como datos a imprimir
        //importante utf8_decode para mostrar bien las tildes, ñ y demás
        $this->html2pdf->html(utf8_decode($this->load->view('remuneracion/infopdf', $datos_perfil, true)));

        //si el pdf se guarda correctamente lo mostramos en pantalla
        if($this->html2pdf->create('save'))
        {
            $this->show();
        }
    }
public function downloadPdf()
    {
        //si existe el directorio
        if(is_dir("./files/pdfs"))
        {
            //ruta completa al archivo
            $route = base_url("files/pdfs/test.pdf");
            //nombre del archivo
            $filename = "test.pdf";
            //si existe el archivo empezamos la descarga del pdf
            if(file_exists("./files/pdfs/".$filename))
            {
                header("Cache-Control: public");
                header("Content-Description: File Transfer");
                header('Content-disposition: attachment; filename='.basename($route));
                header("Content-Type: application/pdf");
                header("Content-Transfer-Encoding: binary");
                header('Content-Length: '. filesize($route));
                readfile($route);
            }
        }
    }
public function show()
    {
        if(is_dir("./files/pdfs"))
        {
            $filename = "test.pdf";
            $route = base_url("files/pdfs/test.pdf");
            if(file_exists("./files/pdfs/".$filename))
            {
                header('Content-type: application/pdf');
                readfile($route);
            }
        }
    }
public function editar(){
    if($this->session->userdata('usuario') == FALSE || $this->session->userdata('nivel_acceso') != 'Administrador')
        {
            redirect(base_url().'login');
        }
    $usuario=$this->session->userdata('usuario');
    $nivel=$this->session->userdata('nivel_acceso');
    $rut_usuario=$this->session->userdata('rut_usuario');
    $datos=array(
            'usuario' => $usuario,
            'nivel' => $nivel,
            'rut_usuario' => $rut_usuario
            );
    $rut=$this->uri->segment(3);
    $rut_empleado=array('rut' => $rut );
    $this->load->view('header');
    $this->load->view('nav', $datos);
    $this->load->view('remuneracion/editar', $rut_empleado);

}
 public function editarEmpleado(){
        if($this->session->userdata('usuario') == FALSE || $this->session->userdata('nivel_acceso') != 'Administrador')
        {
            redirect(base_url().'login');
        }
        $usuario=$this->session->userdata('usuario');
        $rut_usuario=$this->session->userdata('rut_usuario');
        $nivel=$this->session->userdata('nivel_acceso');
        $datos=array(
            'usuario' => $usuario,
            'nivel' => $nivel,
            'rut_usuario' => $rut_usuario
            );

        $rut= set_value('rut');
        $formulario_empleado=array(
            'sr' => set_value('sr'),
            'apellido_paterno' => set_value('apellido_paterno'),
            'apellido_materno' => set_value('apellido_materno'),
            'nombres' => set_value('nombres'),
            'fecha_nacimiento' => set_value('fecha_nacimiento'),
            'edad' => set_value('edad'),
            'nacionalidad' => set_value('nacionalidad'),
            'estado_civil' => set_value('estado_civil'),
            'sexo' => set_value('sexo')
            );
        $formulario_contrato=array(
            'fecha_contrato' => set_value('fecha_contrato'),
            'fecha_termino' => set_value('fecha_termino'),
            'tipo_contrato' => set_value('tipo_contrato'),
            'cargo' => set_value('cargo'),
            'observacion' => set_value('observacion'),
            'sindicalizado' => set_value('sindicalizado'),
            'fecha_sindicato' => set_value('fecha_sindicato'),
            'empleado' => set_value('rut'),
            'horario' => set_value('horario'),
            'sbase' => set_value('sbase'),
            'contrato' => set_value('contrato_doc'),
            'colacion' => set_value('horario_colacion')
            );
        $this->empleado_model->updateEmpleado($formulario_empleado,$rut);
        $this->empleado_model->updateContrato($formulario_contrato,$rut);

        //print '<pre>';print_r($formulario_empleado);print '</pre>';
        //print '<pre>';print_r($formulario_contrato);print '</pre>';
        
        redirect('control/empleados');
     }
     public function configuracion(){
        if($this->session->userdata('usuario') == FALSE || $this->session->userdata('nivel_acceso') != 'Administrador')
        {
            redirect(base_url().'login');
        }
        $usuario=$this->session->userdata('usuario');
        $nivel=$this->session->userdata('nivel_acceso');
        $rut_usuario=$this->session->userdata('rut_usuario');
        $mes=$this->session->userdata('mes');
        $year=$this->session->userdata('year');
        $data['uf']=$this->previred_model->getUf($mes,$year);
        $data['utm']=$this->previred_model->getUtm($mes,$year);
        $data['rti']=$this->previred_model->getRti($mes,$year);
        $data['rmi']=$this->previred_model->getRmi($mes,$year);
        $data['apv']=$this->previred_model->getApv($mes,$year);
        $data['dc']=$this->previred_model->getDc($mes,$year);
        $data['sc']=$this->previred_model->getSc($mes,$year);
        $data['afp']=$this->previred_model->getAfp($mes,$year);
        $data['af']=$this->previred_model->getAf($mes,$year);
        $data['impuesto']=$this->previred_model->getImpuesto($mes,$year);
        $datos=array(
            'uf' => $data['uf'],
            'utm' => $data['utm'],
            'rti' => $data['rti'],
            'rmi' => $data['rmi'],
            'apv' => $data['apv'],
            'dc' => $data['dc'],
            'sc' => $data['sc'],
            'afp' => $data['afp'],
            'af' => $data['af'],
            'impuesto' => $data['impuesto'],
            'mes' => $mes,
            'year' => $year
            );
        $datnav=array(
            'usuario' => $usuario,
            'nivel' => $nivel,
            'rut_usuario' => $rut_usuario
            );
        $this->load->view('header');
        $this->load->view('nav', $datnav);
        $this->load->view('remuneracion/configuracion',$datos);
     }
     public function eliminar(){
        if($this->session->userdata('usuario') == FALSE || $this->session->userdata('nivel_acceso') != 'Administrador')
        {
            redirect(base_url().'login');
        }
        $rut=$this->uri->segment(3);
        $this->empleado_model->eliminarEmpleado($rut);

        redirect('control/empleados');
     }
     public function setLiquidacion(){
        if($this->session->userdata('usuario') == FALSE || $this->session->userdata('nivel_acceso') != 'Administrador')
        {
            redirect(base_url().'login');
        }
        $empleado= set_value('empleado');
        $formulario_sbase=array(
            'sbase' => set_value('sueldo_base'),
            'imsegces' => set_value('imsegces'),
            'imsis' => set_value('imsis'),
            'colacion' => set_value('colacion'),
            'dntrabajados' => set_value('dntrabajados'),
            'tipo_sueldo' => set_value('tsueldo'),
            'gratificacion' => set_value('gratificacion'),
            'aguinaldo' => set_value('aguinaldo'),
            'comision' => set_value('comision'),
            'mret' => set_value('mret'),
            'movilizacion' => set_value('movilizacion'),
            'dxlic' => set_value('lxemp'), 
            'empleado' => $empleado,
            'mes' => set_value('mes'),
            'year' => set_value('year'),
            'empresa' => set_value('rut_empresa')
            );
        $formulario_hlaboral=array(
            'dias_mensuales' => set_value('dmensuales'),
            'horas_semanales' => set_value('hsemanales'),
            'dias_semanales' => set_value('dsemanales'),
            'atrasos' => set_value('atrasos'),
            'h_ext5' => set_value('hextra5'),
            'h_ext10' => set_value('hextra10'),
            'empleado' => $empleado,
            'mes' => set_value('mes'),
            'year' => set_value('year')
            );
        $formulario_afamiliar=array(
            'monto' => set_value('monto'),
            'tramo' => set_value('tramo'),
            'fam' => set_value('familiares'),
            'mat' => set_value('maternales'),
            'inva' => set_value('invalidas'),
            'empleado' => $empleado,
            'mes' => set_value('mes'),
            'year' => set_value('year')
            );
        $formulario_liquidacion=array(
            'sbase' => set_value('sueldo_base'),
            'imsegces' => set_value('imsegces'),
            'imsis' => set_value('imsis'),
            'colacion' => set_value('colacion'),
            'dntrabajados' => set_value('dntrabajados'),
            'tipo_sueldo' => set_value('tsueldo'),
            'gratificacion' => set_value('gratificacion'),
            'bono' => set_value('bono'),
            'comision' => set_value('comision'),
            'mret' => set_value('mret'),
            'movilizacion' => set_value('movilizacion'),
            'dxlic' => set_value('lxemp'),
            'dias_mensuales' => set_value('dmensuales'),
            'horas_semanales' => set_value('hsemanales'),
            'dias_semanales' => set_value('dsemanales'),
            'atrasos' => set_value('atrasos'),
            'h_ext5' => set_value('hextra5'),
            'h_ext10' => set_value('hextra10'),
            'monto' => set_value('monto'),
            'tramo' => set_value('tramo'),
            'fam' => set_value('familiares'),
            'mat' => set_value('maternales'),
            'inva' => set_value('invalidas'),
            'empleado' => $empleado,
            'mes' => set_value('mes'),
            'year' => set_value('year')
             );


        $this->empleado_model->setSbase($formulario_sbase,$empleado);
        $this->empleado_model->setHlaboral($formulario_hlaboral,$empleado);
        $this->empleado_model->setAfamiliar($formulario_afamiliar,$empleado);
        $this->empleado_model->setLiquidacion($formulario_liquidacion);

     }
     public function liquidacionpdf(){

        $this->createFolder();

        $this->html2pdf->folder('./files/pdfs/');
   
        $this->html2pdf->filename('test.pdf');

        $this->html2pdf->paper('legal', 'portrait'); //('portrait' or 'landscape')

        $mes=$this->session->userdata('mes');//is very important!
        $year=$this->session->userdata('year');//is very important!
        $empleado=$this->uri->segment(3);
        //$mes=$this->uri->segment(4);
        //$year=$this->uri->segment(5);
        $rut_empresa=$this->session->userdata('rut_empresa');
        $data['empresa']=$this->empleado_model->getEmpresa($rut_empresa);
            foreach($data['empresa'] -> result() as $valemp){
                $rs=$valemp->rs;
                $direccion=$valemp->direccion;
                $telefono=$valemp->telefono;
            }
        $data['empleados']=$this->empleado_model->getEmpleado($empleado);
        $data['anticipo']=$this->empleado_model->getAnticipo($empleado,$mes,$year);
        if($data['anticipo']!=NULL){
            foreach($data['anticipo'] -> result() as $valueAnt){
                $anticipo= $valueAnt->monto;
                $det_anticipo=$valueAnt->descripcion;
            }}else{ $anticipo=0; $det_anticipo='';}
        $data['uf']=$this->previred_model->getUf($mes,$year);
            foreach($data['uf']->result() as $valueuf){
                $valueuf=$valueuf->uf1;
            }
        $data['contrato']=$this->empleado_model->getContrato($empleado);
            foreach ($data['contrato']->result() as $valcont) {
                $contrato = $valcont->tipo_contrato;
                $fecha_ingreso = $valcont->fecha_contrato;
                $cargo = $valcont->cargo;
            }
        $data['rmi']=$this->previred_model->getRmi($mes,$year);
            foreach($data['rmi'] -> result() as $valrmi){
        $tope_gratificacion=round(($valrmi->rmi1*4.75)/12);
        }
        $data['bono']=$this->empleado_model->getBono($empleado,$mes,$year);
        if($data['bono']!=NULL){
            foreach($data['bono'] -> result() as $valbono){
                $descripcion_bono=$valbono->descripcion;
                $bono=$valbono->monto;
                $tipo_bono=$valbono->tipo;
            }
        }else{ 
                $descripcion_bono='';
                $bono=0;
                $tipo_bono='';
            }
        $data['liquidacion']=$this->empleado_model->getLiquidaciondet($empleado,$mes,$year);
            foreach($data['liquidacion'] -> result() as $valliq){
                $sbase=$valliq->sbase;
                $colacion=$valliq->colacion;
                $dntrabajados=$valliq->dntrabajados;
                $gratificacion=$valliq->gratificacion;
                $aguinaldo= $valliq->aguinaldo;
                $comision=$valliq->comision;
                $movilizacion=$valliq->movilizacion;
                $cargas=$valliq->monto;
                $tramo_carga=$valliq->tramo;//1111111111111111111111111111111111111111111111111111111111111111
                $familia=$valliq->fam;//1111111111111111111111111111111111111111111111111111111111111111
                $h_ext5=$valliq->h_ext5;//1111111111111111111111111111111111111111111111111111111111111111
                $h_ext10=$valliq->h_ext10;//1111111111111111111111111111111111111111111111111111111111111111
                $atrasos=$valliq->atrasos;//1111111111111111111111111111111111111111111111111111111111111111
            }

            $va50=round($sbase*0.007777);//1111111111111111111111111111111111111111111111111111111111111111111111111111
            $valor_h_5=$va50*$h_ext5;
            $valor_h_10=round($h_ext10*2670);//1111111111111111111111111111111111111111111111111111111111111111111111111111
            if($valor_h_5>0){
                $sbaseh5=$sbase+$valor_h_5;
                $gratificacionh5=round($sbaseh5*0.25);
            }
            if($valor_h_10>0){
                $sbaseh10=$sbase+$valor_h_10; 
                $gratificacionh10=round($sbaseh10*0.25);
            }
            $valor_hora=round(($sbase/30)/9);//1111111111111111111111111111111111111111111111111111111111111111111111111111
            $hntrabajados=round($valor_hora*$atrasos);//1111111111111111111111111111111111111111111111111111111111111111111111111111
            $other_tot_imp2=$sbase-$hntrabajados;//1111111111111111111111111111111111111111111111111111111111111111111111111111

            $tot_dntrab=($sbase/30)*$dntrabajados;
            $other_tot_imp=$sbase-$tot_dntrab;
            

            if($dntrabajados>0){//dias no trabajados sin tope previred gratificacion
                if($bono!=0){
                    $baseplusbono=$sbase+$bono+$valor_h_5+$valor_h_10;
                    $gratificacion=$baseplusbono*0.25;
                }else{
                    $gratificacion=round(($other_tot_imp+$valor_h_5+$valor_h_10)*0.25);
                }
                 if($gratificacion>$tope_gratificacion){
                    $gratificacion=$tope_gratificacion;
                    $total_imponible=round($other_tot_imp+$tope_gratificacion+$valor_h_5+$valor_h_10);
                    $sbase2=$other_tot_imp+$valor_h_10+$valor_h_5;
                }else{
                    $total_imponible=round($other_tot_imp+$gratificacion+$valor_h_5+$valor_h_10);
                    $sbase2=$other_tot_imp+$valor_h_10+$valor_h_5;
                }
            }elseif($atrasos>0){
                if($bono!=0){
                    $baseplusbono=$sbase+$bono+$valor_h_5+$valor_h_10;
                    $gratificacion=round($baseplusbono*0.25);
                }else{
                    $gratificacion=round(($other_tot_imp2+$valor_h_5+$valor_h_10)*0.25);
                }
                 if($gratificacion>$tope_gratificacion){
                    $gratificacion=$tope_gratificacion;
                    $total_imponible=$other_tot_imp2+$tope_gratificacion+$valor_h_5+$valor_h_10;
                    $sbase3=$other_tot_imp2+$valor_h_10+$valor_h_5;
                }else{
                    $total_imponible=$other_tot_imp2+$gratificacion+$valor_h_5+$valor_h_10;
                    $sbase3=$other_tot_imp2+$valor_h_10+$valor_h_5;
                }
            }
            else{
                if($valor_h_5>0 || $valor_h_10>0){
                $sbaseh5=$sbase+$valor_h_5+$valor_h_10;
                $gratificacion=round($sbaseh5*0.25);
                }
                $total_imponible=round($sbase+$valor_h_5+$valor_h_10)+$gratificacion;
                if($bono!=0){
                    $baseplusbono=$sbase+$bono+$valor_h_5+$valor_h_10;
                    $gratificacion=$baseplusbono*0.25;
                    $total_imponible=$baseplusbono+$gratificacion;
                        if($gratificacion>$tope_gratificacion){
                            $gratificacion=$tope_gratificacion;
                            $total_imponible=$baseplusbono+$gratificacion;
                        }                
                }
            }
        $data['cretroactivo']=$this->empleado_model->getCretroactivo($empleado,$mes,$year);
        if($data['cretroactivo']!=NULL){
            foreach($data['cretroactivo'] -> result() as $valcret){
                $descripcion_cretroactivo=$valcret->descripcion;
                $monto_cretroactivo=$valcret->monto;
            }
        }else{
                $descripcion_cretroactivo='';
                $monto_cretroactivo=0;
        }

        $data['previ']=$this->empleado_model->getPrevision($empleado);
        if($data['previ']!=NULL){
            foreach($data['previ'] -> result() as $valpre){
                $salud=$valpre->salud;
                $afp=$valpre->afp;
                $cuota=$valpre->cuota;
            }
        }else{
                $salud='';
                $afp='';
                $cuota=0;
        }

        $data['rti']=$this->previred_model->getRti($mes,$year);
            foreach($data['rti'] -> result() as $valrti){
        $tope_imponible=$valrti->rti1;
        $tope_cesantia=$valrti->rti3;
        }

         $data['afp']=$this->previred_model->getAfpL($afp,$mes,$year);
         if($data['afp']!=NULL){
            foreach ($data['afp'] -> result() as $valafp) {
                $datafp = $valafp->afp1;
                $dattasf = $valafp->tafpd1;
            }
        }else{
                $datafp = '';
                $dattasf = '';
        }
        $tasa2='0.'.str_replace('.', '', $dattasf);
        if($total_imponible>$tope_imponible){
            $total_valor_afp=round($tope_imponible*$tasa2);
        }else{
            $total_valor_afp=round($total_imponible*$tasa2);
        }

        if($salud=='Fonasa'){ 
            if($total_imponible>$tope_imponible){
            $total_valor_salud=round($tope_imponible*0.07) ;
            $adicional=0;
            }else{
            $total_valor_salud=round($total_imponible*0.07) ;
            $adicional=0;
            }
        }else{
            if($total_imponible>$tope_imponible){
            $total_valor_salud=round($tope_imponible*0.07) ;
            $valorCuotaUf=$cuota * $valueuf;
            $adicional2=$valorCuotaUf-$total_valor_salud;
            if($adicional2>0){ $adicional=$adicional2; }else{ $adicional=0; }
            }else{
            $total_valor_salud=round($total_imponible*0.07) ;
            $valorCuotaUf=$cuota * $valueuf;
            $adicional2=$valorCuotaUf-$total_valor_salud;
            if($adicional2>0){ $adicional=$adicional2; }else{ $adicional=0; }
            }
        }
        if($contrato=='Indefinido'){
            if($total_imponible>$tope_cesantia){
                $cesantia=round($tope_cesantia*0.006);
            }else{
                $cesantia=round($total_imponible*0.006);
            }
        }else{ $cesantia=0; }
        $data['prestamo']=$this->empleado_model->getPrestamo($empleado,$mes);
            if($data['prestamo']!=NULL){ 
                foreach($data['prestamo'] -> result() as $valprestamo){
                $detalle_prestamo=$valprestamo->descripcion;
                $prestamo=$valprestamo->monto;
                } 
            }else{
                $detalle_prestamo='';
                $prestamo=0;
            }
        $data['descuento']=$this->empleado_model->getDescuento($empleado,$mes);
            if($data['descuento']!=NULL){ 
                foreach($data['descuento'] -> result() as $valdescuento){
                $detalle_descuento=$valdescuento->descripcion;
                $descuento=$valdescuento->monto;
                } 
            }else{
                $detalle_descuento='';
                $descuento=0;
            }
        $otro_total_descuentos= $total_valor_afp+$total_valor_salud+$cesantia+$adicional; //sin el impuesto
        $ui=$total_imponible-$otro_total_descuentos;
        //echo $ui.' '.'</br>';
        $data['impuesto']=$this->empleado_model->getImpuesto($mes,$year);
        foreach ($data['impuesto'] -> result() as $val_imp) {
            if($val_imp->tramo=='tramo 1'){
                $desde_t1=$val_imp->desde;
                $hasta_t1=$val_imp->hasta;
                $factor_t1=$val_imp->factor;
                $descuento_t1=$val_imp->descuento;
            }else if($val_imp->tramo=='tramo 2'){
                $desde_t2=$val_imp->desde;
                $hasta_t2=$val_imp->hasta;
                $factor_t2=$val_imp->factor;
                $descuento_t2=$val_imp->descuento;
            }else if($val_imp->tramo=='tramo 3'){
                $desde_t3=$val_imp->desde;
                $hasta_t3=$val_imp->hasta;
                $factor_t3=$val_imp->factor;
                $descuento_t3=$val_imp->descuento;
            }
        }
                if($ui>=$desde_t1 && $ui<=$hasta_t1){
                    $fac=$factor_t1;
                    $desc=$descuento_t1;
                    $resfac=$ui*$fac;
                    $tot_iu=$resfac-$desc;
                    //echo 'tramo 2 '.$tot_iu.' '.'</br>';
                }elseif($ui>=$desde_t2 && $ui<=$hasta_t2){
                    $fac=$factor_t2;
                    $desc=$descuento_t2;
                    $resfac=$ui*$fac;
                    $tot_iu=$resfac-$desc;
                    //echo 'tramo 3 '.$tot_iu.' '.'</br>';
                }elseif($ui>=$desde_t3 && $ui<=$hasta_t3){
                    $fac=$factor_t3;
                    $desc=$descuento_t3;
                    $resfac=$ui*$fac;
                    $tot_iu=$resfac-$desc;
                    //echo 'tramo 4 '.$tot_iu.' '.'</br>';
                }else{
                    $tot_iu=0;
                    //echo 'tramo 5 '.$tot_iu.' '.'</br>';
                }
        
        $total_descuentos= $total_valor_afp+$total_valor_salud+$cesantia+$adicional+$tot_iu;
        if($dntrabajados>0){
            $total_haberes=$sbase2+$gratificacion+$movilizacion+$colacion+$aguinaldo+$comision+$bono+$cargas+$monto_cretroactivo;
            //echo 1;
        }elseif($atrasos>0){//1111111111111111111111111111111111111111111111111111111111111
            $total_haberes=$sbase3+$gratificacion+$movilizacion+$colacion+$aguinaldo+$comision+$bono+$cargas+$monto_cretroactivo;//111111111111111111111111111111111111111111111
            /*echo '2'.'</br>';
            echo $sbase3.'</br>';
            echo $gratificacion.'</br>';
            echo $movilizacion.'</br>';
            echo $colacion.'</br>';
            echo $aguinaldo.'</br>';
            echo $comision.'</br>';
            echo $bono.'</br>';
            echo $cargas.'</br>';
            echo $monto_cretroactivo.'</br>';
            echo $total_haberes.'</br>';*/

        }else{
            $total_haberes=$sbase+$gratificacion+$movilizacion+$colacion+$aguinaldo+$comision+$bono+$cargas+$monto_cretroactivo+$valor_h_5+$valor_h_10;
            //echo 3;

        }
        $alcance_liquido= $total_haberes-$total_descuentos-$prestamo-$descuento;
        $total_liquido= $total_haberes-$total_descuentos-$anticipo-$prestamo-$descuento;
        
        $des_pre=$total_valor_salud+$total_valor_afp+$cesantia+$adicional;
        //$total_descuentos= $total_valor_afp+$total_valor_salud+$adicional+$cesantia;
        //print '<pre>';print_r($tasa2);print '</pre>';
        $datos=array(
            'rut_empresa' => $rut_empresa,
            'rs' => $rs,
            'direccion' => $direccion,
            'telefono' => $telefono,
            'ingreso' => $fecha_ingreso,
            'cargo' => $cargo,
            'mes' => $mes,
            'year' => $year,
            'empleado' => $data['empleados'],
            'salud' => $salud,
            'afp' => $afp,
            'tasa' => $dattasf,
            'tasa2' => $tasa2,
            'colacion' => $colacion,
            'cuota' => $cuota,
            'contrato' => $contrato,
            'uf' => $valueuf,
            'h_5' => $h_ext5,
            'h_10' => $h_ext10,
            'vh5' => $valor_h_5,
            'vh10' => $valor_h_10,
            'anticipo' => $anticipo,
            'desRet' => $descripcion_cretroactivo,
            'monRet' => $monto_cretroactivo,
            'tipo_bono' => $tipo_bono,
            'descripcion_bono' => $descripcion_bono,
            'bono' => $bono,
            'detalle_anticipo' => $det_anticipo,
            'sbase' => $sbase,
            'cargas' => $cargas,
            'tramo' => $tramo_carga,
            'familia' => $familia,
            'atrasos' => $atrasos,
            'hntrabajados' => $hntrabajados,
            'gratificacion' => $gratificacion,
            'total_imponible' => $total_imponible,
            'tope_imponible' => $tope_imponible,
            'movilizacion' => $movilizacion,
            'dtrabajados' => 30,
            'dntrabajados' => $dntrabajados,
            'tot_dntrab' => $tot_dntrab,
            'total_haberes' => $total_haberes,
            'total_valor_afp' => $total_valor_afp,
            'detalle_descuento' => $detalle_descuento,
            'descuento' => $descuento,
            'descuentos_previsionales' => $des_pre,
            'total_valor_salud' => $total_valor_salud,
            'tope_cesantia' => $tope_cesantia,
            'cesantia' => $cesantia,
            'adicional' => $adicional,
            'base_impuesto' => $ui,
            'impuesto' => $tot_iu,
            'detalle_prestamo' => $detalle_prestamo,
            'prestamo' => $prestamo,
            'total_descuentos' => $total_descuentos,
            'alcance_liquido' => $alcance_liquido,
            'total_liquido' => $total_liquido,
            'aguinaldo' => $aguinaldo
            );
        //print '<pre>';print_r($datos);print '</pre>';
        $para_insertar=array(
            'rut_empresa' => $rut_empresa,
            'rs' => $rs,
            'direccion' => $direccion,
            'telefono' => $telefono,
            'ingreso' => $fecha_ingreso,
            'cargo' => $cargo,
            'mes' => $mes,
            'year' => $year,
            'empleado' => $empleado,
            'salud' => $salud,
            'afp' => $afp,
            'tasa' => $dattasf,
            'tasa2' => $tasa2,
            'cuota' => $cuota,
            'contrato' => $contrato,
            'uf' => $valueuf,
            'anticipo' => $anticipo,
            'descripcion_bono' => $descripcion_bono,
            'bono' => $bono,
            'detalle_anticipo' => $det_anticipo,
            'sbase' => $sbase,
            'cargas' => $cargas,
            'gratificacion' => $gratificacion,
            'total_imponible' => $total_imponible,
            'tope_imponible' => $tope_imponible,
            'movilizacion' => $movilizacion,
            'dtrabajados' => 30,
            'dntrabajados' => $dntrabajados,
            'tot_dntrab' => $tot_dntrab,
            'total_haberes' => $total_haberes,
            'total_valor_afp' => $total_valor_afp,
            'detalle_descuento' => $detalle_descuento,
            'descuento' => $descuento,
            'descuentos_previsionales' => $des_pre,
            'total_valor_salud' => $total_valor_salud,
            'tope_cesantia' => $tope_cesantia,
            'cesantia' => $cesantia,
            'adicional' => $adicional,
            'base_impuesto' => $ui,
            'impuesto' => $tot_iu,
            'detalle_prestamo' => $detalle_prestamo,
            'prestamo' => $prestamo,
            'total_descuentos' => $total_descuentos,
            'alcance_liquido' => $alcance_liquido,
            'total_liquido' => $total_liquido,
            'aguinaldo' => $aguinaldo
            );
        //print '<pre>';print_r($datos);print '</pre>';
        $comprobar=$this->empleado_model->get_Detalle($empleado,$mes,$year);
        if($comprobar==null){
        $this->empleado_model->set_Detalle($para_insertar);
        }else{
        $this->empleado_model->update_Detalle($para_insertar,$empleado,$mes,$year);    
        }
        $this->html2pdf->html($this->load->view('remuneracion/liquidacion2', $datos, true));

        //si el pdf se guarda correctamente lo mostramos en pantalla
        if($this->html2pdf->create('save'))
        {
            $this->show();
        }

     }
     public function listLiq(){
        if($this->session->userdata('usuario') == FALSE || $this->session->userdata('nivel_acceso') != 'Administrador')
        {
            redirect(base_url().'login');
        }
        $empleado=$this->uri->segment(3);
        $data['empleado']=$this->empleado_model->getEmpleado($empleado);
        $data['imagen']=$this->empleado_model->getImagen($empleado);
        $data['liquidacion']=$this->empleado_model->getLiquidacion($empleado);
        $usuario=$this->session->userdata('usuario');
        $nivel=$this->session->userdata('nivel_acceso');
        $rut_usuario=$this->session->userdata('rut_usuario');
        $datos=array(
            'empleado' => $data['empleado'],
            'imagen' => $data['imagen'],
            'liquidacion' => $data['liquidacion']
            );
        $datnav=array(
            'usuario' => $usuario,
            'nivel' => $nivel,
            'rut_usuario' => $rut_usuario
            );
    $this->load->view('header');
    $this->load->view('nav', $datnav);
    $this->load->view('remuneracion/liquidaciones_empleado', $datos);

     }
     public function listDoc(){
        if($this->session->userdata('usuario') == FALSE || $this->session->userdata('nivel_acceso') != 'Administrador')
        {
            redirect(base_url().'login');
        }
        $empleado=$this->uri->segment(3);
        $data['empleado']=$this->empleado_model->getEmpleado($empleado);
        $data['imagen']=$this->empleado_model->getImagen($empleado);
        $data['documentos']=$this->empleado_model->getDocumentos($empleado);
        $usuario=$this->session->userdata('usuario');
        $nivel=$this->session->userdata('nivel_acceso');
        $rut_usuario=$this->session->userdata('rut_usuario');
        $datos=array(
            'empleado' => $data['empleado'],
            'imagen' => $data['imagen'],
            'documentos' => $data['documentos']
            );
        $datnav=array(
            'usuario' => $usuario,
            'nivel' => $nivel,
            'rut_usuario' => $rut_usuario
            );

    $this->load->view('header');
    $this->load->view('nav', $datnav);
    $this->load->view('remuneracion/lista_documentos', $datos);

     }
     public function crearEmpresa(){
        if($this->session->userdata('usuario') == FALSE || $this->session->userdata('nivel_acceso') != 'Administrador')
        {
            redirect(base_url().'login');
        }
        $usuario=$this->session->userdata('usuario');
        $nivel=$this->session->userdata('nivel_acceso');
        $rut_usuario=$this->session->userdata('rut_usuario');
        $datnav=array(
            'usuario' => $usuario,
            'nivel' => $nivel,
            'rut_usuario' => $rut_usuario
            );
            $this->load->view('header');
            $this->load->view('nav', $datnav);
            $this->load->view('remuneracion/crearEmpresa');
     }
     public function empresa(){
        if($this->session->userdata('usuario') == FALSE || $this->session->userdata('nivel_acceso') != 'Administrador')
        {
            redirect(base_url().'login');
        }
        $formulario_empresa=array(
            'rut' => set_value('rut'),
            'rs' => set_value('rs'),
            'direccion' => set_value('direccion'),
            'telefono' => set_value('telefono')
            );
        $this->empleado_model->setEmpresa($formulario_empresa);
        redirect('control/principal');
     }
     public function listaLiquidaciones(){
        if($this->session->userdata('usuario') == FALSE || $this->session->userdata('nivel_acceso') != 'Administrador')
        {
            redirect(base_url().'login');
        }
        $usuario=$this->session->userdata('usuario');
        $mes=$this->session->userdata('mes');
        $year=$this->session->userdata('year');
        $nivel=$this->session->userdata('nivel_acceso');
        $rut_usuario=$this->session->userdata('rut_usuario');
        $rut_empresa=$this->session->userdata('rut_empresa');
        $liquidaciones=$this->empleado_model->getLiquidaciones($rut_empresa,$mes,$year);
        $empleado=$this->empleado_model->getAllEmpleados($rut_empresa);

        $liq=array(
            'empleados' => $empleado,
            'liquidaciones' => $liquidaciones
            );
        $datnav=array(
            'usuario' => $usuario,
            'nivel' => $nivel,
            'rut_usuario' => $rut_usuario
            );
            $this->load->view('header');
            $this->load->view('nav', $datnav);
            $this->load->view('remuneracion/listarLiquidaciones',$liq);
     }
     public function eliminarLiq(){
        if($this->session->userdata('usuario') == FALSE || $this->session->userdata('nivel_acceso') != 'Administrador')
        {
            redirect(base_url().'login');
        }
        $empleado=$this->uri->segment(3);
        $mes=$this->uri->segment(4);
        $year=$this->uri->segment(5);
        $this->empleado_model->eliminarLiquidacion($empleado,$mes,$year);
        $this->empleado_model->eliminarAnticipo($empleado,$mes,$year);
        $this->empleado_model->eliminarPrestamo($empleado,$mes,$year);
        $this->empleado_model->eliminarBono($empleado,$mes,$year);
        $this->empleado_model->eliminarDescuento($empleado,$mes,$year);
        $this->empleado_model->eliminarCretroactivo($empleado,$mes,$year);
        redirect('control/listaLiquidaciones');
     }
     public function editarEmpresa(){
        if($this->session->userdata('usuario') == FALSE || $this->session->userdata('nivel_acceso') != 'Administrador')
        {
            redirect(base_url().'login');
        }
        $rut_empresa=$this->session->userdata('rut_empresa');
        $empresa=$this->empleado_model->getEmpresa($rut_empresa);
        $datos=array(
            'empresa' => $empresa
            );
        $usuario=$this->session->userdata('usuario');
        $nivel=$this->session->userdata('nivel_acceso');
        $rut_usuario=$this->session->userdata('rut_usuario');
        $datnav=array(
            'usuario' => $usuario,
            'nivel' => $nivel,
            'rut_usuario' => $rut_usuario
            );
        $this->load->view('header');
        $this->load->view('nav', $datnav);
        $this->load->view('remuneracion/editarEmpresa',$datos);
     }
     public function actualizarempresa(){
        if($this->session->userdata('usuario') == FALSE || $this->session->userdata('nivel_acceso') != 'Administrador')
        {
            redirect(base_url().'login');
        }
        $rut= set_value('rut');
        $formulario_empresa=array(
            'rs' => set_value('rs'),
            'direccion' => set_value('direccion'),
            'telefono' => set_value('telefono')
            );
        $this->empleado_model->updateEmpresa($formulario_empresa,$rut);
        redirect('control/principal');
     }
     public function desvinculado(){
        $rut=$this->uri->segment(3);
        $estado=array( 'estado' => 'inactivo');
        $this->empleado_model->desvincular($rut,$estado);
        redirect('control/exempleados');
     }
     public function vincular(){
        $rut=$this->uri->segment(3);
        $estado=array( 'estado' => 'activo');
        $this->empleado_model->desvincular($rut,$estado);
        redirect('control/empleados');
     }
     public function datos_liq(){
      $mes=$this->session->userdata('mes');//is very important!
        $year=$this->session->userdata('year');//is very important!
        $empleado=$this->uri->segment(3);
        //$mes=$this->uri->segment(4);
        //$year=$this->uri->segment(5);
        $rut_empresa=$this->session->userdata('rut_empresa');
        $data['empresa']=$this->empleado_model->getEmpresa($rut_empresa);
            foreach($data['empresa'] -> result() as $valemp){
                $rs=$valemp->rs;
                $direccion=$valemp->direccion;
                $telefono=$valemp->telefono;
            }
        $data['empleados']=$this->empleado_model->getEmpleado($empleado);
        $data['anticipo']=$this->empleado_model->getAnticipo($empleado,$mes,$year);
        if($data['anticipo']!=NULL){
            foreach($data['anticipo'] -> result() as $valueAnt){
                $anticipo= $valueAnt->monto;
                $det_anticipo=$valueAnt->descripcion;
            }}else{ $anticipo=0; $det_anticipo='';}
        $data['uf']=$this->previred_model->getUf($mes,$year);
            foreach($data['uf']->result() as $valueuf){
                $valueuf=$valueuf->uf1;
            }
        $data['contrato']=$this->empleado_model->getContrato($empleado);
            foreach ($data['contrato']->result() as $valcont) {
                $contrato = $valcont->tipo_contrato;
                $fecha_ingreso = $valcont->fecha_contrato;
                $cargo = $valcont->cargo;
            }
        $data['rmi']=$this->previred_model->getRmi($mes,$year);
            foreach($data['rmi'] -> result() as $valrmi){
        $tope_gratificacion=round(($valrmi->rmi1*4.75)/12);
        }
        $data['bono']=$this->empleado_model->getBono($empleado,$mes,$year);
        if($data['bono']!=NULL){
            foreach($data['bono'] -> result() as $valbono){
                $descripcion_bono=$valbono->descripcion;
                $bono=$valbono->monto;
            }
        }else{ 
                $descripcion_bono='';
                $bono=0;
            }
        $data['liquidacion']=$this->empleado_model->getLiquidaciondet($empleado,$mes,$year);
            foreach($data['liquidacion'] -> result() as $valliq){
                $sbase=$valliq->sbase;
                $colacion=$valliq->colacion;
                $dntrabajados=$valliq->dntrabajados;
                $gratificacion=$valliq->gratificacion;
                $aguinaldo= $valliq->aguinaldo;
                $comision=$valliq->comision;
                $movilizacion=$valliq->movilizacion;
                $cargas=$valliq->monto;
            }
            $tot_dntrab=($sbase/30)*$dntrabajados;
            $other_tot_imp=$sbase-$tot_dntrab;

            if($dntrabajados>0){//dias no trabajados sin tope previred gratificacion
                if($bono!=0){
                    $baseplusbono=$sbase+$bono;
                    $gratificacion=$baseplusbono*0.25;
                }else{
                    $gratificacion=$other_tot_imp*0.25;
                }
                 if($gratificacion>$tope_gratificacion){
                    $gratificacion=$tope_gratificacion;
                    $total_imponible=$other_tot_imp+$tope_gratificacion;
                    $sbase2=$other_tot_imp;
                }else{
                    $total_imponible=$other_tot_imp+$gratificacion;
                    $sbase2=$other_tot_imp;
                }
            }else{
                $total_imponible=$sbase+$gratificacion;
                if($bono!=0){
                    $baseplusbono=$sbase+$bono;
                    $gratificacion=$baseplusbono*0.25;
                        if($gratificacion>$tope_gratificacion){
                            $gratificacion=$tope_gratificacion;
                            $total_imponible=$baseplusbono+$gratificacion;
                        }                
                            }
            }
        $data['previ']=$this->empleado_model->getPrevision($empleado);
        if($data['previ']!=NULL){
            foreach($data['previ'] -> result() as $valpre){
                $salud=$valpre->salud;
                $afp=$valpre->afp;
                $cuota=$valpre->cuota;
            }
        }else{
                $salud='';
                $afp='';
                $cuota=0;
        }

        $data['rti']=$this->previred_model->getRti($mes,$year);
            foreach($data['rti'] -> result() as $valrti){
        $tope_imponible=$valrti->rti1;
        $tope_cesantia=$valrti->rti3;
        }
        echo $afp.' '.$mes.' '.$year;
         $data['afp']=$this->previred_model->getAfpL($afp,$mes,$year);
         if($data['afp']!=NULL){
            foreach ($data['afp'] -> result() as $valafp) {
                $datafp = $valafp->afp1;
                $dattasf = $valafp->tafpd1;
            }
        }else{
                $datafp = '';
                $dattasf = '';
        }
        $tasa2='0.'.str_replace('.', '', $dattasf);
        if($total_imponible>$tope_imponible){
            $total_valor_afp=round($tope_imponible*$tasa2);
        }else{
            $total_valor_afp=round($total_imponible*$tasa2);
        }

        if($salud=='Fonasa'){ 
            if($total_imponible>$tope_imponible){
            $total_valor_salud=round($tope_imponible*0.07) ;
            $adicional=0;
            }else{
            $total_valor_salud=round($total_imponible*0.07) ;
            $adicional=0;
            }
        }else{
            if($total_imponible>$tope_imponible){
            $total_valor_salud=round($tope_imponible*0.07) ;
            $valorCuotaUf=$cuota * $valueuf;
            $adicional2=$valorCuotaUf-$total_valor_salud;
            if($adicional2>0){ $adicional=$adicional2; }else{ $adicional=0; }
            }else{
            $total_valor_salud=round($total_imponible*0.07) ;
            $valorCuotaUf=$cuota * $valueuf;
            $adicional2=$valorCuotaUf-$total_valor_salud;
            if($adicional2>0){ $adicional=$adicional2; }else{ $adicional=0; }
            }
        }
        if($contrato=='Indefinido'){
            if($total_imponible>$tope_cesantia){
                $cesantia=round($tope_cesantia*0.006);
            }else{
                $cesantia=round($total_imponible*0.006);
            }
        }else{ $cesantia=0; }
        $data['prestamo']=$this->empleado_model->getPrestamo($empleado,$mes);
            if($data['prestamo']!=NULL){ 
                foreach($data['prestamo'] -> result() as $valprestamo){
                $detalle_prestamo=$valprestamo->descripcion;
                $prestamo=$valprestamo->monto;
                } 
            }else{
                $detalle_prestamo='';
                $prestamo=0;
            }
        $data['descuento']=$this->empleado_model->getDescuento($empleado,$mes);
            if($data['descuento']!=NULL){ 
                foreach($data['descuento'] -> result() as $valdescuento){
                $detalle_descuento=$valdescuento->descripcion;
                $descuento=$valdescuento->monto;
                } 
            }else{
                $detalle_descuento='';
                $descuento=0;
            }
        $otro_total_descuentos= $total_valor_afp+$total_valor_salud+$cesantia+$adicional; //sin el impuesto
        $ui=$total_imponible-$otro_total_descuentos;
        //echo $ui.' '.'</br>';
        if($ui>=617274.01 && $ui<=1371720){
            $fac=0.04;
            $desc=24690.96;
            $resfac=$ui*$fac;
            $tot_iu=$resfac-$desc;
            //echo 'tramo 2 '.$tot_iu.' '.'</br>';
        }elseif($ui>=1371720.01 && $ui<=2286200){
            $fac=0.08;
            $desc=79559.76;
            $resfac=$ui*$fac;
            $tot_iu=$resfac-$desc;
            //echo 'tramo 3 '.$tot_iu.' '.'</br>';
        }elseif($ui>=2286200.01 && $ui<=3200680){
            $fac=0.135;
            $desc=205300.76;
            $resfac=$ui*$fac;
            $tot_iu=$resfac-$desc;
            //echo 'tramo 4 '.$tot_iu.' '.'</br>';
        }else{
            $tot_iu=0;
            //echo 'tramo 5 '.$tot_iu.' '.'</br>';
        }

        $total_descuentos= $total_valor_afp+$total_valor_salud+$cesantia+$adicional+$tot_iu;
        if($dntrabajados>0){
            $total_haberes=$sbase2+$gratificacion+$movilizacion+$colacion+$aguinaldo+$comision+$bono;
        }else{
            $total_haberes=$sbase+$gratificacion+$movilizacion+$colacion+$aguinaldo+$comision+$bono;
        }
        $alcance_liquido= $total_haberes-$total_descuentos-$prestamo-$descuento;
        $total_liquido= $total_haberes-$total_descuentos-$anticipo-$prestamo-$descuento;
        
        $des_pre=$total_valor_salud+$total_valor_afp+$cesantia+$adicional;
        //$total_descuentos= $total_valor_afp+$total_valor_salud+$adicional+$cesantia;
        //print '<pre>';print_r($tasa2);print '</pre>';
        $datos=array(
            'rut_empresa' => $rut_empresa,
            'rs' => $rs,
            'direccion' => $direccion,
            'telefono' => $telefono,
            'ingreso' => $fecha_ingreso,
            'cargo' => $cargo,
            'mes' => $mes,
            'year' => $year,
            'empleado' => $data['empleados'],
            'salud' => $salud,
            'afp' => $afp,
            'tasa' => $dattasf,
            'tasa2' => $tasa2,
            'cuota' => $cuota,
            'contrato' => $contrato,
            'uf' => $valueuf,
            'anticipo' => $anticipo,
            'descripcion_bono' => $descripcion_bono,
            'bono' => $bono,
            'detalle_anticipo' => $det_anticipo,
            'sbase' => $sbase,
            'cargas' => $cargas,
            'gratificacion' => $gratificacion,
            'total_imponible' => $total_imponible,
            'tope_imponible' => $tope_imponible,
            'movilizacion' => $movilizacion,
            'dntrabajados' => $dntrabajados,
            'tot_dntrab' => $tot_dntrab,
            'total_haberes' => $total_haberes,
            'total_valor_afp' => $total_valor_afp,
            'descuentos_previsionales' => $des_pre,
            'total_valor_salud' => $total_valor_salud,
            'tope_cesantia' => $tope_cesantia,
            'cesantia' => $cesantia,
            'adicional' => $adicional,
            'base_impuesto' => $ui,
            'impuesto' => $tot_iu,
            'detalle_prestamo' => $detalle_prestamo,
            'prestamo' => $prestamo,
            'total_descuentos' => $total_descuentos,
            'alcance_liquido' => $alcance_liquido,
            'total_liquido' => $total_liquido,
            'aguinaldo' => $aguinaldo
            );
        print '<pre>';print_r($datos);print '</pre>';
     }
     public function changeDate(){
        $mes= set_value('mes');
        $year= set_value('year');
        $this->session->set_userdata('mes',$mes);
        $this->session->set_userdata('year',$year);
        redirect('control/principal');
     }
     public function documentos(){
         if($this->session->userdata('usuario') == FALSE || $this->session->userdata('nivel_acceso') != 'Administrador')
        {
            redirect(base_url().'login');
        }
        $usuario=$this->session->userdata('usuario');
        $nivel=$this->session->userdata('nivel_acceso');
        $rut_empresa=$this->session->userdata('rut_empresa');
        $estado='activo';
        $empleados=$this->empleado_model->getEmpleados($rut_empresa,$estado);
        $rut_usuario=$this->session->userdata('rut_usuario');
        $datos=array(
            'usuario' => $usuario,
            'nivel' => $nivel,
            'empleados' => $empleados,
            'rut_usuario' => $rut_usuario
            );
        $this->load->view('header');
        $this->load->view('nav', $datos);
        $this->load->view('remuneracion/documentos');
        $this->load->view('footer');
     
     }
     public function ver(){
        $texto=nl2br(set_value('textarea'));
        //$contenido = preg_replace('/&lt;/','<',$texto);
        //$contenido = preg_replace('/&gt;/','>',$contenido);
        $datos=array(
            'contrato' => $texto
            );
        $this->empleado_model->set_docs_contrato($datos);
        redirect('control/documentos');
     }
     public function contrato(){
        $mes=$this->session->userdata('mes');//is very important!
        $year=$this->session->userdata('year');//is very important!
        $empleado=$this->uri->segment(3);
        $data['empleado']=$this->empleado_model->getEmpleado($empleado);
        foreach($data['empleado'] -> result() as $valempleado){
            $nombre=$valempleado->nombres.' '.$valempleado->apellido_paterno.' '.$valempleado->apellido_materno;
            $nacionalidad=$valempleado->nacionalidad;
            $estadocivil=$valempleado->estado_civil;
            $rut=$valempleado->rut;
            $fnacimiento=$valempleado->fecha_nacimiento;
            $sr=$valempleado->sr;
        }
       $data['contrato']=$this->empleado_model->getContrato($empleado);
            foreach($data['contrato'] -> result() as $valContrato){
                $fecha_contrato=$valContrato->fecha_contrato;
                $fecha_termino=$valContrato->fecha_termino;
                $tipo_contrato=$valContrato->tipo_contrato;
                $cargo=$valContrato->cargo;
                $horario=$valContrato->horario;
                $sueldo_base=$valContrato->sbase;
                $tipo_documento=$valContrato->contrato;
            }
        $rut_empresa=$this->session->userdata('rut_empresa');
        $data['empresa']=$this->empleado_model->getEmpresa($rut_empresa);
            foreach($data['empresa'] -> result() as $valemp){
                $rs=$valemp->rs;
                $direccion=$valemp->direccion;
                $telefono=$valemp->telefono;
            }
        $data['liquidacion']=$this->empleado_model->getLiquidaciondet($empleado,$mes,$year);
        $datacont=array(
            'sr' => $sr,
            'nombre' => $nombre,
            'nacionalidad' => $nacionalidad,
            'estadocivil' => $estadocivil,
            'rut' => $rut,
            'fnacimiento' => $fnacimiento,
            'fecha_contrato' => $fecha_contrato,
            'fecha_termino' => $fecha_termino,
            'tipo_contrato' => $tipo_contrato,
            'cargo' => $cargo,
            'horario' => $horario,
            'sueldo' => $sueldo_base,
            'tipo_documento' => $tipo_documento
            );
        //print '<pre>';print_r($datacont);print '</pre>';
        $this->load->view('remuneracion/contrato',$datacont);
     }
     public function libro(){
        $empresa=$this->session->userdata('rut_empresa');
        $mes=$this->session->userdata('mes');//is very important!
        $year=$this->session->userdata('year');//is very important!
        $data['empleado']=$this->empleado_model->getAllEmpleados($empresa);
        $data['contrato']=$this->empleado_model->getContratos();
        $data['liquidacion']=$this->empleado_model->getLiquidaciones($empresa,$mes,$year);
        $data['anticipos']=$this->empleado_model->getAnticipos($mes,$year);
        $data['prevision']=$this->empleado_model->getPrevisionLibro();
        $data['detalle']=$this->empleado_model->get_Detalle_Libro($empresa,$mes,$year);
                
        $datos=array(
            'mes' => $mes,
            'year' => $year,
            'empleado' => $data['empleado'],
            'contratos' => $data['contrato'],
            'liquidacion' => $data['liquidacion'],
            'anticipo' => $data['anticipos'],
            'prevision' => $data['prevision'],
            'detalle' => $data['detalle']
            );
        //print '<pre>';print_r($data['anticipos']);print '</pre>';
       $this->load->view('remuneracion/libro',$datos);
     }
function cargar_archivo() {

        $empleado=set_value('empleado_documento');
        $tipo_documento=set_value('tipo_doc');
        $descripcion=set_value('descripcion');
        $hora=date('H_m_s');
        $fichero=$tipo_documento.'_'.$empleado.'_'.$hora;
        $rut_empresa=$this->session->userdata('rut_empresa');
        $original=$_FILES['userfile']['name'];
        $trozos = explode(".", $original); 
        $extension = end($trozos); 
        $mi_archivo = 'userfile';
        $config['upload_path'] = "uploads_docs/";
        $config['file_name'] = $tipo_documento.'_'.$empleado.'_'.$hora.'.'.$extension;
        $config['allowed_types'] = "*";
        $config['max_size'] = "50000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";
        
        $data=array(
            'fichero' => $config['file_name'],
            'descripcion' => $descripcion,
            'empleado' => $empleado,
            'empresa' => $rut_empresa,
            'tipo' => $tipo_documento
            );
        //print '<pre>';print_r($data);print '</pre>';
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload($mi_archivo)) {
            //*** ocurrio un error
            $data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors();
            return;
        }
        $this->empleado_model->upload_doc($data);
        $data['uploadSuccess'] = $this->upload->data();
        //echo $fichero.' '.$config['file_name'].' '.$hora;
        redirect('control/listDoc/'.$empleado);
    }
    public function borrarDoc(){
        $empleado=$this->uri->segment(3);
        $fichero=$this->uri->segment(4);
        if (file_exists("uploads_docs/".$fichero)) {
            unlink("uploads_docs/".$fichero);
            $this->empleado_model->eliminarDocumento($empleado,$fichero);
            redirect('control/listDoc/'.$empleado);
        }
    }
    public function cambio(){
       if($this->session->userdata('usuario') == FALSE || $this->session->userdata('nivel_acceso') != 'Administrador')
        {
            redirect(base_url().'login');
        }
        $usuario=$this->session->userdata('usuario');
        $nivel=$this->session->userdata('nivel_acceso');
        $rut_empresa=$this->session->userdata('rut_empresa');
        $rut_usuario=$this->session->userdata('rut_usuario');
        $datos=array(
            'usuario' => $usuario,
            'nivel' => $nivel,
            'rut_usuario' => $rut_usuario
            );
        $this->load->view('header');
        $this->load->view('nav', $datos);
        $this->load->view('remuneracion/cambio',$usuario);
        $this->load->view('footer'); 
    }
    public function actualizarUser(){
        $rut_usuario=$this->session->userdata('rut_usuario');
        $user=$this->uri->segment(3);
        $formulario_usuario=array(
            'usuario' => $user
            );
        $this->empleado_model->actualizarUsuario($rut_usuario,$formulario_usuario);
        redirect('login/logout_ci');
    }
    public function actualizarClave(){
        $rut_usuario=$this->session->userdata('rut_usuario');
        $clave=$this->uri->segment(3);
        $encClave=md5($clave);
        $formulario_clave=array(
            'contrasena' => $encClave
            );
        $this->empleado_model->actualizarUsuario($rut_usuario,$formulario_clave);
        redirect('login/logout_ci');
    }
    public function seleccionNomina(){
        if($this->session->userdata('usuario') == FALSE || $this->session->userdata('nivel_acceso') != 'Administrador')
        {
            redirect(base_url().'login');
        }
        $usuario=$this->session->userdata('usuario');
        $nivel=$this->session->userdata('nivel_acceso');
        $rut_usuario=$this->session->userdata('rut_usuario');
        $datos=array(
            'usuario' => $usuario,
            'nivel' => $nivel,
            'rut_usuario' => $rut_usuario
            );
        $this->load->view('header');
        $this->load->view('nav',$datos);
        $this->load->view('remuneracion/SeleccionNomina');
        $this->load->view('footer');
    }
     public function nomina(){
        if($this->session->userdata('usuario') == FALSE || $this->session->userdata('nivel_acceso') != 'Administrador')
        {
            redirect(base_url().'login');
        }
        $mes=$this->session->userdata('mes');
        $ano=$this->session->userdata('year');
         switch($mes){ 
                case 'Enero': 
                    $mes2 = '01'; 
                    break; 
                case 'Febrero': 
                    $mes2 = '02';
                    break; 
                case 'Marzo': 
                    $mes2 = '03';
                    break; 
                case 'Abril': 
                    $mes2 = '04';
                    break;
                case 'Mayo': 
                    $mes2 = '05';
                    break; 
                case 'Junio': 
                    $mes2 = '06';
                    break; 
                case 'Julio': 
                    $mes2 = '07';
                    break; 
                case 'Agosto': 
                    $mes2 = '08';
                    break; 
                case 'Septiembre': 
                    $mes2 = '09';
                    break; 
                case 'Octubre': 
                    $mes2 = '10';
                    break; 
                case 'Noviembre': 
                    $mes2 = '11';
                    break; 
                case 'Diciembre': 
                    $mes2 = '12';
                    break;  
            }
        $f_inicio='01-'.$mes2.'-'.$ano;
        $ult_dia=cal_days_in_month(CAL_GREGORIAN,$mes2,$ano);
        $f_termino=$ano.$mes2.$ult_dia;
        $usuario=$this->session->userdata('usuario');
        $nivel=$this->session->userdata('nivel_acceso');
        $rut_empresa=$this->session->userdata('rut_empresa');
        $rut3=str_replace('.','',$rut_empresa);
        $rut2=str_replace('-','',$rut3);
        $rut1=str_replace('K','K',$rut2);
        $rut=str_replace('k','K',$rut1);
        $rutreal=str_pad($rut, 10, "0", STR_PAD_LEFT);
        $rut_usuario=$this->session->userdata('rut_usuario');
        $mes=$this->session->userdata('mes');
        $year=$this->session->userdata('year');
        $empresa=$this->empleado_model->nomEmpresa($rut_empresa);
            foreach($empresa -> result() as $value){
                $nombre=strtoupper($value->rs);
            }
        $rest = substr($nombre,0,16);
        $data['detalle']=$this->empleado_model->get_Detalle_Libro($rut_empresa,$mes,$year);
        $data['empleado']=$this->empleado_model->getAllEmpleados($rut_empresa);
        $data['dpersonales']=$this->empleado_model->getDpersonales();
        $datos=array(
            'usuario' => $usuario,
            'nivel' => $nivel,
            'rut_usuario' => $rut_usuario
            );
        $informacion=array(
            'detalle' => $data['detalle'],
            'empleado' => $data['empleado'],
            'dpersonales' => $data['dpersonales'],
            'mes' => $mes,
            'periodo' => $year,
            'rut_empresa' => $rutreal,
            'n_empresa' => $rest,
            'fecha_final' => $f_termino
            );
        $this->load->view('header');
        $this->load->view('nav',$datos);
        $this->load->view('remuneracion/nomina',$informacion);
        $this->load->view('footer');
     }
     public function quincena(){
        if($this->session->userdata('usuario') == FALSE || $this->session->userdata('nivel_acceso') != 'Administrador')
        {
            redirect(base_url().'login');
        }
        $mes=$this->session->userdata('mes');
        $ano=$this->session->userdata('year');
         switch($mes){ 
                case 'Enero': 
                    $mes2 = '01'; 
                    break; 
                case 'Febrero': 
                    $mes2 = '02';
                    break; 
                case 'Marzo': 
                    $mes2 = '03';
                    break; 
                case 'Abril': 
                    $mes2 = '04';
                    break;
                case 'Mayo': 
                    $mes2 = '05';
                    break; 
                case 'Junio': 
                    $mes2 = '06';
                    break; 
                case 'Julio': 
                    $mes2 = '07';
                    break; 
                case 'Agosto': 
                    $mes2 = '08';
                    break; 
                case 'Septiembre': 
                    $mes2 = '09';
                    break; 
                case 'Octubre': 
                    $mes2 = '10';
                    break; 
                case 'Noviembre': 
                    $mes2 = '11';
                    break; 
                case 'Diciembre': 
                    $mes2 = '12';
                    break;  
            }
        $f_termino=$ano.$mes2.'15';
        $usuario=$this->session->userdata('usuario');
        $nivel=$this->session->userdata('nivel_acceso');
        $rut_empresa=$this->session->userdata('rut_empresa');
        $rut3=str_replace('.','',$rut_empresa);
        $rut2=str_replace('-','',$rut3);
        $rut1=str_replace('K','K',$rut2);
        $rut=str_replace('k','K',$rut1);
        $rutreal=str_pad($rut, 10, "0", STR_PAD_LEFT);
        $rut_usuario=$this->session->userdata('rut_usuario');
        $mes=$this->session->userdata('mes');
        $year=$this->session->userdata('year');
        $empresa=$this->empleado_model->nomEmpresa($rut_empresa);
            foreach($empresa -> result() as $value){
                $nombre=strtoupper($value->rs);
            }
        $rest = substr($nombre,0,16);
        $data['detalle']=$this->empleado_model->get_Detalle_Libro($rut_empresa,$mes,$year);
        $data['empleado']=$this->empleado_model->getAllEmpleados($rut_empresa);
        $datos=array(
            'usuario' => $usuario,
            'nivel' => $nivel,
            'rut_usuario' => $rut_usuario
            );
        $informacion=array(
            'detalle' => $data['detalle'],
            'empleado' => $data['empleado'],
            'mes' => $mes,
            'periodo' => $year,
            'rut_empresa' => $rutreal,
            'n_empresa' => $rest,
            'fecha_final' => $f_termino
            );
        $this->load->view('header');
        $this->load->view('nav',$datos);
        $this->load->view('remuneracion/nominaQuincena',$informacion);
        $this->load->view('footer');
     }
     public function CrearTxtmensual(){
        $mes=$_POST['mes'];
        $periodo=$_POST['periodo'];
        $tipo=$_POST['tipo'];
        header('Content-Disposition: attachment; filename="'.$mes.$periodo.$tipo.'.txt"');
        $convenio=$_POST['convenio'];
        $empresa=$_POST['empresa'];
        $rut_empresa=$_POST['rut_empresa'];
        $f_abono=$_POST['f_abono'];
        echo $convenio.$empresa.$rut_empresa.$f_abono."\r\n";
        $banco=$_POST['banco'];
        $transaccion=$_POST['transaccion'];
        $cuenta=$_POST['cuenta'];
        $rut=$_POST['rut'];
        $nombre=$_POST['nombre'];
        $monto=$_POST['monto'];
        for($i = 0; $i < count($banco); $i++) {
                echo $banco[$i].$transaccion[$i].$cuenta[$i].$rut[$i].$nombre[$i].$monto[$i]."\r\n";
        }

     }
}
