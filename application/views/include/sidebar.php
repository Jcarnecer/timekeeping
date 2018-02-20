<?php 
	  $where_in=array('TK_ADMIN');	
	  $position = $this->user->info('role');
	  $where = array('role_id' => $position);
	  $permission=$this->Crud_model->fetch('roles_permissions',$where);
	  $privileges=[];
      $permission_id=null;
	  foreach($permission as $row){
		  $privileges[]=$row->permission_id;
	  	
	  }
	  if(in_array('TK_ADMIN',$privileges)){
		 $permission_id='TK_ADMIN';
	  }
	  elseif(in_array('TK_EMPLOYEE',$privileges)){
		$permission_id='TK_EMPLOYEE';
	  }
	  elseif(in_array('TK_INTERN',$privileges)){
		$permission_id='TK_INTERN';
	  }
	  // echo $privileges;
	//   if(in_array('TK_ADMIN',$permission->$permission_id)){
	// 	$permission_id='TK_ADMIN';
	// 	echo $permission_id;s
	//   }elseif(in_array('TK_EMPLOYEE',$permission)){
	// 	$permission_id='TK_EMPLOYEE';  
	//   }elseif(in_array('TK_INTERN',$permission)){
	// 	$permission_id='TK_INTERN';  
	//   }
	  $users_position = $this->Crud_model->fetch_tag_row('*','timekeeping_permissions',['permission_id'=>$permission_id]);	
      $privilege = $users_position->privileges;
	  $menu = $this->Crud_model->fetch('timekeeping_menu');
      $explode = explode(',',$privilege);
	  $submenu = $this->Crud_model->fetch('timekeeping_sub_menu');
	  $sub_privilege = $users_position->privilege_sub_menu;
	  $submenu = $this->Crud_model->fetch('timekeeping_sub_menu');
	  $sub_explode = explode(',',$sub_privilege);
    
	// $position = $this->user->info('role');
	
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
				$sub_where = ["menu_id" => $menu_id];
				$w_submenu = $this->Crud_model->fetch('timekeeping_sub_menu', $sub_where); ?>
				
				<li class="sub-menu">
					<?php $name = $row->name ?>	
					<a data-toggle="collapse" href="#<?= str_replace(' ','',$name) ?>" aria-expanded="false" aria-controls="UIElementsSub" >
					<i class="<?= $row->icon ?>"></i>
						<span><?= $row->name ?></span>
					</a>

					<ul class="sub collapse" id="<?= str_replace(' ','',$name) ?>">
						
						<?php foreach($w_submenu as $sub){ 
								if(in_array($sub->id,$sub_explode)){?>
									<li><a href="<?= base_url($sub->url) ?>"><?= $sub->sub ?></a></li>
						<?php	}		
						 } // endforeach ?>
					</ul>
				</li>
		<?php   }else{ //without sub menu ?>
					<li class="">
						<a class="" href="<?= base_url($row->url) ?>">
							<i class="<?= $row->icon ?>"></i>
							<span><?= $row->name ?></span>
						</a>
					</li>
		<?php   }
			} //explode

        }?>
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
