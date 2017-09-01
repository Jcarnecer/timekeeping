<?php
class MY_Controller	extends CI_Controller
{
	function __construct() {

		parent::__construct();
		$this->load->helper('encryption');
		$this->load->model('Crud_model');
	}
	
	private function no_session() {
        if(!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }
	
    private function with_session() {
    	if($this->session->userdata('logged_in')) {
            redirect('dashboard');
        }
    }

	function mainpage($location,$data=array()) {
		$this->load->view('include/header',$data);
		$this->load->view('include/sidebar');
		$this->load->view('include/topbar');
		$this->load->view($location);
		$this->load->view('include/footer');
	}

}