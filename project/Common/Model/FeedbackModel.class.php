<?php
/**
 * 反馈模型
 */
namespace Common\Model;

class FeedbackModel extends Model
{

	//array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
	protected $_validate
		= array(
			array('category', 'require', '请选择反馈分类！'),
			array('content', 'require', '反馈内容不能为空！'),
			array('status', array(0, 1), '状态错误，状态只能是1或者0！', 2, 'in'),
		);
	//array(填充字段,填充内容,[填充条件,附加规则])
	protected $_auto
		= array(
			array('member_id', 'member_id', 1, 'function'),
			array('create_time', 'time', 1, 'function'),
			array('update_time', 'time', 3, 'function'),
		);
}
