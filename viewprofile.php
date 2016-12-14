<?PHP
	include ('./inc/header.php');

	
	
	$database = mysqli_connect("localhost","root","password","user_accounts"); // connect to database
	
	$id = $_GET['id'];
	
	$account = mysqli_query($database,"SELECT * FROM profiles WHERE id = '$id'"); // find the account of the user

	$accountrow = mysqli_fetch_array($account,MYSQLI_ASSOC); // find the row of the account

	$genre = $accountrow['genre']; // 
	$location = $accountrow['location']; 
	$instruments = $accountrow['instruments']; 
	$age = $accountrow['age']; 
	$experience = $accountrow['experience']; 
	$scuser = $accountrow['scuser'];
	
	$fname = $accountrow['fname'];
	$lname = $accountrow['lname'];
	$username = $accountrow['username'];
	$email = $accountrow['email'];
	
	if(isset($_POST['invite'])){
		$bandname=$_POST['bandInvite'];
		$inviteCheck = mysqli_query ($database,"SELECT * FROM band_requests WHERE bandname='$bandname' && user_from='$logged_in_user' && user_to='$username'");
		if(mysqli_num_rows($inviteCheck)!=0)
			echo "You have already invited this user to this band.";
		else{
		$send_invite = mysqli_query($database, "INSERT INTO band_requests (id, user_from, user_to, bandname) VALUES (NULL,'$logged_in_user','$username', '$bandname')");
		echo "Invite sent successfully.";
	}
	}
		


?>
<HTML>
<HEAD>
<TITLE><?php echo $username?>'s Profile </TITLE>
	</style>
<script language="javascript" type="text/javascript">

</script>

</HEAD>
<BODY>
	<h1 align="left"> <?php print "$fname $lname" ?></h1>
	<p>Profile Photo:</p>
	<?php
	if($accountrow['image'] == "")
		echo "<img width='200' height='200' src= 'pictures/default.png' alt='Default Profile Pic'>";
	else
		echo "<img width='200' height='200' src= 'pictures/".$accountrow['image']."' alt='Profile Pic'>";
	?>
	<form action="send_msg.php?id=<?php echo $id ?>" method="POST">
	<input type="submit" name="sendmessage" value="Send Message"/>
	</form>
	<form action="viewprofile.php?id=<?php echo $id?>" method="POST">
	<select id="bandInvite" name="bandInvite">
	<option value="0">--Invite to Band--</option>
	<?php
	$bands = mysqli_query($database,"SELECT * from bands WHERE band_leader='$logged_in_user'");
	$numrows = mysqli_num_rows($bands);
	$i=1;
	while($i<=$numrows){
		$row = mysqli_fetch_array($bands);
		echo "<option value=$row[name]> $row[name] </option>";
		$i++;
	}
	?>
	</select>
	<input type='submit' name='invite' value='Send Invite'>
	</form>
	
	<h1 align="left"> Username: <?php print "$username" ?></h1>
	<h1 align="left"> Contact info: <?php print "$email" ?></h1>
	<h1 align="left"> Genre: <?php print "$genre" ?></h1>
	<h1 align="left"> Location: <?php print "$location" ?></h1>
	<h1 align="left"> Instruments played: <?php print "$instruments" ?></h1>	
	<h1 align="left"> Age: <?php if($age!=0) print "$age" ?></h1>
	<h1 align="left"> Experience (years): <?php if($experience!=0) print "$experience" ?></h1>
	<h1 align="left"> SoundCloud Link: <?php print '<a href="'.$scuser.'">'.$scuser.'</a>' ?></h1>



</BODY>
</HTML>