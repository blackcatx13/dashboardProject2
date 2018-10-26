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
$user_info = fetch_user_profile();
?>
<?php
					if (isset($_POST['submit'])){
						$file = $_FILES['avatar'];
						print_r($_FILES['avatar']);
						$file_name = $_FILES['avatar']['name'];
						$file_tmp_name = $_FILES['avatar']['tmp_name'];
						$file_size = $_FILES['avatar']['size'];
						$file_error = $_FILES['avatar']['error'];
						$file_type = $_FILES['avatar']['type'];
						
						$file_ext = explode('.', $file_name);
						$file_act_ext = strtolower(end($file_ext));
						
						$allowed = array('jpg', 'jpeg', 'png', 'pdf');
						$uid = $_SESSION['user_id'];

						if (in_array($file_act_ext, $allowed)){
							if ($file_error === 0){
								if ($file_size < 1000000){
									$file_new_name =$uid.".".$file_act_ext;
									$file_destination = "{$core_path}/user_avatars/.$file_new_name";
									move_uploaded_file($file_tmp_name, $file_destination);
									//header ("Location: index.php?page=temp_home");
									print_r($file_destination);
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
					<form action="" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-3"><label for="avatar">Change Profile Picture:</label></div>
						<div class="col-5"><input class="form-control" type="file" for="avatar" id="avatar" name="avatar" /> </div>
					
						<div class="col-4"><button class="btn btn-primary" type="submit" name="submit">upload</button></div>
					</div>
					</form> 
					<hr/>
			<form action="" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-4"><label for="password">Password</label></div>
					<div class="col-8"><input class="form-control" type="password" name="password" id="password" value ="" /></div>
				</div><br>
				<div>
				</div>
				<div class="row">
					<div class="col-4"><label for="uphno">Phone Number</label></div>
					<div class="col-8"><input class="form-control" type="text" name="uphno" id="uphno" value ="<?php echo $user_info['phno'];?>" /></div>
				</div><br>
				<div class="row" >
					<div class="col-4"><label for="uemail">email</label></div>
					<div class="col-8"><input class="form-control" type="text" name="uemail" id="uemail" value ="<?php echo $user_info['email'];?>" /></div>
				</div><br>
				<div class="row">
					<div class="col-4"><label for="address">Address</label></div>
					<div class="col-8"><input class="form-control" type="text" name="address" id="address" value ="<?php echo $user_info['address'];?>" /></div>
				</div><br>
				<hr />
				<h2>Emergency Contact details:</h2><br>
				<div class="row">
					<div class="col-4"><label for="ename">Name</label></div>
					<div class="col-8"><input class="form-control" type="text" name="ename" id="ename" value ="<?php echo $user_info['ename'];?>" /></div>
				</div><br>
				<div class="row">
					<div class="col-4"><label for="ephno">Phone Number</label></div>
					<div class="col-8"><input class="form-control" type="text" name="ephno" id="ephno" value ="<?php echo $user_info['ephno'];?>" /></div>
				</div><br>
				<div class="row">
					<div class="col-4"><label for="eemail">Email</label></div>
					<div class="col-8"><input class="form-control" type="text" name="eemail" id="eemail" value ="<?php echo $user_info['eemail'];?>" /></div>
				</div><br>
				<div class="row">
					<div class="col-4"><label for="eaddress">Address</label></div>
					<div class="col-8"><input class="form-control" type="text" name="eaddress" id="eaddress" value ="<?php echo $user_info['eaddress'];?>" /></div>
				</div><br>
				<div>
					<input class="btn btn-primary" type="submit" value="submit">
				</div>
			</form>
</body>
</html>