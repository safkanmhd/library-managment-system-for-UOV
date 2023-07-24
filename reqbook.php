<?php

@include 'config.php';

if(isset($_POST['submit'])){

   
   $fname = mysqli_real_escape_string($conn, $_POST['fname']);
   $lname = mysqli_real_escape_string($conn, $_POST['lname']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $bookname = mysqli_real_escape_string($conn, $_POST['bookname']);
   $author = mysqli_real_escape_string($conn, $_POST['author']);
   $days = $_POST['days'];
   
   
   if(isset($conn))
   {
      $insert = "INSERT INTO bookreq(fname,lname,email,bookname,author,days) VALUES('$fname','$lname','$email','$bookname','$author','$days')";
        mysqli_query($conn, $insert);
        // header('location:library.php');
        // echo"Connected"; 
        echo "<script>
               alert('Book Requested Successfully!! Check Your Mail!!');
               document.location.href='library.php';
          </script>";

         
   }
   else
   {
      echo"Not connected!!!!";
   }
   
      
   

}
else
    {
        echo"failed looser!!!!";
    }


?>
