<?PHP
	include('session.php');
//	print "welcome $logged_in_user";
	
	$database = mysqli_connect("localhost","root","password","user_accounts"); // connect to database

	$account = mysqli_query($database,"SELECT * FROM profiles WHERE username = '$logged_in_user'"); // find the account of the user
	$account2 = mysqli_query($database,"SELECT * FROM accounts WHERE username = '$logged_in_user'"); // find the account of the user

	$accountrow = mysqli_fetch_array($account,MYSQLI_ASSOC); // find the row of the account
	$accountrow2 = mysqli_fetch_array($account2,MYSQLI_ASSOC); // find the row of the account

	
	$genre = $accountrow['genre']; // get the profile attributes of the logged in user
	$location = $accountrow['location']; 
	$instruments = $accountrow['instruments']; 
	$age = $accountrow['age']; 
	$experience = $accountrow['experience']; 
	
	$fname = $accountrow2['fname'];
	$lname = $accountrow2['lname'];
	$username = $logged_in_user;
	$email = $accountrow2['email'];


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
	<h1 align="left"> <?php print "$fname $lname" ?></h1>
	<h1 align="left"> Username: <?php print "$username" ?></h1>
	<h1 align="left"> Contact info: <?php print "$email" ?></h1>
	<h1 align="left"> Genre: <?php print "$genre" ?></h1>
	<h1 align="left"> Location: <?php print "$location" ?></h1>
	<h1 align="left"> Instruments played: <?php print "$instruments" ?></h1>	
	<h1 align="left"> Age: <?php print "$age" ?></h1>
	<h1 align="left"> Experience (years): <?php print "$experience" ?></h1>	
	
	
	<h2><a href="logout.php">Log Out</a></h2>
	<h3><a href="deleteaccount.php">Deactivate Account</a></h3>
	<h4><a href="editprofile.php">Edit Profile</a></h3>


</BODY>
</HTML>
