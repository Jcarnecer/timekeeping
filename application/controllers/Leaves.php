<?php

Class Leaves extends MY_Controller{

    public function index() {
       
        parent::mainpage('leaves/index',
            [
                'title' => 'Leave Management',
              
            ]
        );
    }
    
}
