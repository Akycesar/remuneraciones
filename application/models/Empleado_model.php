<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Empleado_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

function setEmpleado($formulario_empleado)
	{
		$this->db->insert('empleado_remuneracion', $formulario_empleado);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}
function setEmpresa($formulario_empresa)
	{
		$this->db->insert('empresa_remuneracion', $formulario_empresa);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}
function set_docs_contrato($datos)
	{
		$this->db->insert('contrato_doc_remuneracion', $datos);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}
function upload_doc($data)
	{
		$this->db->insert('documento_remuneracion', $data);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}
function getDocumentos($empleado)
	{
		$this->db->where('empleado',$empleado);
		$query = $this->db->get('documento_remuneracion');
		
		if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
	}
function nomEmpresa($rut_empresa)
	{
		$this->db->where('rut',$rut_empresa);
		$query = $this->db->get('empresa_remuneracion');
		
		if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
	}
function get_docs_contrato()
	{
		$query = $this->db->get('contrato_doc_remuneracion');
		
		if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
	}
function getDpersonales()
	{
		$query = $this->db->get('dpersonales_remuneracion');
		
		if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
	}
function get_Detalle($empleado,$mes,$year)
	{
		$this->db->where('empleado',$empleado);
		$this->db->where('mes',$mes);
    	$this->db->where('year',$year);
		$query = $this->db->get('detalle_liquidacion_remuneracion');
		
		if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
	}//ingetec
	function get_Detalle_Libro($empresa,$mes,$year)
	{
		$this->db->where('rut_empresa',$empresa);
		$this->db->where('mes',$mes);
    	$this->db->where('year',$year);
		$query = $this->db->get('detalle_liquidacion_remuneracion');
		
		if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
	}
function setContrato($formulario_contrato)
	{
		$this->db->insert('contrato_remuneracion', $formulario_contrato);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}
function set_Detalle($datos)
	{
		$this->db->insert('detalle_liquidacion_remuneracion', $datos);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}
function update_Detalle($para_insertar,$empleado,$mes,$year)
	{
		$this->db->where('empleado',$empleado);
		$this->db->where('mes',$mes);
		$this->db->where('year',$year);
		$this->db->update('detalle_liquidacion_remuneracion', $para_insertar);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}
function updateEmpleado($formulario_empleado,$rut)
	{
		$this->db->where('rut',$rut);
		$this->db->update('empleado_remuneracion', $formulario_empleado);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}
function desvincular($rut,$estado)
	{
		$this->db->where('rut',$rut);
		$this->db->update('empleado_remuneracion', $estado);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}
function updateEmpresa($formulario_empresa,$rut)
	{
		$this->db->where('rut',$rut);
		$this->db->update('empresa_remuneracion', $formulario_empresa);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}
function updateContrato($formulario_contrato,$rut)
	{
		$this->db->where('empleado',$rut);
		$this->db->update('contrato_remuneracion', $formulario_contrato);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}
