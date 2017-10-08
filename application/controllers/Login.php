<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller 
{
    public function index() {
        
        parent::loginpage('login/index',
            [
                'title'=>'Login',
            ]
        );
    }

    public function auth() {

        if($this->form_validation->run('login_validate') == FALSE) {
            echo json_encode(validation_errors());
        } else {
            $email = clean_data($this->input->post('email'));
            $password = clean_data($this->input->post('password'));
            $where = array('email'=>$email);
            $get_user = $this->Crud_model->fetch_tag_row('*','users',$where);

            if($get_user) {
                $check_password = $get_user->password;
                
                if(password_verify($password,$check_password)) {

                    if($get_user->status == 1) {
                        $user_session = [
                            'id'        => $get_user->id,
                            'email'     => $get_user->email,
                            'firstname' => $get_user->firstname,
                            'lastname'  => $get_user->lastname,
                            'position' => $get_user->position_id,
                            'profile_picture'   => $get_user->profile_picture,
                        ];
                        $sess = $this->session->set_userdata('user_logged_in',$user_session);
                        $position_id = $this->user->info('position_id');
                        $pos_where = ['id'  => $position_id];
                        $position = $this->Crud_model->fetch_tag_row('*','position',$pos_where);
                        parent::audittrail(
                            'Account Access',
                            'Account Login ',
                            $this->user->info('firstname') .' '. $this->user->info('lastname'),
                            $position->name,
                            $this->input->ip_address()
                        );
                        echo json_encode("success");
                    }elseif($get_user->status == 0){
                        echo json_encode("Your account is inactive. Contact our human resource department regarding this problem.");
                    }
                    
                }else {
                    
                    echo json_encode("Invalid Credentials");
                }
                
            }else{
                echo json_encode("Invalid Credentials");
            }
        }
    }

    public function logout() {
        $position_id = $this->user->info('position_id');
        $pos_where = ['id'  => $position_id];
        $position = $this->Crud_model->fetch_tag_row('*','position',$pos_where);
        parent::audittrail(
            'Account Access',
            'Account Logout ',
            $this->user->info('firstname') .' '. $this->user->info('lastname'),
            $position->name,
            $this->input->ip_address()
        );
        $this->session->sess_destroy();
        redirect('');
    }

}