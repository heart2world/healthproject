<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
	    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
	    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
		<title>我的检查</title>
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
			<div>我的检查</div>
		</header>-->
		<section class="mainSec" style="margin-top:0">
			<!--我的检查-->
			<div class="myCheck">
				<div class="weui-cells">
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i;?><a class="weui-cell weui-cell_access" href="<?php echo U('User/Center/jianchaDetail',array('id'=>$va['id']));?>">
		                <div class="weui-cell__bd">
		                    <p>检查时间：<?php echo ($va["checktime"]); ?></p>
		                    <p>检查机构：<?php echo ($va["checkname"]); ?></p>
		                </div>
		                <div class="weui-cell__ft jt">
		                </div>
		            </a><?php endforeach; endif; else: echo "" ;endif; ?>
		        </div>
		        <?php if(count($list) == 0): ?><center style="margin-top: 10px;">没有更多了~</center><?php endif; ?>
			</div>
		</section>
		<footer class="mainFooter">
			<a class="wdjc active" href="<?php echo U('User/Center/checklist');?>">我的检查</a>
			<a class="jkrz" href="<?php echo U('User/Center/loglist');?>">健康日志</a>
			<a class="grzx" href="<?php echo U('User/Center/index');?>">个人信息</a>
		</footer>
	</body>
</html>
<script>
bgImg('bgImg',.6);
bgImg('headImg',1);
	$(function(){
		var height=$(window).height();
		$('.mainSec').height(height-106);
	})
</script>