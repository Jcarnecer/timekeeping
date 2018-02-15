<section>
			WELCOME 

			<?php
				echo $this->user->info('firstname') .' '. $this->user->info('lastname');
				
			// date_default_timezone_set('Asia/Manila');
			// $from 		= date('H:i:s');
			// $from8		= '10:30:00';
			// $from9		= '09:00:59';
			// $to         = '17:00:00';
			// $break		= '01:00:00';

			// echo "<br>";
			// // echo $from;
			// echo "<br>";
			// if($from >= '08:00:00' && $from <= '09:00:59'){
			// 	echo "Number hours is 8";
			// }else{
			// 	$total      = strtotime($to) - strtotime($from8);
			// 	$hours      = floor($total / 60 / 60);
			// 	$minutes    = round(($total - ($hours * 60 * 60)) / 60);
			// 	echo $hours.'.'.$minutes;
			// 	echo "<br>";
			// 	if($minutes <= 31){
			// 		echo $hours + 1;
			// 	}else{
			// 		echo "<br>";
			// 		echo $hours;
			// 		echo "<br>";
			// 		// echo $hours.'.'.$minutes;
			// 	}
			// }

			$id = $this->user->info('id');
			$where = ['user_id' => $id];
			$remaining = $this->Crud_model->fetch_tag_row('*','user_details',$where);
			?>
			<br>
			Your remaining time is <?= $remaining->remaining ?>
		</section>
