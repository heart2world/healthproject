<?php
namespace User\Controller;

use Common\Controller\HomebaseController;

class LoginController extends HomebaseController {
	
    // 前台用户登录
	public function index(){
	    
	    if(sp_is_user_login()){ //已经登录时直接跳到首页
	        redirect(__ROOT__."/");
	    }else{
	        $this->display(":login");
	    }
	}
	// 登录验证提交
    public function dologin(){

        $users_model=M("member");     
        
        $where = array();
        $where['mobile']=I('post.mobile');
        $password=I('post.password');
        $result = $users_model->where($where)->find();
        if(!empty($result)){
            if(sp_compare_password($password, $result['password'])){
                session('user',$result);
              
                $redirect=U('portal/index/index',array('isdo'=>1));
               
                $this->ajaxReturn(array('status'=>0,'url'=>$redirect));
            }else{
                $this->ajaxReturn(array('status'=>1,'msg'=>'密码错误'));
            }
        }else
        {
            $this->ajaxReturn(array('status'=>2,'msg'=>'手机号未注册'));
        }        
    }
	// 前台用户忘记密码
	public function forgetPwd(){
		$this->display(":forgetPwd");
	}
		
	// 前台用户忘记密码提交(手机方式找回)
	public function do_mobile_forgot_password(){
	    if(IS_POST){
            $users_model=M("member");
            $mobile=I('mobile','','trim'); 
            $password=I('password','','trim'); 
            if(!check_send_code($mobile,trim($_POST['yzcode']))){
                $this->ajaxReturn(['status'=>0,'msg'=>'短信验证码错误']);
            }
                       
            $where['mobile']=$mobile; 
            $result = $users_model->where($where)->count();
            if($result){
               $result=$users_model->where($where)->save(array('password' => sp_password($password)));
               if($result!==false){
                   $this->ajaxReturn(array('status'=>1,'msg'=>"密码重置成功！",'url'=>U('user/login/index')));
               }else{
                   $this->ajaxReturn(array('status'=>0,'msg'=>"密码重置失败！"));
               }
            }else{
                $this->ajaxReturn(array('status'=>0,'msg'=>"该手机号尚未注册"));
            }
        }
	}
}