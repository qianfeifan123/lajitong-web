<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
	 public function login(){
		if(isset($_POST["dosubmit"])){
		    $usename = I("post.username");
			$password = I("post.password");
			$biao=M('admin');
			$row = $biao->where("username='$usename' AND password='$password'")->find();
			if($row){
				$logintime = time();
				$os=PHP_OS;//获取操作系统
				$vs=PHP_VERSION;//获取PHP版本
				$ql=mysql_get_server_info();//获取Mysql版本
				$loginip = $_SERVER['REMOTE_ADDR'];
				$_SESSION['username']=$usename;
				$_SESSION['times']=$row['logtime'];
				$_SESSION['ip']=$row['logip'];
				$_SESSION['osing']=$row['os'];
				$_SESSION['vsing']=$row['vs'];
				$_SESSION['qling']=$row['ql'];
				$_SESSION['os']=PHP_OS;
				$_SESSION['vs']=PHP_VERSION;
				$_SESSION['ql']=mysql_get_server_info();
				$data['logtime']=$logintime;
				$data['logip']=$loginip;
				$data['os']=$os;
				$data['vs']=$vs;
				$data['ql']=$ql;
				$res = $biao->where("username='$usename'")->save($data);
				if($res){
					alert("登陆成功！",U("Map/index"));
				}else{
					alert("登陆失败！");
				}
			}else{
				echo "<script>alert('账号或者密码有误！');</script>";
			}
	         /*   }else{
				$this->error('验证码输入错误');
			} */
 		
			
			//echo $biao->_sql();
		}
		$this->display();
    }
	
	function code(){
		$Verify = new \Think\Verify();  //实例化TP框架预设好的验证码对象
		$Verify->fontSize = 24;		//设定字体大小
		$Verify->length = 4;		//设定验证码字符个数
		$Verify->useNoise = true;	//设定是否有干扰点	
		$Verify->useCurve = true;	//设定是否有干扰线
		$Verify->entry();			//引用对象
		}

	function check_verify($code, $id){             //验证码验证方法
	$verify = new \Think\Verify();    
	return $verify->check($code, $id);
	}
	/*登出操作*/
		public function logout() {
    	session(null);
    	alert("成功退出!","login");
		}

	public function register(){
		if(isset($_POST["register"])){
		    $usename = I("post.username");
			$password = I("post.password");
			$repassword = I("post.repassword");
			$phone = I("post.phone");
			$sex=I("post.sex");
			$db=M('admin');
			if($repassword==$password){
				$data['username']=$username;
				$data['password']=$password;
				$data['phone']=$phone;
				$data['sex']=$sex;
				// if($_FILES['picture']['error']==0){
				// 	var_dump($_FILES);die;
			 //   $upload = new \Think\Upload();                                    // 实例化上传类   
				// 	$upload->maxSize   =     3145728 ;                               // 设置附件上传大小  
				// 	$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');    // 设置附件上传类型   
				// 	$upload->rootPath  =     'Uploads/';                           // 设置附件上传目录
				// 	$upload->savePath  = '';                                      // 设置附件上传（子）目录
				// 	$info   =   $upload->uploadOne($_FILES['picture']);             // 单文件上传方法引用
				// 	if(!$info) {
				// 	var_dump($_FILES['picture']);die;                                                // 判断上传错误提示错误信息 
				// 		$this->error($upload->getError());    
				// 	}else{                                                    // 上传成功 获取上传文件信息        
				// 		$file=$info['savepath'].$info['savename'];   
			 //     }
				// }else{
				// 	   $file="";
				// }
				// $data['picture']=$file;
				$res=$db->add($data);
				$_SESSION['username']=$usename;
				if($res){
					alert("注册成功！",U("Map/index"));
				}else{
					alert("注册失败！");
				}
			}else{
				echo "<script>alert('注册信息不合理！');</script>";
			}
	         /*   }else{
				$this->error('验证码输入错误');
			} */
 		
			
			//echo $biao->_sql();
		}
		$this->display();
	}	

}