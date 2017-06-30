<extend name="Public:layout" />
<block name="container">
<div class="wrap jj">
	<ul class="nav nav-tabs">
		<li><a href="{:U('member/blacklist')}">黑白名单</a></li>
		<li class="active"><a href="{:U('member/blackadd')}">添加黑白名单</a></li>
	</ul>
	<div class="common-form">
		<form method="post" class="form-horizontal J_ajaxForm" action="{:U('member/blackadd')}">
			<fieldset>
				<div class="control-group">
					<label class="control-label">会员ID:</label>
					<div class="controls">
						<input type="text" class="input" name="member_id" value="" placeholder="会员ID">
						<span class="must_red">*</span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">类型:</label>
					<div class="controls">
						<select class="normal_select" name="limit_type">
							<option value="0">黑名单</option>
							<option value="1">白名单</option>
						</select>
					</div>
				</div>
			</fieldset>
			<div class="form-actions">
				<button type="submit" class="btn btn-primary btn_submit J_ajax_submit_btn">提交</button>
				<a class="btn" href="javascript:history.back(-1)">返回</a>
			</div>
		</form>
	</div>
</div>
<script src="__PUBLIC__/admin/js/common.js"></script>
</block>