<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {
	/*登录验证*/
	public function _initialize(){
	//初始化方法，访问控制器就会先运行此方法
		if(!session('?username')){
			$this->error("请登录!", U("Login/login"),1);
		}

	}
   
   public function pagelink($table,$w,$order,$show){
		$db=M($table); // 实例化表对象
		//如果有条件查询加上条件
		$count      = $db->where($w)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,$show);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$Page->setConfig('prev','上一页');
		$Page->setConfig('next','下一页');
		$show       = $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $db->where($w)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
		$data['show']=$show;//分页的页码
		$data['list']=$list;//全部数据
		return $data;
	}
   
}