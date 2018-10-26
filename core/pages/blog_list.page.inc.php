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
	
h2{
	color:#fcd900;
}

.posttitle a{
	color:#fcd900;
}
.posttitle a:hover{
	color:#fff;
}

hr {
    display: block;
    height: 1px;
    border: 0;
    border-top: 3px solid #f20d0d;
    margin: 1em 0;
    padding: 0; 
}
	
</style>
</head>
<body>
<div id="main">
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

<ul class="nav nav-pills justify-content-center">
    <li class="active"><a data-toggle="pill" href="#read">Read & Answer Questions <sub><i class="material-icons">question_answer</i></sub></a></li>
    <li><a data-toggle="pill" href="#ask">Ask a Question <sub><i class="material-icons">border_color</i></sub></a></li>
  </ul>
  <br>
  <div class="tab-content">
    <div id="read" class="tab-pane fade in active">
		<?php //-----------------------------fetching all the blog posts a blog post?>
		<?php

		$posts = get_posts();

		foreach ($posts as $post){
			?><div class="container containercolor">
			<h2 style="font-family: 'Quicksand', sans-serif;"><div class="posttitle"><a href="index.php?page=blog_read&amp;post_id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></div></h2>
			<div class="row">
			<div class="col-md-3"><h4>(<?php echo $post['total_comments'];?> comments)</h4></div>
			<div class="col-md-7"></div>
			<div class="col-md-2"><h4><?php echo $post['date'];?></h4></div>
			</div>
			<hr />
			<p style="font-size:16px;"><?php echo $post['preview'];?></p></div><br>
			<?php
		}

		?>
		      
 	</div>
    <div id="ask" class="tab-pane fade">
	<div class="container containercolor">
      <h3 style="color:#fcd900;" class="text-center">Share what's on your mind!</h3>
      <p class="text-center">Don't be afraid to ask questions. You'll be surprised with the responses you get.</p>
	</div>
	<br>
	  		<?php //-----------------------------making a blog post?>
			<?php

			if (isset($_POST['title'], $_POST['body'])){
				if (add_post($_POST['title'], $_POST['body'])){
					header("Location: index.php?page=blog_list");
				}else{
					echo 'Error';
				}
			}

			?>
			<div class="container containercolor">
			<br>
			  <form class="form-horizontal" action="" method="post">
			    <div class="form-group">
			      <label class="control-label col-sm-2" for="title">Title:</label>
			      <div class="col-sm-10">          
			        <input class="form-control" placeholder="Enter the title of your thread" type="text" name="title" id="title" value ="<?php if(isset($_POST['title'])) echo htmlentities($_POST['title']);?>"/>
			      </div>
			    </div><div class="form-group">
			      <label class="control-label col-sm-2" for="body">Body:</label>
			      <div class="col-sm-10">
			        <textarea class="form-control" placeholder="Enter your message here" id="" name="body" rows="20" cols="110"><?php if (isset($_POST['body'])) echo htmlentities($_POST['body']);?></textarea>
			      </div>
			    </div>
				
			    <div class="form-group">        
			      <div class="col-sm-offset-2 col-sm-10">
			        <button type="submit" class="btn btn-default">Post > </button>
			      </div>
			    </div>
			  </form>
			</div>

	 </div>




</div>
</body>