<extend name="Public:layout" />
<block name="container">
<div class="wrap J_check_wrap"> 
   	<ul class="nav nav-tabs">
		<li><a href="{:U('member/show',array('id'=>$memberInfo['id']))}">会员信息</a></li>
		<li class="active"><a href="{:U('member/viplist',array('id'=>$memberInfo['id']))}">VIP申请记录</a></li>
	</ul>
	</ul>
	<form action="{:U('member/viplist')}" method="get" class="well form-search">
		<div class="search_type cc mb10">
			<div class="mb10">
				<span class="mr20">搜索类型： 
					<select name="operation" class="select_2" style="width: 100px;">
						<option value="" <?php if($_GET['operation'] === ''){echo 'selected';}?>>不限</option>
                        <option value="1" <?php if($_GET['status'] == 1){echo 'selected';}?>>会员本人</option>
                        <option value="2" <?php if($_GET['status'] == 2){echo 'selected';}?>>后台用户</option>
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
				<th width="50">ID</th>
				<th>开始时间</th>
				<th>结束时间</th>
				<th>VIP天数</th>
				<th>操作人</th>
				<th>创建时间</th>
			</tr>
	    </thead> 
	    <tbody>
	    	<volist name="data" id="vo">
			<tr>
				<td>{$vo.id}</td>
				<td>{$vo.vip_start_time|date='Y-m-d H:i:s',###}</td>
				<td>{$vo.vip_end_time|date='Y-m-d H:i:s',###}</td>
				<td>{$vo.vip_days}</td>
				<th>{$vo.operation}</th>
				<td>{$vo.create_time|date='Y-m-d H:i:s',###}</td>
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