<?php
include("db.php");
if(isset($_POST['bal']) && $_POST['count'] > 1 )
{
$sel = mysqli_query($conn,"select * from balance where month = '".$_POST['month']."'");
$res = mysqli_fetch_assoc($sel);
if(mysqli_num_rows($sel) > 0)
{
    mysqli_query($conn,"UPDATE `balance` SET `amount`= '".$_POST['bal']."' WHERE id='".$res['id']."'");
    }
    else{
        mysqli_query($conn,"INSERT INTO `balance`(`month`, `amount`) VALUES ('".$_POST['month']."','".$_POST['bal']."')");

    }}
?>