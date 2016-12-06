<?php

	include('session.php');
	$database = mysqli_connect("localhost","root","password","user_accounts"); // connect to database

	$band = mysqli_query($database,"SELECT * FROM bands WHERE bandleader = '$logged_in_user'"); // find the account of the user

	$bandrow = mysqli_fetch_array($band,MYSQLI_ASSOC); // find the row of the account

	$member2 = $bandrow['member2']; // get the profile attributes of the logged in user
	$member3 = $bandrow['member3']; 
	$member4 = $bandrow['member4']; 
	$member5 = $bandrow['member5']; 
	$member6 = $bandrow['member6'];


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
	<h1 align="center">Add Band Members</h1>
<form align="left" action="addMembers_script.php" method="POST">

<p>Member #2: <input type="text" name="member2" size="30" value= "<?php print "$member2" ?>"/></p>
<p>Member #3: <input type="text" name="member3" size="30" value= "<?php print "$member3" ?>" /></p>
<p>Member #4: <input type="text" name="member4" size="30" value= "<?php print "$member4" ?>"/></p>
<p>Member #5: <input type="text" name="member5" size="30" value= "<?php print "$member5" ?>"/></p>
<p>Member #6: <input type="text" name="member6" size="30" value= "<?php print "$member6" ?>"/></p>

<input type="submit" name="submit" value="Submit"/>
</form>
</BODY>
</HTML>

