<?php
$user_info = fetch_user_profile();
if($user_info['priority'] == 0){
	header('HTTP/1.1 403 Forbidden');
	header('Location: index.php?page=home');
	
	die();
}
if (isset($_POST['title'], $_POST['body'])){
	if (add_news($_POST['title'], $_POST['body'])){
		header("Location: index.php?page=eventsandnews");
	}else{
		echo 'Error';
	}
}

?>
<html>
<style>
body {
margin:0 auto;
}

</style>
</head>
<body style="background-color:#fefefe;max-width:1200px;">
    <nav class="navbar navbar-light navbar-expand-md sticky-top bg-light navigation-clean-search">
        <div class="container"><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse float-right" id="navcol-1" style="max-height:60px;">
                <p class="navbar-text"><img src="core/pageimgs/clogo.jpg" style="max-width:50px;"></p>
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php?page=home">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php?page=inbox">Inbox</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php?page=forum">Student Community</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="index.php?page=eventsandnews">Events &amp; News&nbsp;</a></li>
                </ul>
                <form class="form-inline ml-auto" target="_self">
                    <div class="form-group"><label for="search-field"><i class="fa fa-search"></i></label><input class="form-control float-right search-field" type="search" name="search" placeholder="Search the site" id="search-field"></div>
                </form>
                <ul class="nav navbar-nav">
                    <li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Me&nbsp;</a>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="index.php?page=edit">Edit Profile</a><a class="dropdown-item" role="presentation" href="index.php?page=logout">Logout</a></div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<form action="" method="post" style="margin-top:20px;">
	<div class="row">
		<div class="col-2">
			<label for="title">Title:</label>
		</div>
		<div class="col-10">
			<input class="form-control" type="text" name="title" id="title" value ="<?php if(isset($_POST['title'])) echo htmlentities($_POST['title']);?>"/>
		</div>
	</div><br>
	<div class="row">
		<div class="col-12">
			<textarea class="form-control" name="body" rows="20" cols="110"><?php if (isset($_POST['body'])) echo htmlentities($_POST['body']);?></textarea>
		</div></div><br>
		<div>
			<input class="btn btn-primary" type="submit" value="submit">
		</div>
</form>

</body>
</html>