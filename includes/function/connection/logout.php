<?php
session_start(); 
session_destroy(); // destroy session
header("location: /london-academy/includes/function/connection/login.php"); 
?>

