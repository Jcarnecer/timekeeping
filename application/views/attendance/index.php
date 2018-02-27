
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

$permission=$this->Crud_model->fetch('roles_permissions',['role_id'=>$this->user->info('role')]);
$privileges=[];
$permission_id=null;
foreach($permission as $row){
	$privileges[]=$row->permission_id;
}
if($segment1=="timesheet"){
   if(in_array('TK_ADMIN',$privileges)){
        $this->load->view('attendance/admin');
   }
   elseif(in_array('TK_EMPLOYEE',$privileges)){
        $this->load->view('attendance/employee');
   }
   elseif(in_array('TK_INTERN',$privileges)){
        $this->load->view('attendance/intern'); 
    }            
}elseif($segment1=="overtime"){
    if(in_array('TK_ADMIN',$privileges)){
        $this->load->view('attendance/overtime');
   }
   elseif(in_array('TK_ADMIN',$privileges)){
    $this->load->view('attendance/employee_overtime');
   }
   else{
       
   }

}elseif($segment1=="leave"){
    $this->load->view('attendance/employee_leave');
}

 
$this->load->view('attendance/partials/attendance_modal');
    
?>