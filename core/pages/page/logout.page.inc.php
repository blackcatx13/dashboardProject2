<?php
session_destroy();
?>

<html>
<head>
<meta http-equiv="refresh" content="0">
	<style>
	body{
		background-color: #333;
	}
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
</style>
</head>
<body>
	<div class="alert info">
			  <span class="closebtn">&times;</span>  
			  <strong>You have been logged out!</strong>
			</div>
</body>
</html>
