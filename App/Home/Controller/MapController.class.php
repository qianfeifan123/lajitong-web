<?php
namespace Home\Controller;
use Think\Controller;

class MapController extends Controller {

	public function index(){

	    $this->display();
	}

	public function maps(){
		$lid=$_POST['lid']?$_POST['lid']:1; //垃圾箱id
	    $lat=114.004513;  
	    $lng=22.571140;  //测试数据
	    $address = $_POST['address'];
	    $full = $_POST['full'];
	    $db=M("dustbin_map");
	    $data['lid']=$lid;
	    $data['lat']=$lat;
	    $data['lng']=$lng;
	    $data['point']=$lat.','.$lng;
	    $exist=$db->where('lid='.$lid)->find();

	    if(!$exist){
		    $res=$db->add($data);
		    if(!$res){
	           $this->error('接收失败！');
		    }
	    }
        $list=$db->select();
        // var_dump($list);die;
        $this->assign('markerList',json_encode($list));
	    $this->assign('lng', $lng);
	    $this->assign('lat', $lat);
	    $this->assign('address', $address);
	    $this->assign('full',$full);
		$this->display();
	}

	public function addressSelect()
{
    $lng = $_POST['lng'];
    $lat = $_POST['lat'];
    $address = $_POST['address'];

    $this->assign('lng', $lng);
    $this->assign('lat', $lat);
    $this->assign('address', $address);

    $list = get_near($lat, $lng);
    $this->assign('list', $list);

    $this->display();
}
}	