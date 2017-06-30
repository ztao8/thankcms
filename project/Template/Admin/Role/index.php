<extend name="Public:layout" />
<block name="container">
<div class="wrap J_check_wrap"> 
   	<ul class="nav nav-tabs">
		<li class="active"><a href="{:U('role/index')}">角色管理</a></li>
		<li><a href="{:U('role/edit')}">添加角色</a></li>
	</ul>
   	<table class="table table-hover table-bordered"> 
	    <thead> 
		    <tr>
				<th width="30">ID</th>
				<th align="left">角色名称</th>
				<th align="left">角色描述</th>
				<th width="40" align="left">状态</th>
				<th width="120">管理操作</th>
			</tr> 
	    </thead> 
	    <tbody>
	    	<volist name="list" id="vo">
			<tr>
				<td>{$vo.id}</td>
				<td>{$vo.title}</td>
				<td>{$vo.remark}</td>
				<td>
					<if condition="$vo['status'] eq 1">
						<font color="red">√</font>
					<else /> 
						<font color="red">╳</font>
					</if>
				</td>
				<td>
					<if condition="$vo['id'] eq 1">
						<font color="#cccccc">权限设置</font> |
						<font color="#cccccc">修改</font> | <font color="#cccccc">删除</font>
					<else />
						<a href="{:U('role/authorize',array('id'=>$vo['id']))}">权限设置</a>|
						<a href="{:U('role/edit',array('id'=>$vo['id']))}">修改</a>|
						<a class="J_ajax_del" href="{:U('role/delete',array('id'=>$vo['id']))}">删除</a>
					</if>
				</td>
			</tr>
			</volist>
	    </tbody> 
   	</table>
   	<div class="pagination">
   		{$page}
   	</div> 
</div>
<script src="__PUBLIC__/admin/js/common.js"></script>
</block>