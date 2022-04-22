<?php
	session_start();
	$localhost = $_SESSION['localhost'];
	session_destroy();
	header("Location: http://$localhost/index.php");
?>