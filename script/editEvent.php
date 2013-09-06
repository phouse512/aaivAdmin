<?php
	$event_id = $_POST['eventID'];
	$new_event_name = $_POST['newEventName'];
	$new_event_date = $_POST['newEventDate'];

	$connection = mysqli_connect('localhost', 'nuaaivco_event', 'pmh518', 'nuaaivco_events');

	$sql = "UPDATE events SET event_name='". $new_event_name . "', event_date='" . $new_event_date . "' WHERE event_id='" . $event_id ."'";
	
	if($res = mysqli_query($connection, $sql)){
		echo "success";
	} else {
		echo "fail";
	}
?>