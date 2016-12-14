<?php
include ('./inc/header.php');
?>
<h2>My Unread Messages:</h2><p />
<?php
//Grab the messages for the logged in user
$grab_messages = mysqli_query($database,"SELECT * FROM private_messages WHERE user_to='$logged_in_user' && opened='no' && deleted='no'");
$numrows = mysqli_num_rows($grab_messages);
if ($numrows != 0) {
while($get_msg = mysqli_fetch_array($grab_messages,MYSQLI_ASSOC)){
      $id = $get_msg['id']; 
      $user_from = $get_msg['user_from'];
      $user_to = $get_msg['user_to'];
      $msg_title = $get_msg['msg_title'];
      $msg_body = $get_msg['msg_body'];
      $date = $get_msg['date'];
      $opened = $get_msg['opened'];
      $deleted = $get_msg['deleted'];
      ?>
      <script language="javascript">
         function toggle<?php echo $id; ?>() {
           var ele = document.getElementById("toggleText<?php echo $id; ?>");
           var text = document.getElementById("displayText<?php echo $id; ?>");
           if (ele.style.display == "block") {
              ele.style.display = "none";
           }
           else
           {
             ele.style.display = "block";
           }
         }
</script>
      <?php
      if (strlen($msg_title) > 50) {
       $msg_title = substr($msg_title, 0, 50)." ...";
      }
      else
      $msg_title = $msg_title;
      
      if (strlen($msg_body) > 150) {
       $msg_body = substr($msg_body, 0, 150)." ...";
      }
      else
      $msg_body = $msg_body;
      
      if (@$_POST['setopened_' . $id . '']) {
       //Update the private messages table
       $setopened_query = mysqli_query($database,"UPDATE private_messages SET opened='yes' WHERE id='$id'");
      }
	  
	  if (@$_POST['reply_' . $id . '']) {
		$grab_user_id = mysqli_query($database,"SELECT id FROM profiles WHERE username='$user_from'");
		$user_row = mysqli_fetch_array($grab_user_id,MYSQLI_ASSOC);
		$user_id = $user_row['id'];
        echo "<meta http-equiv=\"refresh\" content=\"0; url=send_msg.php?id=$user_id\">";
      }
	  
	  if (@$_POST['delete_' . $id . '']) {
		$delete_msg_query = mysqli_query($database,"UPDATE private_messages SET deleted='yes' WHERE id='$id'");
		$delete_message = mysqli_query($database,"DELETE FROM private_messages WHERE id = '$id'");
	  }
      echo "
      <form method='POST' action='my_messages.php' name='$msg_title'>
      <b>$user_from</a></b>
      <input type='button' name='openmsg' value='$msg_title' onClick='javascript:toggle$id()'>
	  <input type='submit' name='reply_$id' value=\"Reply\">
	  <input type='submit' name='setopened_$id' value=\"Mark As Read\">
      <input type='submit' name='delete_$id' value=\"Delete\" title='Delete Message'>
	  </form>
      <div id='toggleText$id' style='display: none;'>
      <br />$msg_body
      </div>
      <hr />
      ";
}
}
else
{
 echo "No messages.";
}
?>
<h2>My Read Messages:</h2><p />
<?php
//Grab the messages for the logged in user
$grab_messages = mysqli_query($database,"SELECT * FROM private_messages WHERE user_to='$logged_in_user' && opened='yes' && deleted='no'");
$numrows_read = mysqli_num_rows($grab_messages);
if ($numrows_read != 0) {
while($get_msg = mysqli_fetch_array($grab_messages,MYSQLI_ASSOC)){
      $id = $get_msg['id'];
      $user_from = $get_msg['user_from'];
      $user_to = $get_msg['user_to'];
      $msg_title = $get_msg['msg_title'];
      $msg_body = $get_msg['msg_body'];
      $date = $get_msg['date'];
      $opened = $get_msg['opened'];
      $deleted = $get_msg['deleted'];
      ?>
        <script language="javascript">
         function toggle<?php echo $id; ?>() {
           var ele = document.getElementById("toggleText<?php echo $id; ?>");
           var text = document.getElementById("displayText<?php echo $id; ?>");
           if (ele.style.display == "block") {
              ele.style.display = "none";
           }
           else
           {
             ele.style.display = "block";
           }
         }
</script>
      <?php
      
      if (strlen($msg_title) > 50) {
       $msg_title = substr($msg_title, 0, 50)." ...";
      }
      else
      $msg_title = $msg_title;
      
      if (strlen($msg_body) > 150) {
       $msg_body = substr($msg_body, 0, 150)." ...";
      }
      else
      $msg_body = $msg_body;
      
	  if (@$_POST['setopened2_' . $id . '']) {
       $setopened_query = mysqli_query($database,"UPDATE private_messages SET opened='no' WHERE id='$id'");
      }
	  
      if (@$_POST['delete_' . $id . '']) {
       $delete_msg_query = mysqli_query($database,"UPDATE private_messages SET deleted='yes' WHERE id='$id'");
	   $delete_message = mysqli_query($database,"DELETE FROM private_messages WHERE id = '$id'");
      }
      if (@$_POST['reply_' . $id . '']) {
       echo "<meta http-equiv=\"refresh\" content=\"0; url=send_msg.php?id=$user_id\">";
      }
      echo "      <form method='POST' action='my_messages.php' name='$msg_title'>
      <b>$user_from</a></b>
      <input type='button' name='openmsg' value='$msg_title' onClick='javascript:toggle$id()'>
	  <input type='submit' name='reply_$id' value=\"Reply\">
	  <input type='submit' name='setopened2_$id' value=\"Mark As Unread\">
	  <input type='submit' name='delete_$id' value=\"Delete\" title='Delete Message'>
      </form>
      <div id='toggleText$id' style='display: none;'>
      <br />$msg_body
      </div>
      <hr /><br />";
}
}
else
{
 echo "No messages.";
}