<?php
require_once '.././include/DBFunctions.php';
$db = new DBFunctions ();
// echo 'dologin';
if (isset ( $_POST ['action'] ) && $_POST['action'] == 'login') {
	if (isset ( $_POST ['username'] )) {
		$email = $_POST ['username'];
		$password = $_POST ['password'];
		if ($db->checkLogin ( $email, $password ))
			echo 'Login success';
		// else
		// echo 'Login fail';
	}
}
?>