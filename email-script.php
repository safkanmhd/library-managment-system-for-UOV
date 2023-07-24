<?php
     use PHPMailer\PHPMailer\PHPMailer;
     use PHPMailer\PHPMailer\Exception;
     use PHPMailer\PHPMailer\POP3;
     use PHPMailer\PHPMailer\SMTP;

     require 'PHPmailer/src/Exception.php';
     require 'PHPmailer/src/PHPMailer.php';
     require 'PHPmailer/src/SMTP.php';

      if(isset($_POST['submit']))
      {
        $mail = new PHPMailer(true);
          $mail -> isSMTP();
          $mail -> Host = "smtp.gmail.com";
          $mail -> SMTPAuth = "true";
          $mail -> Username = "libraryUov123@gmail.com"; //your gmail
          $mail -> Password = "iojfhjbhpdkzukci"; //your gmail app password
          $mail -> SMTPSecure = "ssl";
          $mail -> Port = "465";
          $mail -> setFrom("libraryUov123@gmail.com", "Book Request Is Approved!!"); //your gmail
          $mail -> addAddress($_POST['email']);
          $mail -> isHTML(true);
          $mail -> Subject = $_POST['subject'];
          $mail -> Body = $_POST['message'];
          $mail -> Send();

          echo "<script>
               alert('Book Approvel Email Send Successfully!!');
               document.location.href='admin.php';
          </script>";


          
      }

?>