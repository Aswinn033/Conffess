<?php
session_start();
include("config.php");
if(isset($_POST["btnsubmit"]))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $hash=base64_encode($password);
    $result=mysqli_query($conn,"select * from tbluser where user_name='$username' and pass='$hash'");
	$row=mysqli_fetch_array($result);
	if($row>0)
	{
		$_SESSION["userid"]=$row["user_id"];
		$id=$row["user_id"];
		$sql=mysqli_query($conn,"UPDATE tbluser set status='online' where user_id='$id'");
		header("location:../user/index1.php");
	}
	else
	{
		echo "<script>alert('Invalid Username/Password!!');</script>";
        mysqli_error($conn);
	}
}
?>