<?php 
	$title = 'Login';
	include('layout/header.php');
?>

<form method="post" action="">
	username <input type="text" name="username"><br>
	password <input type="text" name="password"><br>
	<input type="submit" name="submit" value="login">
</form>

<?php 
	include('layout/footer.php');
?>