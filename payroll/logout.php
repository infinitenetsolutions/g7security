<?php
session_start();
// destroy the session
session_destroy();
// remove all session variables
session_unset();
header("location: login.php");
?>