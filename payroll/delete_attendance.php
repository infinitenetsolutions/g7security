<?php  include('db.php');

//var_dump($_GET['id']);exit();
	
	if($_SERVER['REQUEST_METHOD'] == "GET")
	{
		
		$id = $_GET['id'];
		mysqli_query($conn,"DELETE FROM attendance WHERE id='$id'");
		header("location: edit_attendance.php");
	}
?>