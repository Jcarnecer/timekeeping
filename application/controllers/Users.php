<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller 
{
	public function index() {
		parent::mainpage('users/index',
	    	[
				'title'	=> 'Company Name | Users Management',
				'users'	=> $this->Crud_model->fetch('users')
	      	]
	    );
	}
	
	public function add_user() {
		if($this->form_validation->run('add_users_validate') == FALSE) {
			$error = [
				'fname_error'    =>    form_error('fname'),
				'lname_error'    =>    form_error('lname'),
				'mname_error'	 =>    form_error('mname'),
				'email_error'	 =>    form_error('emailadd'),
				'pos_error'      =>    form_error('pos'),
				'sd_error'	=>	   form_error('start_date')
			];

			echo json_encode($error);
		}else{
			$generate_password 	= 	"timekeeping";
			$generate_key		=	'_'.random_string('alnum',10).'_'; // generates "_10alnumstring_"

			$insert = [
				'firstname'    		=>    clean_data(ucwords($this->input->post('fname'))),
				'lastname'    		=>    clean_data(ucwords($this->input->post('lname'))),
				'middlename'    	=>    clean_data(ucwords($this->input->post('mname'))),
				'position_id'   	=>    clean_data($this->input->post('pos')),
				'email'				=>    clean_data($this->input->post('emailadd')),
				'password'			=>   hash_password($generate_password),
				'reg_key'			=> $generate_key,
				'profile_picture'		=> 'no_image.jpg',
				'status'			=> 0, // account not activate
				'verified_email' 	=> 0, // for email confirmation
				'start_date'		=> clean_data($this->input->post('start_date'))
			];
			$get_rowid = $this->Crud_model->last_inserted_row('users',$insert);

			if(clean_data($this->input->post('pos')) == 2 || clean_data($this->input->post('pos')==3)){
				$insert_employee = [
					'user_id'	=>    $get_rowid->id
				];
				$this->Crud_model->insert('employee',$insert_employee);
			}elseif(clean_data($this->input->post('pos')==4)) {
				$insert_intern = [
					'no_of_hrs'	=>  clean_data($this->input->post('num_hrs')),
					'user_id'	=> 	  $get_rowid->id,
					'remaining'	=>  clean_data($this->input->post('num_hrs'))
				];
				$this->Crud_model->insert('intern',$insert_intern);
			}
			
			$config = array(
				'smtp_timeout' => '4',
				'charset' => 'utf-8',
				'mailtype'=> 'html',
			);

			$this->load->initialize($config);

			$from="paypal.emailverify@gmail.com";
			$to = $this->input->post('emailadd');
			$subject = "Account Activation";
			$data = [	'name'	=>	$insert['firstname'].' '.$insert['lastname'], 
						'reg_key' => $insert['reg_key'],
						'email'	=> $to,
						'password'	=> $generate_password,
						'verified_email'	=> $get_rowid->verified_email,
					];
			$message = $this->load->view('email/account_verify',$data,TRUE);
			// echo $message;
			$this->load->library('email');
			$this->email->clear();
			$this->email->from($from, 'Company Name');
			$this->email->to($to);
			$this->email->set_newline("\n");
			$this->email->subject($subject);
			$this->email->message($message);
			$this->email->set_mailtype('html');
			$this->email->send();
			
			$success = [
				'success' => 1,
				'name'	=> clean_data(ucwords($this->input->post('fname'))) .' '. clean_data(ucwords($this->input->post('lname'))),
			];
			
			echo json_encode($success);
		}
	}

	public function get_users() {
		$order_by = "lastname asc";
		if($this->user->info('position_id') == 1){
			$where = NULL;
		}else{
			$where = ['position_id >' => '1']; //not include admin
		}
		$users = $this->Crud_model->fetch('users',$where,'','',$order_by);
		$x = 1;
		if(!$users == NULL){
			foreach($users as $row): 
			$pos_id = $row->position_id;
			$where = ['id' => $pos_id];
			$position = $this->Crud_model->fetch_tag_row('*','position',$where);	
			?>
			<tr>
				<td><?= $x ?></td>
				<td><?= $row->firstname .' '. $row->lastname ?></td>
				<td><?= $row->email?></td>
				<td><?= $position->name ?></td>
				<td>
					<?php if($row->status == 1){ ?>
						Active
					<?php }else{ ?>
						Inactive
					<?php } ?>
				</td>
				<td>
					<div class="dropdown show">
						<button class="btn btn-secondary dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Action
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						<?php if($row->status == 1){ ?>
							<a class="dropdown-item deactivate-user" data-toggle="modal" data-name="<?= $row->firstname.' '.$row->lastname ?>" data-id="<?= secret_url('encrypt',$row->id) ?>" href="#u-d-modal" title="Deactivate" >Deactivate</a>
						<?php }else{ ?>
							<a class="dropdown-item activate-user" data-toggle="modal" data-name="<?= $row->firstname.' '.$row->lastname ?>" data-id="<?= secret_url('encrypt',$row->id) ?>" href="#u-a-modal" title="Activate" >Activate</a>
						<?php } ?>
							<a class="dropdown-item user_details" href="users/details/<?= secret_url('encrypt',$row->id) ?>" data-id="<?= secret_url('encrypt',$row->id) ?>" id="user_details">Details</a>
							<hr>
							<a class="dropdown-item reset-password" data-toggle="modal" data-email="<?= $row->email ?>" data-id="<?= secret_url('encrypt',$row->id) ?>" data-name="<?= $row->firstname.' '.$row->lastname ?>" href="#reset-user-pass">Reset Password</a>
						</div>
					</div>
				</td>
			</tr>
		<?php $x+=1; endforeach; }
	}

	public function activate() {
		$id = $this->input->post('id');
		$decrypt_id = secret_url('decrypt',$id);
		
		$where = ['id' => $decrypt_id];
		$update = [
			'status'    =>    1
		];
		$this->Crud_model->update('users',$update,$where);

		$success = [
			'success'	=> 1,
			'name'	=> $this->input->post('name')
		];
		echo json_encode($success);
	}

	public function deactivate() {
		$id = $this->input->post('id');
		$decrypt_id = secret_url('decrypt',$id);
		
		$where = ['id' => $decrypt_id];
		$update = [
			'status'    =>    0
		];
		
		$this->Crud_model->update('users',$update,$where);

		$success = [
			'success'	=> 1,
			'name'	=> $this->input->post('name')
		];
		echo json_encode($success);
	}


	public function details($id) {
		$decrypt_id = secret_url('decrypt',$id);
		$where = ['id' => $decrypt_id];
		$tag = 'id,firstname,lastname,middlename,status,email,position_id,profile_picture';

		$this->detail_id = $id;
		//get position
		$user = $this->Crud_model->fetch_tag_row($tag,'users',$where);
		$position_where = ['id' => $user->position_id];
		$position = $this->Crud_model->fetch_tag_row('*','position',$position_where);
		
		if($position->name == 'Intern') {
			$where = ['intern.user_id' => $decrypt_id];
			$tag = 'users.id,firstname,lastname,middlename,status,email,position_id,profile_picture,intern.id,intern.user_id,school,birthday,no_of_hrs,course,year,start_date,remaining';
			$user = $this->Crud_model->join_tag_row($tag,'users',$where,'intern','users.id = intern.user_id','inner'); //join
			
		}else{
			$where = ['employee.user_id' => $decrypt_id];
			$tag = 'users.id,firstname,lastname,middlename,status,email,position_id,profile_picture,
					employee.id,employee.user_id,sss_no,tin_no,phil_health,start_date';
			$user = $this->Crud_model->join_tag_row($tag,'users',$where,'employee','users.id = employee.user_id','inner'); //join
		}
		
		parent::mainpage('users/details',
			[
				'title'	=> $user->firstname .' '. $user->lastname,
				'pos'	=> $position,
				'id'	=> $id
			]
		);
	}

	public function get_details($id) {
		$decrypt_id = secret_url('decrypt',$id);
		$where = ['id' => $decrypt_id];
		$tag = 'id,firstname,lastname,middlename,status,email,position_id,profile_picture';

		$this->detail_id = $id;
		//get position
		$user = $this->Crud_model->fetch_tag_row($tag,'users',$where);
		$position_where = ['id' => $user->position_id];
		$position = $this->Crud_model->fetch_tag_row('*','position',$position_where);
		
		if($position->name == 'Intern') {
			$where = ['intern.user_id' => $decrypt_id];
			$tag = 'users.id,firstname,lastname,middlename,status,email,position_id,profile_picture,intern.id,intern.user_id,school,birthday,no_of_hrs,course,year,start_date,remaining';
			$user = $this->Crud_model->join_tag_row($tag,'users',$where,'intern','users.id = intern.user_id','inner'); //join
			
		}else{
			$where = ['employee.user_id' => $decrypt_id];
			$tag = 'users.id,firstname,lastname,middlename,status,email,position_id,profile_picture,
					employee.id,employee.user_id,sss_no,tin_no,phil_health,start_date';
			$user = $this->Crud_model->join_tag_row($tag,'users',$where,'employee','users.id = employee.user_id','inner'); //join
		}
		echo json_encode($user);
	}
	
	public function change_intern_picture() {
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
			$id = $this->input->post('id');
			$decrypt_id = secret_url('decrypt',$id);
			$where = array('id' => $decrypt_id);
			$this->Crud_model->update('users',$update,$where);
			echo json_encode("success");
		}
	}

	public function change_employee_picture() {
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
			$id = $this->input->post('id');
			$decrypt_id = secret_url('decrypt',$id);
			$where = array('id' => $decrypt_id);
			$this->Crud_model->update('users',$update,$where);
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
	
	public function update_intern_info() {
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
			$id = $this->input->post('id');
			$decrypt_id = secret_url('decrypt',$id);
			$where = array('id' => $decrypt_id);
			$this->Crud_model->update('users',$profile,$where);
			echo json_encode("success");
		}
	}

	public function update_intern_other_info() {
		if($this->form_validation->run('intern_other_info_validate') == FALSE) {
			$error = [
				'school_error'	=> form_error('school'),
				'no_of_hrs_error'	=> form_error('no_of_hrs'),
				'course_error'	=> form_error('course'),
				'bday_error'	=> form_error('bday'),
				'year_error'	=> form_error('year'),
				'start_date_error'	=> form_error('start_date'),
			];

			echo json_encode($error);
		}else{
			$other_info = [
				'school' => clean_data(ucwords($this->input->post('school'))),
				'no_of_hrs' => clean_data($this->input->post('no_of_hrs')),
				'course' => clean_data(ucwords($this->input->post('course'))),
				'birthday' => clean_data($this->input->post('bday')),
				'year' => clean_data($this->input->post('year')),
				'start_date' => clean_data($this->input->post('start_date')),
			];
			$id = $this->input->post('id');
			$decrypt_id = secret_url('decrypt',$id);
			$where = array('user_id' => $decrypt_id);
			$this->Crud_model->update('intern',$other_info,$where);
			echo json_encode("success");
		}
	}

	public function update_employee_info() {
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
			$id = $this->input->post('id');
			$decrypt_id = secret_url('decrypt',$id);
			$where = array('id' => $decrypt_id);
			$this->Crud_model->update('users',$profile,$where);
			echo json_encode("success");
		}
	}

	public function update_employee_other_info() {
		$other_info = [
			'sss_no' => clean_data($this->input->post('sss')),
			'tin_no' => clean_data($this->input->post('tin')),
			'phil_health' => clean_data($this->input->post('philhealth')),
			'start_date' => clean_data($this->input->post('date_start')),
		];
		$id = $this->input->post('id');
		$decrypt_id = secret_url('decrypt',$id);
		$where = array('user_id' => $decrypt_id);
		$this->Crud_model->update('employee',$other_info,$where);
		echo json_encode("success");
	}

}