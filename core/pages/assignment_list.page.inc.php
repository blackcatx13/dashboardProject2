<html>
<head>
<style>
body{
	font-family: 'Quicksand', sans-serif;
	font-size:26px;
	background-color:#555;
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
						$assignments = get_assignments();
						foreach ($assignments as $assignment){
							?>
								<h2><a href="index.php?page=assignment_read&amp;assignment_id=<?php echo $assignment['id']; ?>"><?php echo $assignment['title']; ?></a>  <sup style="color:white;font-size:16px;"><?php echo $assignment['date'];?></sup></h2>
								
								<p style="font-size:18px;color:#fff;"><?php echo $assignment['preview'];?></p>
								<hr />
							<?php
						}

						?>
</body>
</html>





