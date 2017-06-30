<?php
/**
 * 菜单管理
 */
namespace Admin\Controller;

use Common\Controller\AdminBase;

class MenuController extends AdminBase
{
	//初始化
	protected function _initialize()
	{
		parent::_initialize();
	}

	//菜单首页
	public function index()
	{
		$result     = D('Menu')->order(array("listorder" => "ASC"))->select();
		$tree       = new \Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		$newmenus   = array();
		foreach ($result as $m) {
			$newmenus[$m['id']] = $m;
		}
		foreach ($result as $n => $r) {
			$result[$n]['level']         = $this->_get_level($r['id'], $newmenus);
			$result[$n]['parentid_node'] = ($r['parentid']) ? ' class="child-of-node-' . $r['parentid'] . '"' : '';
			$result[$n]['str_manage']    = '<a href="' . U("menu/edit", array("parentid" => $r['id'], "menuid" => $_GET['menuid'])) . '">添加子菜单</a> | <a href="' . U("menu/edit", array("id" => $r['id'], "menuid" => $_GET['menuid'])) . '">修改</a> | <a class="J_ajax_del" href="' . U("menu/delete", array("id" => $r['id'], "menuid" => I("get.menuid"))) . '">删除</a> ';
			$result[$n]['status']        = $r['status'] ? "显示" : "隐藏";
		}
		$tree->init($result);
		$str
				   = "<tr id='node-\$id' \$parentid_node>
					<td style='padding-left:20px;'><input name='listorders[\$id]' type='text' size='3' value='\$listorder' class='input input-order'></td>
					<td>\$id</td>
        			<td>\$name</td>
					<td>\$spacer\$title</td>
				    <td>\$status</td>
					<td>\$str_manage</td>
				</tr>";
		$categorys = $tree->get_tree(0, $str);
		$this->assign("categorys", $categorys);
		cookie('__forward__', I('server.REQUEST_URI'));
		$this->display();
	}

	/**
	 * @获取需要修改的信息
	 */
	protected function getEditInfo()
	{
		$key = I(self::_PRIMARY_KEY_, 0);
		if (!empty($key)) {
			$model                      = $this->_initModel();
			$where                      = array();
			$where[self::_PRIMARY_KEY_] = $key;
			$data                       = $model->where($where)->find();
			$this->getMenuTree($data['parentid']);
			$this->assign('data', $data);
		} else {
			$parentid = I('parentid', 0);
			$this->getMenuTree($parentid);
		}
	}

	/**
	 * @处理修改对象
	 */
	protected function checkEditInfo(&$model)
	{
		$model->name = $model->controller.'/'.$model->action;
	}

	//删除
	public function delete()
	{
		$id    = I('id', 0, 'intval');
		$model = $this->_initModel();
		$count = $model->where(array("parentid" => $id))->count();
		if ($count > 0) {
			$this->error('该菜单下还有子菜单，无法删除！');
		}
		if ($model->delete($id)) {
			$this->success('删除成功', cookie('__forward__'));
		} else {
			$this->error($model->getError());
		}
	}

	public function lists()
	{
		$result = D('Menu')->order(array("app" => "ASC", "controller" => "ASC", "action" => "ASC"))->select();
		$this->assign("menus", $result);
		cookie('__forward__', I('server.REQUEST_URI'));
		$this->display();
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

	/**
	 * 获取菜单深度
	 * @param $id
	 * @param $array
	 * @param $i
	 */
	protected function _get_level($id, $array = array(), $i = 0)
	{
		if ($array[$id]['parentid'] == 0 || empty($array[$array[$id]['parentid']]) || $array[$id]['parentid'] == $id) {
			return $i;
		} else {
			$i++;
			return $this->_get_level($array[$id]['parentid'], $array, $i);
		}

	}

	/**
	 * 获取菜单树
	 * @param number $parentid
	 */
	protected function getMenuTree($parentid = 0)
	{
		$tree   = new \Tree();
		$result = D('Menu')->order(array("listorder" => "ASC"))->select();
		foreach ($result as $r) {
			$r['selected'] = $r['id'] == $parentid ? 'selected' : '';
			$array[]       = $r;
		}
		$str = "<option value='\$id' \$selected>\$spacer \$title</option>";
		$tree->init($array);
		$select_categorys = $tree->get_tree(0, $str);
		$this->assign("select_categorys", $select_categorys);
	}
}