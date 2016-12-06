<?php 
	include('session.php');
	
	$db = mysqli_connect('localhost', 'root', 'password','user_accounts');
	if(!$db){
		echo "Not Connected to server";
	}
	if (isset($_POST['submit'])) {
		$name = $_POST['name'];
		$genre = $_POST['genre'];
		$location = $_POST['location'];
		$sql = "INSERT INTO bands(name, genre, location, bandleader, member2, member3, member4, member5, member6) VALUES('$name','$genre','$location','$logged_in_user','','','','','')";
		$addband = mysqli_query($db, $sql);
		header("location: addMembers.php"); //redirect to page where creator can add members
		
	}
?>

<HTML>
	<HEAD>
		<title>
		Good Vibes Band Creation
		</title>
	</HEAD>
<BODY>
	<img src="goodvibeslogo.jpg" width="25%" height="25%" alt="logo"/>
	<hr />
	<h1 align="center">Create New Band</h1>
<form align="center" action="" method="POST">

<p>Name of Band: <input type="text" name = "name" size = "30"/></p>
<p>Genre: <input type="text" name = "genre" size = "30"/></p>
<p>Location: <input type="text" name="location" size="30"/></p>


<input type="submit" name="submit" value="Submit"/>
</form>
</BODY>
</HTML>