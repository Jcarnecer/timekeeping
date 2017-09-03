<input type="hidden" id="detail_id" value="<?= $id ?>">
<?php 
    if($pos->name == 'Intern') { 
        $this->load->view('users/partials/intern');
    }elseif($pos->name == 'Admin'){
        $this->load->view('users/partials/admin');
    }else{
        $this->load->view('users/partials/employee');
    }
?>
