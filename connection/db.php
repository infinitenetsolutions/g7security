<?php
error_reporting(0);
$dbcon=mysqli_connect("localhost","root","","g7agency_new");
if ($dbcon->connect_error) {
    die("Connection failed: " . $dbcon->connect_error);
}