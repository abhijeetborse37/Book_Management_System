<?php
	session_start();
	$userid=$_SESSION['userid'];
	$con=mysqli_connect('localhost','root','','bms_db');
	$q="select * from user where userid='$userid'";
	$result=mysqli_query($con,$q);
	$row=mysqli_fetch_assoc($result);
	mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Book Management</title>
	<meta name="viewport" content="width-device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" 
integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h1 id="logo">Book Management System</h1>
				</div>
			</div>
		</div>
	</div>
	<div id="box">
		<div class="container section">
			<div class="row justify-content-center">
				<div class="col-md-6">
					<form action="profile.php" method="POST">
					
						<div class="form-group">
								<input type="hidden" class="form-control" value="<?php echo $row['userid'];?>" name="userid<?php $userid; ?>" />
						</div>
						<div class="form-group">
							<label><b>Username:</b></label>
								<input type="text" class="form-control" value="<?php echo $row['username'];?>" name="username" />
						</div>
						<div class="form-group">
							<label><b>Passsword:</b></label>
								<input type="text" class="form-control"  value="<?php echo $row['password']; ?>" name="password" />
						</div>
						<div class="form-group">
							<label><b>Email Id:</b></label>
								<input type="email" class="form-control" value="<?php echo $row['email']; ?>" name="email" /> 
						</div>
						<div class="form-group">
							<label><b>Mobile No:</b></label>
								<input type="number" class="form-control" value="<?php echo $row['mobileno']; ?>" name="mobileno" />
						</div>
					
						<div class="form-group">
							<div class="row">
								<div class="col-md-6 mt-3">
									<button type="submit" class="btn btn-success mr-3" name="update">Update Profile</button>
									
								</div>
								<?php
									if(isset($_POST['update'])) {
										$con=mysqli_connect('localhost','root','','bms_db');
										$q="update user
										set username='$_POST[username]',
										password='$_POST[password]',
										email='$_POST[email]',
										mobileno='$_POST[mobileno]'
										where userid='$userid'";
										if($query=mysqli_query($con,$q))
										{
											echo '<script>alert("Profile Updated Successfully");</script>';
											echo '<script>location.replace("http://localhost/Book/profile.php");exit;</script>';
										}
										else
										{
											echo '<script> alert("Something went wrong");</script>';
										}
										 
	
									}
								
								?>
									
							</div>
							<div class="form-group text-center mt-5">
								<h5><a href="home.php"><strong><< Back To Home</strong></a></h5>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
