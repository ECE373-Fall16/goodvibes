<?PHP
	include ('./inc/header.php');
	include('session.php');
	
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
	$scuser = $accountrow['scuser'];
	
	$fname = $accountrow2['fname'];
	$lname = $accountrow2['lname'];
	$username = $logged_in_user;
	$email = $accountrow2['email'];
	if(isset($_POST['uploadpic'])){
		move_uploaded_file($_FILES['file']['tmp_name'],"pictures/".$_FILES['file']['name']);
		$q=mysqli_query($database, "UPDATE profiles SET image = '".$_FILES['file']['name']."' WHERE username = '$logged_in_user'");
		
		
	}


?>
<HTML>
<HEAD>
<TITLE>Profile </TITLE>
</HEAD>
<BODY>

<STYLE>
body {
	background-color: lightblue;
}
</STYLE>

	<hr />
	<h1 align="left"> <?php print "$fname $lname" ?></h1>
	<p>Upload Profile Photo:</p>
	<?php
	$con = mysqli_connect("localhost", "root", "password", "user_accounts");
	$q = mysqli_query($database, "SELECT * FROM profiles WHERE username = '$logged_in_user'");
	$row = mysqli_fetch_assoc($q);
	if($row['image'] == "")
		echo "<img width='100' height='100' src= 'pictures/default.png' alt='Default Profile Pic'>";
	else
		echo "<img width='200' height='200' src= 'pictures/".$row['image']."' alt='Default Profile Pic'>";
	?>
	<form action="profile.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="file" /> <br />
	<input type="submit" name="uploadpic" value="Upload Image">
	</form>
	<h1 align="left"> Username: <?php print "$username" ?></h1>
	<h1 align="left"> Contact info: <?php print "$email" ?></h1>
	<h1 align="left"> Genre: <?php print "$genre" ?></h1>
	<h1 align="left"> Location: <?php print "$location" ?></h1>
	<h1 align="left"> Instruments played: <?php print "$instruments" ?></h1>	
	<h1 align="left"> Age: <?php if($age!=0) print "$age" ?></h1>
	<h1 align="left"> Experience (years): <?php if($experience!=0) print "$experience" ?></h1>
	<h1 align="left"> SoundCloud Link: <?php print '<a href="'.$scuser.'">'.$scuser.'</a>' ?></h1>
	<h2><a href="logout.php">Log Out</a></h2>
	<h3><a href="deleteaccount.php">Deactivate Account</a></h3>
	<h4><a href="editprofile.php">Edit Profile</a></h3>


</BODY>
</HTML>
