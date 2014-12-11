<?php
require_once '.././include/DBFunctions.php';
$db = new DBFunctions ();
if (isset ( $_POST ['action'] ) && $_POST ['action'] == 'login') {
	session_start ();
	if (isset ( $_POST ['username'] )) {
		$email = $_POST ['username'];
		$password = $_POST ['password'];
		if ($db->checkLogin ( $email, $password )) {
			$_SESSION ['username'] = $email;
			echo 'Login success';
		}
		// else
		// echo 'Login fail';
	}
}
if (isset ( $_POST ['action'] ) && $_POST ['action'] == 'logout') {
	session_start ();
	unset ( $_SESSION ['username'] );
	session_destroy ();
	echo 'logout success';
}
?>