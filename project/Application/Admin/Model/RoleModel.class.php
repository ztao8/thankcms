<?php
/**
 * 后台用户角色表
 */
namespace Admin\Model;

use Common\Model\Model;

class RoleModel extends Model
{

	//array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
	protected $_validate
		= array(
			array('title', 'require', '角色名称不能为空！'),
			array('title', '', '该名称已经存在！', 0, 'unique', 3),
			array('status', 'require', '缺少状态！'),
			array('status', array(0, 1), '状态错误，状态只能是1或者0！', 2, 'in'),
		);

	//array(填充字段,填充内容,[填充条件,附加规则])
	protected $_auto = array();

	//获取角色列表
	public function getRoleList()
	{
		$data = $this->where(array('status' => 1))->field('id,title')->order("id desc")->select();
		return create_relate_array($data);
	}
}
