<div id="header">
	<div id="account_info">
		<img src="../styles/ziceadmin/images/avatar.png" alt="Online" class="avatar" />
		<div class="setting" title="Profile Setting">
			<b>Welcome,</b> <b class="red"><?php echo isset($_SESSION['username'])?$_SESSION['username']:"Guest" ?></b><img src="../styles/ziceadmin/images/gear.png"
				class="gear" alt="Profile Setting">
		</div>
		<div class="logout" title="Disconnect">
			<b>Logout</b> <img src="../styles/ziceadmin/images/connect.png" name="connect"
				class="disconnect" alt="disconnect">
		</div>
	</div>
</div>