<?php
	$event_id = $_POST['eventID'];

	$connection = mysqli_connect('localhost', 'nuaaivco_event', 'pmh518', 'nuaaivco_events');

	$sql = "DELETE FROM attendance WHERE event_id='" . $event_id . "'";
	$sql2 = "DELETE FROM events WHERE event_id='" . $event_id . "'";
	
	if($res = mysqli_query($connection, $sql)){
		if($res2 = mysqli_query($connection, $sql2)){
			echo "success";
		} else {
			echo "events";
		}
	} else {
		echo "attendance";
	}
?>