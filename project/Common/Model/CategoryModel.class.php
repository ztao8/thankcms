<?php
/**
 * 资讯分类模型
 */
namespace Common\Model;

use Common\Model\Model;

class CategoryModel extends Model
{

	//array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
	protected $_validate
		= array(
			array('name', 'require', '城市名称不能为空！'),
			array('status', array(0, 1), '状态错误，状态只能是1或者0！', 2, 'in'),
		);
	//array(填充字段,填充内容,[填充条件,附加规则])
	protected $_auto
		= array(
			array('create_time', 'time', 1, 'function'),
			array('update_time', 'time', 3, 'function'),
		);

	/**
	 * 获取关联分类
	 */
	public function category_array()
	{
		$result = array();
		$data   = $this->where(array('status' => 1))->select();
		foreach ($data as $key => $val) {
			$result[$val['id']] = $val;
		}
		return $result;
	}

	/**
	 * 按父ID查找分类子项
	 * @param integer $parentid 父菜单ID
	 * @param integer $with_self 是否包括他自己
	 */
	public function category_child($parentid, $with_self = false)
	{
		//父节点ID
		$where             = array();
		$where['status']   = 1;
		$where['parentid'] = $parentid;
		$result            = $this->where($where)->order(array("listorder" => "ASC"))->select();
		if ($with_self) {
			$result2[] = $this->where(array('id' => $parentid))->find();
			$result    = array_merge($result2, $result);
		}
		$array = array();
		foreach ($result as $v) {
			$array[] = $v;
		}
		return $array;
	}

	//取得树形结构的菜单
	public function get_tree($myid = FALSE, $parent = '', $Level = 1)
	{
		$data = $this->category_child($myid);
		$Level++;
		if (is_array($data)) {
			foreach ($data as $a) {
				$id       = $a['id'];
				$array    = array(
					"name" => $a['name'],
					"id" => $id,
					"remark" => $a['remark'],
					"parentid" => $parent
				);
				$ret[$id] = $array;
				$child    = $this->get_tree($a['id'], $id, $Level);
				//由于后台管理界面只支持三层，超出的不层级的不显示
				if ($child && $Level <= 3) {
					$ret[$id]['child'] = $child;
				}

			}
			return $ret;
		}
		return false;
	}

	/**
	 * 更新缓存
	 * @param type $data
	 * @return type
	 */
	public function category_cache()
	{
		$data = F("Category_cache");
		if (empty($data)) {
			$data = $this->get_tree(0);
			F("Category_cache", $data);
		}
		return $data;
	}

	/**
	 * 后台有更新/编辑则删除缓存
	 * @param type $data
	 */
	public function _before_write(&$data)
	{
		parent::_before_write($data);
		F("Category_cache", NULL);
	}

	//删除操作时删除缓存
	public function _after_delete($data, $options)
	{
		parent::_after_delete($data, $options);
		$this->_before_write($data);
	}
}
