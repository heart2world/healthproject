<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 2017/5/3
 * Time: 16:34
 */
namespace Api\Controller;

use Org\Util\Ajax;
use Think\Controller;
use Think\Verify;

class MobileverifyController extends Controller{

    private $_config = array(
        'fontSize' => 35,   //字体大小
        'length' => 4,   //长度
        'useNoise' => false,    //关闭验证码杂点
        'useCurve' => true,
    );

    private $_verify;
    public function __construct()
    {
        $this->_verify=new Verify($this->_config);
    }

    public function index(){
        $this->_verify->entry();
    }

    public function send_msg(){
        
        $data=I('post.');
		$check=S('user_send'.$member['id']);
        if(!empty($check)&&$check>=5){
            $this->ajaxReturn(['status'=>1,'error'=>'请勿频繁获取短信验证']);
        }
        $mobile=M('member')->where(['mobile'=>$data['send_address']])->count();
		$member=M('member')->where(['mobile'=>$data['send_address']])->getfield('id');
        if($mobile && $data['send_type'] ==0){
            $this->ajaxReturn(['status'=>1,'error'=>'此手机号已注册']);
        }
        if(empty($mobile) && $data['send_type'] ==1){
            $this->ajaxReturn(['status'=>1,'error'=>'此手机号未注册']);
        }
        header('content-type:text/html;charset=utf-8');
       
        $sendUrl = 'http://v.juhe.cn/sms/send'; //短信接口的URL
        $code=func_randStr(5);       
         
        $smsConf = array(
            'key'   => '55c907ebc36d3aa4963d83aaa9e45d20', //您申请的APPKEY
            'mobile'    => $data['send_address'], //接受短信的用户手机号码
            'tpl_id'    => '72394', //您申请的短信模板ID，根据实际情况修改
            'tpl_value' =>urlencode('#code#='.$code) //您设置的模板变量，根据实际情况修改
        );
        $content = $this->http_data_send($sendUrl,$smsConf); //请求发送短信
       
        if($content){
            $result = json_decode($content,true);
            $error_code = $result['error_code'];
            if($error_code == 0){
                //状态为0，说明短信发送成功
                S('sms_user_bind'.$data['send_address'],$code,600);
				$num=S('user_send'.$member['id'])?S('user_send'.$member['id']):0;
                S('user_send'.$member['id'],++$num,3600);
                $this->ajaxReturn(['status'=>0]);
            }else{
                //状态非0，说明失败
                $msg = $result['reason'];
                $this->ajaxReturn(['status'=>1,'error'=>$msg]);
            }
        }else{
            //返回内容异常，以下可根据业务逻辑自行修改
            $this->ajaxReturn(['status'=>1,'error'=>'请求发送短信失败']);
        }

    }
    public function check_code(){
        $data=I('post.');
        empty($data['code']) && $this->ajaxReturn(['status'=>0,'isPass'=>0,'state'=>1,'error'=>'短信验证码不能为空']);
        if(!check_send_code($data['send_address'],$data['code'])){
            $this->ajaxReturn(['status'=>0,'isPass'=>0,'state'=>1,'error'=>'短信验证码错误']);
        }
        $this->ajaxReturn(['status'=>0,'isPass'=>0,'state'=>0]);
    }
    
    function http_data_send($url,$data=[]){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        if(!empty($data)){
            curl_setopt($ch,CURLOPT_POST,1);
            curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output=curl_exec($ch);

        curl_close($ch);
        return $output;
    }

    public function getUrl(){
        $send_url=I('get.url');
        $url="http://www.hdb.com/post/api:70";
        $curlPost = "videoUrl=".$send_url;
        $rel=$this->http_data_send($url,$curlPost);
        $arr=json_decode($rel,true);
        $this->ajaxReturn(['aa'=>$arr['video']]);
    }
}