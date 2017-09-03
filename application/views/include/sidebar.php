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
<!-- <button class="btn btn-default toggle-button" type="button" >
	<span class="navbar-toggler-icon"></span>
</button> -->
<div id="nav-icon3">
	<span></span>
	<span></span>
	<span></span>
	<span></span>
</div>
<a class="logo" href="#">Navbar</a>
<ul class="sidebar-menu">
		<?php foreach($menu as $row){
			if(in_array($row->id,$explode)){
				if($row->with_sub == 1){ ?>
				<li class="sub-menu">
					<a data-toggle="collapse" href="#UIElementsSub" aria-expanded="false" aria-controls="UIElementsSub" >
						<i class="<?= $row->icon ?>"></i>
						<span><?= $row->name ?></span>
					</a>
					<ul class="sub collapse" id="UIElementsSub">
						
						<!-- <li><a  href="panels.html">Panels</a></li> -->
						<?php foreach($submenu as $sub){ ?>
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

        }?>
	<!-- <li class="">
		<a class="" href="#">
			<i class="fa fa-dashboard"></i>
			<span>Dashboard</span>
		</a>
	</li>
	<li class="">
		<a class="" href="users">
			<i class="fa fa-users"></i>
			<span>Users Management</span>
		</a>
	</li>

	<li class="">
		<a class="" href="position">
			<i class="fa fa-sitemap"></i>
			<span>Position Management</span>
		</a>
	</li>

	<li class="">
		<a class="" href="shift">
			<i class="fa fa-sitemap"></i>
			<span>Manage Shift</span>
		</a>
	</li> -->

	<!-- <li class="sub-menu">
		<a data-toggle="collapse" href="#UIElementsSub" aria-expanded="false" aria-controls="UIElementsSub" >
			<i class="fa fa-desktop"></i>
			<span>Expense</span>
		</a>
		<ul class="sub collapse" id="UIElementsSub">
			<li><a  href="expense/reimbursement">Reimbursement</a></li>
			<li><a  href="expense/request">Request</a></li>
			<li><a  href="expense/classification">Classification</a></li>
			<!-- <li><a  href="panels.html">Panels</a></li> -->
		</ul>
	</li>
	<!-- <li class="">
		<a class="" href="<?= base_url('users/logout'); ?>">
			<i class="fa fa-dashboard"></i>
			<span>Logout</span>
		</a>
	</li> -->

</ul>
<!-- sidebar menu end-->
</div>
