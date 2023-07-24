<?php

@include 'config.php';
$regno=$_GET['updateid'];
$sql="SELECT * FROM user_form WHERE regno='$regno'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$user_type=$row['user_type'];
$fname=$row['fname'];
$lname=$row['lname'];
$regno=$row['regno'];
$email=$row['email'];
$contact_no=$row['contact_no'];
$faculty=$row['faculty'];
$gender=$row['gender'];

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

   if(mysqli_num_rows($result) > 0)
   {

      $error[] = 'user already exist!';

   }
   else
   {

      if($password != $cpassword)
      {
         $error[] = 'password not matched!';
      }
      else
      {
         $insert ="UPDATE user_form SET regno='$regno',user_type='$user_type',fname='$fname',lname='$lname',email='$email',contact_no='$contactno',password='$password',faculty='$faculty',gender='$gender',imagee='$img' WHERE regno='$regno'";
         $sql=mysqli_query($conn, $insert);
         if($sql)
         {
            echo "<script>
               alert('User Updated Successfully!!');
               document.location.href='admin.php';
          </script>";
         }
         else
         {
            die(mysqli_error($conn));
         }
               // header('location:login_form.php');
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
   <title>Update form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   <div class="main">
   
<div class="form-container">

   <form action="" method="post">
      <h3>UPDATE NOW!</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>

      <select name="user_type" >
         <option value="student">Student</option>
         <option value="staff">Staff</option>
      </select>
      <input type="text" name="fname" required placeholder="enter your first name" value="<?php echo $fname?>">
      <input type="text" name="lname" required placeholder="enter your last name" value="<?php echo $lname?>">
      <input type="text" name="regno" required placeholder="enter your register_no or staff_no" value="<?php echo $regno?>">
      <input type="email" name="email" required placeholder="enter your email" value="<?php echo $email?>">
      <input type="number" name="contactno" required placeholder="enter your contact number" value="<?php echo $contact_no?>">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password" >

       <select name="faculty" >
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
           <button class="form-btn" type="submit" value="submit" name="submit">Update</button>
      
   </form>

</div>
</body>
</html>