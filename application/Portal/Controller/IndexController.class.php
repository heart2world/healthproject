<?php

// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: GQ <649180397@qq.com>
// +----------------------------------------------------------------------
namespace Portal\Controller;
use Common\Controller\HomebaseController; 
/**
 * 首页
 */
class IndexController extends HomebaseController {
	const APPID = 'wxb1f3832dbf2f3cd9';
    //首页
	public function index() {
		if(empty($_SESSION['user']['id']))
		{
			redirect(U('User/Login/index'));
		}else
		{
			if(intval($_GET['isdo'])==1)
			{
				
			   $str=urlencode('http://health.d-intel.com/index.php?g=User&m=Wexin&a=get_user2');
			   $url='https://open.weixin.qq.com/connect/oauth2/authorize?appid='.self::APPID.'&redirect_uri='.$str.'&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect';
			   header("location:$url");
				
			}else{
				redirect(U('User/Center/index'));
			}
		}
    	$this->display(":index");
    }

}


