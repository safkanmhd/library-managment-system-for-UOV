<?php

@include 'config.php';

if(isset($_POST['submit'])){

   
   $bookname = mysqli_real_escape_string($conn, $_POST['bookname']);
   $details = mysqli_real_escape_string($conn, $_POST['details']);
   $author = mysqli_real_escape_string($conn, $_POST['author']);
   $publication = mysqli_real_escape_string($conn, $_POST['publication']);
   $quantity = $_POST['quantity'];
   $branch = $_POST['branch'];
   $img = $_POST['img'];

   
   if(isset($conn))
   {
      $insert = "INSERT INTO book(bookname,details,author,publication,quantity,branch,img) VALUES('$bookname','$details','$author','$publication','$quantity','$branch','$img')";
         mysqli_query($conn, $insert);
           //  header('location:admin.php');
           // echo"Connected"; 
            echo "<script>
               alert('Book Added Successfully!!');
               document.location.href='admin.php';
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
