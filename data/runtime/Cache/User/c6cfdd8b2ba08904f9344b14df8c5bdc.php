<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
      <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
      <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
    <title>个人信息</title>
      <link rel="stylesheet" href="/public/app/lib/weui/jquery-weui.css" />
      <link rel="stylesheet" href="/public/app/lib/weui/weui.min.css" />
      <link rel="stylesheet" href="/public/app/css/public.css" />
      <link rel="stylesheet" href="/public/app/css/style.css" />
      <script type="text/javascript" src="/public/app/lib/jq/jquery-1.10.2.js" ></script>
      <script type="text/javascript" src="/public/app/lib/weui/jquery-weui.js" ></script>
      <script type="text/javascript" src="/public/app/js/common.js" ></script>
  </head>
  <body>
    <!--<header class="mainHeader">
      <div>个人信息</div>
    </header>-->
    <section class="mainSec" style="margin-top:0;">
      <!--个人管理-->
      <div class="selgManage">
        <div class="Info relative" style="background-image:url(<?php echo ($avatar); ?>)">
          <div class="headBox">
            <div class="headImg">
              <img src="<?php echo ($avatar); ?>" width="100%" height="100%" />
            </div>
            <p>姓名：<?php echo ($nicename); ?></p>
            <p>手机号：<?php echo ($mobile); ?></p>
          </div>
        </div>
        <div class="weui-cells">
                <a class="weui-cell weui-cell_access" href="<?php echo U('User/profile/edit');?>" style="padding:15px 10px">
                    <div class="weui-cell__hd"><img src="/public/app/img/info1@2x.png" alt="" style="width:23px;margin-right:5px;display:block"></div>
                    <div class="weui-cell__bd">
                        <p>个人信息</p>
                    </div>
                    <div class="weui-cell__ft"></div>
                </a>
                <a class="weui-cell weui-cell_access" href="<?php echo U('User/Profile/password');?>" style="padding:15px 10px">
                    <div class="weui-cell__hd"><img src="/public/app/img/mima@2x.png" alt="" style="width:20px;margin-right:5px;display:block"></div>
                    <div class="weui-cell__bd">
                        <p>修改密码</p>
                    </div>
                    <div class="weui-cell__ft"></div>
                </a>
            </div>
            <p class="bottomText" style="margin-top:20px">本服务由“永益健康管理咨询服务有限公司”提供</p>
	        <div class="pd20">
	        	<a href="<?php echo U('User/center/logout');?>" class="weui-btn weui-btn_primary">退出登录</a>
	        </div>
      </div>
    </section>
    <footer class="mainFooter">
      <a class="wdjc" href="<?php echo U('User/center/checklist');?>">我的检查</a>
      <a class="jkrz" href="<?php echo U('User/Center/loglist');?>">健康日志</a>
      <a class="grzx active" href="<?php echo U('User/center/index');?>">个人信息</a>
    </footer>
  </body>
</html>
<script>
bgImg('bgImg',.6);
bgImg('headImg',1);
  $(function(){
    var height=$(window).height();
    $('.mainSec').height(height-106);
    $('.mainFooter>div').click(function(){
      var index=$(this).index();
      $(this).addClass('active').siblings().removeClass('active');
      $('.mainSec>div').hide().eq(index).show();
      $('.mainHeader div').hide().eq(index).show();
    })
  })
</script>