<?php
	include ('./inc/header.php');
	if(isset($_POST['create'])){
	$query1 = mysqli_query($database,"SELECT * FROM bands WHERE band_leader='$logged_in_user'");	
	$numrows = mysqli_num_rows($query1);
	if($numrows>=5){
		"Sorry, you may only create 5 total bands.";
	}
	else{
		$bandname = $_POST['bandname'];
		$genre = $_POST['genre'];
		$location = $_POST['location'];
		$query = mysqli_query($database,"SELECT name FROM bands WHERE name='$bandname'");
		if (mysqli_num_rows($query) != 0)
			echo "Band name already in use!";
		else{
				// create band
				$sql="INSERT INTO bands (id, name, genre, location, lat, lon, band_leader, member1, member2, member3, member4, member5, member6, member7, member8, member9, member10, bandpic) VALUES (NULL,'$bandname', '$genre', '','0','0', '$logged_in_user','','','','','','','','','','','')";
				$addband= mysqli_query($database, $sql);
				$id = mysqli_query($database,"SELECT FROM bands id WHERE band_name='$bandname'");
				header("location: profile.php"); //redirect to band page
		}
	}
}
?>
<HTML>
	<HEAD>
		<title>
		Good Vibes Band Creation
		</title>
	</HEAD>
<BODY>
	<h1 align="center">Create New Band</h1>
<form align="center" action="createBand.php" method="POST">

<p><input type="text" name = "bandname" size = "30" placeholder="Band Name"/></p>
<p><input type="text" name = "genre" size = "30" placeholder="Genre"/></p>
<input type="submit" name="create" value="Create!"/>
</form>
</BODY>
</HTML>