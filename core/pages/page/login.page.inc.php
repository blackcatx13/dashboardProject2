<?php
	if (isset($_POST['user_name'], $_POST['user_password'])){
		echo 'login failed';
		
	}
?>
<?php 

if(isset($_POST['cid'])){
	$check = vcid($_POST['cid']);
	if($check[0]['used'] == 1){
		?> <div class="alert warning">
				  <span class="closebtn">&times;</span>  
				  <strong>Error!</strong> <?php echo 'This College ID is already registered or invalid.'; ?> </div> <?php 
	}else{
		?>
				<div class="alert success">
				  <span class="closebtn">&times;</span>  
				  <strong>Valid College ID!</strong><?php echo 'Proceed to fill the rest of the form.';?> <button style="color:#fff;" type="button" class="btn btn-light" data-toggle="modal" data-target="#modalbox">NEXT</button>
				</div>
				<?php	
	}
}

?>

<?php 

if(isset($_POST['fn'], $_POST['ln'], $_POST['cid'], $_POST['usrn'], $_POST['psw'], $_POST['dob'], $_POST['phno'], $_POST['em'], $_POST['ad'], $_POST['prg'], $_POST['ename'], $_POST['ephno'], $_POST['ead'], $_POST['eem'])){
	$t = add_usr($_POST['fn'], $_POST['ln'], $_POST['cid'], $_POST['usrn'], $_POST['psw'], $_POST['dob'], $_POST['phno'], $_POST['em'], $_POST['ad'], $_POST['prg'], $_POST['ename'], $_POST['ephno'], $_POST['ead'], $_POST['eem']);

}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="lassets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700">
    <link rel="stylesheet" href="lassets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="lassets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="lassets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="lassets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="lassets/css/Simple-Slider.css">
    <link rel="stylesheet" href="lassets/css/styles.css">
	<style>
	body{
		background-color:#ADD8E6;
	}
	.login-clean {
  background:#ADD8E6;
  padding:80px 0;
}

.login-clean form {
  max-width:320px;
  width:90%;
  margin:0 auto;
  background-color:#ffffff;
  padding:40px;
  border-radius:4px;
  color:#505e6c;
  box-shadow:1px 1px 5px rgba(0,0,0,0.1);
}

.login-clean .illustration {
  text-align:center;
  padding:0 0 20px;
  font-size:100px;
  color:#ADD8E6;
}

.login-clean form .form-control {
  background:#f7f9fc;
  border:none;
  border-bottom:1px solid #dfe7f1;
  border-radius:0;
  box-shadow:none;
  outline:none;
  color:inherit;
  text-indent:8px;
  height:42px;
}

.login-clean form .btn-primary {
  background:#f4476b;
  border:none;
  border-radius:4px;
  padding:11px;
  box-shadow:none;
  margin-top:26px;
  text-shadow:none;
  outline:none !important;
}

.login-clean form .btn-primary:hover, .login-clean form .btn-primary:active {
  background:#ADD8E6;
  color:#fff;
}

.login-clean form .btn-primary:active {
  transform:translateY(1px);
}

.login-clean form .forgot {
  display:block;
  text-align:center;
  font-size:12px;
  color:#6f7a85;
  opacity:0.9;
  text-decoration:none;
}

.login-clean form .forgot:hover, .login-clean form .forgot:active {
  opacity:1;
  text-decoration:none;
}

.register-photo {
  background:#ADD8E6;
  padding:80px 0;
}

.register-photo .image-holder {
  display:table-cell;
  width:auto;
  background:url(core/pageimgs/meeting.jpg);
  background-size:cover;
}

.register-photo .form-container {
  display:table;
  max-width:900px;
  width:90%;
  margin:0 auto;
  box-shadow:1px 1px 5px rgba(0,0,0,0.1);
}

.register-photo form {
  display:table-cell;
  width:400px;
  background-color:#ffffff;
  padding:40px 60px;
  color:#505e6c;
}

@media (max-width:991px) {
  .register-photo form {
    padding:40px;
  }
}

.register-photo form h2 {
  font-size:24px;
  line-height:1.5;
  margin-bottom:30px;
}

.register-photo form .form-control {
  background:#f7f9fc;
  border:none;
  border-bottom:1px solid #dfe7f1;
  border-radius:0;
  box-shadow:none;
  outline:none;
  color:inherit;
  text-indent:6px;
  height:40px;
}

.register-photo form .form-check {
  font-size:13px;
  line-height:20px;
}

.register-photo form .btn-primary {
  background:#f4476b;
  border:none;
  border-radius:4px;
  padding:11px;
  box-shadow:none;
  margin-top:35px;
  text-shadow:none;
  outline:none !important;
}

