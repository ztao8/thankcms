<extend name="Public:layout" />
<block name="container">
<div class="wrap J_check_wrap"> 
   	<ul class="nav nav-tabs">
		<li><a href="{:U('menu/index')}">后台菜单</a></li>
		<li><a href="{:U('menu/edit')}">添加菜单</a></li>
		<li class="active"><a href="{:U('menu/lists')}">所有菜单</a></li>
	</ul>
	<form class="J_ajaxForm" method="post" action="{:U('menu/listorders')}">
	<div class="table-actions">
		<button type="submit" class="btn btn_submit btn-primary btn-small J_ajax_submit_btn">排序</button>
	</div>
   	<table class="table table-hover table-bordered table-list"> 
	    <thead> 
		    <tr>
				<th width="50">排序</th>
				<th width="50">ID</th>
				<th>菜单英文名称</th>
				<th width="40">状态</th>
				<th width="80">管理操作</th>
			</tr> 
	    </thead> 
	    <tbody> 
	    	<foreach name="menus" item="vo">
			<tr>
				<td><input name="listorders[{$vo.id}]" type="text" size="3" value="{$vo.listorder}" class="input input-order"></td>
				<td>{$vo.id}</td>
				<td>{$vo.title}:{$vo.name}</td>
				<td>
				<if condition="$vo['status'] eq 1"> 
				显示
				<else /> 
				隐藏
				</if>
				</td>
				<td>
					<a href="{:U('menu/edit',array('id'=>$vo['id']))}">修改</a> | 
					<a class="J_ajax_del" href="{:U('menu/delete',array('id'=>$vo['id']))}">删除</a>
				</td>
			</tr>
			</foreach>
	    </tbody> 
   	</table>
   	<div class="table-actions">
		<button type="submit" class="btn btn_submit btn-primary btn-small J_ajax_submit_btn">排序</button>
	</div>
	</form>
   	<div class="pagination"></div> 
</div>
<script src="__PUBLIC__/admin/js/common.js"></script>
</block>