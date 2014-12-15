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
            <?php 
            	require_once 'include/DBFunctions.php';
            	require_once 'include/Functions.php';
            	$db = new DBFunctions();
            	$func = new Functions();
            	$listposts = $db -> getListPostBasicInfo();
            	if (count($listposts -> fetch_all())>0) {
            		foreach ( $listposts as $post ) {
            ?>
            	<div class="blog">
						<div class="post_title">
							<a href="post.php?post=<?php echo $post['id'];?>"><?php echo $post['post_title'];?></a>
						</div>
						<div class="attr clearfix">
							<p class="author">
								Viết bởi <a href="#"><?php echo $post['user_name'];?></a> ngày <?php echo $post['post_date']?>&nbsp; |
								&nbsp;
							</p>
							<p class="category">
								Đăng trong <a href="#"><?php echo $post['name'];?></a>
							</p>
							<p class="comment">
								<a href="#">0 bình luận</a>
							</p>
						</div>
						<p>
							<img src="styles/philosophy/images/blog/blog_01.jpg" alt=""
								class="imgBorder" />
						</p>
						<p><?php echo $func ->splitStr($post['post_content'],500);?></p>
						<div class="attr clearfix">
							<p class="tag">
								thẻ: <a href="#">sample1</a>, <a href="#">enim</a>, <a href="#">ipsam</a>,
								<a href="#">voluptatem</a>, <a href="#">quia</a>
							</p>
							<p class="continue">
								<a href="post.php?post=<?php echo $post['id'];?>">Đọc tiếp &raquo;</a>
							</p>
						</div>
					</div>
                <?php 
            		}
            	}else{
            		echo '<div class="blog"><div class="post_title">Chưa có bài viết nào</div></div>';
            	}
                ?>
                <!-- blog post end -->
					<ul class="pagination clearfix">
						<li><a href="#" class="current">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li>...</li>
						<li><a href="#">&raquo;</a></li>
					</ul>
					<!-- pagination end -->
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

<!----------------------------------------- Ripped by Alija [CST] www.codescriptz.org ----------------------------->
</html>