.register-photo form .btn-primary:hover, .register-photo form .btn-primary:active {
  background:#ADD8E6;
  color:#fff;
}

.register-photo form .btn-primary:active {
  transform:translateY(1px);
}

.register-photo form .already {
  display:block;
  text-align:center;
  font-size:12px;
  color:#6f7a85;
  opacity:0.9;
  text-decoration:none;
}
.nav-pills .nav-link.active, .nav-pills .show > .nav-link {
  background-color:transparent;
  border-bottom:4px solid #fff;
  color:#fff;
}

.nav-pills .nav-link {
  color:#f1f1f1;
  border-radius:0;
}
	
	
	.alert {
	    padding: 20px;
	    background-color: #f44336;
	    color: white;
	    opacity: 1;
	    transition: opacity 0.6s;
	    margin-bottom: 15px;
		border-radius: 0;
	}

	.alert.success {background-color: #4CAF50;}
	.alert.info {background-color: #2196F3;}
	.alert.warning {background-color: #ff9800;}

	.closebtn {
	    margin-left: 15px;
	    color: white;
	    font-weight: bold;
	    float: right;
	    font-size: 22px;
	    line-height: 20px;
	    cursor: pointer;
	    transition: 0.3s;
	}

	.closebtn:hover {
	    color: black;
	}
	</style>
	
</head>

<body style="background-color:#ADD8E6;">
    <div id="main">
        <div style="margin-top:80px;margin-bottom:80px;">
            <ul class="nav nav-pills nav-justified" style="max-width:500px;margin-bottom:20px;">
                <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="pill" href="#tab-1">Login</a></li>
                <li class="nav-item"><a class="nav-link" role="tab" data-toggle="pill" href="#tab-2">Register</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" role="tabpanel" id="tab-1">
                    <div><div class="login-clean">
    <form action="index.php?page=login" method="post">
        <h2 class="sr-only">Login Form</h2>
        <div class="illustration"><i class="material-icons" style="font-size:120px;">input</i></div>
        <div class="form-group"><input name="user_name" class="form-control" type="text" placeholder="Username" /></div>
        <div class="form-group"><input name="user_password" class="form-control" type="password" placeholder="Password" /></div>
        <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Log In</button></div><a href="#" class="forgot">Forgot your email or password?</a></form>
</div></div>
                </div>
                <div class="tab-pane fade" role="tabpanel" id="tab-2">
                    <div><div class="register-photo">
    <div class="form-container">
        <div class="image-holder"></div>
        <form method="post">
            <h2 class="text-center">Create an account.</h2>
			<p>Please enter your valid college ID to continue.</p>
            <div class="form-group"><input type="text" name="cid" placeholder="College ID" class="form-control" /></div>
            <div class="form-group">
                <div class="form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input" required />I agree to the license terms.</label></div>
            </div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Sign Up</button></div>
        </form>
    </div>
</div></div>
                </div>
            </div>
        </div>
    </div>
	
	<script>
	var close = document.getElementsByClassName("closebtn");
	var i;

	for (i = 0; i < close.length; i++) {
	    close[i].onclick = function(){
	        var div = this.parentElement;
	        div.style.opacity = "0";
	        setTimeout(function(){ div.style.display = "none"; }, 600);
	    }
	}
	</script>
	
	
	<div class="modal fade" role="dialog" tabindex="-1" id="modalbox">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                
				<br>
				<div class="container">
				  <form id="reg" class="form-horizontal" action="" method="post">
				    <div class="form-group">
					<div class="row">
						<label class="control-label col-sm-6" for="fn">First Name:</label>
						<label class="control-label col-sm-6" for="ln">Last Name:</label>
					</div>
					<div class="row">
						<div class="col-sm-6">
					        <input style="border-radius:0;background-color:#f1f1f1;" class="form-control" placeholder="" type="text" name="fn" id="fn" value ="<?php echo $check[0]['fname'];?>" readonly />
					     </div>
						 <div class="col-sm-6">
					        <input style="border-radius:0;background-color:#f1f1f1;" class="form-control" placeholder="" type="text" name="ln" id="ln" value ="<?php echo $check[0]['lname'];?>" readonly />
					     </div>
					</div>
					<br>
					<div class="row">
						<label class="control-label col-sm-4" for="cid">College ID:</label>
						<div class="col-sm-8">
					        <input style="border-radius:0;background-color:#f1f1f1;" class="form-control" placeholder="" type="text" name="cid" id="cid" value ="<?php echo $check[0]['id'];?>" readonly />
					     </div>
					</div>
					<br>
				    <div class="row">
						<label class="control-label col-sm-4" for="usrn">Username:</label>
						<div class="col-sm-8">
					        <input style="border-radius:0;background-color:#f1f1f1;" class="form-control" placeholder="" type="text" name="usrn" id="usrn" value ="<?php echo $check[0]['fname'];?><?php echo $check[0]['lname']?>" readonly />
					     </div>
					</div>
					<br>
				  	<div class="row">
						<label class="control-label col-sm-4" for="psw">Password:</label>
						<div class="col-sm-8">
					        <input style="border-radius:0;" class="form-control" placeholder="Enter a secure password" type="password" name="psw" id="psw" value ="<?php if(isset($_POST['psw'])) echo htmlentities($_POST['psw']);?>" required />
					    </div>				
					</div>
					<br>
					<hr>
					<div class="row">
						<label class="control-label col-sm-4" for="dob">Date Of Birth:</label>
						<div class="col-sm-8">
					        <input style="border-radius:0;" class="form-control" placeholder="dd/mm/yyyy" type="date" name="dob" id="dob" value ="<?php if(isset($_POST['dob'])) echo htmlentities($_POST['dob']);?>" required />
					    </div>
					</div>
					<br>
					<div class="row">
						<label class="control-label col-sm-4" for="phno">Phone Number:</label>
						<div class="col-sm-8">
					        <input style="border-radius:0;" maxlength="10" class="form-control" placeholder="10 Digit Mobile Number" type="text" name="phno" id="phno" value ="<?php if(isset($_POST['phno'])) echo htmlentities($_POST['phno']);?>" required />
					    </div>
					</div>
					<br>
					<div class="row">
						<label class="control-label col-sm-4" for="em">Email:</label>
						<div class="col-sm-8">
					        <input style="border-radius:0;" class="form-control" placeholder="Valid Email" type="email" name="em" id="em" value ="<?php if(isset($_POST['em'])) echo htmlentities($_POST['em']);?>" required/>
					    </div>
					</div>
					<br>
					<div class="row">
						<label class="control-label col-sm-4" for="ad">Address:</label>
						<div class="col-sm-8">
					        <input style="border-radius:0;" maxlength="100" class="form-control" placeholder="Address..." type="text" name="ad" id="ad" value ="<?php if(isset($_POST['ad'])) echo htmlentities($_POST['ad']);?>" required />
					    </div>
					</div>
					<br>
					<div class="row">
						<label class="control-label col-sm-4" for="prg">Program:</label>
						<div class="col-sm-8">
							<select style="border-radius:0;" class="form-control" name="prg" id="prg" form="reg" required>
							  <option value="1">BCA</option>
							  <option value="2">BBA</option>
							  <option value="3">BBM</option>
							</select>
					    </div>
					</div>
					<br>
					<hr>
					<div class="row">
						<label class="control-label col-sm-4" for="ename">Emergency Contact Name:</label>
						<div class="col-sm-8">
					        <input style="border-radius:0;" class="form-control" placeholder="Full Name" type="text" name="ename" id="ename" value ="<?php if(isset($_POST['ename'])) echo htmlentities($_POST['ename']);?>" required />
					    </div>
					</div>
					<br>
					<div class="row">
						<label class="control-label col-sm-4" for="ephno">Emergency phone no:</label>
						<div class="col-sm-8">
							 <input style="border-radius:0;" maxlength="10" class="form-control" placeholder="10 Digit Mobile Number" type="text" name="ephno" id="ephno" value ="<?php if(isset($_POST['ephno'])) echo htmlentities($_POST['ephno']);?>" required />
					    </div>
					</div>
					<br>
					<div class="row">
						<label class="control-label col-sm-4" for="ead">Address:</label>
						<div class="col-sm-8">
					        <input style="border-radius:0;" maxlength="100" class="form-control" placeholder="Emergency contact address..." type="text" name="ead" id="ead" value ="<?php if(isset($_POST['ead'])) echo htmlentities($_POST['ead']);?>" required />
					    </div>
					</div>
					<br>
					<div class="row">
						<label class="control-label col-sm-4" for="eem">Emergency email:</label>
						<div class="col-sm-8">
							<input style="border-radius:0;" class="form-control" placeholder="Valid Email" type="email" name="eem" id="eem" value ="<?php if(isset($_POST['eem'])) echo htmlentities($_POST['eem']);?>" required/>

					    </div>
					</div>
					<br>
				    <div class="form-group">        
				      <div class="col-sm-offset-2 col-sm-10">
				        <button type="submit" class="btn btn-default">Register</button>
				      </div>
				    </div>
				  </div>
				  </form>
				</div>
				
				
            </div>
        </div>
    </div>
	
	
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/Simple-Slider1.js"></script>
</body>

</html>