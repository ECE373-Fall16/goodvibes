<?php

	include('session.php');
	$database = mysqli_connect("localhost","root","password","user_accounts"); // connect to database

	$deleteaccount = mysqli_query($database,"DELETE FROM accounts WHERE username = '$logged_in_user'");


?>
