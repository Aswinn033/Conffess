<!DOCTYPE html>
<html>

<head>
<?php
  include("config.php");
  session_start();
  $uid=$_SESSION['userid'];
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
            <a href="../user/follow.php">
            <i class="fa fa-users" aria-hidden="true"></i> Following 
            </a>
          </li>
          <li>
            <a href="../user/notifications.php">
            <i class="fa fa-bell" aria-hidden="true"></i> Notifications&nbsp;<?php $d="pending";$ch=mysqli_query($conn,"SELECT COUNT(notification_id) as notifi from notification where destination_id='$uid'and status='$d'"); $row_ch=mysqli_fetch_array($ch); echo $row_ch['notifi'];?>
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
            <a href="../index1.html">
              <i class="fa fa-info-circle" aria-hidden="true"></i> Sign Out
            </a>
          </li>
        </ul>
      </div>
      
      <div class="content-container">
      
        <div class="container-fluid">
        <!-- followers-->
        <div class="jumbotron">
            <h1>Popular Confessions</h1>
            <div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
        <?php
                                        $result=mysqli_query($conn,"SELECT * FROM tblfollow f inner join tbluser u on f.follower_id=u.user_id where f.user_id='$uid'" );
                                        //$result2=mysqli_query($conn,"SELECT user_name,photo FROM tbluser where user_id=  ");
                                        die(mysqli_error($conn));
  
     while($row=mysqli_fetch_array($result))
							{
								?>
            <div class="headings d-flex justify-content-between align-items-center mb-3">
                <h5></h5>
                <div class="buttons"> <span class="badge bg-white d-flex flex-row align-items-center"> <span class="text-primary"></span>
                        <div class="form-check form-switch"> <!--<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>--> </div>
                    </span> </div>
            </div>
            <div class="card p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="user d-flex flex-row align-items-center"> <img src="../upload/<?php echo $row['photo']; ?>" width="30" class="user-img rounded-circle mr-2"> <span><small class="font-weight-bold text-primary"><?php echo $row['user_name']?></small> <small class="font-weight-bold"><a>view</a></small></span> </div> <small></small>
                </div>
                <div class="action d-flex justify-content-between mt-2 align-items-center">
                    <div class="reply px-4"></div>
                    <div class="icons align-items-center"> <i class="fa fa-star text-warning"></i> <i class="fa fa-check-circle-o check-icon"></i> </div>
                </div>
            </div>
            <!--<div class="card p-3 mt-2">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="user d-flex flex-row align-items-center"> <img src="https://i.imgur.com/C4egmYM.jpg" width="30" class="user-img rounded-circle mr-2"> <span><small class="font-weight-bold text-primary">olan_sams</small> <small class="font-weight-bold">Loving your work and profile! </small></span> </div> <small>3 days ago</small>
                </div>
                <div class="action d-flex justify-content-between mt-2 align-items-center">
                    <div class="reply px-4"> <small>Remove</small> <span class="dots"></span> <small>Reply</small> <span class="dots"></span> <small>Translate</small> </div>
                    <div class="icons align-items-center"> <i class="fa fa-check-circle-o check-icon text-primary"></i> </div>
                </div>
            </div>
            <div class="card p-3 mt-2">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="user d-flex flex-row align-items-center"> <img src="https://i.imgur.com/0LKZQYM.jpg" width="30" class="user-img rounded-circle mr-2"> <span><small class="font-weight-bold text-primary">rashida_jones</small> <small class="font-weight-bold">Really cool Which filter are you using? </small></span> </div> <small>3 days ago</small>
                </div>
                <div class="action d-flex justify-content-between mt-2 align-items-center">
                    <div class="reply px-4"> <small>Remove</small> <span class="dots"></span> <small>Reply</small> <span class="dots"></span> <small>Translate</small> </div>
                    <div class="icons align-items-center"> <i class="fa fa-user-plus text-muted"></i> <i class="fa fa-star-o text-muted"></i> <i class="fa fa-check-circle-o check-icon text-primary"></i> </div>
                </div>
            </div>
            <div class="card p-3 mt-2">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="user d-flex flex-row align-items-center"> <img src="https://i.imgur.com/ZSkeqnd.jpg" width="30" class="user-img rounded-circle mr-2"> <span><small class="font-weight-bold text-primary">simona_rnasi</small> <small class="font-weight-bold text-primary">@macky_lones</small> <small class="font-weight-bold text-primary">@rashida_jones</small> <small class="font-weight-bold">Thanks </small></span> </div> <small>3 days ago</small>
                </div>
                <div class="action d-flex justify-content-between mt-2 align-items-center">
                    <div class="reply px-4"> <small>Remove</small> <span class="dots"></span> <small>Reply</small> <span class="dots"></span> <small>Translate</small> </div>
                    <div class="icons align-items-center"> <i class="fa fa-check-circle-o check-icon text-primary"></i> </div>
                </div>
            </div>-->
            <?php
              }
              ?>
        </div>
    </div>
</div>

          
      
        </div>
      </div>
    </body>

</html>