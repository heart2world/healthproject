<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
	    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
	    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
		<title>过敏史</title>
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
	            <label class="weui-cell weui-check__label" for="s12">
	                <div class="weui-cell__bd">
	                    <p>青霉素</p>
	                </div>
	                <div class="weui-cell__hd">
	                    <input type="checkbox" class="weui-check" name="checkbox1" id="s12" value="青霉素" <?php if($index1 == 1): ?>checked<?php endif; ?>>
	                    <i class="weui-icon-checked"></i>
	                </div>
	            </label>
	            <label class="weui-cell weui-check__label" for="s13">
	                <div class="weui-cell__bd">
	                    <p>磺胺类</p>
	                </div>
	                <div class="weui-cell__hd">
	                    <input type="checkbox" class="weui-check" name="checkbox1" id="s13" value="磺胺类" <?php if($index2 == 1): ?>checked<?php endif; ?>>
	                    <i class="weui-icon-checked"></i>
	                </div>
	            </label>
	            <label class="weui-cell weui-check__label" for="s14">
	                <div class="weui-cell__bd">
	                    <p>链霉类</p>
	                </div>
	                <div class="weui-cell__hd">
	                    <input type="checkbox" class="weui-check" name="checkbox1" id="s14" value="链霉类" <?php if($index3 == 1): ?>checked<?php endif; ?>>
	                    <i class="weui-icon-checked"></i>
	                </div>
	            </label>
	            <div class="weui-cell">
	                <div class="weui-cell__hd">
	                	<label class="weui-label" style="width: 45px;">其他</label>
	                </div>
	                <div class="weui-cell__bd">
	                    <input class="weui-input right other" type="text" placeholder="请注明" value="<?php echo ($anaphylaxiselse); ?>">
	                </div>
	            </div>
	        </div>
			<div class="tips">温馨提示：可多选</div>
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
	if($(this).is(':checked')){
		state=0;
		$('input[type=checkbox]').each(function(){
			if(!$(this).hasClass('nothing')){
				$(this).attr({'disabled':true,'checked':false});
				$(this).parents('label').find('p').css('color','#ccc');
			}
		})
		$("#checkboxstr").val('无');
	}
	$('.save').click(function(){
		var state=0;
		var result ='';
		$('input[type=checkbox]').each(function(){
			if($(this).is(':checked')){
				state=1;
				if(!$(this).hasClass('nothing'))
				{
					result += $(this).val()+'|';				
					$("#checkboxstr").val(result);
				}	
			}
		})
		$('input[type=text]').each(function(){
			if($(this).val().length>1){
				state=1;
			}
		})
		if(state==0){
			message('请选择过敏史');
			return false;
		}
		var myhealth =$("#checkboxstr").val();
		var anaphylaxiselse =$(".other").val();
		$.ajax({
			url:"<?php echo U('User/Profile/editgmspost');?>",
			data:{anaphylaxis:myhealth,anaphylaxiselse:anaphylaxiselse},
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
		var result ='';
		$('input[type=checkbox]').each(function(){
			if($(this).is(':checked')){
				state=1;
				if(!$(this).hasClass('nothing'))
				{
					result += $(this).val()+'|';				
					$("#checkboxstr").val(result);
				}	
			}
		})
		$('input[type=text]').each(function(){
			if($(this).val().length>1){
				state=1;
			}
		})
		if(state==0){
			message('请选择过敏史');
			return false;
		}
		var myhealth =$("#checkboxstr").val();
		var anaphylaxiselse =$(".other").val();
		$.ajax({
			url:"<?php echo U('User/Profile/editgmspost');?>",
			data:{anaphylaxis:myhealth,anaphylaxiselse:anaphylaxiselse},
			type:'POST',
			success:function(data)
			{
				if(data.status==0)
				{
					
  						location.href="<?php echo U('User/Profile/editnxsys');?>";  									
  					
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
			$('input[type=checkbox]').each(function(){
				if(!$(this).hasClass('nothing')){
					$(this).attr({'disabled':true,'checked':false});
					$(this).parents('label').find('p').css('color','#ccc');
				}
			})
			$("#checkboxstr").val('无');
		}
		else{
			state=1;
			$('input[type=checkbox]').attr('disabled',false).parents('label').find('p').css('color','#464646');
			$("#checkboxstr").val('');
		}
	})
})
	
</script>