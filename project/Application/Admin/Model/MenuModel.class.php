<?php
/**
 * 菜单模型
 */

namespace Admin\Model;

use Common\Model\Model;

class MenuModel extends Model
{

	//自动验证
	protected $_validate
		= array(
			//array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
			array('title', 'require', '菜单名称不能为空！', 1, 'regex', 3),
			array('app', 'require', '模块不能为空！', 1, 'regex', 3),
			array('controller', 'require', '控制器不能为空！', 1, 'regex', 3),
			array('action', 'require', '方法不能为空！', 1, 'regex', 3),
			array('status', array(0, 1), '状态值的范围不正确！', 2, 'in'),
			array('type', array(0, 1), '状态值的范围不正确！', 2, 'in'),
		);

	//自动完成
	protected $_auto
		= array(//array(填充字段,填充内容,填充条件,附加规则)
		);

	/**
	 * 按父ID查找菜单子项
	 * @param integer $parentid 父菜单ID
	 * @param integer $with_self 是否包括他自己
	 */
	public function admin_menu($parentid, $with_self = false)
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
		//权限检查
		if (session("role_id") == 1) {
			//如果角色为 1 直接通过
			return $result;
		}
		$array = array();
		foreach ($result as $v) {
			//方法
			$action = $v['action'];
			//public开头的通过
			if (preg_match('/^public_/', $action)) {
				$array[] = $v;
			} else {
				if ($v['type'] == 0) {
					$array[] = $v;
				} elseif (auth_check(admin_id(), $v['name'])) {
					$array[] = $v;
				}
			}
		}
		return $array;
	}

	//取得树形结构的菜单
	public function get_tree($myid = FALSE, $parent = '', $Level = 1)
	{
		$data = $this->admin_menu($myid);
		$Level++;
		if (is_array($data)) {
			foreach ($data as $a) {
				$id         = $a['id'];
				$name       = strtolower($a['name']);
				$app        = strtolower($a['app']);
				$controller = strtolower($a['controller']);
				$action     = $a['action'];
				//附带参数
				$fu = "";
				if ($a['condition']) {
					$fu = "?" . htmlspecialchars_decode($a['condition']);
				}
				$array           = array(
					"icon" => $a['icon'],
					"id" => $id . $app,
					"title" => $a['title'],
					"parentid" => $parent,
					"url" => U("{$name}{$fu}", array("menuid" => $id)),
				);
				$ret[$id . $app] = $array;
				$child           = $this->get_tree($a['id'], $id, $Level);
				//由于后台管理界面只支持三层，超出的不层级的不显示
				if ($child && $Level <= 3) {
					$ret[$id . $app]['child'] = $child;
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
	public function menu_cache()
	{
		$data = F("Menu_cache_" . admin_id());
		if (empty($data)) {
			$data = $this->get_tree(0);
			F("Menu_cache_" . admin_id(), $data);
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
		F("Menu_cache_" . admin_id(), NULL);
	}

	//删除操作时删除缓存
	public function _after_delete($data, $options)
	{
		parent::_after_delete($data, $options);
		$this->_before_write($data);
	}
}
