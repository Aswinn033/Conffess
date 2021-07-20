<!DOCTYPE html>
<html>

<head>
<?php
  include("config.php");
  session_start();
  ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conffess- Secret Confessions</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <!--<link rel="stylesheet" href="assets/css/style.css">-->
    <link rel="stylesheet" href="style2/style3.css">
    <link rel="stylesheet" href="style2/style6.css">
</head>

<body>
    <div class="sidebar-container">
        <div class="sidebar-logo">
          Conffess
        </div>
        <ul class="sidebar-navigation">
          <li class="header">Navigation</li>
          <li>
            <a href="../user/index1.php">
              <i class="fa fa-home" aria-hidden="true"></i> Home
            </a>
          </li>
          <li>
            <a href="confession.php">
                <i class="fa fa-pencil" aria-hidden="true"></i> Publish
            </a></li>
          <!--</li>
          <li class="header">Another Menu</li>
          <li>-->
          <li>
            <a href="../user/message_list.php">
            <i class="fa fa-comments" aria-hidden="true"></i> Message 
            </a>
          </li>
          <li>
            <a href="../user/connection_requests.php">
            <i class="fa fa-exclamation-circle" aria-hidden="true"></i> Requests <?php $uid=$_SESSION['userid']; $d="pending";$ch=mysqli_query($conn,"SELECT COUNT(connection_request_id) as con from connection_request where to_user='$uid'"); $row_ch=mysqli_fetch_array($ch); if($row_ch['con']==0){} else {echo $row_ch['con'];}?>
            </a>
          </li>
              <li>
            <a href="../user/connections.php">
            <i class="fa fa-users" aria-hidden="true"></i> Connections 
            </a>
          </li>
          <li>
            <a href="../user/notifications.php">
            <i class="fa fa-bell" aria-hidden="true"></i> Notifications&nbsp;<?php $d="pending";$ch=mysqli_query($conn,"SELECT COUNT(notification_id) as notifi from notification where destination_id='$uid'and status='$d'"); $row_ch=mysqli_fetch_array($ch); if($row_ch['notifi']==0){} else {echo $row_ch['notifi'];}?>
            </a>
          </li>
          <li>
            <a href="user_profile.php">
              <i class="fa fa-cog" aria-hidden="true"></i> Account
            </a>
          </li>
          <li>
            <a href="#">
                <i class="fa fa-search-plus" aria-hidden="true"></i> Search
            </a>
          </li>
          <li>
            <a href="../user/logout.php">
              <i class="fa fa-info-circle" aria-hidden="true"></i> Sign Out
            </a>
          </li>
        </ul>
      </div>
      
      <div class="content-container">
      
        <div class="container-fluid">
        <!-- main contents--->
       <div align="center"> <form id="photo" method="post" action="upload_photo_action.php" enctype="multipart/form-data"><input id="photo" type="file" name="photo"><input type="submit" name="btnsubmit" value="Upload"></form></div>

       </div>
      </div>
    </body>

</html>