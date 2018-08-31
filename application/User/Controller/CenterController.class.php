<?php
namespace User\Controller;

use Common\Controller\MemberbaseController;

class CenterController extends MemberbaseController {
	
	function _initialize(){
		parent::_initialize();
	}
	
    // 会员中心首页
	public function index() {
		$this->assign($this->user);
		
    	$this->display(':center');
    }
    // 我的检查
    public function checklist()
    {
        $uinfo =$this->user;
        $list =M('member_report')->field('id,mid,checktime,checkname')->where("mid='".$uinfo['id']."'")->order('checktime DESC')->select();
        $this->assign('list',$list);
        $this->display(":checklist");
    }
    // 检查详情
    public function jianchaDetail()
    {
        $id =I('id','','intval');
        $info =M('member_report')->where("id='$id' and mid='".$_SESSION['user']['id']."'")->find();
        if(!empty($info))
        {
            $this->assign('info',$info);
            $this->display(":jianchaDetail");
        }else
        {
            $this->error('参数有误');
        }
    }
	// 上传图片
	function getimgpost()
	{
		if(IS_POST)
		{
			$access_token=I('access_token','','trim');
			$media_id=I('media_id','','trim');
			$url ="http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=".$access_token."&media_id=".$media_id;			
			$urldemo =file_get_contents($url);
			
			if($urldemo)
			{
				 $imgurl = "./data/upload/images/".date('Ymd').rand(10000,99999).".jpg";
				
				 $resource = fopen($imgurl, 'w+');  
				 //将图片内容写入上述新建的文件  
				 fwrite($resource, $urldemo);  
				 //关闭资源  
				 fclose($resource);  
				 $strimgurl ='http://'.$_SERVER['HTTP_HOST'].'/'.$imgurl;
				 file_put_contents('a980.txt',$strimgurl);
				 $this->ajaxReturn(array('status'=>1,'imgurl'=>$imgurl,'strimgurl'=>$strimgurl));
			}else{
				$this->ajaxReturn(array('status'=>0));
			}
		}
	}
    // 健康日志
    public function myhealth()
    {
        $this->display(":myhealth");
    }
    // 录入健康日志
    public function writeLog()
    {
        $uinfo =$this->user;
        $this->assign('uinfo',$uinfo);
		
		// jssdk微信授权获取信息
		$jssdk = new \Think\JSSDK("wxb1f3832dbf2f3cd9", "5289ce887d5546146dc81e68f82d1620");
        $signPackage = $jssdk->GetSignPackage();
        $this->assign('signPackage',$signPackage);
        $this->display(":writeLog");
    }
	
	function dellog()
	{
		if(IS_POST)
		{
			$id =I('id','','intval');
			
			$result =M('member_healthlog')->where("id='$id'")->delete();
			if($result)
			{
				$this->ajaxReturn(array('status'=>0,'atype'=>$id));
			}
		}
	}
    // 健康日志记录
    public function loglist()
    {
        $uinfo = $this->user;
        $list =M('member_healthlog')->where("mid='".$uinfo['id']."'")->order('logtime desc')->select();
        $this->assign('list',$list);
        $this->display(":loglist");
    }
    public function writedetail()
    {
        $id =I('id','','intval');
        $info =M('member_healthlog')->where("id='$id' and mid='".$_SESSION['user']['id']."'")->find($id);
		// jssdk微信授权获取信息
		$jssdk = new \Think\JSSDK("wxb1f3832dbf2f3cd9", "5289ce887d5546146dc81e68f82d1620");
        $signPackage = $jssdk->GetSignPackage();
        $this->assign('signPackage',$signPackage);
        if($info)
        {
			if($info['imgs'])
			{
				$imgs =explode(',',$info['imgs']);
				$this->assign('imgs',$imgs);
				
			}
            $this->assign("info", $info);
            $this->display(":writedetail");
        }else
        {
            $this->error('参数有误');
        }
        
    }
    // 录入保存
    function writepost()
    {
        if(IS_POST)
        {
            $pdata =I('post.');
			
            if(empty($pdata['id']))
            {
                if(M('member_healthlog')->create() !=false)
                {
                    $pdata['addtime'] =time();
					
                    $result=M('member_healthlog')->add($pdata);
                    if($result)
                    {
                        $this->ajaxReturn(array('status'=>0,'msg'=>'保存成功','url'=>U('User/Center/loglist')));
                    }
                }
            }else
            {
                M('member_healthlog')->where("id='".$pdata['id']."'")->save($pdata);
                $this->ajaxReturn(array('status'=>0,'msg'=>'保存成功','url'=>U('User/Center/loglist')));
            }
            
        }
    }
    //退出
    public function logout(){
    	$ucenter_syn=C("UCENTER_ENABLED");
    	$login_success=false;
    	if($ucenter_syn){
    		include UC_CLIENT_ROOT."client.php";
    		echo uc_user_synlogout();
    	}
    	session("user",null);//只有前台用户退出
    	redirect(__ROOT__."/");
    }
}
