<?php
session_start(); //start session
session_destroy();//destroying session after logout
header('location:http://localhost/Book/login.php');
?>