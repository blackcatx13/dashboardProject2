<?php
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<?php 
  
  if (isset($_POST['uphno'], $_POST['uemail'], $_POST['address'], $_POST['ename'], $_POST['ephno'], $_POST['eemail'], $_POST['eaddress'])){
  	$errors = array();
	
	if (filter_var($_POST['uemail'], FILTER_VALIDATE_EMAIL) === false){
		$errors[] = 'The user email address you entered is not valid';
	}
	if (filter_var($_POST['eemail'], FILTER_VALIDATE_EMAIL) === false){
		$errors[] = 'The emergency email address you entered is not valid';
	}
	if (preg_match('#^[0-9]+$#', $_POST['uphno'] === 0)){
		$errors[] = 'User Phone Number invalid';
	}
	if (preg_match('#^[0-9]+$#i', $_POST['ephno'] === 0)){
		$errors[] = 'Emergency Phone Number invalid';
	}
	
	if (empty($errors)){
		set_user_profile($_POST['uphno'], $_POST['uemail'], $_POST['address'], $_POST['ename'], $_POST['ephno'], $_POST['eemail'], $_POST['eaddress']);
	}
	if (isset($_POST['password'])){
		set_user_password($_POST['password']);
	}
  }
  
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="background-color:#fefefe;">
<?php 
$user_info = fetch_user_profile();
?>
    <nav class="navbar navbar-light navbar-expand-md sticky-top bg-light navigation-clean-search">
        <div class="container"><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse float-right" id="navcol-1" style="max-height:60px;">
                <p class="navbar-text"><img src="assets/img/925814251s (2).jpg" style="max-width:50px;"></p>
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#">Inbox</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#">Student Community</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#">Events &amp; News&nbsp;</a></li>
                </ul>
                <form class="form-inline ml-auto" target="_self">
                    <div class="form-group"><label for="search-field"><i class="fa fa-search"></i></label><input class="form-control float-right search-field" type="search" name="search" placeholder="Search the site" id="search-field"></div>
                </form>
                <ul class="nav navbar-nav">
                    <li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Me&nbsp;</a>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">First Item</a><a class="dropdown-item" role="presentation" href="#">Second Item</a><a class="dropdown-item" role="presentation" href="#">Third Item</a></div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="simple-slider" style="max-width:1140px;margin:auto;">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image:url(&quot;assets/img/concert-planning-checklist-hero.jpg&quot;);background-size:cover;width:auto;"></div>
                <div class="swiper-slide" style="background-image:url(&quot;assets/img/codefestival_3-brussel_original.png&quot;);"></div>
                <div class="swiper-slide" style="background-image:url(https://placeholdit.imgix.net/~text?txtsize=68&amp;txt=Slideshow+Image&amp;w=1920&amp;h=500);"></div>
            </div>
            <div class="swiper-pagination"></div>
            <div data-bs-hover-animate="flash" class="swiper-button-prev"></div>
            <div data-bs-hover-animate="flash" class="swiper-button-next"></div>
        </div>
    </div>
    <div class="container" style="margin-top:0px;margin-bottom:12px;">
        <div class="row" style="margin-top:28px;">
            <div class="col-3"><img src="assets/img/Screenshot_20180417-164841 (2).png" style="max-width:264px;max-height:225px;margin-left:-13px;"></div>
            <div class="col-4" style="background-color:#ffffff;margin-right:0px;margin-left:-14px;"><i class="material-icons float-right" style="color:rgb(4,143,231);">person</i>
                <p><?php echo $user_info['name'];?></p>
                <p class="text-left" style="margin-bottom:6px;margin-top:-23px;">#30423</p>
                <p class="text-left" style="margin-top:-11px;"><em>Bach in Computer Applications</em></p>
                <hr>
                <p>rishabnanwani@gmail.com</p>
                <p style="margin-top:-20px;">+91 9730640732</p>
                <p style="margin-top:-20px;">E8 ExampleBlock ExampleCityName - EX4MP13<br></p>
            </div>
            <div class="col" style="background-color:#ffffff;">
                <p>Emergency Contact Details<i class="material-icons float-right" style="padding-left:4px;color:rgb(4,143,231);">person_add</i></p>
                <p>Emergency Name</p>
                <p>emergencyemail@gmail.com</p>
                <p>+91 8668989059</p>
                <p>E8 ExampleBlock ExampleCityName - EX4MP13<br></p>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top:20px;margin-bottom:20px;">
        <div class="row">
            <div class="col-3" style="background-color:#ffffff;">
                <h1 style="font-size:36px;font-family:'Alegreya Sans', sans-serif;color:rgb(4,143,231);">Attendance</h1><?php  $subat = get_attd_home(); ?>
                <p><?php echo $subat[0]['s1']; ?></p>
                <div class="progress">
                    <div class="progress-bar bg-success" aria-valuenow="<?php.$subat[0]['a1'].?>" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"><?php echo $subat[0]['a1']; ?></div>
                </div>
                <p>Paragraph</p>
                <div class="progress">
                    <div class="progress-bar bg-danger" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50%</div>
                </div>
                <p>Paragraph</p>
                <div class="progress">
                    <div class="progress-bar bg-warning" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50%</div>
                </div>
                <p>Paragraph</p>
                <div class="progress">
                    <div class="progress-bar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50%</div>
                </div>
                <p>Paragraph</p>
                <div class="progress">
                    <div class="progress-bar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50%</div>
                </div>
                <p>Paragraph</p>
                <div class="progress" style="margin-bottom:10px;">
                    <div class="progress-bar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50%</div>
                </div>
            </div>
            <div class="col" style="background-color:#ffffff;margin-left:6px;">
                <h1 style="font-size:36px;font-family:'Alegreya Sans', sans-serif;color:rgb(4,143,231);">Assignments<i class="material-icons float-right" data-bs-hover-animate="pulse" style="background-size:auto;font-size:39px;color:rgb(4,143,231);margin-top:3px;">add_circle_outline</i></h1>
                <div class="assignments" style="margin-top:5px;margin-bottom:5px;">
                    <div class="row">
                        <div class="col-8">
                            <h3>Heading</h3>
                        </div>
                        <div class="col">
                            <p>Paragraph</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>Paragraph</p>
                        </div>
                    </div><a class="btn btn-link btn-lg d-inline" role="button" href="#" target="_blank">Read More</a></div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/Simple-Slider1.js"></script>
</body>

</html>