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
	    #测试接收数据 数组格式 
	    $db=M("dustbin_map");
	    $datas=array(
            0=>array(
                'phone'=>'13200000001',
                'lng'=>'120.369',
                'lat'=>'36.562',
                'full'=>1,
                'warning'=>0,
                'address'=>''
            	),
            1=>array(
                'phone'=>'15200000002',
                'lng'=>'119.369',
                'lat'=>'35.562',
                'full'=>0,
                'warning'=>0,
                'address'=>''
            	),
            2=>array(
                'phone'=>'18070146270',
                'lng'=>'114.109',
                'lat'=>'22.562',
                'full'=>1,
                'warning'=>0,
                'address'=>''
            	)
	    	);
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
	    // $address = $_POST['address'];
	    // $full = $_POST['full'];   
	    // $data['phone']=$phone;
	    // $data['lat']=$lat;
	    // $data['lng']=$lng;
	    // $data['point']=$lng.','.$lat;
	    // $exist=$db->where('phone='.$phone)->find();

        // $url="http://api.map.baidu.com/geocoder/v2/?callback=renderReverse&location=39.983424,116.322987&output=json&pois=1&ak=1rCFLG6jcn5lT6Ymyc9HzusvDeCVK0ME";
        // $address=file_get_contents($url);
        // var_dump($address);die; 
	    // if(!$exist){
		   //  $res=$db->add($data);
		   //  if(!$res){
	    //        $this->error('接收失败！');
		   //  }
	    // }
        $list=$db->select();
        // var_dump($list);die;
        $this->assign('markerList',json_encode($list));
		$this->display();
	}
}	