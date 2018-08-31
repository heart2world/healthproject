<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
	    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
	    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
		<title>运动情况</title>
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
	                    <p>几乎很少运动</p>
	                </div>
	                <div class="weui-cell__hd">
	                    <input type="radio" class="weui-check little" name="checkbox1" id="s11" value="几乎很少运动" <?php if($movement == '几乎很少运动'): ?>checked<?php endif; ?>>
	                    <i class="weui-icon-checked"></i>
	                </div>
	            </label>
	            <label class="weui-cell weui-check__label" for="s12">
	                <div class="weui-cell__bd">
	                    <p>常年坚持运动</p>
	                </div>
	                <div class="weui-cell__hd">
	                    <input type="radio" name="checkbox1" class="weui-check" id="s12" value="常年坚持运动" <?php if($movement == '常年坚持运动'): ?>checked<?php endif; ?>>
	                    <i class="weui-icon-checked"></i>
	                </div>
	            </label>
	            <label class="weui-cell weui-check__label" for="s13">
	                <div class="weui-cell__bd">
	                    <p>偶尔运动，散步</p>
	                </div>
	                <div class="weui-cell__hd">
	                    <input type="radio" name="checkbox1" class="weui-check" id="s13" value="偶尔运动，散步" <?php if($movement == '偶尔运动，散步'): ?>checked<?php endif; ?>>
	                    <i class="weui-icon-checked"></i>
	                </div>
	            </label>
	            <label class="weui-cell weui-check__label" for="s14">
	                <div class="weui-cell__bd">
	                    <p>最近几年很少运动</p>
	                </div>
	                <div class="weui-cell__hd">
	                    <input type="radio" name="checkbox1" class="weui-check little" id="s14" value="最近几年很少运动" <?php if($movement == '最近几年很少运动'): ?>checked<?php endif; ?>>
	                    <i class="weui-icon-checked"></i>
	                </div>
	            </label>
	            <div class="weui-cell">
	                <div class="weui-cell__hd">
	                	<label class="weui-label" <?php if($movement == '几乎很少运动' || $movement == '最近几年很少运动'): ?>style="color: #ccc;"<?php endif; ?>>运动方式</label>
	                </div>
	                <div class="weui-cell__bd">
	                    <input class="weui-input right way" type="text" placeholder="请输入" id="moveelse" value="<?php echo ($moveelse); ?>" <?php if($movement == '几乎很少运动' || $movement == '最近几年很少运动'): ?>readonly<?php endif; ?> >
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
	$('.save').click(function(){
		var state=0
		$('input[type=radio]').each(function(){
			if($(this).is(':checked')){
				state=1;
				$("#checkboxstr").val($(this).val());
			}
		})
		$('input[type=text]').each(function(){
			if($(this).val().length>0){
				state=1;
			}
		})
		if(state==0){
			message('请完善运动习惯');
			return false;
		}		
		var movement =$("#checkboxstr").val();
		var moveelse =$("#moveelse").val();
		$.ajax({
			url:"<?php echo U('User/Profile/editydqkpost');?>",
			data:{movement:movement,moveelse:moveelse},
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
				$("#checkboxstr").val($(this).val());
			}
		})
		$('input[type=text]').each(function(){
			if($(this).val().length>0){
				state=1;
			}
		})
		if(state==0){
			message('请完善运动习惯');
			return false;
		}		
		var movement =$("#checkboxstr").val();
		var moveelse =$("#moveelse").val();
		$.ajax({
			url:"<?php echo U('User/Profile/editydqkpost');?>",
			data:{movement:movement,moveelse:moveelse},
			type:'POST',
			success:function(data)
			{
				if(data.status==0)
				{
					
  						location.href="<?php echo U('User/Profile/editysxg');?>";  									
  					
				}else
				{
					message(data.msg);
				}
			}
		})
	})
	$('input[type=radio]').change(function(){
		if($('.little').is(':checked')){
			$('.way').attr('readonly',true).val('').parents('.weui-cell').find('.weui-label').css('color','#ccc');
		}
		else{
			$('.way').attr('readonly',false).parents('.weui-cell').find('.weui-label').css('color','#464646');
		}
	})
	
</script>