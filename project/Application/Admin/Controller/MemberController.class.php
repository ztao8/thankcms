<?php
/**
 * 后台首页
 */
namespace Admin\Controller;

use Common\Controller\AdminBase;

class MemberController extends AdminBase
{

	// 初始化
	function _initialize()
	{
		parent::_initialize();
	}

	//列表条件处理
	protected function condition()
	{
		$status     = I('status');
		$email      = I('email');
		$phone      = I('phone');
		$start_time = I('start_time');
		$end_time   = I('end_time');
		$where      = array();
		($status !== '') AND $where['status'] = $status;
		$email AND $where['email'] = $email;
		$phone AND $where['phone'] = $phone;
		if (!empty($start_time) && !empty($end_time)) {
			$start_time           = strtotime($start_time);
			$end_time             = strtotime($end_time) + 86399;
			$where['create_time'] = array(array('GT', $start_time), array('LT', $end_time), 'AND');
		}
		return $where;
	}

	/**
	 * @处理修改细腻
	 */
	protected function checkEditInfo(&$model)
	{
		//密码为空，表示不修改密码
		if (isset($model->password) && empty($model->password)) {
			unset($model->password);
		}
		if ($model->password) {
			$model->verify = genRandomString(6);;
			$model->password = hashPassword($model->password, $model->verify);
		}
	}

	/**
	 * 会员信息展示
	 */
	public function show()
	{
		$model       = $this->_initModel();
		$id          = I('id', 0);
		$where       = array();
		$where['id'] = $id;
		$data        = $model->where($where)->find();
		$this->assign('data', $data);
		$this->display();
	}

	/**
	 * 会员VIP申请记录信息
	 */
	public function recharge()
	{
		$model = $this->_initModel();
		$id    = I('id', 0);
		if (empty($id)) {
			$this->error('没有指定会员ID');
		}
		$where       = array();
		$where['id'] = $id;
		$memberInfo  = $model->where($where)->find();
		$status   = I('status');
		$start_time  = I('start_time');
		$end_time    = I('end_time');
		$where       = array();
		($status !== '') AND $where['status'] = $status;
		if (!empty($start_time) && !empty($end_time)) {
			$start_time    = strtotime($start_time);
			$end_time      = strtotime($end_time) + 86399;
			$where['time'] = array(array('GT', $start_time), array('LT', $end_time), 'AND');
		}
		$this->assign('memberInfo', $memberInfo);
		$model_vip = D('Common/MemberViplog');
		$count     = $model_vip->where($where)->count();
		$page      = $this->page($count);
		$list      = $model_vip->where($where)->order($this->order())->limit($page->firstRow . ',' . $page->listRows)->select();
		$this->assign('page', $page->show());
		$this->assign('list', $list);
		$this->assign('count', $count);
		cookie('__forward__', I('server.REQUEST_URI'));
		$this->display();
	}
}