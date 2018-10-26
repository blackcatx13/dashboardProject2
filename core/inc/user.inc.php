<?php
//reg check college id
function vcid($cid){
		$con = mysqli_connect('127.0.0.1', 'root', '','dashboardproject');
	if (mysqli_connect_errno()){
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$cid = mysqli_real_escape_string($con, $cid);
	$sql = "SELECT * FROM studentlist WHERE collegeid = $cid ";
	$result = mysqli_query($con, $sql);
	$usr = array();
	$rowcount = mysqli_num_rows($result);
	$c = 0;
	while ($c < $rowcount){
		$row = mysqli_fetch_assoc($result);
		$usr[] = array(
			'id'   => $row['collegeid'],
			'fname' => $row['firstname'],
			'lname' => $row['lastname'],
			'used' => $row['used'],
			);
	$c = $c + 1;
	}
	return $usr;
}
//register
function add_usr($fn, $ln, $cid, $usrn, $psw, $dob, $phno, $em, $ad, $prg, $en, $ephno, $ead, $eem){
	$con = mysqli_connect('127.0.0.1', 'root', '','dashboardproject');
	$psw = sha1($psw);
	$phno = mysqli_real_escape_string($con, htmlentities($phno));
	$em = mysqli_real_escape_string($con, htmlentities($em));
	$ad = mysqli_real_escape_string($con, nl2br(htmlentities($ad)));
	$en = mysqli_real_escape_string($con, htmlentities($en));
	$ephno = mysqli_real_escape_string($con, htmlentities($ephno));
	$ead = mysqli_real_escape_string($con, nl2br(htmlentities($ead)));
	$eem = mysqli_real_escape_string($con, htmlentities($eem));
	$fulln = $fn . " " . $ln;
	$sql = "INSERT INTO users (user_name, user_password, user_full_name, user_dob, user_address, user_phone_number, user_email, emergency_name, emergency_phone_number, emergency_email, emergency_address, user_program, user_college_id) VALUES ('{$usrn}', '{$psw}', '{$fulln}', '{$dob}', '{$ad}', '{$phno}', '{$em}', '{$en}', '{$ephno}', '{$eem}', '{$ead}', '{$prg}', '{$cid}' )";
	mysqli_query($con, $sql);
	$sql2 = "UPDATE studentlist SET used = 1 WHERE collegeid = $cid ";
	mysqli_query($con, $sql2);
	return true;
	
}


//checks a given username and password combination, returning the user's ID

function validate_credentials($user_name, $user_password){
	
	$con = mysqli_connect('127.0.0.1', 'root', '','dashboardproject');
	if (mysqli_connect_errno()){
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$user_name = mysqli_real_escape_string($con, $user_name);
	$user_password = sha1($user_password);
	
	$result = mysqli_query($con, "SELECT user_id FROM users WHERE user_name='$user_name' AND user_password='$user_password'");
	$row = mysqli_fetch_row($result);
	
	if ($result === false){
		return false;
		
	}

	return $row[0];
}

function fetch_user_ids($user_names){
	$con = mysqli_connect('127.0.0.1', 'root', '','dashboardproject');
	
	$result = mysqli_query($con, "SELECT user_id FROM users WHERE user_name='$user_names' ");
	if(($row = mysqli_fetch_row($result)) !== false){
		return $row[0];
	}
	else {
		return false;
	}
	
	
	
	
}

function fetch_user_profile(){
	$con = mysqli_connect('127.0.0.1', 'root', '','dashboardproject');
	$uid = $_SESSION['user_id'];
	
	$sql = "SELECT 
				user_full_name AS 'name',
				user_dob AS 'dob',
				user_gender AS 'gender',
				user_address AS 'address',
				user_phone_number AS 'phno',
				user_email AS 'email',
				user_program AS 'program',
				user_college_id AS 'collegeID',
				emergency_name AS 'ename',
				emergency_phone_number AS 'ephno',
				emergency_address AS 'eaddress',
				emergency_email AS 'eemail',
				user_avatar AS 'avatar',
				user_priority AS 'priority'
			FROM users 
			WHERE user_id ={$uid}";
	
	$result = mysqli_query($con, $sql);
	
	$info = mysqli_fetch_assoc($result);

	return $info;
}

function fetch_user_profile_id($uid){
	$con = mysqli_connect('127.0.0.1', 'root', '','dashboardproject');
	
	$sql = "SELECT 
				user_full_name AS 'name',
				user_dob AS 'dob',
				user_gender AS 'gender',
				user_address AS 'address',
				user_phone_number AS 'phno',
				user_email AS 'email',
				user_program AS 'program',
				user_college_id AS 'collegeID',
				emergency_name AS 'ename',
				emergency_phone_number AS 'ephno',
				emergency_address AS 'eaddress',
				emergency_email AS 'eemail',
				user_avatar AS 'avatar',
				user_priority AS 'priority'
			FROM users 
			WHERE user_id ={$uid}";
	
	$result = mysqli_query($con, $sql);
	
	$info = mysqli_fetch_assoc($result);

	return $info;
}


function set_user_profile($uphno, $uemail, $uadd, $ename, $ephno, $eemail, $eadd){
	$con = mysqli_connect('127.0.0.1', 'root', '','dashboardproject');
	$uid = $_SESSION['user_id'];
	$ua = 'core/user_avatars/.'.$uid.'.jpg';
	$sql = "UPDATE users 
			SET 
				user_address = '{$uadd}',
				user_phone_number = '{$uphno}',
				user_email = '{$uemail}',
				emergency_name = '{$ename}',
				emergency_phone_number = '{$ephno}',
				emergency_address = '{$eadd}',
				emergency_email = '{$eemail}',
				user_avatar = '{$ua}';
			WHERE users.user_id = {$uid}";
			
	mysqli_query($con, $sql);
}

function set_user_password($password){
	$con = mysqli_connect('127.0.0.1', 'root', '','dashboardproject');
	$uid = $_SESSION['user_id'];
	$password = sha1($password);
	$sql = "UPDATE users SET user_password = '{$password}' WHERE users.user_id = {$uid}";
			
	mysqli_query($con, $sql);
}

?>