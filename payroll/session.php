<?php
session_start();
// var_dump(time());
// var_dump($_SESSION['last_login_timestamp']);exit();
// var_dump(time() - $_SESSION['last_login_timestamp']);exit();
if(!isset($_SESSION['admin_user']))
{
//   	echo'success';

}
// echo'error';
if ((time() - $_SESSION['last_login_timestamp']) > '300') {
    header("location: logout.php");
    exit;
} else {
    $_SESSION['last_login_timestamp'] = time();
}
?>