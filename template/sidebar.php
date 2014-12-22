<div id="secondaryContent">
            	<div class="box">
                    <p class="custom_title">Danh Mục</p>
                    <ul class="nav nav300fix">
                    <?php 
                    	$list_categories = $db->listCategories();
                    	foreach ($list_categories as $cat){
	                    	echo "<li><a href=\"?cat=".$cat[0]."\">".$cat[1]."</a></li>";
                    	}
                    ?>
                    </ul>
                </div>
                <!-- category end -->
                <div class="box">
                    <p class="custom_title">Liên kết</p>
                    <ul class="nav nav300fix">
                        <li><a href="#">sontq.com</a></li>
                        <li><a href="#">appcoda.com</a></li>
                    </ul>
                </div>
                <!-- blogroll end -->
                <div class="box">
                    <h3>Gallery</h3>
                    <ul class="sideGallery">
                        <li><a href="#"><img src="styles/philosophy/images/side_garllery_01.jpg" alt="" class="imgBorder" /></a></li>
                        <li><a href="#"><img src="styles/philosophy/images/side_garllery_02.jpg" alt="" class="imgBorder" /></a></li>
                        <li class="clearMR"><a href="#"><img src="styles/philosophy/images/side_garllery_03.jpg" alt="" class="imgBorder" /></a></li>
                    </ul>
                    <ul class="sideGallery">
                        <li><a href="#"><img src="styles/philosophy/images/side_garllery_04.jpg" alt="" class="imgBorder" /></a></li>
                        <li><a href="#"><img src="styles/philosophy/images/side_garllery_05.jpg" alt="" class="imgBorder" /></a></li>
                        <li class="clearMR"><a href="#"><img src="styles/philosophy/images/side_garllery_06.jpg" alt="" class="imgBorder" /></a></li>
                    </ul>
                    <ul class="sideGallery">
                        <li><a href="#"><img src="styles/philosophy/images/side_garllery_07.jpg" alt="" class="imgBorder" /></a></li>
                        <li><a href="#"><img src="styles/philosophy/images/side_garllery_08.jpg" alt="" class="imgBorder" /></a></li>
                        <li class="clearMR"><a href="#"><img src="styles/philosophy/images/side_garllery_09.jpg" alt="" class="imgBorder" /></a></li>
                    </ul>
                </div>
                <!-- gallery end -->
            </div>