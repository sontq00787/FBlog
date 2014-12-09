<?php
	if (isset($_GET['action'])) {
		$id = $_GET['id'];
		if($id != "" && $id != null){
			require_once '../include/DBFunctions.php';
			$db = new DBFunctions();
			$result = $db->deleteCategory($id);
			session_start();
			if($result){
				if(isset($_SESSION['message'])) unset($_SESSION['message']);
				session_start();
				$_SESSION['message'] = "Delete successful";
				header('Location: ../category.php');
				exit();
			} else {
				if(isset($_SESSION['message'])) unset($_SESSION['message']);
				session_start();
				$_SESSION['message'] = "Delete failure";
				header('Location: ../category.php');
			}
		}
	}
?>