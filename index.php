<?php
	echo '&copy; 2014 by SonTQ.';
	require_once './include/DBFunctions.php';
	$db = new DBFunctions();
	echo $db -> createUser("sontq", "sontq00787@gmail.com", "sontq00787");
?>