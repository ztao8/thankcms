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
  	
<div class="wrap J_check_wrap"> 
   	<ul class="nav nav-tabs">
		<li class="active"><a href="<?php echo U('logs/operationlog');?>">操作日志</a></li>
		<li><a href="<?php echo U('logs/deletelog');?>">删除一个月前操作日志</a></li>
	</ul>
	<form action="<?php echo U('logs/operationlog');?>" method="get" class="well form-search">
		<div class="search_type cc mb10">
			<div class="mb10">
				<span class="mr20">搜索类型： 
					<select name="status" class="select_2" style="width: 100px;">
						<option value="" <?php if($_GET['status'] === ''){echo 'selected';}?>>不限</option>
                        <option value="1" <?php if($_GET['status'] == 1){echo 'selected';}?>>success</option>
                        <option value="0" <?php if($_GET['status'] === '0'){echo 'selected';}?>>error</option>
					</select> &nbsp;&nbsp;
					用户ID： 
					<input type="text" style="width: 100px;" placeholder="用户ID" value="<?php echo ($_GET['uid']); ?>" style="width: 200px;" name="uid">
					用户名： 
					<input type="text" style="width: 100px;" placeholder="用户名" value="<?php echo ($_GET['username']); ?>" style="width: 200px;" name="username">
					IP： 
					<input type="text" style="width: 100px;" placeholder="用户名" value="<?php echo ($_GET['ip']); ?>" style="width: 200px;" name="ip">
					时间：
					<input type="text" autocomplete="off" style="width: 80px;" value="<?php echo ($_GET['start_time']); ?>" class="J_date date" name="start_time">-
					<input type="text" autocomplete="off" style="width: 80px;" value="<?php echo ($_GET['end_time']); ?>" name="end_time" class="J_date date"> &nbsp; &nbsp;
					<input type="submit" value="搜索" class="btn btn-primary">
				</span>
			</div>
		</div>
	</form>
   	<table class="table table-hover table-bordered"> 
	    <thead> 
		    <tr>
				<th width="50">ID</th>
                <th width="80">用户ID</th>
                <th width="80">用户名</th>
                <th width="50">状态</th>
                <th width="100">GET</th>
                <th width="*">说明</th>
                <th width="120">时间</th>
                <th width="100">IP</th>
			</tr>
	    </thead> 
	    <tbody>
	    	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				<td><?php echo ($vo["id"]); ?></td>
                <td><?php echo ($vo["uid"]); ?></td>
                <td><?php echo ($vo["username"]); ?></td>
                <td>
                	<?php if($vo["status"] == 1): ?>succuss
                    <?php else: ?>
                    error<?php endif; ?>
                </td>
                <td><?php echo (str_replace(C('SITE_MANAGE_URL'),'',$vo["get"])); ?></td>
                <td><?php echo ($vo["info"]); ?></td>
                <td><?php echo (date('Y-m-d H:i:s',$vo["time"])); ?></td>
                <td><?php echo ($vo["ip"]); ?></td><?php endforeach; endif; else: echo "" ;endif; ?>
	    </tbody> 
   	</table>
   	<div class="pagination">
   		<?php echo ($page); ?>
   	</div> 
</div>
<script src="/statics/admin/js/common.js"></script>

</body>
</html>