function actualizarUsuario($rut_usuario,$formulario_usuario){
		$this->db->where('rut_usuario',$rut_usuario);
		$this->db->update('usuario', $formulario_usuario);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
}
function actualizarClave($rut_usuario,$formulario_clave){
		$this->db->where('rut_usuario',$rut_usuario);
		$this->db->update('usuario', $formulario_clave);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
}
	function getEmpleados($rut_empresa,$estado){
		$this->db->where('estado', $estado);
		$this->db->where('empresa', $rut_empresa);
		$this->db->order_by('nombres', "asc");
		$query = $this->db->get('empleado_remuneracion');

		if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
	}
	function getImpuesto($mes,$year){
		$this->db->where('mes', $mes);
		$this->db->where('year', $year);
		$query = $this->db->get('impuesto_remuneracion');

		if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
	}
	function getAllEmpleados($rut_empresa){
		$this->db->where('empresa', $rut_empresa);
		$query = $this->db->get('empleado_remuneracion');

		if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
	}
	function getPrestamo($empleado,$mes){
		$this->db->where('empleado',$empleado);
		$this->db->where('mes',$mes);
		$query = $this->db->get('prestamo_remuneracion');

		if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
	}
	function getDescuento($empleado,$mes){
		$this->db->where('empleado',$empleado);
		$this->db->where('mes',$mes);
		$query = $this->db->get('descuento_remuneracion');

		if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
	}
	function getEmpresas(){
		$query = $this->db->get('empresa_remuneracion');

		if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
	}
	function getEmpresa($rut_empresa){
		$this->db->where('rut', $rut_empresa);
		$query = $this->db->get('empresa_remuneracion');

		if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
	}
	function getEmpleado($empleado){
		$this->db->where('rut', $empleado);
    	$query=$this->db->get('empleado_remuneracion');

    	if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
	}
	function subir($titulo,$imagen,$empleado){
        $this->db->where('empleado', $empleado);
        $query=$this->db->get('imagen_remuneracion');

        if($query->num_rows() > 0)
		{
			$data2 = array(
            'titulo' => $titulo,
            'ruta' => $imagen
        );
			$this->db->where('empleado', $empleado);
			return $this->db->update('imagen_remuneracion', $data2);
		}else{
			
			$data = array(
            'titulo' => $titulo,
            'ruta' => $imagen,
            'empleado' => $empleado
        );
			return $this->db->insert('imagen_remuneracion', $data);
		}
        
    }
    function getPersonales($empleado){
    	$this->db->where('empleado', $empleado);
    	$query=$this->db->get('dpersonales_remuneracion');

    	if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
    }
    function getContrato($empleado){
    	$this->db->where('empleado', $empleado);
    	$query=$this->db->get('contrato_remuneracion');

    	if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
    }
    function getContratos(){
    	$query=$this->db->get('contrato_remuneracion');

    	if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
    }
    function getPrevision($empleado){
    	$this->db->where('empleado', $empleado);
    	$query=$this->db->get('prevision_remuneracion');

    	if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
    }
    function getEmergencia($empleado){
    	$this->db->where('empleado', $empleado);
    	$query=$this->db->get('emergencia_remuneracion');

    	if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
    }
    function getCretroactivo($empleado,$mes,$year){
    	$this->db->where('empleado', $empleado);
		$this->db->where('mes',$mes);
    	$this->db->where('year',$year);
    	$query=$this->db->get('cretroactivo_remuneracion');

    	if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
    }
    function getImagen($empleado){
    	$this->db->where('empleado', $empleado);
    	$query=$this->db->get('imagen_remuneracion');

    	if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
    }
    function eliminarEmpleado($rut){
    	$this->db->where('rut',$rut);
		return $this->db->delete('empleado_remuneracion');
    }
    function eliminarDocumento($empleado,$fichero){
    	$this->db->where('empleado',$empleado);
    	$this->db->where('fichero',$fichero);
		return $this->db->delete('documento_remuneracion');
    }
    function eliminarLiquidacion($empleado,$mes,$year){
    	$this->db->where('empleado',$empleado);
    	$this->db->where('mes',$mes);
    	$this->db->where('year',$year);
		return $this->db->delete('liquidacion_remuneracion');
    }
    function eliminarAnticipo($empleado,$mes,$year){
    	$this->db->where('empleado',$empleado);
    	$this->db->where('mes',$mes);
    	$this->db->where('year',$year);
		return $this->db->delete('anticipo_remuneracion');
    }
    function eliminarPrestamo($empleado,$mes,$year){
    	$this->db->where('empleado',$empleado);
    	$this->db->where('mes',$mes);
    	$this->db->where('year',$year);
		return $this->db->delete('prestamo_remuneracion');
    }
    function eliminarBono($empleado,$mes,$year){
    	$this->db->where('empleado',$empleado);
    	$this->db->where('mes',$mes);
    	$this->db->where('year',$year);
		return $this->db->delete('bono_remuneracion');
    }
    function eliminarDescuento($empleado,$mes,$year){
    	$this->db->where('empleado',$empleado);
    	$this->db->where('mes',$mes);
    	$this->db->where('year',$year);
		return $this->db->delete('descuento_remuneracion');
    }
    function eliminarCretroactivo($empleado,$mes,$year){
    	$this->db->where('empleado',$empleado);
    	$this->db->where('mes',$mes);
    	$this->db->where('year',$year);
		return $this->db->delete('cretroactivo_remuneracion');
    }
    function setSbase($formulario_sbase,$empleado){
    	$this->db->where('empleado', $empleado);
        $query=$this->db->get('sbase_remuneracion');

        if($query->num_rows() > 0)
		{
			$this->db->where('empleado', $empleado);
			return $this->db->update('sbase_remuneracion', $formulario_sbase);
		}else{

			return $this->db->insert('sbase_remuneracion', $formulario_sbase);
		}		
    }
    function setHlaboral($formulario_hlaboral,$empleado){
    	$this->db->where('empleado', $empleado);
        $query=$this->db->get('hlaboral_remuneracion');
    	
		if($query->num_rows() > 0)
		{
			$this->db->where('empleado', $empleado);
			return $this->db->update('hlaboral_remuneracion', $formulario_hlaboral);
		}else{

			return $this->db->insert('hlaboral_remuneracion', $formulario_hlaboral);
		}	
		
    }
    function setAfamiliar($formulario_afamiliar,$empleado){
    	$this->db->where('empleado', $empleado);
        $query=$this->db->get('afamiliar_remuneracion');
		
		if($query->num_rows() > 0)
		{
			$this->db->where('empleado', $empleado);
			return $this->db->update('afamiliar_remuneracion', $formulario_afamiliar);
		}else{

			return $this->db->insert('afamiliar_remuneracion', $formulario_afamiliar);
		}
    }
    function setLiquidacion($formulario_liquidacion){
    	$this->db->insert('liquidacion_remuneracion', $formulario_liquidacion);
    	if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
    }
    function getLiquidacion($empleado){
    	
		$this->db->where('empleado', $empleado);
    	$query=$this->db->get('liquidacion_remuneracion');

    	if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
    }
    function getLiquidaciondet($empleado,$mes,$year){
    	$this->db->where('mes', $mes); 
    	$this->db->where('year', $year); 
		$this->db->where('empleado', $empleado);
    	$query=$this->db->get('liquidacion_remuneracion');

    	if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
    }
    function getLiquidaciones($rut_empresa,$mes,$year){
    	$this->db->where('mes', $mes);
    	$this->db->where('year', $year);
		$this->db->where('empresa', $rut_empresa);
    	$query=$this->db->get('liquidacion_remuneracion');

    	if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
    }
    function getAnticipo($empleado,$mes,$year){
    	$this->db->where('empleado',$empleado);
    	$this->db->where('mes',$mes);
    	$this->db->where('year',$year);
    	$query=$this->db->get('anticipo_remuneracion');

    	if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
    }
    function getAnticipos($mes,$year){
    	$this->db->where('mes',$mes);
    	$this->db->where('year',$year);
    	$query=$this->db->get('anticipo_remuneracion');

    	if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
    }
    
    function getPrevisionLibro(){
    	$query=$this->db->get('prevision_remuneracion');

    	if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
    }
    function getBono($empleado,$mes,$year){
    	$this->db->where('empleado',$empleado);
    	$this->db->where('mes',$mes);
    	$this->db->where('year',$year);
    	$query=$this->db->get('bono_remuneracion');

    	if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
    }
}