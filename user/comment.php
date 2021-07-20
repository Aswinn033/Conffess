<?php
    if(isset($_POST["btnsubmit"]))
    {
    include("config.php");
    session_start();
    $comment=$_POST['comment'];
    $purified_comment=strip_tags($comment);
    $cid=$_SESSION['cid'];
    $uid=$_SESSION['userid'];
    date_default_timezone_set("Asia/Kolkata");
    $dt=date("Y/m/d h:i:s a");
    $sql=mysqli_query($conn,"insert into tblcomment(confession_id,user_id,comment,date)values('$cid','$uid','$purified_comment','$dt')");
    if($sql)
     {
      $get_confession_user=mysqli_query($conn,"select user_id from confession where confession_id='$cid'");
      $confession_row=mysqli_fetch_array($get_confession_user);
      $user=$confession_row['user_id'];
      $get_user_name=mysqli_query($conn,"select user_name from tbluser where user_id='$user'");
      $user_row=mysqli_fetch_array($get_user_name);
      $noti=$user_row['user_name']."  commented on your post";
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
       
     }  
    else
     {
       echo "<script>alert('An error occured please try again later!!');</script>";
       die(mysqli_error($conn));
       header("location:../user/view_confession.php?c_id=".$cid);
      
     }
    }
    
?>