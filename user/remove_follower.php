<?php
include("config.php");
session_start();
$fid=$_GET['f_id'];
$uid=$_SESSION['userid'];
$st="removed";
$sql=mysqli_query($conn,"UPDATE tblfollow set follow_status='$st' where follower_id='$fid' and user_id='$uid'");
if($sql)
{
    header("location:../user/follow.php");
}
else
{
    die(mysqli_error($conn));
}
?>