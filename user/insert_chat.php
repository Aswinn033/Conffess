<?php
	include("config.php");
	session_start();
		
		$msg=$_POST['message'];
        
		$to_id=$_SESSION['uid'];
        $from_id=$_SESSION['userid'];
		$query=mysqli_query($conn,"INSERT into tbl_message(to_id,from_id,message) values ('$to_id','$from_id', '$msg')");
        if(!$query)
        {
        die(mysqli_error($conn));
        }
    
	
?>