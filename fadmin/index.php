<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
<title>FBlog&trade; admin  version 1.0 online</title>
        <!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
<link href="../styles/ziceadmin/css/zice.style.css" rel="stylesheet" type="text/css" />
<link href="../styles/ziceadmin/css/icon.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../styles/ziceadmin/components/tipsy/tipsy.css" media="all"/>
<style type="text/css">
html {
	background-image: none;
}
#versionBar {
	background-color:#212121;
	position:fixed;
	width:100%;
	height:35px;
	bottom:0;
	left:0;
	text-align:center;
	line-height:35px;
}
.copyright{
	text-align:center; font-size:10px; color:#CCC;
}
.copyright a{
	color:#A31F1A; text-decoration:none
}    
</style>
</head>
<body >
         
<div id="alertMessage" class="error"></div>
<div id="successLogin"></div>
<div class="text_success"><img src="../styles/ziceadmin/images/loadder/loader_green.gif"  alt="FBlog" /><span>Chờ tí nhé ^^</span></div>

<div id="login" >
  <div class="ribbon"></div>
  <div class="inner">
  <div  class="logo" ><img src="../styles/ziceadmin/images/logo/logo_login.png" alt="FAdmin" /></div>
  <div class="userbox"></div>
  <div class="formLogin">
   <form name="formLogin"  id="formLogin" action="#">
          <div class="tip">
          <input name="username" type="text"  id="username_id"  title="Tên đăng nhập hoặc email"   />
          </div>
          <div class="tip">
          <input name="password" type="password" id="password"   title="Mật khẩu"  />
          </div>
          <div style="padding:20px 0px 0px 0px ;">
            <div style="float:left; padding:0px 0px 2px 0px ;">
           <input type="checkbox" id="on_off" name="remember" class="on_off_checkbox"  value="1"   />
              <span class="f_help">Lưu thông tin</span>
              </div>
          <div style="float:right;padding:2px 0px ;">
              <div> 
                <ul class="uibutton-group">
                   <li><a class="uibutton normal" href="#"  id="but_login" >Đăng nhập</a></li>
				   <li><a class="uibutton  normal" href="#" id="forgetpass">Quên mật khẩu</a></li>
               </ul>
              </div>
            </div>
</div>

    </form>
  </div>
</div>
  <div class="clear"></div>
  <div class="shadow"></div>
</div>

<!--Login div-->
<div class="clear"></div>
<div id="versionBar" >
  <div class="copyright" > &copy; Copyright 2015  All Rights Reserved <span class="tip"><a  href="#" title="FBlog Admin" >SYS Viet Nam</a> </span> </div>
  <!-- // copyright-->
</div>
<!-- Link JScript-->
<script type="text/javascript" src="../styles/ziceadmin/js/jquery.min.js"></script>
<script type="text/javascript" src="../styles/ziceadmin/components/effect/jquery-jrumble.js"></script>
<script type="text/javascript" src="../styles/ziceadmin/components/ui/jquery.ui.min.js"></script>     
<script type="text/javascript" src="../styles/ziceadmin/components/tipsy/jquery.tipsy.js"></script>
<script type="text/javascript" src="../styles/ziceadmin/components/checkboxes/iphone.check.js"></script>
<script type="text/javascript" src="../styles/ziceadmin/js/login.js"></script>
</body>
</html>