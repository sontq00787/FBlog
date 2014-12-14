function getUser(userid) {
	var dataString = 'action=getuser&userid=' + userid;
	$("#create_user_div").hide();
	$("#selected_user").html(userid);
	if (userid != "") {
		$
				.ajax({
					type : "POST",
					url : "ajax.php",
					data : dataString,
					dataType : "json",
					cache : true,
					success : function(result) {
						if (result.user_name) {
							document.getElementById("username").value = result.user_name;
							// document.getElementById("password").value =
							// result.user_name;
							document.getElementById("user_email").value = result.user_email;
							document.getElementById("display_name").value = result.display_name;
							document.getElementById("user_group").value = result.user_group;
							document.getElementById("user_status").value = result.user_status;
							$(".on_load").attr("tabname",
									"Sửa thông tin người dùng");
							$(".on_load").click();
							$("#update_user_div").show();
						} else
							showError("Không lấy được thông tin người dùng");
					}
				});
	}
}

$("#update_user").live('click', function() {
	var userid = $("#selected_user").html();
	var dataString = "action=updateuser&userid="+userid;
	if (userid != "") {
		$.ajax({
			type : "POST",
			url : "ajax.php",
			data : dataString,
			dataType : "json",
			cache : true,
			success : function(result) {
				if (result == 1) {
					showSuccess("Cập nhật thành công");
				} else
					showError("Cập nhật không thành công.");
			}
		});
	}
});

// Confirm user delete
$(function() {
	$(".Delete").live('click', function() {
		var row = $(this).parents('tr');
		var dataSet = $(this).parents('form');
		var id = $(this).attr("id");
		var name = $(this).attr("name");
		var data = 'id=' + id;
		ConfirmDelete(data, name, row, 0, dataSet);
	});
});

function ConfirmDelete(data, name, row, type, dataSet) {
	var loadpage = dataSet.hdata(0);
	var url = dataSet.hdata(1);
	var table = dataSet.hdata(2);
	var data = data + "&tabel=" + table;
	$
			.confirm({
				'title' : 'Thông báo xác nhận',
				'message' : " <strong>Thí chủ chắc chắn muốn tống </strong><br /><font color=red>' "
						+ name + " ' </font> <strong>khỏi DB chứ?</strong>",
				'buttons' : {
					'Chắc luôn' : {
						'class' : 'special',
						'action' : function() {
							loading('Checking');
							$('#preloader').html('Đang xóa...');
							// do delete user
							var dataString = 'action=deleteuser&user' + data;
							$.ajax({
								type : "POST",
								url : "ajax.php",
								data : dataString,
								dataType : "json",
								cache : true,
								success : function(result) {
									if (result == 1) {
										if (type == 0) {
											row.slideUp(function() {
												showSuccess('Xóa xong', 5000);
												unloading();
											});
											return false;
										}
										if (type == 1) {
											row.slideUp(function() {
												showSuccess('Xóa xong', 5000);
												unloading();
											});
											return false;
										}
										setTimeout("unloading();", 900);
									} else
										showError("Không xóa được người dùng");
								}
							});

						}
					},
					'Để mai tính' : {
						'class' : ''
					}
				}
			});
}
// $(function(){
// $(".Edit").click(function(){

// var userid = $(this).attr('id');
// var dataString = 'action=getuser&userid='+ userid;
// if(userid!= ""){
// $.ajax({
// type: "POST",
// url: "ajax.php",
// data: dataString,
// dataType: "json",
// cache: true,
// success: function(result){
// if(result.user_name){
// document.getElementById("username").value = result.user_name;
// // document.getElementById("password").value = result.user_name;
// document.getElementById("user_email").value = result.user_email;
// document.getElementById("display_name").value = result.display_name;
// document.getElementById("user_group").value = result.user_group;
// document.getElementById("user_status").value = result.user_status;
// $(".on_load").attr("tabname","Sửa thông tin người dùng");
// $(".on_load").click();
// }else
// showError("Không lấy được thông tin người dùng");
// }
// });
// }

// });
// });

// Create user
$(function() {
	$("#create_user")
			.click(
					function() {
						var username = $("#username").val();
						var password = $("#password").val();
						var user_email = $("#user_email").val();
						var display_name = $("#display_name").val();
						var user_group = $("#user_group").val();
						var user_status = $("#user_status").val();
						var dataString = 'action=newuser&username=' + username
								+ '&password=' + password + '&user_email='
								+ user_email + '&display_name=' + display_name
								+ '&user_group=' + user_group + '&user_status='
								+ user_status;
						if (username != "") {
							$
									.ajax({
										type : "POST",
										url : "ajax.php",
										data : dataString,
										cache : true,
										success : function(result) {
											if (result == 0) {
												showSuccess(
														"Data lại nặng thêm rồi :)",
														2000);
												setTimeout(
														"$(\"#create_user_form\").submit()",
														2000);
												// ResetForm();
											} else if (result == 1) {
												showError(
														"Có lỗi khi insert :v",
														2000);
											} else if (result == 2) {
												showError(
														"Email này có người dùng cmnr",
														2000);
											} else
												showError("Lỗi éo xác định",
														2000);
										}
									});
						}
					});
});