<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends MY_Controller 
{
    public function verifykey($key){
        $where = array('reg_key' => $key);
        $verify = $this->Crud_model->fetch_tag_row('reg_key,status,verify_email','users',$where);
        if(!$verify == NULL){
            
            if($verify->verify_email == '1'){
                echo "Sorry this link is already verified.";
            }else{
                $data = array('status' => 'Active','verify_email' => 1);
                $this->Crud_model->update('users',$data,$where);
                redirect('reset/password/'.$key);
            }
            
        }else{
            echo "NULL";
        }
    }
}