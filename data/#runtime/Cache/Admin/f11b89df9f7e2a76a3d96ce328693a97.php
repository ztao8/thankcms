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
  	
<div class="wrap"> 
	<div id="home_toptip"></div> 
	<h4 class="well">系统信息</h4> 
	<div class="home_info"> 
	    <ul> 
		     <li> <em>操作系统</em> <span>WINNT</span> </li>
		     <li> <em>运行环境</em> <span>Apache/2.4.10 (Win32) OpenSSL/0.9.8zb PHP/5.3.29</span> </li>
		     <li> <em>PHP运行方式</em> <span>apache2handler</span> </li>
		     <li> <em>MYSQL版本</em> <span>未知</span> </li>
		     <li> <em>程序版本</em> <span>v1.0</li>
		     <li> <em>上传附件限制</em> <span>2M</span> </li>
		     <li> <em>执行时间限制</em> <span>30秒</span> </li>
		     <li> <em>剩余空间</em> <span>121948.93M</span> </li> 
	    </ul> 
	</div> 
</div> 

</body>
</html>