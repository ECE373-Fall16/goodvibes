<?PHP
	include('session.php');
	print "welcome $logged_in_user";
/*$username = $_POST['username'];
$password = $_POST['password'];

$info = $username . "," . $password;
$file = "file.csv";

file_put_contents($file, $info . PHP_EOL, FILE_APPEND);
*/

?>

<HTML>
	<HEAD>
		<title>
		Welcome!
		</title>
	</HEAD>
<BODY>
	
	<h1> Welcome <?php print "$logged_in_user;" ?> </h1>
	<h2><a href="logout.php">Log Out</a></h2>


</BODY>
</HTML>
