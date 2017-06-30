<extend name="Public:layout" />
<block name="container">
<div class="wrap jj">
	<ul class="nav nav-tabs">
		<li class="active"><a href="{:U('member/show',array('id'=>$data['id']))}">会员信息</a></li>
		<li><a href="{:U('recharge/index',array('member_id'=>$data['id']))}">充值记录</a></li>
	</ul>
	<div class="common-form">
		<div class="table_list">
	        <table width="100%" cellspacing="0" class="table table-bordered">
	            <tbody>
		            <tr>
		        	    <td width="100" >登陆邮箱 </td>
		        	    <td>{$data.email}</td>
		        	    <td width="100" >手机号码 </td>
		        	    <td>{$data.phone}</td>
		          	</tr>
		          	<tr>
		        	    <td width="100">账户余额</td>
		        	    <td style="color:red">{$data.amount}元</td>
		        	    <td width="100">现金卷 </td>
		        	    <td style="color:red">{$data.cash}元</td>
		          	</tr>
		          	<tr>
		        	    <td width="100">用户昵称</td>
		        	    <td>{$data.nickname}</td>
		        	    <td width="100">真实姓名 </td>
		        	    <td>{$data.truename}</td>
		          	</tr>
		          	<tr>
		        	    <td width="100">性别</td>
		        	    <td>{:getSexName($data['sex'])}</td>
		        	    <td width="100">年龄 </td>
		        	    <td>{$data.age}</td>
		          	</tr>
		          	<tr>
		        	    <td width="100">身份证</td>
		        	    <td>{$data.card}</td>
		        	    <td width="100">公司</td>
		        	    <td>{$data.company}</td>
		          	</tr>
		          	<tr>
		        	    <td width="100">公司网址</td>
		        	    <td>{$data.website}</td>
		        	    <td width="100">推荐人ID</td>
		        	    <td>
		        	    <if condition="$data.recom_id eq 0">
		        	           无
		        	    <else />
		        	    <a href="javascript:;" onclick="showIframe('{:U('member/show',array('id'=>$data['recom_id']))}','会员信息')">{$data.recom_id}</a>
		        	    </if>
		        	    </td>
		          	</tr>
		          	<tr>
		        	    <td width="100">备注</td>
		        	    <td>{$data.remark}</td>
		        	    <td width="100">状态</td>
		        	    <td>{:getStatusName($data['status'])}</td>
		          	</tr>
	           </tbody>
	        </table>
	    </div>
	</div>
</div>
<script src="__PUBLIC__/admin/js/common.js"></script>
</block>