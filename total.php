<?php
	$total="";
	$con=mysqli_connect('localhost','root','','bms_db');
	$q="select count(*) as users from user";
	$result=mysqli_query($con,$q);
	$row=mysqli_fetch_assoc($result);
	$total=$row['users'];
	echo $total;
	mysqli_close($con);
?>