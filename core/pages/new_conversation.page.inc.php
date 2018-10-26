<?php 

if (isset($_POST['to'])){
	$errors = array();
	
	if (empty($_POST['to'])){
		$errors[] = 'You must enter at least one name';
	}else if( preg_match('#^[a-z, ]+$#i', $_POST['to']) === 0){
		$errors[] = 'This user name does not look corrrect';
	}else{
		$user_names = $_POST['to'];
		$user_names = trim($user_names);
		
		$user_ids = fetch_user_ids($user_names);
		if ($user_ids == 0){
			$errors[] = 'User Not found';
			
		} 
	}
	if (isset($_POST['subject'])){
		if (empty($_POST['subject'])){
			$errors[] = 'You must enter subject';
		}
	}

	if (isset($_POST['body'])){
		if (empty($_POST['body'])){
			$errors[] = 'You must enter body';
		}
	}

	
	if (empty($errors)){
		create_conversation($user_ids, $_POST['subject'], $_POST['body']);	
	}	
}




if (isset($errors)){
	if(empty($errors)){
		?><div class="alert success">
		  <span class="closebtn">&times;</span>  
		  <strong>Success!</strong><?php echo 'your message has been sent';?>
		</div>
	<?php	
	}
	else{
		foreach ($errors as $error){?>
			<div class="alert warning">
			  <span class="closebtn">&times;</span>  
			  <strong>Warning!</strong><?php echo $error;?>
			</div>
			<?php	
		}
	}
}








?>
<html>
<head>
<style>
.alert {
    padding: 20px;
    background-color: #f44336;
    color: white;
    opacity: 1;
    transition: opacity 0.6s;
    margin-bottom: 15px;
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
body{
	background-color:#555;
	font-family: 'Quicksand', sans-serif;
	font-size:18px;
	color:#fff;
	margin: 10px 0 0 10px;
}
</style>
</head>
<body>
<br>
<div class="container">
  <form class="form-horizontal" action="" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="to">Send to:</label>
      <div class="col-sm-10">
        <input class="form-control" placeholder="Enter User name" type="text" name="to" id="to" value ="<?php if(isset($_POST['to'])) echo htmlentities($_POST['to']);?>" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="subject">Subject:</label>
      <div class="col-sm-10">          
        <input class="form-control" placeholder="Enter Subject" type="text" name="subject" id="subject" value ="<?php if(isset($_POST['subject'])) echo htmlentities($_POST['subject']);?>"/>
      </div>
    </div><div class="form-group">
      <label class="control-label col-sm-2" for="body">Body:</label>
      <div class="col-sm-10">
        <textarea class="form-control" placeholder="Enter your message here" id="" name="body" rows="20" cols="110"><?php if (isset($_POST['body'])) echo htmlentities($_POST['body']);?></textarea>
      </div>
    </div>
	
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Send > </button>
      </div>
    </div>
  </form>
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
</body>
</html>

