<?php 
	
	session_name ('MyForum');
	session_start();

	/**************HELPER**************/
	include('helper/function/function.php');
	include('helper/authentication/auth.php');

	/**************MODEL**************/
	include('core/model/all.php');

	/**************CONTROLLER**************/
	include('core/controller/HomeController.php');

	/**************ROUTER**************/
	include('core/router.php');

?>