<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>

<?php require_once './template/head.php';?>

</head>
<body class="dashborad">
	<div id="alertMessage" class="error"></div>

	<?php include_once './template/header.php';?>
	<!--//  header -->
	<div id="shadowhead"></div>
	<div id="hide_panel">
		<a class="butAcc" rel="0" id="show_menu"></a> <a class="butAcc"
			rel="1" id="hide_menu"></a> <a class="butAcc" rel="0"
			id="show_menu_icon"></a> <a class="butAcc" rel="1"
			id="hide_menu_icon"></a>
	</div>

	<?php include_once './template/sidebar.php';?>
<script type="text/javascript">
$('#dashboard').addClass('select');
</script>

	<div id="content">
		<div class="inner">
			<?php include_once './template/topcol.php';?>
			<div class="clear"></div>

			<div class="onecolumn">
				<div class="header">
					<span><span class="ico gray home"></span> Site Data manager</span>
				</div>
				<div class="clear"></div>
				<div class="content">
					<div class="boxtitle min">website status</div>
					<div class="grid2">
						<table class="chart-pie" style="width: 100%;">
							<thead>
								<tr>
									<th></th>
									<th style="color: #aed741;">Product Review</th>
									<th style="color: #bedd17;">Webboard</th>
									<th style="color: #c3e171;">Article</th>
									<th style="color: #85b501;">Other</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th></th>
									<td>75</td>
									<td>10</td>
									<td>9</td>
									<td>6</td>
								</tr>
							</tbody>
						</table>
						<div class="chart-pie-shadow"></div>
						<div class="chart_title">
							<span>Pages is popular in your web</span>
						</div>
					</div>
					<div class="grid2">
						<div class="inner">
							<form action="#">
								<div class="section">
									<label> Website Name <small>Text custom</small></label>
									<div>
										<input type="text" name="sitename" id="sitename" class=" full"
											value="Yoursite.com" />
									</div>
								</div>
								<div class="section">
									<label> Website title <small>Text custom</small></label>
									<div>
										<input type="text" name="sitename" class=" full" />
									</div>
								</div>
								<div class="section">
									<label> Status <small>website status </small></label>
									<div>
										<input type="checkbox" id="online" name="online"
											class="online" value="1" checked="checked" />
									</div>
								</div>
								<div class="section">
									<label> SEO metaTag <small>Text custom</small></label>
									<div>
										<select class="chzn-select" multiple="multiple" tabindex="4">
											<option value=""></option>
											<option value="" selected="selected">webstie</option>
											<option value="" selected="selected">data manager</option>
											<option value="" selected="selected">shopping</option>
											<option value="" selected="selected">appication</option>
											<option value="">webdesign</option>
											<option value="">admin template</option>
											<option value="">icon</option>
											<option value="">your tag</option>
										</select>
									</div>
								</div>
								<div class="section last">
									<div>
										<a class="uibutton loading" title="Saving" rel="1"> save</a> <a
											class="uibutton  special">button</a> <a
											class="uibutton  confirm">button</a>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<!-- // End onecolumn -->

			<div class="onecolumn">
				<div class="header">
					<span><span class="ico gray stats_lines"></span>Site Statistics</span>
				</div>
				<div class="clear"></div>
				<div class="content">
					<br class="clear" />
					<div class="grid1 rightzero">
						<div class="shoutcutBox">
							<span class="ico color chat-exclamation"></span> <strong>23</strong>
							<em>pending orders</em>
						</div>
						<div class="breaks">
							<span></span>
						</div>
						<!-- // breaks -->
						<div class="shoutcutBox">
							<span class="ico color item"></span> <strong>1,538</strong> <em>
								Item in shop</em>
						</div>
						<div class="shoutcutBox">
							<span class="ico color group"></span> <strong>4,452</strong> <em>Total
								Member</em>
						</div>
						<div class="shoutcutBox">
							<span class="ico color emoticon_grin"></span> <strong>152</strong>
							<em>New Register </em>
						</div>
						<div class="breaks">
							<span></span>
						</div>
						<!-- // breaks -->
						<div class="shoutcutBox">
							<span class="ico color emoticon_in_love"></span> <strong>359</strong>
							<em>Today view pages</em>
						</div>
						<div class="shoutcutBox last">
							<span class="ico color connect"></span> <strong>152</strong> <em>user
								online </em>
						</div>
					</div>
					<div class="grid3">
						<div style="width: 100%; height: 415px; margin-left: 25px">
							<table class="chart" style="width: 100%;">
								<thead>
									<tr>
										<th width="10%"></th>
										<th width="25%" style="color: #bedd17;">Demo</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th>1</th>
										<td>700</td>
									</tr>
									<tr>
										<th>2</th>
										<td>500</td>
									</tr>
									<tr>
										<th>3</th>
										<td>650</td>
									</tr>
									<tr>
										<th>4</th>
										<td>400</td>
									</tr>
									<tr>
										<th>5</th>
										<td>650</td>
									</tr>
									<tr>
										<th>6</th>
										<td>750</td>
									</tr>
									<tr>
										<th>7</th>
										<td>550</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<!-- // End onecolumn -->

			<!--// two column window -->
			<div class="column_left">

				<div class="onecolumn">
					<div class="header">
						<span><span class="ico gray notepad"></span> Last Contact</span>
					</div>
					<br class="clear" />
					<div class="content tableName">
						<table class="display data_table">
							<thead>
								<tr>
									<th width="224"><div
											style="text-align: left; margin-left: 10px">Topic</div></th>
									<th width="195"><div style="text-align: right;">Date</div></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><div class="msg">
											<div class="msg_icon new"></div>
											<div class="msg_topic">
												<strong>SystemSite</strong> <span>Topic name</span>
											</div>
										</div></td>
									<td><div class="msg_date">
											a few seconds ago <span>2012/02/02 </span>
										</div></td>
								</tr>
								<tr>
									<td><div class="msg">
											<div class="msg_icon new"></div>
											<div class="msg_topic">
												<strong>Pinyo</strong> <span>Topic name</span>
											</div>
										</div></td>
									<td><div class="msg_date">
											55 seconds ago <span>2012/02/02 </span>
										</div></td>
								</tr>
								<tr>
									<td><div class="msg">
											<div class="msg_icon new"></div>
											<div class="msg_topic">
												<strong>John Doe</strong> <span>Topic name</span>
											</div>
										</div></td>
									<td><div class="msg_date">
											45 minute ago <span>2012/02/02 </span>
										</div></td>
								</tr>
								<tr>
									<td><div class="msg">
											<div class="msg_icon open"></div>
											<div class="msg_topic">
												John Doe <span>Topic name</span>
											</div>
										</div></td>
									<td><div class="msg_date">
											10 day ago <span>2012/02/02 </span>
										</div></td>
								</tr>
								<tr>
									<td><div class="msg">
											<div class="msg_icon open"></div>
											<div class="msg_topic">
												Sineeya <span>Topic name</span>
											</div>
										</div></td>
									<td><div class="msg_date">
											10 day ago <span>2012/02/02 </span>
										</div></td>
								</tr>
								<tr>
									<td><div class="msg">
											<div class="msg_icon ans"></div>
											<div class="msg_topic">
												Lanna <span>RE: Topic name</span>
											</div>
										</div></td>
									<td><div class="msg_date">
											19 day ago <span>2012/02/02 </span>
										</div></td>
								</tr>
								<tr>
									<td><div class="msg">
											<div class="msg_icon new"></div>
											<div class="msg_topic">
												<strong>Romace</strong> <span>Topic name</span>
											</div>
										</div></td>
									<td><div class="msg_date">
											25 day ago <span>2012/02/02 </span>
										</div></td>
								</tr>
								<tr>
									<td><div class="msg">
											<div class="msg_icon open"></div>
											<div class="msg_topic">
												Meny Chaiya <span>Topic name</span>
											</div>
										</div></td>
									<td><div class="msg_date">
											2 Months. <span>2012/01/02 </span>
										</div></td>
								</tr>

							</tbody>
						</table>
					</div>
				</div>

			</div>


			<div class="column_right">

				<div class="onecolumn">
					<div class="header">
						<span><span class="ico gray access_point"></span> New update</span>
					</div>
					<br class="clear" />
					<div class="content">
						<div id="news_update" style="position: relative;">
							<ul
								style="position: absolute; margin: 0pt; padding: 0pt; top: 0px; width: 100%;">
								<li>
									<div class="temp_news">
										<img src="exampic/25.jpg" alt="emptyimg" />
									</div>
									<div class="detail_news">
										<div class="boxtitle min">New update, topic 1</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
											Quisque non leo convallis nibh tristique commodo.</p>
										<span class="datepost">02/25/2012</span><span class="morelink"><a
											href="#" class="red">more</a></span>
									</div> <br class="clear" />
								</li>
								<li>
									<div class="temp_news">
										<img src="exampic/23.jpg" alt="emptyimg" />
									</div>
									<div class="detail_news">
										<div class="boxtitle min">New update , topic 2</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
											Quisque non leo convallis nibh tristique commodo.</p>
										<span class="datepost">02/25/2012</span><span class="morelink"><a
											href="#" class="red">more</a></span>
									</div> <br class="clear" />
								</li>
								<li>
									<div class="temp_news">
										<img src="exampic/26.jpg" alt="emptyimg" />
									</div>
									<div class="detail_news">
										<div class="boxtitle min">New update , topic 3</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
											Quisque non leo convallis nibh tristique commodo.</p>
										<span class="datepost">02/25/2012</span><span class="morelink"><a
											href="#" class="red">more</a></span>
									</div> <br class="clear" />
								</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="onecolumn">
					<div class="header">
						<span><span class="ico gray record"></span> Welcome to site</span>
					</div>
					<br class="clear" />
					<div class="content">
						<div class="boxtitle min">Welcome to site ,or your information
							data</div>
						<p class="overflow" style="height: 165px">Lorem ipsum dolor sit
							amet, consectetur adipiscing elit. Quisque non leo convallis nibh
							tristique commodo. Cras tincidunt hendrerit pharetra. Etiam erat
							magna, egestas sed placerat at, congue sed nisi. Nullam eget
							varius leo. Integer at justo a velit imperdiet pulvinar. Sed
							magna mi, sodales sit amet aliquet ac, eleifend eget sem. Nam
							ipsum lectus, fringilla sed rutrum ac, tempus in orci. Lorem
							ipsum dolor sit amet, consectetur adipiscing elit. Quisque non
							leo convallis nibh tristique commodo. Cras tincidunt hendrerit
							pharetra. Etiam erat magna, egestas sed placerat at, congue sed
							nisi. Nullam eget varius leo. Integer at justo a velit imperdiet
							pulvinar. Sed magna mi, sodales sit amet aliquet ac, eleifend
							eget sem. Nam ipsum lectus, fringilla sed rutrum ac, tempus in
							orci. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
							Quisque non leo convallis nibh tristique commodo. Cras tincidunt
							hendrerit pharetra. Etiam erat magna, egestas sed placerat at,
							congue sed nisi. Nullam eget varius leo. Integer at justo a velit
							imperdiet pulvinar. Sed magna mi, sodales sit amet aliquet ac,
							eleifend eget sem. Nam ipsum lectus, fringilla sed rutrum ac,
							tempus in orci.</p>
					</div>
				</div>

			</div>



			<div class="clear"></div>
			<?php include_once './template/footer.php';?>
		</div>
		<!--// End inner -->
	</div>
	<!--// End content -->
</body>
</html>