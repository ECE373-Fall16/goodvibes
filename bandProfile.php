<?PHP
	include('session.php');
	
	$name = $_POST['dropdown'];

	$database = mysqli_connect("localhost","root","password","user_accounts"); // connect to database

	$band = mysqli_query($database,"SELECT * FROM bands WHERE name = '$name'"); // find the account of the user

	$bandrow = mysqli_fetch_array($band,MYSQLI_ASSOC); // find the row of the account

	$genre = $bandrow['genre'];
	$location = $bandrow['location'];
	$bandleader = $bandrow['bandleader'];
	$member2 = $bandrow['member2'];
	$member3 = $bandrow['member3'];
	$member4 = $bandrow['member4'];
	$member5 = $bandrow['member5'];
	$member6 = $bandrow['member6'];


?>

<HTML>
	<HEAD>
		<title>
		<?php print "$name" ?></h1>
		</title>
	</HEAD>
<BODY>

	<img src="goodvibeslogo.jpg" width="25%" height="25%" alt="logo"/>
	<hr />
	<h1 align="left"> Genre: <?php print "$genre" ?></h1>
	<h1 align="left"> Location: <?php print "$location" ?></h1>
	<h1 align="left"> Band Leader: <?php print "$bandleader" ?></h1>
	<h1 align="left"> Member #2: <?php print "$member2" ?></h1>	
	<h1 align="left"> Member #3: <?php print "$member3" ?></h1>	
	<h1 align="left"> Member #4: <?php print "$member4" ?></h1>	
	<h1 align="left"> Member #5: <?php print "$member5" ?></h1>	
	<h1 align="left"> Member #6: <?php print "$member6" ?></h1>	


</BODY>
</HTML>
