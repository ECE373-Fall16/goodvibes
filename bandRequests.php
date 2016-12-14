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
 while ($get_row = mysqli_fetch_assoc($bandRequests)) {
  $id = $get_row['id']; 
  $user_to = $get_row['user_to'];
  $user_from = $get_row['user_from'];
  $bandname=$get_row['bandname'];
  echo  '<br />' . $user_from . ' wants you to join his band named '.$bandname.'<br />';

?>
<?php
if (isset($_POST['acceptrequest'.$bandname])) {
	$bandinsert = mysqli_query($database, "SELECT * FROM bands WHERE name='$bandname'");
	$bandrow = mysqli_fetch_array($bandinsert,MYSQLI_ASSOC);
	if($bandrow['member1']=""){
	$insert="UPDATE bands SET member1='$logged_in_user' WHERE name='$bandname'";
	$addmember= mysqli_query($database, $insert);
	} else if($bandrow['member2']=""){
	$insert="UPDATE bands SET member2='$logged_in_user' WHERE name='$bandname'";
	$addmember= mysqli_query($database, $insert);
	}else{}
	
  $get_band_check = mysqli_query($database,"SELECT band_array FROM profiles WHERE username='$logged_in_user'");
  $get_band_row = mysqli_fetch_array($get_band_check, MYSQLI_ASSOC);
  $band_array = $get_band_row['band_array'];
  $bandArray_explode = explode(",",$band_array);
  $bandArray_count = count($bandArray_explode);


  if ($band_array == "") {
     $bandArray_count = count(NULL);
  }
  if ($bandArray_count == NULL) {
   $add_band_query = mysqli_query($database,"UPDATE profiles SET band_array=CONCAT(band_array,'$bandname') WHERE username='$logged_in_user'");
  }
  if ($bandArray_count >= 1) {
   $add_band_query = mysqli_query($database,"UPDATE profiles SET band_array=CONCAT(band_array,',$bandname') WHERE username='$logged_in_user'");
  }
    echo "You are now in $bandname!";
  $delete_request = mysqli_query($database,"DELETE FROM band_requests WHERE user_to='$logged_in_user'&&user_from='$user_from' &&bandname='$bandname'");

  header("Location: bandRequests.php");

}
if (isset($_POST['ignorerequest'.$bandname])) {
$ignore_request = mysqli_query($database,"DELETE FROM band_requests WHERE user_to='$logged_in_user'&&user_from='$user_from'&&bandname='$bandname'");
  echo "Request Ignored!";
  header("Location: bandRequests.php");
}
?>
<form action="bandRequests.php" method="POST">
<input type="submit" name="acceptrequest<?php echo $bandname; ?>" value="Accept Request">
<input type="submit" name="ignorerequest<?php echo $bandname; ?>" value="Ignore Request">
</form>
<?php
  }
  }
?>