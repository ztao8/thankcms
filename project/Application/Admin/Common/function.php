<?php
/**
 * 检查权限
 * @param name string|array  需要验证的规则列表,支持逗号分隔的权限规则或索引数组
 * @param uid  int           认证用户的id
 * @param relation string    如果为 'or' 表示满足任一条规则即通过验证;如果为 'and'则表示需满足所有规则才能通过验证
 * @return boolean           通过验证返回true;失败返回false
 */
function auth_check($uid, $name = null)
{
	if (empty($uid)) {
		return false;
	}
	$auth = new \Admin\Service\Auth();
	if (empty($name)) {
		$name = strtolower(CONTROLLER_NAME . "/" . ACTION_NAME);
	}
	if (\Admin\Service\User::getInstance()->isAdministrator()) {
		return true;
	}
	return $auth->check($name, $uid);
}


/**
 * 获取登陆用户ID
 */
function admin_id()
{
	return session('ADMIN_ID');
}

/**
 * 验证码生成
 */
function verify_code($height = 50, $width = 200, $fontSize = 25, $length = 4, $useNoise = true)
{
	$url = U("public/verify_code", array('height' => $height, 'width' => $width, 'fontSize' => $fontSize, 'length' => $length, 'useNoise' => $useNoise));
	$str = '<img class="verify_img" src="' . $url;
	$str .= '" onclick="this.src=\'' . $url . '&time=\'+Math.random();"';
	$str .= '" width="' . $width . '" height="' . $height . '" style="cursor: pointer;" title="点击获取"/>';
	return $str;
}

/**
 * 检测输入的验证码是否正确，$code为用户输入的验证码字符串
 */
function check_verify($code, $id = '')
{
	$verify = new \Think\Verify();
	return $verify->check($code, $id);
}

?>