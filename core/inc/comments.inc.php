<?php
//returns all of the comments for a given post
function get_comments($pid){
	$con = mysqli_connect('127.0.0.1', 'root', '','dashboardproject');
	$pid = (int)$pid;
	
	$sql = "SELECT 
				comment_body AS 'body',
				comment_user AS 'user',
				DATE_FORMAT(comment_date, '%d/%m/%Y %h:%i:%s') AS 'date'
			FROM comments
			WHERE post_id = {$pid}";
	
	$result = mysqli_query($con, $sql);
	
	$rowcount = mysqli_num_rows($result);
	$comments = array();
	$c = 0;
	while ($c < $rowcount){
		$row = mysqli_fetch_assoc($result);
		$comments[] = array(
				'body' => $row['body'],
				'user' => $row['user'],
				'date' => $row['date']
		);
		$c = $c+1;
		
	}
	
	return $comments;
	
}

//adds a comment
function add_comment($pid, $body){
	$con = mysqli_connect('127.0.0.1', 'root', '','dashboardproject');
	if (valid_pid($pid) === false){
		return false;
	}
	$pid = (int)$pid;
	$body = mysqli_real_escape_string($con, nl2br(htmlentities($body)));
	$result = mysqli_query($con, "INSERT INTO comments (post_id, comment_user, comment_body, comment_date) VALUES ({$pid}, '{$_SESSION['user_id']}', '{$body}', NOW())");

	return true;
}

?>