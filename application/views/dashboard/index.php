<?php
$pos_id = $this->user->info('pos_id');
$where = ['id'	=> $pos_id];
$position = $this->Crud_model->fetch_tag_row('*','position',$where);

if($position->name == 'Intern'){
	$this->load->view('dashboard/partials/intern');
}else{
	$this->load->view('dashboard/partials/employee');
}


?>