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
		<li><a href="<?php echo U('member/index');?>">会员列表</a></li>
		<li <?php if(empty($data["id"])): ?>class="active"<?php endif; ?>><a href="<?php echo U('member/edit');?>">添加会员</a></li>
	</ul>
	<div class="common-form">
		<form method="post" class="form-horizontal J_ajaxForm" action="<?php echo U('member/edit');?>">
			<fieldset>
				<div class="control-group">
					<label class="control-label">登陆邮箱:</label>
					<div class="controls">
						<input type="text" class="input" name="email" value="<?php echo ($data["email"]); ?>" placeholder="登陆邮箱">
						<span class="must_red">*</span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">密码:</label>
					<div class="controls">
						<input type="password" class="input" name="password" value="" placeholder="密码">
						<span class="must_red">*</span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">确认密码:</label>
					<div class="controls">
						<input type="password" class="input" name="password_confirm" value="" placeholder="确认密码">
						<span class="must_red">*</span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">手机号码:</label>
					<div class="controls">
						<input type="text" class="input" name="phone" value="<?php echo ($data["phone"]); ?>" placeholder="手机号码">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">用户昵称:</label>
					<div class="controls">
						<input type="text" class="input" name="nickname" value="<?php echo ($data["nickname"]); ?>" placeholder="用户昵称">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">真实姓名:</label>
					<div class="controls">
						<input type="text" class="input" name="truename" value="<?php echo ($data["truename"]); ?>" placeholder="真实姓名">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">性别:</label>
					<div class="controls">
						<label class="radio inline" for="active_true">
            				<input type="radio" name="sex" value="0" <?php if($data["sex"] == 0): ?>checked<?php endif; ?> id="active_true">保密
            			</label>
            			<label class="radio inline" for="active_true">
            				<input type="radio" name="sex" value="1" <?php if($data["sex"] == 1): ?>checked<?php endif; ?> id="active_true">男
            			</label>
            			<label class="radio inline" for="active_true">
            				<input type="radio" name="sex" value="2" <?php if($data["sex"] == 2): ?>checked<?php endif; ?> id="active_true">女
            			</label>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">年龄:</label>
					<div class="controls">
						<input type="text" class="input" name="age" value="<?php echo ($data["age"]); ?>" placeholder="年龄">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">身份证:</label>
					<div class="controls">
						<input type="text" class="input" name="card" value="<?php echo ($data["card"]); ?>" placeholder="身份证">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">公司:</label>
					<div class="controls">
						<input type="text" class="input" name="company" value="<?php echo ($data["company"]); ?>" placeholder="公司">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">公司网址:</label>
					<div class="controls">
						<input type="text" class="input" name="website" value="<?php echo ($data["website"]); ?>" placeholder="公司网址">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">备注:</label>
					<div class="controls">
						<textarea cols="57" rows="5" name="remark"><?php echo ($data["remark"]); ?></textarea>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">推荐人ID:</label>
					<div class="controls">
						<input type="text" class="input" name="recom_id" value="<?php echo ($data["recom_id"]); ?>" placeholder="推荐人ID">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">是否启用:</label>
					<div class="controls">
						<select class="normal_select" name="status">
							<option value="1" <?php if($data["status"] == 1): ?>selected<?php endif; ?>>启用</option>
							<option value="0" <?php if($data["status"] == 0): ?>selected<?php endif; ?>>禁用</option>
						</select>
					</div>
				</div>
			</fieldset>
			<div class="form-actions">
				<input type="hidden" name="id" value="<?php echo ($data["id"]); ?>" />
				<button type="submit" class="btn btn-primary btn_submit J_ajax_submit_btn">提交</button>
				<a class="btn" href="javascript:history.back(-1)">返回</a>
			</div>
		</form>
	</div>
</div>
<script src="/statics/admin/js/common.js"></script>

</body>
</html>