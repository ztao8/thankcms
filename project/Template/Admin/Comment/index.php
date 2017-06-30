<extend name="Public:layout" />
<block name="container">
<div class="wrap J_check_wrap"> 
   	<ul class="nav nav-tabs">
		<li class="active"><a href="{:U('comment/index')}">评论列表</a></li>
	</ul>
	<form action="{:U('comment/index')}" method="get" class="well form-search">
		<div class="search_type cc mb10">
			<div class="mb10">
				<span class="mr20">
					搜索类型： 
					<select name="belong" class="select_2" style="width: 100px;">
						<option value="" <?php if($_GET['belong'] === ''){echo 'selected';}?>>不限</option>
                        <volist name=":getCommentArray()" id="vo">
                        <option value="{$key}" <?php if($_GET['belong'] == "$key"){echo 'selected';}?>>{$vo}</option>
                        </volist>
					</select> &nbsp;&nbsp;
					<input type="text" placeholder="所属ID"  style="width: 80px;" value="{$Think.get.belong_id}" style="width: 200px;" name="belong_id">&nbsp;&nbsp;
					状态： 
					<select name="status" class="select_2" style="width: 100px;">
						<option value="" <?php if($_GET['status'] === ''){echo 'selected';}?>>不限</option>
                        <option value="0" <?php if($_GET['status'] === '0'){echo 'selected';}?>>未审核</option>
                        <option value="1" <?php if($_GET['status'] == 1){echo 'selected';}?>>已审核</option>
					</select> &nbsp;&nbsp;
					评论时间：
					<input type="text" autocomplete="off" style="width: 80px;" value="{$Think.get.start_time}" class="J_date date" name="start_time">-
					<input type="text" autocomplete="off" style="width: 80px;" value="{$Think.get.end_time}" name="end_time" class="J_date date"> &nbsp; &nbsp;
					<input type="submit" value="搜索" class="btn btn-primary">
				</span>
			</div>
		</div>
	</form>
	<form class="J_ajaxForm" method="post">
	<div class="table-actions">
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="{:U('admin/comment/status',array('status'=>1))}" data-subcheck="true">审核</button>
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="{:U('admin/comment/status',array('status'=>0))}" data-subcheck="true">取消审核</button>
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="{:U('admin/comment/delete')}" data-subcheck="true" data-msg="你确定删除吗？">删除</button>
	</div>
   	<table class="table table-hover table-bordered"> 
	    <thead> 
		    <tr>
				<th width="15"><label><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></label></th>
				<th width="50">ID</th>
				<th width="100">评论所属</th>
				<th width="100">评论所属ID</th>
				<th width="100">用户名/姓名</th>
				<th width="150">邮箱</th>
				<th width="150">手机号码</th>
				<th>内容</th>
				<th width="120">评论时间</th>
				<th width="100">是否审核</th>
				<th width="50">操作</th>
			</tr>
	    </thead> 
	    <tbody>
	    	<volist name="list" id="vo">
			<tr>
				<td><input type="checkbox" class="J_check" data-yid="J_check_y" data-xid="J_check_x" name="ids[]" value="{$vo.id}"></td>
				<td>{$vo.id}</td>
				<td>{:getCommentArray($vo['belong'])}</td>
				<td>{$vo.belong_id}</td>
				<td>{$vo.name}</td>
				<td>{$vo.email}</td>
				<td>{$vo.phone}</td>
				<td>{$vo.content}</td>
				<td>{$vo.create_time|date='Y-m-d H:i:s',###}</td>
				<td>
					<if condition="$vo['status'] eq 1">
						<a data-msg="您确定要取消审核？" class="J_ajax_dialog_btn" href="{:U('comment/status',array('id'=>$vo['id'],'status'=>0))}"><font color="green">已审核</font></a>
					<else /> 
						<a data-msg="您确定要审核？" class="J_ajax_dialog_btn" href="{:U('comment/status',array('id'=>$vo['id'],'status'=>1))}"><font color="red">未审核</font></a>
					</if>
				</td>
				<td>
					<a class="J_ajax_del" href="{:U('comment/delete',array('id'=>$vo['id']))}">删除</a>
				</td>
			</tr>
			</volist>
	    </tbody> 
   	</table>
   	<div class="table-actions">
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="{:U('admin/comment/status',array('status'=>1))}" data-subcheck="true">审核</button>
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="{:U('admin/comment/status',array('status'=>0))}" data-subcheck="true">取消审核</button>
		<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="{:U('admin/comment/delete')}" data-subcheck="true" data-msg="你确定删除吗？">删除</button>
	</div>
	</form>
   	<div class="pagination">
   		{$page}
   	</div> 
</div>
<script src="__PUBLIC__/admin/js/common.js"></script>
</block>