<?php
    include("config.php");
    session_start();
    $cid=$_GET['c_id'];
   // echo $cid;
    $uid=$_SESSION['userid'];
    date_default_timezone_set("Asia/Kolkata");
    $dt=date("Y/m/d h:i:s a");
    //echo $uid;
    $result=mysqli_query($conn,"select * from tbllike where user_id='$uid' and confession_id='$cid'");
    if($result)
    {
    $row=mysqli_fetch_array($result);
	if($row>0)
	{
		echo "<script>alert('Already liked!!');</script>";
       header("location:../user/view_confession.php?c_id=".$cid);
	}
    else{
    $sql=mysqli_query($conn,"insert into tbllike(confession_id,user_id)values('$cid','$uid')");
    if($sql)
     {
      $get_confession_user=mysqli_query($conn,"select user_id from confession where confession_id='$cid'");
      $confession_row=mysqli_fetch_array($get_confession_user);
      $user=$confession_row['user_id'];
      $get_user_name=mysqli_query($conn,"select user_name from tbluser where user_id='$user'");
      $user_row=mysqli_fetch_array($get_user_name);
      $noti=$user_row['user_name']."  liked your post";
      $sql2=mysqli_query($conn,"insert into notification(orgin_id,destination_id,notification,location_id,notification_date)values('$uid','$user','$noti','$cid','$dt')");
      if($sql2)
      {
       echo "<script>alert('Done');";
       header("location:../user/view_confession.php?c_id=".$cid);
      }
      else
      {
        die(mysqli_error($conn));
      }
       echo "<script>alert('Done');";
       header("location:../user/view_confession.php?c_id=".$cid);
       
     }  
    else
     {
       echo "<script>alert('An error occured please try again later!!');</script>";
      // header("location:../user/view_confession.php?c_id=".$cid);
       die(mysqli_error($conn));
     }
    }
}
else
{
    echo "fatal error";
    die(mysqli_error($conn));
}
?>