<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Bree+Serif|Exo+2|Poiret+One|Righteous" rel="stylesheet">
</head>
<style>
body {
    margin: 0 auto;
    width:100%;
    padding: 0 20px;
	font-family: 'Bree Serif', serif;
	font-size:;
	background-color: #343a40;
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
    color: #333;
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

.ff{
	width:100%;
	height:700px;
	boder-style:none;
}
.scroll{
	height: 700px;
	overflow: scroll;
}
.containercolor{
	background-color:#555;
}
.pd{
	margin:10px 5px 5px 0;
}
</style>
<body>



<?php // <-------------------------------------------------------PAGE START--------------------------------------------------------------> ?>


<div id="main" >


<?php

$errors = array();

if (isset($_GET['delete_conversation'])){
	if (validate_conversation_id($_GET['delete_conversation']) === false){
		$errors[] = 'Invalid conversation ID.';
		echo 'validation check failed';
	}
	
	if (empty($errors)){
		delete_conversation($_GET['delete_conversation']);
	}
}

$conversations = fetch_conversation_summary();

if (empty($conversations)){
	$errors[] = 'You have no messages.';
}

if (empty($errors) === false){
	foreach ($errors as $error){
		echo '<div class="alert warning">',$error,'</div>';
	}
}




?>
	<nav class="navbar" id="navbarid">
	  <div class="hamburgercontainer" onclick="hamburger">
	    <div id="hamburger-icon" >
	      <div class="line line-1"></div>
	      <div class="line line-2"></div>
	      <div class="line line-3"></div>
	    </div>
	  </div>
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
	
	
<div class ="row">
	<div class="col-md-4 containercolor">
	<div class="scroll">
		<div class="">
			<div class="alert alert-light pd"><p class="text-center"><a target="fdis" href="index.php?page=new_conversation"><i class="material-icons">playlist_add</i>New conversation</a></p></div> <br>
		</div>
	<?php
		foreach ($conversations as $conversation){
			?>
			<div class="">
					<p style="font-family: 'Quicksand', sans-serif;"><a style="font-size:20px;color:#fcd900;" href="index.php?page=inbox&amp;delete_conversation=<?php echo $conversation['id']; ?>"><i class="material-icons">cancel</i></a> <sup><a style="font-size:20px;color:#fcd900;" target="fdis" href="index.php?page=view_conversation&amp;conversation_id=<?php echo $conversation['id'];?>" ><?php echo $conversation['subject']; ?></a></sup></p>
				<p class="" style="font-size:16px;color:#fff;">Last Reply: <?php echo date('d/m/Y H:i:s', $conversation['last_reply']); ?></p>
				<hr />
			</div>
			<?php
		}
	?>
	</div>
	</div>
	<div class="col-md-7 container containercolor">
		<iframe name="fdis" src="" class="ff" style="border:none;">
		  <p>Your browser does not support iframes.</p>
		</iframe>
	</div>
</div>



</div>
</body>
</html>