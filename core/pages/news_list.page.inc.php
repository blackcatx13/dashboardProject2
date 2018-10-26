<html>
<head>
<style>
body{
	font-family: 'Quicksand', sans-serif;
	font-size:26px;
	background-color:#555;
	color:#fff;
	margin:0;
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

$newss = get_newss();

foreach ($newss as $news){
	?>
	<h2><a href="index.php?page=events_read&amp;news_id=<?php echo $news['id']; ?>"><?php echo $news['title']; ?></a></h2>
	<h4><?php echo $news['user'];?> on <?php echo $news['date'];?></h4>
	<hr />
	<p><?php echo $news['preview'];?></p>
	<?php
}


?>


</body>
</html>