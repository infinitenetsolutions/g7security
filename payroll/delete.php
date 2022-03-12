<?php  include('db.php');

//var_dump($_GET['id']);exit();
	
	if($_SERVER['REQUEST_METHOD'] == "GET")
	{
		
		$id = $_GET['id'];
		mysqli_query($conn,"DELETE FROM company WHERE id='$id'");
		header("location: tables_company.php");
	}

if(isset($_GET['d_id']))
{

    $id = $_GET['d_id'];
    mysqli_query($conn,"DELETE FROM designation WHERE id='$id'");
    header("location: add_wages.php");
}

if(isset($_GET['id']))
{

    $id = $_GET['id'];
    mysqli_query($conn,"DELETE FROM emp_data WHERE id='$id'");
    header("location: emp_list.php");
}
?>