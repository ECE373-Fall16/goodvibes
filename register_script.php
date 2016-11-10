<?php 
	session_start();
	// connect to database
	$db = mysqli_connect('127.0.0.1', 'root', '','authentication');
	if(!$db){
		echo "Not Connected to server";
	}
	if (isset($_POST['register_btn'])) {
		$username = $_POST['username'];
		$email= $_POST['email'];
		//$ = $_POST['email'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];
		if ($password == $password2) {
			// create user
			$password = md5($password); //hash password before storing for security purposes
			$sql = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')";
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
