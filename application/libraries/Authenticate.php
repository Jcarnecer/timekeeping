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
	public function login_user($sessname,$user) {
		$this->CI->session->set_userdata($sessname, $user);
	}

	public function logout_user($sessname) {
		$this->CI->session->unset_userdata($sessname);
	}

	public function current_user($sessname) {
		return $this->CI->session->userdata($sessname);
	}
}