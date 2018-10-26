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

?>
<?php


if (isset($_GET['post_id'], $_POST['body'])){
	if (add_comment($_GET['post_id'], $_POST['body'])){
		
	}else{
		header("Location: index.php?page=blog_list");
	}
}


?>
<br>
<?php

if (isset($_GET['post_id']) === false || valid_pid($_GET['post_id']) === false){
	echo 'Invalid post ID';
}else {
	$post = get_post($_GET['post_id']);
	$user_info = fetch_user_profile_id($post['user']);
?>	<div class="container containercolor">
	<h2><?php echo $post['title']; ?></h2>
	<h4><?php echo $user_info['name']?> on <?php echo $post['date'];?> (<?php echo count($post['comments']);?>)</h4>
	
	<hr />
	
	<p><?php echo $post['body'];?></p>
	<hr /></div> <br> <br> <div class="container containercolor"><h2>Comments:</h2></div><br><br>
	<?php
	
	foreach ($post['comments'] as $comment){
		?><div class="container containercolor">
		<h4>By <?php $user_info = fetch_user_profile_id($comment['user']); echo $user_info['name'];?> on <?php echo $comment['date'];?></h4>
		<p><?php echo $comment['body']; ?></p>
		<hr /></div><br>
		<?php
	}
	
	
	?>
	<div class="container containercolor">
			<br>
			  <form class="form-horizontal" action="" method="post">
			   <div class="form-group">
			      <label class="control-label col-sm-2" for="body">Leave a comment:</label>
			      <div class="col-sm-10">
			        <textarea class="form-control" placeholder="Enter your message here" id="" name="body" rows="20" cols="110"><?php if (isset($_POST['body'])) echo htmlentities($_POST['body']);?></textarea>
			      </div>
			    </div>
				
			    <div class="form-group">        
			      <div class="col-sm-offset-2 col-sm-10">
			        <button type="submit" class="btn btn-default">Post > </button>
			      </div>
			    </div>
			  </form>
			</div>
			
			
<?php
}
?>

</div>
</body>
</html>