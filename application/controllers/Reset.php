<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset extends MY_Controller 
{

	public function password($check,$key,$id) {
        $decrypt_id = secret_url('decrypt',$id);
        $where = array('user_id' => $decrypt_id);
        $verify = $this->Crud_model->fetch_tag_row('reg_key,status,verified_email,reset_status','user_details',$where);
        
        if(!$verify == NULL){
            if($check == 'auth'){
                if($verify->status == 1 ){
                    show_404();
                }else{
                    parent::resetpage('reset/index',
                        [
                            'check' => $check,
                            'key'	=> $key,
                            'id'    => $id,
                            'title'=> 'Company Name | Reset Password',
                        ]
                    );
                }
            }else{
                if($verify->reset_status == 1 ){
                    show_404();
                }else{
                    parent::resetpage('reset/index',
                        [
                            'check' => $check,
                            'key'	=> $key,
                            'id'    => $id,
                            'title'=> 'Company Name | Reset Password',
                        ]
                    );
                }
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
            $check = $this->input->post('check');
            if($check == 'forgot' ){
                $newpass = array(
                    'password'  => hash_password(clean_data($this->input->post('npass'))),
                    
				);
				$status = [
					'reset_status'  => 1
				];
            }else{
                $newpass = array(
                    'password'  => hash_password(clean_data($this->input->post('npass'))),
                    
				);
				$status = [
					'status'    => 1
				];
            }
            
            $id = $this->input->post('id');
            $decrypt_id = secret_url('decrypt',$id);
            $where = array('id' => $decrypt_id);
			$this->Crud_model->update('users',$newpass,$where);
			
			$ud_where = ['user_id'	=> $decrypt_id];
			$this->Crud_model->update('user_details',$status,$ud_where);

            echo json_encode("success");
        }
    }

    public function old_pass_validate($oldpass) {
        $id = $this->input->post('id');
        $decrypt_id = secret_url('decrypt',$id);
        $where = array('id' => $decrypt_id);
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

    public function reset_user_password() {
        $id = $this->input->post('id');
        $decrypt_id = secret_url('decrypt',$id);
        $where = ['id'   => $decrypt_id];
        $tag = "firstname,middlename,lastname,email,password";
        $user = $this->Crud_model->fetch_tag_row($tag,'users',$where);
		
		$tag_user_details = "status,reset_status,reset_key";
		$ud_where =['user_id'	=> $decrypt_id];
		$user_details = $this->Crud_model->fetch_tag_row($tag_user_details,'user_details',$where);

        $generate_reset_key		=	'_'.random_string('alnum',15).'_'; // generates "_10alnumstring_"
        $generate_password = random_string('alnum',8);
        
        $update_user = [
            'password'  => hash_password($generate_password),
        ];
		$this->Crud_model->update('users',$update_user,$where);
		
		$update_user_detail = [
			'reset_status'  => 0,
            'reset_key' => $generate_reset_key
		];
		$this->Crud_model->update('user_details',$update_user_detail,$ud_where);

        $config = array(
            'smtp_timeout' => '4',
            'charset' => 'utf-8',
            'mailtype'=> 'html',
        );

        $this->load->initialize($config);

        $from="jun.carnecer@astridtechnologies.com";
        $to = $this->input->post('email');
        $subject = "Reset Password";
        $data = [	
                    'id'	=> $id,
                    'name'	=>	$user->firstname.' '.$user->lastname,
                    'email'	=> $to,
                    'password'	=> $generate_password,
                    'reset_key' => $update_user_detail['reset_key'],
                    'reset_status'	=> $update_user_detail['reset_status'],
                    'indicator'   => 'resetpassword' 
                ];
        
        $message = $this->load->view('email/reset_password',$data,TRUE);
        // echo $message;
        $this->load->library('email');
        $this->email->clear();
        $this->email->from($from, 'Timekeeping');
        $this->email->to($to);
        $this->email->set_newline("\n");
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->set_mailtype('html');
        $this->email->send();
        
        $success = [
            'success' => 1,
            'email' => $to,
            'name'	=> clean_data(ucwords($this->input->post('fname'))) .' '. clean_data(ucwords($this->input->post('lname'))),
        ];

		echo json_encode($success);
		// print_r($message);die;
		// $this->load->view('email/reset_password',$data);

    }

}
