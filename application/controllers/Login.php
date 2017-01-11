<?
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model('login_model');
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('url','form'));
		$this->load->helper('date');
		$this->load->database();
    }
	
	public function index()
	{	
		switch ($this->session->userdata('nivel_acceso')) {
			case '':
				$data['token'] = $this->token();
				$this->load->view('remuneracion/login',$data);
				break;
			case 'Administrador':
				redirect(base_url().'control/principal');
				break;
			default:		
				$this->load->view('remuneracion/login');
				break;		
		}
	}
 
public function new_user()
	{
		if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token'))
		{
            $this->form_validation->set_rules('username', 'nombre de usuario', 'required|trim|min_length[2]|max_length[150]');
            $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[6]|max_length[150]');
 
            //lanzamos mensajes de error si es que los hay
            $this->form_validation->set_message('required', 'El %s es requerido');
            $this->form_validation->set_message('min_length', 'El %s debe tener al menos %s carácteres');
            $this->form_validation->set_message('max_length', 'El %s debe tener al menos %s carácteres');

			if($this->form_validation->run() == FALSE)
			{
				$this->index();
			}else{
				$username = $this->input->post('username');
				$password = md5($this->input->post('password'));
				$check_user = $this->login_model->login_user($username,$password);
				if($check_user == TRUE)
				{
                    $mes=date('m');
                    $ano=date("Y");
                    switch ($mes) {
                        case '01':
                            $mes_actual="Enero";
                            break;
                        case '02':
                            $mes_actual="Febrero";
                            break;
                        case '03':
                            $mes_actual="Marzo";
                            break;
                        case '04':
                            $mes_actual="Abril";
                            break;
                        case '05':
                            $mes_actual="Mayo";
                            break;
                        case '06':
                            $mes_actual="Junio";
                            break;
                        case '07':
                            $mes_actual="Julio";
                            break;
                        case '08':
                            $mes_actual="Agosto";
                            break;
                        case '09':
                            $mes_actual="Septiembre";
                            break;
                        case '10':
                            $mes_actual="Octubre";
                            break;
                        case '11':
                            $mes_actual="Noviembre";
                            break;
                        case '12':
                            $mes_actual="Diciembre";
                            break;
                    }
					$data = array(
	                'is_logued_in' 	=> 		TRUE,
	                'rut_usuario' 	=> 		$check_user->rut_usuario,
	                'nivel_acceso'	=>		$check_user->nivel_acceso,
	                'usuario' 		=> 		$check_user->usuario,
	                'year'			=>		$ano,
	                'mes'			=>		$mes_actual
            		);		
					$this->session->set_userdata($data);
					$this->index();
				}
			}
		}else{
			redirect(base_url().'login');
		}
	}
	
	public function token()
	{
		$token = md5(uniqid(rand(),true));
		$this->session->set_userdata('token',$token);
		return $token;
	}
	
	public function logout_ci()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
	
	

}