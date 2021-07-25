
<?php
session_start();
if(!isset($_SESSION['userid'])) //if session variable of username is not created i.e if condion is false
header('location:http://localhost/Book/login.php'); //ater session destroying going to login page
// i.e not giong to home page without login or home page URL i.e redirect to login page
?>

<!DOCTYPE html>
<html>
<head>
	<title>Book Management</title>
	<meta name="viewport" content="width-device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<script>
		function total() {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("demo").innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET", "total.php", true);
			xmlhttp.send();
		};
	</script>
</head>
<body onload="total()">
	<div id="header" class="fixed-top">
		<div class="container-fluid">
			<div class="row p-2 ml-4">
				<div class="col-md-5 pr-0">
					<h1 id="logo">Book Management System</h1>
				</div>
				<div class="col-md-7 pr-0">
					<ul id="menu" class="float-md-right">
					<!--
						<li><a href="insert.php">Add Book</a></li>
						<li><a href="view.php">View Books</a></li>
						<li><a href="update.php">Update Info</a></li>
						<li><a href="delete.php">Delete Book</a></li>  -->
						<li><a href="profile.php"><i class="fa fa-user px-1"></i><?php echo $_SESSION['username']; ?></a></li>
						 <!--print session variable value i.e username -->
						<li class="mr-3"><a href="logout.php"><i class="fa fa-sign-out px-1"></i>Logout</a></li>
						<li class="pr-3"><strong>Total Users : <span id="demo"></span></strong></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div id="banner" class="py-5">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-lg-6">
					<div class="banner-title">
						<h1 class="title">Book Management</h1>
						<p class="lead">Online data management is here...</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container section">
		<div class="row">
			<div class="col-md-12">
				<h2 class="section-head">Data Management Features</h2>
			</div>
				<div class="col-sm-12 col-md-6">
					<div class="service-box">
						<a href="insert.php">
							<i class="fa fa-book"></i>
							<h3 class="text-warning">Add Books</h3>
						</a>
						<p class="text-primary">You can Add Your Books here</p>
					</div>
				</div>
				<div class="col-sm-12 col-md-6">
					<div class="service-box">
						<a href="view.php">
							<i class="fa fa-eye"></i>
							<h3 class="text-warning">View Books</h3>
						</a>
						<p class="text-primary">You can view your Available Books</p>
					</div>
				</div>
			<div class="col-sm-12 col-md-6">
				<div class="service-box">
					<a href="update.php">
						<i class="fa fa-edit"></i>
						<h3 class="text-warning">Update Book</h3>
					</a>
					<p class="text-primary">You can update Book Records here</p>
				</div>
			</div>
			<div class="col-sm-12 col-md-6">
				<div class="service-box">
					<a href="delete.php">
						<i class="fa fa-trash"></i>
						<h3 class="text-warning">Delete Books</h3>
					</a>
					<p class="text-primary">You can delete book records here</p>
				</div>
			</div>
		</div>
	</div>

	<div id="feedback" class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="section-head text-white">Users Feedback</h2>	
				</div>
				<div class="col-md-6">
					<div class="feed">
						<p>Good Website...</p>
						<img src="..\images\person1.jpg" alt="Pranav Vadnare">
						<div class="author">Pranav vadnare</div>
						<div class="author-company">Librarian,Modern College,Pune</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="feed">
						<p>Flexible to students...</p>
						<img src=".\Book\images\person2.jpg" alt="Unmesh Swar">
						<div class="author">Unmesh Swar</div>
						<div class="author-company">Librarian,VIT College,Pune</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="news" class="container section">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="section-head">New Features</h2>	
			</div>
				<div class="col-md-6 col-lg-3">
					<div class="news-post">
						<img src="" alt="">
						<h3><a href="">News Heading Here</a></h3>
						<div class="post-date">Nov. 7, 2020</div>
						<p>Some news paragraph is here...</p>
						<a href="" class="readmore">Read More</a>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="news-post">
						<img src="" alt="">
						<h3><a href="">News Heading Here</a></h3>
						<div class="post-date">Nov. 7, 2020</div>
						<p>Some news paragraph is here...</p>
						<a href="" class="readmore">Read More</a>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="news-post">
						<img src="" alt="">
						<h3><a href="">News Heading Here</a></h3>
						<div class="post-date">Nov. 7, 2020</div>
						<p>Some news paragraph is here...</p>
						<a href="" class="readmore">Read More</a>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="news-post">
						<img src="" alt="">
						<h3><a href="">News Heading Here</a></h3>
						<div class="post-date">Nov. 7, 2020</div>
						<p>Some news paragraph is here...</p>
						<a href="" class="readmore">Read More</a>
					</div>
				</div>
		</div>
	</div>
	
	<div id="footer-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="footer-widget">
						<h4>About Company</h4>
						<p>Some Company details is here <a href="">Click Here</a></p>
						<p>Some Company Security performance is here <a href="">Click Here</a></p>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="footer-widget">
						<h4>Company Address</h4>
						<address>
							<b>@bhijeet Inc. Pvt.</b><br>
							111 Netaji Chowk<br>
							Chalisgaon,Jalgaon,India 424101<br>
							Ph:(+91)123-456-789
						</address>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-8">copyright@2021 @bhijeet Pvt Ltd.</div>
				<div class="col-md-4">
					<ul id="social-icons" class="float-md-right">
						<li><a href="" class="fa fa-facebook-square"></a></li>
						<li><a href="" class="fa fa-linkedin-square"></a></li>
						<li><a href="" class="fa fa-twitter-square"></a></li>
						<li><a href="" class="fa fa-instagram"></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

</body>
</html>