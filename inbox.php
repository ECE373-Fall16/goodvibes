<?php
include ('./inc/header.php');
?>
<script language="javascript">
	function toggle(){
		var ele = document.getElementById("toggleText");
		var text = document.getElementById("displayText");
		if(ele.style.display == "block"){
			ele.style.display = "none";
		}
		else{
			ele.style.display = "block";
		}
	}
</script>
<h2>My Unread Messages:</h2>
<?php
$grab_messages = mysqli_query($database,"SELECT * FROM private_messages WHERE user_to = '$logged_in_user' && opened ='no'");
$numrows = mysqli_num_rows($grab_messages);
if($numrows!=0){
while($get_msg = mysqli_fetch_array($grab_messages,MYSQLI_ASSOC)){
	$id = $get_msg['id'];
	$user_from = $get_msg['user_from'];
	$user_to = $get_msg['user_to'];
	$msg_title = $get_msg['msg_title'];
	$msg_body = $get_msg['msg_body'];
	$date = $get_msg['date'];
	$opened = $get_msg['opened'];
	if(strlen($msg_title) > 50){
		$msg_title = substr($msg_title, 0, 50)." ...";
	}
	else
		$msg_title=$msg_title;
	
	if(strlen($msg_body) > 150){
		$msg_body = substr($msg_body, 0, 150)." ...";
	}
	else
		$msg_body=$msg_body;
	
	echo "<b>$user_from </b> <a id='displayText href='javascript:toggle();'>$msg_title</a><hr /></br />
	<div id='toggleText' style='display: none;'>
	$msg_body
	</div>
	";
	}
}else
	echo "No messages.";
?>
<h2>My Read Messages:</h2>
<?php
$grab_messages = mysqli_query($database,"SELECT * FROM private_messages WHERE user_to = '$logged_in_user' && opened ='yes'");
$numrows = mysqli_num_rows($grab_messages);
if($numrows!=0){
while($get_msg = mysqli_fetch_array($grab_messages,MYSQLI_ASSOC)){
	$id = $get_msg['id'];
	$user_from = $get_msg['user_from'];
	$user_to = $get_msg['user_to'];
	$msg_title = $get_msg['msg_title'];
	$msg_body = $get_msg['msg_body'];
	$date = $get_msg['date'];
	$opened = $get_msg['opened'];
	
	if(strlen($msg_title) > 50){
		$msg_title = substr($msg_title, 0, 50)." ...";
	}
	else
		$msg_body=$msg_body;
	if(strlen($msg_body) > 150){
		$msg_body = substr($msg_body, 0, 150)." ...";
	}
	else
		$msg_body=$msg_body;
	
	echo "$user_from ".$msg_title."<hr /></br>";
	}
}else
		echo "No messages.";
?>