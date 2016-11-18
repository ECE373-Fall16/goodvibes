<?php 
	session_start();
	// connect to database
	$db = mysqli_connect('localhost', 'root', 'password','user_accounts');
	if(!$db){
		echo "Not Connected to server";
	}
	$required = array('fname','lname','username','email','password','repassword');

// Loop over field names, make sure each one exists and is not empty
	$error = false;
	foreach($required as $field) {
	if (empty($_POST[$field])) {
		$error = true;
		}
	}

	if ($error) {
		header("location: createaccount.php");
		$_SESSION['message'] = "All fields required";
	} else {

	if (isset($_POST['submit'])) {
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];
		// Required field names

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
			print "Passwords do not match. Please return to previous page and try again.";
		}
	}
	}
?>
