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
#app span p img{width:65%;}
</style>
</head>
<body>
	<div class="wrap js-check-wrap" id="app">
		<ul class="nav nav-tabs">
			<li><a href="<?php echo U('Member/index');?>">用户列表</a></li>
			<li class="active"><a href="javascript:;">报告详细</a></li>
		</ul>
		<form class="form-horizontal" id="tagforms" method="post" enctype="multipart/form-data">
			<fieldset>
				
				<div class="control-group">
					<label class="control-label">检查时间：</label>
					<div class="controls" style="margin-top: 5px;">
						<span><?php echo ($info["checktime"]); ?></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">检查机构：</label>
					<div class="controls" style="margin-top: 5px;">
						<span><?php echo ($info["checkname"]); ?></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">相关说明：</label>
					<div class="controls" style="margin-top: 5px;">
						<span><?php echo ($info["checkdesc"]); ?></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">复查时间：</label>
					<div class="controls" style="margin-top: 5px;">
						<?php if($info['againtime'] == '0000-00-00'): ?><span>无</span>
						<?php else: ?>
						<span><?php echo ($info["againtime"]); ?></span><?php endif; ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">复查地址：</label>
					<div class="controls" style="margin-top: 5px;">
						<?php if($info['againaddress'] == ''): ?><span>无</span>
						<?php else: ?>
						<span><?php echo ($info["againaddress"]); ?></span><?php endif; ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">常见指标：</label>
					<div class="controls" style="margin-top: 5px;">
						<span>1、血常规</span>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label">&nbsp;</label>
					<div class="controls">
						<span>白细胞（x10^9/L）</span>&nbsp;&nbsp;<span style="margin-left: 70px;"><?php echo ($info["mmwhite"]); ?></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">&nbsp;</label>
					<div class="controls">
						<span>血红蛋白（G/L）</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left: 70px;"><?php echo ($info["mmblood"]); ?></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">&nbsp;</label>
					<div class="controls">
						<span>血小板计数（x10^9/L）</span>&nbsp;<span style="margin-left: 70px;"><?php echo ($info["mmblock"]); ?></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">&nbsp;</label>
					<div class="controls">
						<span>血尿酸（umol/L）</span>&nbsp;&nbsp;&nbsp;<span style="margin-left: 70px;"><?php echo ($info["mmls"]); ?></span>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<span>2、血脂</span>
					</div>
				</div>				
				<div class="control-group">
					<label class="control-label">&nbsp;</label>
					<div class="controls">
						<span>总胆固醇（mmol/L）</span>&nbsp;&nbsp;<span style="margin-left: 70px;"><?php echo ($info["modgc"]); ?></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">&nbsp;</label>
					<div class="controls">
						<span>甘油三酯（mmol/L）</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left: 70px;"><?php echo ($info["mogysz"]); ?></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">&nbsp;</label>
					<div class="controls">
						<span>高密度脂蛋白胆固醇（mmol/L）</span>&nbsp;<span style="margin-left: 70px;"><?php echo ($info["mogaodgc"]); ?></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">&nbsp;</label>
					<div class="controls">
						<span>低密度脂蛋白胆固醇（mmol/L）</span>&nbsp;&nbsp;&nbsp;<span style="margin-left: 70px;"><?php echo ($info["modidgc"]); ?></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">&nbsp;</label>
					<div class="controls">
						<span>3、肝功</span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">&nbsp;</label>
					<div class="controls">
						<span>谷草转氨酶（u/L）</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left: 70px;"><?php echo ($info["mcgczam"]); ?></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">&nbsp;</label>
					<div class="controls">
						<span>谷丙转氨酶（u/L）</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left: 70px;"><?php echo ($info["mcgbzam"]); ?></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">&nbsp;</label>
					<div class="controls">
						<span>总胆红素（umol/L）</span>&nbsp;&nbsp;<span style="margin-left: 70px;"><?php echo ($info["mczdhs"]); ?></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">&nbsp;</label>
					<div class="controls">
						<span>4、其他项目</span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">&nbsp;</label>
					<div class="controls">
						<span>甲胎蛋白AFP（ng/ml）</span>&nbsp;&nbsp;<span style="margin-left: 70px;"><?php echo ($info["maafp"]); ?></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">&nbsp;</label>
					<div class="controls">
						<span>癌胚抗原CEA（ng/ml）</span>&nbsp;&nbsp;<span style="margin-left: 70px;"><?php echo ($info["macea"]); ?></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">&nbsp;</label>
					<div class="controls">
						<span>糖类抗原CA125（U/ml）</span><span style="margin-left: 70px;"><?php echo ($info["maca125"]); ?></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">&nbsp;</label>
					<div class="controls">
						<span>糖类抗原CA153（U/ml）</span><span style="margin-left: 70px;"><?php echo ($info["maca153"]); ?></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">检查项目/结果：</label>
					<div class="controls" style="margin-top: 5px;">
						<span><?php echo ($info["reportdesc"]); ?></span>
					</div>
				</div>								
			</fieldset>
			<div class="form-actions">
				<input type="hidden" name="mid" value="<?php echo ($minfo["id"]); ?>">
			</div>
		</form>
	</div>
	<script type="text/javascript" src="/public/js/common.js"></script>
	<script src="/public/js/vue.js"></script>
	<script src="/public/js/content_addtop.js"></script>
	<script src="/public/js/define_my.js"></script>
	<script src="/public/js/artDialog/artDialog.js"></script>
	<script type="text/javascript">
		//编辑器路径定义
		var editorURL = GV.WEB_ROOT;
	</script>
	<script type="text/javascript" src="/public/js/ueditor/ueditor.config.js"></script>
	<script type="text/javascript" src="/public/js/ueditor/ueditor.all.min.js"></script>
	<script type="text/javascript">
	$(function() {
		Wind.use('validate', 'ajaxForm', 'artDialog', function() {
				//javascript

				//编辑器
				editorcontent = new baidu.editor.ui.Editor();
				editorcontent.render('content');
				try {
					editorcontent.sync();
				} catch (err) {
				}
				//增加编辑器验证规则
				jQuery.validator.addMethod('editorcontent', function() {
					try {
						editorcontent.sync();
					} catch (err) {
					}
					return editorcontent.hasContents();
				});
			})
	});
	</script>
</body>
</html>