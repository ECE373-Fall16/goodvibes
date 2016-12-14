<?php
namespace ECE373-Fall16/goodvibes/;
use 'session.php';
#This tests whether you connect to the database correctly
class DatabaseConnectionTest extends PHPUnit_Framework_TestCase{
  public function databaseConnect(){
      $db = mysqli_connect("localhost","root","password","user_accounts");
	  $this->assertEquals($db, "No connection to database");
  }
  
}
?>
