function getPost(postid) {
	var dataString = 'action=getpost&postid=' + postid;
	$("#create_post_div").hide();
	$("#selected_post").val('' + postid);
	// $("#selected_post").html(postid);
	if (postid != "") {
		$
				.ajax({
					type : "POST",
					url : "ajax.php",
					data : dataString,
					dataType : "json",
					cache : true,
					success : function(result) {
						if (result) {
							document.getElementById("post_title").value = result.post_title;
							$("#editor").val(result.post_content);
							// $(".post_status").attr("checked",true);
							// alert($(":checkbox[name='post_status']:checked").val());
							// $(":checkbox[name='post_status'][value='closed']").attr('checked',
							// true);
							// document.getElementById("post_status").value =
							// result.post_status;
							document.getElementById("post_category").value = result.post_category;
							$(".on_load").attr("tabname", "Sửa bài viết");
							$(".on_load").click();
							$("#update_post_div").show();
						} else
							showError("Không lấy được bài viết");
					}
				});
	}
}
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

$(".DeleteAll").live('click', function() {
	var rel = $(this).attr('rel');
	var row = $(this).parents('.tab_content').attr('id');
	var row = row + ' .load_page ';
	if (!rel) {
		var rel = 0;
		var row = $('#load_data').attr('id');
	}
	var dataSet = $('form:eq(' + rel + ')');
	var data = $('form:eq(' + rel + ')').serialize();
	var name = 'những người đang chọn';
	// ConfirmDelete(data,name,row,2,dataSet);
	// chức năng chưa hỗ trợ.
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
				'message' : " <strong>Thí chủ chắc chắn muốn xoá bài viết </strong><br /><font color=red>' "
						+ name + " ' </font> <strong>khỏi DB chứ?</strong>",
				'buttons' : {
					'Chắc luôn' : {
						'class' : 'special',
						'action' : function() {
							loading('Checking');
							$('#preloader').html('Đang xóa...');
							// do delete user
							var dataString = 'action=deletepost&post' + data;
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

// Create post
$(function() {
	$("#create_post").click(
			function() {
				var post_title = $("#post_title").val();
				var post_content = $("#editor").val();
				var post_status = $('input[name="post_status"]:checked').val();
				var post_category = $("#post_category").val();
				var post_password = $("#post_password").val();
				var dataString = 'action=newpost&post_title=' + post_title
						+ '&post_content=' + post_content + '&post_status='
						+ post_status + '&post_category=' + post_category
						+ '&post_password=' + post_password;
				// alert(post_content);
				if (post_title != "") {
					$.ajax({
						type : "POST",
						url : "ajax.php",
						data : dataString,
						cache : true,
						success : function(result) {
							if (result == 1) {
								setTimeout("location.reload()", 2000);
								showSuccess("Data lại nặng thêm rồi :)", 2000);
							} else
								// showError("Lỗi éo xác định", 2000);
								showError(result);
						}
					});
				}
			});
});