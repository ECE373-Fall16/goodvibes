<?php

	include('session.php');
	$database = mysqli_connect("localhost","root","password","user_accounts"); // connect to database

	$account = mysqli_query($database,"SELECT * FROM profiles WHERE username = '$logged_in_user'"); // find the account of the user

	$accountrow = mysqli_fetch_array($account,MYSQLI_ASSOC); // find the row of the account

	
	$genre = $accountrow['genre']; // get the profile attributes of the logged in user
	$location = $accountrow['location']; 
	$instruments = $accountrow['instruments']; 
	$age = $accountrow['age']; 
	$experience = $accountrow['experience']; 


?>

<HTML>
	<HEAD>
		<title>
		Welcome!
		</title>
	</HEAD>
<BODY>

	<img src="goodvibeslogo.jpg" width="25%" height="25%" alt="logo"/>
	<hr />
	<h1 align="center">Update Profile</h1>
<form align="left" action="editprofile_script.php" method="POST">

<p>Genre: <input type="text" name="genre" size="30" value= "<?php print "$genre" ?>"/></p>
<p>Location: <input type="text" name="location" size="30" value= "<?php print "$location" ?>" /></p>
<p>Instruments: <input type="text" name="instruments" size="30" value= "<?php print "$instruments" ?>"/></p>
<p>Age: <input type="text" name="age" size="30" value= "<?php print "$age" ?>"/></p>
<p>Experience (years): <input type="text" name="experience" size="30" value= "<?php print "$experience" ?>"/></p>

<input type="submit" name="submit" value="Submit"/>
</form>
</BODY>
</HTML>
