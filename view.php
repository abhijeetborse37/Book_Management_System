<?php
session_start();
$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'bms_db');
$q="select * from book";
$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result); //number of rows in table
//collection
if(isset($_POST['search']))
{
$searchq=$_POST['search'];
$searchq=preg_replace("#[^0-9 a-z]#i","",$searchq);
$sq="select * from book where bid like '%$searchq' OR title like '%$searchq%' OR price like '%$searchq%' OR author like '%$searchq' OR isbn like '%$searchq'";
$result=mysqli_query($con,$sq);
$num=mysqli_num_rows($result);

 /* if($num==0)
   {
        $output=$num."Results Found...";	
		echo $output;
   }
   else
   {
	   while($row=mysqli_fetch_array($result))
	   {
		   $bid=$row['BID'];
		   $title=$row['TITLE'];
		   $price=$row['PRICE'];
		   $author=$row['AUTHOR'];
		   $output='<div>'.$bid.' '.$title.' '.$price.' '.$author.'</div>'
	   }
   }*/
}
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
				<form action="view.php" method="post">
				
				<!-- Search Box -->
				 <div class="search-box text-center mt-4">
					<input type="text" name="search" placeholder="Serach here..."  class="input pb-1 d-print-none rounded-left rounded-right"/>
					
					<button type="submit" class="btn btn-primary d-print-none">Search</button>
				 </div>
					
					<br/>
					<table class="table table-dark table-striped table-hover">
						<thead>
							<tr>
								<th>Book id</th>
								<th>Title</th>
								<th>Price</th>
								<th>Author</th>
								<th>ISBN No.</th>
								<th>Issue Date</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if($num==0)
							{
							?>
							<?php
							   for($i=1;$i<=$num;$i++)
							   {
								   $row=mysqli_fetch_array($result); //fetch first 1-D array data from mysql
							   
							 ?>
										 <tr>
										 <td><?php echo $row['bid']; ?></td>
										 <td><?php echo $row['title']; ?></td>
										 <td><?php echo $row['price']; ?></td>   <!--fetching one by one record from mysql table --> 
										 <td><?php echo $row['author']; ?></td>
										 <td><?php echo $row['isbn']; ?></td>
										 <td><?php echo $row['issuedate']; ?></td>
										 </tr>
							 <?php
							   }
							}
							else
							{
								   while($r=mysqli_fetch_array($result))
								   {
							?>
									 <tr>
									 <!--fetching one by one record from mysql table -->
									 <td><?php echo $r['bid']; ?></td>
									 <td><?php echo $r['title']; ?></td>		 
									 <td><?php echo $r['price']; ?></td> 
									 <td><?php echo $r['author']; ?></td>
									 <td><?php echo $r['isbn']; ?></td>
									 <td><?php echo $r['issuedate']; ?></td>
									 </tr>
							 <?php
								
								   }
							}
							  
							 ?>
							</tbody>
						</table>
				<b id="record" class="d-print-none"><?php  echo $num." Records found..."; ?></b>
			</form>
		</div>
	</div>

<br/><br/>

	<button type="submit" class="btn btn-primary d-print-none" onclick="window.print();" ><i class="fa fa-print pr-1"></i>Print</button>
<br/><br/>
</div>
		<div id="home" class="text-center d-print-none">
			<strong><h5><a href="home.php"><< Go To Home</a></h5></strong>
		</div>
	</body>
</html>