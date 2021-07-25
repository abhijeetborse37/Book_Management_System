<?php
	session_start();
	$username=$_POST['username']; //form data obtain on php
	$password=$_POST['password'];
	$con=mysqli_connect('localhost','root');
	mysqli_select_db($con,'bms_db');
	$q="select * from user where username='$username' && password='$password'"; //select username and password
	$result=mysqli_query($con,$q);
	$num=mysqli_num_rows($result); //no. rows in table
	$row=mysqli_fetch_array($result);
	 if($num==1)
	  {
		  $_SESSION['username']=$row['username'];
		  $_SESSION['userid']=$row['userid']; //create session variable of username i.e $username
		  header('location:http://localhost/Book/home.php'); //if true redirect to home page
	  }
	  else
	  {
		  header('location:http://localhost/Book/login.php'); //if false redirect to login page
	  }

?>