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
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" >
		<link rel="stylesheet" type="text/css" href="assets/css/styles.css" >
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-select.min.css" >
		<link rel="stylesheet" href="assets/datatables/jquery.dataTables.min.css" >
		<script src="assets/js/bootstrap-notify.min.js"></script>
		<script src="assets/js/bs_notify.js"></script>
		<script src="assets/js/bootstrap-select.min.js"></script>
		<script>
			$(document).ready(function(){
				$('#tk-tbl').DataTable();
			});
		</script>
		<?php $segment =  $this->uri->segment(1);
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
		<?php } ?>
    </head>
    <body>