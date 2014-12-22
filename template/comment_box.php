<div class="box">
	<div class="custom_title">1 bình luận</div>
	<div class="comments clearfix">
		<div class="clearfix">
			<img src="styles/philosophy/images/avatar.jpg" alt="" class="imgBorder imgLeft" />
			<p>
				<a href="#">SonTQ đã chém gió:</a><br /> ngày April 3, 2014
			</p>
		</div>
		<p>Đây là comment mẫu.</p>
		<p class="clearMB reply">
			<a href="#">Trả lời &raquo;</a>
		</p>
		<br class="clear" />
	</div>
	<!-- response end -->
</div>
<!-- all comments end -->
<div class="box">
	<div class="custom_title">Để lại bình luận</div>
	<?php 
		$comment_disabled = true;
		if($comment_disabled){
			echo "<p>Hệ thống bình luận đã khoá</p>";
		}else{
	?>
	<form action="#" method="post" id="commentForm">
		<fieldset class="commentFieldset">
			<ul>
				<li><label for="commentName">Name: (required)</label>
					<ul>
						<li></li>
					</ul> <input type="text" name="commentName" id="commentName"
					class="commentInput required" value="" /></li>
				<li><label for="email">Email: (required, will not be published)</label>
					<ul>
						<li></li>
					</ul> <input type="text" id="email" name="email"
					class="commentInput email required" value="" /></li>
				<li><label for="website">Website:</label>
					<ul>
						<li></li>
					</ul> <input type="text" name="website" id="website"
					class="commentInput" value="" /></li>
				<li><label for="comment">Comment:</label>
					<ul>
						<li></li>
					</ul> <textarea rows="8" cols="40" id="comment" name="comment"
						class="commentTextarea required"></textarea></li>
				<li class="clearMB"><input type="submit" value="Add Comment"
					name="submit" class="commentSubmit submit" /></li>
			</ul>
		</fieldset>
	</form>
	<?php 
		}
	?>
</div>
<!-- leave a reply end -->