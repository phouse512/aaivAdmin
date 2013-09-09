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
		$custom_event_sql = "SELECT events.event_id, COALESCE(attendance.status, 0) status FROM events LEFT JOIN attendance ON events.event_id=attendance.event_id AND attendance.user_id='" . $val . "' ORDER BY events.event_date ASC";		
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
					$past_attendance = $row3['status'];
				}
			} else if ($past_attendance == $row3['status']){
				if($row3['status'] == 1){
					$current_streak += 1;
					$past_attendance = $row3['status'];
				} else {
					$current_streak -= 1;
					$past_attendance = $row3['status'];
				}
			} else {
				if($row3['status'] == 1){
					$current_streak = 1;
					$past_attendance = $row3['status'];
				} else {
					$current_streak = -1;
					$past_attendance = $row3['status'];
				}
			}			
			$update_sql = "UPDATE attendance SET current_streak='" . streak_group($current_streak) . "' WHERE event_id='" . $row3['event_id'] . "' AND user_id='" . $val . "'";
			$update_res = mysqli_query($connection, $update_sql);

			$iterations += 1;
		}
	}

	echo $iterations;
	/*
	trends queries:

query 1 - get list of event id's, sorted by date asc 
"SELECT event_id FROM events ORDER BY event_date ASC"

create event array using array_push($arr, new val); with id's in respective places

query 2 - get list of user id's, sort by last_name asc
"SELECT user_id FROM users ORDER BY last_name ASC"

	$query = "SELECT * FROM attendance INNER JOIN users ON attendance.user_id=users.user_id WHERE event_id = '" . $event_id . "'";
e
 loop through all users
*/
?>

