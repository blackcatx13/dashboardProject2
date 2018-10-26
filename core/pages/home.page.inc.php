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
<html>
<head>
	<title>Dashboard | Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	      rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Bree+Serif|Exo+2|Poiret+One|Righteous" rel="stylesheet">
	<link rel="icon" href= "ic_dashboard_white_24dp/web/ic_dashboard_white_24dp_2x.png">
	<link rel="stylesheet" href="ext/css/bootstrap.min.css">
	<script src="ext/js/bootstrap.min.js"></script>
	
<style>
body {
    margin: 0 auto;
    width:100%;
    padding: 0 20px;
	font-family: 'Bree Serif', serif;
	font-size:;
	background-color: #343a40;
	color: #fff;
}

a{
	color:#fff;
}
.navbar {
  overflow: hidden;
  background-color: #f20d0d;
  position: fixed;
  top: 0;
  width: 100%;
  transition: 0.5s;
}


nav {
  position: fixed;
  z-index: 100;
  left: 0;
  width: 100%;
}

.hamburgercontainer {
  width: 1170px;
  margin: auto;
  padding: 20px;
}

#hamburger-icon {
  cursor: pointer;
  width: 26px;
  height: 18px;
  position: relative;
  display: block;
}
#hamburger-icon .line {
  display: block;
  background: #fff;
  width: 26px;
  height: 2px;
  position: absolute;
  left: 0;
  -webkit-transition: all 0.4s;
  transition: all 0.4s;
}
#hamburger-icon .line.line-1 {
  top: 0;
  width: 36px;
}
#hamburger-icon .line.line-2 {
  top: 50%;
}
#hamburger-icon .line.line-3 {
  top: 100%;
}
#hamburger-icon:hover .line-1, #hamburger-icon:focus .line-1 {
  -webkit-transform: translateY(-1px);
          transform: translateY(-1px);
}
#hamburger-icon:hover .line-3, #hamburger-icon:focus .line-3 {
  -webkit-transform: translateY(1px);
          transform: translateY(1px);
}
#hamburger-icon.active .line-1 {
  -webkit-transform: translateY(9px) translateX(0) rotate(45deg);
          transform: translateY(9px) translateX(0) rotate(45deg);
  width: 26px;
}
#hamburger-icon.active .line-2 {
  opacity: 0;
}
#hamburger-icon.active .line-3 {
  -webkit-transform: translateY(-9px) translateX(0) rotate(-45deg);
          transform: translateY(-9px) translateX(0) rotate(-45deg);
}


.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #c63939;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #fff;
    display: block;
    transition: 0.3s; 
	transition: font-size 0.8s;
    -webkit-transition: width 2s;
}

.sidenav a:hover {
    color: #fcd900;
	font-size: 28px;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

#main {
    transition: margin-left .5s;
    padding: 16px;
   /* margin-top: 5%; */
	margin: 5% 5%;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

.containercolor{
	background-color:#555;
	height:775px;
}

.scroll{
	height: 620px;
	width:100%;
	margin:0;
	padding:0;
	overflow: scroll;
}
.ff{
	width:100%;
	height:580px;
	boder-style:none;
	margin-top:20px;
}
.fff{
	width:100%;
	height:550px;
	boder-style:none;
	margin-top:20px;
}

.nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus {
    color:black;
    background-color:#fcd900;
	
    }
</style>
</head>
<body>
	<nav class="navbar" id="navbarid">
	  <div class="hamburgercontainer" onclick="hamburger">
	    <div id="hamburger-icon" >
	      <div class="line line-1"></div>
	      <div class="line line-2"></div>
	      <div class="line line-3"></div>
	    </div>
	  </div>
	  <i class="material-icons">search</i>
	  <i class="material-icons">account_circle</i>
	</nav>
	
	<div id="mySidenav" class="sidenav">	
		<a href="">Home</a>
		<a href="index.php?page=inbox">Inbox</a>
		<a href="index.php?page=blog_list">Student Community</a>
		<a href="index.php?page=events_news">Events + News</a>
		<a href="index.php?page=logout" style=""> Logout</a>
	</div>
		
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.getElementById("navbarid").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "";
    document.getElementById("navbarid").style.marginLeft = "0";
}

var hamburger = document.getElementById("hamburger-icon");

hamburger.onclick = function() {
  if(hamburger.classList.toggle("active")){
  openNav();
  }else{
  closeNav();
  }
};

</script>

