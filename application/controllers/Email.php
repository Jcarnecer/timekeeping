<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends MY_Controller 
{
    public function verifykey($key,$id){
        $decrypt_id = secret_url('decrypt',$id);
        $where = array('user_id' => $decrypt_id);
        $verify = $this->Crud_model->fetch_tag_row('reg_key,status,verified_email','user_details',$where);
        if(!$verify == NULL){

            if($verify->verified_email == '1'){
                show_404();   
            }else{
                $data = array('verified_email' => 1);
                $this->Crud_model->update('user_details',$data,$where);
                redirect('reset/password/auth/'.$key.'/'.$id);
            }
            
        }else{
            show_404();
        }
    }

    public function resetkey($key,$id){
        $decrypt_id = secret_url('decrypt',$id);
        $where = array('user_id' => $decrypt_id);
        $verify = $this->Crud_model->fetch_tag_row('reg_key,status,verified_email','user_details',$where);
        if(!$verify == NULL){

            if($verify->reset_status == 1){
                show_404();   
            }else{
                $data = array('reset_status' => 0);
                $this->Crud_model->update('user_details',$data,$where);
                redirect('reset/password/forgot/'.$key.'/'.$id);
            }
            
        }else{
            show_404();
        }
    }
}
