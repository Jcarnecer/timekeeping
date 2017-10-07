<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends MY_Controller 
{
    public function verifykey($key,$id){
        $decrypt_id = secret_url('decrypt',$id);
        $where = array('id' => $decrypt_id);
        $verify = $this->Crud_model->fetch_tag_row('reg_key,status,verified_email','users',$where);
        if(!$verify == NULL){

            if($verify->verified_email == '1'){
                show_404();   
            }else{
                $data = array('verified_email' => 1);
                $this->Crud_model->update('users',$data,$where);
                redirect('reset/password/'.$key.'/'.$id);
            }

        }else{
            show_404();
        }
    }
}