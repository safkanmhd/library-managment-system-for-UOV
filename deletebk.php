<?php
@include 'config.php';
if(isset($_GET['deleteid']))
{
	$id=$_GET['deleteid'];
	

	$sql="DELETE FROM book WHERE id='$id'";
	$result=mysqli_query($conn,$sql);
	if($result)
	{
		//header('location:admin.php');
		echo "<script>
               alert('Book Deleted Successfully!!');
               document.location.href='admin.php';
          </script>";
	}
	else
	{
		die(mysqli_error($conn));
	}
}
?>
 