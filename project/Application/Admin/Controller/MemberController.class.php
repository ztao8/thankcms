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
		$where      = array();
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
	public function viplist()
	{
		$model = $this->_initModel();
		$id    = I('id', 0);
		if (empty($id)) {
			$this->error('没有指定会员ID');
		}
		$where       = array();
		$where['id'] = $id;
		$memberInfo  = $model->where($where)->find();
		$operation   = I('operation');
		$start_time  = I('start_time');
		$end_time    = I('end_time');
		$where       = array();
		switch ($operation) {
			case 1:
				$where['operation'] = array('eq', 'member:self');
			case 2:
				$where['operation'] = array('neq', 'member:self');
			default:
				$where = array();
		}
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

	/**
	 * 黑白名单
	 */
	public function blacklist()
	{
		$limit_type = I('limit_type');
		$start_time = I('start_time');
		$end_time   = I('end_time');
		$where      = array();
		($limit_type !== '') AND $where['limit_type'] = $limit_type;
		if (!empty($start_time) && !empty($end_time)) {
			$start_time    = strtotime($start_time);
			$end_time      = strtotime($end_time) + 86399;
			$where['time'] = array(array('GT', $start_time), array('LT', $end_time), 'AND');
		}
		$model = D('Common/MemberLimit');
		$count = $model->where($where)->count();
		$page  = $this->page($count);
		$list  = $model->where($where)->order('create_time desc')->limit($page->firstRow . ',' . $page->listRows)->select();
		$this->assign('page', $page->show());
		$this->assign('list', $list);
		$this->assign('count', $count);
		cookie('__forward__', I('server.REQUEST_URI'));
		$this->display();
	}

	/**
	 * 黑白名单添加
	 */
	public function blackadd()
	{
		if (!IS_POST) {
			$this->display();
		} else {
			$member_id = I('member_id');
			if (empty($member_id)) {
				$this->error('会员ID不能为空');
			}
			$result = D('Common/Member')->where(array('id' => $member_id))->find();
			if (empty($result)) {
				$this->error('该会员ID不存在');
			}
			$model = D('Common/MemberLimit');
			if (!$model->create()) {
				$this->error($model->getError());
			}
			if ($model->add()) {
				$this->success('提交成功', cookie('__forward__'));
			} else {
				$this->error($model->getError());
			}
		}
	}

	/**
	 * 删除黑白名单
	 */
	public function blackdelete($model = null)
	{
		$member_id = I('member_id', 0);
		if (empty($member_id)) {
			$this->error('必须指定删除会员ID');
		}
		$model              = D('Common/MemberLimit');
		$where              = array();
		$where['member_id'] = $member_id;
		$flag               = $model->where($where)->delete();
		if ($flag) {
			$this->success('刪除成功', cookie('__forward__'));
		} else {
			$this->error($model->getError());
		}
	}
}