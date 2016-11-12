<?php 
	session_start();
	// connect to database
	$db = mysqli_connect('localhost', 'root', 'password','user_accounts');
	if(!$db){
		echo "Not Connected to server";
	}
	if (isset($_POST['submit'])) {
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];
		if ($password == $repassword) {
			// create user
			$sql = "INSERT INTO accounts(id, fname, lname, username, email, password) VALUES(NULL, '$fname','$lname','$username', '$email', '$repassword')";
			$sql2 = "INSERT INTO profiles(id, username, genre, location, instruments, age, experience) VALUES(NULL, '$username', '','','',0,0)";
			$addprofile = mysqli_query($db, $sql2);
			if(mysqli_query($db, $sql)){
				echo "New record created successfully";
			}else{
				echo "New record not created";
			}
			//$_SESSION['message'] = "You are now logged in";
			//$_SESSION['username'] = $username;
			header("location: loginpage.php"); //redirect to home page
		}else{
			$_SESSION['message'] = "The two passwords do not match";
		}
	}
?>
