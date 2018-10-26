<?php $user_info = fetch_user_profile(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events & News</title>
    <link rel="stylesheet" href="enassets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700">
    <link rel="stylesheet" href="enassets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="enassets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="enassets/css/Simple-Slider.css">
    <link rel="stylesheet" href="enassets/css/styles.css">
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
	#hov {
		color:#ADD8E6;
		text-decoration:none;
	}
	#hov:hover {
	color: #8aacb8;
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
    <div id="main">
        <div>
            <ul class="nav nav-pills nav-justified" style="max-width:500px;margin-bottom:20px;">
                <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="pill" href="#tab-1">Events</a></li>
                <li class="nav-item"><a class="nav-link" role="tab" data-toggle="pill" href="#tab-2">News</a></li>
            </ul>
            <div class="tab-content">
                <div style="margin-left:165px;" class="tab-pane fade show active" role="tabpanel" id="tab-1">
                    <?php if($user_info['priority'] != 0) { ?><p style="text-align:center;margin-top:10px;">Add upcoming events to this list. <a id="hov" href="index.php?page=events_post">Add</a> </p> <?php } ?>
					<div class="row">
					<?php

					$events = get_events();

					foreach ($events as $event){
					?>
                    <div id="tpanemain" style="margin:2px 2px 2px 2px;">
                        <div class="col-4"  ><img src="<?php if(1 > 0 ){$pth = "core/events/.".$event['imgn'].".jpg";} echo $pth;?>" width="300px" height="300px" style="margin-left:-13px;">
                            <p style="width:300px"><?php echo $event['title']; ?> | <button class="btn btn-primary" type="button"><a href="index.php?page=eventview&amp;event_id=<?php echo $event['id']; ?>">Read More</a></button></p></div>
                    </div> <?php } ?> </div>
                </div>
                <div class="tab-pane fade" role="tabpanel" id="tab-2">
                    <div id="newspromo" style="background-image:url(core/pageimgs/newspromo.jpg); background-size:cover;">
                        <div class="jumbotron" >
                            <h1>News feed</h1>
                            <p>Stay updated with the latest news and notices in and around college!</p>
                            <p><a class="btn btn-primary" role="button" href="#"><i class="material-icons">keyboard_arrow_down</i></a></p>
                        </div>
                    </div>
                        <?php if($user_info['priority'] != 0) { ?><p style="text-align:center;margin-top:10px;">Add upcoming notices to this list. <a id="hov" href="index.php?page=news_post">Add</a> </p> <?php } ?>

					<?php
					$newss = get_newss();
					foreach ($newss as $news){
					?>
                    <div class="row">
                        <div class="col">
                            <h1><?php echo $news['title']; ?></h1>
                            <p><?php echo $news['preview'];?></p><button class="btn btn-primary" type="button"><a href="index.php?page=newsview&amp;news_id=<?php echo $news['id']; ?>">Read More</a></button></div>
							<hr />
                    </div><?php } ?>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/Simple-Slider1.js"></script>
</body>

</html>