<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
	    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
	    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
		<title>检查详情</title>
	    <link rel="stylesheet" href="/public/app/lib/weui/jquery-weui.css" />
	    <link rel="stylesheet" href="/public/app/lib/weui/weui.min.css" />
	    <link rel="stylesheet" href="/public/app/css/public.css" />
	    <link rel="stylesheet" href="/public/app/css/style.css" />
	    <script type="text/javascript" src="/public/app/lib/jq/jquery-1.10.2.js" ></script>
	    <script type="text/javascript" src="/public/app/lib/weui/jquery-weui.js" ></script>
	    <script type="text/javascript" src="/public/app/js/common.js" ></script>
	    <style type="text/css">
			.jieguoBox{max-width:100%; text-align:left;}
			.jieguoBox p img{max-width: 100%;}
			#fileimg{width: fit-content;}
	    </style>
	</head>
	<body>
		<section class="contentSec jianchaSec">
			<div class="weui-cells">
	            <div class="weui-cell">
	                <div class="weui-cell__bd">
	                    <p style="min-width: 7rem;">检查时间</p>
	                </div>
	                <div class="weui-cell__ft"><?php echo ($info["checktime"]); ?></div>
	            </div>
	        </div>
			<div class="weui-cells">
	            <div class="weui-cell">
	                <div class="weui-cell__bd">
	                    <p style="min-width: 7rem;">检查机构</p>
	                </div>
	                <div class="weui-cell__ft"><?php echo ($info["checkname"]); ?></div>
	            </div>
	        </div>
			<div class="weui-cells">
	            <div class="weui-cell">
	                <div class="weui-cell__bd">
	                    <p style="min-width: 7rem;">相关说明</p>
	                </div>
	                <div class="weui-cell__ft" style="text-align:left"><?php echo ($info["checkdesc"]); ?></div>
	            </div>
	        </div>
			<div class="weui-cells">
	            <div class="weui-cell">
	                <div class="weui-cell__bd">
	                    <p style="min-width: 7rem;">复查时间</p>
	                </div>
	                <div class="weui-cell__ft"><?php if($info['againtime'] != ''): echo ($info["againtime"]); else: ?>未填写<?php endif; ?></div>
	            </div>
	        </div>
			<div class="weui-cells">
	            <div class="weui-cell">
	                <div class="weui-cell__bd">
	                    <p style="min-width: 7rem;">复查地址</p>
	                </div>
	                <div class="weui-cell__ft"><?php if($info['againaddress'] != ''): echo ($info["againaddress"]); else: ?>未填写<?php endif; ?></div>
	            </div>
	        </div>
			<div class="weui-cells">
	            <div class="weui-cell">
	                <div class="weui-cell__bd">
	                    <p>常见指标</p>
	                </div>
	                <div class="weui-cell__ft zhibiao jt2">
	                	展开
	                </div>
	            </div>
	            <div class="details none">
	            	<div class="details1">
	            		<p class="tit">1.血常规</p>
	            		
	            		<div class="weui-cell">
			                <div class="weui-cell__bd">
			                    <p>白细胞（X10^9/L）</p>
			                </div>
			                <div class="weui-cell__ft"><?php echo ($info["mmwhite"]); ?></div>
			            </div>
	            		<div class="weui-cell">
			                <div class="weui-cell__bd">
			                    <p>血红蛋白（G/L）</p>
			                </div>
			                <div class="weui-cell__ft"><?php echo ($info["mmblood"]); ?></div>
			            </div>
	            		<div class="weui-cell">
			                <div class="weui-cell__bd">
			                    <p>血小板计数（x10^9/L）</p>
			                </div>
			                <div class="weui-cell__ft"><?php echo ($info["mmblock"]); ?></div>
			            </div>
	            		<div class="weui-cell">
			                <div class="weui-cell__bd">
			                    <p>血尿酸（μmol/L）</p>
			                </div>
			                <div class="weui-cell__ft"><?php echo ($info["mmls"]); ?></div>
			            </div>
	            	</div>
	            	<div class="details2">
	            		<p class="tit">2.血脂</p>
	            		<div class="weui-cell">
			                <div class="weui-cell__bd">
			                    <p>总胆固醇（mmol/L）</p>
			                </div>
			                <div class="weui-cell__ft"><?php echo ($info["modgc"]); ?></div>
			            </div>
	            		<div class="weui-cell">
			                <div class="weui-cell__bd">
			                    <p>甘油三酯（mmol/L）</p>
			                </div>
			                <div class="weui-cell__ft"><?php echo ($info["mogysz"]); ?></div>
			            </div>
	            		<div class="weui-cell">
			                <div class="weui-cell__bd">
			                    <p>高密度脂蛋白胆固醇（mmol/L）</p>
			                </div>
			                <div class="weui-cell__ft"><?php echo ($info["mogaodgc"]); ?></div>
			            </div>
	            		<div class="weui-cell">
			                <div class="weui-cell__bd">
			                    <p>低密度脂蛋白胆固醇（mmol/L）</p>
			                </div>
			                <div class="weui-cell__ft"><?php echo ($info["modidgc"]); ?></div>
			            </div>
	            	</div>
	            	<div class="details3">
	            		<p class="tit">3.肝功</p>
	            		<div class="weui-cell">
			                <div class="weui-cell__bd">
			                    <p>谷草转氨酶（u/L）</p>
			                </div>
			                <div class="weui-cell__ft"><?php echo ($info["mcgczam"]); ?></div>
			            </div>
	            		<div class="weui-cell">
			                <div class="weui-cell__bd">
			                    <p>谷丙转氨酶（u/L）</p>
			                </div>
			                <div class="weui-cell__ft"><?php echo ($info["mcgbzam"]); ?></div>
			            </div>
	            		<div class="weui-cell">
			                <div class="weui-cell__bd">
			                    <p>总胆红素（umol/L）</p>
			                </div>
			                <div class="weui-cell__ft"><?php echo ($info["mczdhs"]); ?></div>
			            </div>
	            	</div>
	            	<div class="details4">
	            		<p class="tit">4.其他项目</p>
	            		<div class="weui-cell">
			                <div class="weui-cell__bd">
			                    <p>甲胎蛋白AFP（ng/ml）</p>
			                </div>
			                <div class="weui-cell__ft"><?php echo ($info["maafp"]); ?></div>
			            </div>
	            		<div class="weui-cell">
			                <div class="weui-cell__bd">
			                    <p>癌胚抗原CEA（ng/ml）</p>
			                </div>
			                <div class="weui-cell__ft"><?php echo ($info["macea"]); ?></div>
			            </div>
	            		<div class="weui-cell">
			                <div class="weui-cell__bd">
			                    <p>糖类抗原CA125（U/ml）</p>
			                </div>
			                <div class="weui-cell__ft"><?php echo ($info["maca125"]); ?></div>
			            </div>
	            		<div class="weui-cell">
			                <div class="weui-cell__bd">
			                    <p>糖类抗原CA153（U/ml）</p>
			                </div>
			                <div class="weui-cell__ft"><?php echo ($info["maca153"]); ?></div>
			            </div>
	            	</div>
	            </div>
	       </div>
			<div class="weui-cells">
	            <div class="weui-cell">
	                <div class="weui-cell__bd">
	                    <p>检查结果</p>
	                    <div class="jieguoBox center">
	                    	<?php echo ($info["reportdesc"]); ?>
	                    </div>
	                </div>
	                
	            </div>
	       </div>
		</section>
	</body>
</html>

<script>
	$(function(){
		$('.zhibiao').click(function(){
			if($(this).hasClass('active')){
				$(this).removeClass('active').html('展开');
				$('.details').slideUp(500);
			}
			else{
				$(this).addClass('active').html('折叠');
				$('.details').slideDown(500);
			}
		})
	})
</script>