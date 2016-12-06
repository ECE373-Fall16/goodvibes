<?php 
	session_start();
	include('session.php');
	// connect to database
	$db = mysqli_connect('localhost', 'root', 'password','user_accounts');
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
			$setlocation = mysqli_query($database,"UPDATE profiles SET location = '$location' WHERE username = '$logged_in_user'");
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
		if(($_POST['scuser'])!=''){
			$scuser = $_POST['scuser'];
			$setscuser = mysqli_query($database,"UPDATE profiles SET scuser = '$scuser' WHERE username = '$logged_in_user'");
		}
		
	}
		
		header("location: profile.php"); //redirect to home page
		
	
?>
