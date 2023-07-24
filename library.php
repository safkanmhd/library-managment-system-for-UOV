<?php

@include 'config.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>library Page</title>
	<link rel="stylesheet" type="text/css" href="librarystylee.css">
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
	        	<button class="grnbtn" onclick="openpart('st_dashboard')">Student & Staff Dashboard</button>
	        	<button class="grnbtn" onclick="openpart('viewbooks')">VIEW BOOKS</button>
	        	<button class="grnbtn" onclick="openpart('requestbook')">REQUEST BOOK</button>
	        	<button class="grnbtn" onclick="openpart('bookrequestreport')">BOOK REQUEST REPORT</button>
	        	<a href="https://vau.ac.lk/e-resources/"><button class="grnbtn" onclick="openpart('eresource')">E-RESOURCE</button></a>
	        	<a href="http://drr.vau.ac.lk/"><button class="grnbtn" onclick="openpart('drr')">Digital Research Repository</button></a>
	        	<!-- <button class="grnbtn" onclick="openpart('bookrequest')">###</button>
	        	<button class="grnbtn" onclick="openpart('issuebooks')">###</button>
	        	<button class="grnbtn" onclick="openpart('issuereport')">###</button> -->
	        	<a href="librarylogout.php"><button class="grnbtn" onclick="openpart('logout')">Logout</button></a>

        	</div>



        	


        	<!-- view book portion -->

        	<div class="rightinnerdiv">
        		


	        	<div id="viewbooks" class="innerright portion" style="display: none">
	        		<button class="grnbtn" >VIEW BOOKS</button>
	        		<br><br><br>
	        		
	        		<table class="table">
					  <thead>
					    <tr class="text-light">
					      <th  scope="col">Book Name</th>
					      <th  scope="col">Details</th>
					      <th  scope="col">Author</th>
					      <th  scope="col">Publication</th>
					      <th  scope="col">Quantity</th>
					      <th  scope="col">Branch</th>
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
									$bookname=$row['bookname'];
									$details=$row['details'];
									$author=$row['author'];
									$publication=$row['publication'];
									$quantity=$row['quantity'];
									$branch=$row['branch'];
									
									echo'<tr class="text-light">
							      <th scope="row">'.$bookname.'</th>
							      <td>'.$details.'</td>
							      <td>'.$author.'</td>
							      <td>'.$publication.'</td>
							      <td>'.$quantity.'</td>
							      <td>'.$branch.'</td>
							    </tr>';
								} 
							}
						?>
					    
					  </tbody>
					</table>

	        	</div>

        		<!-- request book -->
        		<div id="requestbook" class="innerright portion" style="display: none">
	        		<button class="grnbtn" >REQUEST BOOK</button>
	        		<br><br><br>

	        		<form action="reqbook.php" method="POST">
	        			<label style="color: red;font-size: 25px;">Note : If Your Borrowing Period Is Over You want To pay 100/= Per Day As Fine</label><br><br>
	        			<label class="flg">First Name    :</label><input type="text" name="fname" class="inpt"><br><br>
	        			<label class="flg">Last Name 		:</label><input type="text" name="lname" class="inpt"><br><br>
	        			<label class="flg">Email   	:</label><input type="email" name="email" class="inpt"><br><br>
	        			<label class="flg">Book Name	:</label><input type="text" name="bookname" class="inpt"><br><br>
	        			<label class="flg">Author 	:</label><input type="text" name="author" class="inpt"><br><br>
	        			<label class="flg">Borrow Days       :</label></label><input type="number" name="days" class="inpt"><br><br>
	        			<br><br>
	        			<button class="btn1" type="submit" value="submit" name="submit">REQUEST BOOK</button> 
	        
	   				</form>
	        	</div>

	        	<!-- see reqst -->
	        	<div id="bookrequestreport" class="innerright portion" style="display: none">
	        		<button class="grnbtn" >VIEW BOOK REQUEST REPORT</button>
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