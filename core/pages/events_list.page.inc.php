<html>
<head>
<style>
body{
	font-family: 'Quicksand', sans-serif;
	font-size:26px;
	background-color:#555;
	color:#fff;
}
a{
	color:#fcd900;
}
a:hover{
	color:#fff;
}



</style>
</head>
<body>

<?php

$events = get_events();

foreach ($events as $event){
	?>
	<h2><a href="index.php?page=events_read&amp;event_id=<?php echo $event['id']; ?>"><?php echo $event['title']; ?></a></h2>
	<h4><?php echo $event['date'];?></h4>
	
	<p><?php echo $event['preview'];?></p><hr />
	<?php
}

?>
</body>
</html>