<!DOCTYPE html>
<html>

<head>
<?php
  include("config.php");
  //include("load_log.php");
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
    <link rel="stylesheet" href="style2/message.css">
    
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
            <a href="../logout.php">
              <i class="fa fa-info-circle" aria-hidden="true"></i> Sign Out
            </a>
          </li>
        </ul>
      </div>
      
      <div class="content-container">
      
        <div class="container-fluid">
<!-- start message-->


                    
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-md-4">
                <div class="box box-warning direct-chat direct-chat-warning">
                    <div class="box-header with-border">
                    <?php
                    $uid=$_GET['u_id'];
                    $_SESSION['uid']=$uid;
                    $sql=mysqli_query($conn,"SELECT user_name from tbluser where user_id='$uid'")or die(mysqli_error());
                    $row=mysqli_fetch_array($sql);
                    
                    ?>
                        <h3 class="box-title"><?php echo $row['user_name'];?></h3>
                        <div class="box-tools pull-right"> <span data-toggle="tooltip" title="" class="badge bg-yellow" data-original-title="3 New Messages">20</span> <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button> <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-widget="chat-pane-toggle" data-original-title="Contacts"> <i class="fa fa-comments"></i></button> <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i> </button> </div>
                    </div>
                    <div class="box-body" id="chat_body">
                        <div class="direct-chat-messages" id="chat_area">
                           <!-- <div class="direct-chat-msg">
                                <div class="direct-chat-info clearfix"> <span class="direct-chat-name pull-left">j</span> <span class="direct-chat-timestamp pull-right">123</span> </div> <img class="direct-chat-img" src="../upload/def.jpg" alt="message user image">
                                <div class="direct-chat-text"> ..</div>
                            </div>
        
                            <div class="direct-chat-msg right">
                                <div class="direct-chat-info clearfix"> <span class="direct-chat-name pull-right">jh</span> <span class="direct-chat-timestamp pull-left">123</span> </div> <img class="direct-chat-img" src="../upload/def.jpg" alt="message user image">
                                <div class="direct-chat-text"> ..</div>
                            </div>
                            
                           <!-- <div class="direct-chat-msg">
                                <div class="direct-chat-info clearfix"> <span class="direct-chat-name pull-left">Timona Siera</span> <span class="direct-chat-timestamp pull-right">23 Jan 5:37 pm</span> </div> <img class="direct-chat-img" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="message user image">
                                <div class="direct-chat-text"> For what reason would it be advisable for me to think about business content? </div>
                            </div>
                            <div class="direct-chat-msg right">
                                <div class="direct-chat-info clearfix"> <span class="direct-chat-name pull-right">Sarah Bullock</span> <span class="direct-chat-timestamp pull-left">23 Jan 6:10 pm</span> </div> <img class="direct-chat-img" src="https://img.icons8.com/office/36/000000/person-female.png" alt="message user image">
                                <div class="direct-chat-text"> I would love to. </div>
                            </div>-->
                        </div>
                    </div>
                    <div class="box-footer">
                        <form action="" method="post">
                            <div class="input-group"> <input type="text" id="chat_msg" name="message" placeholder="Type Message ..." class="form-control" required> <span class="input-group-btn"> <button type="button" name="btnsubmit" id="send_msg"   class="btn btn-warning btn-flat">Send</button> </span> </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>








       </div>
      </div>


     </body>

</html>


<script type="text/javascript" src="../user/assets/css/jquery-2.1.4.min.js"></script>
<script type="text/javascript">

setInterval(populate,2500);

$('#send_msg').click(function() {
    var msg = $('#chat_msg').val();
    //var val2 = $('#text2').val();
    $.ajax({
        type: "POST",
        url: "insert_chat.php",
        data:  "message="+msg,
        success: function(response) {
            //alert("done");
            $('#chat_msg').val("");
            populate();
        }
    });
});

$(document).keypress(function(e){
			if (e.which == 13){
			$("#send_msg").click();
			}
		});
		

  	function populate()
    {
	 
     var val=<?php echo $uid;?>;
 //alert(val);
 	 $.ajax({
		type: "POST",
		url: "load_chat.php",
		data: "id="+val,
		
		success: function(data){
		$("#chat_area").html(data);	
    $("#chat_area").scrollTop($("#chat_area")[0].scrollHeight);
		}
		})
		
 }
 
</script>