<?php
	session_start(); // start the session
	$database = mysqli_connect("localhost","root","password","user_accounts"); // connect to database
	
	$username = $_SESSION['logged_in_user']; // get the username of the user thats logged in
	
	$session = mysqli_query($database,"SELECT username, id FROM accounts WHERE username = '$username'"); // find the account of the user
	
	$row = mysqli_fetch_array($session,MYSQLI_ASSOC); // find the row of the account
	
	$logged_in_user = $row['username']; // get the username of the logged in user
	
	$user_id = $row['id'];
	
	if(is_null($_SESSION['logged_in_user'])){ // if the user isn't logged in 
		header("Location: loginpage.php"); // redirect to the log in page
	}
?>
