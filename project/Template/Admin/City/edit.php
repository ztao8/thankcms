<extend name="Public:layout" />
<block name="container">
<div class="wrap jj">
	<ul class="nav nav-tabs">
		<li><a href="{:U('city/index')}">城市列表</a></li>
		<li <empty name="data.id">class="active"</empty>><a href="{:U('city/edit')}">添加城市</a></li>
	</ul>
	<div class="common-form">
		<form method="post" class="form-horizontal J_ajaxForm" action="{:U('city/edit')}">
			<fieldset>
				<div class="control-group">
					<label class="control-label">所属省份:</label>
					<div class="controls">
						<select class="normal_select" name="parentid">
							<option value="0" <if condition="$data.parentid eq 0">selected</if>>作为省份添加</option>
							<volist name="provinceList" id="vo">
							<option value="{$vo.id}" <if condition="$data.parentid eq $vo['id']">selected</if>>{$vo.name}</option>
							</volist>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">城市名称:</label>
					<div class="controls">
						<input type="text" class="input" name="name" value="{$data.name}" placeholder="城市名称">
						<span class="must_red">*</span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">首字母:</label>
					<div class="controls">
						<input type="text" class="input" name="letter" value="{$data.letter}" placeholder="首字母">
						<span class="must_red">*</span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">seo缩写:</label>
					<div class="controls">
						<input type="text" class="input" name="seo" value="{$data.seo}" placeholder="seo缩写">
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
					<label class="control-label">是否热门:</label>
					<div class="controls">
						<label class="radio inline" for="active_true">
            				<input type="checkbox" class="input" name="ishot" <if condition="$data.ishot eq 1">selected</if> value="1"> 是否热门
            			</label>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">排序:</label>
					<div class="controls">
						<input type="text" class="input" name="listorder" value="{$data.listorder}" placeholder="排序">
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