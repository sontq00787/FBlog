<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<?php include_once 'template/head.php';?>
</head>
<body>
	<div id="wrapper">
    <?php include_once 'template/header.php';?>
    <!-- header background end -->
   <?php include_once 'template/blog_intro.php';?>
    <!-- intro background end -->
		<div id="mainBackground">
			<div id="main" class="clearfix">
				<div id="primaryContent">
					<div class="blog">
					<?php
					require_once 'include/DBFunctions.php';
					$db = new DBFunctions ();
					$postid = null;
					if (isset ( $_GET ['post'] )) {
						$postid = $_GET ['post'];
						$post = $db->getPostById ( $postid );
						if ($post != null) {
							?>
						<div class="post_title">
							<a href="#"><?php echo $post['post_title']?></a>
						</div>
						<div class="attr clearfix">
							<p class="author">
								Posted by <a href="#"><?php echo $post['user_name']?></a> on <?php echo $post['post_date']?>&nbsp; |
								&nbsp;
							</p>
							<p class="category">
								Posted in <a href="#"><?php echo $post['name']?></a>
							</p>
							<p class="comment">
								<a href="#">0 Comments</a>
							</p>
						</div>
						<!-- attribute end -->

						<p><?php echo $post['post_content']?></p>

						<div class="attr clearfix">
							<p class="tag">
								tags: <a href="#">Nemo</a>, <a href="#">enim</a>, <a href="#">ipsam</a>,
								<a href="#">voluptatem</a>, <a href="#">quia</a>
							</p>
						</div>
						<!-- attribute end -->
						<?php
						} else {
							echo "Không có nội dung.";
						}
					} else {
						echo "Không có gì ở đây :))";
					}
					?>
					</div>
					<!-- blog post end -->
					<!-- ?php include_once 'template/comment_box.php';?-->
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
