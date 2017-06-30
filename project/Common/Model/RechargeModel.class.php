<?php
/**
 * 充值模型
 */
namespace Common\Model;

class RechargeModel extends Model
{
	//array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
	protected $_validate
		= array(
			array('member_id', 'require', '必须指定会员ID！'),
			array('amount', 'require', '金额不能为空！'),
			array('remark', 'require', '备注'),
		);
	//array(填充字段,填充内容,[填充条件,附加规则])
	protected $_auto
		= array(
			array('create_time', 'time', 1, 'function'),
		);
}
