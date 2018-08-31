<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
	    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
	    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
		<title>最近健康状况</title>
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
	                    <p>身体良好</p>
	                </div>
	                <div class="weui-cell__hd">
	                    <input type="checkbox" class="weui-check" name="checkbox" id="s11" <?php if($index == 1): ?>checked<?php endif; ?> value="身体良好">
	                    <i class="weui-icon-checked"></i>
	                </div>
	            </label>
				 <label class="weui-cell weui-check__label" for="s10">
	                <div class="weui-cell__bd">
	                    <p>头痛、头晕</p>
	                </div>
	                <div class="weui-cell__hd">
	                    <input type="checkbox" class="weui-check" name="checkbox" id="s10" <?php if($index1 == 1): ?>checked<?php endif; ?> value="头痛、头晕">
	                    <i class="weui-icon-checked"></i>
	                </div>
	            </label>
	            <label class="weui-cell weui-check__label" for="s12">
	                <div class="weui-cell__bd">
	                    <p>心前区疼痛</p>
	                </div>
	                <div class="weui-cell__hd">
	                    <input type="checkbox" class="weui-check" name="checkbox" id="s12" <?php if($index2 == 1): ?>checked<?php endif; ?> value="心前区疼痛">
	                    <i class="weui-icon-checked"></i>
	                </div>
	            </label>
	            <label class="weui-cell weui-check__label" for="s13">
	                <div class="weui-cell__bd">
	                    <p>胃痛</p>
	                </div>
	                <div class="weui-cell__hd">
	                    <input type="checkbox" class="weui-check" name="checkbox" <?php if($index3 == 1): ?>checked<?php endif; ?> id="s13" value="胃痛">
	                    <i class="weui-icon-checked"></i>
	                </div>
	            </label>
	            <label class="weui-cell weui-check__label" for="s14">
	                <div class="weui-cell__bd">
	                    <p>心慌气短、四肢无力</p>
	                </div>
	                <div class="weui-cell__hd">
	                    <input type="checkbox" class="weui-check" name="checkbox" id="s14" <?php if($index4 == 1): ?>checked<?php endif; ?> value="心慌气短、四肢无力">
	                    <i class="weui-icon-checked"></i>
	                </div>
	            </label>
	            <label class="weui-cell weui-check__label" for="s15">
	                <div class="weui-cell__bd">
	                    <p>四肢麻木</p>
	                </div>
	                <div class="weui-cell__hd">
	                    <input type="checkbox" class="weui-check" name="checkbox" id="s15" <?php if($index5 == 1): ?>checked<?php endif; ?> value="四肢麻木">
	                    <i class="weui-icon-checked"></i>
	                </div>
	            </label>
	            <div class="weui-cell">
	                <div class="weui-cell__hd">
	                	<label class="weui-label">体检阳性指标</label>
	                </div>
	                <div class="weui-cell__bd">
	                    <input class="weui-input right zhibiao1" type="text" value="<?php echo ($healthindicators); ?>" placeholder="请输入">
	                </div>
	            </div>
	            <div class="weui-cell">
	                <div class="weui-cell__hd">
	                	<label class="weui-label" style="width: 45px;">其他</label>
	                </div>
	                <div class="weui-cell__bd">
	                    <input class="weui-input right other" type="text" value="<?php echo ($healthelse); ?>" placeholder="请注明">
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
	$('.save').click(function(){
		var state=0;	
		var result ='';	
		$('input[type=checkbox]').each(function(){
			if($(this).is(':checked')){				
				state=1;
				result += $(this).val()+'|';				
				$("#checkboxstr").val(result);
			}			
		})
		
		$('input[type=text]').each(function(){
			if($(this).val().length>0){
				state=1;
			}
		})
		if(state==0){
			message('请选择最近健康状况');
			return false;
		}
		var healthindicators =$(".zhibiao1").val();
		var healthelse =$(".other").val();
		var myhealth =$("#checkboxstr").val();
		$.ajax({
			url:"<?php echo U('User/Profile/editzjjkzkpost');?>",
			data:{healthindicators:healthindicators,healthelse:healthelse,myhealth:myhealth},
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
				result += $(this).val()+'|';				
				$("#checkboxstr").val(result);
			}			
		})
		
		$('input[type=text]').each(function(){
			if($(this).val().length>0){
				state=1;
			}
		})
		if(state==0){
			message('请选择最近健康状况');
			return false;
		}
		var healthindicators =$(".zhibiao1").val();
		var healthelse =$(".other").val();
		var myhealth =$("#checkboxstr").val();
		$.ajax({
			url:"<?php echo U('User/Profile/editzjjkzkpost');?>",
			data:{healthindicators:healthindicators,healthelse:healthelse,myhealth:myhealth},
			type:'POST',
			success:function(data)
			{
				if(data.status==0)
				{
					
  					location.href="<?php echo U('User/Profile/editgzxtjb');?>";  									
  					
				}else
				{
					message(data.msg);
				}
			}
		})
	})
</script>