<?php
/**
 * 会员黑白名单模型
 */
namespace Common\Model;

use Common\Model\Model;

class MemberLimitModel extends Model
{

	//array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
	protected $_validate
		= array(
			array('member_id', 'require', '会员ID不能为空！'),
			array('member_id', '', '该会员已经存在！', 0, 'unique', 1),
		);

	//array(填充字段,填充内容,[填充条件,附加规则])
	protected $_auto
		= array(
			array('create_time', 'time', 1, 'function'),
		);
}
