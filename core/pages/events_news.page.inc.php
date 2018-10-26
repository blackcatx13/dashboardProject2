
<html>
<head>
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

.nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus {
    color:black;
    background-color:#fcd900;
	
    }
.imgpost{
	max-width:800px;
	min-width:700px;
	margin:0;
	padding: 5px 5px;
}

h1 {letter-spacing: 6px}
.w3-row-padding img {margin-bottom: 12px}

.containeri {
  position: relative;
  width: 100%;
  margin: 20px 20px;
}

.image {
  display: block;
  width: 100%;
  height: auto;
}

.overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  opacity: 0.7;
  overflow: hidden;
  width: 100%;
  height: 100%;
  -webkit-transform:scale(0);
  transition: .3s ease;
}

.containeri:hover .overlay {
  transform: scale(1)
}

.text {
  color: white;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
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
<div id="main">
<?php 
$user_info = fetch_user_profile();
?>
<h2 class="text-center">Stay Updated!</h2>

  <ul class="nav nav-pills justify-content-center">
    <li class="active"><a data-toggle="pill" href="#events">Events</a></li>
    <li><a data-toggle="pill" href="#news">News</a></li>
  </ul>
  
<br>
<hr />
  
  <div class="tab-content">
    <div id="events" class="tab-pane fade in active">
	 <div class="w3-row-padding w3-grayscale" style="margin-bottom:128px">
	 <?php if ($user_info['priority'] == 1){?>
	  <p>Add Events : <a href="index.php?page=events_post">GO ></a></p>
	  <?php } ?>
	 <?php		$events = get_events();
				foreach ($events as $event){
					
			 $c=0;
			if($c % 2 == 0){
			$c = $c + 1;
	 ?>
		  <div class="w3-half">
		    <!-- -->
				<div class="containeri">
					<p class="text-center"><img class="imgpost" src="<?php if(1 > 0 ){$pth = "core/events/.".$event['imgn'].".jpg";} echo $pth;?>" alt = "avatar" style=""></p>
					<div class="overlay">
					<h2><a href="index.php?page=events_read&amp;event_id=<?php echo $event['id']; ?>"><?php echo $event['title']; ?></a></h2>
					    <h4><?php echo $event['user'];?> on <?php echo $event['date'];?></h4>
					<hr />
					<p><?php echo $event['preview'];?></p>
					  </div></div>
					<!---->
		  </div>
			<?php }else{ $c = $c + 1;?>
		  <div class="w3-half">
		  <div class="containeri">
				<p class="text-center"><img class="imgpost" src="<?php if(1 > 0 ){$pth = "core/events/.".$event['imgn'].".jpg";} echo $pth;?>" alt = "avatar" style=""></p>
					<div class="overlay">
					<h2><a href="index.php?page=events_read&amp;event_id=<?php echo $event['id']; ?>"><?php echo $event['title']; ?></a></h2>
					    <h4><?php echo $event['user'];?> on <?php echo $event['date'];?></h4>
					<hr />
					<p><?php echo $event['preview'];?></p>
					  </div>
		  </div></div>
		</div>
		<?php 
			} 
		}

		?>
      		</div>
	
    </div>
    <div id="news" class="tab-pane fade">
      <?php if ($user_info['priority'] == 1){?>
	  <p>Add News : <a href="index.php?page=news_post">GO ></a></p>
	  <?php } ?>
	  <?php

$newss = get_newss();

foreach ($newss as $news){
	?>
	<h2><a href="index.php?page=news_read&amp;news_id=<?php echo $news['id']; ?>"><?php echo $news['title']; ?></a></h2>
	<h4><?php echo $news['user'];?> on <?php echo $news['date'];?></h4>
	<hr />
	<p><?php echo $news['preview'];?></p>
	<?php
}


?>
	  
    </div>
	
	</div>
	</body>
	</html>