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
    <link rel="stylesheet" href="style2/style5.css">
</head>

<body>
    <div class="sidebar-container">
        <div class="sidebar-logo">
          Conffess
        </div>
        <ul class="sidebar-navigation">
          <li class="header">Navigation</li>
          <li>
            <a href="../user/index1.php" >
              <i class="fa fa-home" aria-hidden="true"></i> Home
            </a>
          </li>
          <li>
            <a href="../user/confession.php">
                <i class="fa fa-pencil" aria-hidden="true"></i> Publish
            </a></li>
          <!--</li>
          <li class="header">Another Menu</li>
          <li>-->
              <li>
            <a href="../user/follow.php">
              <i class="fa fa-users" aria-hidden="true"></i> Following
            </a>
          </li>
          <li>
            <a href="../user/notifications.php">
            <i class="fa fa-bell" aria-hidden="true"></i> Notifications&nbsp;<?php $uid=$_SESSION['userid']; $d="pending";$ch=mysqli_query($conn,"SELECT COUNT(notification_id) as notifi from notification where destination_id='$uid'and status='$d'"); $row_ch=mysqli_fetch_array($ch); echo $row_ch['notifi'];?>
            </a>
          </li>
          <li>
            <a href="../user/user_profile.php" active="true">
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
      
          <!-- Main component for a primary marketing message or call to action -->

          <div class="container mt-5 d-flex justify-content-center">
          <?php
                //session_start();
                $user=$_GET['u_id'];
                                        $result=mysqli_query($conn,"SELECT * FROM tbluser where user_id='$user' ");
                                        //die(mysqli_error($conn));
  
     while($row=mysqli_fetch_array($result))
							{
								?>
    <div class="card p-4 mt-3">
        <div class="first">
            <h6 class="heading">Account Details</h6>
            <div class="time d-flex flex-row align-items-center justify-content-between mt-3">
                <div class="d-flex align-items-center">  <span class="hour ml-1"></span> </div>
                <div> <span class="font-weight-bold"></span> </div>
            </div>
        </div>
        <div class="second d-flex flex-row mt-2">
            <div class="image mr-3"> <img src="../upload/<?php echo $row['photo']?>" class="rounded-circle" width="60" /> </div>
            <div class="">
                <div class="d-flex flex-row mb-1"> <span>@<?php echo $row['user_name']?></span>
                    <div class="ratings ml-2"></div>
                </div>
                <div> <!--<button class="btn btn-outline-dark btn-sm px-2">Upload Photo</button>-->  </div>
            </div>
        </div>
        <hr class="line-color">
        <!--<h6>48 comments</h6>-->
        <?php 
        $uid=$_SESSION['userid'];
        $sql=mysqli_query($conn,"SELECT * from tblconnect where user_id='$uid' and connector_id='$user' or user_id='$user' and connector_id='$uid' ");
        $check_row=mysqli_fetch_array($sql);
        if($uid==$user)
        {
         echo '<div class="third mt-4">'; echo '<button class="btn btn-success btn-block"><a href="user_profile.php">Go to profile</a></button>';
        echo '</div>';
        }
        else if($check_row['connection_status']=='accepted')
        {
          echo '<div class="third mt-4">'; echo '<button class="btn btn-success btn-block"><a href="#">Message</a></button>';
          echo '</div>';
        }
        else if($check_row['connection_status']=='pending')
        {
          echo '<div class="third mt-4">'; echo '<h5>Connection request send</h5>';
          echo '</div>';
        }
        else
        {
          echo '<div class="third mt-4">'; echo '<button class="btn btn-success btn-block"><a href="connection_action.php?u_id='.$user.'">Connect</a></button>';
          echo '</div>';
        
        }
        ?>
    </div>
</div>
</div>
<?php
              }
              ?>


        </div>
      </div>
    </body>

</html>