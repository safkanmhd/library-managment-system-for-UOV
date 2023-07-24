<?php

@include 'config.php';
$id=$_GET['updateid'];
$sql="SELECT * FROM book WHERE id='$id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$bookname=$row['bookname'];
$details=$row['details'];
$author=$row['author'];
$publication=$row['publication'];
$quantity=$row['quantity'];
$branch=$row['branch'];

if(isset($_POST['submit']))
{

   $bookname = mysqli_real_escape_string($conn, $_POST['bookname']);
   $details = mysqli_real_escape_string($conn, $_POST['details']);
   $author = mysqli_real_escape_string($conn, $_POST['author']);
   $publication = mysqli_real_escape_string($conn, $_POST['publication']);
   $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
   $branch = mysqli_real_escape_string($conn, $_POST['branch']);
   
   

 
    $insert ="UPDATE book SET id='$id',bookname='$bookname',details='$details',author='$author',publication='$publication',quantity='$quantity',branch='$branch' WHERE id='$id'";
    $sql=mysqli_query($conn, $insert);
    if($sql)
      {
         // echo "Update successfully";
         // header('location:admin.php');
      	echo "<script>
               alert('Book Updated Successfully!!');
               document.location.href='admin.php';
          </script>";
      }
      else
      {
          die(mysqli_error($conn));
      }
            // header('location:login_form.php');
      
   

};
?>
 


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Page</title>
	<link rel="stylesheet" type="text/css" href="adminstyle.css">
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

	<div class="main">
        
        <div>
            <a href="web.php"><img class="lg" src="lg.png"></a>
        </div>

        <div class="navbar">
            <div class="icon">
                <h2 class="logo">Online Library</h2>
            </div>
           


            <div class="menu">
                <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li><li></li>
                    <li></li>
                    <li></li>
                    <
                </ul>
            </div>   
        </div>

        <div class="innerdiv">
        	<div class="leftinnerdiv">
	        	<button class="grnbtn">Admin</button>
	        	<button class="grnbtn" onclick="openpart('upbooks')">UPDATE BOOKS</button>
	        	<button class="grnbtn" onclick="openpart('userdetails')">USER DETAILS</button>
	        	<button class="grnbtn" onclick="openpart('bookreport')">BOOK REPORT</button>
	        	<a href="adminlogout.php"><button class="grnbtn" onclick="openpart('logout')">Logout</button></a>

        	</div>


        	<!-- add book portion -->

        	<div class="rightinnerdiv">
	        	<div id="upbooks" class="innerright portion" style="display: none">
	        		<button class="grnbtn" >UPDATE BOOKS</button>
	        		<br><br><br>
	        		<form action="books.php" method="POST">
	        			<label class="flg">Book Name    :</label><input type="text" name="bookname" class="inpt" value="<?php echo $bookname?>"><br><br>
	        			<label class="flg">Details 		:</label><input type="text" name="details" class="inpt" value="<?php echo $details?>"><br><br>
	        			<label class="flg">Author    	:</label><input type="text" name="author" class="inpt" value="<?php echo $author?>"><br><br>
	        			<label class="flg">Publication	:</label><input type="text" name="publication" class="inpt" value="<?php echo $publication?>"><br><br>
	        			<label class="flg">Quantity 	:</label><input type="number" name="quantity" class="inpt" value="<?php echo $quantity?>"><br><br>
	        			<label class="flg">Branch       :</label> <label class="flg">BS   </label><input type="radio" name="branch" value="Bs">
	        											 <label class="flg">Applied Science   </label><input type="radio" name="branch" value="applied">
	        											<label class="flg">Technology   </label><input type="radio" name="branch" value="technology">
	        											<label class="flg">Others   </label><input type="radio" name="branch" value="others">
	        											<br><br>
	        											<label class="flg">Image of Book     :</label><input type="file" name="img" ><br><br>
	        											<button class="btn1" type="submit" value="submit" name="submit">Update</button>
	        
	   				</form>
	        	</div>

        		
        		<!-- bookreport -->
        		<div id="bookreport" class="innerright portion" style="display: none">
	        		<button class="grnbtn" >BOOK REPORT</button>
	        		<br><br><br>

	        		<table class="table">
					  <thead>
					    <tr class="text-light">
					      <th  scope="col">ID</th>
					      <th  scope="col">Book Name</th>
					      <th  scope="col">Details</th>
					      <th  scope="col">Author</th>
					      <th  scope="col">Publication</th>
					      <th  scope="col">Quantity</th>
					      <th  scope="col">Branch</th>
					      <th  scope="col">Operations</th>
					    </tr>
					  </thead>

					  <tbody>
					  	<?php
						
					  		$sql="SELECT * FROM book";
							$result=mysqli_query($conn,$sql);
							if($result)
							{
								while($row=mysqli_fetch_assoc($result))
								{
									$id=$row['id'];
									$bookname=$row['bookname'];
									$details=$row['details'];
									$author=$row['author'];
									$publication=$row['publication'];
									$quantity=$row['quantity'];
									$branch=$row['branch'];
									
									echo'<tr class="text-light">
							      <th scope="row">'.$id.'</th>
							      <td>'.$bookname.'</td>
							      <td>'.$details.'</td>
							      <td>'.$author.'</td>
							      <td>'.$publication.'</td>
							      <td>'.$quantity.'</td>
							      <td>'.$branch.'</td>
							      <td>
									    <button class="btn btn-primary"><a href="updatebk.php?updateid='.$id.'" class="text-light">Update</a></button>
									    <button class="btn btn-danger"><a href="deletebk.php?deleteid='.$id.'" class="text-light">Delete</a></button>
									</td>
							    </tr>';
								} 
							}
						?>
					    
					  </tbody>
					</table>
	        	</div>
        	</div>	
        </div>
    </div>

<script type="text/javascript">
	function openpart(portion)
	{
		var i;
		var x=document.getElementsByClassName("portion");
		for (i=0;i<x.length; i++)
		{
			x[i].style.display="none";
		}
		document.getElementById(portion).style.display="block";
	}



</script>

</body>
</html>