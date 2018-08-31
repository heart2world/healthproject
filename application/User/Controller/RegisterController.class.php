<?php
namespace User\Controller;

use Common\Controller\HomebaseController;

class RegisterController extends HomebaseController {
	const APPID = 'wxb1f3832dbf2f3cd9';
    // 前台用户注册
	public function index(){
	    if(sp_is_user_login()){ //已经登录时直接跳到首页
	        redirect(__ROOT__."/");
	    }else{
	    	// 微信授权
			 if(!$_SESSION['user']['openid'])
			 {
				
			   $str=urlencode('http://health.d-intel.com/index.php?g=User&m=Wexin&a=get_user');
			   $url='https://open.weixin.qq.com/connect/oauth2/authorize?appid='.self::APPID.'&redirect_uri='.$str.'&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect';
			   header("location:$url");
			 }
	        $this->display(":register");
	    }
	}
	
	// 前台用户注册提交
	public function doregister(){
    	
    	$mobile=I('post.mobile');
    	$nicename=I('post.nicename');
	  	//if(!check_send_code($mobile,trim($_POST['yzcode']))){
        //    $this->ajaxReturn(['status'=>0,'msg'=>'短信验证码错误']);
       // }        
	    
	    $users_model=M("member");
	    $count =$users_model->where("mobile='$mobile'")->count();
	    if($count >0)
	    {
	    	$this->ajaxReturn(array('status'=>0,'msg'=>'该手机号已注册'));
	    }	    
	    $data=array(
	        'nicename' => $nicename,
	        'mobile' =>$mobile,
			'avatar' =>$_SESSION['user']['avatar'],
	        'addtime' => time(),
	        'password' => sp_password(trim($_POST['password'])),
	        'last_login_ip' => get_client_ip(0,true),		      
		    'last_login_time' => date("Y-m-d H:i:s"),
	        'status' => 1,
	    );
	    
	    $result = $users_model->add($data);
	    if($result){
	        //注册成功页面跳转`
	        $data['id']=$result;
	        session('user',$data);
	        $this->ajaxReturn(array('status'=>1,'url'=>U('User/Center/index')));	         
	    }else{
	        $this->ajaxReturn(array('status'=>0,'msg'=>'注册失败'));
	    }
    	
	}
}