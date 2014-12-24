<?php
echo '&copy; 2014 by SonTQ.';
echo "<br>";
echo gethostbyname ( $_SERVER ['REMOTE_ADDR'] );
echo "<br>";
// get host by name
echo gethostname ();
echo "<br>";
// get OS
echo php_uname ();
$ip = getenv("REMOTE_ADDR") ;
echo "Your IP Address Is : <b><u>$ip</u></b> ";
// echo false;
// require_once './include/DBFunctions.php';
// $db = new DBFunctions();
// echo $db -> createUser("sontq", "sontq00787@gmail.com", "sontq00787");
?>