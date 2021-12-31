<?php
session_start();
 $_SESSION = array();
 
session_destroy();
 
header("location: faculty_login.php");
exit;
?>