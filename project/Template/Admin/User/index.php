<extend name="Public:layout" />
<block name="container">
<div class="wrap J_check_wrap"> 
   	<ul class="nav nav-tabs">
		<li class="active"><a href="{:U('user/index')}">管理员</a></li>
		<li><a href="{:U('user/edit')}">添加管理员</a></li>
	</ul>
   	<table class="table table-hover table-bordered"> 
	    <thead> 
		    <tr>
				<th width="50">ID</th>
				<th>用户名</th>
				<th>最后登录IP</th>
				<th>最后登录时间</th>
				<th>E-mail</th>
				<th>状态</th>
				<th width="120">管理操作</th>
			</tr>
	    </thead> 
	    <tbody>
	    	<volist name="list" id="vo">
			<tr>
				<td>{$vo.id}</td>
				<td>{$vo.username}</td>
				<td>{$vo.last_login_ip}</td>
				<td>{$vo.last_login_time|date='Y-m-d H:i:s',###}</td>
				<td>{$vo.email}</td>
				<td>
					<if condition="$vo['status'] eq 1">
						<font color="red">√</font>
					<else /> 
						<font color="red">╳</font>
					</if>
				</td>
				<td>
					<if condition="$vo['id'] eq 1">
						<font color="#cccccc">修改</font> | <font color="#cccccc">删除</font>
						 | <font color="#cccccc">停用</font>
					<else />
						<a href="{:U('user/edit',array('id'=>$vo['id']))}">修改</a> | 
						<a class="J_ajax_del" href="{:U('user/delete',array('id'=>$vo['id']))}">删除</a> | 
						<if condition="$vo['status'] eq 1">
						<a data-msg="您确定要停用此用户吗？" class="J_ajax_dialog_btn" href="{:U('user/status',array('id'=>$vo['id'],'status'=>0))}">停用</a>
						<else />
						<a data-msg="您确定要启用此用户吗？" class="J_ajax_dialog_btn" href="{:U('user/status',array('id'=>$vo['id'],'status'=>1))}">启用</a>
						</if>
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