<?php
include "db.php";
$number = $_POST['no_of_days'];
$select = mysqli_query($conn,"select * from wages where company = '".$_POST['c_name']."' AND desig = '".$_POST['desg']."'");
$res_wage = mysqli_fetch_assoc($select);
$res->wage = $res_wage['wages'];
$res->wage_s = number_format(($res_wage['wages']/$number),2);
echo json_encode($res);

?>