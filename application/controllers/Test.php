<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller 
{
	public function index() {
		$this->load->view('email/account_verify');
    }
}