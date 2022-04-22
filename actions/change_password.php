<?php
	session_start();
	include('see_connect.php');
	
	$user_id = $_SESSION['user_id'];
	$pass1 = $_REQUEST['new_password1'];
	
	$sql = "update user set pass_word='$pass1' where user_id = '$user_id'";  
    $result = mysqli_query($connect, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
	
	header("Location: http://$localhost/finalized/front_page.php");
?>