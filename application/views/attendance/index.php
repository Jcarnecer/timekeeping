
<?php 
$segment1 = $this->uri->segment(1);
$segment2 = $this->uri->segment(2);
// if($segment1 == "timesheet"){
    // if($this->user->info('role')  == '2' || $this->user->info('role')=='1'){
    //     $this->load->view('attendance/admin');
    // }elseif($this->user->info('role') == '4'){
    //     $this->load->view('attendance/employee');
    // }elseif($this->user->info('role') == '5'){
    //    $this->load->view('attendance/intern');
    // // }elseif($this->session->userdata('user_logged_in') == NULL){
    // //     redirect('login');
    //  }

    
// }elseif($segment1 == 'overtime'){
//     if($this->user->info('role')  == '1' || $this->user->info('role')=='2'){
//         $this->load->view('attendance/overtime');
//     }elseif($this->user->info('role') == '3'){
//         $this->load->view('attendance/employee_overtime');
//     }
// }elseif($segment1=='leave'){
//     $this->load->view('attendance/employee_leave');
    
// }

$permission=$this->Crud_model->fetch('roles_permissions',['role_id'=>$this->user->info('role')],array('TK_ADMIN','TK_EMPLOYEE','TK_INTERN'));
if($segment1=="timesheet"){
   if($permission[0]->permission_id=='TK_ADMIN'){
        $this->load->view('attendance/admin');
   }
   elseif($permission[0]->permission_id=='TK_EMPLOYEE'){
        $this->load->view('attendance/employee');
   }
   elseif($permission[0]->permission_id=='TK_INTERN'){
        $this->load->view('attendance/intern'); 
    }            
}elseif($segment1=="overtime"){
    if($permission[0]->permission_id=='TK_ADMIN'){
        $this->load->view('attendance/overtime');
   }
   elseif($permission[0]->permission_id=='TK_EMPLOYEE'){
    $this->load->view('attendance/employee_overtime');
   }
   else{
       
   }

}elseif($segment1=="leave"){
    $this->load->view('attendance/employee_leave');
}


$this->load->view('attendance/partials/attendance_modal');
    
?>