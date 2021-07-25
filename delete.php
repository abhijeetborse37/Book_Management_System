<?php
	session_start();
	$con=mysqli_connect('localhost','root');
	mysqli_select_db($con,'bms_db');
	$q="select * from book";
	$result=mysqli_query($con,$q);
	$num=mysqli_num_rows($result); //number of rows in table
	mysqli_close($con);
?>
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
<form action="delete.php" method="post">
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-5">

				<table class="table table-dark table-striped table-hover mt-4">
					<thead>
						<tr>
							<th>Book Id</th>
							<th>Title</th>
							<th>Price</th>
							<th>Author</th>
							<th>ISBN No.</th>
							<th>Issue Date</th>
							<th>Select To Delete </th>
	                     </tr>
                    </thead>
					<tbody>
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
					 <td><input type="checkbox" value="<?php  echo $row['bid']; ?>" name="b<?php echo $i; ?>"  /></td>
 <!--  Selected checkbox is acceeing with the help of name and if checkbox is selected Book id value pass
      to the delection.php --> 
                   </tr>
 <?php
   }
 ?>
 
                </tbody>
             </table>
            </div>
           </div>
           <button type="submit" class="btn btn-danger" /><i class="fa fa-trash px-1"></i>Delete</button></td><br/><br/> <!-- Delete Button -->
          
     
    <?php

		$size=sizeof($_POST); //size of total selected value
		$j=1;
		 for($i=1;$i<=$size;$i++,$j++)
		 {
			 $index="b".$j; //index value i.e in checkbox value accessing with the help of name attribute
			 if(isset($_POST[$index])) //if value is selected returns true
			 $b_id[$i]=$_POST[$index]; //create one asssociative array i.e if true
			 else
				 $i--; //condition is false (i.e not selected)i.e i not incremented
		 }
		  $con=mysqli_connect('localhost','root');
		  mysqli_select_db($con,'bms_db'); 
		   for($k=1;$k<=$size;$k++)
		   {
			 $q="delete from book where bid=".$b_id[$k];
			 mysqli_query($con,$q);
		 }
		mysqli_close($con);

?>
 <b>
		<?php
			echo $size." Records Deleted...";
		?>
 </b>

   </form>
</div>	
<div class="text-center">
	<strong>DO you want to delete more records?<a href="delete.php"> Click Here </a></strong><br/><br/>
	<h5><strong><a href="home.php"> << Back To Home</a></strong></h5>
</div>
  </body>
</html>