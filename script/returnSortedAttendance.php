<?php
	$event_id = $_POST['eventID'];
	$sort = $_POST['sortOption'];
	$sift = $_POST['siftOption'];

	$query = "";

	switch ($sift) {
		case "sift-default":
			$query .= "SELECT * FROM attendance INNER JOIN users ON attendance.user_id=users.user_id WHERE event_id = '" . $event_id . "'";
			break;
		case "sift-1":
			$query .= "SELECT * FROM attendance INNER JOIN users ON attendance.user_id=users.user_id WHERE event_id = '" . $event_id . "' AND year='freshman'";
			break;
		case "sift-2":
			$query .= "SELECT * FROM attendance INNER JOIN users ON attendance.user_id=users.user_id WHERE event_id = '" . $event_id . "' AND year='sophomore'";
			break;
		case "sift-3":
			$query .= "SELECT * FROM attendance INNER JOIN users ON attendance.user_id=users.user_id WHERE event_id = '" . $event_id . "' AND year='junior'";
			break;
		case "sift-4":
			$query .= "SELECT * FROM attendance INNER JOIN users ON attendance.user_id=users.user_id WHERE event_id = '" . $event_id . "' AND year='senior'";
			break;
		case "sift-5":
			$query .= "SELECT * FROM attendance INNER JOIN users ON attendance.user_id=users.user_id WHERE event_id = '" . $event_id . "' AND year='other'";
			break;
		case "sift-6":
			$query .= "SELECT * FROM attendance INNER JOIN users ON attendance.user_id=users.user_id WHERE event_id = '" . $event_id . "' AND first_time='1'";
			break;
	}


	switch($sort) {
		case "sort-1":
			$query .= "";
			break;
		case "sort-2":
			$query .= "ORDER BY first_name ASC";
			break;
		case "sort-3":
			$query .= "ORDER BY last_name ASC";
			break;
		case "sort-4":
			$query .= "ORDER BY year ASC";
			break;
	}

	$connection = mysqli_connect('localhost', 'nuaaivco_event', 'pmh518', 'nuaaivco_events');

	$res = mysqli_query($connection, $query);

	$query2 = "SELECT * FROM events WHERE event_id = '" . $event_id . "'";
	$res2 = mysqli_query($connection, $query2);

	$xml = new XMLWriter();

	header('Content-type: text/xml');
	
	$xml->openURI("php://output");
	$xml->startDocument();
	$xml->setIndent(true);

	$xml->startElement('attendance');

	//event info
	$eventRow = mysqli_fetch_array($res2, MYSQLI_ASSOC);

	$xml->startElement('event_id');
	$xml->writeRaw($eventRow['event_id']);
	$xml->endElement();

	$xml->startElement('event_name');
	$xml->writeRaw($eventRow['event_name']);
	$xml->endElement();

	$xml->startElement('event_date');
	$xml->writeRaw($eventRow['event_date']);
	$xml->endElement();

	$xml->startElement('users');

	while ($row2 = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
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

		$xml->startElement("first_time");
		$xml->writeRaw($row2['first_time']);
		$xml->endElement();

	    $xml->endElement();
	}
	$xml->endElement();
	$xml->endElement();

	//$xml->flush();
?>