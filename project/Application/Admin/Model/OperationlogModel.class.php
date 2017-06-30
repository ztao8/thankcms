<?php

/**
 * 操作日志表模型
 */
namespace Admin\Model;

use Common\Model\Model;

class OperationlogModel extends Model
{

	/**
	 * 记录日志
	 * @param type $message 说明
	 */
	public function record($message, $status = 0)
	{
		$fangs = 'GET';
		if (IS_AJAX) {
			$fangs = 'Ajax';
		} else if (IS_POST) {
			$fangs = 'POST';
		}
		$data = array(
			'uid' => \Admin\Service\User::getInstance()->id ?: 0,
			'username' => \Admin\Service\User::getInstance()->username ?: '',
			'status' => $status,
			'info' => "提示语：{$message}模块：" . MODULE_NAME . ", 控制器：" . CONTROLLER_NAME . ", 方法：" . ACTION_NAME . "请求方式：{$fangs}",
			'get' => empty($_SERVER['HTTP_REFERER']) ? '' : $_SERVER['HTTP_REFERER'],
			'time' => time(),
			'ip' => get_client_ip()
		);
		return $this->add($data) !== false ? true : false;
	}

	/**
	 * 删除一个月前的日志
	 * @return boolean
	 */
	public function deleteAMonthago()
	{
		$status = $this->where(array("time" => array("lt", time() - (86400 * 30))))->delete();
		return $status !== false ? true : false;
	}
}
