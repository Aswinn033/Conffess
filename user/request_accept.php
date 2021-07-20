<?php
include("config.php");
session_start();
$fid=$_GET['r_id'];
$uid=$_SESSION['userid'];
date_default_timezone_set("Asia/Kolkata");
$dt=date("Y/m/d h:i:s a");
//$st="removed";
$sql=mysqli_query($conn,"UPDATE tblconnect set connection_status='accepted' where connector_id='$fid' and user_id='$uid'");
if($sql)
{
    $query=mysqli_query($conn,"DELETE from connection_request where to_user='$uid' and from_user='$fid'");
    $user_details=mysqli_query($conn,"SELECT user_name from tbluser where user_id='$uid'");
    $u_row=mysqli_fetch_array($user_details);
    $noti=$u_row['user_name']." accepted your connection request";
    $query2=mysqli_query($conn,"INSERT into notification(orgin_id,destination_id,notification,location_id,notification_date) values('$uid','$fid','$noti','$uid','$dt') ");
    if($query2)
    {
        header("location:../user/connection_requests.php");
    }
    else
    {
        die(mysqli_error($conn));
    }
    
}
else
{
    die(mysqli_error($conn));
}
?>