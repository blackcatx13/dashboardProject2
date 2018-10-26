<?php

if (isset($_POST['title'], $_POST['body'])){
	if (add_post($_POST['title'], $_POST['body'])){
		header("Location: index.php?page=blog_list");
	}else{
		echo 'Error';
	}
}

?>

<form action="" method="post">

	<div>
		<label for="title">Title</label>
		<input type="text" name="title" id="title" value ="<?php if(isset($_POST['title'])) echo htmlentities($_POST['title']);?>"/>
	</div>
	<div>
		<textarea name="body" rows="20" cols="110"><?php if (isset($_POST['body'])) echo htmlentities($_POST['body']);?></textarea>
	</div>
	<div>
		<input type="submit" value="submit">
	</div>
</form>