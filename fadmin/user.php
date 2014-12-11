<?php session_start();?>
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
							<li><a href="#tab2" id="3"> Members</a></li>
						</ul>
						<div class="tab_container">
							<div id="tab2" class="tab_content">
								<div class="load_page">
									<ul class="uibutton-group">
										<li><span class="tip"><a class="uibutton icon add on_load"
												name="#tab1" title="Click Add User">Thêm người dùng</a></span></li>
										<li><a class="uibutton special DeleteAll">Xoá</a></li>
									</ul>
									<form class="tableName toolbar">

										<h3>Danh sách thành viên</h3>
										<?php
										require_once '.././include/DBFunctions.php';
										$db = new DBFunctions ();
										$listuser = $db->getAllUsers ();
										?>
										<table class="display data_table2 " id="data_table">
											<thead>
												<tr>
													<th width="35"><input type="checkbox" id="checkAll1"
														class="checkAll" /></th>
													<th width="352" align="left">Tên người dùng</th>
													<th width="174">Nhóm</th>
													<th width="246">Ngày đăng ký</th>
													<th width="199">Công cụ quản lý</th>
												</tr>
											</thead>
											<tbody>
												<?php
												if ($listuser) {
													foreach ( $listuser as $user ) {
														echo "<tr>";
														echo "<td width=\"35\"><input type=\"checkbox\" name=\"checkbox[]\"
														class=\"chkbox\" id=\"check" . $user ['id'] . "\" /></td>";
														echo '<td>' . $user ['user_name'] . '</td>';
														echo '<td>' . $user ['user_group'] . '</td>';
														echo '<td>' . $user ['user_registered'] . '</td>';
														echo "<td><span class=\"tip\"> <a title=\"Edit\"> <img
																src=\"../styles/ziceadmin/images/icon/icon_edit.png\">
														</a>
													</span> <span class=\"tip\"> <a id=\"1\" class=\"Delete\"
															name=\"Band ring\" title=\"Delete\"> <img
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
												onClick="jQuery('#create_user_form').validationEngine('hideAll')"
												title="Go Back">Trang quản lí người dùng</a></span></li>
										<li><span class="tip"><a class="uibutton special"
												onClick="ResetForm()" title="Reset  Form">Làm lại</a></span></li>
									</ul>
									<form id="create_user_form"
										action="<?=$_SERVER['REQUEST_URI']?>" method="post">

										<div class="section ">
											<label> Tên của người dùng<small>Họ tên của người dùng</small></label>
											<div>
												<input type="text" class="validate[required] large"
													name="display_name" id="f_required">
											</div>
										</div>
										<div class="section ">
											<label> Email<small>Email của người dùng</small></label>
											<div>
												<input type="text"
													class="validate[required,custom[email]]  large"
													name="user_email" id="e_required">
											</div>
										</div>
										<div class="section">
											<label> Tài khoản đăng nhập <small>Thông tin tài khoản dùng
													để đăng nhập</small></label>
											<div>
												<input type="text" name="username" id="username"
													class="validate[required,minSize[3],maxSize[20],] medium" /><label>Username</label>
												<span class="f_help"> Username login or register. <br />Should
													be between 3 and not more than 20 characters.
												</span>
											</div>
											<div>
												<input type="password"
													class="validate[required,minSize[3]] medium"
													name="password" id="password" /><label>Password</label>
											</div>
											<div>
												<input type="password"
													class="validate[required,equals[password]] medium"
													name="passwordCon" id="passwordCon" /><label>Confirm
													Password</label> <span class="f_help"> Your password should
													be at least 6 characters.</span>
											</div>
										</div>
										<div class="section">
											<label>Nhóm </label>
											<div>
												<select class="large" name="user_group">
													<option value="1">Mới đăng ký</option>
													<option value="2">Kỳ cựu</option>
													<option value="0">Chưa kích hoạt</option>
												</select>
											</div>
										</div>
										<div class="section">
											<label>Trạng thái người dùng </label>
											<div>
												<select class="large" name="user_status">
													<option value="1">Mới đăng ký</option>
													<option value="2">Kỳ cựu</option>
													<option value="0">Chưa kích hoạt</option>
												</select>
											</div>
										</div>
										<div class="section last">
											<div>
												<a class="uibutton submit_form">Tạo mới</a>
											</div>
										</div>
									</form>
									<?php
									
									if ($_POST ['username']) {
										$username = $_POST['username'];
										$display_name = $_POST['display_name'];
										$user_email = $_POST['user_email'];
										$password = $_POST['password'];
										
									}
									?>

								</div>
							</div>
							<!--tab2-->

						</div>
					</div>
					<!--/END TAB/-->
					<div class="clear" /></div>
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
