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
			<li class="active"><a href="javascript:;">健康日志</a></li>
		</ul>
		<form class="form-horizontal" id="tagforms" method="post" enctype="multipart/form-data">
			<fieldset>
				<div class="control-group">
					<label class="control-label">姓名：</label>
					<div class="controls" style="margin-top: 5px;">
						<span><?php echo ($minfo["nicename"]); ?></span>
					</div>
				</div>	
				<div class="control-group">
					<label class="control-label">电话：</label>
					<div class="controls" style="margin-top: 5px;">
						<span><?php echo ($minfo["mobile"]); ?></span>
					</div>
				</div>	
				<div class="row-fluid">
					<div class="" style="width: 100%;">
						<table class="table table-bordered" width="100%">
						    <tr>
								<th width="100%" colspan="6" style="font-size: 16px;color: #1abc9c;">日志记录</th>
							</tr>
							<tr>
								<th style="min-width: 50px;text-align: center;">ID</th>
								<th style="min-width: 80px;text-align: center;">日期</th>
								<th style="min-width: 100px;text-align: center;">体重（KG）</th>
								<th style="min-width: 100px;text-align: center;">血压（mmHG）</th>
								<th style="min-width: 100px;text-align: center;">血糖（mmol/L）</th>
								<th style="min-width: 150px;text-align: center;">身体描述</th>
								<th style="min-width: 150px;text-align: center;">操作</th>
							</tr>
							<?php if(is_array($loglist)): $i = 0; $__LIST__ = $loglist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i;?><tr>
								<td style="text-align: center;"><?php echo ($va["id"]); ?></td>
								<td style="text-align: center;"><?php echo ($va["logtime"]); ?></td>
								<td style="text-align: center;"><?php echo ($va["mweight"]); ?></td>
								<td style="text-align: center;"><?php echo ($va["mmxy"]); ?>/<?php echo ($va["mmxy2"]); ?></td>
								<td style="text-align: center;"><?php echo ($va["mmxt"]); ?></td>
								<td style="text-align: center;"><?php echo ($va["desc"]); ?></td>
								<td style="text-align: center;"><a href="<?php echo U('Member/showhealthlog',array('id'=>$va['id']));?>" class="btn btn-primary" style="padding: 2px 15px;color: white;background-color: #1dccaa;">查看图片</a></td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						</table>
						<div class="pagination" style="float: right;"><?php echo ($page); ?></div>
					</div>											
				</div>		
			</fieldset>
		</form>
	</div>
	<script type="text/javascript" src="/public/js/common.js"></script>
</body>
</html>