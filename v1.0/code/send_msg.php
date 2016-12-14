<?php
include ('./inc/header.php');
	
	$database = mysqli_connect("localhost","kzxljjxd_root","password","kzxljjxd_user_accounts"); // connect to database
	$id = $_GET['id'];
	$account = mysqli_query($database,"SELECT * FROM profiles WHERE id = '$id'");
	$accountrow = mysqli_fetch_array($account,MYSQLI_ASSOC);
	$user = $accountrow['username'];
	if(isset($_POST['submit'])){
		$msg_title = strip_tags(@$_POST['msg_title']);
		$msg_body = strip_tags(@$_POST['msg_body']);
		$date = date("Y-m-d");
		$opened = "no";
		$deleted="no";
		
		$send_msg = mysqli_query($database, "INSERT INTO private_messages (id, user_to, user_from, msg_title, msg_body, date, opened, deleted) VALUES (NULL,'$user','$logged_in_user', '$msg_title', '$msg_body', '$date','$opened', '$deleted')");
		echo "Your message has been sent!";
	}
	echo "
		<form action='send_msg.php?id=$id' method='POST'>
		<h2>Compose a message: ($user)</h2>
		<input type='text' name='msg_title' size='30' placeholder='Enter a message title here...'></p>
		<textarea cols='50' rows='12' name='msg_body' placeholder='Enter your message here...'></textarea></p>
		<input type='submit' name='submit' value='Send Message'>
		</form>
	";
		?>