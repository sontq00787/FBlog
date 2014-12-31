<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<?php $title='Trang chủ';?>
<?php include_once 'template/head.php';?>
</head>
<body>
	<?php
	require_once 'include/DBFunctions.php';
	$db = new DBFunctions ();
	?>
	<div id="wrapper">
    <?php include_once 'template/header.php';?>
    <!-- header background end -->
   <?php include_once 'template/blog_intro.php';?>
    <!-- intro background end -->
		<div id="mainBackground">
			<div id="main" class="clearfix">
				<div id="primaryContent">
            <?php include_once 'template/blog_post_paging.php';?>
				</div>
				<!-- blog main content end -->
            <?php include_once 'template/sidebar.php';?>
            <!-- sidebar end -->
				<br class="clear" />
			</div>
			<!-- main end -->
		</div>
		<!-- main background end -->
    <?php include_once 'template/bottom.php';?>
    <!-- bottom background end -->
	</div>
	<!-- wrapper end -->
	<script type="text/javascript">Cufon.now();</script>
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function(){
			$("a[rel^='prettyPhoto']").prettyPhoto();
		});
	</script>
</body>
</html>
