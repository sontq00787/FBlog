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
					<span><span class="ico  gray connect"></span>Quản lí nhóm người dùng</span>
				</div>
				<!-- End header -->
				<div class="clear"></div>
				<div class="content">

					<div id="uploadTab">
						<ul class="tabs">
							<li><a href="#tab1" id="2"> Groups</a></li>
						</ul>
						<div class="tab_container">
							<div id="tab1" class="tab_content">
								<div class="load_page">
									<ul class="uibutton-group">
										<li><span class="tip"><a class="uibutton icon add on_load"
												name="#tab1" title="Click to add user"
												tabname="Thêm nhóm người dùng">Thêm nhóm người dùng</a></span></li>
										<li><a class="uibutton special DeleteAll">Xóa</a></li>
									</ul>
									<form class="tableName toolbar">

										<h3>Danh sách các nhóm</h3>
										<?php
										require_once '.././include/DBFunctions.php';
										$db = new DBFunctions ();
										$listgroups = $db->getGroups() ;
										?>
										<table class="display data_table2 " id="data_table">
											<thead>
												<tr>
													<th width="35"><input type="checkbox" id="checkAll1"
														class="checkAll" /></th>
													<th width="40" align="left">ID nhóm</th>
													<th width="246">Tên nhóm</th>
													<th width="352">Mô tả</th>
													<th width="199">Công cụ quản lí</th>
												</tr>
											</thead>
											<tbody>
												<?php
												if ($listgroups) {
													foreach ( $listgroups as $group ) {
														echo "<tr>";
														echo "<td width=\"35\"><input type=\"checkbox\" name=\"checkbox[]\"
														class=\"chkbox\" id=\"check" . $group ['id'] . "\" /></td>";
														// echo "<td></td>";
														echo '<td>' . $group ['id'] . '</td>';
														echo '<td>' . $group ['name'] . '</td>';
														echo '<td>' . $group ['description'] . '</td>';
														echo "<td><span class=\"tip\"> <a onclick=\"getGroup(" . $group ['id'] . ")\" id=\"" . $group ['id'] . "\" title=\"Edit\" class=\"Edit\"> <img
																src=\"../styles/ziceadmin/images/icon/icon_edit.png\">
														</a>
													</span> <span class=\"tip\"> <a id=\"" . $group ['id'] . "\" class=\"Delete\"
															name=\"" . $group ['name'] . "\" title=\"Delete\"> <img
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
												onClick="jQuery('#create_group_form').validationEngine('hideAll')"
												title="Go Back">Trang quản lí nhóm người dùng</a></span></li>
										<li><span class="tip"><a class="uibutton special"
												onClick="ResetForm()" title="Reset  Form">Làm lại</a></span></li>
									</ul>
									<form id="create_group_form" action="#">

										<div class="section ">
											<label> Tên nhóm<small>Tên của nhóm người dùng</small></label>
											<div>
												<input type="text" class="validate[required] large"
													name="group_name" id="group_name">
											
											</div>
										</div>
										<div class="section ">
											<label> Mô tả<small>mô tả ngắn gọn về nhóm người dùng này</small></label>
											<div>
												<input type="text"
													class="validate[required]  large"
													name="group_description" id="group_description">
											
											</div>
										</div>
										<div class="section last">
										<div id="selected_group" style="display: none;"></div>
											<div id="create_group_div">
												<a class="uibutton" id="create_group">Tạo mới</a>
											</div>
											<div id="update_group_div" style="display: none;">
												<a class="uibutton" id="update_group">Cập nhật</a>
											</div>
										</div>
									</form>
									<script type="text/javascript" src="../styles/ziceadmin/js/sontq/group.js">
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
