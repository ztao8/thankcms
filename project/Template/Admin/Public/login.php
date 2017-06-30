<!doctype html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>系统后台</title>
		<meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge" />
		<meta name="renderer" content="webkit|ie-comp|ie-stand">
		<meta name="robots" content="noindex,nofollow">
		<link href="__PUBLIC__/admin/assets/css/admin_login.css" rel="stylesheet" />
		<style>
			#login_btn_wraper {
				text-align: center;
			}
			#login_btn_wraper .tips_success {
				color: #fff;
			}
			#login_btn_wraper .tips_error {
				color: #DFC05D;
			}
			#login_btn_wraper button:focus {
				outline: none;
			}
		</style>
		<script>
			if (window.parent !== window.self) {
					document.write = '';
					window.parent.location.href = window.self.location.href;
					setTimeout(function () {
							document.body.innerHTML = '';
					}, 0);
			}
		</script>
		
	</head>
<body>
	<div class="wrap">
		<div class="login">
			<h1>后台管理中心</h1>
			<form method="post" name="login" action="{:U('public/dologin')}" autoComplete="off" class="J_ajaxForm">
				<ul>
					<li>
						<input class="input" id="J_admin_name" required name="username" type="text" placeholder="帐号名或邮箱" title="用户名" value="admin"/>
					</li>
					<li>
						<input class="input" id="admin_pwd" type="password" required name="password" placeholder="密码" title="密码" />
					</li>
					<li>
						<div id="J_verify_code">
							{:verify_code(50,230)}
						</div>
					</li>
					<li>
						<input class="input" type="text" name="code" placeholder="请输入验证码" />
					</li>
				</ul>
				<div id="login_btn_wraper">
					<button type="submit" name="submit" class="btn btn_submit J_ajax_submit_btn">登录</button>
				</div>
			</form>
		</div>
	</div>

<script>
//全局变量
var GV = {
    DIMAUB: "{:U('/')}",
    JS_ROOT: "statics/admin/js/",
    TOKEN: ""
};
</script>
<script src="__PUBLIC__/admin/js/wind.js"></script>
<script src="__PUBLIC__/admin/js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/admin/js/common.js"></script>
<script>
;(function(){
	document.getElementById('J_admin_name').focus();
	
})();
</script>
</body>
</html>