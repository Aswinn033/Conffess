<?php
include ("config.php");
function initialize()
{
    session_start();
    if(!$_SESSION['userid'])
    {
        header("location: ../signin.php");
    }
}
?>