<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
	    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
	    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
		<title>忘记密码</title>
	    <link rel="stylesheet" href="/public/app/lib/weui/jquery-weui.css" />
	    <link rel="stylesheet" href="/public/app/lib/weui/weui.min.css" />
	    <link rel="stylesheet" href="/public/app/css/public.css" />
	    <link rel="stylesheet" href="/public/app/css/style.css" />
	    <script type="text/javascript" src="/public/app/lib/jq/jquery-1.10.2.js" ></script>
	    <script type="text/javascript" src="/public/app/lib/weui/jquery-weui.js" ></script>
	    <script type="text/javascript" src="/public/app/js/common.js" ></script>
	</head>
	<style>
		body .weui-cell:before{
			z-index: 999;
		}
		body .weui-label{
			width: 95px;
		}
	</style>
	<body>
		<section class="contentSec loginSec">
			<div class="weui-cells weui-cells_form">
				<div class="weui-cell">
	                <div class="weui-cell__hd">
	                	<label class="weui-label">手机号</label>
	                </div>
	                <div class="weui-cell__bd">
	                    <input class="weui-input phone" type="text" placeholder="请输入手机号">
	                </div>
	            </div>
	            <div class="weui-cell">
	                <div class="weui-cell__hd">
	                	<label class="weui-label">新密码</label>
	                </div>
	                <div class="weui-cell__bd">
	                    <input class="weui-input pwd1" type="password" placeholder="请输入新密码">
	                </div>
	            </div>
	            <div class="weui-cell">
	                <div class="weui-cell__hd">
	                	<label class="weui-label">确认密码</label>
	                </div>
	                <div class="weui-cell__bd">
	                    <input class="weui-input pwd2" type="password" placeholder="请输入新密码">
	                </div>
	            </div>
	            <div class="weui-cell">
	                <div class="weui-cell__hd">
	                	<label class="weui-label">验证码</label>
	                </div>
	                <div class="weui-cell__bd">
	                    <input class="weui-input code" type="number" placeholder="请输入验证码" style="width:55%">
	                </div>
	                <div class="weui-cell__ft getCode on" style="font-size: 1.2rem; background: #fff;" onclick="getmsgcode(this)">获取验证码</div>
	            </div>
	        </div>
	        <div class="pd20">
	        	<a href="javascript:;" class="weui-btn weui-btn_primary changePwd">立即修改</a>
	        </div>
		</section>
	</body>
</html>

<script>
function getmsgcode(obj)
{
	var phone=$('.phone').val();
	if(phone.length!=11){
		message('请输入正确手机号');
		return false;
	}
	$.ajax({
		url:"<?php echo U('Api/Mobileverify/send_msg');?>",
		data:{send_address:phone,send_type:1},
		type:'POST',
		success:function(data){
			if(data.status==0)
			{
				message('短信发送成功');
				getCode(obj,phone);
			}else{
				message(data.error);
			}
		}
	})
		
}
var phone;
	$(function(){		
		$('.changePwd').click(function(){
			var phone=$('.phone').val();
			var pwd1=$('.pwd1').val();
			var pwd2=$('.pwd2').val();
			var code=$('.code').val();
			if(phone.length!=11){
				message('请输入正确手机号');
				return false;
			}
			if(pwd1.length<6||pwd1.length>20){
				message('请输入6~20位密码');
				return false;
			}
			if(pwd1!=pwd2){
				message('两次密码输入不一致');
				return false;
			}
			if(code.length<1){
				message('请输入验证码');
				return false;
			}
			$.ajax({
				url:"<?php echo U('User/Login/do_mobile_forgot_password');?>",
				data:{mobile:phone,password:pwd1,yzcode:code},
				type:'POST',
				success:function(data){
					if(data.status ==1)
					{
						// 登录成功跳转个人信息
						message('重置密码成功');
						setTimeout(function(){
  							location.href=data.url;  									
  						},1500);
					}else{
						message(data.msg);
					}
				}
			});
		})
	})
</script>