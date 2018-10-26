<?php

$check = vcid(30100);
if(isset($_POST['psw'])){
$x = $check[0]['fname'].$check[0]['lname'];
echo $check[0]['fname'];
echo $check[0]['lname'];
echo $check[0]['id'];
echo $x;
echo $_POST['psw'];
echo $_POST['dob'];
echo $_POST['phno'];
echo $_POST['em'];
echo $_POST['ad'];
echo $_POST['prg'];
echo $_POST['ename']
;echo $_POST['ephno'];
echo $_POST['ead'];
echo $_POST['eem'];
}


if(isset($_POST['fn'], $_POST['ln'], $_POST['cid'], $_POST['usrn'], $_POST['psw'], $_POST['dob'], $_POST['phno'], $_POST['em'], $_POST['ad'], $_POST['prg'], $_POST['en'], $_POST['ephno'], $_POST['ead'], $_POST['eem'])){
	$t = add_usr($_POST['fn'], $_POST['ln'], $_POST['cid'], $_POST['usrn'], $_POST['psw'], $_POST['dob'], $_POST['phno'], $_POST['em'], $_POST['ad'], $_POST['prg'], $_POST['en'], $_POST['ephno'], $_POST['ead'], $_POST['eem']);
	if($t == true){
		echo 'Done';
	}else{
		echo 'Not done';
	}
}


?>
				  <form id="reg" class="form-horizontal" action="" method="post">
				    <div class="form-group">
					<div class="row">
						<label class="control-label col-sm-6" for="fn">First Name:</label>
						<label class="control-label col-sm-6" for="ln">Last Name:</label>
					</div>
					<div class="row">
						<div class="col-sm-6">
					        <input style="border-radius:0;background-color:#f1f1f1;" disabled="disabled" class="form-control" placeholder="" type="text" name="fn" id="fn" value ="<?php echo $check[0]['fname'];?>" readonly />
					     </div>
						 <div class="col-sm-6">
					        <input style="border-radius:0;background-color:#f1f1f1;" disabled="disabled" class="form-control" placeholder="" type="text" name="ln" id="ln" value ="<?php echo $check[0]['lname'];?>" readonly />
					     </div>
					</div>
					<br>
					<div class="row">
						<label class="control-label col-sm-4" for="cid">College ID:</label>
						<div class="col-sm-8">
					        <input style="border-radius:0;background-color:#f1f1f1;" disabled="disabled" class="form-control" placeholder="" type="text" name="cid" id="cid" value ="<?php echo $check[0]['id'];?>" readonly />
					     </div>
					</div>
					<br>
				    <div class="row">
						<label class="control-label col-sm-4" for="usrn">Username:</label>
						<div class="col-sm-8">
					        <input style="border-radius:0;background-color:#f1f1f1;" disabled="disabled" class="form-control" placeholder="" type="text" name="usrn" id="usrn" value ="<?php echo $check[0]['fname'];?><?php echo $check[0]['lname']?>" readonly />
					     </div>
					</div>
					<br>
				  	<div class="row">
						<label class="control-label col-sm-4" for="psw">Password:</label>
						<div class="col-sm-8">
					        <input style="border-radius:0;" class="form-control" placeholder="Enter a secure password" type="password" name="psw" id="psw" value ="<?php if(isset($_POST['psw'])) echo htmlentities($_POST['psw']);?>" />
					    </div>				
					</div>
					<br>
					  <div class="row">
						<label class="control-label col-sm-4" for="prg">Program:</label>
						<div class="col-sm-8">
							<select style="border-radius:0;" class="form-control" name="prg" id="prg" form="reg">
							  <option value="1">BCA</option>
							  <option value="2">BBA</option>
							  <option value="3">BBM</option>
							</select>
					    </div>
					</div>
					<hr>
					<div class="row">
						<label class="control-label col-sm-4" for="dob">Date Of Birth:</label>
						<div class="col-sm-8">
					        <input style="border-radius:0;" class="form-control" placeholder="dd/mm/yyyy" type="date" name="dob" id="dob" value ="<?php if(isset($_POST['dob'])) echo htmlentities($_POST['dob']);?>" />
					    </div>
					</div>
					<br>
					<div class="row">
						<label class="control-label col-sm-4" for="phno">Phone Number:</label>
						<div class="col-sm-8">
					        <input style="border-radius:0;" maxlength="10" class="form-control" placeholder="10 Digit Mobile Number" type="text" name="phno" id="phno" value ="<?php if(isset($_POST['phno'])) echo htmlentities($_POST['phno']);?>" />
					    </div>
					</div>
					<br>
					<div class="row">
						<label class="control-label col-sm-4" for="em">Email:</label>
						<div class="col-sm-8">
					        <input style="border-radius:0;" class="form-control" placeholder="Valid Email" type="email" name="em" id="em" value ="<?php if(isset($_POST['em'])) echo htmlentities($_POST['em']);?>" />
					    </div>
					</div>
					<br>
					<div class="row">
						<label class="control-label col-sm-4" for="ad">Address:</label>
						<div class="col-sm-8">
					        <input style="border-radius:0;" maxlength="100" class="form-control" placeholder="Address..." type="text" name="ad" id="ad" value ="<?php if(isset($_POST['ad'])) echo htmlentities($_POST['ad']);?>" />
					    </div>
					</div>
					<br>
					
					<br>
					<hr>
					<div class="row">
						<label class="control-label col-sm-4" for="ename">Emergency Contact Name:</label>
						<div class="col-sm-8">
					        <input style="border-radius:0;" class="form-control" placeholder="Full Name" type="text" name="ename" id="ename" value ="<?php if(isset($_POST['ename'])) echo htmlentities($_POST['ename']);?>" />
					    </div>
					</div>
					<br>
					<div class="row">
						<label class="control-label col-sm-4" for="ephno">Emergency phone no:</label>
						<div class="col-sm-8">
							 <input style="border-radius:0;" maxlength="10" class="form-control" placeholder="10 Digit Mobile Number" type="text" name="ephno" id="ephno" value ="<?php if(isset($_POST['ephno'])) echo htmlentities($_POST['ephno']);?>" />
					    </div>
					</div>
					<br>
					<div class="row">
						<label class="control-label col-sm-4" for="ead">Address:</label>
						<div class="col-sm-8">
					        <input style="border-radius:0;" maxlength="100" class="form-control" placeholder="Emergency contact address..." type="text" name="ead" id="ead" value ="<?php if(isset($_POST['ead'])) echo htmlentities($_POST['ead']);?>" />
					    </div>
					</div>
					<br>
					<div class="row">
						<label class="control-label col-sm-4" for="eem">Emergency email:</label>
						<div class="col-sm-8">
							<input style="border-radius:0;" class="form-control" placeholder="Valid Email" type="email" name="eem" id="eem" value ="<?php if(isset($_POST['eem'])) echo htmlentities($_POST['eem']);?>" />

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
				