<?php

$errors = array();

if (isset($_GET['delete_conversation'])){
	if (validate_conversation_id($_GET['delete_conversation']) === false){
		$errors[] = 'Invalid conversation ID.';
		echo 'validation check failed';
	}
	
	if (empty($errors)){
		delete_conversation($_GET['delete_conversation']);
	}
}

$conversations = fetch_conversation_summary();

if (empty($conversations)){
	$errors[] = 'You have no messages.';
}

if (empty($errors) === false){
	foreach ($errors as $error){
		echo '<div class="alert warning">',$error,'</div>';
	}
}




?>






<?php //Creating a new conversation

if (isset($_POST['to'])){
	$errorsn = array();
	
	if (empty($_POST['to'])){
		$errorsn[] = 'You must enter at least one name';
	}else if( preg_match('#^[a-z, ]+$#i', $_POST['to']) === 0){
		$errorsn[] = 'This user name does not look corrrect';
	}else{
		$user_names = $_POST['to'];
		$user_names = trim($user_names);
		
		$user_ids = fetch_user_ids($user_names);
		if ($user_ids == 0){
			$errorsn[] = 'User Not found';
			
		} 
	}
	if (isset($_POST['subject'])){
		if (empty($_POST['subject'])){
			$errorsn[] = 'You must enter subject';
		}
	}

	if (isset($_POST['body'])){
		if (empty($_POST['body'])){
			$errorsn[] = 'You must enter body';
		}
	}

	
	if (empty($errorsn)){
		create_conversation($user_ids, $_POST['subject'], $_POST['body']);	
		header("Refresh:3");
	}	
}

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inbox</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="iassets/css/styles.css">
	
	<style>
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
	#scroll{
	overflow: scroll;
	height:100%;
	overflow-x: hidden;
	}
	/* width */
	::-webkit-scrollbar {
	    width: 10px;
	}

	/* Track */
	::-webkit-scrollbar-track {
	    box-shadow: inset 0 0 0 white; 
	    border-radius: 0px;
	}
	 
	/* Handle */
	::-webkit-scrollbar-thumb {
	    background: #ADD8E6; 
	    border-radius: 0px;
	}

	/* Handle on hover */
	::-webkit-scrollbar-thumb:hover {
	    background: #8aacb8 ; 
	}
	</style>
</head>

<body style="background-color:#fefefe;">
    <nav class="navbar navbar-light navbar-expand-md sticky-top bg-light navigation-clean-search">
        <div class="container"><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse float-right" id="navcol-1" style="max-height:60px;">
                <p class="navbar-text"><img src="core/pageimgs/clogo.jpg" style="max-width:50px;"></p>
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php?page=home">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="#">Inbox</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php?page=forum">Student Community</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php?page=eventsandnews">Events &amp; News&nbsp;</a></li>
                </ul>
                <form class="form-inline ml-auto" target="_self">
                    <div class="form-group"><label for="search-field"><i class="fa fa-search"></i></label><input class="form-control float-right search-field" type="search" name="search" placeholder="Search the site" id="search-field"></div>
                </form>
                <ul class="nav navbar-nav">
                    <li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Me&nbsp;</a>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="index.php?page=edit">Edit Profile</a><a class="dropdown-item" role="presentation" href="index.php?page=logout">Logout</a></div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
	<?php
		if (isset($errorsn)){
		if(empty($errorsn)){
			?><div class="alert success">
			  <span class="closebtn">&times;</span>  
			  <strong>Success!</strong><?php echo 'your message has been sent'; ?>
			</div>
		<?php	
		}
		else{
			foreach ($errorsn as $errorn){?>
				<div class="alert warning">
				  <span class="closebtn">&times;</span>  
				  <strong>Warning!</strong><?php echo $errorn;?>
				</div>
				<?php	
			}
		}
	}


	
	?>
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
    <div class="container" style="margin-bottom:20px;">
        <div class="row">
            <div class="col-4">
                <div class="row" id="creater">
                    <div class="col" style="height:80px;"><div><button style="color:#8aacb8;margin:0 0 0 70px;" type="button" class="btn btn-light" data-toggle="modal" data-target="#modalbox">Compose a message <i class="material-icons">mode_edit</i></button></div></div>
                </div>
                <div class="row" style="height:720px;">
                    <div class="col" style="padding:0;">
                        <div id="scroll">
                            <?php
								foreach ($conversations as $conversation){
									?><div>
                                <h5><a style="color:#555;" target="fdis" href="index.php?page=view_conversation&amp;conversation_id=<?php echo $conversation['id'];?>#bottom" ><?php echo $conversation['subject']; ?> <a style="float:right;font-size:18px;color:#888;font-style:normal;margin-right:5px;" href="index.php?page=inbox&amp;delete_conversation=<?php echo $conversation['id']; ?>">| Delete Conversation</a></h5>
                                <p>Last Reply: <?php echo date('d/m/Y H:i:s', $conversation['last_reply']); ?></p>
                                <hr>
                            </div><?php
								}
							?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col" style="height:800px;width:760px;"><iframe style="border:0;" name="fdis" src="" height="800" width="760"></iframe></div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="modalbox">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                
				<br>
				<div class="container">
				  <form class="form-horizontal" action="" method="post">
				    <div class="form-group">
				      <label class="control-label col-sm-3" for="to">Send to:</label>
				      <div class="col-sm-12">
				        <input style="border-radius:0;" class="form-control" placeholder="Enter User name" type="text" name="to" id="to" value ="<?php if(isset($_POST['to'])) echo htmlentities($_POST['to']);?>" />
				      </div>
				    </div>
				    <div class="form-group">
				      <label class="control-label col-sm-3" for="subject">Subject:</label>
				      <div class="col-sm-12">          
				        <input style="border-radius:0;" class="form-control" placeholder="Enter Subject" type="text" name="subject" id="subject" value ="<?php if(isset($_POST['subject'])) echo htmlentities($_POST['subject']);?>"/>
				      </div>
				    </div><div class="form-group">
				      <label class="control-label col-sm-3" for="body">Body:</label>
				      <div class="col-sm-12">
				        <textarea style="border-radius:0;" class="form-control" placeholder="Enter your message here" id="" name="body" rows="20" cols="110"><?php if (isset($_POST['body'])) echo htmlentities($_POST['body']);?></textarea>
				      </div>
				    </div>
					
				    <div class="form-group">        
				      <div class="col-sm-offset-2 col-sm-10">
				        <button type="submit" class="btn btn-default">Send > </button>
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