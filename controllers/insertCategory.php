<?php
	if(isset($_GET['add'])){
		$category_name = $_POST['category_name'];
		$description = $_POST['description'];
		$parent_group = $_POST['parent_group'];
		require_once '../include/DBFunctions.php';
		$db = new DBFunctions();
		$results = $db->createCategory($category_name, $description, $parent_group);
		session_start();
		if($results){
			if(isset($_SESSION['message'])) unset($_SESSION['message']);
			session_start();
			$_SESSION['message'] = "Create successful";
			header('Location: ../category.php');
			exit();
		} else if(!$results) {
			if(isset($_SESSION['message'])) unset($_SESSION['message']);
			session_start();
			$_SESSION['message'] = "Create failure";
			header('Location: ../category.php');
			exit();
		} else {
			if(isset($_SESSION['message'])) unset($_SESSION['message']);
			session_start();
			$_SESSION['message'] =  $results;
			header('Location: ../category.php');
			exit();
		}
	} elseif (isset($_GET['edit'])) {
		$id = $_POST['id'];
		$category_name = $_POST['category_name'];
		$description = $_POST['description'];
		$parent_group = $_POST['parent_group'];

		require_once '../include/DBFunctions.php';
		$db = new DBFunctions();

		$results = $db->editCategory($id, $category_name, $description, $parent_group);
		session_start();
		if($results){
			if(isset($_SESSION['message'])) unset($_SESSION['message']);
			session_start();
			$_SESSION['message'] = "Edit successful";
			header('Location: ../category.php');
			exit();
		} else {
			if(isset($_SESSION['message'])) unset($_SESSION['message']);
			session_start();
			$_SESSION['message'] = "Edit failure";
			header('Location: ../category.php');
			exit();
		}
	}
?>