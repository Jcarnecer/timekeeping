<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<base href="<?php echo base_url();?>" />
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title><?= $title ?></title>
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/base_url.js"></script>
		<link rel="stylesheet" type="text/css" href="assets/css/flavored-reset-and-normalize.min.css" >
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" > -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css" >
		<link rel="stylesheet" type="text/css" href="assets/css/styles.css" >
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-select.min.css" >
		<link rel="stylesheet" href="assets/datatables/jquery.dataTables.min.css" >
		<link rel="stylesheet" href="assets/jquery-ui/jquery-ui.min.css" >
		<script src="assets/datatables/jquery.dataTables.min.js"></script>
		<script src="assets/js/bootstrap-notify.min.js"></script>
		<script src="assets/js/bs_notify.js"></script>
		<script src="assets/js/bootstrap-select.min.js"></script>
		<script src="assets/jquery-ui/jquery-ui.min.js"></script>
		<script>
		$( function() {
			$("#user-start-date").datepicker({
				dateFormat: 'yy-mm-dd'
			})
		})
		</script>
		<?php $segment =  $this->uri->segment(1);
			  $segment2 =  $this->uri->segment(2);

		if($segment == 'users'){ ?>
			<script src="assets/js/error-message.js"></script>
			<script src="assets/js/users/scripts.js"></script>
			<script>
				fetch_users();
			</script>
			
		<?php }elseif($segment == 'position'){ ?>
			<script src="assets/js/error-message.js"></script>
			<script src="assets/js/position/scripts.js"></script>
			<script>
				fetch_positions();
			</script>
		<?php }elseif($segment == 'profile'){ ?>
			<script src="assets/js/error-message.js"></script>
			<script src="assets/js/profile/scripts.js"></script>
			<script>
				fetch_profile();
			</script>
		<?php }elseif($segment == 'shift'){ ?>
			<script src="assets/js/error-message.js"></script>
			<script src="assets/js/shift/scripts.js"></script>
			<script>
				fetch_shift();
			</script>
		<?php }elseif ($segment == 'timesheet' || 
					   $segment == 'leaves' ||
					   $segment == 'overtime' || 
					   $segment2 = 'employee') { ?>
			<script src="assets/js/attendance/script.js"></script>
		<?php } ?>
    </head>
    <body>