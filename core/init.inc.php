<?php

$core_path = dirname(__FILE__);

if (empty($_GET['page']) || in_array("{$_GET['page']}.page.inc.php",scandir("{$core_path}/pages/page")) == false){
	header('HTTP/1.1 404 Not Found');
	header('Location: index.php?page=home');

	die();
}

session_start();

mysqli_connect('127.0.0.1', 'root', '','dashboardproject');

include("{$core_path}/inc/user.inc.php");
include("{$core_path}/inc/private_message.inc.php");
include("{$core_path}/inc/comments.inc.php");
include("{$core_path}/inc/posts.inc.php");
include("{$core_path}/inc/assignments.inc.php");
include("{$core_path}/inc/attendance.inc.php");
include("{$core_path}/inc/getattdhome.inc.php");
include("{$core_path}/inc/events.inc.php");
include("{$core_path}/inc/news.inc.php");

if (isset($_POST['user_name'], $_POST['user_password'])){
	if (($user_id = validate_credentials($_POST['user_name'], $_POST['user_password'])) !== false){
		$_SESSION['user_id'] = $user_id;
		$user_info = fetch_user_profile();
		if($user_info['priority'] == 0){
			header('Location: index.php?page=home');
			die();
		}else{
			header('Location: index.php?page=home');
			die();
		}
	}
}

if (empty($_SESSION['user_id']) && $_GET['page'] !== 'login'){
	header('HTTP/1.1 403 Forbidden');
	header('Location: index.php?page=login');
	
	die();
}

$include_file = "{$core_path}/pages/page/{$_GET['page']}.page.inc.php";

?>