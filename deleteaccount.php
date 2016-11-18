<?php

	include('session.php');
	$database = mysqli_connect("localhost","root","password","user_accounts"); // connect to database

	$deleteaccount = mysqli_query($database,"DELETE FROM accounts WHERE username = '$logged_in_user'");
	$deleteprofile = mysqli_query($database,"DELETE FROM profile WHERE username = '$logged_in_user'");

	header("location: loginpage.php");
	print "Congrats you deleted your account!";


?>
