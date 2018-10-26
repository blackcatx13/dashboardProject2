<?php
$user_info = fetch_user_profile();
if($user_info['priority'] == 0){
	header('HTTP/1.1 403 Forbidden');
	header('Location: index.php?page=home');
	
	die();
}
if (isset($_POST['title'], $_POST['body'])){
	if (add_news($_POST['title'], $_POST['body'])){
		header("Location: index.php?page=news_list");
	}else{
		echo 'Error';
	}
}

?>
<html>
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
<br>
<form action="" method="post">

	<div>
		<label for="title">Title</label>
		<input type="text" name="title" id="title" value ="<?php if(isset($_POST['title'])) echo htmlentities($_POST['title']);?>"/>
	</div>
	<div>
		<textarea name="body" rows="20" cols="110"><?php if (isset($_POST['body'])) echo htmlentities($_POST['body']);?></textarea>
	</div>
	<div>
		<input type="submit" value="submit">
	</div>
</form>

</body>
</html>