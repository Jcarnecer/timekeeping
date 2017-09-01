<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Position extends MY_Controller {

    public function index() {
        
        parent::mainpage('position/index',
            [
                'title' => 'Position',
                'menu'  => $this->Crud_model->fetch('menu')
            ]
        );
    }

    public function add_position() {
        if($this->form_validation->run('add_position_validate') == FALSE){
            echo json_encode(validation_errors());
        }else{
            $position = clean_data(ucwords($this->input->post('position')));
            $privileges = implode(',',$this->input->post('privileges'));
            $privileges_array = explode(',',$privileges);
            array_unshift($privileges_array , '1');
            $unique_privileges = array_unique($privileges_array);
            $privileges = implode(',',$unique_privileges);

            $insert_position = [
                'name'     =>    $position,
                'privileges'   =>    $privileges
            ];
            $this->Crud_model->insert('position',$insert_position);
            $success = [
                'success' => 1,
                'name'  => $position
            ];
            echo json_encode($success);
        }
    }

    public function edit_position(){
        $this->form_validation->set_rules('position','Position','required|regex_match[/^([a-zA-Z0-9@.,_]|\s)+$/]');
        $this->form_validation->set_rules('privileges[]','Default Privileges','required');
        $decrypt_id = secret_url('decrypt',$this->input->post('id'));
        if($this->form_validation->run() == FALSE){
          echo json_encode(validation_errors());
        }else{
    
            $position = clean_data($this->input->post('position'));
            $privileges = implode(',',$this->input->post('privileges'));
            $privileges_array = explode(',',$privileges);
            array_unshift($privileges_array , '1');
            $unique_privileges = array_unique($privileges_array);
            $privileges = implode(',',$unique_privileges);
            $decrypt_id = secret_url('decrypt',$this->input->post('id'));
            $filter = array('id'=>$decrypt_id);
    
            $insert_position = [
                'name'    => $position,
                'privileges'  => $privileges
            ];
            $this->Crud_model->update('position',$insert_position,$filter);
            $success = [
                'id'  => secret_url('encrypt',$this->input->post('id')),
                'success' => 1,
                'name'  => clean_data(ucwords($this->input->post('position')))
            ];
          
            echo json_encode($success);
        }
    }

    public function get_position() {
        $order_by = "name asc";
        $position = $this->Crud_model->fetch('position','','','',$order_by);
        $x = 1;
        if(!$position == NULL){
            foreach($position as $row){
                $privileges_array = explode(',',$row->privileges);
                $privileges2_array = array();
                $y = 0;
                while($y < count($privileges_array)){
                  $filter = array('id'=> $privileges_array[$y]);
                  $menu = $this->Crud_model->fetch_tag_row('name','menu',$filter);
                  array_push($privileges2_array,$menu->name);
                  $y++;
                }
                $privileges = implode(",",$privileges2_array);
             ?>
            <tr>
                <td><?= $x ?></td>
                <td><?= $row->name ?></td>
                <td><?= $privileges ?></td>
                <td>
                <div class="dropdown show">
						<button class="btn btn-secondary dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Action
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a  class="dropdown-item edit-pos-modal" data-privileges="<?= $row->privileges?>" data-position="<?= $row->name ?>"
                            data-id="<?= secret_url('encrypt',$row->id)?>" data-toggle="modal" href="#e-p-modal">Edit</a>

						</div>
					</div>
                </td>
            </tr>
            
            <?php
            $x += 1;
            }              
        }
    }
}