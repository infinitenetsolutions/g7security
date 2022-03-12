
<?php
include('db.php'); 
$category = $_POST['get_option'];

$sel_emp_id = mysqli_fetch_assoc(mysqli_query($conn,"select emp_name from advance where id=$category "));
$emp_ids = $sel_emp_id['emp_name'];
//var_dump($category);exit();
if(isset($_POST['get_option']))
{
 
 $find=mysqli_query($conn,"select a.advance_type,e.emp_name from advance a left join emp_data e on a.emp_name=e.id  where 
 	a.emp_name='".$emp_ids."'");
 //var_dump("select a.advance_type,e.emp_name from advance a left join emp_data e on a.emp_name=e.id  where
 	//a.emp_name='".$category."'"); exit;
 while($row=mysqli_fetch_array($find))
 {
  echo "<option value='".$row['advance_type']."'>".$row['advance_type']."</option>";
}
}
?>




