<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
	    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
	    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
		<title>注册</title>
	    <link rel="stylesheet" href="/public/app/lib/weui/jquery-weui.css" />
	    <link rel="stylesheet" href="/public/app/lib/weui/weui.min.css" />
	    <link rel="stylesheet" href="/public/app/css/public.css" />
	    <link rel="stylesheet" href="/public/app/css/style.css" />
	    <script type="text/javascript" src="/public/app/lib/jq/jquery-1.10.2.js" ></script>
	    <script type="text/javascript" src="/public/app/lib/weui/jquery-weui.js" ></script>
	    <script type="text/javascript" src="/public/app/js/common.js" ></script>
	</head>
	<style>
	.weui-cell__bd{
		-webkit-box-flex: none;
		-webkit-flex: none;
		flex: none;
		min-width:80px
	}
	.weui-cell__ft{
		-webkit-box-flex: 1;
		-webkit-flex: 1;
		flex: 1;
	}
	.weui-cell__ft.getCode{
		-webkit-box-flex: none;
		-webkit-flex: none;
		flex: none;
	}
	</style>
	<body>
		<section class="contentSec loginSec">
			<div class="weui-cells">
	            <div class="weui-cell">
	                <div class="weui-cell__hd"><img src="/public/app/img/info1@2x.png" alt="" style="width:20px;margin-right:5px;display:block"></div>
	                <div class="weui-cell__bd">
	                    <p>真实姓名</p>
	                </div>
	                <div class="weui-cell__ft">
	                	<input type="text" class="realName" placeholder="请输入真实姓名" style="font-size: 17px;" />
	                </div>
	            </div>
	            <div class="weui-cell">
	                <div class="weui-cell__hd"><img src="/public/app/img/shoujihaoma@2x.png" alt="" style="width:15px;margin-right:8px;margin-left: 2px; display:block"></div>
	                <div class="weui-cell__bd">
	                    <p>手机号</p>
	                </div>
	                <div class="weui-cell__ft">
	                	<input type="number" class="phone"  placeholder="请输入手机号" style="font-size: 17px;" />
	                </div>
	            </div>
	            <div class="weui-cell">
	                <div class="weui-cell__hd"><img src="/public/app/img/mima@2x.png" alt="" style="width:17px;margin-right:8px;display:block"></div>
	                <div class="weui-cell__bd">
	                    <p>密码</p>
	                </div>
	                <div class="weui-cell__ft">
	                	<input type="password" class="pwd" placeholder="请输入密码" style="font-size: 17px;" />
	                </div>
	            </div>
	            <!--<div class="weui-cell">
	                <div class="weui-cell__hd">
	                	<img src="/public/app/img/yanzhengma@2x.png" alt="" style="width:18px;margin-right: 0; display:inline-block">
	                	<label class="weui-label" style="display: inline-block; width: 80px;">验证码</label></div>
	                <div class="weui-cell__bd" style="-webkit-box-flex: 1; -webkit-flex: 1; flex: 1;">
	                    <input class="weui-input left code" type="number" placeholder="请输入验证码">
	                </div>
	                <div class="weui-cell__ft getCode on" onclick="getmsgcode(this);">获取验证码</div>
	            </div>-->
	        </div>
	        <div class="pd20">
	        	<a href="javascript:;" class="weui-btn weui-btn_primary register">立即注册</a>
	        </div>
		</section>
	</body>
</html>

<script>
	var phone;
function getmsgcode(obj)
{
	var phone=$('.phone').val();
	if(phone.length!=11){
		message('请输入正确手机号');
		return false;
	}
	$.ajax({
		url:"<?php echo U('Api/Mobileverify/send_msg');?>",
		data:{send_address:phone,send_type:0},
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
$(function(){
	$('.register').click(function(){
		var realName=$('.realName').val();
		phone=$('.phone').val();
		var pwd=$('.pwd').val();
		var code=$('.code').val();
		if(realName.length<1){
			message('请输入真实姓名');
			return false;
		}
		if(phone.length!=11){
			message('请输入正确手机号');
			return false;
		}
		if(pwd.length<6||pwd.length>20){
			message('请输入6~20位密码');
			return false;
			console.log(000);
		}
		
		$.ajax({
				url:"<?php echo U('User/Register/doregister');?>",
				data:{mobile:phone,password:pwd,nicename:realName},
				type:'POST',
				success:function(data){
					if(data.status ==1)
					{
						// 登录成功跳转个人信息
						message('注册成功');
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