<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
	    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
	    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
		<title>身高</title>
	    <link rel="stylesheet" href="/public/app/lib/weui/jquery-weui.css" />
	    <link rel="stylesheet" href="/public/app/lib/weui/weui.min.css" />
	    <link rel="stylesheet" href="/public/app/css/public.css" />
	    <link rel="stylesheet" href="/public/app/css/style.css" />
	    <script type="text/javascript" src="/public/app/lib/jq/jquery-1.10.2.js" ></script>
	    <script type="text/javascript" src="/public/app/lib/weui/jquery-weui.js" ></script>
	    <script type="text/javascript" src="/public/app/js/common.js" ></script>
	</head>
	<body>
		<section class="contentSec nameSec">
			<div class="weui-cells">
	            <div class="weui-cell">
	                <div class="weui-cell__bd">
	                    <input type="number" class="height" style="font-size:17px;vertical-align:middle" placeholder="请输入身高" value="<?php echo ($mheight); ?>"/>
	                </div>
	                <div class="weui-cell__ft">CM</div>
	            </div>
	        </div>
	        <div class="pd20 actionBtn">
	        	<a href="javascript:;" class="weui-btn weui-btn_primary save">保存</a>
	        	<a href="javascript:;" class="weui-btn weui-btn_primary next">下一步</a>
	        </div>
		</section>
	</body>
</html>
<script>
	$('.save').click(function(){
		if($('.height').val().length<1){
			message('请输入身高');
			return false;
		}
		if($('.height').val()>300){
			message('请输入合理身高');
			$('.height').val('');
			return false;
		}
		$.ajax({
			url:"<?php echo U('User/Profile/editheightpost');?>",
			data:{mheight:$('.height').val()},
			type:'POST',
			success:function(data)
			{
				if(data.status==0)
				{
					message(data.msg);
					setTimeout(function(){
  						location.href=data.url;  									
  					},1500);
				}else
				{
					message(data.msg);
				}
			}
		})
	})
	$('.next').click(function(){
		if($('.height').val().length<1){
			message('请输入身高');
			return false;
		}
		if($('.height').val()>300){
			message('请输入合理身高');
			$('.height').val('');
			return false;
		}
		$.ajax({
			url:"<?php echo U('User/Profile/editheightpost');?>",
			data:{mheight:$('.height').val()},
			type:'POST',
			success:function(data)
			{
				if(data.status==0)
				{
					
  						location.href="<?php echo U('User/Profile/editweight');?>";  									
  					
				}else
				{
					message(data.msg);
				}
			}
		})
	})
</script>