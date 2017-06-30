<extend name="Public:layout" />
<block name="container">
<div class="wrap jj">
	<ul class="nav nav-tabs">
		<li class="active"><a href="{:U('user/userinfo')}">修改信息</a></li>
		<li><a href="{:U('setting/password')}">修改密码</a></li>
	</ul>
	<div class="common-form">
		<form method="post" class="form-horizontal J_ajaxForm" action="{:U('user/userinfo')}">
			<fieldset>
				<div class="control-group">
					<label class="control-label">用户名:</label>
					<div class="controls">
						{$username}
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">邮箱:</label>
					<div class="controls">
						<input type="text" class="input" name="email" value="{$email}" placeholder="邮箱">
						<span class="must_red">*</span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">真实姓名:</label>
					<div class="controls">
						<input type="text" class="input" name="truename" value="{$truename}" placeholder="真实姓名">
						<span class="must_red">*</span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">备注:</label>
					<div class="controls">
						<textarea cols="57" rows="5" name="remark">{$remark}</textarea>
					</div>
				</div>
			</fieldset>
			<div class="form-actions">
				<input type="hidden" name="id" value="{$id}" />
				<button type="submit" class="btn btn-primary btn_submit J_ajax_submit_btn">更新</button>
				<a class="btn" href="javascript:history.back(-1)">返回</a>
			</div>
		</form>
	</div>
</div>
<script src="__PUBLIC__/admin/js/common.js"></script>
</block>