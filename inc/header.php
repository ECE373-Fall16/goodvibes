<!doctype HTML>
<?php
include('session.php');
$grab_messages = mysqli_query($database,"SELECT * FROM private_messages WHERE user_to = '$logged_in_user' && opened ='no' && deleted='no'");
$numrows = mysqli_num_rows($grab_messages);
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
		</div>
		<div align="right"> <?php echo "Hello, ", $username;?></div>
		<div id="menu" align="center">
			<a href="profile.php">View Profile</a>
			<a href="members.php">Member Directory</a>
			<a href="bands.php">Band Directory</a>
			<a href="my_messages.php">Inbox (<?php echo $numrows;?>)</a>
			<a href="bandRequests.php">Band Requests</a>
			<a href="logout.php">Log Out</a>
		</div>
	</div>
	<hr />
</div>
</BODY>
</HTML>
