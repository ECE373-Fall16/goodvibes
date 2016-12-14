<?php 
	session_start();
	include('session.php');
	// connect to database
	$db = mysqli_connect("localhost","kzxljjxd_root","password","kzxljjxd_user_accounts"); // connect to database
		
	if(!$db){
		echo "Not Connected to server";
	}
	if(isset($_POST['uploadpic'])){
			move_uploaded_file($_FILES['file']['tmp_name'],"pictures/".$_FILES['file']['name']);
			$q=mysqli_query($database, "UPDATE profiles SET image = '".$_FILES['file']['name']."' WHERE username = '$logged_in_user'");
			header("location:editprofile.php");
			exit();
	}
	if (isset($_POST['submit'])) {
		
		if(($_POST['genre'])!=''){
			$genre = $_POST['genre'];
			$setgenre = mysqli_query($database,"UPDATE profiles SET genre = '$genre' WHERE username = '$logged_in_user'");
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
	
			$setlocation = mysqli_query($database,"UPDATE profiles SET location = '$location' WHERE username = '$logged_in_user'");
			$setlat = mysqli_query($database,"UPDATE profiles SET lat = '$lat' WHERE username = '$logged_in_user'");
			$setlon = mysqli_query($database,"UPDATE profiles SET lon = '$lon' WHERE username = '$logged_in_user'");
		}
		
		if(($_POST['instruments'])!=''){
			$instruments = $_POST['instruments'];
			$setinstruments = mysqli_query($database,"UPDATE profiles SET instruments = '$instruments' WHERE username = '$logged_in_user'");
		}
		
		if(($_POST['age'])!=''){
			$age = $_POST['age'];
			$setage = mysqli_query($database,"UPDATE profiles SET age = '$age' WHERE username = '$logged_in_user'");
		}
		
		if(($_POST['experience'])!=''){
			$experience = $_POST['experience'];
			$setexperience = mysqli_query($database,"UPDATE profiles SET experience = '$experience' WHERE username = '$logged_in_user'");
		}
		if(($_POST['sclink'])!=''){
			$sclink = $_POST['sclink'];
			$setsclink = mysqli_query($database,"UPDATE profiles SET sclink = '$sclink' WHERE username = '$logged_in_user'");
		}
		
	}
		
		header("location: profile.php"); //redirect to home page
		
	
?>