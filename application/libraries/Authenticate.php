<?php
if (!defined('BASEPATH')) exit('No direct access allowed');


class Authenticate {

	private $CI;

	public function __construct() {
		$this->CI =& get_instance();
	}
	/*
	 *	Save user to session
	 */
	public function login_user($sess_name,$user) {
		$this->CI->session->set_userdata($sess_name, $user);
	}

	public function logout_user() {
		$this->CI->session->sess_destroy();
	}

	public function current_user($sess_name) {
		return $this->CI->session->userdata($sess_name);
	}
}