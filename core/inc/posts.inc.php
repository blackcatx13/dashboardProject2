<?php
//checks if the given post is in the table
function valid_pid($pid){
	$con = mysqli_connect('127.0.0.1', 'root', '','dashboardproject');
	$pid = (int)$pid;
	$sql = "SELECT COUNT(post_id) FROM posts WHERE post_id = {$pid}";
	$result = mysqli_query($con, $sql);
	
	$row = mysqli_fetch_row($result);
	return ($row[0] ==1 );
	
}

//fetches a summary of all the blog posts
function get_posts(){
	$con = mysqli_connect('127.0.0.1', 'root', '','dashboardproject');
	
	$sql = "SELECT 
				posts.post_id AS 'id',
				posts.post_title AS 'title',
				LEFT (posts.post_body, 512) AS 'preview',
				posts.post_user AS 'user',
				DATE_FORMAT(posts.post_date, '%d/%m/%y %h:%i:%s') AS 'date',
				comments.total_comments,
				DATE_FORMAT(comments.last_comment, '%d/%m/%y %h:%i:%s') AS 'last_comment'
			FROM posts
			LEFT JOIN (
				SELECT 
					post_id,
					COUNT('comment_id') AS 'total_comments',
					MAX('comment_date') AS 'last_comment'
				FROM comments
				GROUP BY post_id
			) AS comments
			ON posts.post_id = comments.post_id
			ORDER BY posts.post_date DESC";
	
	$result = mysqli_query($con, $sql);
	$posts = array();
	
	$rowcount = mysqli_num_rows($result);
	
	$c = 0;
	while ($c < $rowcount){
		$row = mysqli_fetch_assoc($result);
		
		$posts[] = array(
			'id'			=> $row['id'],
			'title'			=> $row['title'],
			'preview'		=> $row['preview'],
			'user'			=> $row['user'],
			'date'			=> $row['date'],
			'total_comments'	=> ($row['total_comments'] === null)? 0 : $row['total_comments'],
			'last_comment'	=> ($row['last_comment'] === null)? 'never' : $row['last_comment']
		);
		$c =$c+1;
	}
	
	return $posts;
}

//fetches a single post
function get_post($pid){
	$con = mysqli_connect('127.0.0.1', 'root', '','dashboardproject');
	$pid = (int)$pid;
	
	$sql = "SELECT
				post_title AS 'title',
				post_body AS 'body',
				post_user AS 'user',
				post_date AS 'date'
			FROM posts
			WHERE post_id = {$pid}";
			
	$post = mysqli_query($con, $sql);
	$post = mysqli_fetch_assoc($post);
	
	$post['comments'] = get_comments($pid);
	
	return $post;
}

//adds a new blog entry
function add_post($title, $body){
	$con = mysqli_connect('127.0.0.1', 'root', '','dashboardproject');
	$title = mysqli_real_escape_string($con, htmlentities($title));
	$body = mysqli_real_escape_string($con, nl2br(htmlentities($body)));
	mysqli_query($con, "INSERT INTO posts (post_user, post_title, post_body, post_date) VALUES ('{$_SESSION['user_id']}', '{$title}', '{$body}', NOW())");
	
	return true;
}

?>