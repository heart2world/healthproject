<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
	    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
	    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
		<title>女性生育史</title>
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
	                    <p>无</p>
	                </div>
	                <div class="weui-cell__hd">
	                    <input type="checkbox" class="weui-check nothing" name="checkbox1" id="s11" value="无" <?php if($index == 1): ?>checked<?php endif; ?>>
	                    <i class="weui-icon-checked"></i>
	                </div>
	            </label>
	            <div class="weui-cell">
	                <div class="weui-cell__hd">
	                	<label class="weui-label">流产史</label>
	                </div>
	                <div class="weui-cell__bd">
	                    <input class="weui-input right other" type="number" placeholder="请输入次数" id="liuchansn" value="<?php echo ($info["liuchansn"]); ?>">
	                </div>
	            </div>
	            <div class="weui-cell">
	                <div class="weui-cell__hd">
	                	<label class="weui-label">怀孕史</label>
	                </div>
	                <div class="weui-cell__bd">
	                    <input class="weui-input right other" type="number" placeholder="请输入次数" id="hysn" value="<?php echo ($info["hysn"]); ?>">
	                </div>
	            </div>
	            <div class="weui-cell">
	                <div class="weui-cell__hd">
	                	<label class="weui-label">生产史</label>
	                </div>
	                <div class="weui-cell__bd">
	                    <input class="weui-input right other" type="number" placeholder="请输入次数" id="scsn" value="<?php echo ($info["scsn"]); ?>">
	                </div>
	            </div>
	            <div class="weui-cell">
	                <div class="weui-cell__hd">
	                	<label class="weui-label">生产方式</label>
	                </div>
	                <div class="weui-cell__bd">
	                    <input class="weui-input right other" type="text" placeholder="请输入顺产或剖腹" id="scmethod" value="<?php echo ($info["scmethod"]); ?>">
	                </div>
	            </div>
	            <div class="weui-cell">
	                <div class="weui-cell__hd">
	                	<label class="weui-label">宫外孕史</label>
	                </div>
	                <div class="weui-cell__bd">
	                    <input class="weui-input right other" type="number" placeholder="请输入次数" id="gwysn" value="<?php echo ($info["gwysn"]); ?>">
	                </div>
	            </div>
	            <div class="weui-cell">
	                <div class="weui-cell__hd">
	                	<label class="weui-label">绝经年龄</label>
	                </div>
	                <div class="weui-cell__bd">
	                    <input class="weui-input right other" type="number" placeholder="请输入年龄" id="jyyear" value="<?php echo ($info["jyyear"]); ?>">
	                </div>
	            </div>
	            <div class="weui-cell">
	                <div class="weui-cell__hd">
	                	<label class="weui-label" style="width: 45px;">其他</label>
	                </div>
	                <div class="weui-cell__bd">
	                    <input class="weui-input right other" type="text" placeholder="请注明" id="elsedesc" value="<?php echo ($info["elsedesc"]); ?>">
	                </div>
	            </div>
	        </div>
	        <div class="pd20 actionBtn">
	        	<input type="hidden" id="checkboxstr" value="">
	        	<a href="javascript:;" class="weui-btn weui-btn_primary save">保存</a>
	        	<a href="javascript:;" class="weui-btn weui-btn_primary next">下一步</a>
	        </div>
		</section>
	</body>
</html>
<script>
$(function(){
	
	
	if($('.nothing').is(':checked')){
		state=0;
		$('input[type=text]').each(function(){
			$(this).attr('readonly',true).val('');
			$(this).parents('.weui-cell').find('.weui-label').css('color','#ccc');
		})
		$('input[type=number]').each(function(){
			$(this).attr('readonly',true).val('');
			$(this).parents('.weui-cell').find('.weui-label').css('color','#ccc');
		})
		$("#checkboxstr").val('无');
	}
	$('.save').click(function(){
		var state=0;
		$('input[type=checkbox]').each(function(){
			if($(this).is(':checked')){
				state=1;
			}
		})
		$('input[type=text]').each(function(){
			if($(this).val().length>1){
				state=1;
			}
		})
		if(state==0){
			message('请选择女性生育史');
			return false;
		}
		var myhealth =$("#checkboxstr").val();
		var liuchansn =$("#liuchansn").val();
		var hysn =$("#hysn").val();
		var scsn =$("#scsn").val();
		var scmethod =$("#scmethod").val();
		var gwysn =$("#gwysn").val();
		var jyyear =$("#jyyear").val();
		var elsedesc =$("#elsedesc").val();
		$.ajax({
			url:"<?php echo U('User/Profile/editnxsyspost');?>",
			data:{womenbirth:myhealth,liuchansn:liuchansn,hysn:hysn,scsn:scsn,scmethod:scmethod,gwysn:gwysn,jyyear:jyyear,elsedesc:elsedesc},
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
		var state=0;
		$('input[type=checkbox]').each(function(){
			if($(this).is(':checked')){
				state=1;
			}
		})
		$('input[type=text]').each(function(){
			if($(this).val().length>1){
				state=1;
			}
		})
		if(state==0){
			message('请选择女性生育史');
			return false;
		}
		var myhealth =$("#checkboxstr").val();
		var liuchansn =$("#liuchansn").val();
		var hysn =$("#hysn").val();
		var scsn =$("#scsn").val();
		var scmethod =$("#scmethod").val();
		var gwysn =$("#gwysn").val();
		var jyyear =$("#jyyear").val();
		var elsedesc =$("#elsedesc").val();
		$.ajax({
			url:"<?php echo U('User/Profile/editnxsyspost');?>",
			data:{womenbirth:myhealth,liuchansn:liuchansn,hysn:hysn,scsn:scsn,scmethod:scmethod,gwysn:gwysn,jyyear:jyyear,elsedesc:elsedesc},
			type:'POST',
			success:function(data)
			{
				if(data.status==0)
				{
					
  						location.href="<?php echo U('User/Profile/editwdsmqk');?>";  									
  					
				}else
				{
					message(data.msg);
				}
			}
		})
	})
	var state=1;
	$('.nothing').change(function(){
		console.log(111);
		if($(this).is(':checked')){
			state=0;
			$('input[type=text]').each(function(){
				$(this).attr('readonly',true).val('');
				$(this).parents('.weui-cell').find('.weui-label').css('color','#ccc');
			})
			$('input[type=number]').each(function(){
				$(this).attr('readonly',true).val('');
				$(this).parents('.weui-cell').find('.weui-label').css('color','#ccc');
			})
			$("#checkboxstr").val('无');
		}
		else{
			state=1;
			$('input[type=text]').attr('readonly',false).parents('.weui-cell').find('.weui-label').css('color','#464646');
			$('input[type=number]').attr('readonly',false).parents('.weui-cell').find('.weui-label').css('color','#464646');
			$("#checkboxstr").val('');
		}
	})
})
	
</script>