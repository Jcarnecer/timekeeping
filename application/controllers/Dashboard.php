<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function index() {
        // print_r($this->session->userdata('logged_in'));die;
        parent::mainpage('dashboard/index',
            [
                'title' => 'Dashboard',
            ]
        );
     }
}