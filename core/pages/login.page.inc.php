<h1>Login</h1>

<?php
	if (isset($POST['user_name'], $_POST['user_password'])){
		echo 'login failed';
		
	}
?>

<html>
<head>
	<style>
	body{
		background-color: #c63939;
		color:#fff;
	}
	</style>
</head>
<body><div class="container">
  <form class="form-horizontal" action="index.php?page=login" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="user_name">Username:</label>
      <div class="col-sm-10">
        <input class="form-control" placeholder="Enter User name" type="text" name="user_name" id="user_name" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="user_password">Password:</label>
      <div class="col-sm-10">          
        <input class="form-control" placeholder="Enter Password" type="password" name="user_password" id="user_password" />
      </div>
    </div>
	
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Login > </button>
      </div>
    </div>
  </form>
</div>

</body>

</html>