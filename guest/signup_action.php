<?php
//include("../app/server/config.php");
include("config.php");
if(isset($_POST["btnsubmit"]))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $result=mysqli_query($conn,"select * from tbluser where user_name='$username'");
	$row=mysqli_fetch_array($result);
	if($row>0)
	{
		echo "<script>alert('Username already taken!!');window.location='signup.php'</script>";
	}
    else
    { 
    $ph="def.jpg"; 
    $hash=base64_encode($password);
    $sql=mysqli_query($conn,"insert into tbluser(user_name,pass,photo)values('$username','$hash','$ph')");
    if($sql)
     {
       echo "<script>alert('Registerd succesfully,Please login to continue');window.location='signin.php'</script>";
       mysqli_close($conn);
     }  
    else
     {
       echo "<script>alert('An error occured please try again later!!');window.location='signup.php'</script>";
     }
    }
}
    
?>