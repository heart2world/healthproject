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
			<li class="active"><a href="javascript:;">编辑报告</a></li>
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
				<div class="control-group">
					<label class="control-label">检查时间：</label>
					<div class="controls">
						<input type="text" name="checktime" class="js-date" value="<?php echo ($loginfo["checktime"]); ?>" placeholder="选择时间">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">检查机构：</label>
					<div class="controls">
						<input type="text" name="checkname" maxlength="20" value="<?php echo ($loginfo["checkname"]); ?>" placeholder="限20字以内">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">相关说明：</label>
					<div class="controls">
						<textarea name="checkdesc" style="width: 400px;height: 50px;"><?php echo ($loginfo["checkdesc"]); ?></textarea>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">复查时间：</label>
					<div class="controls">
						<input type="text" name="againtime" class="js-date" placeholder="选择时间" value="<?php echo ($loginfo["againtime"]); ?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">复查地址：</label>
					<div class="controls">
						<input type="text" name="againaddress" style="width: 400px;" value="<?php echo ($loginfo["againaddress"]); ?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">常见指标：</label>
					<div class="controls">
						<span>1、血常规</span>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label">&nbsp;</label>
					<div class="controls">
						<span>白细胞（x10^9/L）</span>&nbsp;&nbsp;<input type="text" name="mmwhite" value="<?php echo ($loginfo["mmwhite"]); ?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">&nbsp;</label>
					<div class="controls">
						<span>血红蛋白（G/L）</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="mmblood" value="<?php echo ($loginfo["mmblood"]); ?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">&nbsp;</label>
					<div class="controls">
						<span>血小板计数（x10^9/L）</span>&nbsp;<input type="text" name="mmblock" value="<?php echo ($loginfo["mmblock"]); ?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">&nbsp;</label>
					<div class="controls">
						<span>血尿酸（umol/L）</span>&nbsp;&nbsp;&nbsp;<input type="text" name="mmls" value="<?php echo ($loginfo["mmls"]); ?>">
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
						<span>总胆固醇（mmol/L）</span>&nbsp;&nbsp;<input type="text" name="modgc" value="<?php echo ($loginfo["modgc"]); ?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">&nbsp;</label>
					<div class="controls">
						<span>甘油三酯（mmol/L）</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="mogysz" value="<?php echo ($loginfo["mogysz"]); ?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">&nbsp;</label>
					<div class="controls">
						<span>高密度脂蛋白胆固醇（mmol/L）</span>&nbsp;<input type="text" name="mogaodgc" value="<?php echo ($loginfo["mogaodgc"]); ?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">&nbsp;</label>
					<div class="controls">
						<span>低密度脂蛋白胆固醇（mmol/L）</span>&nbsp;&nbsp;&nbsp;<input type="text" name="modidgc" value="<?php echo ($loginfo["modidgc"]); ?>">
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
						<span>谷草转氨酶（u/L）</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="mcgczam" value="<?php echo ($loginfo["mcgczam"]); ?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">&nbsp;</label>
					<div class="controls">
						<span>谷丙转氨酶（u/L）</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="mcgbzam" value="<?php echo ($loginfo["mcgbzam"]); ?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">&nbsp;</label>
					<div class="controls">
						<span>总胆红素（umol/L）</span>&nbsp;&nbsp;<input type="text" name="mczdhs" value="<?php echo ($loginfo["mczdhs"]); ?>">
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
						<span>甲胎蛋白AFP（ng/ml）</span>&nbsp;&nbsp;<input type="text" name="maafp" value="<?php echo ($loginfo["maafp"]); ?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">&nbsp;</label>
					<div class="controls">
						<span>癌胚抗原CEA（ng/ml）</span>&nbsp;&nbsp;<input type="text" name="macea" value="<?php echo ($loginfo["macea"]); ?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">&nbsp;</label>
					<div class="controls">
						<span>糖类抗原CA125（U/ml）</span><input type="text" name="maca125" value="<?php echo ($loginfo["maca125"]); ?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">&nbsp;</label>
					<div class="controls">
						<span>糖类抗原CA153（U/ml）</span><input type="text" name="maca153" value="<?php echo ($loginfo["maca153"]); ?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">检查项目/结果：</label>
					<div class="controls" style="width: 800px;">
						<script type="text/plain" id="content" name="content"><?php echo ($loginfo["reportdesc"]); ?></script>
					</div>
				</div>								
			</fieldset>
			<div class="form-actions">
				<input type="hidden" name="id" value="<?php echo ($loginfo["id"]); ?>">
				<input type="hidden" name="mid" value="<?php echo ($loginfo["mid"]); ?>">
				<input type="hidden" name="oldchecktime" value="<?php echo ($loginfo["checktime"]); ?>">
				<input type="hidden" name="oldagaintime" value="<?php echo ($loginfo["againtime"]); ?>">
				<input type="button" @click="add()" class="btn btn-primary" value="保存"/>
				<a class="btn" href="javascript:history.back(-1);"><?php echo L('BACK');?></a>
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
	<script>
		var app = new Vue({
			el:"#app",
			data:{
				info:{},				
			},
			created:function () {
			},
			methods:{
				add:function () {	
				     var tagvals=$('#tagforms').serialize();				
					$.ajax({
						url:'<?php echo U("Admin/Member/report_editpost");?>',
						data:tagvals,
						type:"POST",
						dataType:"json",
						success:function (res) {							
							if(res.status==0){
								$.dialog({id: 'popup', lock: true,icon:"succeed", content: res.msg, time: 2});
								setInterval(function(){
									location.href='<?php echo U("Admin/Member/index");?>';
								},3000)
							}
							else {
								$.dialog({id: 'popup', lock: true,icon:"warning", content: res.msg, time: 2});
							}
						}

					})
				}
			}
		});	

	</script>
</body>
</html>