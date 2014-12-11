<?php
require_once '.././include/DBFunctions.php';
$db = new DBFunctions ();

// do login
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

// do logout
if (isset ( $_POST ['action'] ) && $_POST ['action'] == 'logout') {
	session_start ();
	unset ( $_SESSION ['username'] );
	session_destroy ();
	echo 'logout success';
}

// do add new user
if (isset ( $_POST ['action'] ) && $_POST ['action'] == 'newuser') {
	$username = $_POST ['username'];
	$display_name = $_POST ['display_name'];
	$user_email = $_POST ['user_email'];
	$password = $_POST ['password'];
	$user_group = $_POST ['user_group'];
	$user_status = $_POST ['user_status'];
	echo $db->createUserByAdmin ( $username, $user_email, $password, $user_status, $display_name, $user_group );
}
?>