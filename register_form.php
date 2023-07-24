<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $user_type = $_POST['user_type'];
   $fname = mysqli_real_escape_string($conn, $_POST['fname']);
   $lname = mysqli_real_escape_string($conn, $_POST['lname']);
   $regno = mysqli_real_escape_string($conn, $_POST['regno']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $contactno = mysqli_real_escape_string($conn, $_POST['contactno']);
   $password = md5($_POST['password']);
   $cpassword = md5($_POST['cpassword']);
   $faculty = $_POST['faculty'];
   $gender = $_POST['gender'];
   $img = $_POST['img'];

   

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$password' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($password != $cpassword){
         $error[] = 'password not matched!';
      }else{
         $insert = " INSERT INTO user_form(user_type,fname,lname,regno,email,contact_no,password,faculty,gender,imagee) VALUES('$user_type','$fname','$lname','$regno','$email','$contactno','$password','$faculty','$gender','$img')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

};

 


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="adminloginpage.css">

</head>
<body>
   <div class="main">
   
<div class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>

      <select name="user_type">
         <option value="student">Student</option>
         <option value="staff">Staff</option>
      </select>
      <input type="text" name="fname" required placeholder="enter your first name">
      <input type="text" name="lname" required placeholder="enter your last name">
      <input type="text" name="regno" required placeholder="enter your register_no or staff_no">
      <input type="email" name="email" required placeholder="enter your email">
      <input type="number" name="contactno" required placeholder="enter your contact number">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password">

       <select name="faculty">
         <option value="bs">BS</option>
         <option value="applied">APPLIED</option>
         <option value="technology">TECHNOLOGY</option>
      </select>

      <div>
         <label for="rd1">Gender :</label>
         <input type="radio" name="gender" id="rd1" value="Male" required>
         <label for="rd1">Male</label>
         <input type="radio" name="gender" id="rd2" value="Female" required>
         <label for="rd2">Female</label>
      </div><br>

      <div>
         <label  for="rd1" class="input_field radio_option">Upload Image (Clear Photo of University id or Recordbook) :</label><br><br>
         <input type="file" name="img" required>
      </div>


           <!-- <input type="submit" name="submit" value="register now" class="form-btn"> -->
           <button class="form-btn" type="submit" value="submit" name="submit">register now</button>
      <p>already have an account? <a href="login_form.php">login now</a></p>
   </form>

</div>
</body>
</html>