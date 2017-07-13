<?php
namespace Think\Controller;
class BaidumapController {
   public function get_distance($lat1, $lng1, $lat2, $lng2){    
		//deg2rad()函数将角度转换为弧度    
		$radLat1 = deg2rad($lat1);    
		$radLat2 = deg2rad($lat2);    
		$radLng1 = deg2rad($lng1);    
		$radLng2 = deg2rad($lng2);    
		$a = $radLat1-$radLat2;    
		$b = $radLng1-$radLng2;    
		$s = 2*asin(sqrt(pow(sin($a/2),2)+cos($radLat1)*cos($radLat2)*pow(sin($b/2),2)))*6378.137*1000;    
		return $s;
		}

   public function get_near($lat, $lng){    
		$url = 'http://api.map.baidu.com/place/v2/search?query=小区$公司&location='.$lat.','.$lng.'&radius=1000&output=json&ak=7NpVlxZOSqNn1CYT4hmvC8VP&page_size=15';    
		$res = file_get_contents($url);    
		$arr = ((array)json_decode($res, true));    
		$list = $arr['results'];    
		$distance_arr = array();    
		foreach ($list as $k=>$v) 
		{        
		$distance = get_distance($lat, $lng, $v['location']['lat'], $v['location']['lng']);        
		$list[$k]['distance'] = $distance;        
		$distance_arr[$k] = $distance;    
		}
		//根据距离由近及远降序
		array_multisort($distance_arr, SORT_ASC, $list);    
		return $list;
		}
}	
?>