<?PHP
	include ('./inc/header.php');

	
	
	$database = mysqli_connect("localhost","root","password","user_accounts"); // connect to database
	
	$id = $_GET['id'];
	
	$band = mysqli_query($database,"SELECT * FROM bands WHERE id = '$id'"); // find the account of the user

	$bandrow = mysqli_fetch_array($band,MYSQLI_ASSOC); // find the row of the account

	$bandname = $bandrow['name'];
	$genre = $bandrow['genre']; 
	$location = $bandrow['location'];

	$leader = $bandrow['band_leader'];
	$members = array();
	for($i=1;$i<=10;$i++){
		$members[$i] = $bandrow['member'.$i];
	}
	
?>
<HTML>
<HEAD>
<TITLE><?php echo $username?>'s Profile </TITLE>
</HEAD>
<BODY>
	<h1 align="left"> <?php print "$bandname" ?></h1>
	<p>Band Photo:</p>
	<?php
	if($bandrow['bandpic'] == "")
		echo "<img width='200' height='200' src= 'pictures/default.png' alt='Default Profile Pic'>";
	else
		echo "<img width='200' height='200' src= 'pictures/".$bandrow['image']."' alt='Profile Pic'>";
	?>
	
	<h1 align="left"> Genre: <?php print "$genre" ?></h1>
	<h1 align="left"> Band Leader:</h1>
	<?php
			$profilename = "SELECT * FROM profiles WHERE username='$leader'";
			$result = mysqli_query($database,$profilename)or die(mysqli_error($database));
			$rws = mysqli_fetch_array($result);
	?>
<div class="col-md-4 column">
	<div class="panel-group" id="panel-<?php echo $rws['id']; ?>">
		<div class="panel panel-default">
			<div id="panel-element-<?php echo $rws['id']; ?>" class="panel-collapse collapse in">
				<div class="panel-body">
					<div class="col-md-6 column">
					<?php if($rws['image'] == "")
							echo "<img width='100' height='100' src= 'pictures/default.png' alt='Default Profile Pic'>";
						else
							echo "<img width='100' height='100' src= 'pictures/".$rws['image']."' alt='Profile Pic'>";
						?>
														
					</div>
					<div class="col-md-6 column">
						 <h2><span><a href="viewprofile.php?id=<?php echo $rws['id'];?>"><?php echo $rws['username'];?></a><?php echo " (", $rws['fname'], " ", $rws['lname'], ")";?></span></h2>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	Members:
	<?php
    for($i=1;$i<=10;$i++){ 
		if($members[$i]!=""){
			$profilename = "SELECT * FROM profiles WHERE username='$members[$i]'";
			$result = mysqli_query($database,$profilename)or die(mysqli_error($database));
			$rws = mysqli_fetch_array($result);
	?>
	<div class="col-md-4 column">
	<div class="panel-group" id="panel-<?php echo $rws['id']; ?>">
		<div class="panel panel-default">
			<div id="panel-element-<?php echo $rws['id']; ?>" class="panel-collapse collapse in">
				<div class="panel-body">
					<div class="col-md-6 column">
					<?php if($rws['image'] == "")
							echo "<img width='100' height='100' src= 'pictures/default.png' alt='Default Profile Pic'>";
						else
							echo "<img width='100' height='100' src= 'pictures/".$rws['image']."' alt='Profile Pic'>";
						?>
														
					</div>
					<div class="col-md-6 column">
						 <h2><span><a href="viewprofile.php?id=<?php echo $rws['id'];?>"><?php echo $rws['username'];?></a><?php echo " (", $rws['fname'], " ", $rws['lname'], ")";?></span></h2>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	 <?php 
		}
	 } ?>                                                         