<?php
namespace Admin\Controller;
use Think\Controller;

class UserController extends Controller {
   public function index(){
      $db=M('admin');
      $user=$db->where('status=1')->order('id desc')->select();
      $page=getpage($db,'status=1',10);
      // var_dump($user);die;
      $this->page=$page->show;
      $this->assign('list',$user);
      $this->display();
   }

   public function edit(){
   	  $id=I('get.id');
      $db=M('admin');
      $user = $db -> where("id=".$id)->find();
      $this->assign('user',$user);
      if(isset($_POST['dosubmit'])){
      	  $data['username']=I('post.username');
	      $data['password']=I('post.password');
	      $data['sex']=I('post.sex');
	      $picture=I('post.picture');
	      if($_FILES['picture']['error']==0){
		    $upload = new \Think\Upload();                                    // 实例化上传类   
			$upload->maxSize   =     3145728 ;                               // 设置附件上传大小  
		    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');    // 设置附件上传类型   
			$upload->rootPath  =     'Uploads/';                           // 设置附件上传目录
			$upload->savePath  = '';                                      // 设置附件上传（子）目录
			$info   =   $upload->uploadOne($_FILES['picture']);             // 单文件上传方法引用
			if(!$info) {                                                // 判断上传错误提示错误信息 
				$this->error($upload->getError());    
			}else{                                                    // 上传成功 获取上传文件信息        
			   $file=$info['savepath'].$info['savename'];   
		    } 
        }else{
            $file=$picture;
        }
          $data['picture']=$file;
	      $sql=$db->where("id=".$id)->save($data);
	      if($sql){
	      	  alert('修改成功',U('User/index'));
		   }else{
			   $this->error("修改失败！");
		   }
      }
      
	  $this->display(); 
   }

   public function del(){
      $id=I('get.id');
      $db=M('admin');
      $data['status']=0;
      $sql=$db->where("id='$id'")->save($data); //软删除
      if($sql){
      	  alert('删除成功',U('User/index'));
	   }else{
		   $this->error("删除失败！");
	   }
   }

   public function add(){
   	if(isset($_POST["dosubmit"])){
		   $username = I("post.username");
		   $password = I("post.password");
		   $sex=I('post.sex');
		if($_FILES['picture']['error']==0){
		   $upload = new \Think\Upload();                                    // 实例化上传类   
				$upload->maxSize   =     3145728 ;                               // 设置附件上传大小  
				$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');    // 设置附件上传类型   
				$upload->rootPath  =     'Uploads/';                           // 设置附件上传目录
				$upload->savePath  = '';                                      // 设置附件上传（子）目录
				$info   =   $upload->uploadOne($_FILES['picture']);             // 单文件上传方法引用
				if(!$info) {                                                // 判断上传错误提示错误信息 
					$this->error($upload->getError());    
				}else{                                                    // 上传成功 获取上传文件信息        
					$file=$info['savepath'].$info['savename'];   
		   }}else{
			   $file="";
		   }
		   $user = M("admin");
		   $data['username']=$username;
		   $data['picture']=$file;
		   $data['password']=$password;
		   $data['sex']=$sex;
		   $row = $user -> add($data);
		   if($row){
			   alert('添加成功',U('User/index'));
		   }else{
			   $this->error("添加失败！");
		   }
	   }
	$this->display();
   }
}	
?>