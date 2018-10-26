<?php
//
$user_info = fetch_user_profile();
if($user_info['priority'] == 0){
	header('HTTP/1.1 403 Forbidden');
	header('Location: index.php?page=home');
	
	die();
}
if (isset($_POST['prg'],$_POST['title'], $_POST['body'])){
	$for = $_POST['prg'];
	if (add_assignment($_POST['title'], $_POST['body'], $for)){
		header("Location: index.php?page=home");
	}else{
		echo 'Error';
	}
	
}
?>
<html>
<style>
body {
margin:0;
background-color: #343a40;
color:#fff;
font-family: 'Quicksand', sans-serif;
}

.active {
    background-color: #c63939  !important;
}

.sidenav {
    height: 100%;
    width: 90px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #333;
    overflow-x: hidden;
    padding-top: 20px;
}

.sidenav a {
    color: #818181;
    display: block;
	 display: block;
    text-align: center;
    padding: 16px;
    transition: all 0.3s ease;
    font-size: 36px;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.main {
    margin-left: 160px; /* Same as the width of the sidenav */
    font-size: 16px; /* Increased text to enable scrolling */
    padding: 0px 10px;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
}

.containercolor{
	background-color:#555;
	
}
h2{
	color:#fcd900;
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
<div class="main">
<div class="sidenav">
  
  <a href="index.php?page=home"><i class="material-icons">home</i></a> 
  <a href="index.php?page=inbox"><i class="material-icons">inbox</i></a> 
  <a class="active" href="index.php?page=blog_list"><i class="material-icons">forum</i></a> 
  <a href="index.php?page=events_news"><i class="material-icons">event</i></a>
  <a href="index.php?page=logout"><i class="material-icons">exit_to_app</i></a> 
</div>
<br>

<div class="container">
  <form class="form-horizontal" action="" id="assg" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="title">Title:</label>
      <div class="col-sm-10">
        <input class="form-control" placeholder="Enter the title" type="text" name="title" id="title" value ="<?php if(isset($_POST['title'])) echo htmlentities($_POST['title']);?>" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="body">Body:</label>
      <div class="col-sm-10">
        <textarea class="form-control" placeholder="Enter your message here" id="" name="body" rows="20" cols="110"><?php if (isset($_POST['body'])) echo htmlentities($_POST['body']);?></textarea>
      </div>
    </div>
	<div class="form-group">
	<label for="prg"> Select a course this assignment belongs to:</label>
</div>
<select class="form-control" name="prg" form="assg" id="prg" style="width:150px">
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


</body>
</html>