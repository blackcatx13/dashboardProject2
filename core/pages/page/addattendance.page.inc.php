<?php
$user_info = fetch_user_profile();
if($user_info['priority'] == 0){
	header('HTTP/1.1 403 Forbidden');
	header('Location: index.php?page=home');
	
	die();
}
$c = 0;
if (isset($_POST['froll'])){
	$croll = $_POST['froll'];
	if (isset($_POST['sem'])){
		if (isset($_POST['prg'])){
			$usrdata = add_subjects($_POST['sem'],$_POST['prg'], $_POST['froll']);
			$c = 1;
			$usrid = $usrdata[7];
			$usrn = $usrdata[0];
			$sub1 = $usrdata[1];
			$sub2 = $usrdata[2];
			$sub3 = $usrdata[3];
			$sub4 = $usrdata[4];
			$sub5 = $usrdata[5];
			$sub6 = $usrdata[6];
		}
	}
}
if (isset ($_POST['a1'], $_POST['a2'], $_POST['a3'], $_POST['a4'], $_POST['a5'], $_POST['a6'])){
	add_attendance($_POST['a1'], $_POST['a2'], $_POST['a3'], $_POST['a4'], $_POST['a5'], $_POST['a6'], $_POST['ffroll']);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
    <link rel="stylesheet" href="aassets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700">
    <link rel="stylesheet" href="aassets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="aassets/css/Article-Clean.css">
    <link rel="stylesheet" href="aassets/css/Article-Dual-Column.css">
    <link rel="stylesheet" href="aassets/css/Article-List.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="aassets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="aassets/css/Simple-Slider.css">
    <link rel="stylesheet" href="aassets/css/styles.css">
	<style>
	body{
		margin: 0 auto;
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
    <div>
        <h3>Select Student And Course&nbsp;</h3>
				<div class="row">
				<div class="col-4">
				<form action="" id="attd" method="post">
				  College ID:<input style="margin:5px;border-top:0;border-left:0;border-right:0;border-bottom:2px solid #ADD8E6; width:90%;" type="text" name="froll" value ="<?php if(isset($_POST['froll'])) echo htmlentities($_POST['froll']);?>">
				  <input class="btn btn-primary" type="submit" value="Get Student &gt;">
				</form>
				</div>
				<div class="col-4">
				Course:
				<select style="margin:5px;border-top:0;border-left:0;border-right:0;border-bottom:2px solid #ADD8E6; width:90%;" name="prg" form="attd">
				  <option value="BCA">BCA</option>
				  <option value="BBA">BBA</option>
				  <option value="BBM">BBM</option>
				</select>
				</div>
				<div class="col-4">
				Semester:
				<select style="margin:5px;border-top:0;border-left:0;border-right:0;border-bottom:2px solid #ADD8E6; width:90%;" name="sem" form="attd">
				  <option value="1">I</option>
				  <option value="2">II</option>
				  <option value="3">III</option>
				  <option value="4">IV</option>
				  <option value="5">V</option>
				  <option value="6">VI</option>
				  
				</select>
				</div>
				</div>
    </div>
    <hr>
    <h3>Enter Attendance:</h3>
	<h4><?php if ($c == 1){echo $usrdata[0];} ?></h4>
    <div style="">
	<form action="" method="post">

        <div class="row">
            <div class="col-2">
                <div class="row"><?php if ($c == 1){echo $sub1;}else{echo 'Subject 1';} ?></div>
                <div class="row"><p style="font-family: 'Quicksand', sans-serif;"><input style="border-top:0;border-left:0;border-right:0;border-bottom:2px solid #ADD8E6; width:80%;" type="text" name="a1" required></p></div>
            </div>
            <div class="col-2">
                <div class="row"><?php if ($c == 1){echo $sub2;}else{echo 'Subject 2';} ?></div>
                <div class="row"><p style="font-family: 'Quicksand', sans-serif;"><input style="border-top:0;border-left:0;border-right:0;border-bottom:2px solid #ADD8E6; width:80%;" type="text" name="a2" required></p></div>
            </div>
            <div class="col-2">
                <div class="row"><?php if ($c == 1){echo $sub3;}else{echo 'Subject 3';} ?></div>
                <div class="row"><p style="font-family: 'Quicksand', sans-serif;"><input style="border-top:0;border-left:0;border-right:0;border-bottom:2px solid #ADD8E6; width:80%;"type="text" name="a3" required></p></div>
            </div>
            <div class="col-2">
                <div class="row"><?php if ($c == 1){echo $sub4;}else{echo 'Subject 4';} ?></div>
                <div class="row"><p style="font-family: 'Quicksand', sans-serif;"><input style="border-top:0;border-left:0;border-right:0;border-bottom:2px solid #ADD8E6; width:80%;" type="text" name="a4" required></p></div>
            </div>
            <div class="col-2">
                <div class="row"><?php if ($c == 1){echo $sub5;}else{echo 'Subject 5';} ?></div>
                <div class="row"><p style="font-family: 'Quicksand', sans-serif;"><input style="border-top:0;border-left:0;border-right:0;border-bottom:2px solid #ADD8E6; width:80%;" type="text" name="a5" required></p></div>
            </div>
            <div class="col-2">
                <div class="row"><?php if ($c == 1){echo $sub6;}else{echo 'Subject 6';} ?></div>
                <div class="row"><p style="font-family: 'Quicksand', sans-serif;"><input style="border-top:0;border-left:0;border-right:0;border-bottom:2px solid #ADD8E6; width:80%;" type="text" name="a6" required></p></div>
            </div>
        </div><label style="margin:5px;">Confirm Student ID:&nbsp;</label><input name="ffroll" style="border-top:0;border-left:0;border-right:0;border-bottom:2px solid #ADD8E6; width:20%;" type="text" style="margin:5px;" value="<?php if($c == 1){echo $croll;} ?>" ><input class="btn btn-primary" type="submit" value="Add Attendance &gt;" /></form></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/Simple-Slider1.js"></script>
</body>

</html>