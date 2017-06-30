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
		<li class="active"><a href="<?php echo U('content/index');?>">文章列表</a></li>
		<li><a href="<?php echo U('content/edit');?>">添加文章</a></li>
	</ul>
	<form class="well form-search" method="get" action="<?php echo U('content/index');?>">
		<div class="search_type cc mb10">
			<div class="mb10">
				<span class="mr20">分类： 
					<select class="select_2" name="category">
						<option value="">全部</option>
						<?php echo ($select_categorys); ?>
					</select> &nbsp;&nbsp;
					时间：
					<input type="text" name="start_time" class="J_date date" value="<?php echo ($_GET['start_time']); ?>" style="width: 80px;" autocomplete="off">-
					<input type="text" class="J_date date" name="end_time" value="<?php echo ($_GET['end_time']); ?>" style="width: 80px;" autocomplete="off"> &nbsp; &nbsp;
					关键字： 
					<input type="text" name="keyword" style="width: 200px;" value="<?php echo ($_GET['keyword']); ?>" placeholder="请输入关键字...">
					<input type="submit" class="btn btn-primary" value="搜索">
				</span>
			</div>
		</div>
	</form>
	<form class="J_ajaxForm" method="post" action>
	<div class="table-actions">
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="<?php echo U('content/listorders');?>">排序</button>
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="<?php echo U('content/change',array('operation'=>'status','status'=>1));?>" data-subcheck="true">审核</button>
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="<?php echo U('content/change',array('operation'=>'status','status'=>0));?>" data-subcheck="true">取消审核</button>
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="<?php echo U('content/change',array('operation'=>'istop','istop'=>1));?>" data-subcheck="true">置顶</button>
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="<?php echo U('content/change',array('operation'=>'istop','istop'=>0));?>" data-subcheck="true">取消置顶</button>
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="<?php echo U('content/change',array('operation'=>'isrecom','isrecom'=>1));?>" data-subcheck="true">推荐</button>
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="<?php echo U('content/change',array('operation'=>'isrecom','isrecom'=>0));?>" data-subcheck="true">取消推荐</button>
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="<?php echo U('content/change',array('operation'=>'ishot','ishot'=>1));?>" data-subcheck="true">热门</button>
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="<?php echo U('content/change',array('operation'=>'ishot','ishot'=>0));?>" data-subcheck="true">取消热门</button>
	</div>
   	<table class="table table-hover table-bordered table-list"> 
	    <thead> 
		    <tr>
				<th width="15"><label><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></label></th>
				<th width="50">排序</th>
				<th>标题</th>
				<th width="150">所属栏目</th>
				<th width="50">点击量</th>
				<th width="120">发布时间</th>
				<th width="180">状态</th>
				<th width="60">操作</th>
			</tr>
	    </thead> 
	    <tbody>
	    	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				<td><input type="checkbox" class="J_check" data-yid="J_check_y" data-xid="J_check_x" name="id[]" value="<?php echo ($vo["id"]); ?>" title="ID:<?php echo ($vo["id"]); ?>"></td>
				<td><input name="listorders[<?php echo ($vo["id"]); ?>]" class="input input-order" type="text" size="5" value="<?php echo ($vo["listorder"]); ?>" title="ID:<?php echo ($vo["id"]); ?>"></td>
				<td><a href="" target="_blank"> <span><?php echo ($vo["title"]); ?></span></a></td>
				<td><?php echo ($category_array[$vo['category']]['name']); ?></td>
				<td><?php echo ($vo["hits"]); ?></td>
				<td><?php echo (date('Y-m-d H:i:s',$vo["post_time"])); ?></td>
				<td>
				<?php if($vo["status"] == 1): ?><a href="<?php echo U('content/change',array('operation'=>'status','id'=>$vo['id'],'status'=>0));?>">已审核</a>
				<?php else: ?>
				<a href="<?php echo U('content/change',array('operation'=>'status','id'=>$vo['id'],'status'=>1));?>" style="color:red;">未审核</a><?php endif; ?> | 
				<?php if($vo["istop"] == 1): ?><a href="<?php echo U('content/change',array('operation'=>'istop','id'=>$vo['id'],'istop'=>0));?>">已置顶</a>
				<?php else: ?>
				<a href="<?php echo U('content/change',array('operation'=>'istop','id'=>$vo['id'],'istop'=>1));?>" style="color:red;">未置顶</a><?php endif; ?> | 
				<?php if($vo["isrecom"] == 1): ?><a href="<?php echo U('content/change',array('operation'=>'isrecom','id'=>$vo['id'],'isrecom'=>0));?>">已推荐</a>
				<?php else: ?>
				<a href="<?php echo U('content/change',array('operation'=>'isrecom','id'=>$vo['id'],'isrecom'=>1));?>" style="color:red;">未推荐</a><?php endif; ?> | 
				<?php if($vo["ishot"] == 1): ?><a href="<?php echo U('content/change',array('operation'=>'ishot','id'=>$vo['id'],'ishot'=>0));?>">已热门</a>
				<?php else: ?>
				<a href="<?php echo U('content/change',array('operation'=>'ishot','id'=>$vo['id'],'ishot'=>1));?>" style="color:red;">未热门</a><?php endif; ?>
				</td>
				<td>
					<a href="<?php echo U('content/edit',array('id'=>$vo['id']));?>">修改</a> |
					<a href="<?php echo U('content/delete',array('id'=>$vo['id']));?>" class="J_ajax_del">删除</a>
				</td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	    </tbody> 
   	</table>
   	<div class="table-actions">
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="<?php echo U('content/listorders');?>">排序</button>
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="<?php echo U('content/change',array('operation'=>'status','status'=>1));?>" data-subcheck="true">审核</button>
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="<?php echo U('content/change',array('operation'=>'status','status'=>0));?>" data-subcheck="true">取消审核</button>
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="<?php echo U('content/change',array('operation'=>'istop','istop'=>1));?>" data-subcheck="true">置顶</button>
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="<?php echo U('content/change',array('operation'=>'istop','istop'=>0));?>" data-subcheck="true">取消置顶</button>
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="<?php echo U('content/change',array('operation'=>'isrecom','isrecom'=>1));?>" data-subcheck="true">推荐</button>
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="<?php echo U('content/change',array('operation'=>'isrecom','isrecom'=>0));?>" data-subcheck="true">取消推荐</button>
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="<?php echo U('content/change',array('operation'=>'ishot','ishot'=>1));?>" data-subcheck="true">热门</button>
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="<?php echo U('content/change',array('operation'=>'ishot','ishot'=>0));?>" data-subcheck="true">取消热门</button>
	</div>
	</form>
   	<div class="pagination">
   		<?php echo ($page); ?>
   	</div> 
</div>
<script src="/statics/admin/js/common.js"></script>

</body>
</html>