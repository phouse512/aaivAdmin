<?php
	$event_id = $_POST['eventID'];

	$connection = mysqli_connect('localhost', 'nuaaivco_event', 'pmh518', 'nuaaivco_events');

	$event_info_sql = "SELECT * FROM events WHERE event_id='" . $event_id . "'";
	$event_info_res = mysqli_query($connection, $event_info_sql);

	$xml = new XMLWriter();

	header('Content-type: text/xml');
	
	$xml->openURI("php://output");
	$xml->startDocument();
	$xml->setIndent(true);

	$xml->startElement('streak_trends');

	//event info
	$eventRow = mysqli_fetch_array($event_info_res, MYSQLI_ASSOC);

	$xml->startElement('event_id');
	$xml->writeRaw($eventRow['event_id']);
	$xml->endElement();

	$xml->startElement('event_name');
	$xml->writeRaw($eventRow['event_name']);
	$xml->endElement();

	$xml->startElement('event_date');
	$xml->writeRaw($eventRow['event_date']);
	$xml->endElement();

	$xml->startElement('streaks');

	for ($i=1; $i <= 8; $i++){

		$xml->startElement('streak');

		$xml->startElement('streak_group');
		$xml->writeRaw($i);
		$xml->endElement();

		$xml->startElement('users');

		$user_info_sql = "SELECT * FROM attendance LEFT JOIN users ON attendance.user_id=users.user_id WHERE attendance.current_streak = '" . $i ."'";
		$user_info_res = mysqli_query($connection, $user_info_sql);

		while ($row2 = mysqli_fetch_array($user_info_res, MYSQLI_ASSOC)) {
			$xml->startElement("user");

		    $xml->startElement("user_id");
		    $xml->writeRaw($row2['user_id']);
		    $xml->endElement();

		    $xml->startElement("first_name");
		    $xml->writeRaw($row2['first_name']);
		    $xml->endElement();

		    $xml->startElement("last_name");
		    $xml->writeRaw($row2['last_name']);
		    $xml->endElement();

		    $xml->startElement("year");
		    $xml->writeRaw($row2['year']);
		    $xml->endElement();

			$xml->startElement("email");
			$xml->writeRaw($row2['email']);
			$xml->endElement();

			$xml->startElement("dorm");
			$xml->writeRaw($row2['dorm']);
			$xml->endElement();
		    $xml->endElement();
		}
		$xml->endElement();
		$xml->endElement();
	}

	$xml->endElement();
	$xml->endElement();

	$xml->flush();
?>