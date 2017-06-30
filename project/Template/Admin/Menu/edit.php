<extend name="Public:layout" />
<block name="container">
<div class="wrap jj">
	<ul class="nav nav-tabs">
		<li><a href="{:U('menu/index')}">后台菜单</a></li>
		<li <empty name="data.id">class="active"</empty> ><a href="{:U('menu/edit')}">添加菜单</a></li>
		<li><a href="{:U('menu/lists')}">所有菜单</a></li>
	</ul>
	<div class="common-form">
		<form method="post" class="form-horizontal J_ajaxForm" action="{:U('menu/edit')}">
			<fieldset>
				<div class="control-group">
					<label class="control-label">上级:</label>
					<div class="controls">
						<select class="normal_select" name="parentid">
							<option value="0">作为一级菜单</option>
							{$select_categorys}
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">名称:</label>
					<div class="controls">
						<input type="text" class="input" name="title" value="{$data.title}" placeholder="菜单">
						<span class="must_red">*</span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">模块:</label>
					<div class="controls">
						<input type="text" class="input" name="app" value="{$data.app}" placeholder="admin">
						<span class="must_red">*</span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">控制器:</label>
					<div class="controls">
						<input type="text" class="input" name="controller" value="{$data.controller}" placeholder="index">
						<span class="must_red">*</span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">方法:</label>
					<div class="controls">
						<input type="text" class="input" name="action" value="{$data.action}" placeholder="index">
						<span class="must_red">*</span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">参数:</label>
					<div class="controls">
						<input type="text" class="input" name="condition" value="{$data.condition}" placeholder="id=3&p=3">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">图标:</label>
					<div class="controls">
						<input type="text" class="input" name="icon" value="{$data.icon}" placeholder="icon">
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
				<div class="control-group">
					<label class="control-label">类型:</label>
					<div class="controls">
						<select class="normal_select" name="type">
							<option selected="" value="1" <if condition="$data.type eq 1">selected</if>>权限认证+菜单</option>
							<option value="0" <if condition="$data.type eq 0">selected</if>>只作为菜单</option>
						</select>
						注意：“权限认证+菜单”表示加入后台权限管理，纯碎是菜单项请不要选择此项。
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