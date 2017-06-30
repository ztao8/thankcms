<?php
/**
 * 资讯分类管理
 */
namespace Admin\Controller;

use Common\Controller\AdminBase;

class CategoryController extends AdminBase
{

	//初始化
	protected function _initialize()
	{
		parent::_initialize();
	}

	//首页
	public function index()
	{
		$result       = D('Common/Category')->order(array("listorder" => "ASC"))->select();
		$tree         = new \Tree();
		$tree->icon   = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp   = '&nbsp;&nbsp;&nbsp;';
		$newcategorys = array();
		foreach ($result as $m) {
			$newcategorys[$m['id']] = $m;
		}
		foreach ($result as $n => $r) {
			$result[$n]['level']         = $this->_get_level($r['id'], $newcategorys);
			$result[$n]['parentid_node'] = ($r['parentid']) ? ' class="child-of-node-' . $r['parentid'] . '"' : '';
			$result[$n]['str_manage']    = '<a href="' . U("category/edit", array("parentid" => $r['id'], "categoryid" => $_GET['categoryid'])) . '">添加子分类</a> | <a href="' . U("category/edit", array("id" => $r['id'], "categoryid" => $_GET['categoryid'])) . '">修改</a> | <a class="J_ajax_del" href="' . U("category/delete", array("id" => $r['id'], "categoryid" => I("get.categoryid"))) . '">删除</a> ';
			$result[$n]['status']        = $r['status'] ? "显示" : "隐藏";
		}
		$tree->init($result);
		$str
				   = "<tr id='node-\$id' \$parentid_node>
					<td style='padding-left:20px;'><input name='listorders[\$id]' type='text' size='3' value='\$listorder' class='input input-order'></td>
					<td>\$id</td>
					<td>\$spacer\$name</td>
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
			$this->getCategoryTree($data['parentid']);
			$this->assign('data', $data);
		}else{
			$parentid = I('parentid', 0);
			$this->getCategoryTree($parentid);
		}
	}

	//删除
	public function delete()
	{
		$id    = I('id', 0, 'intval');
		$model = $this->_initModel();
		$count = $model->where(array("parentid" => $id))->count();
		if ($count > 0) {
			$this->error('该分类下还有子分类，无法删除！');
		}
		if ($model->delete($id)) {
			$this->success('删除成功', cookie('__forward__'));
		} else {
			$this->error($model->getError());
		}
	}

	public function lists()
	{
		$result = D('Common/Category')->order("listorder asc")->select();
		$this->assign("categorys", $result);
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
	 * 获取分类树
	 * @param number $parentid
	 */
	protected function getCategoryTree($parentid = 0)
	{
		$tree   = new \Tree();
		$result = D('Common/Category')->order(array("listorder" => "ASC"))->select();
		foreach ($result as $r) {
			$r['selected'] = $r['id'] == $parentid ? 'selected' : '';
			$array[]       = $r;
		}
		$str = "<option value='\$id' \$selected>\$spacer \$name</option>";
		$tree->init($array);
		$select_categorys = $tree->get_tree(0, $str);
		$this->assign("select_categorys", $select_categorys);
	}
}