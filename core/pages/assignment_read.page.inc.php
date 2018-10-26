<html>

<head>
<style>
body {
margin:10px 10px;
background-color: #555;
color:#fff;
font-family: 'Quicksand', sans-serif;
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
.posttitle a{
	color:#fcd900;
}
.posttitle a:hover{
	color:#fff;
}

</style>
</head>
<body>
<div class="container contaianercolor posttitle"><a href="index.php?page=assignment_list"><i class="material-icons">arrow_back</i></a></div>
<?php

if (isset($_GET['assignment_id']) === false || valid_aid($_GET['assignment_id']) === false){
	echo 'Invalid post ID';
}else {
	$assignment = get_assignment($_GET['assignment_id']);
	$user_info = fetch_user_profile_id($assignment['user']);
	
?>


	<h2><?php echo $assignment['title']; ?></h2>
	<h4>by <?php echo $user_info['name']?> on <?php echo $assignment['date'];?></h4>
	
	<hr />
	
	<p><?php echo $assignment['body'];?></p>

<?php
}
?>
	
</body>
</html>