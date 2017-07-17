<?php
namespace Admin\Controller;
use Think\Controller;
class GuanyuController extends CommonController {
	/*public function _initialize(){
	//初始化方法，访问控制器就会先运行此方法
		if(!session('?admin')){
			$this->error("请登录!", U("Login/login"),1);
		}

	}*/
   public function class_list(){
   	   $db=M('admin_guanyu');
       $count = $db->count();
       $Page = new \Think\Page($count,5);
       $show = $Page->show();
       $list=$db->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
	   $this->assign('page',$show);
	   $this->assign("list",$list);//模板赋值；第一个参数是前台输出的变量名，第二个参数是要赋值的数据变量
	   if(IS_POST){
		   $idarr = implode(',',I('post.idarr'));
		   $shouye=M('admin_guanyu');
		   $row = $shouye->delete($idarr);
		   if($row){
				alert('删除成功',U('Guanyu/class_list'));
		   }else{
				alert('删除失败');
		   }
	   }
	   $this->display();
   }
   public function add(){
	   if(isset($_POST["dosubmit"])){
		   $username = I("post.username");
		   $password = I("post.password");
		if($_FILES['tupian']['error']==0){
		   $upload = new \Think\Upload();                                    // 实例化上传类   
				$upload->maxSize   =     3145728 ;                               // 设置附件上传大小  
				$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');    // 设置附件上传类型   
				$upload->rootPath  =     'Uploads/';                           // 设置附件上传目录
				$upload->savePath  = '';                                      // 设置附件上传（子）目录
				$info   =   $upload->uploadOne($_FILES['tupian']);             // 单文件上传方法引用
				if(!$info) {                                                // 判断上传错误提示错误信息 
					$this->error($upload->getError());    
				}else{                                                    // 上传成功 获取上传文件信息        
					$file=$info['savepath'].$info['savename'];   
		   }}else{
			   $file="";
		   }
		   $times=time();
		   $user = M("admin_guanyu");
		   $data['name']=$username;
		   $data['img']=$file;
		   $data['content']=$password;
		   $data['times']=$times;
		   $row = $user -> add($data);
		   if($row){
			   alert('插入成功',U('Guanyu/class_list'));
		   }else{
			   $this->error("插入失败！");
		   }
	   }
	$this->display();
   }
   
   public function del(){
	$id = I("get.id");
	$user=M("admin_guanyu");
	$sql = $user -> where("id=".$id)->delete();
	   if($sql){
		  alert('删除成功',U('Guanyu/class_list'));
	   }else{
		   $this->error("删除失败！");
	   }
   }
   public function edit(){
	$id = I("get.id");
	$user=M("admin_guanyu");
	$sql = $user -> where("id=".$id)->find();
	$this->assign("sql",$sql);
	if(isset($_POST['dosubmit'])){
	$name=I("post.title");
	$chang=I("post.chang");
	$content=I("post.password");
	if($_FILES['tupian']['error']==0){
	 $upload = new \Think\Upload();                                    // 实例化上传类   
				$upload->maxSize   =     3145728 ;                               // 设置附件上传大小  
				$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');    // 设置附件上传类型   
				$upload->rootPath  =     'Uploads/';                           // 设置附件上传目录
				$upload->savePath  = '';                                      // 设置附件上传（子）目录
				$info   =   $upload->uploadOne($_FILES['tupian']);             // 单文件上传方法引用
				if(!$info) {                                                // 判断上传错误提示错误信息 
					$this->error($upload->getError());    
				}else{                                                    // 上传成功 获取上传文件信息        
					$file=$info['savepath'].$info['savename'];   
	} }else{
		$file=$chang;
	}
	    $times=time();
		$data['name']=$name;
		$data['content']=$content;
		$data['img']=$file;
		$data['times']=$times;
		$sql = $user->where("id='$id'")->save($data);
		 if($sql){
		   alert('更改成功',U('Guanyu/class_list'));
	   }else{
		   $this->error("更改失败！");
	   }
		  }
	$this->display();
   }
}