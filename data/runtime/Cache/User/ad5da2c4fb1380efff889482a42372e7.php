<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
	    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
	    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
		<title>手术史</title>
	    <link rel="stylesheet" href="/public/app/lib/weui/jquery-weui.css" />
	    <link rel="stylesheet" href="/public/app/lib/weui/weui.min.css" />
	    <link rel="stylesheet" href="/public/app/css/public.css" />
	    <link rel="stylesheet" href="/public/app/css/style.css" />
	    <script type="text/javascript" src="/public/app/lib/jq/jquery-1.10.2.js" ></script>
	    <script type="text/javascript" src="/public/app/lib/weui/jquery-weui.js" ></script>
	    <script type="text/javascript" src="/public/app/js/common.js" ></script>
	</head>
	<style>
		input{
			text-align: right;
		}
		.add{
			color: #4fbbc5;
			padding: 20px;
			text-align: center;
			font-size: 1.3rem;
		}
		
		input[type="date"]:before{
			content: attr(placeholder);
			color:#aaa;
		}
		input[type="date"].full:before{
			content: attr();
			color:#fff;
			display:none
		}
	</style>
	<body>
		<section class="contentSec shoushuSec">
			<form method="post" id="tagforms" enctype="multipart/form-data">
			<div class="weui-cells weui-cells_checkbox">
	            <label class="weui-cell weui-check__label" for="s11">
	                <div class="weui-cell__bd">
	                    <p>无</p>
	                </div>
	                <div class="weui-cell__hd">
	                    <input type="checkbox" class="weui-check nothing" name="checkbox1" id="s11" value="无" <?php if($historysurgery == '无'): ?>checked<?php endif; ?>>
	                    <i class="weui-icon-checked"></i>
	                </div>
	            </label>
	        </div>	        
	        <ul class="sssBox">
	        	<?php if(count($list) > 0): if(is_array($list)): $key = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($key % 2 );++$key;?><li data-num="<?php echo ($key); ?>">
		        	<p class="tit">手术史<?php echo ($va["anumber"]); ?>		        		
		        		<span class="del" onclick="del(this);">删除</span>		        		
		        	</p>
		        	<div class="weui-cells weui-cells_form">
			            <div class="weui-cell">
			                <div class="weui-cell__hd">
			                	<label class="weui-label">手术名称</label>
			                </div>
			                <div class="weui-cell__bd">
			                    <input class="weui-input" type="text" name="surgeryname[]" placeholder="请输入手术名称" value="<?php echo ($va["surgeryname"]); ?>">
			                </div>
			            </div>
			            <div class="weui-cell">
			                <div class="weui-cell__hd" style="-webkit-box-flex: 1; -webkit-flex: 1; flex: 1">
			                	<label for="" class="weui-label">手术时间</label>
			                </div>
			                <div class="weui-cell__bd" style="-webkit-box-flex: none; -webkit-flex: none; flex: none;margin-right:-22px">
			                    <input class="weui-input" type="date" name="surgerytime[]" value="<?php echo ($va["surgerytime"]); ?>">
			                </div>
			            </div>
						
			            <div class="weui-cell">
			                <div class="weui-cell__hd">
			                	<label class="weui-label">其他</label>
			                </div>
			                <div class="weui-cell__bd">
			                    <input class="weui-input other" type="text" name="surgeryelse[]" placeholder="请注明" value="<?php echo ($va["surgeryelse"]); ?>">
			                </div>
			            </div>
						
			        </div>
			        </li><?php endforeach; endif; else: echo "" ;endif; ?>
			    <?php else: ?>
			    <div>
		        	<p class="tit">手术史一</p>
		        	<div class="weui-cells weui-cells_form">
			            <div class="weui-cell">
			                <div class="weui-cell__hd">
			                	<label class="weui-label" <?php if($historysurgery == '无'): ?>style="color:#ccc;"<?php endif; ?>>手术名称</label>
			                </div>
			                <div class="weui-cell__bd">
			                    <input class="weui-input" type="text" name="surgeryname[]" placeholder="请输入手术名称" value="" <?php if($historysurgery == '无'): ?>readonly<?php endif; ?>>
			                </div>
			            </div>
			            <div class="weui-cell">
			                <div class="weui-cell__hd" style="-webkit-box-flex: 1; -webkit-flex: 1; flex: 1;>
			                	<label for="" class="weui-label" <?php if($historysurgery == '无'): ?>style="color:#ccc;"<?php endif; ?>>手术时间</label>
			                </div>
			                <div class="weui-cell__bd" style="-webkit-box-flex: none; -webkit-flex: none; flex: none;margin-right:-22px">
			                    <input class="weui-input" type="date"  placeholder="年/月/日" name="surgerytime[]" value="" <?php if($historysurgery == '无'): ?>readonly<?php endif; ?>>
			                </div>
			            </div>
			            <div class="weui-cell">
			                <div class="weui-cell__hd">
			                	<label class="weui-label" <?php if($historysurgery == '无'): ?>style="color:#ccc;"<?php endif; ?>>其他</label>
			                </div>
			                <div class="weui-cell__bd">
			                    <input class="weui-input other" type="text" name="surgeryelse[]" placeholder="请注明" value="" <?php if($historysurgery == '无'): ?>readonly<?php endif; ?>>
			                </div>
			            </div>
			        </div>
			    </div><?php endif; ?>
	        </ul>
	        <div class="add">添加手术史</div>
	        <div class="pd20 actionBtn">
	        	<input type="hidden" name="historysurgery" id="checkboxstr" value="">
				<input type="hidden" name="atype" value="0">
	        	<a href="javascript:void(0);" class="weui-btn weui-btn_primary save">保存</a>
	        	<a href="javascript:;" class="weui-btn weui-btn_primary next">下一步</a>
	        </div>
	        </form>
		</section>
	</body>
