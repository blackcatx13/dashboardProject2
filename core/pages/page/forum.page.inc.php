<?php

if (isset($_POST['title'], $_POST['body'])){
	if (add_post($_POST['title'], $_POST['body'])){
		header("Location: index.php?page=forum");
	}else{
		echo 'Error';
	}
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Community</title>
    <link rel="stylesheet" href="fassets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700">
    <link rel="stylesheet" href="fassets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="fassets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="fassets/css/Simple-Slider.css">
    <link rel="stylesheet" href="fassets/css/styles.css">
	<style>
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

<body style="background-color:#fefefe;">
    <nav class="navbar navbar-light navbar-expand-md sticky-top bg-light navigation-clean-search">
        <div class="container"><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse float-right" id="navcol-1" style="max-height:60px;">
                <p class="navbar-text"><img src="core/pageimgs/clogo.jpg" style="max-width:50px;"></p>
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php?page=home">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php?page=inbox">Inbox</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link  active" href="inbox.php?page=forum">Student Community</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php?page=eventsandnews">Events &amp; News&nbsp;</a></li>
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
    <div data-bs-parallax-bg="true" style="height:350px;background-image:url(core/pageimgs/forumpromo1.jpg); background-size:cover;background-position:center;width:1200px;margin:0 auto;">
        <div id="parallaxdata">
            <h1 style="font-family:'Alegreya Sans', sans-serif;color:rgb(255,255,255);">Got something on your mind?</h1>
            <p style="margin-top:-34px;"><br><strong><em>“Question everything. Every stripe, every star, every word spoken. Everything.”</em>&nbsp;– Ernest Gaines</strong><br><br></p><div><button style="color:#fff;" type="button" class="btn btn-dark" data-toggle="modal" data-target="#modalbox">Post</button></div>
            <div class="modal fade" role="dialog" tabindex="-1" id="modalbox"
                style="width:700px;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
					<form method="post">
                        <div class="modal-header">
						
                            <h3 class="modal-title" style="color:rgb(245,245,245);"></h3>
                            <h1 style="color:rgb(62,58,58);height:35px;">Create a post</h1><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        <div class="modal-body"><input name="title" class="form-control-sm d-block" type="text" placeholder="Enter Title" style="width:450px;margin-bottom:10px;"><textarea name="body" class="form-control-sm d-block" wrap="hard" spellcheck="true" placeholder="Type in your body ..." style="margin-top:10px;width:450px;height:400px;"></textarea></div>
                        <div
                            class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary" type="submit">Post &gt;</button></div></form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div id="main" style="margin-top: 20px;" >
	<?php $posts = get_posts();
	foreach ($posts as $post){
		?><div id="fposts">
            <div class="container" style="margin-top:10px;margin-bottom:10px;">
                <div class="row">
                    <div class="col">
                        <h3><?php echo $post['title']; ?></h3>
                        <p><?php echo $post['preview'];?></p><a href="index.php?page=read&amp;post_id=<?php echo $post['id']; ?>">Read More</a>
						</div>
                </div>
            </div> <hr />
        </div><?php }?>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/modalboxj.js"></script>
    <script src="assets/js/Simple-Slider1.js"></script>
	


</body>

</html>