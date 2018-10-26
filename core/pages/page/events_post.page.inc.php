<?php
$user_info = fetch_user_profile();
if($user_info['priority'] == 0){
	header('HTTP/1.1 403 Forbidden');
	header('Location: index.php?page=home');
	
	die();
}
if (isset($_POST['title'], $_POST['body'], $_POST['d'], $_POST['ven'])){
	if (add_events($_POST['title'], $_POST['body'], $_POST['eimg'], $_POST['d'], $_POST['ven'])){
		header("Location: index.php?page=eventsandnews");
	}else{
		echo 'Error';
	}
}

?>
<html>
<head>
<style>
body{
	margin:0 auto;
}
input{
	border-radius:0;
}
</style>
</head>
<body style="background-color:#fefefe;max-width:1200px;">
    <nav class="navbar navbar-light navbar-expand-md sticky-top bg-light navigation-clean-search">
        <div class="container"><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse float-right" id="navcol-1" style="max-height:60px;">
                <p class="navbar-text"><img src="core/pageimgs/clogo.jpg" style="max-width:50px;"></p>
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
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="index.php?page=edit">Edit Profile</a><a class="dropdown-item" role="presentation" href="index.php?page=logout">Logout</a></div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
	<?php
	if (isset($_POST['submit'])){
		$file = $_FILES['eimg'];
		print_r($_FILES['eimg']);
		$file_name = $_FILES['eimg']['name'];
		$file_tmp_name = $_FILES['eimg']['tmp_name'];
		$file_size = $_FILES['eimg']['size'];
		$file_error = $_FILES['eimg']['error'];
		$file_type = $_FILES['eimg']['type'];
		
		$file_ext = explode('.', $file_name);
		$file_act_ext = strtolower(end($file_ext));
		
		$allowed = array('jpg', 'jpeg', 'png', 'pdf');
		$uid = $_SESSION['user_id'];
		$eimgname = uniqid();
		echo $eimgname;
		if (in_array($file_act_ext, $allowed)){
			if ($file_error === 0){
				if ($file_size < 1000000){
					$file_new_name =$eimgname.".".$file_act_ext;
					$file_destination = "{$core_path}/events/.$file_new_name";
					move_uploaded_file($file_tmp_name, $file_destination);
					
					
				}else {
					echo "your file is too big";
				}
			}else {
				echo "there was ana error uploading your file!";
			}
		}else{
			echo "You cannot upload files of this type";
		}
	}
	?>
	<form action="" method="post" enctype="multipart/form-data">
	<div class="row" style="margin-top:20px;">
	<div class="col-2">
		<label for="eimg">Event Image:</label>
	</div>
	<div class="col-6">
		<input class="form-control" type="file" for="eimg" id="eimg" name="eimg" /> 
	</div>
	<div class="col-3">
		<button class="btn btn-primary" type="submit" name="submit">Upload</button>
	</div>
	</div><br>
	</form>
		
		
	<hr>


	<form action="" method="post">
	<div class="row">
		<div class="col-2">
			<label for="title">Title:</label>
		</div>
		<div class="col-4">
			<input class="form-control" type="text" name="title" id="title" value ="<?php if(isset($_POST['title'])) echo htmlentities($_POST['title']);?>"/>
		</div>
		<div class="col-3">
			<label for="eimg">Enter Uploaded Image unique ID:</label>
		</div>
		<div class="col-3">
			<input class="form-control" type="text" name="eimg" id="eimg" value ="<?php if(isset($_POST['eimg'])) echo htmlentities($_POST['eimg']);?>"/>
		</div></div><br>
		<div class="row">
		<div class="col-2">
			<label for="d">Date:</label>
		</div>
		<div class="col-4">
			<input class="form-control" type="date" name="d" id="d" value ="<?php if(isset($_POST['d'])) echo htmlentities($_POST['d']);?>"/>
		</div>
		<div class="col-3">
			<label for="ven">Venue:</label>
		</div>
		<div class="col-3">
			<input class="form-control" type="text" name="ven" id="ven" value ="<?php if(isset($_POST['ven'])) echo htmlentities($_POST['ven']);?>"/>
		</div></div><br>
		<div class="row">
		<div class="col-12">
			<textarea class="form-control" name="body" rows="20" cols="110"><?php if (isset($_POST['body'])) echo htmlentities($_POST['body']);?></textarea>
		</div></div><br>
		<div>
			<input class="btn btn-primary" type="submit" value="submit">
		</div>
	</form>



</body>
</html>




