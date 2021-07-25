<?php
	session_start();
	$con=mysqli_connect('localhost','root');
	mysqli_select_db($con,'bms_db');
	$q="select * from book";
	$result=mysqli_query($con,$q);
	$num=mysqli_num_rows($result); //number of rows in table
	mysqli_close($con);
?>
<!DOCTYPE HTML>
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
<div class="container">
	<div class="row">
		<div class="col-md-12 mt-5">
			<form action="update.php" method="post" onsubmit="myUpdate()">
				<table class="table table-dark table-striped table-hover mt-4">
					<thead>
						<tr>
							<th>Book Id</th>
							<th>Title</th>
							<th>Price</th>
							<th>Author</th>
							<th>ISBN No.</th>
							<th>Issued Date</th>
						</tr>
					</thead>
<?php
   for($i=1;$i<=$num;$i++)
   {
	   $row=mysqli_fetch_array($result); //fetch first 1-D array data from mysql
   
 ?>
	<tbody>
 	<tr>
 		<td><?php echo $row['bid']; ?> <input type="hidden" name="bid<?php echo $i; ?>" value="<?php echo $row['bid']; ?> "/></td>
	 	<td><input type="text" value="<?php echo $row['title'];?>" name="title<?php echo $i; ?>" /> </td>
 		<td><input type="text" value="<?php echo $row['price']; ?>" name="price<?php echo $i; ?>" /> </td>   <!--fetching one by one record from mysql table --> 
 		<td><input type="text" value="<?php echo $row['author']; ?>" name="author<?php echo $i; ?>" /> </td>
 		<td><input type="text" value="<?php echo $row['isbn']; ?>" name="isbn<?php echo $i; ?>" /> </td>
 		<td><input type="Date" value="<?php echo $row['issuedate']; ?>" name="issuedate<?php echo $i; ?>" /> </td>
 	</tr>
 <?php
   }
 ?>
	</tbody>
</table>
<div class="form-group">
    <div class="row">
		<div class="col-md-12">
			<input type="submit" value="Update" class="btn btn-primary" />
				<script type="text/javascript">
					function myUpdate()
					{
						alert("Records Updated Successfully...");
					}
				</script> 
		</div>
    </div>
</div>

<?php
	$size=sizeof($_POST);
	$records=$size/6;
	for($i=1;$i<=$records;$i++)
	{
		$index1="bid".$i;
		$bid[$i]=$_POST[$index1];
		$index2="title".$i;
		$title[$i]=$_POST[$index2];
		$index3="price".$i;
		$price[$i]=$_POST[$index3];
		$index4="author".$i;
		$author[$i]=$_POST[$index4];
		$index5="isbn".$i;
		$isbn[$i]=$_POST[$index5];
		$index6="issuedate".$i;
		$issuedate[$i]=$_POST[$index6];
	}

	$con=mysqli_connect('localhost','root');
	mysqli_select_db($con,'bms_db');

	for($i=1;$i<=$records;$i++)
	{
	 $q="update book
		set title='$title[$i]',price='$price[$i]',author='$author[$i]',isbn='$isbn[$i]',issuedate='$issuedate[$i]'
		where bid=$bid[$i]";
	mysqli_query($con,$q);
	}
	mysqli_close($con);
?>

<b>
<?php
	echo $records." Records Updated...";
?>
</b>

<div class="form-group text-center mt-5">
	<h5><a href="home.php"><strong> << Back To Home </strong></a></h5>
</div>

		</form>
	</div>
  </div>
 </div>
</body>
</html>