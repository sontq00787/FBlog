<?php session_start();?>
<?php

require_once '.././include/DBFunctions.php';
require_once '.././include/Functions.php';
$db = new DBFunctions ();
$func = new Functions ();
if (isset ( $_POST ['post_title'] )) {
	$post_title = $_POST ['post_title'];
	$post_content = $_POST ['post_content'];
	$post_author = $_SESSION ['user_id'];
	$post_status = $_POST ['post_status'];
	$post_category = $_POST ['post_category'];
	$post_password = $_POST ['post_password'];
	if ($_POST ['selected_post'] == '') {
		if ($db->createPost ( $post_title, $post_author, $post_content, $post_status, $post_category, $post_password )) {
			$_SESSION ["doinsert"] = true;
			// echo "<script>$( document ).ready(function() {showSuccess(\"Done\");});</script>";//this line not work in this poisition
		} else {
			$_SESSION ["doinsert"] = false;
		}
	} else {
		$postid = $_POST ['selected_post'];
		if ($db->updatePost ( $postid, $post_title, $post_content, $post_status, $post_category, $post_password )) {
			$_SESSION ["doupdate"] = true;
		} else {
			$_SESSION ["doupdate"] = false;
		}
	}
	$page = 'post.php';
	header ( 'Location: ' . $page, true, 303 );
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>

        <?php include_once './template/head.php';?>
        </head>
<body class="dashborad">

	<div id="alertMessage" class="error"></div>

	<?php include_once './template/header.php';?>
	<!--//  header -->
	<div id="shadowhead"></div>
	<div id="hide_panel">
		<a class="butAcc" rel="0" id="show_menu"></a> <a class="butAcc"
			rel="1" id="hide_menu"></a> <a class="butAcc" rel="0"
			id="show_menu_icon"></a> <a class="butAcc" rel="1"
			id="hide_menu_icon"></a>
	</div>

<?php include_once './template/sidebar.php';?>
<script type="text/javascript">
$('#admin_control').addClass('select');
</script>
	<div id="content">
		<div class="inner">
			<?php include_once './template/topcol.php';?>
			<div class="clear"></div>

			<div class="onecolumn">
				<div class="header">
					<span><span class="ico  gray connect"></span>Quản lí người dùng</span>
				</div>
				<!-- End header -->
				<div class="clear"></div>
				<div class="content">

					<div id="uploadTab">
						<ul class="tabs">
							<li><a href="#tab1" id="2"> Các bài viết</a></li>
						</ul>
						<div class="tab_container">
							<div id="tab1" class="tab_content">
								<div class="load_page">
									<ul class="uibutton-group">
										<li><span class="tip"><a class="uibutton icon add on_load"
												name="#tab1" title="Click to add post" tabname="Tạo bài mới">Tạo
													bài mới</a></span></li>
										<li><a class="uibutton special DeleteAll">Xóa</a></li>
									</ul>
									<form class="tableName toolbar">

										<h3>Danh sách bài viết</h3>
										<?php
										
										$listposts = $db->getListPostBasicInfo ();
										?>
										<table class="display data_table2 " id="data_table">
											<thead>
												<tr>
													<th width="35"><input type="checkbox" id="checkAll1"
														class="checkAll" /></th>
													<th width="352" align="left">Tiêu đề bài viết</th>
													<th width="246">Tóm tắt</th>
													<th width="172">Ngày đăng</th>
													<th width="100">Công cụ quản lí</th>
												</tr>
											</thead>
											<tbody>
												<?php
												if ($listposts) {
													foreach ( $listposts as $post ) {
														echo "<tr>";
														echo "<td width=\"35\"><input type=\"checkbox\" name=\"checkbox[]\"
														class=\"chkbox\" id=\"check" . $post ['id'] . "\" /></td>";
														// echo "<td></td>";
														echo '<td>' . $post ['post_title'] . '</td>';
														echo '<td>' . $func->splitStr ( $post ['post_content'], 500 ) . '</td>';
														echo '<td>' . $post ['post_date'] . '</td>';
														echo "<td><span class=\"tip\"> <a onclick=\"getPost(" . $post ['id'] . ")\" id=\"" . $post ['id'] . "\" title=\"Edit\" class=\"Edit\"> <img
																src=\"../styles/ziceadmin/images/icon/icon_edit.png\">
														</a>
													</span> <span class=\"tip\"> <a id=\"" . $post ['id'] . "\" class=\"Delete\"
															name=\"" . $post ['post_title'] . "\" title=\"Delete\"> <img
																src=\"../styles/ziceadmin/images/icon/icon_delete.png\">
														</a>
													</span></td>";
														echo "</tr>";
													}
												}
												?>
												
											</tbody>
										</table>
									</form>
								</div>
								<div class="show_add" style="display: none">
									<ul class="uibutton-group">
										<li><span class="tip"><a class="uibutton icon prev on_prev "
												id="on_prev_pro" name="#tab2"
												onClick="jQuery('#create_post_form').validationEngine('hideAll');$('#selected_post').html('')"
												title="Go Back">Trang quản lí bài viết</a></span></li>
										<li><span class="tip"><a class="uibutton special"
												onClick="ResetForm()" title="Reset  Form">Làm lại</a></span></li>
									</ul>
									<form id="create_post_form" action="#" method="post">

										<div class="section ">
											<label> Tiêu đề<small>Tiêu đề của bài viết</small></label>
											<div>
												<input type="text" class="validate[required] large"
													name="post_title" id="post_title">

											</div>
										</div>
										<div class="section">
											<label> Nội dung <small>Nội dung bài viết</small></label>
											<div>
												<textarea name="post_content" id="editor" class="editor"
													cols="" rows=""></textarea>
											</div>
										</div>
										<div class="section">
											<label>Trạng thái bài viết</label>
											<div>

												<input type="radio" name="post_status" id="radio-1"
													value="publish" class="ck" checked="checked" /> <label
													for="radio-1">Publish</label> <input type="radio"
													name="post_status" id="radio-2" value="closed" class="ck" />
												<label for="radio-2">Closed</label> <input type="radio"
													name="post_status" id="radio-3" value="draft" class="ck" />
												<label for="radio-3">Draft</label>

											</div>
										</div>
										<div class="section">
											<label> Đặt mật khẩu <small>Đặt mật khẩu truy cập cho bài
													viết</small></label>
											<div>
												<input type="password" class="validate[minSize[3]] medium"
													name="post_password" id="post_password" /><label>Password</label>
											</div>
										</div>
										<div class="section">
											<label>Danh mục </label>
											<div>
												<select class="large" name="post_category"
													id="post_category">
												<?php
												$listcategories = $db->listCategories ();
												if ($listcategories) {
													foreach ( $listcategories as $cat ) {
														echo "<option value=" . $cat [0] . ">" . $cat [1] . "</option>";
													}
												}
												?>	
												</select>
											</div>
										</div>
										<div class="section last">
											<!-- <div id="selected_post" style="display: inline;"></div> -->
											<input type="hidden" name="selected_post" id="selected_post" />
											<div id="create_post_div">
												<!-- 												<a class="uibutton" id="create_post">Tạo mới</a>  -->
												<input type="submit" class="uibutton" value="Tạo mới" />
											</div>
											<div id="update_post_div" style="display: none;">
												<!-- 												<a class="uibutton" id="update_post">Cập nhật</a> -->
												<input type="submit" class="uibutton" value="Cập nhật" />
											</div>
										</div>
									</form>
									
										<?php
										if (isset ( $_SESSION ['doinsert'] )) {
											if ($_SESSION ['doinsert']) {
												echo "<script>showSuccess(\"Đăng bài mới thành công.\");</script>";
											} else {
												echo "<script>showError(\"Lỗi khi đăng bài.\");</script>";
											}
											unset ( $_SESSION ['doinsert'] );
										}
										if (isset ( $_SESSION ['doupdate'] )) {
											if ($_SESSION ['doupdate']) {
												echo "<script>showSuccess(\"Sửa bài viết thành công.\");</script>";
											} else {
												echo "<script>showError(\"Lỗi khi sửa bài viết.\");</script>";
											}
											unset ( $_SESSION ['doupdate'] );
										}
										?>
									<script type="text/javascript"
										src="../styles/ziceadmin/js/sontq/post.js">
									</script>

								</div>
							</div>
							<!--tab2-->

						</div>
					</div>
					<!--/END TAB/-->
					<div class="clear" />
				</div>
			</div>
		</div>



		<div class="clear"></div>
                    <?php include_once './template/footer.php';?>
                </div>
	<!--// End inner -->
	</div>
	<!--// End content -->
</body>
</html>
