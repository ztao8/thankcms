<?php
/**
 * 城市管理
 */
namespace Admin\Controller;

use Common\Controller\AdminBase;

class CityController extends AdminBase
{

	//初始化
	protected function _initialize()
	{
		parent::_initialize();
		$this->assign('provinceList', D('Common/City')->getCityList());
	}

	//列表条件处理
	protected function condition()
	{
		$where    = array();
		$parentid = I('parentid');
		$name     = I('name');
		($parentid !== '') AND $where['parentid'] = $parentid;
		$name AND $where['name'] = $name;
		return $where;
	}

	//排序
	public function listorders()
	{
		$status = $this->_listorders();
		if ($status) {
			$this->success("排序更新成功！");
		} else {
			$this->error("排序更新失败！");
		}
	}

	// ajax获取对饮对应的城市
	public function ajaxCityList()
	{
		$parentid = I('parentid', 0);
		$data     = D('Common/City')->getCityList($parentid);
		$this->ajaxReturn($data);
	}
}