<?php 
	include('session.php');
	// connect to database
	$database = mysqli_connect('localhost', 'root', 'password','user_accounts');
	if (isset($_POST['submit'])) {
		
		if(($_POST['member2'])!=''){
			$member2 = $_POST['member2'];
			$member2exist = mysqli_query($database,"SELECT * FROM accounts WHERE username = '$member2'"); 
			$count = mysqli_num_rows($member2exist); // count how many rows have that user name and password
			if($count==1){
			$setmember2 = mysqli_query($database,"UPDATE bands SET member2 = '$member2' WHERE bandleader = '$logged_in_user'");
			}
			else{
			echo "The account you entered for member 2 doesn't exist";
			}
			
		}
		
		if(($_POST['member3'])!=''){
			$member3 = $_POST['member3'];
			$member3exist = mysqli_query($database,"SELECT * FROM accounts WHERE username = '$member3'"); 
			$count = mysqli_num_rows($member3exist); // count how many rows have that user name and password
			if($count==1){
			$setmember3 = mysqli_query($database,"UPDATE bands SET member3 = '$member3' WHERE bandleader = '$logged_in_user'");
			}
			else{
				echo "That account you entered for member 3 doesn't exist";
			}
		}
		
		if(($_POST['member4'])!=''){
			$member4 = $_POST['member4'];
			$member4exist = mysqli_query($database,"SELECT * FROM accounts WHERE username = '$member4'"); 
			$count = mysqli_num_rows($member4exist); // count how many rows have that user name and password
			if($count==1){
			$setmember4 = mysqli_query($database,"UPDATE bands SET member4 = '$member4' WHERE bandleader = '$logged_in_user'");
			}
			else{
				echo "That account you entered for member 4 doesn't exist";
			}
		}
		
		if(($_POST['member5'])!=''){
			$member5 = $_POST['member5'];
			$member5exist = mysqli_query($database,"SELECT * FROM accounts WHERE username = '$member5'"); 
			$count = mysqli_num_rows($member5exist); // count how many rows have that user name and password
			if($count==1){
			$setmember5 = mysqli_query($database,"UPDATE bands SET member5 = '$member5' WHERE bandleader = '$logged_in_user'");
			}
			else{
				echo "That account you entered for member 5 doesn't exist";
			}
		}
		
		if(($_POST['member6'])!=''){
			$member6 = $_POST['member6'];
			$member6exist = mysqli_query($database,"SELECT * FROM accounts WHERE username = '$member6'"); 
			$count = mysqli_num_rows($member6exist); // count how many rows have that user name and password
			if($count==1){
			$setmember6 = mysqli_query($database,"UPDATE bands SET member6 = '$member6' WHERE bandleader = '$logged_in_user'");
			}
			else{
				echo "That account you entered for member 4 doesn't exist";
			}
		}
		
	
	}
		
			header("location: addMembers.php");
	
?>