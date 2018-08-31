<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<!-- Set render engine for 360 browser -->
	<meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

	<link href="/public/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
    <link href="/public/simpleboot/css/simplebootadmin.css" rel="stylesheet">
    <link href="/public/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="/public/simpleboot/font-awesome/4.4.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <style>
		form .input-order{margin-bottom: 0px;padding:3px;width:40px;}
		.table-actions{margin-top: 5px; margin-bottom: 5px;padding:0px;}
		.table-list{margin-bottom: 0px;}
	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="/public/simpleboot/font-awesome/4.4.0/css/font-awesome-ie7.min.css">
	<![endif]-->
	<script type="text/javascript">
	//全局变量
	var GV = {
	    ROOT: "/",
	    WEB_ROOT: "/",
	    JS_ROOT: "public/js/",
	    APP:'<?php echo (MODULE_NAME); ?>'/*当前应用名*/
	};
	</script>
    <script src="/public/js/jquery.js"></script>
    <script src="/public/js/wind.js"></script>
    <script src="/public/simpleboot/bootstrap/js/bootstrap.min.js"></script>
    <script>
    	$(function(){
    		$("[data-toggle='tooltip']").tooltip();
    	});
    </script>
<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style><?php endif; ?>
<style type="text/css">
.pic-list li {
	margin-bottom: 5px;
}
</style>
</head>
<body>
	<div class="wrap js-check-wrap" id="app">
		<ul class="nav nav-tabs">
			<li><a href="<?php echo U('Member/index');?>">用户列表</a></li>
			<li class="active"><a href="javascript:;">个人信息</a></li>
		</ul>
		<form class="form-horizontal" id="tagforms" method="post" enctype="multipart/form-data">
			<fieldset>
				<div class="row-fluid" style="border-bottom: 1px solid #ccc;">
					<div class="" style="width: 100%; float: left;">
						<table class="table table-bordered" width="100%">
						    <tr>
								<th width="100%" colspan="2" style="font-size: 16px;color: #1abc9c;">一、基础信息</th>
							</tr>
							<tr>
								<th style="width: 40%;">姓名：</th>
								<td style="width: 60%;"><?php echo ($minfo["nicename"]); ?></td>
							</tr>							
							<tr>
								<th style="width: 40%;">性别：</th>
								<td><?php echo ($minfo["sex"]); ?></td>
							</tr>
							<tr>
								<th style="width: 40%;">身高：</th>
								<td><?php echo ($minfo["mheight"]); ?>cm</td>
							</tr>
							<tr>
								<th style="width: 40%;">体重：</th>
								<td><?php echo ($minfo["mweight"]); ?>KG</td>
							</tr>
							<tr>
								<th style="width: 40%;">出生日期：</th>
								<td><?php echo ($minfo["birthday"]); ?></td>
							</tr>
							<tr>
								<th style="width: 40%;">身份证：</th>
								<td><?php echo ($minfo["cardnum"]); ?></td>
							</tr>
							<tr>
								<th style="width: 40%;">住址：</th>
								<td><?php echo ($minfo["address"]); ?></td>
							</tr>
						</table>
					</div>	
										
				</div>
				<div class="row-fluid" style="margin-top: 5px;border-bottom: 1px solid #ccc;">
					<div><table class="table table-bordered" width="100%" style="margin-bottom: 10px;">
						    <tr>
								<th width="100%" colspan="8" style="font-size: 16px;color: #1abc9c;">二、我的健康</th>
							</tr>
						</table>
					</div>
					<div class="" style="width: 48%; float: left;">
						<table class="table table-bordered" width="100%">
						    <tr>
								<th width="100%" colspan="8" style="font-size: 16px;color: #1abc9c;">最近健康情况</th>
							</tr>
							<?php if(is_array($myhealth)): $i = 0; $__LIST__ = $myhealth;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i; if($va != ''): ?><tr>
								<td colspan="2"><?php echo ($va); ?></td>
							</tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
							<?php if($minfo['healthindicators'] != ''): ?><tr>
								<td style="width: 50%;">体检主要阳性指标</td>
								<td><?php echo ($minfo["healthindicators"]); ?></td>
							</tr><?php endif; ?>
							<?php if($minfo['healthelse'] != ''): ?><tr>
								<td>其他</td>
								<td><?php echo ($minfo["healthelse"]); ?></td>
							</tr><?php endif; ?>						
						</table>
					</div>							
					<div class="" style="width: 48%; float: right;">					
						<table class="table table-bordered" width="100%">
						    <tr>
								<th width="100%" colspan="2" style="font-size: 16px;color: #1abc9c;">关注系统疾病</th>
							</tr>
							<?php if(is_array($sysdisease)): $i = 0; $__LIST__ = $sysdisease;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i; if($va != ''): ?><tr>
								<td colspan="2"><?php echo ($va); ?></td>
							</tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
							<?php if($minfo['syselse'] != ''): ?><tr>
								<td style="width: 50%;">其他</td>
								<td><?php echo ($minfo["syselse"]); ?></td>
							</tr><?php endif; ?>		
						</table>
					</div>	
													
				</div>	
				<div class="row-fluid" style="margin-top: 5px;border-bottom: 1px solid #ccc;">
					
					<div class="" style="width: 48%; float: left;">
						<table class="table table-bordered" width="100%">
						    <tr>
								<th width="100%" colspan="8" style="font-size: 16px;color: #1abc9c;">现病史</th>
							</tr>
							<?php if(is_array($nowillness)): $i = 0; $__LIST__ = $nowillness;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i; if($va != ''): ?><tr>
								<td colspan="2"><?php echo ($va); ?></td>
							</tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
							<?php if($minfo['illnesselse'] != ''): ?><tr>
								<td style="width: 50%;">其他</td>
								<td><?php echo ($minfo["illnesselse"]); ?></td>
							</tr><?php endif; ?>				
						</table>
					</div>				
					<div class="" style="width: 48%; float: right;">
						<table class="table table-bordered" width="100%">
						    <tr>
								<th width="100%" colspan="2" style="font-size: 16px;color: #1abc9c;">家族病史</th>
							</tr>
							<?php if(is_array($historyillness)): $i = 0; $__LIST__ = $historyillness;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i; if($va != ''): ?><tr>
								<td colspan="2"><?php echo ($va); ?></td>
							</tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
							<?php if($minfo['hillnesselse'] != ''): ?><tr>
								<td style="width: 50%;">其他</td>
								<td><?php echo ($minfo["hillnesselse"]); ?></td>
							</tr><?php endif; ?>	
						</table>
					</div>							
				</div>
				<div class="row-fluid" style="margin-top: 5px;border-bottom: 1px solid #ccc;">
					<div class="" style="width: 48%; float: left;">
						<table class="table table-bordered" width="100%">
						    <tr>
								<th width="100%" colspan="8" style="font-size: 16px;color: #1abc9c;">手术史</th>
							</tr>
							<?php if(is_array($optionlog)): $key = 0; $__LIST__ = $optionlog;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($key % 2 );++$key;?><tr>
								<td colspan="2">手术史<?php echo ($key); ?></td>
							</tr>
							<tr>
								<td style="width: 50%;">手术名称</td>
								<td><?php echo ($va["surgeryname"]); ?></td>
							</tr>
							<tr>
								<td>手术时间</td>
								<td><?php echo ($va["surgerytime"]); ?></td>
							</tr>
							<tr>
								<td>其他</td>
								<td><?php echo ($va["surgeryelse"]); ?></td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						</table>
					</div>			
					<div class="" style="width: 48%; float: right;">
						<table class="table table-bordered" width="100%">
						    <tr>
								<th width="100%" colspan="2" style="font-size: 16px;color: #1abc9c;">用药史</th>
							</tr>
							<?php if(is_array($historydrug)): $i = 0; $__LIST__ = $historydrug;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i; if($va != ''): ?><tr>
								<td colspan="2"><?php echo ($va); ?></td>
							</tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
							<?php if($minfo['drugname'] != ''): ?><tr>
								<td style="width: 50%;">药品名称</td>
								<td><?php echo ($minfo["drugname"]); ?></td>
							</tr><?php endif; ?>
							<?php if($minfo['drugpoint'] != ''): ?><tr>								
								<td style="width: 50%;">服用剂量</td>
								<td><?php echo ($minfo["drugpoint"]); ?></td>
							</tr><?php endif; ?>
							<?php if($minfo['drugelse'] != ''): ?><tr>
								<td style="width: 50%;">其他</td>
								<td><?php echo ($minfo["drugelse"]); ?></td>
							</tr><?php endif; ?>			
						</table>
					</div>		

				</div>	
				<div class="row-fluid" style="margin-top: 5px;border-bottom: 1px solid #ccc;">
					<div class="" style="width: 48%; float: left;">
						<table class="table table-bordered" width="100%">
						    <tr>
								<th width="100%" colspan="8" style="font-size: 16px;color: #1abc9c;">过敏史</th>
							</tr>
							<?php if(is_array($anaphylaxis)): $i = 0; $__LIST__ = $anaphylaxis;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i; if($va != ''): ?><tr>
								<td colspan="2"><?php echo ($va); ?></td>
							</tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
							<?php if($minfo['anaphylaxiselse'] != ''): ?><tr>
								<td style="width: 50%;">其他</td>
								<td><?php echo ($minfo["anaphylaxiselse"]); ?></td>
							</tr><?php endif; ?>						
						</table>
					</div>			
					<div class="" style="width: 48%; float: right;">
						<table class="table table-bordered" width="100%">
						    <tr>
								<th width="100%" colspan="2" style="font-size: 16px;color: #1abc9c;">女性生育史</th>
							</tr>
							<?php if($womenbirth['liuchansn'] != ''): ?><tr>
								<td style="width: 50%;">流产史(次)</td>
								<td><?php echo ($womenbirth["liuchansn"]); ?></td>
							</tr><?php endif; ?>
							<?php if($womenbirth['hysn'] != ''): ?><tr>
								<td>怀孕史(次)</td>
								<td><?php echo ($womenbirth["hysn"]); ?></td>
							</tr><?php endif; ?>
							<?php if($womenbirth['scsn'] != ''): ?><tr>
								<td>生产史(次)</td>
								<td><?php echo ($womenbirth["scsn"]); ?></td>
							</tr><?php endif; ?>
							<?php if($womenbirth['scmethod'] != ''): ?><tr>
								<td>生产方式（顺产或剖腹）</td>
								<td><?php echo ($womenbirth["scmethod"]); ?></td>
							</tr><?php endif; ?>
							<?php if($womenbirth['gwysn'] != ''): ?><tr>
								<td>宫外孕史(次)</td>
								<td><?php echo ($womenbirth["gwysn"]); ?></td>
							</tr><?php endif; ?>
							<?php if($womenbirth['jyyear'] != ''): ?><tr>
								<td>绝经年龄</td>
								<td><?php echo ($womenbirth["jyyear"]); ?></td>
							</tr><?php endif; ?>
							<?php if($womenbirth['elsedesc'] != ''): ?><tr>
								<td>其他</td>
								<td><?php echo ($womenbirth["elsedesc"]); ?></td>
							</tr><?php endif; ?>
						</table>
					</div>	
				</div>
				<div class="row-fluid" style="margin-top: 5px;border-bottom: 1px solid #ccc;">
					<div><table class="table table-bordered" width="100%" style="margin-bottom: 10px;">
						    <tr>
								<th width="100%" colspan="8" style="font-size: 16px;color: #1abc9c;">三、我的生活方式</th>
							</tr>
						</table>
					</div>
					<div class="" style="width: 48%; float: left;">
						<table class="table table-bordered" width="100%">
						    <tr>
								<th width="100%" colspan="8" style="font-size: 16px;color: #1abc9c;">睡眠情况</th>
							</tr>
							<?php if(is_array($lifestyle)): $i = 0; $__LIST__ = $lifestyle;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i; if($va != ''): ?><tr>
								<td colspan="2"><?php echo ($va); ?></td>
							</tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>	
							<?php if($minfo['lifeelse'] != ''): ?><tr>
								<td style="width: 50%">其他</td>
								<td><?php echo ($minfo["lifeelse"]); ?></td>
							</tr><?php endif; ?>					
						</table>
					</div>							
					<div class="" style="width: 48%; float: right;">					
						<table class="table table-bordered" width="100%">
						    <tr>
								<th width="100%" colspan="2" style="font-size: 16px;color: #1abc9c;">运动情况</th>
							</tr>
							<?php if(is_array($movement)): $i = 0; $__LIST__ = $movement;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i; if($va != ''): ?><tr>
								<td colspan="2"><?php echo ($va); ?></td>
							</tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>	
							<?php if($minfo['moveelse'] != ''): ?><tr>
								<td style="width: 50%">运动方式</td>
								<td><?php echo ($minfo["moveelse"]); ?></td>
							</tr><?php endif; ?>					
						</table>
					</div>														
				</div>	
				<div class="row-fluid" style="margin-top: 5px;border-bottom: 1px solid #ccc;">
					<div class="" style="width: 48%; float: left;">
						<table class="table table-bordered" width="100%">
						    <tr>
								<th width="100%" colspan="8" style="font-size: 16px;color: #1abc9c;">吸烟情况</th>
							</tr>
							<?php if(is_array($smokeing)): $i = 0; $__LIST__ = $smokeing;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i; if($va != ''): ?><tr>
								<td colspan="2"><?php echo ($va); ?></td>
							</tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>	
							<?php if($minfo['predaysmoke'] != ''): ?><tr>
								<td style="width: 50%;">每日（根）</td>
								<td><?php echo ($minfo["predaysmoke"]); ?></td>
							</tr><?php endif; ?>
							<?php if($minfo['smokeyear'] != ''): ?><tr>
								<td>已抽（年）</td>
								<td><?php echo ($minfo["smokeyear"]); ?></td>
							</tr><?php endif; ?>
							<?php if($minfo['smokeelse'] != ''): ?><tr>
								<td>其他</td>
								<td><?php echo ($minfo["smokeelse"]); ?></td>
							</tr><?php endif; ?>					
						</table>
					</div>							
					<div class="" style="width: 48%; float: right;">					
						<table class="table table-bordered" width="100%">
						    <tr>
								<th width="100%" colspan="2" style="font-size: 16px;color: #1abc9c;">饮食习惯</th>
							</tr>
							<?php if(is_array($foodstyle)): $i = 0; $__LIST__ = $foodstyle;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i; if($va != ''): ?><tr>
								<td colspan="2"><?php echo ($va); ?></td>
							</tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>	
							<?php if($minfo['foodelse'] != ''): ?><tr>
								<td style="width: 50%">其他</td>
								<td><?php echo ($minfo["foodelse"]); ?></td>
							</tr><?php endif; ?>	
						</table>
					</div>														
				</div>	
				<div class="row-fluid" style="margin-top: 5px;border-bottom: 1px solid #ccc;">
					<div class="" style="width: 48%; float: left;">
						<table class="table table-bordered" width="100%">
						    <tr>
								<th width="100%" colspan="8" style="font-size: 16px;color: #1abc9c;">饮酒习惯</th>
							</tr>							
							<?php if(is_array($drinkstyle)): $i = 0; $__LIST__ = $drinkstyle;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i; if($va != ''): ?><tr>
								<td colspan="2"><?php echo ($va); ?></td>
							</tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>	
							<?php if($minfo['predaydrink'] != ''): ?><tr>
								<td style="width: 50%;">每日（ml）</td>
								<td><?php echo ($minfo["predaydrink"]); ?></td>
							</tr><?php endif; ?>
							<?php if($minfo['drinkyear'] != ''): ?><tr>
								<td>已饮（年）</td>
								<td><?php echo ($minfo["drinkyear"]); ?></td>
							</tr><?php endif; ?>			
						</table>
					</div>							
					<div class="" style="width: 48%; float: right;">					
						<table class="table table-bordered" width="100%">
						    <tr>
								<th width="100%" colspan="2" style="font-size: 16px;color: #1abc9c;">心理状况</th>
							</tr>
							<?php if(is_array($psychologicstatus)): $i = 0; $__LIST__ = $psychologicstatus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i; if($va != ''): ?><tr>
								<td colspan="2"><?php echo ($va); ?></td>
							</tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
							<?php if($minfo['heartelse'] != ''): ?><tr>
								<td style="width: 50%;">其他</td>
								<td><?php echo ($minfo["heartelse"]); ?></td>
							</tr><?php endif; ?>
						</table>
					</div>														
				</div>									
			</fieldset>
		</form>
	</div>
	<script type="text/javascript" src="/public/js/common.js"></script>
</body>
</html>