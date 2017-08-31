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
				'pos_error'      =>    form_error('pos')
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
				'status'			=> 0, // not activated 
				'verified_email' 	=> 0, // for email confirmation 
			];
			$this->Crud_model->insert('users',$insert);
			$success = [
				'success' => 1,
				'name'	=> clean_data(ucwords($this->input->post('fname'))) .' '. clean_data(ucwords($this->input->post('lname'))),
			];
			echo json_encode($success);
		}
	}

	public function get_users() {
		$order_by = "lastname asc";
		$users = $this->Crud_model->fetch('users');
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
						<a class="btn btn-secondary dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Action
						</a>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						<?php if($row->status == 1){ ?>
							<a class="dropdown-item deactivate-user" data-toggle="modal" data-name="<?= $row->firstname.' '.$row->lastname ?>" data-id="<?= secret_url('encrypt',$row->id) ?>" href="#u-d-modal" title="Deactivate" >Deactivate</a>
						<?php }else{ ?>
							<a class="dropdown-item activate-user" data-toggle="modal" data-name="<?= $row->firstname.' '.$row->lastname ?>" data-id="<?= secret_url('encrypt',$row->id) ?>" href="#u-a-modal" title="Activate" >Activate</a>
						<?php } ?>
							<a class="dropdown-item" href="" title="View">Details</a>
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
    
}