<?php
include 'db.php';
include ("session.php");
date_default_timezone_set("Asia/Kolkata");
$today = date("Y-m-d");

$orderdate = explode('-', $today);
$year= $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];


$Prv_month = $orderdate[1] - 1;

$todat_my = "$year-0$Prv_month";

if($day == '24') { //day 1 of every month


    $sel_advance = mysqli_query($conn, "select * from advance where date_format(month, '%Y-%m') = '" . $todat_my . "' AND advance_type = 'uniform_monthly'");
//var_dump("select * from advance where date_format(month, '%Y-%m') = '" . $todat_my . "'");

    while($res_sel_advance = mysqli_fetch_assoc($sel_advance))
{


    $sel_deduction = mysqli_query($conn, "select ded_amt from deduction where date_format(month, '%Y-%m') = '" . $todat_my . "' AND emp_name = '".$res_sel_advance['emp_name']."' AND advance_type = 'uniform_monthly'");
   while($res_sel_deduction = mysqli_fetch_assoc($sel_deduction))

   {
       if($res_sel_advance['amount'] >= $res_sel_deduction['ded_amt'])
       {

     $new_adv = $res_sel_advance['amount'] - $res_sel_deduction['ded_amt'];

$update = mysqli_query($conn, "UPDATE `advance` SET `remaining`='".$new_adv."' WHERE id= '".$res_sel_advance['id']."'");
   }
}
}

}
?>