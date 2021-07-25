<!DOCTYPE html>
<html>
<head>
	<title>Book Management</title>
	<meta name="viewport" content="width-device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
	<div class="container-fluid text-center">
		<div class="row">
			<div class="col-md-12">
				<h1>Sign In</h1>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<form action="" method="post">
					<div class="form-group">
						<label class="font-weight-bold">Email Id :</label>
						<input type="Email" name="email" class="form-control" placeholder="Enter Email" required>
					</div>
					<div class="form-group">
						<label class="font-weight-bold">Mobile No :</label>
						<input type="text" name="mobileno" class="form-control" placeholder="Enter Mobile No" required>
					</div>
					<div class="form-group">
						<label class="font-weight-bold">Username :</label>
						<input type="text" name="username" class="form-control" placeholder="Enter Username" required>
					</div>
					<div class="form-group">
						<label class="font-weight-bold">Password :</label>
						<input type="password" name="password" class="form-control" placeholder="Enter Password" required>
					</div>				
					<div class="form-group">
						<label class="font-weight-bold">Confirm Password :</label>
						<input type="password" name="confirmpassword" class="form-control" placeholder="Re Enter Password" required>
					</div>	
					<div class="form-group form-check">
   						 <input type="checkbox" class="form-check-input" id="exampleCheck1">
   						 <label class="form-check-label" for="exampleCheck1">Check me out</label>
  					</div>
					<div class="form-group mt-2">
						<button type="submit" class="btn btn-success mr-2">Sign In</button>
						<button type="reset" class="btn btn-warning">Reset</button>
					</div>
					
					<?php
						
						global $username;
						global $password;
						global $mobileno;
						global $email;
						
						if(isset($_POST['username'])){
							$username=$_POST['username'];   //fetching data
						}
						if(isset($_POST['password'])){
							$password=$_POST['password'];
						}
						if(isset($_POST['mobileno'])){
							$mobileno=$_POST['mobileno'];
						}
						if(isset($_POST['email'])){
							$email=$_POST['email'];
						}
					
						
						
						$con=mysqli_connect('localhost','root');
						mysqli_select_db($con,'bms_db');
						$q="insert into user(username,password,mobileno,email) values ('$username','$password',$mobileno,'$email')";
						$status=mysqli_query($con,$q);
						mysqli_close($con);
						
						
					?>
				</form>
			</div>
		</div>
	</div>
	<div class="container text-center">
		<div class="row">
			<div class="col-md-12">
				<a href="login.php" class="text-decoration-none pb-3"><strong> << Back To Login </strong></a>
				<h4 class="mt-2 text-warning">Sign In Via</h4>
				<ul id="social-icons" class="text-align-center list-inline">
						<li class="list-inline-item"><a href="" class="fa fa-google fa-2x"></a></li>
						<li class="list-inline-item"><a href="" class="fa fa-linkedin-square fa-2x"></a></li>
						<li class="list-inline-item"><a href="" class="fa fa-facebook-square fa-2x"></a></li>
					</ul>
			</div>
		</div>
	</div>
</body>
</html>