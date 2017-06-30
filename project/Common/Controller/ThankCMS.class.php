<?php

// +----------------------------------------------------------------------
// | Kirito Controller
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2015 All rights reserved.
// +----------------------------------------------------------------------
// | Author: Kirito
// +----------------------------------------------------------------------

namespace Common\Controller;

class ThankCMS extends \Think\Controller
{

	//数据库主键
	const _PRIMARY_KEY_ = 'id';
	//分页页数
	protected static $pageSize = 15;
	//数据模型
	protected static $_model = NULL;

	//初始化
	protected function _initialize()
	{
		//默认跳转时间
		$this->assign("waitSecond", 3);
	}

	/**
	 * 基本信息分页列表方法
	 * @param type $model 可以是模型对象，或者表名，自定义模型请传递完整（例如：Content/Model）
	 * @param type $where 条件表达式
	 * @param type $order 排序
	 * @param type $pageSize 每次显示多少
	 */
	public function index()
	{
		$model = $this->_initModel();
		$where = $this->condition();
		$count = $model->where($where)->count();
		$page  = $this->page($count);
		$list  = $model->where($where)->order($this->order())->limit($page->firstRow . ',' . $page->listRows)->select();
		$this->packageList($list);
		$this->assign('page', $page->show());
		$this->assign('list', $list);
		$this->assign('count', $count);
		cookie('__forward__', I('server.REQUEST_URI'));
		$this->display();
	}

	//列表数据处理
	protected function packageList(&$list)
	{
	}

	//列表条件处理
	protected function condition()
	{
		$where = array();
		return $where;
	}

	//列表排序
	protected function order()
	{
		return self::_PRIMARY_KEY_ . ' desc';
	}

	/**
	 * @修改信息
	 * @根据主键获取信息，并且传值给视图，默认主键为ID
	 * @PS:对非主键不为ID的，可以通过"_PRIMARY_KEY_"值定义主键值
	 * @成功失败有响应页面跳转操作
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
			$this->assign('data', $data);
		}
	}

	/**
	 * @处理修改对象
	 */
	protected function checkEditInfo(&$model)
	{
	}

	/**
	 * @删除信息
	 * @根据主键删除信息 默认主键id
	 * @PS:对非主键不为ID的，可以通过 "_PRIMARY_KEY_"值定义主键值
	 * @成功失败有响应页面跳转操作
	 */
	public function delete()
	{
		$key                        = I(self::_PRIMARY_KEY_, 0);
		$model                      = $this->_initModel();
		$where                      = array();
		$where[self::_PRIMARY_KEY_] = $key;
		$flag                       = $model->where($where)->delete();
		if ($flag) {
			$this->success('刪除成功', cookie('__forward__'));
		} else {
			$this->error($model->getError());
		}
	}

	/**
	 * @软删除
	 * @根据主键删除信息 默认主键id
	 * @PS:对非主键不为ID的，可以通过 "_PRIMARY_KEY_"值定义主键值
	 * @成功失败有响应页面跳转操作
	 */
	public function del()
	{
		$key                        = I(self::_PRIMARY_KEY_, 0);
		$model                      = $this->_initModel();
		$where                      = array();
		$where[self::_PRIMARY_KEY_] = $key;
		$flag                       = $model->where($where)->setField('status', 0);
		if (false !== $flag) {
			$this->success('刪除成功', cookie('__forward__'));
		} else {
			$this->error($model->getError());
		}
	}

	/**
	 * 状态修改
	 */
	public function status()
	{
		$id     = I('id', 0);
		$status = I('status', 0);
		$model  = $this->_initModel();
		$res    = $model->where(array('id' => $id))->save(array('status' => $status));
		if ($res) {
			$this->success('修改成功', cookie('__forward__'));
		} else {
			$this->error($model->getError());
		}
	}

	/**
	 *  排序 排序字段为listorders数组 POST 排序字段为：listorder
	 */
	protected function _listorders()
	{
		$model = $this->_initModel();
		$pk    = $model->getPk();
		$ids   = $_POST['listorders'];
		foreach ($ids as $key => $r) {
			$data['listorder'] = $r;
			$model->where(array($pk => $key))->save($data);
		}
		return true;
	}

	/**
	 * @param int $totalSize
	 * @return \Page
	 */
	protected function page($totalSize = 1)
	{
		$Page = new \Page($totalSize, self::$pageSize);
		$Page->setConfig('header', '条记录');
		$Page->setConfig('first', '首页');
		$Page->setConfig('prev', '上一页');
		$Page->setConfig('next', '下一页');
		$Page->setConfig('last', '尾页');
		return $Page;
	}

	/**
	 * 获取当前操作的Model实例
	 * 默认采用D方式实例化模型类 ，
	 * @param string $modelName
	 */
	protected function _initModel()
	{
		self::$_model || self::$_model = CONTROLLER_NAME;
		$mod = D(self::$_model);
		if (!$mod) {
			$this->error($mod->getError());
		}
		return $mod;
	}

	//空操作
	public function _empty()
	{
		$this->error('该页面不存在！');
	}

}
