<?php
error_reporting(0);
$conn=mysqli_connect("localhost","g7agency_payuser","H.K7lSP#Yaor","g7agency_g7pay");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
