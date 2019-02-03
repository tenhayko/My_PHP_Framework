<?php 
	$title = 'Register';
	include('layout/header.php');
?>

<form method="post" action="">
	username <input type="text" name="username"><br>
	password <input type="password" name="password"><br>
	<input type="submit" name="submit" value="register">
</form>

<?php 
	include('layout/footer.php');
?>