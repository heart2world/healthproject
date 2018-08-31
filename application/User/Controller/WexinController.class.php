<?php
/**
 * 微信授权登录
 */
namespace User\Controller;
use Think\Controller;
class WexinController extends Controller {
    const APPID ='wxb1f3832dbf2f3cd9';
    const APPSECRET='5289ce887d5546146dc81e68f82d1620';
    const TOKEN = "weixin";
    public function get_user()
    {
        $wechatObj = new \Think\WeChat(self::APPID,self::APPSECRET,self::TOKEN);
        $code=$_GET['code'];
        $openidarr=$wechatObj->get_snsapi_base($code);
        
        if($openidarr['scope']=='snsapi_base'){
            dump($openidarr['openid']);
        }
        $access_token=$openidarr['access_token'];
        $openid=$openidarr['openid'];
                
        if($openidarr['scope']=='snsapi_userinfo'){           
            $info=$wechatObj->get_snsapi_userinfo($access_token, $openid); 
        }   
        $_SESSION['user']['openid'] =$info['openid']; 
        $_SESSION['user']['avatar'] =$info['headimgurl'];              
        redirect(U('User/Register/index'));exit();  
    }
	public function get_user2()
    {
        $wechatObj = new \Think\WeChat(self::APPID,self::APPSECRET,self::TOKEN);
        $code=$_GET['code'];
        $openidarr=$wechatObj->get_snsapi_base($code);
        
        if($openidarr['scope']=='snsapi_base'){
            dump($openidarr['openid']);
        }
        $access_token=$openidarr['access_token'];
        $openid=$openidarr['openid'];
                
        if($openidarr['scope']=='snsapi_userinfo'){           
            $info=$wechatObj->get_snsapi_userinfo($access_token, $openid); 
        }      
		M('member')->where("id='".$_SESSION['user']['id']."'")->save(array('avatar'=>$info['headimgurl']));
        redirect(U('User/Center/index'));exit();  
    }
}