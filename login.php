<html>
	<head>
		<title>Login Page</title>
		<link rel="stylesheet" type="text/css" href="./CSS/loginStyle.css" >
	</head>
<body>
	<div class="loginbox">
		<h2>Login</h2>
		<form action="validation.php" method="post">
			<div id="data">
				Username:<input type="text" name="username" placeholder="Enter Username Name"/><br/><br/>
				Password:<input type="password" name="password" placeholder="Enter Password"/><br/><br/>
			</div>
			<input id="b1" type="submit" name="login" value="LOGIN" />
			<div id="links">
				<a href="signin.php">Sign In</a>
				<a href="forgetpassword.php">Forgot Password</a>
			</div>
		</form>
	</div>
   </body>
</html>