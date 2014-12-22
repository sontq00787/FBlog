<?php
require_once 'include/Config.php';
// require_once 'include/DBFunctions.php';
require_once 'include/Functions.php';
// $db = new DBFunctions();
$func = new Functions ();
$conn = mysql_connect ( DB_HOST, DB_USERNAME, DB_PASSWORD ) or die ( "Error connecting to database" );
mysql_select_db ( DB_NAME );
$tableName = "posts";
$targetpage = "blog.php";
$limit = 10;

$query = "SELECT COUNT(*) as num FROM $tableName";
$total_pages = mysql_fetch_array ( mysql_query ( $query ) );
$total_pages = $total_pages ['num'];
$total = $total_pages;
if ($total > 0) {
	$stages = 3;
	$page = 0;
	if (isset ( $_GET ['page'] )) {
		$page = mysql_escape_string ( $_GET ['page'] );
	}
	if ($page) {
		$start = ($page - 1) * $limit;
	} else {
		$start = 0;
	}
	
	// Get page data
	$query1 = "SELECT p.id, p.post_author, p.post_content, p.post_date, p.post_title, p.post_category, 
				u.user_name, c.name
				FROM posts p,users u, categories c WHERE p.post_author = u.id AND p.post_category = c.id 
				 ORDER BY post_date DESC LIMIT $start, $limit";
	$result = mysql_query ( $query1 );
	
	// Initial page num setup
	if ($page == 0) {
		$page = 1;
	}
	$prev = $page - 1;
	$next = $page + 1;
	$lastpage = ceil ( $total_pages / $limit );
	$LastPagem1 = $lastpage - 1;
	
	while ( $post = mysql_fetch_array ( $result ) ) {
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
} else {
	echo '<div class="blog"><div class="post_title">Chưa có bài viết nào</div></div>';
}

?>
<!-- blog post end -->
<?php
$paginate = '';
if ($lastpage > 1) {
	
	$paginate .= "<ul class=\"pagination clearfix\">";
	// Previous
	if ($page > 1) {
		$paginate .= "<li><a href='$targetpage?page=$prev'>previous</a></li>";
	} else {
		$paginate .= "<li><a class='disabled'>previous</a></li>";
	}
	
	// Pages
	if ($lastpage < 7 + ($stages * 2)) 	// Not enough pages to breaking it up
	{
		for($counter = 1; $counter <= $lastpage; $counter ++) {
			if ($counter == $page) {
				$paginate .= "<li><a class='current'>$counter</a></li>";
			} else {
				$paginate .= "<li><a href='$targetpage?page=$counter'>$counter</a></li>";
			}
		}
	} elseif ($lastpage > 5 + ($stages * 2)) 	// Enough pages to hide a few?
	{
		// Beginning only hide later pages
		if ($page < 1 + ($stages * 2)) {
			for($counter = 1; $counter < 4 + ($stages * 2); $counter ++) {
				if ($counter == $page) {
					$paginate .= "<li><a class='current'>$counter</a></li>";
				} else {
					$paginate .= "<li><a href='$targetpage?page=$counter'>$counter</a></li>";
				}
			}
			$paginate .= "...";
			$paginate .= "<li><a href='$targetpage?page=$LastPagem1'>$LastPagem1</a></li>";
			$paginate .= "<li><a href='$targetpage?page=$lastpage'>$lastpage</a></li>";
		} 		// Middle hide some front and some back
		elseif ($lastpage - ($stages * 2) > $page && $page > ($stages * 2)) {
			$paginate .= "<li><a href='$targetpage?page=1'>1</a></li>";
			$paginate .= "<li><a href='$targetpage?page=2'>2</a></li>";
			$paginate .= "...";
			for($counter = $page - $stages; $counter <= $page + $stages; $counter ++) {
				if ($counter == $page) {
					$paginate .= "<li><a class='current'>$counter</a></li>";
				} else {
					$paginate .= "<li><a href='$targetpage?page=$counter'>$counter</a></li>";
				}
			}
			$paginate .= "...";
			$paginate .= "<li><a href='$targetpage?page=$LastPagem1'>$LastPagem1</a></li>";
			$paginate .= "<li><a href='$targetpage?page=$lastpage'>$lastpage</a></li>";
		} 		// End only hide early pages
		else {
			$paginate .= "<li><a href='$targetpage?page=1'>1</a></li>";
			$paginate .= "<li><a href='$targetpage?page=2'>2</a></li>";
			$paginate .= "...";
			for($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter ++) {
				if ($counter == $page) {
					$paginate .= "<li><a class='current'>$counter</a></li>";
				} else {
					$paginate .= "<li><a href='$targetpage?page=$counter'>$counter</a></li>";
				}
			}
		}
	}
	
	// Next
	if ($page < $counter - 1) {
		$paginate .= "<li><a href='$targetpage?page=$next'>next</a></li>";
	} else {
		$paginate .= "<li><a class='disabled'>next</a></li>";
	}
	
	$paginate .= "</ul>";
}
echo $paginate;
?>

<!-- <ul class="pagination clearfix"> -->
<!-- 	<li><a href="#" class="current">1</a></li> -->
<!-- 	<li><a href="#">2</a></li> -->
<!-- 	<li><a href="#">3</a></li> -->
<!-- 	<li>...</li> -->
<!-- 	<li><a href="#">&raquo;</a></li> -->
<!-- </ul> -->
<!-- pagination end -->
