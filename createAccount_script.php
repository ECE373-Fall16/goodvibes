<?php 
	session_start();
	// connect to database
	$db = mysqli_connect('localhost', 'root', 'password','authentication');
	if(!$db){
		echo "Not Connected to server";
	}
	if (isset($_POST['submit'])) {
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];
		if ($password == $repassword) {
			// create user
			$sql = "INSERT INTO users(fname, lname, username, password) VALUES('$fname','$lname','$username', '$repassword')";
			if(mysqli_query($db, $sql)){
				echo "New record created successfully";
			}else{
				echo "New record not created";
			}
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['username'] = $username;
			header("location: home.php"); //redirect to home page
		}else{
			$_SESSION['message'] = "The two passwords do not match";
		}
	}
?>
