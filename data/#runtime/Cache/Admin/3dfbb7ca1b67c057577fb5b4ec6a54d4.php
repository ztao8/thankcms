<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8" /> 
<!-- Set render engine for 360 browser --> 
<meta name="renderer" content="webkit" /> 
<meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<!-- HTML5 shim for IE8 support of HTML5 elements --> 
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]--> 
<link href="/statics/admin/themes/flat/theme.min.css" rel="stylesheet" /> 
<link href="/statics/admin/css/simplebootadmin.css" rel="stylesheet" /> 
<link href="/statics/admin/js/artDialog/skins/default.css" rel="stylesheet" /> 
<link href="/statics/admin/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" /> 
<style>
.length_3{width: 180px;}
form .input-order{margin-bottom: 0px;padding:3px;width:40px;}
.table-actions{margin-top: 5px; margin-bottom: 5px;padding:0px;}
.table-list{margin-bottom: 0px;}
</style> 
<!--[if IE 7]>
<link rel="stylesheet" href="/statics/admin/font-awesome/4.2.0/css/font-awesome-ie7.min.css">
<![endif]--> 
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "<?php echo U('/');?>",
    JS_ROOT: "statics/admin/js/",
    TOKEN: ""
};
var SITE_URL = "<?php echo SITE_URL;?>";
var SITE_MEMBER_URL = "<?php echo SITE_MEMBER_URL;?>";
var SITE_MANAGE_URL = "<?php echo SITE_MANAGE_URL;?>";
var UPLOAG_IMAGE_URL = "<?php echo UPLOAG_MAGE_URL;?>";
</script> 
<script src="/statics/admin/js/jquery.js"></script> 
<script src="/statics/admin/js/wind.js"></script> 
<script src="/statics/admin/bootstrap/js/bootstrap.min.js"></script>
<script src="/statics/plugin/layer/layer.js"></script>
<style>
#think_page_trace_open{z-index:9999;}
.home_info li em {float: left;width: 100px;font-style: normal;}
li {list-style: none;}
</style> 
</head> 
<body class="J_scroll_fixed">
  	
<div class="wrap jj">
	<ul class="nav nav-tabs">
		<li class="active"><a href="<?php echo U('user/userinfo');?>">修改信息</a></li>
		<li><a href="<?php echo U('setting/password');?>">修改密码</a></li>
	</ul>
	<div class="common-form">
		<form method="post" class="form-horizontal J_ajaxForm" action="<?php echo U('user/userinfo');?>">
			<fieldset>
				<div class="control-group">
					<label class="control-label">用户名:</label>
					<div class="controls">
						<?php echo ($username); ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">邮箱:</label>
					<div class="controls">
						<input type="text" class="input" name="email" value="<?php echo ($email); ?>" placeholder="邮箱">
						<span class="must_red">*</span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">真实姓名:</label>
					<div class="controls">
						<input type="text" class="input" name="truename" value="<?php echo ($truename); ?>" placeholder="真实姓名">
						<span class="must_red">*</span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">备注:</label>
					<div class="controls">
						<textarea cols="57" rows="5" name="remark"><?php echo ($remark); ?></textarea>
					</div>
				</div>
			</fieldset>
			<div class="form-actions">
				<input type="hidden" name="id" value="<?php echo ($id); ?>" />
				<button type="submit" class="btn btn-primary btn_submit J_ajax_submit_btn">更新</button>
				<a class="btn" href="javascript:history.back(-1)">返回</a>
			</div>
		</form>
	</div>
</div>
<script src="/statics/admin/js/common.js"></script>

</body>
</html>