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

    public function leave_request(){
        $this->form_validation->set_rules('leave_id','Leave','required');
        $this->form_validation->set_rules('start','Start Date','required');
        $this->form_validation->set_rules('end','End Date','required');
        $this->form_validation->set_rules('reason','Reason','required');
        
        $where=['id'=>$this->input->post('user_id')];
        $user=$this->Crud_model->fetch_tag_row('*','users',$where);

        $leave_where=['id'=>$this->input->post('leave_id')];
        $leave=$this->Crud_model->fetch_tag_row('*','timekeeping_leave',$leave_where);
        
        $leave_name=strtolower(str_replace(' ','_',$leave->leave_name));

        $user_leave=$user->$leave_name;
        $duration= $this->getWorkingDays($this->input->post('start'),$this->input->post('end')); 
        if($this->form_validation->run()==FALSE){
            echo json_encode(validation_errors());
        }
        else{
            if($duration>$user_leave){
                echo json_encode('Insuffient Leave for '. $leave->leave_name);       
            }    
            else{
            $insert_request=[
                'user_id'   =>  $this->input->post('user_id'),
                'leave_id'  =>  $this->input->post('leave_id'),
                'start_date'=>  $this->input->post('start'),
                'end_date'  =>  $this->input->post('end'),
                'reason'    =>  $this->input->post('reason'),
                'status'    =>  'Pending',
                'duration'  =>  $duration 
            ]; 
            
            $this->Crud_model->insert('timekeeping_file_leave',$insert_request);
            echo json_encode('success');
            }
        }
    }



    public function getWorkingDays($startDate,$endDate){
        // do strtotime calculations just once
                $endDate = strtotime($endDate);
                $startDate = strtotime($startDate);
            
            
                //The total number of days between the two dates. We compute the no. of seconds and divide it to 60*60*24
                //We add one to inlude both dates in the interval.
                $days = ($endDate - $startDate) / 86400 + 1;
            
                $no_full_weeks = floor($days / 7);
                $no_remaining_days = fmod($days, 7);
            
                //It will return 1 if it's Monday,.. ,7 for Sunday
                $the_first_day_of_week = date("N", $startDate);
                $the_last_day_of_week = date("N", $endDate);
            
                //---->The two can be equal in leap years when february has 29 days, the equal sign is added here
                //In the first case the whole interval is within a week, in the second case the interval falls in two weeks.
                if ($the_first_day_of_week <= $the_last_day_of_week) {
                    if ($the_first_day_of_week <= 6 && 6 <= $the_last_day_of_week) $no_remaining_days--;
                    if ($the_first_day_of_week <= 7 && 7 <= $the_last_day_of_week) $no_remaining_days--;
                }
                else {
                    // (edit by Tokes to fix an edge case where the start day was a Sunday
                    // and the end day was NOT a Saturday)
            
                    // the day of the week for start is later than the day of the week for end
                    if ($the_first_day_of_week == 7) {
                        // if the start date is a Sunday, then we definitely subtract 1 day
                        $no_remaining_days--;
            
                        if ($the_last_day_of_week == 6) {
                            // if the end date is a Saturday, then we subtract another day
                            $no_remaining_days--;
                        }
                    }
                    else {
                        // the start date was a Saturday (or earlier), and the end date was (Mon..Fri)
                        // so we skip an entire weekend and subtract 2 days
                        $no_remaining_days -= 2;
                    }
                }
            
                //The no. of business days is: (number of weeks between the two dates) * (5 working days) + the remainder
            //---->february in none leap years gave a remainder of 0 but still calculated weekends between first and last day, this is one way to fix it
            $workingDays = $no_full_weeks * 5;
                if ($no_remaining_days > 0 )
                {
                $workingDays += $no_remaining_days;
                }    
            
            
                return $workingDays;
        }


            public function fetch_leave(){
                $user_id=$this->user->info('id');
                echo json_encode($this->Crud_model->fetch_leave(['user_id'=>$user_id]));
                
            }

            public function fetch_leave_request(){
                $leave_request=$this->Crud_model->fetch_leave("");
                echo json_encode($leave_request);
            }



            






    
    }   




  
    

