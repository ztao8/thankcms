<?php
/**
 * 管理员配置管理
 */
namespace Admin\Controller;

use Common\Controller\AdminBase;

class UserController extends AdminBase
{

	//初始化
	protected function _initialize()
	{
		parent::_initialize();
		$this->initRole();
	}

	/**
	 * 获取角色列表
	 */
	public function initRole()
	{
		$roleList = D('Role')->getRoleList();
		$this->assign('roleList', $roleList);
	}

	/**
	 * @修改信息
	 * @根据主键获取信息，并且传值给视图，默认主键为ID
	 * @PS:对非主键不为ID的，可以通过"_PRIMARY_KEY_"值定义主键值
	 * @成功失败有响应页面跳转操作
	 */
	public function edit()
	{
		if (!IS_POST) {
			$this->getEditInfo();
			$this->display();
		} else {
			$model = $this->_initModel();
			if (!$model->create()) {
				$this->error($model->getError());
			}
			$this->checkEditInfo($model);
			if (empty($model->id)) {
				$result = $model->add();
				$roleArray = I('role_id');
				D('Access')->addAccess($roleArray,$result);
			} else {
				$result = $model->save();
				$roleArray = I('role_id');
				D('Access')->editAccess($roleArray,I('id'));
			}
			if ($result !== false) {
				$this->success('提交成功', cookie('__forward__'));
			} else {
				$this->error($model->getError());
			}
		}
	}

	/**
	 * @获取需要修改的信息
	 */
	protected function getEditInfo()
	{
		$key = I(self::_PRIMARY_KEY_, 0);
		if (!empty($key)) {
			$model                      = $this->_initModel();
			$where                      = array();
			$where[self::_PRIMARY_KEY_] = $key;
			$data                       = $model->where($where)->find();
			$access                     = D('Access')->getAccessList($key);
			$this->assign('access', $access);
			$this->assign('data', $data);
		}
	}

	/**
	 * @处理修改对象
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

	public function userinfo()
	{
		$model = $this->_initModel();
		if (!IS_POST) {
			$user = $model->where(array("id" => self::$ADMIN_ID))->find();
			$this->assign($user);
			$this->display();
		} else {
			if (!$model->create()) {
				$this->error($model->getError());
			}
			if (false !== $model->save()) {
				$this->success('修改成功');
			} else {
				$this->error($model->getError());
			}
		}
	}
}