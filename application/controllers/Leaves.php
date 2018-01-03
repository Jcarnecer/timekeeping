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
          
           $leave=[
               'leave_name'=>clean_data($this->input->post('leave_name')),
                'No_of_days'=>clean_data($this->input->post('days'))
           ];

           $this->Crud_model->insert('timekeeping_leave',$leave);
           echo json_encode('success');
       }
    }

    public function get_leave(){
        $leave=$this->Crud_model->fetch('timekeeping_leave');
        echo json_encode($leave);
    }   
    
}
