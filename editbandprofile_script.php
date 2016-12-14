<?php 
	session_start();
	include('session.php');
	// connect to database
	$db = mysqli_connect('localhost', 'root', 'password','user_accounts');
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
			$setlocation = mysqli_query($database,"UPDATE profiles SET location = '$location' WHERE id='$id'");
		}
		
	}
		
		header("location: viewbandprofile.php?id=$id"); //redirect to home page
		
	
?>