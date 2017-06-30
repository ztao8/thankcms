<extend name="Public:layout" />
<block name="container">
<div class="wrap jj">
	<ul class="nav nav-tabs">
		<li><a href="{:U('role/index')}">角色管理</a></li>
		<li <empty name="data.id">class="active"</empty>><a href="{:U('role/edit')}">添加角色</a></li>
	</ul>
	<div class="common-form">
		<form method="post" class="form-horizontal J_ajaxForm" action="{:U('role/edit')}">
			<fieldset>
				<div class="control-group">
					<label class="control-label">角色名称:</label>
					<div class="controls">
						<input type="text" class="input" name="title" value="{$data.title}" placeholder="角色名称">
						<span class="must_red">*</span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">角色描述:</label>
					<div class="controls">
						<textarea cols="57" rows="5" name="remark">{$data.remark}</textarea>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">是否开启:</label>
					<div class="controls">
						<select class="normal_select" name="status">
							<option value="1" <if condition="$data.status eq 1">selected</if>>开启</option>
							<option value="0" <if condition="$data.status eq 0">selected</if>>禁止</option>
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