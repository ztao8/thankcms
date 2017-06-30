<?php
/**
 * 公共控制器
 */
namespace Admin\Controller;

use Admin\Service\User;
use Common\Controller\AdminBase;

class PublicController extends AdminBase
{

	//初始化
	protected function _initialize()
	{
	}

	//后台登陆界面
	public function login()
	{
        //如果已经登录
        if (User::getInstance()->id) {
			$this->redirect('/');
		}
        $this->display();
    }

	//后台登陆验证
	public function dologin()
	{
		//记录登陆失败者IP
		$ip       = get_client_ip();
		$username = I("post.username", "", "trim");
		$password = I("post.password", "", "trim");
		$code     = I("post.code", "", "trim");
		if (empty($username) || empty($password)) {
			$this->error("用户名或者密码不能为空，请重新输入！");
		}
		if (empty($code)) {
			$this->error("请输入验证码！");
		}
		//验证码开始验证
		if (!check_verify($code)) {
			$this->error("验证码错误，请重新输入！");
		}

		if (User::getInstance()->login($username, $password)) {
			$forward = cookie("__forward__");
			if (!$forward) {
				$forward = U("/");
			} else {
				cookie("__forward__", NULL);
			}
			$this->success('登陆成功！', U("/"));
		} else {
			$this->error("用户名或者密码错误，登陆失败！", U("public/login"));
		}
	}

	//退出登陆
	public function logout()
	{
		if (User::getInstance()->logout()) {
			//手动登出时，清空forward
			cookie("forward", NULL);
			$this->success('注销成功！', U("public/login"));
		}
	}

	/**
	 * 生成验证码
	 */
	public function verify_code()
	{
		$height   = I('height', 50);
		$width    = I('width', 200);
		$fontSize = I('fontSize', 25);
		$length   = I('length', 4);
		$useNoise = I('useNoise', true);
		$config   = array(
			'codeSet' => !empty($code_set) ? $code_set : "2345678abcdefhijkmnpqrstuvwxyzABCDEFGHJKLMNPQRTUVWXY",             // 验证码字符集合
			'expire' => 1800,            // 验证码过期时间（s）
			'fontSize' => $fontSize,              // 验证码字体大小(px)
			'useNoise' => $useNoise,           // 是否有杂点
			'imageH' => $height,               // 验证码图片高度
			'imageW' => $width,               // 验证码图片宽度
			'length' => $length,               // 验证码位数
			'reset' => true,           // 验证成功后是否重置
		);
		$Verify   = new \Think\Verify($config);
		$Verify->entry();
	}
}