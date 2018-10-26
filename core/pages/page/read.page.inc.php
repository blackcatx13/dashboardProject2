<?php


if (isset($_GET['post_id'], $_POST['body'])){
	if (isset($_POST['body'])){
		add_comment($_GET['post_id'], $_POST['body']);
	}else{
		header("Location: index.php?page=forum");
	}
}


?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title>
    <link rel="stylesheet" href="nassets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700">
    <link rel="stylesheet" href="nassets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="nassets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="nassets/css/Article-Clean.css">
    <link rel="stylesheet" href="nassets/css/Article-Dual-Column.css">
    <link rel="stylesheet" href="nassets/css/Article-List.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="nassets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="nassets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/readstyles.css">
	
	<style>
	#hov i{
		padding:2px;
		font-size:26px;
		color:#ADD8E6;
	}
	#hov:hover i{
	color: #8aacb8;
	}
		/* width */
	::-webkit-scrollbar {
	    width: 10px;
	}

	/* Track */
	::-webkit-scrollbar-track {
	    box-shadow: inset 0 0 0 white; 
	    border-radius: 0px;
	}
	 
	/* Handle */
	::-webkit-scrollbar-thumb {
	    background: #ADD8E6; 
	    border-radius: 0px;
	}

	/* Handle on hover */
	::-webkit-scrollbar-thumb:hover {
	    background: #8aacb8 ; 
	}
	</style>
</head>

<body style="background-color:#fefefe;max-width:1200px;margin:0 auto;">
    <nav class="navbar navbar-light navbar-expand-md sticky-top bg-light navigation-clean-search">
        <div class="container"><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse float-right" id="navcol-1" style="max-height:60px;">
                <p class="navbar-text"><img src="core/pageimgs/clogo.jpg" style="max-width:50px;"></p>
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php?page=home">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php?page=inbox">Inbox</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php?page=inbox">Student Community</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php?page=inbox">Events &amp; News&nbsp;</a></li>
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
    <div class="article-clean">
	<?php

if (isset($_GET['post_id']) === false || valid_pid($_GET['post_id']) === false){
	echo 'Invalid post ID';
}else {
	$post = get_post($_GET['post_id']);
	$user_info = fetch_user_profile_id($post['user']);
?>	
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                    <div class="intro">
                        <h1 class="text-center"><?php echo $post['title']; ?></h1>
                        <p class="text-center"><span class="by">by</span> <a href="#"><?php echo $user_info['name'];?> | </a><span class="date"><?php echo $post['date'];?></span></p>
                    </div>
                    <div class="text">
                        <p><?php echo $post['body'];?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <h5 style="padding-left:20px;color:#555;">Comments (<?php echo count($post['comments']);?>)</h5>
    <div id="addcomment" style="margin-bottom:20px;"><form method="post"><input style="border-top:0;border-left:0;border-right:0;border-bottom:2px solid #ADD8E6; width:100%;" name="body" class="d-inline float-left" type="text" placeholder="Add a public comment..." style="width:1120px;"><button id="hov" class="btn btn-primary d-inline float-right" type="submit"><i class="material-icons" style="" >send</i></button></form></div><br>
	<?php
	
	foreach ($post['comments'] as $comment){
		?>
    <div id="comments">
        <p id="cbody"><br><?php echo $comment['body']; ?><br><br></p>
        <p id="cdetails" style="margin-top:-15px;"><?php $user_info = fetch_user_profile_id($comment['user']); echo $user_info['name'];?> on <?php echo $comment['date'];?></p>
        </div><?php
	}
	
	
	?>
	<?php
}
?>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
        <script src="assets/js/Simple-Slider1.js"></script>
</body>

</html>