<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<!-- Meta, title, /Dustbin/Public/Admin/css, favicons, etc. -->
	<meta charset="utf-8">
	<title>后台管理系统</title>
	<meta name="keywords" content="Admin">
	<meta name="description" content="Admin">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Core css  -->
	<link rel="stylesheet" type="text/css" href="/Dustbin/Public/Admin/css/bootstrap.css">
	
	<!-- Theme css -->
	<link rel="stylesheet" type="text/css" href="/Dustbin/Public/Admin/css/theme.css">
	<link rel="stylesheet" type="text/css" href="/Dustbin/Public/Admin/css/pages.css">
	<link rel="stylesheet" type="text/css" href="/Dustbin/Public/Admin/css/plugins.css">
	<link rel="stylesheet" type="text/css" href="/Dustbin/Public/Admin/css/responsive.css">

	<!-- Boxed-Layout css -->
	<link rel="stylesheet" type="text/css" href="/Dustbin/Public/Admin/css/boxed.css">

	<!-- Demonstration css -->
	<link rel="stylesheet" type="text/css" href="/Dustbin/Public/Admin/css/demo.css">

	<!-- Your Custom css -->
	<link rel="stylesheet" type="text/css" href="/Dustbin/Public/Admin/css/custom.css">

</head>

<body class="login-page">

<!-- Start: Main -->
<div id="main">
  <div class="container">
    <div class="row">
      <div id="page-logo"><img src="/Dustbin/Public/Admin/images/logo.png"></div>
    </div>
    <div class="row">
      <div class="panel">
        <div class="panel-heading">
          <div class="panel-title">智能垃圾箱后台管理系统</div>
		</div>
        <form action="" class="cmxform" id="altForm" method="post">
          <div class="panel-body">
            <div class="form-group">
              <div class="input-group"> <span class="input-group-addon">用户名</span>
                <input type="text" name="username" class="form-control phone" maxlength="10" autocomplete="off" placeholder="">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group"> <span class="input-group-addon">密&nbsp;&nbsp;&nbsp;码</span>
                <input type="password" name="password" class="form-control product" maxlength="10" autocomplete="off" placeholder="">
              </div>
            </div>
           <!--   <div class="form-group">
              <div class="input-group"> <span class="input-group-addon">验证码</span>
			   <img id="imgcode" title="点击换一张图片" src="<?php echo U('Login/code')?>" onclick="changeImage()"/>   
				<input class="form-control product" type="text" name="code" />
                
         
              </div>
            </div>          -->
			</div>
          <div class="panel-footer"> <span class="panel-title-sm pull-left" style="padding-top: 7px;"></span>
            <div class="form-group margin-bottom-none">
              <input class="btn btn-primary pull-right" name="dosubmit" type="submit" value="登 录" /> 
              <div class="clearfix"></div>
            </div>
            <div class="form-group margin-bottom-none" style="padding-top: 10px;">
              <a href="<?php echo U("Login/register");?>" class="pull-right"/>没有账号？去注册</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End: Main --> 

<!-- Core Javascript - via CDN --> 
<script src="/Dustbin/Public/Admin/js/jquery.min.js"></script> 
<script src="/Dustbin/Public/Admin/js/jquery-ui.min.js"></script> 
<script src="/Dustbin/Public/Admin/js/bootstrap.min.js"></script> <!-- Theme Javascript --> 
<script type="text/javascript" src="/Dustbin/Public/Admin/js/uniform.min.js"></script> 
<script type="text/javascript" src="/Dustbin/Public/Admin/js/main.js"></script>
<script type="text/javascript" src="/Dustbin/Public/Admin/js/custom.js"></script> 
<script type="text/javascript">

jQuery(document).ready(function() {

	// Init Theme Core 	  
	Core.init();   
	
});
//重新获取验证字符
function changeImage()
{
//单击触发图片重载事件，完成图片验证码的更换
document.getElementById("imgcode").src = document.getElementById("imgcode").src + '?';
}
</script>
</body>

</html>