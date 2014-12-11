<html>
<head>
	<meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate" />
	<meta http-equiv="pragma" content="no-cache" />
	<meta http-equiv="expires" content="0" />
	<meta name="description" content="" />
    <meta name="keywords" content="" />
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">

	<title>Category Management</title>
        
    <!-- <title>ziceinclude&trade; admin version 1.0 online</title> -->
    <!-- Link shortcut icon-->
    <link rel="shortcut icon" type="image/ico" href="images/favicon2.html" /> 
    <!-- Link css-->
    <link rel="stylesheet" type="text/css" href="css/zice.style.css"/>
    <link rel="stylesheet" type="text/css" href="css/icon.css"/>
    <link rel="stylesheet" type="text/css" href="css/ui-custom.css"/>
    <link rel="stylesheet" type="text/css" href="css/timepicker.css"  />
    <link rel="stylesheet" type="text/css" href="components/colorpicker/css/colorpicker.css"  />
    <link rel="stylesheet" type="text/css" href="components/elfinder/css/elfinder.css" />
    <link rel="stylesheet" type="text/css" href="components/datatables/dataTables.css"  />
    <link rel="stylesheet" type="text/css" href="components/validationEngine/validationEngine.jquery.css" />
     
    <link rel="stylesheet" type="text/css" href="components/jscrollpane/jscrollpane.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="components/fancybox/jquery.fancybox.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="components/tipsy/tipsy.css" media="all" />
    <link rel="stylesheet" type="text/css" href="components/editor/jquery.cleditor.css"  />
    <link rel="stylesheet" type="text/css" href="components/chosen/chosen.css" />
    <link rel="stylesheet" type="text/css" href="components/confirm/jquery.confirm.css" />
    <link rel="stylesheet" type="text/css" href="components/sourcerer/sourcerer.css"/>
    <link rel="stylesheet" type="text/css" href="components/fullcalendar/fullcalendar.css"/>
    <link rel="stylesheet" type="text/css" href="components/Jcrop/jquery.Jcrop.css"  />

    
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="components/flot/excanvas.min.js"></script><![endif]-->
    
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="components/ui/jquery.ui.min.js"></script> 
    <script type="text/javascript" src="components/ui/jquery.autotab.js"></script>
    <script type="text/javascript" src="components/ui/timepicker.js"></script>
    <script type="text/javascript" src="components/colorpicker/js/colorpicker.js"></script>
    <script type="text/javascript" src="components/checkboxes/iphone.check.js"></script>
    <script type="text/javascript" src="components/elfinder/js/elfinder.full.js"></script>
    <script type="text/javascript" src="components/datatables/dataTables.min.js"></script>
    <script type="text/javascript" src="components/datatables/ColVis.js"></script>
    <script type="text/javascript" src="components/scrolltop/scrolltopcontrol.js"></script>
    <script type="text/javascript" src="components/fancybox/jquery.fancybox.js"></script>
    <script type="text/javascript" src="components/jscrollpane/mousewheel.js"></script>
    <script type="text/javascript" src="components/jscrollpane/mwheelIntent.js"></script>
    <script type="text/javascript" src="components/jscrollpane/jscrollpane.min.js"></script>
    <script type="text/javascript" src="components/spinner/ui.spinner.js"></script>
    <script type="text/javascript" src="components/tipsy/jquery.tipsy.js"></script>
    <script type="text/javascript" src="components/editor/jquery.cleditor.js"></script>
    <script type="text/javascript" src="components/chosen/chosen.js"></script>
    <script type="text/javascript" src="components/confirm/jquery.confirm.js"></script>
    <script type="text/javascript" src="components/validationEngine/jquery.validationEngine.js" ></script>
    <script type="text/javascript" src="components/validationEngine/jquery.validationEngine-en.js" ></script>
    <script type="text/javascript" src="components/vticker/jquery.vticker-min.js"></script>
    <script type="text/javascript" src="components/sourcerer/sourcerer.js"></script>
    <script type="text/javascript" src="components/fullcalendar/fullcalendar.js"></script>
    <script type="text/javascript" src="components/flot/flot.js"></script>
    <script type="text/javascript" src="components/flot/flot.pie.min.js"></script>
    <script type="text/javascript" src="components/flot/flot.resize.min.js"></script>
    <script type="text/javascript" src="components/flot/graphtable.js"></script>

    <script type="text/javascript" src="components/uploadify/swfobject.js"></script>
    <script type="text/javascript" src="components/uploadify/uploadify.js"></script>        
    <script type="text/javascript" src="components/checkboxes/customInput.jquery.js"></script>
    <script type="text/javascript" src="components/effect/jquery-jrumble.js"></script>
    <script type="text/javascript" src="components/filestyle/jquery.filestyle.js" ></script>
    <script type="text/javascript" src="components/placeholder/jquery.placeholder.js" ></script>
	<script type="text/javascript" src="components/Jcrop/jquery.Jcrop.js" ></script>
    <script type="text/javascript" src="components/imgTransform/jquery.transform.js" ></script>
    <script type="text/javascript" src="components/webcam/webcam.js" ></script>
	<script type="text/javascript" src="components/rating_star/rating_star.js"></script>
	<script type="text/javascript" src="components/dualListBox/dualListBox.js"  ></script>
	<script type="text/javascript" src="components/smartWizard/jquery.smartWizard.min.js"></script>
    <script type="text/javascript" src="js/jquery.cookie.js"></script>
    <script type="text/javascript" src="js/zice.custom.js"></script>
