<input type="hidden" id="detail_id" value="<?= $id ?>">
<?php 
    if($pos->name == 'Intern') { 
        $this->load->view('users/partials/intern');
    }else{
        $this->load->view('users/partials/employee');
    }
?>
