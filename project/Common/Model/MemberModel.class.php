<?php
/**
 * 会员模型
 */
namespace Common\Model;

use Common\Model\Model;

class MemberModel extends Model
{

	//array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
	protected $_validate
		= array(
			array('email', 'require', '登陆邮箱不能为空！'),
			array('email', 'email', '邮箱地址有误！'),
			array('email', '', '邮箱已经存在！', 0, 'unique', 1),
			array('password', 'require', '密码不能为空！', 0, 'regex', 1),
			array('password_confirm', 'password', '两次输入的密码不一样！', 0, 'confirm'),
			array('status', array(0, 1), '状态错误，状态只能是1或者0！', 2, 'in'),
		);
	//array(填充字段,填充内容,[填充条件,附加规则])
	protected $_auto
		= array(
			array('create_time', 'time', 1, 'function'),
			array('update_time', 'time', 3, 'function'),
			array('verify', 'genRandomString', 1, 'function', 6), //新增时自动生成验证码
		);

	/**
	 * 更新登录状态信息
	 * @param type $userId
	 * @return type
	 */
	public function loginStatus($memberId)
	{
		$this->find((int)$memberId);
		$this->last_login_time = time();
		$this->last_login_ip   = get_client_ip();
		return $this->save();
	}

	/**
	 * 获取用户信息
	 * @param type $identifier 用户名或者用户ID
	 * @return boolean|array
	 */
	public function getMemberInfo($identifier, $password = NULL)
	{
		if (empty($identifier)) {
			return false;
		}
		$map = array();
		//判断是uid还是用户名
		if (is_int($identifier)) {
			$map['id'] = $identifier;
		} else {
			$map['email'] = $identifier;
		}
		$memberInfo = $this->where($map)->find();
		if (empty($memberInfo)) {
			return false;
		}
		//密码验证
		if (!empty($password) && hashPassword($password, $memberInfo['verify']) != $memberInfo['password']) {
			return false;
		}
		return $memberInfo;
	}

	/**
	 * 插入成功后的回调方法
	 * @param type $data 数据
	 * @param type $options 表达式
	 */
	protected function _after_insert($data, $options)
	{
		//添加信息后，更新密码字段
		$this->where(array('id' => $data['id']))->save(array(
			'password' => hashPassword($data['password'], $data['verify']),
		));
	}
}
