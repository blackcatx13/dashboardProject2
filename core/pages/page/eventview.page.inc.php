<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eventsandnews1 (copy)</title>
    <link rel="stylesheet" href="eassets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700">
    <link rel="stylesheet" href="eassets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="eassets/css/Article-Dual-Column.css">
    <link rel="stylesheet" href="eassets/css/Article-List.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="eassets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="eassets/css/Simple-Slider.css">
    <link rel="stylesheet" href="eassets/css/styles.css">
</head>

<body style="background-color:#fefefe;">
    <nav class="navbar navbar-light navbar-expand-md sticky-top bg-light navigation-clean-search">
        <div class="container"><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse float-right" id="navcol-1" style="max-height:60px;">
                <p class="navbar-text"><img src="core/pageimgs/clogo.jpg" style="max-width:50px;"></p>
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php?page=home">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php?page=inbox">Inbox</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php?page=forum">Student Community</a></li>
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
	<?php


	if (isset($_GET['event_id'], $_POST['body'])){
		
	}


	?>
	<?php

	if (isset($_GET['event_id']) === false || valid_eid($_GET['event_id']) === false){
		echo 'Invalid Event ID';
	}else {
		$event = get_event($_GET['event_id']);
		$user_info = fetch_user_profile_id($event['user']);
	?>
    <div class="article-dual-column">
        <div class="container">
            <div class="row" style="width:1200px;">
                <div class="col-md-10 offset-md-1">
                    <div class="intro">
                        <h1 class="text-center"><?php echo $event['title']; ?></h1>
                        <p class="text-center"><span class="by">by</span> <a href=""><?php echo $user_info['name']; ?> | </a><span class="date"> on <?php echo $event['date'];?> </span></p><img class="img-fluid" src="<?php if(1 > 0 ){$pth = "core/events/.".$event['imgn'].".jpg";} echo $pth;?>" style="width:900px;"></div><br>
                </div>
            </div>
            <div class="row" style="margin-bottom:40px;">
                <div class="col-md-10 col-lg-3 offset-md-1">
                    <div class="toc">
                        <p>Event Details</p>
                        <ul>
                            <li>Venue: <a href="#"><?php echo $event['ven']; ?> </a> </li>
                            <li>When: <a href="#"><?php echo $event['ed']; ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-10 col-lg-7 offset-md-1 offset-lg-0">
                    <div class="text">
                        <p><?php echo $event['body'];?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php } ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/Simple-Slider1.js"></script>
</body>

</html>