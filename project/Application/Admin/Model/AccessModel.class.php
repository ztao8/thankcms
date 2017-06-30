<?php
/**
 * 后台用户角色表
 */
namespace Admin\Model;

use Common\Model\Model;

class AccessModel extends Model
{

	//权限添加
	public function addAccess($array, $uid)
	{
		$data = array();
		foreach ($array as $val) {
			$data[] = array(
				'uid' => $uid,
				'role_id' => $val
			);
		}
		$this->addAll($data);
		return true;
	}

	//权限修改
	public function editAccess($array, $uid)
	{
		$this->where(array('uid' => $uid))->delete();
		$data = array();
		foreach ($array as $val) {
			$data[] = array(
				'uid' => $uid,
				'role_id' => $val
			);
		}
		$this->addAll($data);
		return true;
	}

	//获取角色列表
	public function getAccessList($id)
	{
		$data = $this->where(array('uid' => $id))->select();
		return create_relate_array($data, 'role_id');
	}
}
