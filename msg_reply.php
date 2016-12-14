<?php
include ('./inc/header.php');
	$database = mysqli_connect("localhost","root","password","user_accounts");
	$id = $_GET['id'];
	$account = mysqli_query($database,"SELECT * FROM profiles WHERE id = '$id'");
	$accountrow = mysqli_fetch_array($account,MYSQLI_ASSOC);
	$user = $accountrow['username'];
	
          if (isset($_POST['submit'])) {
            $msg_title = strip_tags(@$_POST['msg_title']);
            $msg_body = strip_tags(@$_POST['msg_body']);
            $date = date("Y-m-d");
            $opened = "no";
            $deleted = "no";
            
            if ($msg_title == "Enter the message title here ...") {
             echo "Please give your message a title.";
            }
            else
            if (strlen($msg_title) < 3) {
             echo "Your message title cannot be less than 3 characters in length!";
            }
            else
            if ($msg_body == "Enter the message you wish to send ...") {
             echo "Please write a message.";
            }
            else
            if (strlen($msg_body) < 3) {
             echo "Your message cannot be less than 3 characters in length!";
            }
            else
            {

            $send_msg = mysql_query("INSERT INTO pvt_messages VALUES ('','$user','$username','$msg_title','$msg_body','$date','$opened','$deleted')");
           echo "Your message has been sent!";
            }
          }
        echo "
        
        <form action='send_msg.php?u=$username' method='POST'>
        <h2>Compose a Message: ($username)</h2>
        <input type='text' name='msg_title' size='30' onClick=\"value=''\" value='Enter the message title here ...'><p />
        <textarea cols='50' rows='12' name='msg_body'>Enter the message you wish to send ...</textarea><p />
        <input type='submit' name='submit' value='Send Message'>
        </form>

        ";
?>