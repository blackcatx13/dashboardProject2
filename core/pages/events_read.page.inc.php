<html>
<head>
<style>
body {
margin:0;
background-color: #343a40;
color:#fff;
font-family: 'Quicksand', sans-serif;
}

.active {
    background-color: #c63939  !important;
}

.sidenav {
    height: 100%;
    width: 90px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #333;
    overflow-x: hidden;
    padding-top: 20px;
}

.sidenav a {
    color: #818181;
    display: block;
	 display: block;
    text-align: center;
    padding: 16px;
    transition: all 0.3s ease;
    font-size: 36px;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.main {
    margin-left: 160px; /* Same as the width of the sidenav */
    font-size: 16px; /* Increased text to enable scrolling */
    padding: 0px 10px;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
}

.containercolor{
	background-color:#555;
	
}
h2{
	color:#fcd900;
}

hr {
    display: block;
    height: 1px;
    border: 0;
    border-top: 3px solid #f20d0d;
    margin: 1em 0;
    padding: 0; 
}
	
</style>
</head>


<body>
<div class="main">
<div class="sidenav">
  
  <a href="index.php?page=home"><i class="material-icons">home</i></a> 
  <a href="index.php?page=inbox"><i class="material-icons">inbox</i></a> 
  <a class="active" href="index.php?page=blog_list"><i class="material-icons">forum</i></a> 
  <a href="index.php?page=events_news"><i class="material-icons">event</i></a>
  <a href="index.php?page=logout"><i class="material-icons">exit_to_app</i></a> 
</div>

<?php


if (isset($_GET['event_id'], $_POST['body'])){
	
}


?>

<?php

if (isset($_GET['event_id']) === false || valid_eid($_GET['event_id']) === false){
	echo 'Invalid Event ID';
}else {
	$event = get_event($_GET['event_id']);
	
?><div class="container containercolor">
	<h2><?php echo $event['title']; ?></h2>
	<h4><?php echo $event['user']?> on <?php echo $event['date'];?> </h4>
	
	<hr />
	
	<p><?php echo $event['body'];?></p>
	<hr /></div>
	<?php
	
	
	?>
	
<?php
}
?>



</body>
</html>