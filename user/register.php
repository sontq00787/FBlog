<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>FBlog &rsaquo; Register User</title>
</head>
<body>
	<h2>Register Form</h2>
	<form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
		User Name: <input type="text" name="user_name" /><br /> Email: <input
			type="email" name="email" /> <br /> Password: <input type="password"
			name="user_password" /><br />
		<!-- Display Name: <input type="text" name="display_name" /> <br /> -->
		<input type="submit" value="Ok" />
	</form>
</body>
</html>
<?php
require_once '.././include/DBFunctions.php';
$db = new DBFunctions ();
if (isset ( $_POST ['email'] )) {
	$name = $_POST ['user_name'];
	$email = $_POST ['email'];
	$password = $_POST ['user_password'];
	echo $db->createUser ( $name, $email, $password );
}
?>