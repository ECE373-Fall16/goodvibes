<?php
namespace ECE373-Fall16/goodvibes/;
use 'editprofile_script.php';
class LoginPageTest extends PHPUnit_Framework_TestCase{
  public function wrongType(){
	  <form action="editprofile_script.php" method="POST">
	  $genre = "7"; // should be a string and not an integer so it shouldn't be updated in the database
    $location = "boston";
	  $instruments = "flute";
    $age = "10";
    $experience = "12";
    $sclink = "https://soundcloud.com/octobersveryown";
    </form
    
    $db = mysqli_connect('localhost', 'root', 'password','user_accounts');
    $account = mysqli_query($database,"SELECT * FROM profiles WHERE username = '$logged_in_user'");
    $accountrow = mysqli_fetch_array($account,MYSQLI_ASSOC); // find the row of the account
    $genre = $accountrow['genre']; // get the profile attributes of the logged in user
    
	  $this->assertNotEquals($genre, "7");
  }
  
}
?>
