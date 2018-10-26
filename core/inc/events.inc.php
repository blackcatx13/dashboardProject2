<?php

//checks if the given event is in the table
function valid_eid($eid){
	$con = mysqli_connect('127.0.0.1', 'root', '','dashboardproject');
	$pid = (int)$eid;
	$sql = "SELECT COUNT(event_id) FROM events WHERE event_id = {$eid}";
	$result = mysqli_query($con, $sql);
	
	$row = mysqli_fetch_row($result);
	return ($row[0] ==1 );
	
}

//fetches a summary of all the event posts
function get_events(){
	$con = mysqli_connect('127.0.0.1', 'root', '','dashboardproject');
			
	$sql = "SELECT
					events.event_id AS 'id',
					events.event_title AS 'title',
					LEFT(events.event_body, 512) AS 'preview',
					DATE_FORMAT(events.event_date, '%d/%m/%y %h:%i:%s') AS 'date',
					events.event_img AS 'eimage',
					events.event_poster AS 'user'
			FROM events 
			ORDER BY events.event_date DESC";
			
	
	$result = mysqli_query($con, $sql);
	$events = array();
	
	$rowcount = mysqli_num_rows($result);
	
	$c = 0;
	while ($c < $rowcount){
		$row = mysqli_fetch_assoc($result);
		
		$events[] = array(
			'id'			=> $row['id'],
			'title'			=> $row['title'],
			'preview'		=> $row['preview'],
			'user'			=> $row['user'],
			'imgn'			=> $row['eimage'],
			'date'			=> $row['date']
		);
		$c =$c+1;
	}
	
	return $events;
}

//fetches a single post
function get_event($eid){
	$con = mysqli_connect('127.0.0.1', 'root', '','dashboardproject');
	$eid = (int)$eid;
	
	$sql = "SELECT
				event_title AS 'title',
				event_body AS 'body',
				event_poster AS 'user',
				event_date AS 'date',
				event_img AS 'imgn',
				ed AS 'ed',
				ven AS 'ven'
			FROM events
			WHERE event_id = {$eid}";
			
	$event = mysqli_query($con, $sql);
	$event = mysqli_fetch_assoc($event);
	
	
	
	return $event;
}

//adds a new event entry
function add_events($title, $body, $eimg, $d, $ven){
	$con = mysqli_connect('127.0.0.1', 'root', '','dashboardproject');
	$title = mysqli_real_escape_string($con, htmlentities($title));
	$eimg = mysqli_real_escape_string($con, htmlentities($eimg));
	$body = mysqli_real_escape_string($con, nl2br(htmlentities($body)));
	$d = mysqli_real_escape_string($con, htmlentities($d));
	$ven = mysqli_real_escape_string($con, htmlentities($ven));

	mysqli_query($con, "INSERT INTO events (event_poster, event_title, event_body, event_date, event_img, ed, ven) VALUES ('{$_SESSION['user_id']}', '{$title}', '{$body}', NOW(), '{$eimg}', '{$d}', '{$ven}')");
	
	return true;
}

?>