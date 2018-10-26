<?php

//checks if the given post is in the table
function valid_aid($aid){
	$con = mysqli_connect('127.0.0.1', 'root', '','dashboardproject');
	$aid = (int)$aid;
	$sql = "SELECT COUNT(assignment_id) FROM assignments WHERE assignment_id = {$aid}";
	$result = mysqli_query($con, $sql);
	
	$row = mysqli_fetch_row($result);
	return ($row[0] ==1 );
	
}

//fetches a summary of all the blog posts
function get_assignments(){
	$con = mysqli_connect('127.0.0.1', 'root', '','dashboardproject');
	$uid = $_SESSION['user_id'];
	$sql = "SELECT users.user_program 
			FROM users 
			WHERE user_id = $uid";
	$sid = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($sid);
	$sid = $row['user_program'];
		
		$sql = "SELECT 
					assignments.assignment_id AS 'id',
					assignments.assignment_title AS 'title',
					assignments.assignment_for AS 'for',
					LEFT(assignments.assignment_body, 512) AS 'body',
					DATE_FORMAT(assignments.assignment_date, '%d/%m/%y %h:%i:%s') AS 'date',
					assignments.poster_id AS 'user'
			FROM assignments 
			WHERE assignments.assignment_for = '$sid'
			ORDER BY assignments.assignment_date DESC";
		
		$result = mysqli_query($con, $sql);
		
		$assignments = array();
		
		$rowcount = mysqli_num_rows($result);
		
		$c = 0;
		while ($c < $rowcount){
			$row = mysqli_fetch_assoc($result);
			
			$assignments[] = array(
				'id'			=> $row['id'],
				'title'			=> $row['title'],
				'preview'		=> $row['body'],
				'user'			=> $row['user'],
				'date'			=> $row['date'],
				'for'			=> $row['for']
			);
			$c =$c+1;
		}
		
		return $assignments;
	}


//fetches a single post
function get_assignment($aid){
	$con = mysqli_connect('127.0.0.1', 'root', '','dashboardproject');
	$aid = (int)$aid;
	
	$sql = "SELECT
				assignment_title AS 'title',
				assignment_body AS 'body',
				poster_id AS 'user',
				assignment_date AS 'date',
				assignment_for AS 'for'
			FROM assignments
			WHERE assignment_id = {$aid}";
			
	$assignment = mysqli_query($con, $sql);
	$assignment = mysqli_fetch_assoc($assignment);

	return $assignment;
}

//adds a new blog entry
function add_assignment($title, $body, $for){
	$con = mysqli_connect('127.0.0.1', 'root', '','dashboardproject');
	$title = mysqli_real_escape_string($con, htmlentities($title));
	$for = mysqli_real_escape_string($con, htmlentities($for));
	/*if ($prg == 'bca'){
		$for = 1;
	}else if ($prg == 'bba'){
		$for = 2;
	}else{
		$for = 3;
	}*/
	$body = mysqli_real_escape_string($con, nl2br(htmlentities($body)));
	mysqli_query($con, "INSERT INTO assignments (poster_id, assignment_title, assignment_body, assignment_date, assignment_for) VALUES ('{$_SESSION['user_id']}', '{$title}', '{$body}', NOW(), '{$for}')");
	
	return true;
}

?>
