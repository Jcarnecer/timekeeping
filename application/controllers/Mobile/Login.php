<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller 
{
   

    public function auth() {
            if($this->input->server('REQUEST_METHOD')=='POST'){
                $json = json_decode(file_get_contents('php://input'),true);
                
                $get_user = $this->Crud_model->fetch('users',['email'=>$json]);
                    if(!$get_user){
                        $result=[
                            'Message'=>'Invalid Credentials'
                        ];

                    }
                    else if($get_user){
                        $result=[
                            'Message'=>'Welcome',
                        ];
                    }

                echo json_encode($json) ;
        }

        
        
    }

}