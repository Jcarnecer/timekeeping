<?php
    $segment=$this->uri->segment(1);

    if($segment=='eleave'){
        $this->load->view('leaves/employee_leaves');
    }
    $this->load->view('leaves/partials/reset_leave');    
    $this->load->view('leaves/partials/leave_modal');
  
?>