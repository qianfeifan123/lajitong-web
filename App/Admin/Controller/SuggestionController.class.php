<?php
namespace Admin\Controller;
use Think\Controller;

class SuggestionController extends Controller {
   public function index(){
      $db=M('suggestion');
      $list=$db->where('status=1')->order('id desc')->select();
      $page=getpage($db,'status=1',10);
      // var_dump($db);die;
      $this->page=$page->show;
      $this->assign('list',$list);
      $this->display();
   }

   public function edit(){
   	  $id=I('get.id');
      $db=M('suggestion');
      $list = $db -> where("id=".$id)->find();
      $this->assign('db',$list);
      if(isset($_POST['dosubmit'])){
      	  $data['dbname']=I('post.dbname');
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
	      	  alert('修改成功',U('db/index'));
		   }else{
			   $this->error("修改失败！");
		   }
      }
      
	  $this->display(); 
   }

   public function del(){
      $id=I('get.id');
      $db=M('suggestion');
      $data['status']=0;
      $sql=$db->where("id='$id'")->save($data); //软删除
      if($sql){
      	  alert('删除成功',U('Suggestion/index'));
	   }else{
		   $this->error("删除失败！");
	   }
   }

   public function add(){
   	if(isset($_POST["dosubmit"])){
   		   $db = M("suggestion");
		   $content = I("post.content");
		   $data['content']=$content;
		   $data['addtime']=time();
		   $data['username']=$_SESSION['username'];
		   $row = $db -> add($data);
		   if($row){
			   alert('添加成功',U('Suggestion/index'));
		   }else{
			   $this->error("添加失败！");
		   }
	   }
	$this->display();
   }
}	
?>