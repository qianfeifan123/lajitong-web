<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<!-- Meta, title, /ThinkPHP/Public/Admin/css, favicons, etc. -->
	<meta charset="utf-8">
	<title>后台管理系统</title>
	<meta name="keywords" content="Admin">
	<meta name="description" content="Admin">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Core css  -->
	<link rel="stylesheet" type="text/css" href="/ThinkPHP/Public/Admin/css/bootstrap.css">
	
	<!-- Theme css -->
	<link rel="stylesheet" type="text/css" href="/ThinkPHP/Public/Admin/css/theme.css">
	<link rel="stylesheet" type="text/css" href="/ThinkPHP/Public/Admin/css/pages.css">
	<link rel="stylesheet" type="text/css" href="/ThinkPHP/Public/Admin/css/plugins.css">
	<link rel="stylesheet" type="text/css" href="/ThinkPHP/Public/Admin/css/responsive.css">

	<!-- Boxed-Layout css -->
	<link rel="stylesheet" type="text/css" href="/ThinkPHP/Public/Admin/css/boxed.css">

	<!-- Demonstration css -->
	<link rel="stylesheet" type="text/css" href="/ThinkPHP/Public/Admin/css/demo.css">

	<!-- Your Custom css -->
	<link rel="stylesheet" type="text/css" href="/ThinkPHP/Public/Admin/css/custom.css">

</head>

<body class="login-page">

<!-- Start: Main -->
<div id="main">
  <div class="container">
    <div class="row">
      <div id="page-logo"><img src="/ThinkPHP/Public/Admin/images/logo.png"></div>
    </div>
    <div class="row">
      <div class="panel">
        <div class="panel-heading">
          <div class="panel-title">智能垃圾箱后台管理系统</div>
		</div>
        <form action="" class="cmxform" id="altForm" method="post">
          <div class="panel-body">
            <div class="form-group">
              <div class="input-group"><span class="input-group-addon">昵称</span>
                  <input type="text" name="username" value="" placeholder="请输入1到20字符" minlength="1" maxlength="20" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group"><span class="input-group-addon">手机</span>
                  <input type="text" name="phone" value="" placeholder="请输入1到20字符" maxlength="11" class="form-control">
              </div>
            </div>
            <div class="form-group">  
              <div class="input-group"><span class="input-group-addon">密码</span>
                  <input type="password" name="password" value=""  placeholder="密码长度为6到16位" minlength="1" maxlength="16" class="form-control">
              </div>
            </div>
            <div class="form-group">  
              <div class="input-group"><span class="input-group-addon">密码</span>
                  <input type="password" name="repassword" value="" placeholder="请再次输入密码" minlength="1" maxlength="16" class="form-control">
              </div>
            </div>
            <div class="form-group">  
              <div class="input-group"><span class="input-group-addon">性别</span>
                  男<input style="width: 20px;height: 20px;" type="radio" name="sex" value="1" class="" ><br/>
                  女<input style="width: 20px;height: 20px;" type="radio" name="sex" value="0" class="" >      
              </div>
            </div>  
            <!-- <div class="form-group">
                  <div class="input-group"><span class="input-group-addon">头像</span>
                     <input type="file" name="picture" value="" class="form-control">
                  </div>
            </div> -->
           <!--   <div class="form-group">
              <div class="input-group"> <span class="input-group-addon">验证码</span>
			   <img id="imgcode" title="点击换一张图片" src="<?php echo U('Login/code')?>" onclick="changeImage()"/>   
				<input class="form-control product" type="text" name="code" />
                
         
              </div>
            </div>          -->
			</div>
          <div class="panel-footer"> <span class="panel-title-sm pull-left" style="padding-top: 7px;"></span>
            <div class="form-group margin-bottom-none" style="padding-top: 10px;">
              <input class="btn btn-primary pull-right" name="register" type="submit" value="注 册" />
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End: Main --> 

<!-- Core Javascript - via CDN --> 
<script src="/ThinkPHP/Public/Admin/js/jquery.min.js"></script> 
<script src="/ThinkPHP/Public/Admin/js/jquery-ui.min.js"></script> 
<script src="/ThinkPHP/Public/Admin/js/bootstrap.min.js"></script> <!-- Theme Javascript --> 
<script type="text/javascript" src="/ThinkPHP/Public/Admin/js/uniform.min.js"></script> 
<script type="text/javascript" src="/ThinkPHP/Public/Admin/js/main.js"></script>
<script type="text/javascript" src="/ThinkPHP/Public/Admin/js/custom.js"></script> 
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