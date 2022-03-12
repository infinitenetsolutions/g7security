<?php
include('db.php');
//var_dump($_POST);
$category = $_POST['get_option'];
$category1 = $_POST['binita'];
//var_dump($category1);exit();

$sel_emp_id = mysqli_fetch_assoc(mysqli_query($conn,"select emp_name from advance where id=$category1"));
$emp_ids = $sel_emp_id['emp_name'];
if(isset($_POST['get_option']))
{


  $category = $_POST['get_option'];
 // var_dump("select a.* from advance a left join emp_data e on a.emp_name=e.id where e.emp_name=$category");exit();
 $find=mysqli_query($conn,"select a.* from advance a where a.emp_name='$emp_ids' and a.advance_type='$category'");
 //var_dump("select a.* from advance a where a.emp_name='$category1' and a.advance_type='$category'"); exit;
$row=mysqli_fetch_array($find);
 if($row['Remaining']!= '')
 {
 echo $row['Remaining'];
 }else
  {
      echo $row['amount'];
  }

}
?>
