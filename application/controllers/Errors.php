<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends MY_Controller {

    public function error_404($current="") {
        $data['title']  ='404 Page Not Found';
        $this->load->view('errors/custom/404',$data);
     }
}