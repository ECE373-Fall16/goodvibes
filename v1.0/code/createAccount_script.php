<?php 
	session_start();
	// connect to database
	$db = mysqli_connect("localhost","kzxljjxd_root","password","kzxljjxd_user_accounts"); // connect to database
	
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
		$query = mysqli_query($db,"SELECT username FROM accounts WHERE username='$username'");
		if (mysqli_num_rows($query) != 0)
			echo "Username already exists";
		else{
			if ($password == $repassword) {
				// create user
				$sql = "INSERT INTO accounts(id, fname, lname, username, email, password) VALUES(NULL, '$fname','$lname','$username', '$email', '$repassword')";
				$sql2 = "INSERT INTO profiles(id, fname, lname, username, email, genre, location, lat, lon, instruments, age, experience,image,sclink) VALUES(NULL,'$fname','$lname','$username', '$email','','','0', '0','',0,0,'','')";
				$addprofile = mysqli_query($db, $sql2);
				$addprofile2 = mysqli_query($db, $sql);
				//$_SESSION['message'] = "You are now logged in";
				//$_SESSION['username'] = $username;
				header("location: loginpage.php"); //redirect to home page
			}else
				print "Passwords do not match. Please return to previous page and try again.";
			}
		}
	}
?>