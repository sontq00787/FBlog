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
			echo true;
		}
		// else
		// echo 'Login fail';
	}
}

// do logout
else if (isset ( $_POST ['action'] ) && $_POST ['action'] == 'logout') {
	session_start ();
	unset ( $_SESSION ['username'] );
	session_destroy ();
	echo true;
}

// do add new user
else if (isset ( $_POST ['action'] ) && $_POST ['action'] == 'newuser') {
	$username = $_POST ['username'];
	$display_name = $_POST ['display_name'];
	$user_email = $_POST ['user_email'];
	$password = $_POST ['password'];
	$user_group = $_POST ['user_group'];
	$user_status = $_POST ['user_status'];
	echo $db->createUserByAdmin ( $username, $user_email, $password, $user_status, $display_name, $user_group );
}

//do get user infomation
else if (isset ( $_POST ['action'] ) && $_POST ['action'] == 'getuser') {
	$userid = $_POST['userid'];
	echo json_encode($db->getUserById($userid));
}

//do delete an user by userid
else if (isset ( $_POST ['action'] ) && $_POST ['action'] == 'deleteuser') {
	$userid = $_POST['userid'];
	echo $db->deleteAnUser($userid);
}
//do update user
else if (isset ( $_POST ['action'] ) && $_POST ['action'] == 'updateuser') {
	$userid = $_POST['userid'];
	$username = $_POST ['username'];
	$display_name = $_POST ['display_name'];
	$user_email = $_POST ['user_email'];
	$password = $_POST ['password'];
	$user_group = $_POST ['user_group'];
	$user_status = $_POST ['user_status'];
	echo $db -> updateUser($userid, $username, $user_email, $password, $user_status, $display_name, $user_group);
}
//do add group
else if (isset ( $_POST ['action'] ) && $_POST ['action'] == 'newgroup') {
	$name = $_POST ['name'];
	$description = $_POST ['description'];
	echo $db -> createGroup($name, $description);
}
//do get group information
else if (isset ( $_POST ['action'] ) && $_POST ['action'] == 'getgroup') {
	$groupid = $_POST ['groupid'];
	echo json_encode($db -> getGroup($groupid));
}
//do update group
else if (isset ( $_POST ['action'] ) && $_POST ['action'] == 'updategroup') {
	$groupid = $_POST ['groupid'];
	$name = $_POST ['name'];
	$description = $_POST ['description'];
	echo $db -> updateGroup($groupid, $name, $description);
}
//do delete a group
else if (isset ( $_POST ['action'] ) && $_POST ['action'] == 'deletegroup') {
	$groupid = $_POST ['groupid'];
	echo $db -> deleteAGroup($groupid);
}
?>