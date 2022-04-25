<?php
	session_start();
	include('see_connect.php');
	$id=$_GET['id'];
	  
    mysqli_query($connect,"delete from employee where employee_id = '$id'");
	
	$localhost = $_SESSION['localhost'];
	header("Location: http://$localhost/employee_form.php");
?>