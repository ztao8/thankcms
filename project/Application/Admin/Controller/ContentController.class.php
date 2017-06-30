<?php
/**
 * 文章管理
 */
namespace Admin\Controller;

use Common\Controller\AdminBase;

class ContentController extends AdminBase
{

	// 初始化
	function _initialize()
	{
		parent::_initialize();
	}

	//列表条件处理
	protected function condition()
	{
		$where      = array();
		$category   = I('category');
		$keyword    = I('keyword');
		$start_time = I('start_time');
		$end_time   = I('end_time');
		$where      = array();
		$category AND $where['category'] = $category;
		$keyword AND $where['title'] = array('like', "%{$keyword}%");
		if (!empty($start_time) && !empty($end_time)) {
			$start_time           = strtotime($start_time);
			$end_time             = strtotime($end_time) + 86399;
			$where['create_time'] = array(array('GT', $start_time), array('LT', $end_time), 'AND');
		}
		return $where;
	}

	//列表数据处理
	protected function packageList(&$list)
	{
		$category_array = D('Category')->category_array();
		$this->assign('category_array', $category_array);
		$this->getCategoryTree(I('category'));
	}

	/**
	 * 内容修改
	 */
	public function edit()
	{
		if (!IS_POST) {
			$this->getEditInfo();
			$this->display();
		} else {
			$model = $this->_initModel();
			if (!$model->create()) {
				$this->error($model->getError());
			}
			$this->checkEditInfo($model);
			if (empty($model->id)) {
				$result = $model->add();
			} else {
				$result = $model->save();
			}
			if ($result !== false) {
				$this->success('提交成功', cookie('__forward__'));
			} else {
				$this->error($model->getError());
			}
		}
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
			$this->getCategoryTree($data['category']);
			$this->assign('data', $data);
		} else {
			$this->getCategoryTree();
		}
	}

	/**
	 * @处理修改对象
	 */
	protected function checkEditInfo(&$model)
	{
		$post_time        = $model->post_time;
		$model->post_time = strtotime($post_time);
		if (!empty($model->photos_url)) {
			$model->photos = 1;
		}
		$model->photos = $this->createPhotos($model->photos_url, $model->photos_title);
	}

	//批量操作
	public function change()
	{
		$model     = $this->_initModel();
		$pk        = $model->getPk();
		$id        = I('id');
		if(empty($id)){
			$this->error("没有操作对象！");
		}
		$operation = I('get.operation');
		$data[$operation] = I('get.'.$operation, '0');
		$result           = $model->where(array($pk => array('in', $id)))->save($data);
		if ($result) {
			$this->success('修改成功', cookie('__forward__'));
		} else {
			$this->error($model->getError());
		}
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

	//处理图库数据
	protected function createPhotos($photos, $titles)
	{
		$result = array();
		foreach ($photos as $key => $val) {
			$result[] = array(
				'photo' => $val,
				'title' => $titles[$key]
			);
		}
		return json_encode($result);
	}

	/**
	 * 获取菜单树
	 * @param number $parentid
	 */
	protected function getCategoryTree($select)
	{
		$tree   = new \Tree();
		$result = D('Category')->order(array("listorder" => "ASC"))->select();
		foreach ($result as $r) {
			$r['selected'] = ($r['id'] == $select) ? 'selected' : '';
			$r['disabled'] = ($r['parentid'] == 0) ? 'disabled' : '';
			$array[]       = $r;
		}
		$str = "<option value='\$id' \$selected \$disabled>\$spacer \$name</option>";
		$tree->init($array);
		$select_categorys = $tree->get_tree(0, $str);
		$this->assign("select_categorys", $select_categorys);
	}

}