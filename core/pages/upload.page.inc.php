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
				header ("Location: index.php?page=temp_home");
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
<form action="" method="post" enctype="multipart/form-data">
<div>
	<label for="avatar">Change Profile Picture</label>
	<input type="file" for="avatar" id="avatar" name="avatar" /> 
</div>
	<button type="submit" name="submit">UPLOAD</button>
</form>
