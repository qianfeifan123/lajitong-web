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
    <a class="user"><span class="glyphicons glyphicon-user"></span><?php echo $_SESSION['username'];?></a>
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
  <div class="demo_main">   
        <fieldset class="demo_content">  
            <div style="min-height: 580px; width: 86%;margin-left:14%;" id="map">  
            </div> 
            <!-- <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=p5YA3BZOACQlIY7Nv21LF4BPQUFlzf5k"></script> --> 
            <script type="text/javascript">  
                var markerArr=<?php echo ($markerList); ?>;
                // var markerArr=JSON.stringify(markerList);
                // console.log(markerArr); 
                var map; //Map实例  
                function map_init() {  
                    map = new BMap.Map("map");  
                    //第1步：设置地图中心点，深圳市  
                    var point = new BMap.Point(113.904513, 22.571140);  
                    //第2步：初始化地图,设置中心点坐标和地图级别。  
                    map.centerAndZoom(point, 14);
                    var geoc = new BMap.Geocoder();
                    map.addEventListener("click", function(e){        
                      var pt = e.point;
                      geoc.getLocation(pt, function(rs){
                         var addComp = rs.addressComponents;
                         var address = addComp.province + ", " + addComp.city + ", " + addComp.district + ", " + addComp.street + ", " + addComp.streetNumber;
                         alert(address);
                      });        
                   });  
                    //第3步：启用滚轮放大缩小  
                    map.enableScrollWheelZoom(true);  
                    //第4步：向地图中添加缩放控件  
                    var ctrlNav = new window.BMap.NavigationControl({  
                        anchor: BMAP_ANCHOR_TOP_LEFT,  
                        type: BMAP_NAVIGATION_CONTROL_LARGE  
                    });  
                    map.addControl(ctrlNav);  
                    //第5步：向地图中添加缩略图控件  
                    var ctrlOve = new window.BMap.OverviewMapControl({  
                        anchor: BMAP_ANCHOR_BOTTOM_RIGHT,  
                        isOpen: 1  
                    });  
                    map.addControl(ctrlOve);  
  
                    //第6步：向地图中添加比例尺控件  
                    var ctrlSca = new window.BMap.ScaleControl({  
                        anchor: BMAP_ANCHOR_BOTTOM_LEFT  
                    });  
                    map.addControl(ctrlSca);  
  
                    //第7步：绘制点    
                    for (var i = 0; i < markerArr.length; i++) {  
                        var p0 = markerArr[i].point.split(",")[0];  
                        var p1 = markerArr[i].point.split(",")[1];  
                        var maker = addMarker(new window.BMap.Point(p0, p1), i);  
                        addInfoWindow(maker, markerArr[i], i);   
                    }  
                }  
  
                // 添加标注  
                function addMarker(point, index) {  
                    var myIcon = new BMap.Icon("http://api.map.baidu.com/img/markers.png",  
                        new BMap.Size(23, 25), {  
                            offset: new BMap.Size(10, 25),  
                            imageOffset: new BMap.Size(0, 0 - index * 25)  
                        });  
                    var marker = new BMap.Marker(point, { icon: myIcon });  
                    map.addOverlay(marker);  
                    return marker;  
                }  
  
                // 添加信息窗口  
                function addInfoWindow(marker, poi) {  
                    //pop弹窗标题   
                    //pop弹窗信息  
                    var html = [];  
                    html.push('<table cellspacing="0" style="table-layout:fixed;width:100%;font:12px arial,simsun,sans-serif"><tbody>');  
                    html.push('<tr>');  
                    html.push('<td style="vertical-align:top;line-height:16px;width:38px;white-space:nowrap;word-break:keep-all">地址:</td>');  
                    html.push('<td style="vertical-align:top;line-height:16px">' + poi.address + ' </td>');  
                    html.push('</tr>');  
                    html.push('</tbody></table>');  
                    var infoWindow = new BMap.InfoWindow(html.join(""), {width: 200 });  
  
                    var openInfoWinFun = function () {  
                        marker.openInfoWindow(infoWindow);  
                    };  
                    marker.addEventListener("click", openInfoWinFun);  
                    return openInfoWinFun;  
                }  
  
                //异步调用百度js  
                function map_load() {  
                    var load = document.createElement("script");  
                    load.src = "http://api.map.baidu.com/api?v=1.4&callback=map_init";  
                    document.body.appendChild(load);  
                }  
                window.onload = map_load;  
            </script>  
        </fieldset>  
    </div>
  <!-- End: Content --> 
</div>
<!-- End: Main --> 
</body>
</html>