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
   <!-- <link rel="stylesheet" href="style2/comment_list.css">-->
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
            <i class="fa fa-exclamation-circle" aria-hidden="true"></i> Requests <?php $uid=$_SESSION['userid']; $d="pending";$ch=mysqli_query($conn,"SELECT COUNT(connection_request_id) as con from connection_request where to_user='$uid'"); $row_ch=mysqli_fetch_array($ch); if($row_ch['con']==0){} else {echo '<b>'; echo $row_ch['con']; echo '</b>';}?>
            </a>
          </li>
              <li>
            <a href="../user/connections.php">
            <i class="fa fa-users" aria-hidden="true"></i> Connections 
            </a>
          </li>
          <li>
            <a href="../user/notifications.php">
            <i class="fa fa-bell" aria-hidden="true"></i> Notifications&nbsp;<?php $d="pending";$ch=mysqli_query($conn,"SELECT COUNT(notification_id) as notifi from notification where destination_id='$uid'and status='$d'"); $row_ch=mysqli_fetch_array($ch); if($row_ch['notifi']==0){} else { echo '<b>'; echo $row_ch['notifi']; echo '</b>';}?>
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
      
          <!-- Main component for a primary marketing message or call to action -->
          <div class="jumbotron">
            <h1></h1>
            <div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
        <?php
        $cid=$_GET['c_id'];
        $_SESSION['cid']=$cid;
                                        $result=mysqli_query($conn,"SELECT * FROM confession c inner join tbluser u on c.user_id= u.user_id where confession_id='$cid' ");
                                       
                                        //die(mysqli_error($conn));
  
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
                    <div class="user d-flex flex-row align-items-center"> <img src="../upload/<?php echo $row['photo']?>" width="30" class="user-img rounded-circle mr-2"> <span><small class="font-weight-bold text-primary"><a href="common_profile.php?u_id=<?php echo $row['user_id']?>"><?php echo $row['user_name']?></a></small> <small class="font-weight-bold"><?php $content=$row['confession']; echo $content;?></a></small></span> </div> <small></small>
                </div>
                <div class="action d-flex justify-content-between mt-2 align-items-center">
                    <div class="reply px-4"><?php 
                    $cd=$row['confession_id'];
                    $result1=mysqli_query($conn,"SELECT COUNT(like_id) as likes FROM tbllike where confession_id='$cd' "); $row1=mysqli_fetch_array($result1); echo $row1['likes']; ?> <a href="like_process.php?c_id=<?php echo $row['confession_id'] ?>"> <i class="fa fa-thumbs-up" aria-hidden="true"></i></a><span class="dots"></span>
                    <?php 
                    $cd2=$row['confession_id'];
                    $result2=mysqli_query($conn,"SELECT COUNT(comment_id) as comments FROM tblcomment where confession_id='$cd2' "); $row2=mysqli_fetch_array($result2); echo $row2['comments']; ?>&nbsp;Comments<span class="dots"></span>&nbsp;Published on <?php echo $row['date'];?></div>
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

<!-- comment start-->
<div class="jumbotron">
            <h3 align="center">Comments</h3>
            <div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
        <form id="cmt" method="post" action="comment.php"><input type="text" name="comment" placeholder="Add comment" style="width:500px">&nbsp;<input type="submit" name="btnsubmit" value="Submit"></form>
<div class="card p-3 mt-2">
<?php
      //  $cid=$_GET['c_id'];
        //$_SESSION['cid']=$cid;
                                        $cmm=mysqli_query($conn,"SELECT * FROM tblcomment c inner join tbluser u on c.user_id= u.user_id where confession_id='$cid' order by comment_id desc");
                                       
                                        //die(mysqli_error($conn));
  
     while($r=mysqli_fetch_array($cmm))
							{
								?>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="user d-flex flex-row align-items-center"> <img src="../upload/<?php echo $r['photo']; ?>" width="30" class="user-img rounded-circle mr-2"> <span><small class="font-weight-bold text-primary"><a href="common_profile.php?u_id=<?php echo $r['user_id']?>"><?php echo $r['user_name']; ?></a></small> <small class="font-weight-bold"><?php echo $r['comment']; ?></small></span> </div> <small><?php echo $r['date']; ?></small>
                </div>
                <div class="action d-flex justify-content-between mt-2 align-items-center">
                    <div class="reply px-4"> <small>Remove</small> <span class="dots"></span> <small>Reply</small> <span class="dots"></span> <small>Translate</small> </div>
                    <div class="icons align-items-center"> <i class="fa fa-user-plus text-muted"></i> <i class="fa fa-star-o text-muted"></i> <i class="fa fa-check-circle-o check-icon text-primary"></i> </div>
                </div>
                <?php
              }
              ?>
            </div>
            
<!-- comment ends-->

          
      
        </div>
      </div>
    </body>

</html>