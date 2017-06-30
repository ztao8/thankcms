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
        <?php if($Think.get.member_id): ?><li class="active"><a href="<?php echo U('recharge/index',['member_id'=>$_GET['member_id']]);?>">充值记录</a></li>
        <?php else: ?>
            <li class="active"><a href="<?php echo U('recharge/index');?>">充值记录</a></li><?php endif; ?>
	</ul>
	</ul>
	<form action="<?php echo U('recharge/index');?>" method="get" class="well form-search">
		<div class="search_type cc mb10">
			<div class="mb10">
				<span class="mr20">
					搜索类型：
					<select name="status" class="select_2" style="width: 100px;">
						<option value="" <?php if($_GET['status'] == ''){echo 'selected';}?>>全部</option>
						<option value="0" <?php if($_GET['status'] == '0'){echo 'selected';}?>>提交</option>
						<option value="1" <?php if($_GET['status'] == '1'){echo 'selected';}?>>成功</option>
					</select> &nbsp;&nbsp;
					会员ID：
					<input type="text" autocomplete="off" style="width: 80px;" value="<?php echo ($_GET['member_id']); ?>" name="member_id">
					创建时间：
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
				<th>会员ID</th>
				<th>金额</th>
				<th>备注</th>
				<th>创建时间</th>
				<th>状态</th>
				<th>操作</th>
			</tr>
	    </thead> 
	    <tbody>
	    	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				<td><?php echo ($vo["id"]); ?></td>
				<td><?php echo ($vo["member_id"]); ?></td>
				<td><?php echo ($vo["amount"]); ?></td>
				<th><?php echo ($vo["remark"]); ?></th>
				<td><?php echo (date('Y-m-d H:i:s',$vo["create_time"])); ?></td>
				<td>
					<?php if($vo['status'] == '0'): ?><span style="color:red">提交</span>
						<?php else: ?>
						<span style="color:green">成功</span><?php endif; ?>
				</td>
				<td>
					<?php if($vo['status'] == '0'): ?><a href="">确认成功</a><?php endif; ?>
				</td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	    </tbody> 
   	</table>
   	<div class="pagination">
   		<?php echo ($page); ?>
   	</div> 
</div>
<script src="/statics/admin/js/common.js"></script>

</body>
</html>