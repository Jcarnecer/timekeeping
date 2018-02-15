
<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class MY_Exceptions extends CI_Exceptions {

    public function __construct() {
        parent::__construct();
    }


    public function show_404($page = '', $log_error = TRUE) {
        $CI =& get_instance();
        $CI->load->view('errors/custom/404');
        echo $CI->output->get_output();
        exit;
    }

}