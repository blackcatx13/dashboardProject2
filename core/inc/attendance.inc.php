<?php
//start of the function --- get and add to the users data table the subjects
function add_subjects($sem, $prgm, $roll_no){
	$con = mysqli_connect('127.0.0.1', 'root', '','dashboardproject');
	
	$sql = "SELECT user_id,user_full_name FROM users WHERE users.user_college_id = {$roll_no}";
	$result = mysqli_query($con, $sql);
	$usr = array();
	$rowcount = mysqli_num_rows($result);
	$c = 0;
	while ($c < $rowcount){
		$row = mysqli_fetch_assoc($result);
		$usr[] = array(
			'id'   => $row['user_id'],
			'name' => $row['user_full_name']
			);
	$c = $c + 1;
	}
	if($usr[0]['id'] == false){
		echo 'Invalid User ID';
		die();
	}
	
	$userid = $usr[0]['id'];
	$username = $usr[0]['name'];
	
	
	$sql = "SELECT subject_name FROM bca WHERE sem_no = $sem";
	$result = mysqli_query($con, $sql);
	
	$subjects = array();
	$rowcount = mysqli_num_rows($result);
	$c = 0;
	
	while ($c < $rowcount){
		$row = mysqli_fetch_assoc($result);
		$subjects[] = array(
			'name'   => $row['subject_name'],
			);
	$c = $c + 1;
	}
	$sub1 = $subjects[0]['name'];
	$sub2 = $subjects[1]['name'];
	$sub3 = $subjects[2]['name'];
	$sub4 = $subjects[3]['name'];
	$sub5 = $subjects[4]['name'];
	$sub6 = $subjects[5]['name'];
	
	$sqladd = "UPDATE users
				SET s1 ='$sub1'
				WHERE user_id = $userid";
			
	mysqli_query($con, $sqladd);
	$sqladd = "UPDATE users
				SET s2 ='$sub2'
				WHERE user_id = $userid";
			
	mysqli_query($con, $sqladd);
	$sqladd = "UPDATE users
				SET s3 ='$sub3'
				WHERE user_id = $userid";
			
	mysqli_query($con, $sqladd);
	$sqladd = "UPDATE users
				SET s4 ='$sub4'
				WHERE user_id = $userid";
			
	mysqli_query($con, $sqladd);
	$sqladd = "UPDATE users
				SET s5 ='$sub5'
				WHERE user_id = $userid";
			
	mysqli_query($con, $sqladd);
	$sqladd = "UPDATE users
				SET s6 ='$sub6'
				WHERE user_id = $userid";
			
	mysqli_query($con, $sqladd);
	
	/*username($username);
	subjectlist($subjects);*/
	$usrdata = array($username, $sub1, $sub2, $sub3, $sub4, $sub5, $sub6, $userid);
	
	return $usrdata;
	
}
/*function username($usrname){
	$usrn = $usrname;
	return $usrn;
}
function subjectlist($subjects){
	return $subjects;
}*/

//add the attendance 
function add_attendance($a1, $a2, $a3, $a4, $a5, $a6, $roll_no){
	$con = mysqli_connect('127.0.0.1', 'root', '','dashboardproject');
	
	$sql = "SELECT user_id FROM users WHERE users.user_college_id = {$roll_no}";
	$result = mysqli_query($con, $sql);
	$usr = array();
	$rowcount = mysqli_num_rows($result);
	$c = 0;
	while ($c < $rowcount){
		$row = mysqli_fetch_assoc($result);
		$usr[] = array(
			'id'   => $row['user_id']
			);
	$c = $c + 1;
	}
	if($usr[0]['id'] == false){
		echo 'Invalid User ID';
		die();
	}
	
	$usrid = $usr[0]['id'];
	
	$sqladd = "UPDATE users
				SET a1 = $a1
				WHERE user_id = $usrid";
			
	mysqli_query($con, $sqladd);
	$sqladd = "UPDATE users
				SET a2 = $a2
				WHERE user_id = $usrid";
			
	mysqli_query($con, $sqladd);
	$sqladd = "UPDATE users
				SET a3 = $a3
				WHERE user_id = $usrid";
			
	mysqli_query($con, $sqladd);
	$sqladd = "UPDATE users
				SET a4 = $a4
				WHERE user_id = $usrid";
			
	mysqli_query($con, $sqladd);
	$sqladd = "UPDATE users
				SET a5 = $a5
				WHERE user_id = $usrid";
			
	mysqli_query($con, $sqladd);
	$sqladd = "UPDATE users
				SET a6 = $a6
				WHERE user_id = $usrid";
			
	mysqli_query($con, $sqladd);
	
	
}


?>