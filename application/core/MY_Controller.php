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
	}

	private function users() {
		$where = ['id' => $this->session->id];
		$this->userinfo = $this->Crud_model->fetch_tag_row('firstname','users',$where);
	}

	private function userinfo() {
		// $sess = $this->authenticate->current_user('logged_in');
		// $this->fullname = $sess['firstname']. ' ' . $sess['lastname'];
		// $this->position = $sess['position'];
		// $this->email
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

}