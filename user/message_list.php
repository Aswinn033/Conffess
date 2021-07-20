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
    <link rel="stylesheet" href="style2/message_list.css">
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
<!-- start message-->

<div class="row d-flex justify-content-center mt-100 mb-100">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body text-center">
                <h4 class="card-title">Your Connections</h4>
            </div>
            <div class="comment-widgets">
                <!-- Comment Row -->
                <?php
    
                                        $result=mysqli_query($conn,"SELECT * FROM tblconnect where user_id='$uid'  and connection_status='accepted'");
                                        //$seen=mysqli_query($conn,"UPDATE notification set status='seen' where destination_id='$user'");
                                        //$result2=mysqli_query($conn,"SELECT * FROM confession c inner join tbluser u on c.user_id= u.user_id order by confession_id ");
                                        //die(mysqli_error($conn));
  
            while($row=mysqli_fetch_array($result))
							{
                $fid=$row['connector_id'];
                $follower_details=mysqli_query($conn,"SELECT user_name, photo, status from tbluser where user_id='$fid'");
                $f_row=mysqli_fetch_array($follower_details);
								?>
                <div class="d-flex flex-row comment-row m-t-0">
                    <div class="p-2"><img src="../upload/<?php echo $f_row['photo']; ?>" alt="user" width="50" class="rounded-circle"></div>
                    <div class="comment-text w-100">
                        <h6 class="font-medium"><?php echo $f_row['user_name']; ?> &nbsp; (<?php echo $f_row['status']; ?>)</h6> <span class="m-b-15 d-block">This is awesome website. I would love to comeback again. </span>
                        <div class="comment-footer"> <span class="text-muted float-right">April 14, 2019</span> <button type="button" class="btn btn-cyan btn-sm"><a href="message.php?u_id=<?php echo $fid; ?>">Message</a></button><!-- <button type="button" class="btn btn-success btn-sm"></button> <button type="button" class="btn btn-danger btn-sm">Delete</button>--> </div>
                    </div>
                </div> <!-- Comment Row -->
                <!--<div class="d-flex flex-row comment-row">
                    <div class="p-2"><img src="https://i.imgur.com/8RKXAIV.jpg" alt="user" width="50" class="rounded-circle"></div>
                    <div class="comment-text active w-100">
                        <h6 class="font-medium">Michael Hussey</h6> <span class="m-b-15 d-block">Thanks bbbootstrap.com for providing such useful snippets. </span>
                        <div class="comment-footer"> <span class="text-muted float-right">May 10, 2019</span> <button type="button" class="btn btn-cyan btn-sm">Edit</button> <button type="button" class="btn btn-success btn-sm">Publish</button> <button type="button" class="btn btn-danger btn-sm">Delete</button> </div>
                    </div>
                </div> <!-- Comment Row -->
               <!-- <div class="d-flex flex-row comment-row">
                    <div class="p-2"><img src="https://i.imgur.com/J6l19aF.jpg" alt="user" width="50" class="rounded-circle"></div>
                    <div class="comment-text w-100">
                        <h6 class="font-medium">Johnathan Doeting</h6> <span class="m-b-15 d-block">Great industry leaders are not the real heroes of stock market. </span>
                        <div class="comment-footer"> <span class="text-muted float-right">August 1, 2019</span> <button type="button" class="btn btn-cyan btn-sm">Edit</button> <button type="button" class="btn btn-success btn-sm">Publish</button> <button type="button" class="btn btn-danger btn-sm">Delete</button> </div>
                    </div>
                </div>
            </div> <!-- Card -->
            <?php
                        }
                        ?>
        </div>
    </div>
</div>

<!-- end message-->





     </div>
      </div>
     </body>

</html>