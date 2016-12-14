<?php
	include ('./inc/header.php');
	$database = mysqli_connect("localhost","kzxljjxd_root","password","kzxljjxd_user_accounts"); // connect to database
	
	$id = $_GET['id'];
	$band = mysqli_query($database,"SELECT * FROM bands WHERE id = '$id'"); // find the account of the user
	
	$bandrow = mysqli_fetch_array($band,MYSQLI_ASSOC); // find the row of the account
	$name = $bandrow['name'];
	$genre = $bandrow['genre']; // get the profile attributes of the logged in user
	$location = $bandrow['location']; 
?>

<HTML>
	<HEAD>
		<title>
		Edit your band profile
		</title>
	</HEAD>
<BODY>

	<h1 align="center">Update Band Profile</h1>
	<?php
	if($bandrow['bandpic'] == "")
		echo "<img width='200' height='200' src= 'pictures/default.png' alt='Default Profile Pic'>";
	else
		echo "<img width='200' height='200' src= 'pictures/".$bandrow['bandpic']."' alt='Profile Pic'>";
	?>
	<form action="editbandprofile_script.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
	<input type="file" name="file" /> <br />
	<input type="submit" name="bandpic" value="Upload Image">
	</form>
<form align="left" action="editbandprofile_script.php?id=<?php echo $id; ?>" method="POST">
<p>Name: <input type="text" name="name" size="30" value= "<?php print "$name" ?>"/></p>
<p>Genre: <input type="text" name="genre" size="30" value= "<?php print "$genre" ?>"/></p>
<p>Location: <input type="text" name="location" placeholder="Enter city name" size="30" value= "<?php print "$location" ?>" /></p>
<input type="submit" name="submit" value="Submit"/> or <a href="profile.php"> Cancel </a>
</form>
</BODY>
</HTML>