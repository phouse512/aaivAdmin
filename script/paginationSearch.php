<?php
	$search_term = $_POST['searchTerm'];
	$page_size = $_POST['pageSize'];
	$page_num = $_POST['requestedPageNumber'];

	$connection = mysqli_connect('localhost', 'nuaaivco_event', 'pmh518', 'nuaaivco_events');

	$offset = ($page_num - 1) * $page_size;

	//user info
	$sql = "SELECT * FROM users WHERE first_name LIKE '%" . $search_term . "%' OR last_name LIKE '%" . $search_term . "%' LIMIT " . $page_size . " OFFSET " . $offset;
	$res = mysqli_query($connection, $sql);


	//total result count
	$sql_count = "SELECT COUNT(*) FROM users WHERE first_name LIKE '%" . $search_term . "%' OR last_name LIKE '%" . $search_term . "%'";
	$res_count = mysqli_query($connection, $sql_count);
	$row = $res_count->fetch_row();

	$total_page = ceil($row[0]/$page_size);


	$xml = new XMLWriter();



	header('Content-type: text/xml');
	
	$xml->openURI("php://output");
	$xml->startDocument();
	$xml->setIndent(true);

	$xml->startElement('paginationResults');;

	$xml->startElement('currentPage');
	$xml->writeRaw($page_num);
	$xml->endElement();

	$xml->startElement('totalPages');
	$xml->writeRaw($total_page);
	$xml->endElement();

	$xml->startElement('page_size');
	$xml->writeRaw($page_size);
	$xml->endElement();

	$xml->startElement('users');

	while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){
		$xml->startElement("user");

	    $xml->startElement("user_id");
	    $xml->writeRaw($row['user_id']);
	    $xml->endElement();

	    $xml->startElement("first_name");
	    $xml->writeRaw($row['first_name']);
	    $xml->endElement();

	    $xml->startElement("last_name");
	    $xml->writeRaw($row['last_name']);
	    $xml->endElement();

	    $xml->startElement("year");
	    $xml->writeRaw($row['year']);
	    $xml->endElement();

		$xml->startElement("email");
		$xml->writeRaw($row['email']);
		$xml->endElement();

		$xml->startElement("dorm");
		$xml->writeRaw($row['dorm']);
		$xml->endElement();

	    $xml->endElement();
	}

	$xml->endElement();
	$xml->endElement();
	

	$xml->flush();
?>