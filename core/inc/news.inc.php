<?php

//checks if the given event is in the table
function valid_nid($nid){
	$con = mysqli_connect('127.0.0.1', 'root', '','dashboardproject');
	$nid = (int)$nid;
	$sql = "SELECT COUNT(news_id) FROM news WHERE news_id = {$nid}";
	$result = mysqli_query($con, $sql);
	
	$row = mysqli_fetch_row($result);
	return ($row[0] ==1 );
	
}

//fetches a summary of all the event posts
function get_newss(){
	$con = mysqli_connect('127.0.0.1', 'root', '','dashboardproject');
	
	$sql = "SELECT
					news.news_id AS 'id',
					news.news_title AS 'title',
					LEFT(news.news_body, 512) AS 'preview',
					DATE_FORMAT(news.news_date, '%d/%m/%y %h:%i:%s') AS 'date',
					news.news_poster AS 'user'
			FROM news 
			ORDER BY news.news_date DESC";
			
	
	$result = mysqli_query($con, $sql);
	$newss = array();
	
	$rowcount = mysqli_num_rows($result);
	
	$c = 0;
	while ($c < $rowcount){
		$row = mysqli_fetch_assoc($result);
		
		$newss[] = array(
			'id'			=> $row['id'],
			'title'			=> $row['title'],
			'preview'		=> $row['preview'],
			'user'			=> $row['user'],
			'date'			=> $row['date']
		);
		$c =$c+1;
	}
	
	return $newss;
}

//fetches a single post
function get_news($nid){
	$con = mysqli_connect('127.0.0.1', 'root', '','dashboardproject');
	$nid = (int)$nid;
	
	$sql = "SELECT
				news_title AS 'title',
				news_body AS 'body',
				news_poster AS 'user',
				news_date AS 'date'
			FROM news
			WHERE news_id = {$nid}";
			
	$news = mysqli_query($con, $sql);
	$news = mysqli_fetch_assoc($news);
	
	
	
	return $news;
}

//adds a new event entry
function add_news($title, $body){
	$con = mysqli_connect('127.0.0.1', 'root', '','dashboardproject');
	$title = mysqli_real_escape_string($con, htmlentities($title));
	$body = mysqli_real_escape_string($con, nl2br(htmlentities($body)));
	mysqli_query($con, "INSERT INTO news (news_poster, news_title, news_body, news_date) VALUES ('{$_SESSION['user_id']}', '{$title}', '{$body}', NOW())");
	
	return true;
}

?>