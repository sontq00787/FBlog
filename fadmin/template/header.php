<?php
//chuyển về trang login nếu chưa đăng nhập.
if (! isset ( $_SESSION ['username'] )) {
	echo ("<script>location.href = 'index.php';</script>");
}
?>
<div id="header">
	<div id="account_info">
		<img src="../styles/ziceadmin/images/avatar.png" alt="Online"
			class="avatar" />
		<div class="setting" title="Profile Setting">
			<b>Xin chào,</b> <b class="red"><?php echo isset($_SESSION['username'])?$_SESSION['username']:"Guest" ?></b><img
				src="../styles/ziceadmin/images/gear.png" class="gear"
				alt="Profile Setting">
		</div>
		<div class="logout" title="Disconnect">
			<b>Đăng xuất</b> <img src="../styles/ziceadmin/images/connect.png"
				name="connect" class="disconnect" alt="disconnect">
		</div>
	</div>
</div>