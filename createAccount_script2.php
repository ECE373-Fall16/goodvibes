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
		
		$details = json_decode(file_get_contents("http://ipinfo.io/"));
		$city = $details->city; // city
		$state = $details->region;
		$location = $city.', '.$state;
		$coor = print $details->loc;
		
		$coordinates = explode(",", $details->loc); // -> '31,-89' becomes'31','-80'
		$lat = $coordinates[0]; // latitude
		$lon = $coordinates[1]; // longitude
		
		if ($password == $repassword) {
			// create user
			$sql = "INSERT INTO accounts(id, fname, lname, username, email, password) VALUES(NULL, '$fname','$lname','$username', '$email', '$repassword')";
			$sql2 = "INSERT INTO profiles(id, fname, lname, username, email, genre, location, lat, lon, instruments, age, experience,image,scuser) VALUES(NULL,'$fname','$lname','$username', '$email','','$location','$lat', '$lon','',0,0,'','')";
			$addprofile = mysqli_query($db, $sql2);
			if(mysqli_query($db, $sql)){
				echo "New record created successfully";
			}else{
				echo "New record not created";
			}
			header("location: loginpage.php"); //redirect to home page
		}else{
			print "Passwords do not match. Please return to previous page and try again.";
		}
	}
?>
