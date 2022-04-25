<?php
	session_start();
	include('see_connect.php');
	
	$id=$_GET['id'];
	
	$employee_first = $_POST['Employee_First']; 
	$employee_middle = $_POST['Employee_Middle']; 
	$employee_last = $_POST['Employee_Last']; 
	$employee_dob = $_POST['Employee_DOB'];  
	$employee_number = $_POST['Employee_Number']; 
  
    mysqli_query($connect,"update employee set name_first='$employee_first', name_middle='$employee_middle', name_last='$employee_last', date_of_birth='$employee_dob', phone_number='$employee_number' where employee_id = '$id'");
	
	$localhost = $_SESSION['localhost'];
	header("Location: http://$localhost/employee_form.php");
?>