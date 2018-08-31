<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
	    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
	    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
		<title>性别</title>
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
			<div class="weui-cells weui-cells_checkbox">
	            <label class="weui-cell weui-check__label" for="s11">
	                <div class="weui-cell__bd">
	                    <p>男</p>
	                </div>
	                <div class="weui-cell__hd">
	                    <input type="radio" class="weui-check" name="checkbox1" <?php if($sex == '男'): ?>checked<?php endif; ?> id="s11" value="男">
	                    <i class="weui-icon-checked"></i>
	                </div>
	            </label>
	            <label class="weui-cell weui-check__label" for="s12">
	                <div class="weui-cell__bd">
	                    <p>女</p>
	                </div>
	                <div class="weui-cell__hd">
	                    <input type="radio" name="checkbox1" class="weui-check" <?php if($sex == '女'): ?>checked<?php endif; ?> id="s12" value="女">
	                    <i class="weui-icon-checked"></i>
	                </div>
	            </label>
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
		var state=0
		$('input[type=radio]').each(function(){
			if($(this).is(':checked')){
				state=1;
			}
		})
		if(state==0){
			message('请选择性别');
			return false;
		}
		var sex=$("input[name='checkbox1']:checked").val();
		$.ajax({
			url:"<?php echo U('User/Profile/editsexpost');?>",
			data:{sex:sex},
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
		var state=0
		$('input[type=radio]').each(function(){
			if($(this).is(':checked')){
				state=1;
			}
		})
		if(state==0){
			message('请选择性别');
			return false;
		}
		var sex=$("input[name='checkbox1']:checked").val();
		$.ajax({
			url:"<?php echo U('User/Profile/editsexpost');?>",
			data:{sex:sex},
			type:'POST',
			success:function(data)
			{
				if(data.status==0)
				{
					
  						location.href="<?php echo U('User/Profile/editheight');?>";  									
  					
				}else
				{
					message(data.msg);
				}
			}
		})
	})
</script>