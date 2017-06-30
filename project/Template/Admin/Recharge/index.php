<extend name="Public:layout" />
<block name="container">
<div class="wrap J_check_wrap"> 
   	<ul class="nav nav-tabs">
        <if condition="$Think.get.member_id">
            <li class="active"><a href="{:U('recharge/index',['member_id'=>$_GET['member_id']])}">充值记录</a></li>
        <else/>
            <li class="active"><a href="{:U('recharge/index')}">充值记录</a></li>
        </if>
	</ul>
	</ul>
	<form action="{:U('recharge/index')}" method="get" class="well form-search">
		<div class="search_type cc mb10">
			<div class="mb10">
				<span class="mr20">
					搜索类型：
					<select name="status" class="select_2" style="width: 100px;">
						<option value="" <?php if($_GET['status'] == ''){echo 'selected';}?>>全部</option>
						<option value="0" <?php if($_GET['status'] == '0'){echo 'selected';}?>>提交</option>
						<option value="1" <?php if($_GET['status'] == '1'){echo 'selected';}?>>成功</option>
					</select> &nbsp;&nbsp;
					会员ID：
					<input type="text" autocomplete="off" style="width: 80px;" value="{$Think.get.member_id}" name="member_id">
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
				<th width="50">ID</th>
				<th>会员ID</th>
				<th>金额</th>
				<th>备注</th>
				<th>创建时间</th>
				<th>状态</th>
				<th>操作</th>
			</tr>
	    </thead> 
	    <tbody>
	    	<volist name="list" id="vo">
			<tr>
				<td>{$vo.id}</td>
				<td>{$vo.member_id}</td>
				<td>{$vo.amount}</td>
				<th>{$vo.remark}</th>
				<td>{$vo.create_time|date='Y-m-d H:i:s',###}</td>
				<td>
					<if condition="$vo['status'] eq '0'">
						<span style="color:red">提交</span>
						<else/>
						<span style="color:green">成功</span>
					</if>
				</td>
				<td>
					<if condition="$vo['status'] eq '0'">
					<a href="">确认成功</a>
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