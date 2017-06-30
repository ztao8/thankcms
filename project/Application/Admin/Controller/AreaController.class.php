<?php
/**
 * 区域管理
 */
namespace Admin\Controller;

use Common\Controller\AdminBase;

class AreaController extends AdminBase
{

	//初始化
	protected function _initialize()
	{
		parent::_initialize();
		$this->assign('provinceList', D('Common/City')->getCityList());
		$this->assign('areaList', D('Common/Area')->getAreaList());
	}

	//列表条件处理
	protected function condition()
	{
		$where    = array();
		$city_id  = I('city_id');
		$parentid = I('parentid');
		$name     = I('name');
		($city_id !== '') AND $where['city_id'] = $city_id;
		($parentid !== '') AND $where['parentid'] = $parentid;
		$name AND $where['name'] = $name;
		return $where;
	}

	//列表排序
	protected function order()
	{
		return 'listorder desc';
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

	// 地图标注
	public function map()
	{
		if (IS_POST) {
			$id   = I('id');
			$mapx = I('mapx');
			$mapy = I('mapy');
			if (empty($id) || empty($mapx) || empty($mapy)) {
				$this->error('请先标注获取坐标！');
			}
			$data   = array(
				'mapx' => $mapx,
				'mapy' => $mapy
			);
			$result = D('Common/Area')->where(array('id' => $id))->save($data);
			if ($result) {
				$this->success('保存成功！');
			} else {
				$this->error('保存失败或未修改，请重试！');
			}
		} else {
			$id = I('id');
			if (empty($id)) {
				$this->error('必须指定ID');
			}
			$data = D('Common/Area')->where(array('id' => $id))->find();
			$this->assign('data', $data);
			$this->display();
		}
	}

	// ajax获取对饮对应的城市
	public function ajaxAreaList()
	{
		$parentid = I('parentid', 0);
		$data     = D('Common/Area')->getAreaList($parentid);
		$this->ajaxReturn($data);
	}
}