trends queries:

query 1 - get list of event id's, sorted by date asc 
"SELECT event_id FROM events ORDER BY event_date ASC"

create event array using array_push($arr, new val); with id's in respective places

query 2 - get list of user id's, sort by last_name asc
"SELECT user_id FROM users ORDER BY last_name ASC"

begin loop through all users

	
<?php
	$connection = mysqli_connect('localhost', 'nuaaivco_event', 'pmh518', 'nuaaivco_events');

	$event_sql = "SELECT event_id FROM events ORDER BY event_date ASC";
	$event_res = mysqli_query($connection, $sql);

	$event_array = array();

	while($row = mysqli_fetch_array($event_res, MYSQLI_ASSOC)){
		array_push($event_array, $row['event_id']);
	}
	

?>

