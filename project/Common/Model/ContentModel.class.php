<?php
/**
 * 文章模型
 */
namespace Common\Model;

use Common\Model\Model;

class ContentModel extends Model
{

	//array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
	protected $_validate
		= array(
			array('category', 'require', '文章分类不能为空！'),
			array('title', 'require', '文章标题不能为空！'),
			array('excerpt', 'require', '文章摘要不能为空！'),
			array('content', 'require', '文章内容不能为空！'),
			array('post_time', 'require', '发布时间不能为空！'),
			array('istop', array(0, 1), '状态错误，状态只能是1或者0！', 2, 'in'),
			array('ishot', array(0, 1), '状态错误，状态只能是1或者0！', 2, 'in'),
			array('isrecom', array(0, 1), '状态错误，状态只能是1或者0！', 2, 'in'),
			array('status', array(0, 1), '状态错误，状态只能是1或者0！', 2, 'in'),
		);
	//array(填充字段,填充内容,[填充条件,附加规则])
	protected $_auto
		= array(
			array('create_time', 'time', 1, 'function'),
			array('update_time', 'time', 3, 'function'),
		);
}
