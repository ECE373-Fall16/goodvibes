<?php 	include ('./inc/header.php'); ?>

<?php
//Find band Requests
$user_to=$logged_in_user;
$bandRequests = mysqli_query($database,"SELECT * FROM band_requests WHERE user_to='$user_to'");
$numrows = mysqli_num_rows($bandRequests);
if ($numrows == 0) {
 echo "You have no band requests at this time.";
 $user_from = "";
}
else
{
 while ($get_row = mysqli_fetch_array($bandRequests, MYSQLI_ASSOC)) {
  $id = $get_row['id']; 
  $user_to = $get_row['user_to'];
  $user_from = $get_row['user_from'];
  $bandname=$get_row['bandname'];
  $bandnamewows=str_replace(' ', '',$get_row['bandname']);
  echo  '<br />' . $user_from . ' wants you to join his band named '.$bandname.'<br />';

?>
<?php
if (isset($_POST['acceptrequest'.$bandnamewows])) {
	$bandinsert = mysqli_query($database, "SELECT * FROM bands WHERE name='$bandname'");
	$bandrow = mysqli_fetch_array($bandinsert,MYSQLI_ASSOC);
	if($bandrow['member1']==""){
		$insert="UPDATE bands SET member1='$user_to' WHERE name='$bandname'";
		$addmember= mysqli_query($database, $insert);
	} else if($bandrow['member2']==""){
		$insert="UPDATE bands SET member2='$user_to' WHERE name='$bandname'";
		$addmember= mysqli_query($database, $insert);
	}else if($bandrow['member3']==""){
		$insert="UPDATE bands SET member3='$user_to' WHERE name='$bandname'";
		$addmember= mysqli_query($database, $insert);
	}else if($bandrow['member4']==""){
		$insert="UPDATE bands SET member4='$user_to' WHERE name='$bandname'";
		$addmember= mysqli_query($database, $insert);
	}else if($bandrow['member5']==""){
		$insert="UPDATE bands SET member5='$user_to' WHERE name='$bandname'";
		$addmember= mysqli_query($database, $insert);
	}else if($bandrow['member6']==""){
		$insert="UPDATE bands SET member6='$user_to' WHERE name='$bandname'";
		$addmember= mysqli_query($database, $insert);
	}else if($bandrow['member7']==""){
		$insert="UPDATE bands SET member7='$user_to' WHERE name='$bandname'";
		$addmember= mysqli_query($database, $insert);
	}else if($bandrow['member8']==""){
		$insert="UPDATE bands SET member8='$user_to' WHERE name='$bandname'";
		$addmember= mysqli_query($database, $insert);
	}else if($bandrow['member9']==""){
		$insert="UPDATE bands SET member9='$user_to' WHERE name='$bandname'";
		$addmember= mysqli_query($database, $insert);
	}else if($bandrow['member10']==""){
		$insert="UPDATE bands SET member10='$user_to' WHERE name='$bandname'";
		$addmember= mysqli_query($database, $insert);
	}else{
		
	}
  echo "You are now in $bandname!";
  $delete_request = mysqli_query($database,"DELETE FROM band_requests WHERE user_to='$logged_in_user'&&user_from='$user_from' &&bandname='$bandname'");

  header("Location: bandRequests.php");

}
if (isset($_POST['ignorerequest'.$bandnamewows])) {
$ignore_request = mysqli_query($database,"DELETE FROM band_requests WHERE user_to='$logged_in_user'&&user_from='$user_from'&&bandname='$bandname'");
  echo "Request Ignored!";
  header("Location: bandRequests.php");
}
?>
<form action="bandRequests.php" method="POST">
<input type="submit" name="acceptrequest<?php echo $bandnamewows; ?>" value="Accept Request">
<input type="submit" name="ignorerequest<?php echo $bandnamewows; ?>" value="Ignore Request">
</form>
<?php
  }
  }
?>
