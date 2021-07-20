<?php
	include("config.php");
	session_start();
	if(isset($_POST['id']))
	{
		$id = $_POST['id'];
		$user=$_SESSION['userid'];
		$query=mysqli_query($conn,"SELECT * from tbl_message where to_id='$id' and from_id='$user' or to_id='$user' and from_id='$id'") or die(mysqli_error());
		while($row=mysqli_fetch_array($query))
		{
			$f_id=$row['from_id'];
	        if($f_id!=$user)
			{
				$sql=mysqli_query($conn,"SELECT user_name,photo from tbluser where user_id='$f_id'")or die(mysqli_error());
				$urow=mysqli_fetch_array($sql);
			?>
				
				<div class="direct-chat-msg">
				<div class="direct-chat-info clearfix">
				<span class="direct-chat-name pull-left"><?php echo $urow['user_name'];?></span> <span class="direct-chat-timestamp pull-right"><?php echo $row['time'];?></span> </div> <img class="direct-chat-img" src="../upload/<?php echo $urow['photo'];?>" alt="message user image">
				<div class="direct-chat-text"><?php echo $row['message'];?></div>
			    </div>
				
				
			<?php }
			else
			{
				$sql=mysqli_query($conn,"SELECT user_name,photo from tbluser where user_id='$user'")or die(mysqli_error());
				$urow=mysqli_fetch_array($sql);
				//$data= array();
				?>
				<div class="direct-chat-msg right">
                <div class="direct-chat-info clearfix">
				<span class="direct-chat-name pull-right">You</span> <span class="direct-chat-timestamp pull-left"><?php echo $row['time'];?></span> </div> <img class="direct-chat-img" src="../upload/<?php echo $urow['photo'];?>" alt="message user image">
                <div class="direct-chat-text"><?php echo $row['message'];?></div>
                </div>
				
			<?php }	
		}
	}	
?>