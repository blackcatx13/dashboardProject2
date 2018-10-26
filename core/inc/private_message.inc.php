<?php
//fetches a summary of conversation
function fetch_conversation_summary(){
	$con = mysqli_connect('127.0.0.1', 'root', '','dashboardproject');


	$sql = "SELECT
				conversations.conversation_id,
				conversations.conversation_subject,
				MAX(conversations_messages.message_date) AS 'conversation_last_reply',
				MAX(conversations_messages.message_date) > conversations_members.conversation_last_view AS 'conversation_unread'
			FROM conversations 
			LEFT JOIN conversations_messages ON conversations.conversation_id = conversations_messages.conversation_id
			INNER JOIN conversations_members ON conversations.conversation_id = conversations_members.conversation_id
			WHERE conversations_members.user_id = {$_SESSION['user_id']} 
			AND conversations_members.conversation_deleted =0
			GROUP BY conversations.conversation_id
			ORDER BY conversation_last_reply DESC";
			
			
	$result = mysqli_query($con, $sql);
	
	
	
	$conversations = array();
	$rowcount = mysqli_num_rows($result);
	
	$c = 0;
	while ($c < $rowcount){
		$row = mysqli_fetch_assoc($result);
		$conversations[] = array(
			'id'           => $row['conversation_id'],
			'subject'      => $row['conversation_subject'],
			'last_reply'   => $row['conversation_last_reply'],
			'unread_messages'  => ($row['conversation_unread'] == 1),
		);
		$c = $c+1;
	}
	return $conversations;
}

//fetches all the messages in a conversation
function fetch_conversation_messages($conversation_id){
	$con = mysqli_connect('127.0.0.1', 'root', '','dashboardproject');
	$conversation_id = (int)$conversation_id;
	
	$sql = "SELECT
			conversations_messages.message_date,
			conversations_messages.message_date > conversations_members.conversation_last_view AS message_unread,
			conversations_messages.message_text,
			users.user_name
			FROM conversations_messages
			INNER JOIN users ON conversations_messages.user_id = users.user_id
			INNER JOIN conversations_members ON conversations_messages.conversation_id = conversations_members.conversation_id
			WHERE conversations_messages.conversation_id = {$conversation_id}
			AND conversations_members.user_id = {$_SESSION['user_id']}
			ORDER BY conversations_messages.message_date DESC";
	
	$result = mysqli_query($con, $sql);
	$messages = array();
	$rowcount = mysqli_num_rows($result);
	
	$c = 0;
	while ($c < $rowcount){
		$row = mysqli_fetch_assoc($result);
		$messages[] = array(
			'date'   => $row['message_date'],
			'unread' => $row['message_unread'],
			'text'   => $row['message_text'],
			//'user'   => array(
			//	'name'	=>$row['user_name']
			//),
			'user_name'  => $row['user_name'],
		);
		$c = $c+1;
	}
	return $messages;
}

function update_conversation_last_view($conversation_id){
	$con = mysqli_connect('127.0.0.1', 'root', '','dashboardproject');
	$conversation_id = (int)$conversation_id;
	$t = time();
	$sql = "UPDATE conversations_members
			SET conversation_last_view = {$t}
			WHERE conversation_id = {$conversation_id}
			AND user_id = {$_SESSION['user_id']}";
	
	mysqli_query($con, $sql);
}

function create_conversation($user_ids, $subject, $body){
	$con = mysqli_connect('127.0.0.1', 'root', '','dashboardproject');
	
	$subject = mysqli_real_escape_string($con, htmlentities($subject));
	$body = mysqli_real_escape_string($con, htmlentities($body));
	
	mysqli_query($con, "INSERT INTO conversations (conversation_subject) VALUES ('{$subject}')");
	
	$conversation_id = mysqli_insert_id($con);
	$t = time();
	
	$sql = "INSERT INTO conversations_messages (conversation_id, user_id, message_date, message_text) 
			VALUES ('{$conversation_id}', '{$_SESSION['user_id']}', '{$t}', '{$body}')";
	
	
	$user_ids = (int) $user_ids;
	
	mysqli_query($con, $sql);
	
	$sql1 = "INSERT INTO conversations_members (conversation_id, user_id, conversation_last_view, conversation_deleted) 
			VALUES ('{$conversation_id}', '{$user_ids}', '0', '0')";
	
	mysqli_query($con, $sql1);
	
	$sql2 = "INSERT INTO conversations_members (conversation_id, user_id, conversation_last_view, conversation_deleted) 
			VALUES ('{$conversation_id}', '{$_SESSION['user_id']}', '0', '0')";
	mysqli_query($con, $sql2);
}





function validate_conversation_id($conversation_id){
	$con = mysqli_connect('127.0.0.1', 'root', '','dashboardproject');
	$conversation_id = (int)$conversation_id;
	
	$sql = " SELECT COUNT(1)
			 FROM conversations_members
			 WHERE conversation_id = $conversation_id
			 AND user_id = {$_SESSION['user_id']}
			 AND conversation_deleted = 0";
	
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_row($result);
	return ($row[0] ==1 );
	
}

//adds a message to the given conversation
function add_conversation_messages($conversation_id, $text){
	$con = mysqli_connect('127.0.0.1', 'root', '','dashboardproject');
	$conversation_id = (int)$conversation_id;
	$text			 = mysqli_real_escape_string($con, htmlentities($text));
	$t = time();
	
	$sql = "INSERT INTO conversations_messages (conversation_id, user_id, message_date, message_text)
			VALUES ('{$conversation_id}', '{$_SESSION['user_id']}', '{$t}', '{$text}')";
	
	 mysqli_query($con, $sql);
	
}

function delete_conversation($conversation_id){
	$con = mysqli_connect('127.0.0.1', 'root', '','dashboardproject');
	$conversation_id = (int)$conversation_id;
	echo $conversation_id;
	
	$sql = "SELECT conversation_deleted
			FROM conversations_members
			WHERE user_id != {$_SESSION['user_id']}
			AND conversation_id = $conversation_id";
			
	$result = mysqli_query($con, $sql);
	
	$row = mysqli_fetch_row($result);
	
	if (mysqli_num_rows($result) === 1 && $row[0] == 1){
		mysqli_query($con,"DELETE FROM conversations WHERE conversation_id = $conversation_id");
		mysqli_query($con,"DELETE FROM conversations_members WHERE conversation_id = $conversation_id");
		mysqli_query($con,"DELETE FROM conversations_messages WHERE conversation_id = $conversation_id");
		
		
	}else {
		$sql = "UPDATE conversations_members
				SET conversation_deleted = 1
				WHERE conversation_id = $conversation_id
				AND user_id = {$_SESSION['user_id']}";
				
				mysqli_query($con, $sql);
				
	}
	header ("Location: index.php?page=inbox");
}






?>