<?php 
	include('session.php');
	// connect to database
	$db = mysqli_connect("localhost","kzxljjxd_root","password","kzxljjxd_user_accounts"); // connect to database
	$id = $_GET['id'];
	
	$band = mysqli_query($database,"SELECT * FROM bands WHERE id = '$id'"); // find the account of the user
	$bandrow = mysqli_fetch_array($band,MYSQLI_ASSOC);
	if(!$database){
		echo "Not Connected to server";
	}
	if(isset($_POST['bandpic'])){
			move_uploaded_file($_FILES['file']['tmp_name'],"pictures/".$_FILES['file']['name']);
			$q=mysqli_query($database, "UPDATE bands SET bandpic = '".$_FILES['file']['name']."' WHERE id = '$id'");
			header("location:editbandprofile.php?id=$id");
			exit();
	}
	if (isset($_POST['submit'])) {
		
		if(($_POST['name'])!=''){
			$name = $_POST['name'];
			$setname = mysqli_query($database,"UPDATE bands SET name = '$name' WHERE id='$id'");
		}
		
		if(($_POST['genre'])!=''){
			$genre = $_POST['genre'];
			$setgenre = mysqli_query($database,"UPDATE bands SET genre = '$genre' WHERE id='$id'");
		}
		
		if(($_POST['location'])!=''){
			$location = $_POST['location'];
			$location = str_replace(' ', '', $location);
			
			$google = "http://maps.googleapis.com/maps/api/geocode/json?address=$location";
			$details = file_get_contents($google);
			$result = json_decode($details, TRUE);
			$location = $result['results'][0]['formatted_address'];
			$lat = $result['results'][0]['geometry']['location']['lat'];
			$lon = $result['results'][0]['geometry']['location']['lng'];
	
			$setlocation = mysqli_query($database,"UPDATE bands SET location = '$location' WHERE id='$id'");
			$setlat = mysqli_query($database,"UPDATE bands SET lat = '$lat' WHERE id = '$id'");
			$setlon = mysqli_query($database,"UPDATE bands SET lon = '$lon' WHERE id = '$id'");
		}
		
	}
		
		header("location: viewbandprofile.php?id=$id"); //redirect to home page
		
	
?>