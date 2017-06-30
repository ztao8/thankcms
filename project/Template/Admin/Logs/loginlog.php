<extend name="Public:layout" />
<block name="container">
<div class="wrap J_check_wrap"> 
   	<ul class="nav nav-tabs">
		<li class="active"><a href="{:U('logs/loginlog')}">登陆日志</a></li>
		<li><a href="{:U('logs/deleteloginlog')}">删除一个月前登陆日志</a></li>
	</ul>
	<form action="{:U('logs/loginlog')}" method="get" class="well form-search">
		<div class="search_type cc mb10">
			<div class="mb10">
				<span class="mr20">搜索类型： 
					<select name="status" class="select_2" style="width: 100px;">
						<option value="" <?php if($_GET['status'] === ''){echo 'selected';}?>>不限</option>
                        <option value="1" <?php if($_GET['status'] == 1){echo 'selected';}?>>success</option>
                        <option value="0" <?php if($_GET['status'] === '0'){echo 'selected';}?>>error</option>
					</select> &nbsp;&nbsp;
					用户名： 
					<input type="text" style="width: 100px;" placeholder="用户名" value="{$Think.get.username}" style="width: 200px;" name="username">
					IP： 
					<input type="text" style="width: 100px;" placeholder="IP" value="{$Think.get.ip}" style="width: 200px;" name="ip">
					时间：
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
				<th width="100">ID</th>
                <th width="200">用户名</th>
                <th width="150">状态</th>
                <th width="*">其他说明</th>
                <th width="150">时间</th>
                <th width="100">IP</th>
			</tr>
	    </thead> 
	    <tbody>
	    	<volist name="list" id="vo">
			<tr>
				<td>{$vo.id}</td>
				<td>{$vo.username}</td>
				<td>
	                <if condition="$vo.status eq 1">
	                succuss
	                <else />
	                error
	                </if>
                </td>
				<td>{$vo.info}</td>
                <td>{$vo.logintime|date='Y-m-d H:i:s',###}</td>
                <td>{$vo.loginip}</td>
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