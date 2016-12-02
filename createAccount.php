<!DOCTYPE html>
<?php //include ('./inc/header.php'); ?>
<HTML>
	<HEAD>
		<title>
		Good Vibes Account Creation
		</title>
	</HEAD>
<BODY>
<STYLE>
body {
	background-repeat: no-repeat;
	background-position: right top;
	background-size: 25%;
	background-color: lightblue;
}
</STYLE>
<a href="loginpage.php"><img src="goodvibeslogo.jpg" width="25%" height="29%" alt="logo" align="left"><a>
	</br></br></br></br></br></br></br></br></br></br>
	<hr />
	<h1 align="center">Create New Account</h1>
<form align="center" action="createAccount_script.php" method="POST">

<p><input type="text" name = "fname" size = "30" placeholder="First Name"/></p>
<p><input type="text" name = "lname" size = "30" placeholder="Last Name"/></p>
<p><input type="text" name="username" size="30" placeholder="Desired Username"/></p>
<p><input type="text" name="email" size="30" placeholder="Email Address"/></p>
<p><input type="password" name="password" size="30" placeholder="Desired Password"/></p>
<p><input type="password" name="repassword" size="30" placeholder="Confirm Password"/></p>

<input type="submit" name="submit" value="Submit"/>
</form>
</BODY>
</HTML>
