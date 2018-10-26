<?php

$errors = array();

$valid_conversation = (isset($_GET['conversation_id']) && validate_conversation_id($_GET['conversation_id']));

if ($valid_conversation === false){
	$errors[]='Invalid conversation ID.';
}

if (isset($_POST['message'])){
	if (empty($_POST['message'])){
		$errors[] = 'You must enter a message';
	}
	
	if (empty($errors)){
		add_conversation_messages($_GET['conversation_id'], $_POST['message']);
	}
}

if (empty($errors) === false){
	foreach ($errors as $error){
		echo $error;
	}
}

if ($valid_conversation){
	if (isset($_POST['message'])){
		update_conversation_last_view($_GET['conversation_id']);
		$messages = fetch_conversation_messages($_GET['conversation_id']);
	}else{	
	$messages = fetch_conversation_messages($_GET['conversation_id']);
	update_conversation_last_view($_GET['conversation_id']);
	}
	
	?>
	
<head>
	<link href="https://fonts.googleapis.com/css?family=Bree+Serif|Exo+2|Poiret+One|Righteous" rel="stylesheet">
</head>
<style>
body {
    margin: 20px auto;
    max-width: 1100px;
    padding: 0 20px;
	font-family: 'Bree Serif', serif;
	font-size: ;
	
	background-color: #555;
}


.unread{
	color:#333;
}

.read{
	color:#666;
}
textarea {
  width: 100%;
  height: 120px;
}
#scroll{
	overflow: scroll;
	height:70%;
}
.pd{
	margin:10 10px;
}
</style>
<body>
<script>
// after dom is loaded
$(function() {
  // scroll all the way down
  $('html, body').scrollTop($(document).height() - $(window).height());
});
</script>

	<div id="main">
		<div>


	<div id="scroll">
		<?php 
		
		foreach ($messages as $message){
			?>
			<div class="alert alert-info pd">
				<p class=" <?php if ($message['unread']) echo 'unread';?> ">	<?php echo $message['user_name']; ?> (<?php echo date('d/m/y H:i:s', $message['date']); ?>)</p>
				<p class=""><?php echo $message['text']?></p>
				
			</div>
			<?php
		}
		
		?>
	</div>
	<?php
	}
	
?>
		</div>
		<hr />
		<div class="fixed-bottom">
		
			<form class="sform" action="" method="post">
			<textarea name="message" rows="5" cols="65" class="form-control"></textarea><br>
			<span><input class="btn btn-outline-info btn-block" type="submit" value="Add Message" /></span>
		</form>
		
		</div>
		
	</div>
</body>	
	
