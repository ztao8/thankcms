<?php
/**
 * 后台首页
 */
namespace Admin\Controller;

use Common\Controller\AdminBase;

class IndexController extends AdminBase
{
	// 初始化
	function _initialize()
	{
		parent::_initialize();
		$Menu = $this->initMenu();
		$this->assign('Menu', $Menu);
	}

	// 后台框架
	public function index()
	{
		$this->display();
	}

	// 后台首页
	public function main()
	{
		$this->display();
	}
}