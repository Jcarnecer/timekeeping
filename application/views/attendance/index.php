
<?php 
$segment1 = $this->uri->segment(1);
if($segment1 == "timesheet"){
    if($this->user->info('pos_id')  == '1' || $this->user->info('pos_id')=='3'){
        $this->load->view('attendance/admin');
    }elseif($this->user->info('pos_id') == '2'){
        $this->load->view('attendance/employee');
    }elseif($this->user->info('pos_id') == '4'){
       $this->load->view('attendance/intern');
    }elseif($this->session->userdata('user_logged_in') == NULL){
        redirect('login');
    }
}elseif($segment1 == 'overtime'){
    if($this->user->info('pos_id')  == '1' || $this->user->info('pos_id')=='3'){
        $this->load->view('attendance/overtime');
    }elseif($this->user->info('pos_id') == '2'){
        $this->load->view('attendance/employee_overtime');
    }
}


$this->load->view('attendance/partials/attendance_modal');
?>