<?php 
$user_info = fetch_user_profile();
?>
<div id="main">
	<div class="row .row-eq-height">
		<div class="col-md-3 container containercolor text-center">
			<br>
			<p class="text-center"><img class="img-circle " src="<?php if(1 > 0 ){$pth = "core/user_avatars/.{$_SESSION['user_id']}.jpg";} $uid = $_SESSION['user_id']; echo $pth;?>" alt = "avatar" style="width:240px; height:240px"></p>
			<br> 
			<h2><?php echo $user_info['name'];?>  <?php if ($user_info['priority'] == 0){?><sup style="font-size:20px;color:#fcd900;">#<?php echo $user_info['collegeID'];?></sup><?php } ?> </h2>
			
			<p>Program : <i><?php if($user_info['program'] == 1){echo 'Bach In Computer Applications';} else if ($user_info['program'] == 2){echo 'Bach in Buisness Admin';} else{ echo 'Bach in buisness management';}?></i></p>
			<hr/>
			<p><?php echo $user_info['gender'];?></p>
			<p><?php echo $user_info['address'];?></p>
			<p><?php echo $user_info['phno'];?></p>
			<p><?php echo $user_info['email'];?></p>
			<hr />
			<h3> emergency contact:</h3>
			<p><?php echo $user_info['ename'];?></p>
			<p><?php echo $user_info['eemail'];?></p>
			<p><?php echo $user_info['eaddress'];?></p>
			<p><?php echo $user_info['ephno'];?></p>
	
		</div>
		
		<div class="col-md-8">
			<div class="container containercolor">
				
				
				
  <h2 class="text-center">Keep updated about your assignments and Attendance!</h2>
	<br>
  <ul class="nav nav-pills justify-content-center">
    <li class="active"><a data-toggle="pill" href="#assg">Assignments</a></li>
    <li><a data-toggle="pill" href="#attd">Attendance</a></li>
  </ul>
  
  <div class="tab-content">
    <div id="assg" class="tab-pane fade in active">
	<?php if ($user_info['priority'] == 1){?>
	  <p>Add Assignments : <a href="index.php?page=add_assignments">GO ></a></p>
	  <?php } ?>
      				<iframe name="fdis" src="index.php?page=assignment_list" class="ff" style="border:none;">
					  <p>Your browser does not support iframes.</p>
					</iframe>
 	</div>
    <div id="attd" class="tab-pane fade">
      <h3 class="text-center">\(^o^)/</h3>
      <p class="text-center">It is important to have atleast 75% attendance in each subject!</p>
	  <?php if ($user_info['priority'] == 0){?>
	  <?php  $subat = get_attd_home(); ?>
	  
	  <div class="row">
	  	
	  	<div class="col-md-2">
			<p style="font-family: 'Quicksand', sans-serif; font-size:26px;color:#fcd900;"><?php echo $subat[0]['s1']; ?></p>
		</div>
		<div class="col-md-2">
			<p style="font-family: 'Quicksand', sans-serif; font-size:26px;color:#fcd900;"><?php echo $subat[0]['s2']; ?></p>
		</div>
		<div class="col-md-2">
			<p style="font-family: 'Quicksand', sans-serif; font-size:26px;color:#fcd900;"><?php echo $subat[0]['s3']; ?></p>
		</div>
		<div class="col-md-2">
			<p style="font-family: 'Quicksand', sans-serif; font-size:26px;color:#fcd900;"><?php echo $subat[0]['s4']; ?></p>
		</div>
		<div class="col-md-2">
			<p style="font-family: 'Quicksand', sans-serif; font-size:26px;color:#fcd900;"><?php echo $subat[0]['s5']; ?></p>
		</div>
		<div class="col-md-2">
			<p style="font-family: 'Quicksand', sans-serif; font-size:26px;color:#fcd900;"><?php echo $subat[0]['s6']; ?></p>
		</div>
	  </div>
	  <div class="row">
	  	
	  	<div class="col-md-2">
			<p style="font-family: 'Quicksand', sans-serif; font-size:26px;"><?php echo $subat[0]['a1']; ?></p>
		</div>
		<div class="col-md-2">
			<p style="font-family: 'Quicksand', sans-serif; font-size:26px;"><?php echo $subat[0]['a2']; ?></p>
		</div>
		<div class="col-md-2">
			<p style="font-family: 'Quicksand', sans-serif; font-size:26px;"><?php echo $subat[0]['a3']; ?></p>
		</div>
		<div class="col-md-2">
			<p style="font-family: 'Quicksand', sans-serif; font-size:26px;"><?php echo $subat[0]['a4']; ?></p>
		</div>
		<div class="col-md-2">
			<p style="font-family: 'Quicksand', sans-serif; font-size:26px;"><?php echo $subat[0]['a5']; ?></p>
		</div>
		<div class="col-md-2">
			<p style="font-family: 'Quicksand', sans-serif; font-size:26px;"><?php echo $subat[0]['a6']; ?></p>
		</div>
	  </div>
	  <br>
	  <?php if($subat[0]['a1'] <= 40){
	  	?> <div class="alert alert-warning" role="alert"> Your attendance for <?php echo $subat[0]['s1']?> is low! </div> <?php
	  }?>
	  <?php if($subat[0]['a2'] <= 40){
	  	?> <div class="alert alert-warning" role="alert"> Your attendance for <?php echo $subat[0]['s2']?> is low! </div> <?php
	  }?>
	  <?php if($subat[0]['a3'] <= 40){
	  	?> <div class="alert alert-warning" role="alert"> Your attendance for <?php echo $subat[0]['s3']?> is low! </div> <?php
	  }?>
	  <?php if($subat[0]['a4'] <= 40){
	  	?> <div class="alert alert-warning" role="alert"> Your attendance for <?php echo $subat[0]['s4']?> is low! </div> <?php
	  }?>
	  <?php if($subat[0]['a5'] <= 40){
	  	?> <div class="alert alert-warning" role="alert"> Your attendance for <?php echo $subat[0]['s5']?> is low! </div> <?php
	  }?>
	  <?php if($subat[0]['a6'] <= 40){
	  	?> <div class="alert alert-warning" role="alert"> Your attendance for <?php echo $subat[0]['s6']?> is low! </div> <?php
	  }?>
	
	<?php }
	else {
	?>
		<iframe name="fdis" src="index.php?page=attendance" class="fff" style="border:none;">
					  <p>Your browser does not support iframes.</p>
					</iframe>
	<?php	
	}
	?>
	  
    </div>
   
   
  </div>
</div>
				
				
				
				
				
				
			</div>
			
			
			
			

		
		</div>
		
		
	</div>
</div>


</body>
</html>
