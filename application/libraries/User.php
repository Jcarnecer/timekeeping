<?php
if (!defined('BASEPATH')) exit('No direct access allowed');

class User {

	private $CI;

    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->library('authenticate');
        $this->CI->load->model('Crud_model');
    }

    public function info($col) {
        $sess = $this->CI->authenticate->current_user('logged_in');
        $where = [ 'id' => $sess['id'] ];
        $userinfo = $this->CI->Crud_model->fetch_tag_row('*','users',$where);
        return $userinfo->$col;
    }
    
}