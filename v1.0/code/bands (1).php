<?php
	include ('./inc/header.php');
?>
<h1 align="center">Band Directory</h1>
<TITLE>Bands</TITLE>
<h2 align="center"><a href="createBand.php">Create a New Band!</a></h2>
<?PHP
	$database = mysqli_connect("localhost","kzxljjxd_root","password","kzxljjxd_user_accounts"); // connect to database
	$account = mysqli_query($database,"SELECT * FROM profiles WHERE username = '$logged_in_user'"); // find the account of the user
	$accountrow = mysqli_fetch_array($account,MYSQLI_ASSOC); // find the row of the account

	$lat = $accountrow['lat'];
	$lon = $accountrow['lon'];
	
	$bands = "SELECT * from bands order by abs($lat-lat)+abs($lon-lon)";
    $result = mysqli_query($database,$bands)or die(mysqli_error($database));
    while($rws = mysqli_fetch_array($result)){ 
?>

<div class="col-md-4 column">
<div class="panel-group" id="panel-<?php echo $rws['id']; ?>">
	<div class="panel panel-default">
		<div id="panel-element-<?php echo $rws['id']; ?>" class="panel-collapse collapse in">
			<div class="panel-body">
				<div class="col-md-6 column">
				<?php if($rws['bandpic'] == "")
						echo "<img width='100' height='100' src= 'pictures/default.png' alt='Default Profile Pic'>";
					else
						echo "<img width='100' height='100' src= 'pictures/".$rws['bandpic']."' alt='Profile Pic'>";
					?>
													
				</div>
				<div class="col-md-6 column">
					 <h2><span><a href="viewbandprofile.php?id=<?php echo $rws['id'];?>"><?php echo $rws['name'];?></a><?php echo " (Genre: ", $rws['genre'], " , Location: ", $rws['location'], ")";?></a></span></h2>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
 <?php } ?>                                                         
		  </div>
	  </div>
  </div>
</div>