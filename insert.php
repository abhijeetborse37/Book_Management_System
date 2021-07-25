<!DOCTYPE html>
<html>
<head>
	<title>Book Management</title>
	<meta name="viewport" content="width-device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="header" class="fixed-top">
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
				<div class="col-md-10 mt-3">
					<form action="insert.php" onsubmit="myInsert()" method="POST">
						<div class="form-group">
							<label for="insertForm"><b>Book Title:</b></label>
								<input type="text" class="form-control" name="title" required>
						</div>
						<div class="form-group">
							<label for="insertForm"><b>Price:</b></label>
								<input type="text" class="form-control" name="price">
						</div>
						<div class="form-group">
							<label for="insertForm"><b>Author:</b></label>
								<input type="text" class="form-control" name="author" required>
						</div>
						<div class="form-group">
							<label for="insertForm"><b>ISBN No:</b></label>
								<input type="text" class="form-control" name="isbn" required>
						</div>
						<div class="form-group">
							<label for="insertForm"><b>Issued Date:</b></label>
								<input type="date" value="Date()" min="1900-01-01" max="2100-01-01" class="form-control" name="issuedate" required>
						</div>
						
						<div class="form-group">
							<div class="row">
								<div class="col-md-6 mt-3">
									<button type="submit" class="btn btn-success mr-3" href="insert.php">Insert</button>
									<button type="reset" class="btn btn-primary">Reset</button>
								</div>
								<!-- After clicking insert data pop is show -->
								<script type="text/javascript">
									function myInsert()
									{
										alert("Data inserted Successfully...");
									}
								</script>
                        
							<?php
							global $title;
							global $price;
							global $author;
							global $isbn;
							global $issuedate;
							
							if (isset($_POST['title'])) {
								$title=$_POST['title'];
							}
							if (isset($_POST['price'])) { 		//fetching data
							$price=$_POST['price'];
							}
							if (isset($_POST['author'])) {
							$author=$_POST['author'];
							}
							if (isset($_POST['isbn'])) {
							$isbn=$_POST['isbn'];
							}
							if (isset($_POST['issuedate'])) {
							$issuedate=$_POST['issuedate'];
							}
							

							$con=mysqli_connect('localhost','root'); //connect to mysql
							mysqli_select_db($con,'bms_db'); //select database
							$q="insert into book(title,price,author,isbn) values ('$title',$price,'$author','$isbn')";
							 //insert into book table
							$status=mysqli_query($con,$q); //query executed
							mysqli_close($con); // connection close
							?>
								
							</div>
							

						<div class="form-group text-center mt-5">
							<h5><a href="home.php"><strong> << Back To Home </strong> </a></h5>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
