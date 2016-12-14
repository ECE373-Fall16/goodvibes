<?php
include('session.php');
$grab_messages = mysqli_query($database,"SELECT * FROM private_messages WHERE user_to = '$logged_in_user' && opened ='no' && deleted='no'");
$numrows = mysqli_num_rows($grab_messages);
$grab_requests = mysqli_query($database,"SELECT * FROM band_requests WHERE user_to = '$logged_in_user'");
$numrows2 = mysqli_num_rows($grab_requests);
$grab_profile_pic = mysqli_query($database,"SELECT image FROM profiles WHERE username = '$logged_in_user'");
$image = mysqli_fetch_array($grab_profile_pic);
?>
<HTML>
	<HEAD>
			<link rel="stylesheet" type="text/css" href="../css/style.css" />
	</HEAD>
<BODY>
<STYLE>
body {
	background-color: lightblue;
}
</STYLE>
<div class="headerMenu">
	<div id="wrapper">
		<div id="logo">
			<img src="goodvibeslogo.jpg" height="20%" width="20%"/>
			<img align="right"<?php if($image['image']=="")
						echo "<img width='150' height='150' src= 'pictures/default.png' alt='Default Profile Pic'>";
					else
						echo "<img width='150' height='150' src= 'pictures/".$image['image']."' alt='Profile Pic'>";?> </br>
			<p align="right"> <?php echo "Hello, ", $username;?> </p>
			

		<div id="menu" align="center">
			<a href="profile.php">View Profile</a>
			<a href="members.php">Member Directory</a>
			<a href="bands.php">Band Directory</a>
			<a href="my_messages.php">Inbox (<?php echo $numrows;?>)</a>
			<a href="bandRequests.php">Band Requests (<?php echo $numrows2;?>)</a>
			<a href="logout.php">Log Out</a>
		</div>
	</div>
	<hr />
</div>
</BODY>
</HTML>