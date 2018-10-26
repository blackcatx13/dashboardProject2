<?php
function get_attd_home(){
	$con = mysqli_connect('127.0.0.1', 'root', '','dashboardproject');
	  $uid = $_SESSION['user_id'];
	  $sql = "SELECT s1,s2,s3,s4,s5,s6,a1,a2,a3,a4,a5,a6 FROM users WHERE user_id = $uid";
	  $result = mysqli_query($con, $sql);
	  $subat = array();
	  $rowcount = mysqli_num_rows($result);
	  $c = 0;
	  while ($c < $rowcount){
		$row = mysqli_fetch_assoc($result);
		$subat[] = array(
			's1'   => $row['s1'],
			's2'   => $row['s2'],
			's3'   => $row['s3'],
			's4'   => $row['s4'],
			's5'   => $row['s5'],
			's6'   => $row['s6'],
			'a1'   => $row['a1'],
			'a2'   => $row['a2'],
			'a3'   => $row['a3'],
			'a4'   => $row['a4'],
			'a5'   => $row['a5'],
			'a6'   => $row['a6']
		);
		$c = $c+1;
	}
	return $subat;
}


?>