<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
	    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
	    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
		<title>我的日志</title>
	    <link rel="stylesheet" href="/public/app/lib/weui/jquery-weui.css" />
	    <link rel="stylesheet" href="/public/app/lib/weui/weui.min.css" />
	    <link rel="stylesheet" href="/public/app/css/public.css" />
	    <link rel="stylesheet" href="/public/app/css/style.css" />
	    <script type="text/javascript" src="/public/app/lib/jq/jquery-1.10.2.js" ></script>
	    <script type="text/javascript" src="/public/app/lib/weui/jquery-weui.js" ></script>
	    <script type="text/javascript" src="/public/app/js/common.js" ></script>		
	</head>
	
	<style>
		
		.addLog{
			display: inline-block;
			padding: 10px 20px;
			background: #4fbbc5;
			position: fixed;
			left: 30%;
			right: 30%;
			text-align: center;
			color: #fff;
			font-size: 1.4rem;
			border-radius: 30px;
			box-shadow: 5px 5px 20px #ccc;
			margin: 0 auto;
			bottom: 6rem;
		}
		.delBtn{
			float: right;
			color: #4fbbc5;
		}
		.notice-meng{
			position:fixed;
			top:0;
			left:0;
			bottom:0;
			right:0;
			background:rgba(0,0,0,.5);
			z-index:1000;
			display:none
		}
		.notice-meng .notice-content{
			position:absolute;
			top:30%;
			left:20%;
			right:20%;
			background:#fff;
			border-radius:5px
		}
		.notice-meng .notice-content p{
			font-size:17px;
			text-align:center;
			padding:20px
		}
		.notice-meng .notice-content .bottomBtn{
			overflow:hidden;
			border-top:1px solid #ccc;
		}
		.notice-meng .notice-content .bottomBtn>div{
			float:left;
			width:49%;
			border-right:1px solid #ccc;
			text-align:center;
			height:4rem;
			line-height:4rem;
			font-size:17px
		}
	</style>
	
	<body>
		<section class="contentSec logListSec" style="margin-bottom:50px">
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i;?><div class="weui-cells" data-url="<?php echo ($va["id"]); ?>">
	            <div class="weui-cell tit">
	                <div class="weui-cell__bd">
	                    <p>日期：<?php echo ($va["logtime"]); ?></p>
	                </div>
					
					<a class="weui-cell__ft delBtn" href="javascript:;" data-id="<?php echo ($va["id"]); ?>">删除日志</a>
	            </div>
	            <a class="weui-cell weui-cell_access" href="<?php echo U('User/Center/writedetail',array('id'=>$va['id']));?>">
	                <div class="weui-cell__bd">
	                    <p>体重：<?php echo ($va["mweight"]); ?>KG</p>
	                    <p>血糖：<?php echo ($va["mmxt"]); ?>mmol/l</p>
	                    <p>血压：<?php echo ($va["mmxy"]); ?>/<?php echo ($va["mmxy2"]); ?>mmHg</p>
	                    <p>身体描述：</p>
	                    <p><?php echo ($va["desc"]); ?></p>
	                </div>
	                <div class="weui-cell__ft jt">
	                </div>
	            </a>
	        </div><?php endforeach; endif; else: echo "" ;endif; ?>
	        <?php if(count($list) == 0): ?><center style="margin-top: 55px;">没有更多了~</center><?php endif; ?>
			<a class="addLog" href="<?php echo U('User/Center/writeLog');?>">写日志</a>
		</section>
		<div class="notice-meng">
			<div class="notice-content">
				<p>确定要删除该条日志？</p>
				<div class="bottomBtn">
					<div class="cancel1">取消</div>
					<div class="sure" style="border:0;color: #4fbbc5">确定</div>
				</div>
			</div>
		</div>
		<footer class="mainFooter">
			<a class="wdjc" href="<?php echo U('User/Center/checklist');?>">我的检查</a>
			<a class="jkrz active" href="<?php echo U('User/Center/loglist');?>">健康日志</a>
			<a class="grzx" href="<?php echo U('User/Center/index');?>">个人信息</a>
		</footer>
	</body>
</html>

<script>
var index;   //待删除项
var ids;
	$(function(){
		$('.delBtn').bind('click',function(){
			index=$(this).index();
			ids =$(this).attr('data-id');
			$('body').addClass('overflow');
            $('.notice-meng').show();
		})
		$('.cancel1').click(function(){
			$('body').removeClass('overflow');
			$('.notice-meng').hide();
		})
		$('.sure').click(function(){
			$.ajax({
				url:"<?php echo U('User/center/dellog');?>",
				type:'POST',
				data:{id:ids},
				success:function(data)
				{					
					if(data.status==0)
					{
						//ajax
						$('.logListSec .weui-cells').each(function(){
							if($(this).attr('data-url')==data.atype){
								$(this).remove();
							}
						})
						$('body').removeClass('overflow');
						$('.notice-meng').hide();
					}
				}
			})
			
		})
		
	})
</script>