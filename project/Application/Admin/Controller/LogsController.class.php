<?php
/**
 * 后台Logs
 */
namespace Admin\Controller;

use Common\Controller\AdminBase;

class LogsController extends AdminBase
{

	// 操作日志
	public function operationlog()
	{
		$this->_model = 'Operationlog';
		parent::index();
	}

	// 登陆日志
	public function loginlog()
	{
        $this->_model = 'Loginlog';
		parent::index();
	}

	// 会员登陆日志
	public function memberLoginlog()
	{
        $this->_model = 'MemberLoginlog';
		parent::index();
	}

	//列表条件处理
	protected function condition()
	{
		$status     = I('status');
		$uid        = I('uid');
		$username   = I('username');
		$ip         = I('ip');
		$start_time = I('start_time');
		$end_time   = I('end_time');
		$where      = array();
		($status !== '') AND $where['status'] = $status;
		$uid AND $where['uid'] = $uid;
		$username AND $where['username'] = $username;
		$ip AND $where['ip'] = $ip;
		if (!empty($start_time) && !empty($end_time)) {
			$start_time    = strtotime($start_time);
			$end_time      = strtotime($end_time) + 86399;
			$where['time'] = array(array('GT', $start_time), array('LT', $end_time), 'AND');
		}
		return $where;
	}

	//删除一个月前的登陆日志
	public function deleteloginlog()
	{
		if (D("Admin/Loginlog")->deleteAMonthago()) {
			$this->success("删除登陆日志成功！");
		} else {
			$this->error("删除登陆日志失败！");
		}
	}

	//删除一个月前的操作日志
	public function deletelog()
	{
		if (D("Admin/Operationlog")->deleteAMonthago()) {
			$this->success("删除操作日志成功！");
		} else {
			$this->error("删除操作日志失败！");
		}
	}

	//删除一个月前的会员登录日志
	public function deleteMemberLoginlog()
	{
		if (D("Member/MemberLoginlog")->deleteAMonthago()) {
			$this->success("删除操作日志成功！");
		} else {
			$this->error("删除操作日志失败！");
		}
	}
}