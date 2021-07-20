<?php
session_start();
include("config.php");
$id=$_SESSION['userid'];
$sql=mysqli_query($conn,"UPDATE tbluser set status='offline' where user_id='$id'");
if($sql)
{
    session_destroy();
    header("location:../index1_main.php");
}
?>