<?php
if (!defined('BASEPATH')) exit('No direct access allowed');

class User {

	protected $CI;

    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model('Crud_model');
    }

    public function info($col) {
        $sess = $this->CI->session->userdata('user');
        $where = [ 'users.id' => $sess['id'] ];
		$userinfo = $this->CI->Crud_model
			->join_tag_row('users.*,user_details.*,users.id AS u_id, user_details.id ud_id',
						'users',$where,'user_details',
						'users.id = user_details.user_id','inner');
        if(!$userinfo == NULL) {
            return $userinfo->$col;
        }
       
    }
}
