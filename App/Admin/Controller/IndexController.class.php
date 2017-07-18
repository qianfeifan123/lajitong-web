<?php
namespace Admin\Controller;
use Think\Controller;

class IndexController extends Controller {
    public function _initialize(){
    //初始化方法，访问控制器就会先运行此方法
        if(!session('?username')){
            $this->error("请登录!", U("Login/login"),1);
        }

    }

	public function index(){
        $rec_data=file_get_contents($url);
        #解析接收到的数据包
        $rec=explode(',',$rec_data);
        $length=sizeof($rec);
        for($k=0;$k<$length;$k++){
            $rec1=explode('/',$rec[$k]);
                $datas[$k]['phone']=chr($rec1[1]); //十六进制ASCII码字符转换
                $datas[$k]['lat']=$rec1[2];
                $datas[$k]['lng']=$rec1[3];
                $datas[$k]['full']=substr($rec1[4],0,1);
                $datas[$k]['warning']=substr($rec1[4],1,1);
                // $addressUrl="http://api.map.baidu.com/geocoder/v2/?callback=renderReverse&location=".$datas[$k]['lat'].",".$datas[$k]['lng']."&output=json&pois=1&ak=1rCFLG6jcn5lT6Ymyc9HzusvDeCVK0ME"; //根据经纬度解析位置信息
                // $datas[$k]['address']=file_get_contents($addressUrl);
        }
          
	    $db=M("dustbin_map");
        #测试接收数据 数组格式
	    // $datas=array(
     //        0=>array(
     //            'phone'=>'13200000001',
     //            'lng'=>'120.369',
     //            'lat'=>'36.562',
     //            'full'=>1,
     //            'warning'=>0,
     //            'address'=>''
     //        	),
     //        1=>array(
     //            'phone'=>'15200000002',
     //            'lng'=>'119.369',
     //            'lat'=>'35.562',
     //            'full'=>0,
     //            'warning'=>0,
     //            'address'=>''
     //        	),
     //        2=>array(
     //            'phone'=>'18070146270',
     //            'lng'=>'114.109',
     //            'lat'=>'22.562',
     //            'full'=>1,
     //            'warning'=>0,
     //            'address'=>''
     //        	)
	    // 	);
	     for($i=0;$i<=count($datas);$i++){            
            $data['phone']= $datas[$i]['phone'];           
            $data['lat']= $datas[$i]['lat'];
            $data['lng']= $datas[$i]['lng'];
            $data['full']=$datas[$i]['full'];
            $data['warning']=$datas[$i]['warning'];
            $data['point']=$datas[$i]['lng'].','.$datas[$i]['lat'];
            $data['address']=$datas[$i]['address'];
            $exist=$db->where('phone='.$data['phone'])->find();
            if(!$exist){
            	$db->data($data)->add(); 
            }else{
            	$db->where('phone='.$data['phone'])->save($datas[$i]);
            }          
        }
        
        $list=$db->select();
        $this->assign('markerList',json_encode($list));
		$this->display();
	}
}	