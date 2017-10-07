<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset extends MY_Controller 
{

	public function password($key,$id) {
        $decrypt_id = secret_url('decrypt',$id);
        $where = array('id' => $decrypt_id);
        $verify = $this->Crud_model->fetch_tag_row('reg_key,status,verified_email','users',$where);
        if(!$verify == NULL){
            if($verify->status == 1){
                show_404();
            }else{
                parent::resetpage('reset/index',
                [
                    'key'	=> $key,
                    'title'=> 'Company Name | Reset Password',
                ]
            );
            }
            
        }else{
            show_404();
        }

        
    }

    public function authreset() {
        $this->form_validation->set_rules('tpass','Temporary password','required|callback_old_pass_validate');
        $this->form_validation->set_rules('npass','New password','required|matches[cpass]');
        $this->form_validation->set_rules('cpass','Confirm password','required');
        if($this->form_validation->run() == FALSE) {
            $error = [
            	'old_err'	=> form_error('tpass'),
            	'new_err'	=> form_error('npass'),
            	'con_err'	=> form_error('cpass')
            ];
            echo json_encode($error);
        }else{
            $newpass = array(
                'password'  => hash_password(clean_data($this->input->post('npass'))),
                'status'    => 1
            );
            $key = $this->input->post('key');
            $where = array('reg_key' => $key);
            $this->Crud_model->update('users',$newpass,$where);
            echo json_encode("success");
        }
    }

    public function old_pass_validate($oldpass) {
        $key = $this->input->post('key');
        $where = array('reg_key' => $key);
        $check_old_password = $this->Crud_model->fetch_tag_row('password','users',$where);
        if($oldpass == '') {
            $this->form_validation->set_message('old_pass_validate','%s field is required');
            return false;
        }elseif(password_verify($oldpass,$check_old_password->password)){
            return true;
        }else{
            $this->form_validation->set_message('old_pass_validate','%s does not match to our record');
            return false;
        }
    }

}