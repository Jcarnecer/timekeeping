<?php

Class Leaves extends MY_Controller{

    public function index() {
       
        parent::mainpage('leaves/index',
            [
                'title' => 'Leave Management',
                'leave'=>$this->Crud_model->fetch('timekeeping_leave'),
            ]
        );
    }

    public function insert_leave(){
       if( $this->form_validation->run('add_leave')==FALSE){
            echo json_encode(validation_errors());
       }
       else{
        $leave_column=clean_data(str_replace(' ','_',$this->input->post('leave_name')));

        $insert_column = [
            clean_data(strtolower($leave_column)) 
            => 
            [
                'type'  => 'float(8,1)',
                'null'  => TRUE
            ],
        ];
        
        $this->dbforge->add_column('users',$insert_column);


           $insert_leave=[
               'leave_name'=>clean_data($this->input->post('leave_name')),
               'No_of_days'=>clean_data($this->input->post('days'))
           ];

           $this->Crud_model->insert('timekeeping_leave',$insert_leave);
           echo json_encode('success');
       }
    }

    public function get_leave(){
        $leave=$this->Crud_model->fetch('timekeeping_leave');
        echo json_encode($leave);
    }
    
    public function update_leave(){
        $id=$this->uri->segment(3);
            if( $this->form_validation->run('edit_leave')==FALSE){
                echo json_encode(validation_errors());
            }
            else{ 
                $leave=[
                    'leave_name'=>clean_data($this->input->post('leave_name')),
                    'No_of_days'=>clean_data($this->input->post('days'))
                ];
                $get_old_leave= $this->Crud_model->fetch_tag_row('*','timekeeping_leave',['id'=>$id]); 
                $old_leave=str_replace(" ","_",$get_old_leave->leave_name);
                $leave_column=clean_data(str_replace(' ','_',$this->input->post('leave_name')));

                $modify = [
                    $old_leave => [
                        'name'	=> strtolower($leave_column),
                        // 'type'	=> 'varchar(100)'
                        'type'	=> 'float(8,1)' 
                    ],
                ];
                $this->dbforge->modify_column('users',$modify);
                $this->Crud_model->update('timekeeping_leave',$leave,['id'=>$id]);
                echo json_encode('success');
            }
    }

    public function approved_reset(){
     
            $id = $this->input->post('id');
            $where = ['id' => $id];
            $employee_leave = $this->Crud_model->fetch_tag_row('*','timekeeping_leave',$where);
            $leave_name = strtolower(str_replace(' ','_',$employee_leave->leave_name));
            $No_of_days = $employee_leave->No_of_days;
            $update_user = [
                $leave_name => $No_of_days
            ];
            $this->Crud_model->update('users',$update_user);
    }


  
    
}
