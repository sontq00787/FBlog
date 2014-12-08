<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>FBlog &rsaquo; Login User</title>
</head>
<body>
	<h2>Login Form</h2>
	<form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
		User Name/Email: <input type="text" name="mail_user" /><br />
		Password: <input type="password" name="user_password" /><br /> <input
			type="submit" value="Login" />
	</form>
</body>
</html>
<?php
require_once '.././include/DBFunctions.php';
$db = new DBFunctions ();
if (isset ( $_POST ['mail_user'] )) {
	$email = $_POST ['mail_user'];
	$password = $_POST ['user_password'];
	if ($db->checkLogin ( $email, $password ))
		echo 'Login success';
	else
		echo 'Login fail';
}
?>