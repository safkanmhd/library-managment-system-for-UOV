<?php
@include 'config.php';

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
                    <!--<li><a class="active" href="web.php">HOME</a></li>
                    <li><a href="https://vle.vau.ac.lk/login/index.php">LMS</a></li>
                    <li><a href="faculties.php">FACULTIES</a></li>
                    <li><a href="about.php">ABOUT</a></li>
                    <li><a href="staff.php">STAFF</a></li>-->

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
	        	<button class="grnbtn">Admin Dashboard</button>
	        	<button class="grnbtn" onclick="openpart('books')">ADD BOOKS</button>
	        	<button class="grnbtn" onclick="openpart('userdetails')">USER DETAILS</button>
	        	<button class="grnbtn" onclick="openpart('bookreport')">BOOK REPORT</button>
	        	<button class="grnbtn" onclick="openpart('bookrequest')">ACCEPT REQUEST</button>
	        	<button class="grnbtn" onclick="openpart('issuebooks')">ISSUED BOOKS</button>
	        	
	        	<a href="adminlogout.php"><button class="grnbtn" onclick="openpart('logout')">Logout</button></a>

        	</div>


        	<!-- add book portion -->

        	<div class="rightinnerdiv">
	        	<div id="books" class="innerright portion" style="display: none">
	        		<button class="grnbtn" >ADD BOOKS</button>
	        		<br><br><br>
	        		<form action="books.php" method="POST">
	        			<label class="flg">Book Name    :</label><input type="text" name="bookname" class="inpt"><br><br>
	        			<label class="flg">Details 		:</label><input type="text" name="details" class="inpt"><br><br>
	        			<label class="flg">Author    	:</label><input type="text" name="author" class="inpt"><br><br>
	        			<label class="flg">Publication	:</label><input type="text" name="publication" class="inpt"><br><br>
	        			<label class="flg">Quantity 	:</label><input type="number" name="quantity" class="inpt"><br><br>
	        			<label class="flg">Branch       :</label> <label class="flg">BS   </label><input type="radio" name="branch" value="Bs">
	        											 <label class="flg">Applied Science   </label><input type="radio" name="branch" value="applied">
	        											<label class="flg">Technology   </label><input type="radio" name="branch" value="technology">
	        											<label class="flg">Others   </label><input type="radio" name="branch" value="others">
	        											<br><br>
	        											<label class="flg">Image of Book     :</label><input type="file" name="img" ><br><br>
	        											<button class="btn1" type="submit" value="submit" name="submit">ADD BOOK</button>
	        
	   				</form>
	        	</div>

        		<!-- user details -->
        		<div id="userdetails" class="innerright portion" style="display: none">
	        		<button class="grnbtn" >USER DETAILS</button>
	        		<br><br><br>

	        		<table class="table">
					  <thead>
					    <tr class="text-light">
					      <th  scope="col">UserType</th>
					      <th  scope="col">FirstName</th>
					      <th  scope="col">Last Name</th>
					      <th  scope="col">RegNo</th>
					      <th  scope="col">Email</th>
					      <th  scope="col">ContactNo</th>
					      <th  scope="col">Faculty</th>
					      <th  scope="col">Gender</th>
					      <th  scope="col">Operations</th>
					    </tr>
					  </thead>

					  <tbody>
					  	<?php
						
						  	$sql="SELECT * FROM user_form";
							$result=mysqli_query($conn,$sql);
							if($result)
							{
								while($row=mysqli_fetch_assoc($result))
								{
									$user_type=$row['user_type'];
									$fname=$row['fname'];
									$lname=$row['lname'];
									$regno=$row['regno'];
									$email=$row['email'];
									$contact_no=$row['contact_no'];
									$faculty=$row['faculty'];
									$gender=$row['gender'];
									echo'<tr class="text-light">
							      <th scope="row">'.$user_type.'</th>
							      <td>'.$fname.'</td>
							      <td>'.$lname.'</td>
							      <td>'.$regno.'</td>
							      <td>'.$email.'</td>
							      <td>'.$contact_no.'</td>
							      <td>'.$faculty.'</td>
							      <td>'.$gender.'</td>
							      <td>
							      		<button class="btn btn-primary"><a href="update.php?updateid='.$regno.'" class="text-light">Update</a></button>
							      		<button class="btn btn-danger"><a href="delete.php?deleteid='.$regno.'" class="text-light">Delete</a></button>
							      </td>
							    </tr>';
								} 
							}
						?>
					    
					  </tbody>
					</table>

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

	        	<!-- acept request -->
        		<div id="bookrequest" class="innerright portion" style="display: none">
	        		<button class="grnbtn" >BOOK REQUEST</button>
	        		<br><br><br>

	        		<table class="table">
					  <thead>
					    <tr class="text-light">
					      <th  scope="col">ID</th>
					      <th  scope="col">First Name</th>
					      <th  scope="col">Last Name</th>
					      <th  scope="col">Email</th>
					      <th  scope="col">Book Name</th>
					      <th  scope="col">Author</th>
					      <th  scope="col">Days</th>
					      <th  scope="col">Operations</th>
					    </tr>
					  </thead>

					  <tbody>
					  	<?php
						
					  		$sql="SELECT * FROM bookreq";
							$result=mysqli_query($conn,$sql);
							if($result)
							{
								while($row=mysqli_fetch_assoc($result))
								{
									$id=$row['id'];
									$fname=$row['fname'];
									$lname=$row['lname'];
									$email=$row['email'];
									$bookname=$row['bookname'];
									$author=$row['author'];
									$days=$row['days'];
									
									echo'<tr class="text-light">
							      <th scope="row">'.$id.'</th>
							      <td>'.$fname.'</td>
							      <td>'.$lname.'</td>
							      <td>'.$email.'</td>
							      <td>'.$bookname.'</td>
							      <td>'.$author.'</td>
							      <td>'.$days.'</td>
							      <td>
									    <button class="btn btn-primary"><a href="acceptreq.php?borrowid='.$id.'" class="text-light">Accept</a></button>
									    <button class="btn btn-danger"><a href="bookreq_dlt.php?deleteid='.$id.'" class="text-light">Delete</a></button>
									    
									</td>
							    </tr>';
								} 
							}
						?>
					    
					  </tbody>
					</table>



	        	</div>

        		<!-- user details -->
        		<div id="issuebooks" class="innerright portion" style="display: none">
	        		<button class="grnbtn" >ISSUED BOOKS</button>
	        		<br><br><br>

	        		<table class="table">
					  <thead>
					    <tr class="text-light">
					      <th  scope="col">ID</th>
					      <th  scope="col">First Name</th>
					      <th  scope="col">Last Name</th>
					      <th  scope="col">Email</th>
					      <th  scope="col">Book Name</th>
					      <th  scope="col">Author</th>
					      <th  scope="col">Days</th>
					      
					    </tr>
					  </thead>

					  <tbody>
					  	<?php
						
					  		$sql="SELECT * FROM bookreq";
							$result=mysqli_query($conn,$sql);
							if($result)
							{
								while($row=mysqli_fetch_assoc($result))
								{
									$id=$row['id'];
									$fname=$row['fname'];
									$lname=$row['lname'];
									$email=$row['email'];
									$bookname=$row['bookname'];
									$author=$row['author'];
									$days=$row['days'];
									
									echo'<tr class="text-light">
							      <th scope="row">'.$id.'</th>
							      <td>'.$fname.'</td>
							      <td>'.$lname.'</td>
							      <td>'.$email.'</td>
							      <td>'.$bookname.'</td>
							      <td>'.$author.'</td>
							      <td>'.$days.'</td>
							      
							    </tr>';
								} 
							}
						?>
					    
					  </tbody>
					</table>



	        	</div>

	  
        	</div>


        		
       

















        	<<!-- div class="rightinnerdiv">
	        	<div id="bookrequest" class="innerright portion" style="display: none">
	        		<button class="grnbtn" >BOOK REQUEST</button>
	        		<br><br><br>
	        		<form>
	        			<label class="flg">Name     :</label><input type="text" name="addname"><br><br><br>
	        			<label class="flg">Password :</label><input type="password" name="addps"><br><br><br>
	        			<label class="flg">Email    :</label><input type="email" name="addemail"><br><br><br>
	        		</form>
	        	</div>
        	
        	</div> -->
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