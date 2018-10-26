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

<?php 

if (isset($_POST['prg'],$_POST['title'], $_POST['body'])){
	$for = $_POST['prg'];
	if (add_assignment($_POST['title'], $_POST['body'], $for)){
		header("Location: index.php?page=home");
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
	
	<style>
	#scroll{
	overflow: scroll;
	height:70%;
	overflow-x: hidden;
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
	#hov i{
		padding:2px;
		font-size:26px;
		color:#ADD8E6;
	}
	#hov:hover i{
	color: #8aacb8;
	}
	
	</style>
</head>

<body style="background-color:#fefefe;"><?php $user_info = fetch_user_profile(); ?>
    <nav class="navbar navbar-light navbar-expand-md sticky-top bg-light navigation-clean-search">
        <div class="container"><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse float-right" id="navcol-1" style="max-height:60px;">
                <p class="navbar-text"><img src="core/pageimgs/clogo.jpg" style="max-width:50px;"></p>
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="#">Home</a></li>
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
    <div id="promo">
        <div class="jumbotron">
            <h1>Welcome!</h1>
            <p>Your dashboard is personalized to you so you can access only relevant data. You can use it to send messages, look up your attendance or events happening and much more.</p>
            <p><a class="btn btn-primary" role="button" href="#">Learn more</a></p>
        </div>
    </div>
    <div class="container" style="margin-top:0px;margin-bottom:12px;">
        <div class="row" style="margin-top:28px;">
            <div class="col-3"><img src="<?php if(1 > 0 ){$pth = "core/user_avatars/.{$_SESSION['user_id']}.jpg";} $uid = $_SESSION['user_id']; echo $pth;?>" style="width:264px;height:225px;margin-left:-13px;"></div>
            <div class="col-4" style="background-color:#ffffff;margin-right:0px;margin-left:-14px;"><i class="material-icons float-right" style="color:rgb(4,143,231);">person</i>
                <p>Rishab Nanwani</p>
                <p class="text-left" style="margin-bottom:6px;margin-top:-23px;">#<?php echo $user_info['collegeID'];?></p>
                <p class="text-left" style="margin-top:-11px;"><em><?php if($user_info['program'] == 1){echo 'Bach In Computer Applications';} else if ($user_info['program'] == 2){echo 'Bach in Buisness Admin';} else{ echo 'Bach in buisness management';}?></em></p>
                <hr>
                <p><?php echo $user_info['email'];?></p>
                <p style="margin-top:-20px;">+91 <?php echo $user_info['phno'];?></p>
                <p style="margin-top:-20px;"><?php echo $user_info['address'];?><br></p>
            </div>
            <div class="col" style="background-color:#ffffff;">
                <p>Emergency Contact Details<i class="material-icons float-right" style="padding-left:4px;color:rgb(4,143,231);">person_add</i></p>
                <p><?php echo $user_info['ename'];?></p>
                <p><?php echo $user_info['eemail'];?></p>
                <p>+91 <?php echo $user_info['ephno'];?></p>
                <p><?php echo $user_info['eaddress'];?><br></p>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top:20px;margin-bottom:20px;">
        <div class="row">
			<?php if($user_info['priority'] == 0) { ?>
            <div class="col-3" style="background-color:#ffffff;">
                <h1 style="font-size:36px;font-family:'Alegreya Sans', sans-serif;color:rgb(4,143,231);">Attendance</h1>
				<?php  $subat = get_attd_home(); ?> 
                <p><?php echo $subat[0]['s1']; ?></p>
                <div class="progress"><?php if($subat[0]['a1'] > 60 ){ $c = 'bg-success';} else if($subat[0]['a1'] > 40){$c = 'bg-warning';} else {$c = 'bg-danger';} ?>
                    <div class="progress-bar <?php echo $c; ?>" aria-valuenow="<?php echo $subat[0]['a1']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $subat[0]['a1']; ?>%;"><?php echo $subat[0]['a1']; ?>%</div>
                </div>
                <p><?php echo $subat[0]['s2']; ?></p>
                <div class="progress"><?php if($subat[0]['a2'] > 60 ){ $c = 'bg-success';} else if($subat[0]['a2'] > 40){$c = 'bg-warning';} else {$c = 'bg-danger';} ?>
                    <div class="progress-bar <?php echo $c; ?>" aria-valuenow="<?php echo $subat[0]['a2']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $subat[0]['a2']; ?>%;"><?php echo $subat[0]['a2']; ?>%</div>
                </div>
                <p><?php echo $subat[0]['s3']; ?></p>
                <div class="progress"><?php if($subat[0]['a3'] > 60 ){ $c = 'bg-success';} else if($subat[0]['a3'] > 40){$c = 'bg-warning';} else {$c = 'bg-danger';} ?>
                    <div class="progress-bar <?php echo $c; ?>" aria-valuenow="<?php echo $subat[0]['a3']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $subat[0]['a3']; ?>%;"><?php echo $subat[0]['a3']; ?>%</div>
                </div>
                <p><?php echo $subat[0]['s4']; ?></p>
                <div class="progress"><?php if($subat[0]['a4'] > 60 ){ $c = 'bg-success';} else if($subat[0]['a4'] > 40){$c = 'bg-warning';} else {$c = 'bg-danger';} ?>
                    <div class="progress-bar <?php echo $c; ?>" aria-valuenow="<?php echo $subat[0]['a4']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $subat[0]['a4']; ?>%;"><?php echo $subat[0]['a4']; ?>%</div>
                </div>
                <p><?php echo $subat[0]['s5']; ?></p>
                <div class="progress"><?php if($subat[0]['a5'] > 60 ){ $c = 'bg-success';} else if($subat[0]['a5'] > 40){$c = 'bg-warning';} else {$c = 'bg-danger';} ?>
                    <div class="progress-bar <?php echo $c; ?>" aria-valuenow="<?php echo $subat[0]['a5']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $subat[0]['a5']; ?>%;"><?php echo $subat[0]['a5']; ?>%</div>
                </div>
                <p><?php echo $subat[0]['s6']; ?></p>
                <div class="progress" style="margin-bottom:10px;"><?php if($subat[0]['a6'] > 60 ){ $c = 'bg-success';} else if($subat[0]['a6'] > 40){$c = 'bg-warning';} else {$c = 'bg-danger';} ?>
                    <div class="progress-bar <?php echo $c; ?>" aria-valuenow="<?php echo $subat[0]['a6']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $subat[0]['a6']; ?>%;"><?php echo $subat[0]['a6']; ?>%</div>
               </div>
			   </div>
			   <?php } else { ?>
			   	<div class="col-3" style="background-color:#ffffff;">
                <h1 style="font-size:36px;font-family:'Alegreya Sans', sans-serif;color:rgb(4,143,231);">Attendance</h1><hr/><br>
				<p> Add and manage attendance for all students</p>
				<a href="index.php?page=addattendance">Attendance</a>
				</div>
            
			   <?php } ?>
            <div id="scroll" class="col" style="background-color:#ffffff;margin-left:6px;">
                <h1 style="font-size:36px;font-family:'Alegreya Sans', sans-serif;color:rgb(4,143,231);">Assignments <?php if($user_info['priority'] == 1) { ?><button style="color:#8aacb8;" type="button" class="btn btn-light float-right" data-toggle="modal" data-target="#modalbox"><i class="material-icons float-right" style="background-size:auto;font-size:39px;color:rgb(4,143,231);margin-top:3px;">library_add</i></button> <?php } ?> </h1>
                <?php
						$assignments = get_assignments();
						foreach ($assignments as $assignment){
							?><div class="assignments" style="margin-top:5px;margin-bottom:5px;">
                    <div class="row">
                        <div class="col-8">
                            <h3><?php echo $assignment['title']; ?></h3>
                        </div>
                        <div class="col">
                            <p><?php echo $assignment['date'];?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p><?php echo $assignment['preview'];?></p>
                        </div>
                    </div><a class="btn btn-link btn-lg d-inline" role="button" href="index.php?page=assignmentview&amp;assignment_id=<?php echo $assignment['id']; ?>" target="_blank">Read More</a><hr /></div><?php
						}

						?>
            </div>
        </div>
    </div>
	
	
	
	<div class="modal fade" role="dialog" tabindex="-1" id="modalbox">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                
				<br>
				<div class="container">
				  <form class="form-horizontal" action="" id="assg" method="post">
				    <div class="form-group">
				      <label class="control-label col-sm-3" for="title">Title:</label>
				      <div class="col-sm-12">
				        <input style="width:100%;border-radius:0;" class="form-control" placeholder="Enter the title" type="text" name="title" id="title" value ="<?php if(isset($_POST['title'])) echo htmlentities($_POST['title']);?>" />
				      </div>
				    </div>
				    <div class="form-group">
				      <label class="control-label col-sm-3" for="body">Body:</label>
				      <div class="col-sm-12">
				        <textarea style="width:100%;border-radius:0;" class="form-control" placeholder="Enter your message here" id="" name="body" rows="20" cols="110"><?php if (isset($_POST['body'])) echo htmlentities($_POST['body']);?></textarea>
				      </div>
				    </div>
					<div class="form-group">
					<label for="prg"> Select a course this assignment belongs to:</label>
				</div>
				<select class="form-control" name="prg" form="assg" id="prg" style="width:100%;border-radius:0;">
				  <option value="1">BCA</option>
				  <option value="2">BBA</option>
				  <option value="3">BBM</option>
				  
				</select>
					
				    <div class="form-group">        
				      <div class="col-sm-offset-2 col-sm-10">
				        <button type="submit" class="btn btn-default">Post > </button>
				      </div>
				    </div>
				  </form>
				</div>
				
				
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