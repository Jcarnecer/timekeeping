<?php
class MY_Controller	extends CI_Controller
{
	function __construct() {

		parent::__construct();

    }

	function mainpage($location,$data=array()) {
		$this->load->view('include/header',$data);
		$this->load->view('include/sidebar');
		$this->load->view($location);
		$this->load->view('include/footer');
	}
}