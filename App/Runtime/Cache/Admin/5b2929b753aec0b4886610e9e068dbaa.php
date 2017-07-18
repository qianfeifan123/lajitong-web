<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <title>后台管理系统</title>
  <meta name="keywords" content="Admin">
  <meta name="description" content="Admin">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <script type="text/javascript" charset="utf-8" src="/Dustbin/Public/Admin/baidu/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Dustbin/Public/Admin/baidu/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/Dustbin/Public/Admin/baidu/lang/zh-cn/zh-cn.js"></script>
  <!-- Core CSS  -->
  <link rel="stylesheet" type="text/css" href="/Dustbin/Public/Admin/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="/Dustbin/Public/Admin/css/glyphicons.min.css">
  <!-- Theme CSS -->
  <link rel="stylesheet" type="text/css" href="/Dustbin/Public/Admin/css/theme.css">
  <link rel="stylesheet" type="text/css" href="/Dustbin/Public/Admin/css/pages.css">
  <link rel="stylesheet" type="text/css" href="/Dustbin/Public/Admin/css/plugins.css">
  <link rel="stylesheet" type="text/css" href="/Dustbin/Public/Admin/css/responsive.css">

  <!-- Boxed-Layout CSS -->
  <link rel="stylesheet" type="text/css" href="/Dustbin/Public/Admin/css/boxed.css">

  <!-- Demonstration CSS -->
  <link rel="stylesheet" type="text/css" href="/Dustbin/Public/Admin/css/demo.css">

  <!-- Your Custom CSS -->
  <link rel="stylesheet" type="text/css" href="/Dustbin/Public/Admin/css/custom.css">
  
  <!-- Core Javascript - via CDN --> 
  <script type="text/javascript" src="/Dustbin/Public/Admin/js/jquery.min.js"></script> 
  <script type="text/javascript" src="/Dustbin/Public/Admin/js/jquery-ui.min.js"></script> 
  <script type="text/javascript" src="/Dustbin/Public/Admin/js/bootstrap.min.js"></script> 
  <script type="text/javascript" src="/Dustbin/Public/Admin/js/uniform.min.js"></script> 
  <script type="text/javascript" src="/Dustbin/Public/Admin/js/main.js"></script>
  <script type="text/javascript" src="/Dustbin/Public/Admin/js/custom.js"></script> 
</head>

<body>
<!-- Start: Header -->
<header class="navbar navbar-fixed-top" style="background-image: none; background-color:#41494e;">
  <div class="pull-left"> <a class="navbar-brand" href="#">
    <div class="navbar-logo"><img src="/Dustbin/Public/Admin/images/logo.png" alt="logo" style="width:100%;"></div>
    </a> </div>
  <div class="pull-right header-btns">
    <a class="user" href="<?php echo U("User/detail");?>"><span class="glyphicons glyphicon-user"></span><?php echo $_SESSION['username'];?></a>
    <a href="<?php echo U("Login/logout");?>" class="btn btn-default btn-gradient"style="background:#14abd8;color:#f9f9f9;" type="button">退出</a>
  </div>
</header>
<!-- End: Header -->

<!-- Start: Main -->
<div id="main"> 
    <!-- Start: Sidebar -->
  <aside id="sidebar" class="affix">
    <div id="sidebar-search">
    		<div class="sidebar-toggle"><div style="width:100%;margin:auto;"><img width="80%"src="/Dustbin/Public/Admin/images/icon_06.png"></div></div>
    </div>
    <div id="sidebar-menu">
      <ul class="nav sidebar-nav">
        <li> 
          <a  class="back" href="<?php echo U("Index/index"); ?>"><span class="glyphicons"><div style="width:50%;margin:auto;"><img width="100%"src="/Dustbin/Public/Admin/images/icon_03.png" style="margin-top:15px;"></div></span><span class="sidebar-title">首&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页</span></a>
        </li>
		    <li>
          <a class="back" href="<?php echo U("User/index"); ?>"><span class="glyphicons"><div style="width:50%;margin:auto;"><img width="100%"src="/Dustbin/Public/Admin/images/icon_10.png" style="margin-top:15px;"></div></span><span class="sidebar-title">用户列表</span></a>
        </li>
		    <li>
          <a class="back" href="<?php echo U("Dustbin/index"); ?>"><span class="glyphicons"><div style="width:50%;margin:auto;"><img width="100%"src="/Dustbin/Public/Admin/images/icon_10.png" style="margin-top:15px;"></div></span><span class="sidebar-title">设备列表</span></a>
        </li>
        <li>
          <a class="back" href="<?php echo U("Guanyu/class_list"); ?>"><span class="glyphicons"><div style="width:50%;margin:auto;"><img width="100%"src="/Dustbin/Public/Admin/images/icon_20.png" style="margin-top:15px;"></div></span><span class="sidebar-title">关于我们</span></a>
        </li>
        <li>
          <a class="back" href="<?php echo U("Suggestion/index"); ?>"><span class="glyphicons"><div style="width:50%;margin:auto;"><img width="100%"src="/Dustbin/Public/Admin/images/icon_10.png" style="margin-top:15px;"></div></span><span class="sidebar-title">意见反馈</span></a>
        </li>

		<script>
		    $('.back').hover(function(){
			  $(this).css("background","#1ed9f5");
			},function(){
			  $(this).css("background","#42485b");
			});
		</script>
      </ul>
    </div>
  </aside>
  <!-- End: Sidebar -->  
  <!-- End: Sidebar -->  
    <!-- Start: Content -->
    <section id="content">
        <div id="topbar" class="affix" style="margin-top: 20px;">
            <ol class="breadcrumb">
                <li><a href="<?php echo U("User/index");?>"><span class="glyphicon glyphicon-home"></span></a></li>
                <li class="active">修改密码</li>
            </ol>
        </div>
        <div class="container">

            <div class="row" style="margin-top: 20px;">
                <div class="col-md-10 col-lg-8 center-column">
                    <form action="#" method="post" class="cmxform" enctype="multipart/form-data">
                        <div class="panel">
                            <div class="panel-heading">
                                <div class="panel-title">编辑</div>
                                <div class="panel-btns pull-right margin-left">
                                    <a href="<?php echo U("User/index");?>"
                                       class="btn btn-default btn-gradient dropdown-toggle"><span
                                            class="glyphicon glyphicon-chevron-left"></span></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-7">
                                    <div class="form-group">
										<div class="input-group"><span class="input-group-addon">当前密码</span>
                                            <input type="password" name="password" value=""
                                                  placeholder="请输入当前密码" class="form-control">
                                        </div>
                                        <div class="input-group"><span class="input-group-addon">新密码&nbsp;&nbsp;&nbsp;</span>
                                            <input type="password" name="newpassword" value="" placeholder="请输入新密码" 
                                                   class="form-control">
                                        </div>
                                        <div class="input-group"><span class="input-group-addon">确认密码</span>
                                            <input type="password" name="repassword" value=""
                                                   class="form-control" placeholder="请再次输入密码" onblur="return checkPwd()">
                                        </div>
                                    </div>
                                    </div>                                
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="submit" value="提交" class="submit btn btn-blue" name="dosubmit">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </section>
    <!-- End: Content -->
</div>
<!-- End: Main -->

<script type="text/javascript">
   function checkPwd(){
    var newpassword=$('input[name=newpassword]').val();
    var repassword=$('input[name=repassword]').val();
    if(newpassword!=repassword){
        alert('两次密码输入不一致!');return false;
    }
   }
</script>
</body>

</html>