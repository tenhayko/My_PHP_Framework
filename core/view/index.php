<?php 
	$title = 'Home';
	include('layout/header.php');
?>

<?php 
	if(auth::check()){
		$a = auth::get();
		echo 'hello '.$a['username'];
	}
	else{
		echo 'hello anonymous';
	}
?>

<?php 
	include('layout/footer.php');
?>