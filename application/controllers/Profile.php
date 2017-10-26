<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {

    public function index() {
        
        parent::mainpage('profile/index',
            [
                'title' => $this->user->info('firstname').' '.$this->user->info('lastname'),
            ]
        );
    }

    public function changeinfo() {
		if($this->form_validation->run('edit_info_validate') == FALSE) {
			$error = [
				'e_error'	=> form_error('email'),
				'f_error'	=> form_error('fname'),
				'l_error'	=> form_error('lname')
			];

			echo json_encode($error);
		}else{
			$profile = [
				'firstname' => clean_data(ucwords($this->input->post('fname'))),
				'lastname' => clean_data(ucwords($this->input->post('lname'))),
				'email' => clean_data($this->input->post('email')),
			];
			$where = array('id' => $this->user->info('id'));
			$this->Crud_model->update('users',$profile,$where);
            //position
			$position_id = $this->user->info('position_id');
			$pos_where = ['id'  => $position_id];
			$position = $this->Crud_model->fetch_tag_row('*','position',$pos_where);
			parent::audittrail(
				'Account Modify',
				'Update information',
				$this->user->info('firstname') .' '. $this->user->info('lastname'),
				$position->name,
				$this->input->ip_address()
			);
			echo json_encode("success");
		}
    }
    
    public function get_user() {
        $user = $this->user->info('id');
        
		$position_where = ['id' =>  $this->user->info('position_id')];
		$position = $this->Crud_model->fetch_tag_row('*','position',$position_where);
        
        // $intern_where = ['user_id' => $user];
        // $intern_info = $this->Crud_model->fetch_tag_row('*','intern',$intern_where);
		$employee_where = ['user_id'	=> $user];
		$user_details = $this->Crud_model->fetch_tag_row('*','user_details',$employee_where);

        if($position->name == 'Intern') {
            $info = [
				'position'	=> $position->name,
                'no_of_hrs' => $user_details->no_of_hrs, 
				'school'	=> $user_details->school,
				'course'	=> $user_details->course,
				'year'		=> $user_details->year,
				'remaining'	=> $user_details->remaining,
                'firstname' => $this->user->info('firstname'),
                'lastname'  => $this->user->info('lastname'),
                'email' => $this->user->info('email'),
				'profile_picture'   => $this->user->info('profile_picture'),
            ];
        }else{
            $info = [
				'position'	=> $position->name,
				'sss_no'	=> $user_details->sss_no,
				'tin_no'	=> $user_details->tin_no,
				'ph_health'	=> $user_details->phil_health,
                'firstname' => $this->user->info('firstname'),
                'lastname'  => $this->user->info('lastname'),
                'email' => $this->user->info('email'),
                'profile_picture'   => $this->user->info('profile_picture'),
            ];
        }
        
        echo json_encode($info);
    }

    public function changepassword() {
		$this->form_validation->set_rules('opassword','Old password','required|callback_old_pass_validate');
        $this->form_validation->set_rules('npassword','New password','required|matches[cpassword]');
        $this->form_validation->set_rules('cpassword','Confirm password','required');
        if($this->form_validation->run() == FALSE) {

            $error = [
            	'o_err'	=> form_error('opassword'),
            	'n_err'	=> form_error('npassword'),
            	'c_err'	=> form_error('cpassword'),
            ];

            echo json_encode($error);
        }else{
            $newpass = array(
                'password'  => hash_password(clean_data($this->input->post('npassword')))
            );
            $where = array('id' => $this->user->info('id'));
            $this->Crud_model->update('users',$newpass,$where);
            //position
			$position_id = $this->user->info('position_id');
			$pos_where = ['id'  => $position_id];
			$position = $this->Crud_model->fetch_tag_row('*','position',$pos_where);
			parent::audittrail(
				'Account Modify',
				'Change Password',
				$this->user->info('firstname') .' '. $this->user->info('lastname'),
				$position->name,
				$this->input->ip_address()
			);
            echo json_encode("success");
        }
	}

	public function old_pass_validate($oldpass) {
        $where = array('id' => $this->user->info('id'));
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

    public function changepicture() {
		$config = array(
            'upload_path'   => 'assets/uploads',
            'allowed_types' => 'jpg|gif|png|jpeg',
            'max_size'		=> '2040',
            'encrypt_name' 	=> TRUE //encrypt filename
        );

        $this->load->library('upload', $config);

		$this->form_validation->set_rules('profile_pic','Profile picture','callback_handleimage');

		if($this->form_validation->run() == FALSE) {
			echo json_encode(validation_errors());
		}else{
			$update = [
				'profile_picture' => $this->upload->data('file_name'),
			];
			$where = array('user_id' => $this->user->info('id'));
            $this->Crud_model->update('user_details',$update,$where);
            //position
			$position_id = $this->user->info('position_id');
			$pos_where = ['id'  => $position_id];
			$position = $this->Crud_model->fetch_tag_row('*','position',$pos_where);
			parent::audittrail(
				'Account Modify',
				'Update Profile Picture',
				$this->user->info('firstname') .' '. $this->user->info('lastname'),
				$position->name,
				$this->input->ip_address()
			);
			echo json_encode("success");
		}
	}

	function handleimage(){
        if (isset($_FILES['profile_pic']) && !empty($_FILES['profile_pic']['name'])):
            if ($this->upload->do_upload('profile_pic')):
                return true;
            else:
            	$this->form_validation->set_message('handleimage', $this->upload->display_errors());
                return false;
            endif;
        else:
          // throw an error because nothing was uploaded
          $this->form_validation->set_message('handleimage', "You must upload an image!");
          return false;
        endif;
    }
}
