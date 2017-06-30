<extend name="Public:layout" />
<block name="container">
<div class="wrap J_check_wrap"> 
   	<ul class="nav nav-tabs">
		<li><a href="{:U('category/index')}">分类列表</a></li>
		<li><a href="{:U('category/edit')}">添加分类</a></li>
		<li class="active"><a href="{:U('category/lists')}">所有分类</a></li>
	</ul>
	<form class="J_ajaxForm" method="post" action="{:U('category/listorders')}">
	<div class="table-actions">
		<button type="submit" class="btn btn_submit btn-primary btn-small J_ajax_submit_btn">排序</button>
	</div>
   	<table class="table table-hover table-bordered table-list"> 
	    <thead> 
		    <tr>
				<th width="80">排序</th>
				<th width="100">ID</th>
				<th>分类名称</th>
				<th width="40">状态</th>
				<th width="80">管理操作</th>
			</tr> 
	    </thead> 
	    <tbody> 
	    	<foreach name="categorys" item="vo">
			<tr>
				<td><input name="listorders[{$vo.id}]" type="text" size="3" value="{$vo.listorder}" class="input input-order"></td>
				<td>{$vo.id}</td>
				<td>{$vo.name}</td>
				<td>
				<if condition="$vo['status'] eq 1"> 
				显示
				<else /> 
				隐藏
				</if>
				</td>
				<td>
					<a href="{:U('category/edit',array('id'=>$vo['id']))}">修改</a> | 
					<a class="J_ajax_del" href="{:U('category/delete',array('id'=>$vo['id']))}">删除</a>
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