<extend name="Public:layout" />
<block name="container">
<div class="wrap J_check_wrap"> 
   	<ul class="nav nav-tabs">
		<li class="active"><a href="{:U('menu/index')}">后台菜单</a></li>
		<li><a href="{:U('menu/edit')}">添加菜单</a></li>
		<li><a href="{:U('menu/lists')}">所有菜单</a></li>
	</ul>
	<form class="J_ajaxForm" method="post" action="{:U('menu/listorders')}">
	<div class="table-actions">
		<button type="submit" class="btn btn_submit btn-primary btn-small J_ajax_submit_btn">排序</button>
	</div>
   	<table class="table table-hover table-bordered table-list treeTable" id="menus-table"> 
	    <thead> 
		    <tr>
				<th width="80">排序</th>
				<th width="50">ID</th>
				<th>应用</th>
				<th>菜单名称</th>
				<th width="80">状态</th>
				<th width="150">管理操作</th>
			</tr> 
	    </thead> 
	    <tbody> 
	    	{$categorys}
	    </tbody> 
   	</table>
   	<div class="table-actions">
		<button type="submit" class="btn btn_submit btn-primary btn-small J_ajax_submit_btn">排序</button>
	</div>
	</form>
   	<div class="pagination"></div> 
</div>
<script src="__PUBLIC__/admin/js/common.js"></script>
<script>
	$(document).ready(function() {
		Wind.css('treeTable');
		Wind.use('treeTable', function() {
			$("#menus-table").treeTable({
				indent : 20
			});
		});
	});

	setInterval(function() {
		var refersh_time = getCookie('refersh_time_admin_menu_index');
		if (refersh_time == 1) {
			reloadPage(window);
		}
	}, 1000);
	setCookie('refersh_time_admin_menu_index', 0);
</script>
</block>