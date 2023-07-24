<?php
@include 'config.php';
if(isset($_GET['deleteid']))
{
	$regno=$_GET['deleteid'];

	$sql="DELETE FROM user_form WHERE regno='$regno'";
	$result=mysqli_query($conn,$sql);
	if($result)
	{
		// header('location:admin.php');
		echo "<script>
               alert('User Deleted Successfully!!');
               document.location.href='admin.php';
          </script>";
	}
	else
	{
		die(mysqli_error($conn));
	}
}
?>
 