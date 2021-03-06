<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
	    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
	    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
		<title>饮酒习惯</title>
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
	                    <p>从不饮酒</p>
	                </div>
	                <div class="weui-cell__hd">
	                    <input type="radio" class="weui-check" name="checkbox1" id="s11" value="从不饮酒" <?php if($drinkstyle == '从不饮酒'): ?>checked<?php endif; ?>>
	                    <i class="weui-icon-checked"></i>
	                </div>
	            </label>
	            <label class="weui-cell weui-check__label" for="s12">
	                <div class="weui-cell__bd">
	                    <p>偶尔饮酒</p>
	                </div>
	                <div class="weui-cell__hd">
	                    <input type="radio" name="checkbox1" class="weui-check" id="s12" value="偶尔饮酒" <?php if($drinkstyle == '偶尔饮酒'): ?>checked<?php endif; ?>>
	                    <i class="weui-icon-checked"></i>
	                </div>
	            </label>
	            <label class="weui-cell weui-check__label" for="s13">
	                <div class="weui-cell__bd">
	                    <p>应酬喝酒，经常喝醉</p>
	                </div>
	                <div class="weui-cell__hd">
	                    <input type="radio" name="checkbox1" class="weui-check" id="s13" value="应酬喝酒，经常喝醉" <?php if($drinkstyle == '应酬喝酒，经常喝醉'): ?>checked<?php endif; ?>>
	                    <i class="weui-icon-checked"></i>
	                </div>
	            </label>
	            <label class="weui-cell weui-check__label" for="s14">
	                <div class="weui-cell__bd">
	                    <p>长期饮酒</p>
	                </div>
	                <div class="weui-cell__hd">
	                    <input type="radio" name="checkbox1" class="weui-check longJiu" id="s14" value="长期饮酒" <?php if($drinkstyle == '长期饮酒'): ?>checked<?php endif; ?>>
	                    <i class="weui-icon-checked"></i>
	                </div>
	            </label>
	            <div class="weui-cell">
	                <div class="weui-cell__hd">
	                	<label class="weui-label" <?php if($drinkstyle != '长期饮酒'): ?>style="color: #ccc;"<?php endif; ?>>每日（ml）</label>
	                </div>
	                <div class="weui-cell__bd">
	                    <input class="weui-input right jiu" type="text"  placeholder="请输入" id="predaydrink" value="<?php echo ($predaydrink); ?>" <?php if($drinkstyle != '长期饮酒'): ?>readonly<?php endif; ?>>
	                </div>
	            </div>
	            <div class="weui-cell">
	                <div class="weui-cell__hd">
	                	<label class="weui-label" <?php if($drinkstyle != '长期饮酒'): ?>style="color: #ccc;"<?php endif; ?>>已饮（年）</label>
	                </div>
	                <div class="weui-cell__bd">
	                    <input class="weui-input right jiu" type="text" placeholder="请输入" id="drinkyear" value="<?php echo ($drinkyear); ?>" <?php if($drinkstyle != '长期饮酒'): ?>readonly<?php endif; ?>>
	                </div>
	            </div>
	            <div class="weui-cell">
	                <div class="weui-cell__hd">
	                	<label class="weui-label" style="width: 45px;">其他</label>
	                </div>
	                <div class="weui-cell__bd">
	                    <input class="weui-input right other" type="text" placeholder="请注明" id="drinkelse" value="<?php echo ($drinkelse); ?>">
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
			message('请完善饮酒习惯');
			return false;
		}		
		var myhealth =$("#checkboxstr").val();
		var predaydrink =$("#predaydrink").val();
		var drinkyear =$("#drinkyear").val();
		var drinkelse =$("#drinkelse").val();
		$.ajax({
			url:"<?php echo U('User/Profile/edityjxgpost');?>",
			data:{drinkstyle:myhealth,drinkelse:drinkelse,drinkyear:drinkyear,predaydrink:predaydrink},
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
			message('请完善饮酒习惯');
			return false;
		}		
		var myhealth =$("#checkboxstr").val();
		var predaydrink =$("#predaydrink").val();
		var drinkyear =$("#drinkyear").val();
		var drinkelse =$("#drinkelse").val();
		$.ajax({
			url:"<?php echo U('User/Profile/edityjxgpost');?>",
			data:{drinkstyle:myhealth,drinkelse:drinkelse,drinkyear:drinkyear,predaydrink:predaydrink},
			type:'POST',
			success:function(data)
			{
				if(data.status==0)
				{
					
  					location.href="<?php echo U('User/Profile/editydqk');?>";  									
  					
				}else
				{
					message(data.msg);
				}
			}
		})
	})
	$('input[type=radio]').change(function(){
		if($('.longJiu').is(':checked')){
			$('.jiu').attr('readonly',false).val('').parents('.weui-cell').find('.weui-label').css('color','#464646');
		}
		else{
			$('.jiu').attr('readonly',true).val('').parents('.weui-cell').find('.weui-label').css('color','#ccc');
		}
	})
	
</script>