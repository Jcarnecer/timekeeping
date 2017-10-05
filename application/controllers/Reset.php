<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset extends MY_Controller 
{

	public function password($key) {

        parent::loginpage('reset/index',
            [
            	'key'	=> $key,
                'title'=> 'Company Name | Reset Password',
            ]
        );
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
                'password'  => hash_password(clean_data($this->input->post('npass')))
            );
            $key = $this->input->post('key');
            $where = array('reg_key' => $key);
            $this->Crud_model->update('users',$newpass,$where);

            $this->session->sess_destroy();
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