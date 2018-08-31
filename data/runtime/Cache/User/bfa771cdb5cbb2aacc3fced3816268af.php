<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
	    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
	    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
		<title>身份证</title>
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
			<div class="weui-cells weui-cells_form">
	            <div class="weui-cell weui-cell_default">
	                <div class="weui-cell__bd">
	                    <input class="weui-input inputBox cardid" type="text" placeholder="请输入身份证号码" value="<?php echo ($cardnum); ?>">
	                </div>
	                <div class="weui-cell__ft">
	                    <i class="weui-icon-cancel cancel none"></i>
	                </div>
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
$(function(){
	if($('.cardid').val().length>0){
		$('.cancel').show();
	}
})
	$('.save').click(function(){
		var reg=/(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/;
		var cardid=$('.cardid').val()
		if(cardid.length<1){
			message('请输入身份证号');
			return false;
		}
		else if(!reg.test(cardid)){
			message('请输入正确身份证号');
			return false;
		}
		$.ajax({
			url:"<?php echo U('User/Profile/editcardpost');?>",
			data:{cardnum:cardid},
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
		var reg=/(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/;
		var cardid=$('.cardid').val()
		if(cardid.length<1){
			message('请输入身份证号');
			return false;
		}
		else if(!reg.test(cardid)){
			message('请输入正确身份证号');
			return false;
		}
		$.ajax({
			url:"<?php echo U('User/Profile/editcardpost');?>",
			data:{cardnum:cardid},
			type:'POST',
			success:function(data)
			{
				if(data.status==0)
				{
					
  						location.href="<?php echo U('User/Profile/editaddress');?>";  									
  					
				}else
				{
					message(data.msg);
				}
			}
		})
	})
</script>