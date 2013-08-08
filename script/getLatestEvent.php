<?php
	$connection = mysqli_connect('localhost', 'nuaaivco_event', 'pmh518', 'nuaaivco_events');

	$query = "SELECT event_id FROM events ORDER BY event_date DESC LIMIT 1";
	$res = mysqli_query($connection, $query);

	$eventRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

	echo $eventRow['event_id'];
?>