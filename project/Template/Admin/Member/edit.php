<extend name="Public:layout" />
<block name="container">
<div class="wrap jj">
	<ul class="nav nav-tabs">
		<li><a href="{:U('member/index')}">会员列表</a></li>
		<li <empty name="data.id">class="active"</empty>><a href="{:U('member/edit')}">添加会员</a></li>
	</ul>
	<div class="common-form">
		<form method="post" class="form-horizontal J_ajaxForm" action="{:U('member/edit')}">
			<fieldset>
				<div class="control-group">
					<label class="control-label">登陆邮箱:</label>
					<div class="controls">
						<input type="text" class="input" name="email" value="{$data.email}" placeholder="登陆邮箱">
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
					<label class="control-label">手机号码:</label>
					<div class="controls">
						<input type="text" class="input" name="phone" value="{$data.phone}" placeholder="手机号码">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">用户昵称:</label>
					<div class="controls">
						<input type="text" class="input" name="nickname" value="{$data.nickname}" placeholder="用户昵称">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">真实姓名:</label>
					<div class="controls">
						<input type="text" class="input" name="truename" value="{$data.truename}" placeholder="真实姓名">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">性别:</label>
					<div class="controls">
						<label class="radio inline" for="active_true">
            				<input type="radio" name="sex" value="0" <if condition="$data.sex eq 0">checked</if> id="active_true">保密
            			</label>
            			<label class="radio inline" for="active_true">
            				<input type="radio" name="sex" value="1" <if condition="$data.sex eq 1">checked</if> id="active_true">男
            			</label>
            			<label class="radio inline" for="active_true">
            				<input type="radio" name="sex" value="2" <if condition="$data.sex eq 2">checked</if> id="active_true">女
            			</label>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">年龄:</label>
					<div class="controls">
						<input type="text" class="input" name="age" value="{$data.age}" placeholder="年龄">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">身份证:</label>
					<div class="controls">
						<input type="text" class="input" name="card" value="{$data.card}" placeholder="身份证">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">公司:</label>
					<div class="controls">
						<input type="text" class="input" name="company" value="{$data.company}" placeholder="公司">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">公司网址:</label>
					<div class="controls">
						<input type="text" class="input" name="website" value="{$data.website}" placeholder="公司网址">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">备注:</label>
					<div class="controls">
						<textarea cols="57" rows="5" name="remark">{$data.remark}</textarea>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">推荐人ID:</label>
					<div class="controls">
						<input type="text" class="input" name="recom_id" value="{$data.recom_id}" placeholder="推荐人ID">
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