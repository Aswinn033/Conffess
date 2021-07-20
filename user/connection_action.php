<?php
include("config.php");
session_start();
$uid=$_GET['u_id'];
echo $uid;
$connector=$_SESSION['userid'];
$result=mysqli_query($conn,"select * from tblconnect where user_id='$uid' and connector_id='$connector'");
$row=mysqli_fetch_array($result);
	if($row>0)
	{
		echo "<script>alert('You are already connected!!');</script>";
        header("location:../user/common_profile.php?u_id=".$uid);
	}
    else
    { 
        $sql=mysqli_query($conn,"insert into tblconnect(user_id,connector_id)values('$uid','$connector')");
    if($sql)
     {
       //$noti=$follower."Wants to connect with you";
      $sql2=mysqli_query($conn,"insert into connection_request(to_user,from_user)values('$uid','$connector')");
      if($sql2)
      {
       echo "<script>alert('Done');</script>";
       header("location:../user/common_profile.php?u_id=".$uid);
      }
      else
      {
        die(mysqli_error($conn));
      }
       //mysqli_close($conn);
     }  
    else
     {
       echo "<script>alert('An error occured please try again later!!');</script>";
       die(mysqli_error($conn));
     }
    }
    ?>