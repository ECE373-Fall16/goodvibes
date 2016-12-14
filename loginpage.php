<?php
	$database = mysqli_connect("localhost","root","password","user_accounts"); // connect to database

	session_start(); // start a session
	
	if($_SERVER["REQUEST_METHOD"] == "POST") { // if data has been entered, get it

		$username = mysqli_real_escape_string($database,$_POST['username']); // get username from login page
		$password = mysqli_real_escape_string($database,$_POST['password']); // get password from login page
		
		$result = mysqli_query($database,"SELECT * FROM accounts WHERE username = '$username' and password = '$password'"); // find the username and account in the database
		$row = mysqli_fetch_array($result,MYSQLI_BOTH); // find the row of the account
		$count = mysqli_num_rows($result); // count how many rows have that user name and password
		
		if($count == 1){ // if there is 1 and only 1 account in the database with that username and password
			$_SESSION['loggedIn'] = true;
			$_SESSION['logged_in_user'] = $username; // create new session 
			print "congrats u logged in!!!";
			header("location: profile.php");
		}
		else{
			$error_message = "YOUR ACCOUNT DOESN'T EXIST";
			print $error_message;
		}
	}

?>
<!DOCTYPE html>
<HTML>
	<HEAD>

		<title>
		Good Vibes Login
		</title>
	</HEAD>
<BODY>
	<STYLE>
body {
	background-repeat: no-repeat;
	background-position: center;
	background-size: 25%;
	background-color: lightblue;
}
</STYLE>
	<a href="loginpage.php"><img src="goodvibeslogo.jpg" width="25%" height="29%" alt="logo" align="left"><a>
	</br></br></br></br></br></br></br></br></br></br>
	<hr />

	<h1 align="center">Login</h1>
<form align="center" action="" method="POST">

<p>Username: <input type="text" name="username" size="30"/></p>
<p>Password: <input type="password" name="password" size="30"/></p>

<input type="submit" name="submit" value="Submit"/>
</br>New User? <a href="createAccount.php">Create Account</a>

</BODY>
</HTML>
