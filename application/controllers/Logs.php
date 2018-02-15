<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends MY_Controller {

    public function index() {
        $logs = $this->Crud_model->fetch('timekeeping_logs','','','','date desc');
        parent::mainpage('logs/index',
            [
                'title' => 'Logs',
                'logs'  => $logs
            ]
        );
     }
}
