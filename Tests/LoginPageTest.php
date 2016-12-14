<?php
namespace ECE373-Fall16/goodvibes/;

use 'loginpage.php';

class LoginPageTest extends PHPUnit_Framework_TestCase{
  public function blankEntries(){
	  <form action="loginpage.php" method="POST">
	  $username "";
	  $password = "";
	  $this->assertEquals($error_message, "YOUR ACCOUNT DOESN'T EXIST");
  }
  
}
?>
