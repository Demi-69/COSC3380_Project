<?php 
	session_start();
	
	include('see_connect.php');
	
	if($_SESSION['user_id'] == "") // login failed
	{
		$_SESSION['login_error'] = "true";
		header("Location: http://localhost/pages/index.php");
	}
	
?>