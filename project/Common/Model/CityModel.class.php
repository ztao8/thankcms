<?php
/**
 * 城市模型
 */
namespace Common\Model;

use Common\Model\Model;

class CityModel extends Model
{

	//array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
	protected $_validate
		= array(
			array('name', 'require', '城市名称不能为空！'),
			array('letter', 'require', '城市首字母不能为空！'),
			array('seo', 'require', '城市缩写不能为空！'),
			array('status', array(0, 1), '状态错误，状态只能是1或者0！', 2, 'in'),
		);
	//array(填充字段,填充内容,[填充条件,附加规则])
	protected $_auto
		= array(
			array('create_time', 'time', 1, 'function'),
			array('update_time', 'time', 3, 'function'),
		);

	// 获取对应省份城市
	public function getCityList($parentid = 0)
	{
		$data   = array();
		$result = $this->where(array('parentid' => $parentid))->order("listorder desc")->select();
		foreach ($result as $key => $val) {
			$data[$val['id']] = $val;
		}
		return $data;
	}
}
