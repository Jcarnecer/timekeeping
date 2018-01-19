<?php
class MY_Controller	extends CI_Controller
{
	function __construct() {

		parent::__construct();
		$this->load->helper('encryption');
		$this->load->model('Crud_model');
		$this->load->library('authenticate');
		$this->load->library('user');
		// $this->userinfo();
		// if(!$this->session->userdata('user_logged_in')){
		// 	redirect('login');
		// }else{
		// 	base_url();
		// }
		
	}

	
	private function no_session() {
        if(!$this->session->userdata('user')) {
            redirect('login');
        }
    }
	
    private function with_session() {
    	if($this->session->userdata('user')) {
            redirect('dashboard');
        }
	}

	function mainpage($location,$data=array()) {
		$this->no_session();
		$this->load->view('include/header',$data);
		$this->load->view('include/sidebar');
		$this->load->view('include/topbar');
		$this->load->view($location);
		$this->load->view('include/footer');
	}

	function loginpage($location,$data=array()) {
		$this->with_session();
		$this->load->view('login/include/header',$data);
		$this->load->view($location);
		$this->load->view('login/include/footer');
	}

	function resetpage($location,$data=array()) {
		$this->load->view('login/include/header',$data);
		$this->load->view($location);
		$this->load->view('login/include/footer');
	}

	function audittrail($action, $description, $user, $position = null,$ip){
        $dat = array(
            'action'		=> $action,
            'description'	=> $description,
            'user'			=> $user,
            'position' 		=> $position,
			'ip_address' 	=> $ip,
			'date'			=> (date('Y-m-d H:i:s'))
        );
        $this->Crud_model->insert('timekeeping_logs',$dat);
    }

}
