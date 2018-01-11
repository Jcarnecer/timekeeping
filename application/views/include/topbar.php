<div class="main-content h-100">
	<?php if($this->uri->segment(1) == 'schedule'): ?>
	<div class="topbar">
	<?php else: ?>
	<div class="topbar">
	<?php endif; ?>
		<nav class="navbar navbar-custom">
			<div id="nav-icon-open" class="custom-toggle hidden-toggle">
				<span></span>
				<span></span>
				<span></span>
			</div>
			<a class="navbar-brand mr-auto" href="#">Payak Apps</a>
			<!-- <a class="nav-link" href="profile">My Profile</a> -->
			<a class="nav-text" href="login/logout">Logout</a>
		</nav>
	</div>

	<?php if($this->uri->segment(1) == 'schedule'): ?>
	<div class="container-fluid" style="height: calc(100% - 56px);">
	<?php else: ?>
	<div class="container-fluid">
	<?php endif; ?>