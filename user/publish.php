<?php
session_start();
include("config.php");
if(isset($_POST["btnsubmit"]))
{
    $confess=$_POST['confession'];
    $purified_confess=strip_tags($confess);
	  $user=$_SESSION["userid"];
    $dt=date("Y/m/d");
    $sql=mysqli_query($conn,"insert into confession(user_id,confession,date)values('$user','$purified_confess','$dt')");
    if($sql)
     {
       echo "<script>alert('Your confession is published');window.location='confession.php'</script>";
       //mysqli_close($conn);
     }  
    else
     {
       echo "<script>alert('An error occured please try again !!');</script>";
       die(mysqli_error($conn));
     }
    
	
}
?>