<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Previred_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
    function getUf($mes,$year){
    	$this->db->where('mes',$mes);
    	$this->db->where('year',$year);
    	$query=$this->db->get('uf_remuneracion');

    	if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
    }
    function getImpuesto($mes,$year){
    	$this->db->where('mes',$mes);
    	$this->db->where('year',$year);
    	$query=$this->db->get('impuesto_remuneracion');

    	if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
    }
    function getUtm($mes,$year){
    	$this->db->where('mes',$mes);
    	$this->db->where('year',$year);
    	$query=$this->db->get('utm_remuneracion');

    	if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
    }
    function getRti($mes,$year){
    	$this->db->where('mes',$mes);
    	$this->db->where('year',$year);
    	$query=$this->db->get('rti_remuneracion');

    	if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
    }
    function getRmi($mes,$year){
    	$this->db->where('mes',$mes);
    	$this->db->where('year',$year);
    	$query=$this->db->get('rmi_remuneracion');

    	if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
    }
    function getApv($mes,$year){
    	$this->db->where('mes',$mes);
    	$this->db->where('year',$year);
    	$query=$this->db->get('apv_remuneracion');

    	if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
    }
    function getDc($mes,$year){
    	$this->db->where('mes',$mes);
    	$this->db->where('year',$year);
    	$query=$this->db->get('dc_remuneracion');

    	if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
    }
    function getSc($mes,$year){
    	$this->db->where('mes',$mes);
    	$this->db->where('year',$year);
    	$query=$this->db->get('sc_remuneracion');

    	if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
    }
    function getAfp($mes,$year){
    	$this->db->where('mes',$mes);
    	$this->db->where('year',$year);
    	$query=$this->db->get('afp_remuneracion');

    	if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
    }
    function getAfpL($afp,$mes,$year){
    	$this->db->where('afp1', $afp);
    	$this->db->where('mes',$mes);
    	$this->db->where('year',$year);
    	$query=$this->db->get('afp_remuneracion');

    	if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
    }
    function getAf($mes,$year){
    	$this->db->where('mes',$mes);
    	$this->db->where('year',$year);
    	$query=$this->db->get('af_remuneracion');

    	if($query->num_rows() > 0)
		{
			return $query;
		}else{
			
			return false;
		}
    }

}