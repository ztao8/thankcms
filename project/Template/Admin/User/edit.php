<extend name="Public:layout" />
<block name="container">
<div class="wrap jj">
	<ul class="nav nav-tabs">
		<li><a href="{:U('user/index')}">管理员</a></li>
		<li <empty name="data.id">class="active"</empty> ><a href="{:U('user/edit')}">添加管理员</a></li>
	</ul>
	<div class="common-form">
		<form method="post" class="form-horizontal J_ajaxForm" action="{:U('user/edit')}">
			<fieldset>
				<div class="control-group">
					<label class="control-label">用户名:</label>
					<div class="controls">
						<input type="text" class="input" name="username" value="{$data.username}" placeholder="用户名">
						<span class="must_red">*</span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">密码:</label>
					<div class="controls">
						<input type="password" class="input" name="password" value="" placeholder="密码">
						<span class="must_red">*</span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">确认密码:</label>
					<div class="controls">
						<input type="password" class="input" name="password_confirm" value="" placeholder="确认密码">
						<span class="must_red">*</span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">邮箱:</label>
					<div class="controls">
						<input type="text" class="input" name="email" value="{$data.email}" placeholder="邮箱">
						<span class="must_red">*</span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">真实姓名:</label>
					<div class="controls">
						<input type="text" class="input" name="truename" value="{$data.truename}" placeholder="真实姓名">
						<span class="must_red">*</span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">备注:</label>
					<div class="controls">
						<textarea cols="57" rows="5" name="remark">{$data.remark}</textarea>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">所属角色:</label>
					<div class="controls">
						<volist name="roleList" id="vo">
						<label class="checkbox inline">
							<input type="checkbox" name="role_id[]" value="{$vo.id}" <php>echo isset($access[$vo['id']]) ? checked:'';</php>>{$vo.title}
						</label>
						</volist>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">是否启用:</label>
					<div class="controls">
						<select class="normal_select" name="status">
							<option value="1" <if condition="$data.status eq 1">selected</if>>启用</option>
							<option value="0" <if condition="$data.status eq 0">selected</if>>禁用</option>
						</select>
					</div>
				</div>
			</fieldset>
			<div class="form-actions">
				<input type="hidden" name="id" value="{$data.id}" />
				<button type="submit" class="btn btn-primary btn_submit J_ajax_submit_btn">提交</button>
				<a class="btn" href="javascript:history.back(-1)">返回</a>
			</div>
		</form>
	</div>
</div>
<script src="__PUBLIC__/admin/js/common.js"></script>
</block>