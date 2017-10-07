<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends MY_Controller 
{
		public function index($data) {
			$this->load->view('email/account_verify',$data);
    }
}