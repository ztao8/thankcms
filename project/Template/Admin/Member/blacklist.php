<extend name="Public:layout" />
<block name="container">
<div class="wrap J_check_wrap"> 
   	<ul class="nav nav-tabs">
		<li class="active"><a href="{:U('member/blacklist')}">黑白名单</a></li>
		<li><a href="{:U('member/blackadd')}">添加黑白名单</a></li>
	</ul>
	</ul>
	<form action="{:U('member/blacklist')}" method="get" class="well form-search">
		<div class="search_type cc mb10">
			<div class="mb10">
				<span class="mr20">搜索类型： 
					<select name="limit_type" class="select_2" style="width: 100px;">
						<option value="" <?php if($_GET['limit_type'] === ''){echo 'selected';}?>>不限</option>
                        <option value="0" <?php if($_GET['limit_type'] === '0'){echo 'selected';}?>>黑名单</option>
                        <option value="1" <?php if($_GET['limit_type'] == 1){echo 'selected';}?>>白名单</option>
					</select> &nbsp;&nbsp;
					创建时间：
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
				<th width="150">会员ID</th>
				<th>类型</th>
				<th>创建时间</th>
				<th>管理操作</th>
			</tr>
	    </thead> 
	    <tbody>
	    	<volist name="list" id="vo">
			<tr>
				<td>
				<a href="javascript:;" onclick="showIframe('{:U('member/show',array('id'=>$vo['member_id']))}','会员信息','80%','80%')">{$vo.member_id}</a>
				</td>
				<td>
				<if condition="$vo.limit_type eq 0">
				黑名单
				<else />
				白名单
				</if>
				</td>
				<td>{$vo.create_time|date='Y-m-d H:i:s',###}</td>
				<td>
				<a class="J_ajax_del" href="{:U('member/blackdelete',array('member_id'=>$vo['member_id']))}">删除</a>
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