<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
	    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
	    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
		<title>出生日期</title>
	    <link rel="stylesheet" href="/public/app/lib/weui/jquery-weui.css" />
	    <link rel="stylesheet" href="/public/app/lib/weui/weui.min.css" />
	    <link rel="stylesheet" href="/public/app/css/public.css" />
	    <link rel="stylesheet" href="/public/app/css/style.css" />
		<link rel="stylesheet" href="/public/app/css/mobiscroll.custom-2.6.2.min.css" />
	    <script type="text/javascript" src="/public/app/lib/jq/jquery-1.10.2.js" ></script>
	    <script type="text/javascript" src="/public/app/lib/weui/jquery-weui.js" ></script>
	    <script type="text/javascript" src="/public/app/js/common.js" ></script>
		 <script type="text/javascript" src="/public/app/js/mobiscroll.custom-2.6.2.min.js" ></script>
	</head>
	<style>
		body input{
			height: 2rem;
			line-height: 2rem;
			text-align: right;
			font-size: 17px;
		}
		input[type="date"]:before{
			content: attr(placeholder);
			color:#aaa;
		}
		input[type="date"].full:before{
			content: none;
			color:#fff;
		}
	</style>
	<body>
		<section class="contentSec nameSec">
	        <div class="weui-cells weui-cells_form">
	            <div class="weui-cell">
	                <div class="weui-cell__hd" style="-webkit-box-flex: 1; -webkit-flex: 1; flex: 1">
	                	<label for="" class="weui-label">日期</label>
	                </div>
	                <div class="weui-cell__bd" style="-webkit-box-flex: none; -webkit-flex: none; flex: none;margin-right:-20px">
	                    <input class="weui-input birth" type="date" value="<?php echo ($birthday); ?>" placeholder="年/月/日">
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
		if($('.birth').val().length>0){
			$('input[type=date]').addClass('full');
		}
		$('input[type=date]').change(function(){
			var dateval=$(this).val();
			if(dateval.length>0){
				$(this).addClass('full');
			}
		})
		$('.save').click(function(){
			if($('.birth').val().length<1){
				message('请选择日期');
				return false;
			}
			$.ajax({
				url:"<?php echo U('User/Profile/editbirthpost');?>",
				data:{birthday:$('.birth').val()},
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
			if($('.birth').val().length<1){
				message('请选择日期');
				return false;
			}
			$.ajax({
				url:"<?php echo U('User/Profile/editbirthpost');?>",
				data:{birthday:$('.birth').val()},
				type:'POST',
				success:function(data)
				{
					if(data.status==0)
					{
						
						location.href="<?php echo U('User/Profile/editcard');?>";  									
						
					}else
					{
						message(data.msg);
					}
				}
			})
		})
	$('#showDatePicker').on('click', function () {
	        weui.datePicker({
	            start: 1990,
	            end: new Date().getFullYear(),
	            onChange: function (result) {
	                console.log(result);
	            },
	            onConfirm: function (result) {
	                console.log(result);
	            }
	        });
	    });
	})
	



</script>