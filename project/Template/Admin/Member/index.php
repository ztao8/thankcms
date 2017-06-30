<extend name="Public:layout" />
<block name="container">
<div class="wrap J_check_wrap"> 
   	<ul class="nav nav-tabs">
		<li class="active"><a href="{:U('member/index')}">会员列表</a></li>
		<li><a href="{:U('member/edit')}">添加会员</a></li>
	</ul>
	<form action="{:U('member/index')}" method="get" class="well form-search">
		<div class="search_type cc mb10">
			<div class="mb10">
				<span class="mr20">搜索类型： 
					<select name="status" class="select_2" style="width: 100px;">
						<option value="" <?php if($_GET['status'] === ''){echo 'selected';}?>>不限</option>
                        <option value="1" <?php if($_GET['status'] == 1){echo 'selected';}?>>启用</option>
                        <option value="0" <?php if($_GET['status'] === '0'){echo 'selected';}?>>停用</option>
					</select> &nbsp;&nbsp;
					登录邮箱： 
					<input type="text" style="width: 100px;" placeholder="登陆邮箱" value="{$Think.get.email}" style="width: 200px;" name="email">
					手机号码： 
					<input type="text" style="width: 100px;" placeholder="手机号码" value="{$Think.get.phone}" style="width: 200px;" name="phone">
					注册时间：
					<input type="text" autocomplete="off" style="width: 80px;" value="{$Think.get.start_time}" class="J_date date" name="start_time">-
					<input type="text" autocomplete="off" style="width: 80px;" value="{$Think.get.end_time}" name="end_time" class="J_date date"> &nbsp; &nbsp;
					<input type="submit" value="搜索" class="btn btn-primary">
				</span>
			</div>
		</div>
	</form>
   	<table class="table table-hover table-bordered"> 
	    <thead> 
		    <tr>
				<th width="50">ID</th>
				<th>登陆邮箱</th>
				<th>手机号码</th>
				<th>最后登录IP</th>
				<th>最后登录时间</th>
				<th>注册时间</th>
				<th>状态</th>
				<th width="200">管理操作</th>
			</tr>
	    </thead> 
	    <tbody>
	    	<volist name="list" id="vo">
			<tr>
				<td>{$vo.id}</td>
				<td>{$vo.email}</td>
				<td>{$vo.phone}</td>
				<td>{$vo.last_login_ip}</td>
				<td>{$vo.last_login_time|date='Y-m-d H:i:s',###}</td>
				<td>{$vo.create_time|date='Y-m-d H:i:s',###}</td>
				<td>
					<if condition="$vo['status'] eq 1">
						<font color="red">√</font>
					<else /> 
						<font color="red">╳</font>
					</if>
				</td>
				<td>
					<a href="javascript:;" onclick="showIframe('{:U('member/show',array('id'=>$vo['id']))}','会员信息','80%','80%')">查看</a> |
					<a href="{:U('member/edit',array('id'=>$vo['id']))}">修改</a> | 
					<a class="J_ajax_del" href="{:U('member/delete',array('id'=>$vo['id']))}">删除</a> | 
					<if condition="$vo['status'] eq 1">
					<a data-msg="您确定要停用此用户吗？" class="J_ajax_dialog_btn" href="{:U('member/status',array('id'=>$vo['id'],'status'=>0))}">停用</a>
					<else />
					<a data-msg="您确定要启用此用户吗？" class="J_ajax_dialog_btn" href="{:U('member/status',array('id'=>$vo['id'],'status'=>1))}">启用</a>
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