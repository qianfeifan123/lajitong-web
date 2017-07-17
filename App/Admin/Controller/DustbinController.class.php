<?php
namespace Admin\Controller;
use Think\Controller;

class DustbinController extends Controller {

	public function index(){
      $db=M('dustbin_map');
      $count = $db->where('status=1')->count();
      $Page = new \Think\Page($count,5);
      $show = $Page->show();
      $dustbin=$db->where('status=1')->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
      $this->assign('list',$dustbin);
      $this->assign('page',$show);
      if(IS_POST){
       $idarr = implode(',',I('post.idarr'));
       $shouye=M('dustbin_map');
       $row = $shouye->delete($idarr);
       if($row){
        alert('删除成功',U('Dustbin/index'));
       }else{
        alert('删除失败');
       }
     }
      $this->display();
    }

    public function add(){
    	if(isset($_POST["dosubmit"])){
           $phone = I("post.phone");
           $lat = I("post.lat");
           $lng = I("post.lng");
           $full = I("post.full");
           $warning = I("post.warning");
           $db = M("dustbin_map");
           $data['phone']=$phone;
           $data['lat']=$lat;
           $data['lng']=$lng;
           $data['point']=$lng.','.$lat;
           $data['full']=$full;
           $data['warning']=$warning;
           $row = $db -> add($data);
           if($row){
               alert('添加成功',U('Dustbin/index'));
           }else{
               $this->error("添加失败！");
           }
       }
    $this->display();
    }

    public function edit(){
    	$db=M('dustbin_map');
    	$id=I('get.id');
        $dustbin = $db -> where("id=".$id)->find();
        $this->assign('dustbin',$dustbin);
        if(isset($_POST['dosubmit'])){
            $data['phone']=I('post.phone');
            $data['lat']=I('post.lat');
            $data['lng']=I('post.lng');
            $data['point']=I('post.lng').','.I('post.lat');
            $data['full']=I('post.full');
            $data['warning']=I('post.warning');
            $sql=$db->where("id=".$id)->save($data);
            if($sql){
                alert('修改成功',U('dustbin/index'));
            }else{
                $this->error("修改失败！");
            }
        }
      
      $this->display(); 
    }

    public function del(){
    	$id=I('get.id');
        $db=M('dustbin_map');
        $data['status']=0;
        $sql=$db->where("id='$id'")->save($data); //软删除
        if($sql){
           alert('删除成功',U('Dustbin/index'));
        }else{
           $this->error("删除失败！");
        }
    }

    public function dels(){
        $db=M('dustbin_map');
        $id=I('post.id');
        var_dump($id);die;

        $ids = implode(",", $id);

        $sql = "UPDATE fd_dustbin_map SET status = 0 WHERE id  in ({$ids})";
        $res=$db->query($sql);
        if($res){
           alert('删除成功',U('Dustbin/index'));
        }else{
           $this->error("删除失败！");
        }
    }
}    		