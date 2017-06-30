<extend name="Public:layout" />
<block name="container">
<div class="wrap jj">
	<ul class="nav nav-tabs">
		<li><a href="{:U('category/index')}">分类列表</a></li>
		<li <empty name="data.id">class="active"</empty>><a href="{:U('category/edit')}">添加分类</a></li>
		<li><a href="{:U('category/lists')}">所有分类</a></li>
	</ul>
	<div class="common-form">
		<form method="post" class="form-horizontal J_ajaxForm" action="{:U('category/edit')}">
			<fieldset>
				<div class="control-group">
					<label class="control-label">上级:</label>
					<div class="controls">
						<select class="normal_select" name="parentid">
							<option value="0">作为一级分类</option>
							{$select_categorys}
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">分类名称:</label>
					<div class="controls">
						<input type="text" class="input" name="name" value="{$data.name}" placeholder="分类名称">
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
					<label class="control-label">状态:</label>
					<div class="controls">
						<select class="normal_select" name="status">
							<option value="1" <if condition="$data.status eq 1">selected</if>>显示</option>
							<option value="0" <if condition="$data.status eq 0">selected</if>>隐藏</option>
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