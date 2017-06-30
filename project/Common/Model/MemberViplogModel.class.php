<?php
/**
 * 会员模型
 */
namespace Common\Model;

use Common\Model\Model;

class MemberViplogModel extends Model
{

	//array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
	protected $_validate
		= array(
			array('member_id', 'require', '必须指定会员ID！'),
			array('vip_days', 'require', 'VIP天数不能为空！'),
			array('vip_start_time', 'require', 'VIP开始时间不能为空！'),
			array('vip_end_time', 'require', 'VIP结束不能为空！'),
			array('operation', 'require', '操作人不能为空！'),
		);
	//array(填充字段,填充内容,[填充条件,附加规则])
	protected $_auto
		= array(
			array('create_time', 'time', 1, 'function'),
		);


}
