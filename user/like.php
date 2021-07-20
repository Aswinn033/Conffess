<?php
    include("config.php");
    session_start();
    $cid=$_GET['c_id'];
    $uid=$_SESSION['userid'];
    $result=mysqli_query($conn,"select * from tbllike where user_id='$uid'");
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
       echo "<script>alert('Done');";
       header("location:../user/view_confession.php?c_id=".$cid);
       
     }  
    else
     {
       echo "<script>alert('An error occured please try again later!!');</script>";
       header("location:../user/view_confession.php?c_id=".$cid);
       die(mysqli_error($conn));
     }
    }
?>