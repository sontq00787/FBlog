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
							<li><a href="#tab1" id="2"> Members</a></li>
						</ul>
						<div class="tab_container">
							<div id="tab1" class="tab_content">
								<div class="load_page">
									<ul class="uibutton-group">
										<li><span class="tip"><a class="uibutton icon add on_load"
												name="#tab1" title="Click to add user"
												tabname="Thêm người dùng">Thêm người dùng</a></span></li>
										<li><a class="uibutton special DeleteAll">Xóa</a></li>
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
													<th width="246">Ngày tham gia</th>
													<th width="199">Công cụ quản lí</th>
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
														echo "<td><span class=\"tip\"> <a id=\"" . $user ['id'] . "\" title=\"Edit\" class=\"Edit\"> <img
																src=\"../styles/ziceadmin/images/icon/icon_edit.png\">
														</a>
													</span> <span class=\"tip\"> <a id=\"" . $user ['id'] . "\" class=\"Delete\"
															name=\"" . $user ['user_name'] . "\" title=\"Delete\"> <img
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
									<form id="create_user_form" action="#">

										<div class="section ">
											<label> Tên người dùng<small>Họ tên của người dùng</small></label>
											<div>
												<input type="text" class="validate[required] large"
													name="display_name" id="display_name">
											
											</div>
										</div>
										<div class="section ">
											<label> Email<small>Email của người dùng</small></label>
											<div>
												<input type="text"
													class="validate[required,custom[email]]  large"
													name="user_email" id="user_email">
											
											</div>
										</div>
										<div class="section">
											<label> Tài khoản đăng nhập <small>Thông tin tài khoản đăng
													nhập</small></label>
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
												<select class="large" name="user_group" id="user_group">
												<?php
												$listgroups = $db->getGroups ();
												if ($listgroups) {
													foreach ( $listgroups as $group ) {
														echo "<option value=" . $group ['id'] . ">" . $group ['name'] . "</option>";
													}
												}
												?>	
												</select>
											</div>
										</div>
										<div class="section">
											<label>Trạng thái người dùng </label>
											<div>
												<select class="large" name="user_status" id="user_status">
													<option value="1">Mới đăng ký</option>
													<option value="2">Kỳ cựu</option>
													<option value="0">Chưa kích hoạt</option>
												</select>
											</div>
										</div>
										<div class="section last">
											<div>
												<a class="uibutton" id="create_user">Tạo mới</a>
											</div>
										</div>
									</form>
									<script type="text/javascript">
									$(function(){
									    $(".Edit").click(function(){
										    var userid = $(this).attr('id');
// 									    	var username = $("#username").val();
// 											var password = $("#password").val();
// 											var user_email = $("#user_email").val();
// 											var display_name = $("#display_name").val();
// 											var user_group = $("#user_group").val();
// 											var user_status = $("#user_status").val();
									        var dataString = 'action=edituser&userid='+ userid;
											if(userid!= ""){
										        $.ajax({
										        	type: "POST",
										        	url: "ajax.php",
										        	data: dataString,
										        	cache: true,
										        	success: function(result){
										            	if(result){
										            		showSuccess(result);
												 		}else
												 			showError("Không lấy được thông tin người dùng");
										        	}  
										        	});
											}
										$(".on_load").attr("tabname","Sửa thông tin người dùng");
										$(".on_load").click();
									    });
									});
									$(function(){
									    $("#create_user").click(function(){
									    	var username = $("#username").val();
											var password = $("#password").val();
											var user_email = $("#user_email").val();
											var display_name = $("#display_name").val();
											var user_group = $("#user_group").val();
											var user_status = $("#user_status").val();
									        var dataString = 'action=newuser&username='+ username + '&password=' +password +'&user_email='
									        					+ user_email + '&display_name='+ display_name + '&user_group='+ user_group
									        					+'&user_status='+user_status;
											if(username!= ""){
										        $.ajax({
										        	type: "POST",
										        	url: "ajax.php",
										        	data: dataString,
										        	cache: true,
										        	success: function(result){
										            	if(result == 0){
										            		showSuccess("Data lại nặng thêm rồi :)",2000);
										            		setTimeout("$(\"#create_user_form\").submit()",2000);
// 										            		ResetForm();
										        		}else if(result == 1){
										        			showError("Có lỗi khi insert :v",2000);
											        	}else if(result == 2){
											        		showError("Email này có người dùng cmnr",2000);
												 		}else
												 			showError("Lỗi éo xác định",2000);
										        	}  
										        	});
											}
									    });
									});
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
