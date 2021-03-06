<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
	    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
	    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
		<title>吸烟习惯</title>
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
	                    <p>从不吸烟</p>
	                </div>
	                <div class="weui-cell__hd">
	                    <input type="radio" class="weui-check" name="checkbox1" id="s11" value="从不吸烟" <?php if($smokeing == '从不吸烟'): ?>checked<?php endif; ?>>
	                    <i class="weui-icon-checked"></i>
	                </div>
	            </label>
	            <label class="weui-cell weui-check__label" for="s12">
	                <div class="weui-cell__bd">
	                    <p>被动吸烟</p>
	                </div>
	                <div class="weui-cell__hd">
	                    <input type="radio" name="checkbox1" class="weui-check" id="s12" value="被动吸烟" <?php if($smokeing == '被动吸烟'): ?>checked<?php endif; ?>>
	                    <i class="weui-icon-checked"></i>
	                </div>
	            </label>
	            <label class="weui-cell weui-check__label" for="s13">
	                <div class="weui-cell__bd">
	                    <p>长期吸烟</p>
	                </div>
	                <div class="weui-cell__hd">
	                    <input type="radio" name="checkbox1" class="weui-check longYan" id="s13" value="长期吸烟" <?php if($smokeing == '长期吸烟'): ?>checked<?php endif; ?>>
	                    <i class="weui-icon-checked"></i>
	                </div>
	            </label>
	            <div class="weui-cell">
	                <div class="weui-cell__hd">
	                	<label class="weui-label" <?php if($smokeing != '长期吸烟'): ?>style="color: #ccc;"<?php endif; ?>>每日（根）</label>
	                </div>
	                <div class="weui-cell__bd">
	                    <input class="weui-input right yan" type="number"   placeholder="请输入" id="predaysmoke" value="<?php echo ($predaysmoke); ?>" <?php if($smokeing != '长期吸烟'): ?>readonly<?php endif; ?>>
	                </div>
	            </div>
	            <div class="weui-cell">
	                <div class="weui-cell__hd">
	                	<label class="weui-label" <?php if($smokeing != '长期吸烟'): ?>style="color: #ccc;"<?php endif; ?>>已抽（年）</label>
	                </div>
	                <div class="weui-cell__bd">
	                    <input class="weui-input right yan" type="number"  placeholder="请输入" id="smokeyear" value="<?php echo ($smokeyear); ?>" <?php if($smokeing != '长期吸烟'): ?>readonly<?php endif; ?>>
	                </div>
	            </div>
	            <div class="weui-cell">
	                <div class="weui-cell__hd">
	                	<label class="weui-label" style="width: 45px;">其他</label>
	                </div>
	                <div class="weui-cell__bd">
	                    <input class="weui-input right other" type="text" placeholder="请注明" id="smokeelse" value="<?php echo ($smokeelse); ?>">
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

	if($('.longYan').is(':checked')){
		$('.yan').attr('readonly',false).val('').parents('.weui-cell').find('.weui-label').css('color','#464646');
	}
	$('.save').click(function(){
		var state=0
		$('input[type=radio]').each(function(){
			if($(this).is(':checked')){
				state=1;
				$("#checkboxstr").val($(this).val());
			}
		})
		$('input[type=number]').each(function(){
			if($(this).val().length>0&&$(this).val().length<2){
				state=1;
			}
			if($(this).val().length>2){
				state=2;
			}
		})
		if(state==2){
			message('请输入合理数据');
			return false;
		}
		if(state==0){
			message('请完善吸烟习惯');
			return false;
		}		
		var myhealth =$("#checkboxstr").val();
		var predaysmoke =$("#predaysmoke").val();
		var smokeyear =$("#smokeyear").val();
		var lifeelse =$("#smokeelse").val();
		$.ajax({
			url:"<?php echo U('User/Profile/editxyxgpost');?>",
			data:{smokeing:myhealth,smokeelse:lifeelse,smokeyear:smokeyear,predaysmoke:predaysmoke},
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
		$('input[type=number]').each(function(){
			if($(this).val().length>0&&$(this).val().length<2){
				state=1;
			}
			if($(this).val().length>2){
				state=2;
			}
		})
		if(state==2){
			message('请输入合理数据');
			return false;
		}
		if(state==0){
			message('请完善吸烟习惯');
			return false;
		}		
		var myhealth =$("#checkboxstr").val();
		var predaysmoke =$("#predaysmoke").val();
		var smokeyear =$("#smokeyear").val();
		var lifeelse =$("#smokeelse").val();
		$.ajax({
			url:"<?php echo U('User/Profile/editxyxgpost');?>",
			data:{smokeing:myhealth,smokeelse:lifeelse,smokeyear:smokeyear,predaysmoke:predaysmoke},
			type:'POST',
			success:function(data)
			{
				if(data.status==0)
				{
					
  						location.href="<?php echo U('User/Profile/edityjxg');?>";  									
  					
				}else
				{
					message(data.msg);
				}
			}
		})
	})
	$('input[type=radio]').change(function(){
		if($('.longYan').is(':checked')){
			$('.yan').attr('readonly',false).val('').parents('.weui-cell').find('.weui-label').css('color','#464646');
		}
		else{
			$('.yan').attr('readonly',true).val('').parents('.weui-cell').find('.weui-label').css('color','#ccc');
		}
	})
	
})
</script>