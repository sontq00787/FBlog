<html>
<head>
	<meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate" />
	<meta http-equiv="pragma" content="no-cache" />
	<meta http-equiv="expires" content="0" />
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>Category Management</title>
	<style type="text/css">
		.table-row{
			border: 1px solid #000;
		}
	</style>
</head>
<body>
	<?php
		if(isset($_SESSION['message'])){ 
			echo "string";
			// echo $_SESSION['message'];
			// unset($_SESSION['message']);
		}
	?>
	<form action="./controllers/insertCategory.php" method="post">
		<?php
			if (isset($_GET['action'])) {
				echo '<input name="id" type="hidden" value="'.$_GET['id'].'" />';
				echo '<input name="category_name" placeholder="Category Name" value="'.$_GET['name'].'" required/><br/>';
				echo '<input name="description" placeholder="Description" value="'.$_GET['description'].'" required/><br/>';
				echo '<select name="parent_group" value="'.$_GET['parent_group'].'">';
				echo "<option value=''>Select...</option>";
				require_once './include/DBFunctions.php';
				$db = new DBFunctions();
				$data = $db->listCategories();
				if($data != ""){
					foreach ($data as $item) {
						$parent_group = $_GET['parent_group'];
						if($item[0] == $parent_group){
							echo "<option value=".$item[0]." selected>".$item[1]."</option>";
						} else {
							echo "<option value=".$item[0].">".$item[1]."</option>";
						}
					}
				}
				echo '</select><br/>';
				echo '<input class="btn-submit" name="add" type="submit" value="Add" disabled/>';
				echo '<input class="btn-submit" name="edit" type="submit" value="Edit"/>';
			} else {
		?>
			<input name="category_name" placeholder="Category Name" required/><br/>
			<input name="description" placeholder="Description" required/><br/>
			<select name="parent_group">
				<?php
					require_once './include/DBFunctions.php';
					$db = new DBFunctions();
					$data = $db->listCategories();
					echo "<option value=''></option>";
					if($data != ""){
						foreach ($data as $item) {
							echo "<option value=".$item[0].">".$item[1]."</option>";
						}
					}
				?>
			</select><br/>
			<input class="btn-submit" name="add" type="submit" value="Add"/>
			<input class="btn-submit" name="edit" type="submit" value="Edit" disabled/>
		<?php
			}
		?>
		
	</form>

	<table class="table-row">
		<tr class="table-row">
			<td class="table-row">ID</td>
			<td class="table-row">Name</td>
			<td class="table-row">Description</td>
			<td class="table-row">Parent Group</td>
			<td class="table-row">Action</td>
		</tr>
		<?php
			require_once './include/DBFunctions.php';
			$db = new DBFunctions();
			$data = $db->tableCategories();

			if($data != "") {
				foreach ($data as $item) {
					echo "<tr class='table-row'><td class='table-row'>";
					echo $item[0];
					echo "</td><td class='table-row'>";
					echo $item[1];
					echo "</td><td class='table-row'>";
					echo $item[2];
					echo "</td><td class='table-row'>";
					echo $item[3];
					echo '</td><td class="table-row"><a href="category.php?action=edit&id='.$item[0].'&name='.$item[1].'&description='.$item[2].'&parent_group='.$item[3].'">Edit</a>|<a href="./controllers/deleteCategory.php?action=delete&id='.$item[0].'">Delete</a></td></tr>';
				}
			}
		?>
	</table>
</body>
</html>