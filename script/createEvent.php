<?php
	$event_name = $_POST['eventName'];
	$event_date = $_POST['eventDate'];

	$connection = mysqli_connect('localhost', 'nuaaivco_event', 'pmh518', 'nuaaivco_events');

	$sql = "INSERT INTO events (event_name, event_date) VALUES ('". $event_name . "', '". $event_date ."')";

	if ($res = mysqli_query($connection, $sql)){
		$event_id = mysqli_insert_id($connection);
		echo $event_id;
	} else {
		echo "fail";
	}
	


?>