</head>
<body class="dashborad">
	<?php
		// session_start();
		if(isset($_SESSION['message'])){
			echo '<div id="alertMessage" class="error">'.$_SESSION['message'].'</div> ';
			// echo $_SESSION['message'];
			unset($_SESSION['message']);
		}
	?>

                       
    <div id="header" >
        <div id="account_info"> 
            <img src="images/avatar.png" alt="Online" class="avatar" />
			<div class="setting" title="Profile Setting"><b>Welcome,</b> <b class="red">John Doe</b><img src="images/gear.png" class="gear"  alt="Profile Setting" ></div>
			<div class="logout" title="Disconnect"><b >Logout</b> <img src="images/connect.png" name="connect" class="disconnect" alt="disconnect" ></div> 
        </div>
    </div> <!--//  header -->
	
    <div id="shadowhead"></div>
    <div id="hide_panel"> 
      	<a class="butAcc" rel="0" id="show_menu"></a>
      	<a class="butAcc" rel="1" id="hide_menu"></a>
        <a class="butAcc" rel="0" id="show_menu_icon"></a>
        <a class="butAcc" rel="1" id="hide_menu_icon"></a>
    </div>           
      
    <div id="left_menu">
        <ul id="main_menu" class="main_menu">
          	<li class="limenu" ><a href="dashboard.html"><span class="ico gray shadow home" ></span><b>Dashboard</b></a></li>
          	<li class="limenu" ><a href="#" ><span class="ico gray shadow window"></span><b>Form elements</b></a>
            	<ul>
              		<li ><a href="form.html"> basic form </a></li>
              		<li ><a href="vform.html"> validation </a></li>
              		<li ><a href="wizard.html"> wizard </a></li>
            	</ul>
          	</li>
          	<li class="limenu" ><a href="#"><span class="ico gray  dimensions" ></span><b>Sample pages</b></a>
            	<ul>
              		<li ><a href="profile.html"> Profile setting </a></li>
              		<li ><a href="conversation.html"> conversation</a></li>
              		<li ><a href="imagesEditor.html"> Images Editor </a></li>
            	</ul>
          	</li>
          	<li class="limenu select" ><a href="#"><span class="ico gray shadow  spreadsheet"></span><b>Tables</b></a>
          		<ul>
              		<li ><a href="category.php"> Add new category </a></li>
              		<li ><a href="category_management.php"> Categories management</a></li>
            	</ul>
          	</li>
          	<li class="limenu" ><a href="gallery.html"><span class="ico gray shadow pictures_folder"></span><b>Gallery </b></a></li>
          	<li class="limenu" ><a href="#"><span class="ico gray shadow stats_lines"></span><b>Graph and Charts</b> </a>
            	<ul>
              		<li><a href="modalchartLive.html" class="pop_box">live chart </a></li>
              		<li><a href="chart.html">all chart</a></li>
            	</ul>
          	</li>
          	<li class="limenu" ><a href="filemanager.html"><span class="ico gray shadow  file"></span><b>File manager </b></a></li>
          	<li class="limenu" ><a href="calendar.html"><span class="ico gray shadow calendar"></span><b>Calendar </b></a></li>
          	<li class="limenu" ><a href="typography.html"><span class="ico gray  shadow paragraph_align_left"></span><b>Typography</b></a></li>
          	<li class="limenu" ><a href="inelement.html"><span class="ico gray shadow abacus"></span><b>Interface elements </b></a></li>
          	<li class="limenu" ><a href="map.html"><span class="ico gray shadow  location"></span><b>Map location </b></a></li>
          	<li class="limenu" ><a href="icon.html"><span class="ico gray  shadow satellite"></span><b>Icon and Button </b></a></li>
		  	<li class="limenu" ><a href="404.html"><span class="ico gray  shadow firewall"></span><b>Error Pages</b></a></li>
        </ul>
    </div>
    <div id="content">
      <div class="inner">
    	<div class="topcolumn">
			<div class="logo"></div>
        <ul  id="shortcut">
            <li> <a href="#" title="Back To home"> <img src="images/icon/shortcut/home.png" alt="home"/><strong>Home</strong> </a> </li>
            <li> <a href="#" title="Website Graph"> <img src="images/icon/shortcut/graph.png" alt="graph"/><strong>Graph</strong> </a> </li>
            <li> <a href="#" title="Setting" > <img src="images/icon/shortcut/setting.png" alt="setting" /><strong>Setting</strong></a> </li> 
            <li> <a href="#" title="Messages"> <img src="images/icon/shortcut/mail.png" alt="messages" /><strong>Message</strong></a><div class="notification" >10</div></li>
        </ul>
			</div>
      <div class="clear"></div>
  		<div class="onecolumn">
  				<form action="./controllers/insertCategory.php" method="post">
            <div class="section">
  					<?php
  						if (isset($_GET['action'])) {
  							echo '<input name="id" type="hidden" value="'.$_GET['id'].'" />';
  							echo '<div><span class="etip"><input id="menu2" class=" medium" type="text" name="category_name" placeholder="Category Name" value="'.$_GET['name'].'" required/></span></div><br/>';
  							echo '<div><span class="etip"><input id="menu2" class=" medium" type="text" name="description" placeholder="Description" value="'.$_GET['description'].'" required/></span></div><br/>';
  							echo '<div><span class="etip"><select id="menu2" class=" medium" name="parent_group" value="'.$_GET['parent_group'].'">';
  							echo "<option value=''>Select...</option>";
  							require_once './include/DBFunctions.php';
  							$db = new DBFunctions();
  							$data = $db->listCategories();
  							if($data != ""){
  								foreach ($data as $item) {
  									$parent_group = $_GET['parent_group'];
  									if($item[0] == $parent_group){
  										echo "<option value=".$item[0]." selected>".$item[1]."</option>";
  									} else {
  										echo "<option value=".$item[0].">".$item[1]."</option>";
  									}
  								}
  							}
  							echo '</select></span></div><br/>';
  							echo '<div><span class="etip"><input class="btn-submit" name="add" type="submit" value="Add" disabled/></span></div>';
  							echo '<div><span class="etip"><input class="btn-submit" name="edit" type="submit" value="Edit"/></span></div>';
  						} else {
  					?>
  						<div><span class="etip"><input id="menu2" class=" medium" type="text" original-title="Category name" name="category_name" placeholder="Category Name" required/></span></div><br/>
  						<div><span class="etip"><input id="menu2" class=" medium" type="text" original-title="Description" name="description" placeholder="Description" required/></span></div><br/>
  						<div><span class="etip"><select id="menu2" class=" medium" name="parent_group">
  							<?php
  								require_once './include/DBFunctions.php';
  								$db = new DBFunctions();
  								$data = $db->listCategories();
  								echo "<option value=''>Select...</option>";
  								if($data != ""){
  									foreach ($data as $item) {
  										echo "<option value=".$item[0].">".$item[1]."</option>";
  									}
  								}
  							?>
  						</select></span></div><br/>
              <div>
                <ul class="uibutton-group">
                  <li>
                    <span class="setip">
                      <input class="uibutton icon add normal" name="add" type="submit" original-title="Add" value="Add"/>
                    </span>
                  </li>
                  <li>
                    <span class="setip">
                      <input class="uibutton icon edit normal" name="edit" type="submit" value="Edit" original-title="Edit" disabled/>
                    </span>
                  </li>
                </ul>
              </div>
  					<?php
  						}
  					?>
          </div>
  				</form>
  			</div>
      </div>
      <video width="auto" controls>
        <source src="./video/The.Victorias.Secret.Fashion.Show.2014.HDTV.x264-BATV.mp4" type="video/mp4">
      </video>
	</div>
	
</body>
</html>