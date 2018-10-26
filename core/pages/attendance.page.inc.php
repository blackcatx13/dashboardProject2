


<?php
$user_info = fetch_user_profile();
if($user_info['priority'] == 0){
	header('HTTP/1.1 403 Forbidden');
	header('Location: index.php?page=home');
	
	die();
}
$c = 0;
if (isset($_POST['froll'])){

	if (isset($_POST['sem'])){
		if (isset($_POST['prg'])){
			$usrdata = add_subjects($_POST['sem'],$_POST['prg'], $_POST['froll']);
			$c = 1;
			$usrid = $usrdata[7];
			$usrn = $usrdata[0];
			$sub1 = $usrdata[1];
			$sub2 = $usrdata[2];
			$sub3 = $usrdata[3];
			$sub4 = $usrdata[4];
			$sub5 = $usrdata[5];
			$sub6 = $usrdata[6];
		}
	}
}
if (isset ($_POST['a1'], $_POST['a2'], $_POST['a3'], $_POST['a4'], $_POST['a5'], $_POST['a6'])){
	add_attendance($_POST['a1'], $_POST['a2'], $_POST['a3'], $_POST['a4'], $_POST['a5'], $_POST['a6'], $_POST['ffroll']);
}
?>
<html>
<head>
<style>
body{
	font-family: 'Quicksand', sans-serif;
	font-size:26px;
	background-color:#555;

}
a{
	color:#fcd900;
}
a:hover{
	color:#fff;
}



</style>
</head>

<body>

<p>Add attendance</p>
<form action="" id="attd" method="post">
  College ID:<input type="text" name="froll" value ="<?php if(isset($_POST['froll'])) echo htmlentities($_POST['froll']);?>">
  <input type="submit" value="submit">
</form>
<br>
<select name="prg" form="attd">
  <option value="BCA">BCA</option>
  <option value="BBA">BBA</option>
  <option value="BBM">BBM</option>
  
</select>
<br>
<select name="sem" form="attd">
  <option value="1">I</option>
  <option value="2">II</option>
  <option value="3">III</option>
  <option value="4">IV</option>
  <option value="5">V</option>
  <option value="6">VI</option>
  
</select>
<?php if ($c == 1){echo $usrdata[0];} ?>
<form action="" method="post">

<div class="row">
	  	
	  	<div class="col-md-2">
			<p style="font-family: 'Quicksand', sans-serif; font-size:26px;color:#fcd900;"><?php if ($c == 1){echo $sub1;}else{echo 'Subject 1';} ?> </p>
		</div>
		<div class="col-md-2">
			<p style="font-family: 'Quicksand', sans-serif; font-size:26px;color:#fcd900;"><?php if ($c == 1){echo $sub2;}else{echo 'Subject 2';} ?> </p>
		</div>
		<div class="col-md-2">
			<p style="font-family: 'Quicksand', sans-serif; font-size:26px;color:#fcd900;"><?php if ($c == 1){echo $sub3;}else{echo 'Subject 3';} ?> </p>
		</div>
		<div class="col-md-2">
			<p style="font-family: 'Quicksand', sans-serif; font-size:26px;color:#fcd900;"><?php if ($c == 1){echo $sub4;}else{echo 'Subject 4';} ; ?></p>
		</div>
		<div class="col-md-2">
			<p style="font-family: 'Quicksand', sans-serif; font-size:26px;color:#fcd900;"><?php if ($c == 1){echo $sub5;}else{echo 'Subject 5';} ?></p>
		</div>
		<div class="col-md-2">
			<p style="font-family: 'Quicksand', sans-serif; font-size:26px;color:#fcd900;"><?php if ($c == 1){echo $sub6;}else{echo 'Subject 6';} ?></p>
		</div>
	  </div>
	  <div class="row">
	  	
	  	<div class="col-md-2">
			<p style="font-family: 'Quicksand', sans-serif; font-size:26px;"><input type="text" name="a1"></p>
		</div>
		<div class="col-md-2">
			<p style="font-family: 'Quicksand', sans-serif; font-size:26px;"><input type="text" name="a2"></p>
		</div>
		<div class="col-md-2">
			<p style="font-family: 'Quicksand', sans-serif; font-size:26px;"><input type="text" name="a3"></p>
		</div>
		<div class="col-md-2">
			<p style="font-family: 'Quicksand', sans-serif; font-size:26px;"><input type="text" name="a4"></p>
		</div>
		<div class="col-md-2">
			<p style="font-family: 'Quicksand', sans-serif; font-size:26px;"><input type="text" name="a5"></p>
		</div>
		<div class="col-md-2">
			<p style="font-family: 'Quicksand', sans-serif; font-size:26px;"><input type="text" name="a6"></p>
		</div>
	  </div>
		<input type="submit" value="submit">



	Confirm College ID:<input type="text" name="ffroll" value ="<?php if(isset($_POST['ffroll'])) echo htmlentities($_POST['ffroll']);?>">
	
	
	
</form>

</body>

</html>