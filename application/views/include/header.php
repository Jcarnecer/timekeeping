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
		<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css" >
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-select.min.css" >
		<link rel="stylesheet" href="assets/jquery-ui/jquery-ui.min.css" >
		<link rel="stylesheet" href="assets/datatables/jquery.dataTables.min.css" >
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/styles.css" >
		<script src="assets/datatables/jquery.dataTables.min.js"></script>
		<script src="assets/js/bootstrap-notify.min.js"></script>
		<script src="assets/js/bs_notify.js"></script>
		<script src="assets/js/bootstrap-select.min.js"></script>
		<script src="assets/jquery-ui/jquery-ui.min.js"></script>	
		<!-- <link rel="stylesheet" href="assets/css/jquery.timepicker.min.css">	 -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.js"></script>
		<!-- <script src="assets/js/jquery.timepicker.min.js"></script> -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.min.js"></script>
		<script>
		$( function() {
			$("#user-start-date,#add_start_date,#add_end_date,#start_date,#end_date,#intern_date").datepicker({
				dateFormat: 'yy-mm-dd'
			});
			
		})
		
		</script>
		<script>
		$(document).ready(function() {
			$('#intern_timein,#intern_timeout').timepicker({ 'timeFormat': 'HH:mm:ss' });
		})
		
		</script>
		<?php $segment =  $this->uri->segment(1);
			  $segment2 =  $this->uri->segment(2);

		if($segment == 'users'){ ?>
			<script src="assets/js/error-message.js"></script>
			<script src="assets/js/users/scripts.js"></script>
			<script>
				fetch_details()
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

		<script type="text/javascript">
			function DisplayTime(){
			if (!document.all && !document.getElementById)
			return
			timeElement=document.getElementById? document.getElementById("curTime"): document.all.tick2
			var CurrentDate=new Date()
			var hours=CurrentDate.getHours()
			var minutes=CurrentDate.getMinutes()
			var seconds=CurrentDate.getSeconds()
			var DayNight="PM"
			if (hours<12) DayNight="AM";
			if (hours>12) hours=hours-12;
			if (hours==0) hours=12;
			if (minutes<=9) minutes="0"+minutes;
			if (seconds<=9) seconds="0"+seconds;
			var currentTime=hours+":"+minutes+":"+seconds+" "+DayNight;
			timeElement.innerHTML=currentTime
			setTimeout("DisplayTime()",1000)
			}
			window.onload=DisplayTime
		</script>
    </head>
    <body>
