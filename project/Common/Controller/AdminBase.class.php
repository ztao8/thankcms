<?php

// +----------------------------------------------------------------------
// | Kirito 后台Controller
// +----------------------------------------------------------------------
// | Copyright (c), All rights reserved.
// +----------------------------------------------------------------------
// | Author: Kirito
// +----------------------------------------------------------------------

namespace Common\Controller;

use Admin\Service\User;
use Admin\Service\Auth;

//定义是后台
define('IN_ADMIN', true);

class AdminBase extends ThankCMS
{

	protected static $ADMIN_ID = NULL;

	//初始化
	protected function _initialize()
	{
		parent::_initialize();
		$this->competence();
		$this->authCheck();
	}

	/**
	 * 验证权限
	 */
	protected function authCheck()
	{
		$auth         = new Auth();
		$name         = strtolower(CONTROLLER_NAME . '/' . ACTION_NAME);
		$without_list = array(
			'index/index',
			'index/main'
		);
		if (!in_array($name, $without_list) AND !User::getInstance()->isAdministrator()) {
			if (!$auth->check($name, self::$ADMIN_ID)) {
				$this->error('您没有权限！');
			}
		}
	}

	/**
	 * 验证登录
	 * @return boolean
	 */
	private function competence()
	{
		//检查是否登录
		$uid = (int)User::getInstance()->isLogin();
		if (empty($uid)) {
			$this->redirect('public/login');
		}
		//获取当前登录用户信息
		$userInfo = User::getInstance()->getInfo();
		if (empty($userInfo)) {
			User::getInstance()->logout();
			return false;
		}
		//是否锁定
		if (!$userInfo['status']) {
			User::getInstance()->logout();
			$this->error('您的帐号已经被锁定！', U('public/login'));
			return false;
		}
		self::$ADMIN_ID = $userInfo['id'];
		session('ADMIN_ID', self::$ADMIN_ID);
		$this->assign('userInfo', $userInfo);
	}

	/**
	 * 操作错误跳转的快捷方法
	 * @access protected
	 * @param string $message 错误信息
	 * @param string $jumpUrl 页面跳转地址
	 * @param mixed $ajax 是否为Ajax方式 当数字时指定跳转时间
	 * @return void
	 */
	public function error($message = '', $jumpUrl = '', $ajax = false)
	{
		D('Admin/Operationlog')->record($message, 0);
		parent::error($message, $jumpUrl, $ajax);
	}

	/**
	 * 操作成功跳转的快捷方法
	 * @access protected
	 * @param string $message 提示信息
	 * @param string $jumpUrl 页面跳转地址
	 * @param mixed $ajax 是否为Ajax方式 当数字时指定跳转时间
	 * @return void
	 */
	public function success($message = '', $jumpUrl = '', $ajax = false)
	{
		D('Admin/Operationlog')->record($message, 1);
		parent::success($message, $jumpUrl, $ajax);
	}

	/**
	 * 初始化后台菜单
	 */
	protected function initMenu()
	{
		$Menu = D("Menu")->menu_cache();
		return $Menu;
	}
}
