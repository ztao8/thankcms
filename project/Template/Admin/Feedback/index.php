<extend name="Public:layout" />
<block name="container">
<div class="wrap J_check_wrap"> 
   	<ul class="nav nav-tabs">
		<li class="active"><a href="{:U('feedback/index')}">反馈列表</a></li>
	</ul>
   	<table class="table table-hover table-bordered"> 
	    <thead> 
		    <tr>
				<th>ID</th>
				<th>会员ID</th>
				<th>反馈分类</th>
				<th>反馈内容</th>
				<th>反馈图片</th>
				<th>回复内容</th>
				<th>回复用户</th>
				<th>反馈时间</th>
				<th>回复时间</th>
				<th>是否回复</th>
				<th width="50">操作</th>
			</tr>
	    </thead> 
	    <tbody>
	    	<volist name="list" id="vo">
			<tr>
				<td>{$vo.id}</td>
				<td><a href="javascript:;" onclick="showIframe('{:U('member/show',array('id'=>$vo['member_id']))}','会员信息','1000px','400px')">{$vo.member_id}</a></td>
				<td>
					<if condition="$vo['category'] eq 1">
						需求提交
					<else/>
						问题反馈
					</if>
				</td>
				<td>{$vo.content}</td>
				<td>
					<php>
						$picture_arr = explode(',',$vo['picture']);
						foreach($picture_arr as $key => $val){
							echo '<a target="_blank" href="'.$val.'">查看'.($key+1).'</a>  ';
						}
					</php>
				</td>
				<td>{$vo.feedback}</td>
				<td>{$vo.username}</td>
				<td>{$vo.create_time|date='Y-m-d H:i:s',###}</td>
				<td>{$vo.update_time|date='Y-m-d H:i:s',###}</td>
				<td>
					<if condition="$vo['status'] eq 1">
						<font color="red">√</font>
					<else /> 
						<font color="red">╳</font>
					</if>
				</td>
				<td>
					<a href="JavaScript:;" onclick="showIframe('{:U('feedback/back',array('id'=>$vo['id']))}','回复反馈信息','500px','300px')">回复</a>
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
<script>
function refresh(){
	var refresh = getCookie('_FEEDBACK_REFRESH_');
	if(refresh == '1'){
		location.reload();
		setCookie('_FEEDBACK_REFRESH_','');
	}
}
setInterval("refresh()",1000);
</script>
</block>