<?php
include("../app/server/config.php");
function login($uname,$pass)
{
    $username=$uname;
    $password=$pass;  
    $result=mysqli_query($conn,"select * from tbluser where user_name='$username'");
	$row=mysqli_fetch_array($result);
	if($row>0)
	{
		echo "<script>alert('Username already taken!!');window.location='signup.php'</script>";
	}
     
    $ph="def"; 
    login($username,$password);
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

?>