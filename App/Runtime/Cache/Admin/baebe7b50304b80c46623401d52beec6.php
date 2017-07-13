<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
    <title>百度地图API显示多个标注点带提示的代码</title>  
    <!--css-->  
    <style type="text/css">  
        body { margin: 0; font-family: "Helvetica,Arial,FreeSans"; color: #000000; font-size: 12px; }  
        .demo_main { padding: 20px; padding-top: 10px; }  
        .demo_title { padding: 10px; margin-bottom: 10px; background-color: #D3D8E0; border: solid 1px gray; }  
        .demo_content { padding: 10px; margin-bottom: 10px; border: solid 1px gray; }  
        fieldset { border: 1px solid gray; }  
    </style>  
    <!--javascript-->  
    <script src="http://www.w3school.com.cn/jquery/jquery.js" type="text/javascript"></script>  
</head>  
<body>  
    <div class="demo_main">   
        <fieldset class="demo_content">  
            <div style="min-height: 300px; width: 100%;" id="map">  
            </div>  
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
                    map.centerAndZoom(point, 13);  
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
                    // var title = '<div style="font-weight:bold;color:#CE5521;font-size:14px">' + poi.title + '</div>';  
                    // //pop弹窗信息  
                    // var html = [];  
                    // html.push('<table cellspacing="0" style="table-layout:fixed;width:100%;font:12px arial,simsun,sans-serif"><tbody>');  
                    // html.push('<tr>');  
                    // html.push('<td style="vertical-align:top;line-height:16px;width:38px;white-space:nowrap;word-break:keep-all">地址:</td>');  
                    // html.push('<td style="vertical-align:top;line-height:16px">' + poi.address + ' </td>');  
                    // html.push('</tr>');  
                    // html.push('</tbody></table>');  
                    // var infoWindow = new BMap.InfoWindow(html.join(""), { title: title, width: 200 });  
  
                    // var openInfoWinFun = function () {  
                    //     marker.openInfoWindow(infoWindow);  
                    // };  
                    // marker.addEventListener("click", openInfoWinFun);  
                    // return openInfoWinFun;  
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
</body>  
</html>