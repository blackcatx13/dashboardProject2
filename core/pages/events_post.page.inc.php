<?php
$user_info = fetch_user_profile();
if($user_info['priority'] == 0){
	header('HTTP/1.1 403 Forbidden');
	header('Location: index.php?page=home');
	
	die();
}
if (isset($_POST['title'], $_POST['body'])){
	if (add_events($_POST['title'], $_POST['body'], $_POST['eimg'])){
		header("Location: index.php?page=blog_list");
	}else{
		echo 'Error';
	}
}

?>

<form action="" method="post">

	<div>
		<label for="title">Title</label>
		<input type="text" name="title" id="title" value ="<?php if(isset($_POST['title'])) echo htmlentities($_POST['title']);?>"/>
	</div>
	<div>
		<label for="eimg">Enter Uploaded Image unique ID</label>
		<input type="text" name="eimg" id="eimg" value ="<?php if(isset($_POST['eimg'])) echo htmlentities($_POST['eimg']);?>"/>
	</div>
	<div>
		<textarea name="body" rows="20" cols="110"><?php if (isset($_POST['body'])) echo htmlentities($_POST['body']);?></textarea>
	</div>
	<div>
		<input type="submit" value="submit">
	</div>
</form>
<hr>



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
<div>
	<label for="eimg">Change Profile Picture</label>
	<input type="file" for="eimg" id="eimg" name="eimg" /> 
</div>
	<button type="submit" name="submit">UPLOAD</button>
</form>
