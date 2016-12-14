<?php
namespace ECE373-Fall16/goodvibes/;

use 'createAccount_script.php';

class CreateAccountScriptTest extends PHPUnit_Framework_TestCase{
  public function blankEntries(){
	  <form action="createAccount_script.php" method="POST">
	  $fname = "";
	  $lname = "";
	  $username "";
	  $password = "";
	  $repassword = "";
	  $this->assertEquals($error, true);
  }
  
}
?>
