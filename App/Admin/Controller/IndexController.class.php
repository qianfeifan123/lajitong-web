<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
       echo "hello ThinkPHP"."<br/>";
       
        var_dump($_GET);
        var_dump(I('get.'));
        echo U()."<br/>";
        echo U('test')."<br/>";
       echo  U('Admin/Test/index')."<br/>";//获取Admin模块的Test控制器的index方法的地址


        echo U('Test/index?id=5&name=jack')."<br/>";
        echo U('Test/index',"age=30&id=5&name=licy")."<br/>";
         echo U('Test/index',array('id'=>5,'name'=>'jack'))."<br/>";


        $_GET['like']=array('as'=>1,'b'=>2);
      echo "hello tp"."<br/>";
        var_dump($_GET['id']);
        var_dump(I("get.id"));
        var_dump(I("get."));
        // var_dump(I('get.like.as'));
        var_dump(I("server.HTTP_HOST"));

        if(false){
            $this->success("success提示信息",U('test'),3);
        }else{
            $this->error("error提示信息",U('Test/index'),2);        }

// $this->redirect('Test/index','', 3,'I am jump...');

        redirect("http://www.baidu.com",4,'jumpping
             to baidu');




       $page=new \Think\Page(100,8);
       echo $page->show();

       $str=new \Org\Util\String();
       var_dump($str);
       
       $this->name='i am title';
       //渲染视图
       $this->display('test');
    }
}