</html>
<script>

	var num=['一','二','三','四','五','六','七','八','九'];
	var con=['十','百','千'];
//删除
function del(obj){
	$(obj).parents('li').remove();
	console.log($('.sssBox li').length);
	$('.sssBox li').each(function(){
		var oldCount=$(this).attr('data-num');
		$(this).attr('data-num',oldCount-1);
	})
	change();
}
//重新排序
function change(){
	var len=$('.sssBox li').length;
	$('.sssBox li').each(function(){
		var index=JSON.stringify($(this).index()+1);
		var arr=index.split('');
		var chin='';
		if(arr.length==1){   //一位数
			chin=num[arr[0]-1];
		}
		else if(arr.length==2){   //两位数
			if(data<20){
				chin=con[0]+(data==10?'':num[arr[1]-1]);
			}
			else if(data==20){
				chin=num[arr[0]-1]+con[0];
			}
			else{
				chin=num[arr[0]-1]+con[0]+num[arr[1]-1];
			}
		}
		console.log(chin);
		$(this).find('.tit').html('手术史'+chin+'<span class="del" onclick=\'del(this);\'>删除</span>');
	})

}
function changeFn(obj){
	var dateval=$(obj).val();
	if(dateval.length>0){
		$(obj).addClass('full');
	}
}
$(function(){
	$('input[type=date]').change(function(){
		var dateval=$(this).val();
		if(dateval.length>0){
			$(this).addClass('full');
		}
	})
	if($(this).is(':checked')){
		state=0;
		$('input[type=text]').each(function(){
			if(!$(this).hasClass('nothing')){
				$(this).attr('readonly',true).val('');
				$(this).parents('.weui-cell').find('label').css('color','#ccc');
			}
		})
			$('input[type=date]').attr('readonly',true).val('').css('color','#ccc').parents('.weui-cell').find('label').css('color','#ccc');
		$("#checkboxstr").val('无');
	}
	$('.save').click(function(){
		if(state==0){   //选择无
				$.ajax({
					url:"<?php echo U('User/Profile/editssspost');?>",
					data:{historysurgery:'无',atype:1},
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
		}
		else{			
			var tagvals=$('#tagforms').serialize();	
			$.ajax({
				url:"<?php echo U('User/Profile/editssspost');?>",
				data:tagvals,
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
		}
	})
	$('.next').click(function(){
		if(state==0){   //选择无
				$.ajax({
					url:"<?php echo U('User/Profile/editssspost');?>",
					data:{historysurgery:'无',atype:1},
					type:'POST',
					success:function(data)
					{
						if(data.status==0)
						{
							
		  						location.href="<?php echo U('User/Profile/edityys');?>";  									
		  					
						}else
						{
							message(data.msg);
						}
					}
				})
		}
		else{			
			var tagvals=$('#tagforms').serialize();	
			$.ajax({
				url:"<?php echo U('User/Profile/editssspost');?>",
				data:tagvals,
				type:'POST',
				success:function(data)
				{
					if(data.status==0)
					{
						
							location.href="<?php echo U('User/Profile/edityys');?>";  									
						
					}else
					{
						message(data.msg);
					}
				}
			})			
		}
	})
	var state=1;
	$('.nothing').change(function(){
		if($(this).is(':checked')){
			state=0;
			$('input[type=text]').each(function(){
				if(!$(this).hasClass('nothing')){
					$(this).attr('readonly',true).css('color','#ccc');
					$(this).parents('.weui-cell').find('label').css('color','#ccc');
				}
			})
				$('input[type=date]').attr('readonly',true).css('color','#ccc').parents('.weui-cell').find('label').css('color','#ccc');
			$("#checkboxstr").val('无');
		}
		else{
			state=1;
			$('input[type=text]').attr('readonly',false).css('color','#464646').parents('.weui-cell').find('label').css('color','#464646');
			$('input[type=date]').attr('readonly',false).css('color','#464646').parents('.weui-cell').find('label').css('color','#464646');
			$("#checkboxstr").val('');
		}
	})
	
	//添加手术史
	$('.add').click(function(){
		if(state==0){   //当前选择了无
			message('您已选择无手术史');
			return false;
		}
		var count=$('.sssBox').children().length+1;
		if(count>20){
			message('最多添加20个手术');
			return false;
		}
		var arr=JSON.stringify(count).split('');
		var chin='';
		if(arr.length==1){   //一位数
			chin=num[arr[0]-1];
		}
		else if(arr.length==2){   //两位数
			if(count<20){
				chin=con[0]+(count==10?'':num[arr[1]-1]);
			}
			else if(count==20){
				chin=num[arr[0]-1]+con[0];
			}
			else{
				chin=num[arr[0]-1]+con[0]+num[arr[1]-1];
			}
		}
		
		$('.sssBox').append('<li data-num="'+count+'"><p class="tit">手术史'+chin+'<span class="del" onclick=\'del(this);\'>删除</span></p><div class="weui-cells weui-cells_form"><div class="weui-cell"><div class="weui-cell__hd"><label class="weui-label">手术名称</label></div><div class="weui-cell__bd"><input class="weui-input" type="text" name="surgeryname[]" value="" placeholder="请输入手术名称"></div></div><div class="weui-cell"><div class="weui-cell__hd" style="-webkit-box-flex: 1; -webkit-flex: 1; flex: 1;><label for="" class="weui-label">手术时间</label></div><div class="weui-cell__bd" style="-webkit-box-flex: none; -webkit-flex: none; flex: none;margin-right:-22px"><input class="weui-input" onchange="changeFn(this);" placeholder="年/月/日" type="date" name="surgerytime[]" value=""></div></div><div class="weui-cell"><div class="weui-cell__hd"><label class="weui-label">其他</label></div><div class="weui-cell__bd"><input class="weui-input other" type="text" name="surgeryelse[]" value="" placeholder="请注明"></div></div></div></li>');
	})
	
})
	
</script>