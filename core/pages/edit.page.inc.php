<?php



?>
<button onclick="myFunction()">Try it</button>
		<script>
		function myFunction() {
		    var x = document.getElementById("myDIV");
		    var y = document.getElementById("myDIV1");
		    if (x.style.display === "block") {
		        x.style.display = "none";
		        y.style.display = "block";
		    } else {
		        x.style.display = "block";
		        y.style.display = "none";
		    }
		}
		</script>
		<br>
		<hr />
		<!-- Trigger/Open The Modal -->
		<button id="">Edit Profile</button>
		<!-- The Modal -->
		<div id="" class="">
		  <!-- Modal content -->
		  <div class="">
		    <span class="close">&times;</span>
		    <p>Edit your information </p>
			<form action="" method="post" enctype="multipart/form-data">
				<div>
					<label for="password">Password</label>
					<input type="password" name="password" id="password" value ="" />
				</div>
				<div>
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
					<form action="" method="post" enctype="multipart/form-data">
					<div>
						<label for="avatar">Change Profile Picture</label>
						<input type="file" for="avatar" id="avatar" name="avatar" /> 
					</div>
						<button type="submit" name="submit">UPLOAD</button>
					</form> 
				</div>
				<div>
					<label for="uphno">Phone Number</label>
					<input type="text" name="uphno" id="uphno" value ="<?php echo $user_info['phno'];?>" />
				</div>
				<div>
					<label for="uemail">email</label>
					<input type="text" name="uemail" id="uemail" value ="<?php echo $user_info['email'];?>" />
				</div>
				<div>
					<label for="address">Address</label>
					<input type="text" name="address" id="address" value ="<?php echo $user_info['address'];?>" />
				</div>
				<hr />
				<h2>Emergency Contact details</h2>
				<div>
					<label for="ename">Name</label>
					<input type="text" name="ename" id="ename" value ="<?php echo $user_info['ename'];?>" />
				</div>
				<div>
					<label for="ephno">Phone Number</label>
					<input type="text" name="ephno" id="ephno" value ="<?php echo $user_info['ephno'];?>" />
				</div>
				<div>
					<label for="eemail">Email</label>
					<input type="text" name="eemail" id="eemail" value ="<?php echo $user_info['eemail'];?>" />
				</div>
				<div>
					<label for="eaddress">Address</label>
					<input type="text" name="eaddress" id="eaddress" value ="<?php echo $user_info['eaddress'];?>" />
				</div>
				<div>
					<input type="submit" value="submit">
				</div>
			</form>
		  </div>
		</div>
		<script>
		var modal = document.getElementById('myModal');
		var btn = document.getElementById("myBtn");
		var span = document.getElementsByClassName("close")[0];
		btn.onclick = function() {
		    modal.style.display = "block";
		}
		span.onclick = function() {
		    modal.style.display = "none";
		}
		window.onclick = function(event) {
		    if (event.target == modal) {
		        modal.style.display = "none";
		    }
		}

		</script>	
		
	</div>
</div>
	