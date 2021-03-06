<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
	    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
	    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
		<title>心理状况</title>
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
	                    <p>容易紧张、胆小</p>
	                </div>
	                <div class="weui-cell__hd">
	                    <input type="checkbox" class="weui-check" name="checkbox1" id="s11" value="容易紧张、胆小" <?php if($index1 == 1): ?>checked<?php endif; ?>>
	                    <i class="weui-icon-checked"></i>
	                </div>
	            </label>
	            <label class="weui-cell weui-check__label" for="s12">
	                <div class="weui-cell__bd">
	                    <p>容易愤怒、经常因为小事争吵</p>
	                </div>
	                <div class="weui-cell__hd">
	                    <input type="checkbox" class="weui-check" name="checkbox2" id="s12" value="容易愤怒、经常因为小事争吵" <?php if($index2 == 1): ?>checked<?php endif; ?>>
	                    <i class="weui-icon-checked"></i>
	                </div>
	            </label>
	            <label class="weui-cell weui-check__label" for="s13">
	                <div class="weui-cell__bd">
	                    <p>多愁善感、心思敏感</p>
	                </div>
	                <div class="weui-cell__hd">
	                    <input type="checkbox" class="weui-check" name="checkbox3" id="s13" value="多愁善感、心思敏感" <?php if($index3 == 1): ?>checked<?php endif; ?>>
	                    <i class="weui-icon-checked"></i>
	                </div>
	            </label>
	            <label class="weui-cell weui-check__label" for="s14">
	                <div class="weui-cell__bd">
	                    <p>爱生闷气、容易抑郁</p>
	                </div>
	                <div class="weui-cell__hd">
	                    <input type="checkbox" class="weui-check" name="checkbox4" id="s14" value="爱生闷气、容易抑郁" <?php if($index4 == 1): ?>checked<?php endif; ?>>
	                    <i class="weui-icon-checked"></i>
	                </div>
	            </label>
	            <label class="weui-cell weui-check__label" for="s15">
	                <div class="weui-cell__bd">
	                    <p>爱独处、朋友少、无处倾诉</p>
	                </div>
	                <div class="weui-cell__hd">
	                    <input type="checkbox" class="weui-check" name="checkbox5" id="s15" value="爱独处、朋友少、无处倾诉" <?php if($index5 == 1): ?>checked<?php endif; ?>>
	                    <i class="weui-icon-checked"></i>
	                </div>
	            </label>
	            <div class="weui-cell">
	                <div class="weui-cell__hd">
	                	<label class="weui-label" style="width: 45px;">其他</label>
	                </div>
	                <div class="weui-cell__bd">
	                    <input class="weui-input right other" type="text" placeholder="请注明" value="<?php echo ($heartelse); ?>">
	                </div>
	            </div>
	        </div>
			<div class="tips">温馨提示：可多选</div>
	        <div class="pd20">
	        	<input type="hidden" id="checkboxstr" value="">
	        	<a href="javascript:;" class="weui-btn weui-btn_primary save">保存</a>
	        </div>
		</section>
	</body>
</html>
<script>
	$('.save').click(function(){
		var state=0;
		var result='';
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
			message('请完善饮食习惯');
			return false;
		}
		var heartstr =$("#checkboxstr").val();
		var heartelse =$(".other").val();
		$.ajax({
			url:"<?php echo U('User/Profile/editxlzkpost');?>",
			data:{psychologicstatus:heartstr,heartelse:heartelse},
			type:'POST',
			success:function(data)
			{
				if(data.status==0)
				{
					
  						location.href=data.url;  									
  					
				}else
				{
					message(data.msg);
				}
			}
		})
	})
	
</script>