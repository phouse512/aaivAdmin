<?php
	function streak_group($input){
		$output_group = 0;
		if($input < -5){
			$output_group = 1;
		} else if(($input < -2) and ($input > -6)){
			$output_group = 2;
		} else if($input == -2){
			$output_group = 3;
		} else if($input == -1){
			$output_group = 4;
		} else if($input == 1){
			$output_group = 5;
		} else if($input == 2){
			$output_group = 6;
		} else if(($input > 2) and ($input < 6)){
			$output_group = 7;
		} else {
			$output_group = 8;
		}

		return $output_group;
	}

	$connection = mysqli_connect('localhost', 'nuaaivco_event', 'pmh518', 'nuaaivco_events');

	$event_sql = "SELECT event_id FROM events ORDER BY event_date ASC";
	$event_res = mysqli_query($connection, $event_sql);

	$event_array = array();

	while($row = mysqli_fetch_array($event_res, MYSQLI_ASSOC)){
		array_push($event_array, $row['event_id']);
	}

	$user_sql = "SELECT user_id FROM users";
	$user_res = mysqli_query($connection, $user_sql);
	$user_array = array();

	while($row2 = mysqli_fetch_array($user_res, MYSQLI_ASSOC)){
		array_push($user_array, $row2['user_id']);
	}

	$iterations = 0;

	foreach($user_array as $val){

		$custom_event_sql = "SELECT events.event_id, IFNULL(attendance.status, 0) status FROM events LEFT JOIN attendance ON events.event_id=attendance.event_id AND attendance.user_id='" . $val . "' ORDER BY events.event_date ASC";		
		$custom_event_res = mysqli_query($connection, $custom_event_sql);

		$past_attendance = -1;
		$current_streak = 0;

		while ($row3 = mysqli_fetch_array($custom_event_res, MYSQLI_ASSOC)) {
			if ($past_attendance == -1){
				if($row3['status'] == 1){
					$current_streak = 1;
					$past_attendance = $row3['status'];
				} else {
					$current_streak = -1;
					$past_attendance = 0;
				}
			} else if ($row3['status'] == 1){
				if($past_attendance == 1){
					$current_streak += 1;
					$past_attendance = 1;
				} else {
					$current_streak = 1;
					$past_attendance = 1;
				}
			} else {
				if($past_attendance == 0){
					$current_streak -= 1;
					$past_attendance = 0;
				} else {
					$current_streak = -1;
					//echo " streaK: " . $current_streak . " past attendance:" . $past_attendance . " and row" . $row['status'] . " ";
					$past_attendance = 0;
				}
			}		
			$temp_group = streak_group($current_streak);	
			$update_sql = "INSERT INTO attendance (event_id, user_id, status, current_streak, streak_group) values(" . $row3['event_id'] . ", " . $val . ", 0, " . $current_streak . ", " . $temp_group . ") ON DUPLICATE KEY UPDATE current_streak=" . $current_streak . ", streak_group=" . $temp_group . "";
			$update_res = mysqli_query($connection, $update_sql);

			$iterations += 1;
		}
	}

	echo $iterations;
?>

