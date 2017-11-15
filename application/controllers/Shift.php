<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shift extends MY_Controller {

	public function index() {
       $get_all_shift = $this->Crud_model->fetch('shift');
        parent::mainpage('shift/index',
            [
                'title' => 'Shift List',
                'all_shift' => $get_all_shift
            ]
        );
    }

    public function get_shift() {
		$shift = $this->Crud_model->fetch('timekeeping_shift');
        $x = 1;

        if(!$shift == NULL){
			foreach($shift as $row):
			?>
			<tr>
				<td><?= $x ?></td>
				<td><?= $row->shift_type ?></td>
				<td><?= $row->start_time?></td>
				<td><?= $row->end_time ?></td>
				<td>
					<div class="dropdown show">
						<button class="btn custom-button dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Action
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">	
							<a class="dropdown-item edit_shift" data-toggle="modal" data-shift="<?= $row->shift_type ?>" data-start="<?= $row->start_time ?>" data-end="<?= $row->end_time ?>" data-id="<?= secret_url('encrypt',$row->id) ?>" href="#e-sh-modal" >Edit</a>
							<!-- <a class="dropdown-item" href="" title="View">Details</a> -->
						</div>
					</div>
				</td>
			</tr>
		<?php $x+=1; endforeach; }
    }

    public function edit_shift() {
        $this->form_validation->set_rules('start','Start time','required|regex_match[/^([0-9-:]|\s)+$/]');
        $this->form_validation->set_rules('end','End time','required|regex_match[/^([0-9-:]|\s)+$/]');
        if($this->form_validation->run() == FALSE) {
            $error = [
                'start_error'   =>    form_error('start'),
                'end_error'     =>    form_error('end'),
            ];
            echo json_encode($error);
        }else{
            $decrypt_id = secret_url('decrypt',$this->input->post('id'));
            $where = ['id' => $decrypt_id];
            $update = [
                'start_time'    =>    clean_data($this->input->post('start')),
                'end_time'    =>    clean_data($this->input->post('end'))
            ];
            $this->Crud_model->update('shift',$update,$where);
            $success = [
                'success'   =>    1,
                'shift'    => clean_data($this->input->post('shift'))    
            ];

            //position
			$position_id = $this->user->info('pos_id');
			$pos_where = ['id'  => $position_id];
			$position = $this->Crud_model->fetch_tag_row('*','position',$pos_where);
			parent::audittrail(
				'Shift Modify',
				'Edit '.$success['shift'].' Shift',
				$this->user->info('firstname') .' '. $this->user->info('lastname'),
				$position->name,
				$this->input->ip_address()
			);
            echo json_encode($success);
        }
    }
}