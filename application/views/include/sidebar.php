<?php
      $position = $this->user->info('position_id');
      $where = array('id' => $position);
      $users_position = $this->Crud_model->fetch_tag_row('*','position',$where);
      $privilege = $users_position->privileges;
	  $menu = $this->Crud_model->fetch('menu');
	  
	  $submenu = $this->Crud_model->fetch('sub_menu');
	  $explode = explode(',',$privilege);
?>
<div id="sidebar">
<!-- sidebar menu start-->

<div id="nav-icon-close" class="custom-toggle">
<span></span>
<span></span>
</div>

<ul class="sidebar-menu">
		<?php foreach($menu as $row){
      $menu_withsub = $row->with_sub;
      $menu_id = $row->id;
			if(in_array($row->id,$explode)){
				if($menu_withsub == 1){

				if($this->user->info('position_id')==4){
					// $sub_where = [];
					$sub_where = ["menu_id" => $menu_id,'intern'	=>  1];
				}else{
					$sub_where = ["menu_id" => $menu_id];
				}
				
				$w_submenu = $this->Crud_model->fetch('sub_menu', $sub_where);
          ?>
				<li class="sub-menu">
					<?php $name = $row->name ?>	
					<a data-toggle="collapse" href="#<?= str_replace(' ','',$name) ?>" aria-expanded="false" aria-controls="UIElementsSub" >
					<i class="<?= $row->icon ?>"></i>
						<span><?= $row->name ?></span>
					</a>
					<ul class="sub collapse" id="<?= str_replace(' ','',$name) ?>">
						<?php foreach($w_submenu as $sub){ ?>
								<li><a href="<?= base_url($sub->url) ?>"><?= $sub->sub ?></a></li>
						<?php } ?>
					</ul>
				</li>
		<?php }else{ ?>
				<li class="">
					<a class="" href="<?= base_url($row->url) ?>">
						<i class="<?= $row->icon ?>"></i>
						<span><?= $row->name ?></span>
					</a>
				</li>
		<?php }
			}

        }?>=
		<!--<ul class="sub collapse" id="expense">
			<li><a  href="expense/reimbursement">Reimbursement</a></li>
			<li><a  href="expense/request">Request</a></li>
			<li><a  href="expense/classification">Classification</a></li>
			<li><a  href="panels.html">Panels</a></li>
		 </ul>
	</li> -->

</ul>
<!-- sidebar menu end-->
</div>
