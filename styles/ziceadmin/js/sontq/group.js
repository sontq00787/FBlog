function getGroup(groupid) {
	var dataString = 'action=getgroup&groupid=' + groupid;
	$("#create_group_div").hide();
	$("#selected_group").html(groupid);
	if (groupid != "") {
		$
				.ajax({
					type : "POST",
					url : "ajax.php",
					data : dataString,
					dataType : "json",
					cache : true,
					success : function(result) {
						if (result.name) {
							document.getElementById("group_name").value = result.name;
							document.getElementById("group_description").value = result.description;
							$(".on_load").attr("tabname",
									"Sửa thông tin nhóm người dùng");
							$(".on_load").click();
							$("#update_group_div").show();
						} else
							showError("Không lấy được thông tin nhóm người dùng");
					}
				});
	}
}

$("#update_group").live('click', function() {
	var groupid = $("#selected_group").html();
	var name = $("#group_name").val();
	var description = $("#group_description").val();
	var dataString = 'action=updategroup&name=' + name
			+ '&description=' + description + '&groupid='
			+ groupid ;
	if (groupid != "") {
		$.ajax({
			type : "POST",
			url : "ajax.php",
			data : dataString,
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

$(".DeleteAll").live('click',function() {			
	  var rel=$(this).attr('rel');	
	  var row=$(this).parents('.tab_content').attr('id');	
	  var row=row+' .load_page ';
	  if(!rel) { 
		  var rel=0;
		  var row=$('#load_data').attr('id');	 
	  }  
	  var dataSet=$('form:eq('+rel+')');					   
	  var	data=$('form:eq('+rel+')').serialize();
	  var name = 'những người đang chọn';
//	  ConfirmDelete(data,name,row,2,dataSet);
	  //chức năng chưa hỗ trợ.
	  showError("Chức năng này chưa hỗ trợ, chờ rảnh hứng lên mới code nhé :3.");
});
function ConfirmDelete(data, name, row, type, dataSet) {
	var loadpage = dataSet.hdata(0);
	var url = dataSet.hdata(1);
	var table = dataSet.hdata(2);
	var data = data + "&tabel=" + table;
	$
			.confirm({
				'title' : 'Thông báo xác nhận',
				'message' : " <strong>Thí chủ chắc chắn muốn xoá nhóm </strong><br /><font color=red>' "
						+ name + " ' </font> <strong>khỏi DB chứ?</strong>",
				'buttons' : {
					'Chắc luôn' : {
						'class' : 'special',
						'action' : function() {
							loading('Checking');
							$('#preloader').html('Đang xóa...');
							// do delete user
							var dataString = 'action=deletegroup&group' + data;
							$.ajax({
								type : "POST",
								url : "ajax.php",
								data : dataString,
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
										showError("Không xóa được");
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

// Create user
$(function() {
	$("#create_group")
			.click(
					function() {
						var group_name = $("#group_name").val();
						var description = $("#group_description").val();
						var dataString = 'action=newgroup&name=' + group_name
								+ '&description=' + description ;
						if (group_name != "") {
							$.ajax({
										type : "POST",
										url : "ajax.php",
										data : dataString,
										cache : true,
										success : function(result) {
											if (result == 1) {
												showSuccess(
														"Data lại nặng thêm rồi :)",
														2000);
												setTimeout(
														"$(\"#create_group_form\").submit()",
														2000);
												// ResetForm();
											} else
												showError("Lỗi éo xác định",2000);
										}
									});
						}
					});
});