<?php
/**
 * 充值管理
 */
namespace Admin\Controller;
use Common\Controller\AdminBase;
class RechargeController extends AdminBase {
	
	// 初始化
	function _initialize() {
		parent::_initialize();
	}

    //列表条件处理
    protected function condition()
    {
        $status     = I('status');
        $member_id  = I('member_id');
        $start_time = I('start_time');
        $end_time   = I('end_time');
        $where      = array();
        ($status !== '') AND $where['status'] = $status;
        $member_id AND $where['member_id'] = $member_id;
        if (!empty($start_time) && !empty($end_time)) {
            $start_time           = strtotime($start_time);
            $end_time             = strtotime($end_time) + 86399;
            $where['create_time'] = array(array('GT', $start_time), array('LT', $end_time), 'AND');
        }
        return $where;
    }
}