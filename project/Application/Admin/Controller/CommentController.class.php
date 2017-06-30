<?php
/**
 * 评论管理首页
 */
namespace Admin\Controller;

use Common\Controller\AdminBase;

class CommentController extends AdminBase
{

	// 初始化
	function _initialize()
	{
		parent::_initialize();
	}

	//列表条件处理
	protected function condition()
	{
		$where = array();
		$belong     = I('belong');
		$belong_id  = I('belong_id');
		$status     = I('status');
		$start_time = I('start_time');
		$end_time   = I('end_time');
		$where      = array();
		($belong !== '') AND $where['belong'] = $belong;
		($status !== '') AND $where['status'] = $status;
		$belong_id AND $where['belong_id'] = $belong_id;
		if (!empty($start_time) && !empty($end_time)) {
			$start_time           = strtotime($start_time);
			$end_time             = strtotime($end_time) + 86399;
			$where['create_time'] = array(array('GT', $start_time), array('LT', $end_time), 'AND');
		}
		return $where;
	}

	// 审核
	public function status()
	{
		$model  = $this->_initModel();
		$status = I('get.status', 0);
		$ids    = I('ids');
		$id     = I('id', 0);
		$where  = array();
		empty($ids) ? $where['id'] = $id : $where['id'] = array('in', $ids);
		$res = $model->where($where)->save(array('status' => $status));
		if ($res) {
			$this->success('修改成功', cookie('__forward__'));
		} else {
			$this->error($model->getError());
		}
	}

	/**
	 * @删除信息
	 * @根据主键删除信息 默认主键id
	 * @PS:对非主键不为ID的，可以通过 "_PRIMARY_KEY_"值定义主键值
	 * @成功失败有响应页面跳转操作
	 */
	public function delete()
	{
		$model = $this->_initModel();
		$ids   = I('ids');
		$id    = I('id', 0);
		$where = array();
		empty($ids) ? $where['id'] = $id : $where['id'] = array('in', $ids);
		$flag = $model->where($where)->delete();
		if ($flag) {
			$this->success('刪除成功', cookie('__forward__'));
		} else {
			$this->error($model->getError());
		}
	}
}