<extend name="Public:layout" />
<block name="container">
<div class="wrap">
  <ul class="nav nav-tabs">
        <li><a href="{:U('user/userinfo')}">修改信息</a></li>
		<li class="active"><a href="{:U('setting/password')}">修改密码</a></li>
      </ul>
  <div class="common-form">
    <form class="form-horizontal J_ajaxForm" method="post" action="{:U('setting/password')}">
        <fieldset>
          <div class="control-group">
            <label class="control-label" for="input01">原始密码:</label>
            <div class="controls">
              	<input type="password" class="input" id="input01" name="old_password">
            	<span class="must_red">*</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="input01">新密码:</label>
            <div class="controls">
              	<input type="password" class="input" id="input01" name="password">
           		<span class="must_red">*</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="input01">确认密码:</label>
            <div class="controls">
              	<input type="password" class="input" id="input01" name="password_confirm">
            	<span class="must_red">*</span>
            </div>
          </div>
          <div class="form-actions">
          	<input type="hidden" name="id" value="{$id}" />
            <button type="submit" class="btn btn-primary btn_submit  J_ajax_submit_btn">更新</button>
          </div>
        </fieldset>
      </form>
  </div>
</div>
<script src="__PUBLIC__/admin/js/common.js"></script>
</block>