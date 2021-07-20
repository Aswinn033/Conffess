<?php
session_start();
include("config.php");
if(isset($_POST["btnsubmit"])&&isset($_FILES['photo']))
{
   
     $loc= "../upload/";
     $uid=$_SESSION['userid'];
     $s=$_FILES['photo'] ['name'];
     if(move_uploaded_file($_FILES['photo']['tmp_name'],$loc.$s))
     {
     $sql=mysqli_query($conn,"UPDATE tbluser SET photo='$s' where user_id='$uid'");
     if($sql)
     {
        
        echo "<script>alert('file added!');</script>";
     }  
     else
     {
        echo mysqli_error($conn);
        echo "<script>alert('An error occured please try again later!!');</script>";
     }
    }
    else
    {
        echo "error";
    }
    

}
?>