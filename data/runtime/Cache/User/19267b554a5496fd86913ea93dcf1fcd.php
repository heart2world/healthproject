<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
	    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
	    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
		<title>登录</title>
	    <link rel="stylesheet" href="/public/app/lib/weui/jquery-weui.css" />
	    <link rel="stylesheet" href="/public/app/lib/weui/weui.min.css" />
	    <link rel="stylesheet" href="/public/app/css/public.css" />
	    <link rel="stylesheet" href="/public/app/css/style.css" />
	    <script type="text/javascript" src="/public/app/lib/jq/jquery-1.10.2.js" ></script>
	    <script type="text/javascript" src="/public/app/lib/weui/jquery-weui.js" ></script>
	    <script type="text/javascript" src="/public/app/js/common.js" ></script>
	</head>
	<body>
		<!--<header class="pageHeader">
			<div class="back">返回</div>
			<h2>登录</h2>
		</header>-->
		<section class="contentSec loginSec" style="margin-top:0">
			<div class="weui-cells">
	            <div class="weui-cell">
	                <div class="weui-cell__hd"><img src="/public/app/img/shoujihaoma@2x.png" alt="" style="width:15px;margin-right:10px;display:block"></div>
	                <div class="weui-cell__bd">
	                    <p>手机号</p>
	                </div>
	                <div class="weui-cell__ft">
	                	<input type="tel" placeholder="请输入手机号" class="phone" style="font-size: 17px;" />
	                </div>
	            </div>
	            <div class="weui-cell">
	                <div class="weui-cell__hd"><img src="/public/app/img/mima@2x.png" alt="" style="width:17px;margin-right:8px;display:block"></div>
	                <div class="weui-cell__bd">
	                    <p>密码</p>
	                </div>
	                <div class="weui-cell__ft">
	                	<input type="password" placeholder="请输入密码" class="pwd" style="font-size: 17px;" />
	                </div>
	            </div>
	        </div>
	        <div class="pd20">
	        	<a href="javascript:void(0);" class="weui-btn weui-btn_primary login">登录</a>
	        </div>
	        <div class="pd20" style="padding-top:0">
	        	<a href="<?php echo U('User/Login/forgetPwd');?>" class="forgetPwd" style="font-size: 1.2rem; color: #4fbbc5;">忘记密码</a>
	        	<a href="<?php echo U('User/register/index');?>" class="register" style="float: right; font-size: 1.2rem; color: #4fbbc5;">立即注册</a>
	        </div>
		</section>
	</body>
</html>
<script>
	$(function(){
		$('.login').click(function(){
			var phone=$('.phone').val();
			var pwd=$('.pwd').val();
			if(phone.length!=11){
				message('请输入正确手机号');
				return false;
			}
			if(pwd.length<6||pwd.length>20){
				message('请输入6~20位密码');
				return false;
			}
			$.ajax({
				url:"<?php echo U('User/Login/dologin');?>",
				data:{mobile:phone,password:pwd},
				type:'POST',
				success:function(data)
				{
					if(data.status ==0)
					{
						// 登录成功跳转个人信息
						message('登录成功');
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