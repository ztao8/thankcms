<?php
/**
 * 反馈管理首页
 */
namespace Admin\Controller;
use Common\Controller\AdminBase;
class FeedbackController extends AdminBase {
	
	// 初始化
	function _initialize() {
		parent::_initialize();
	}
	
	// 回复反馈
	public function back(){
		if(IS_POST){
			$id = I('id');
			$feedback = I('feedback');
			if (empty($feedback)){
				$this->error('回复内容不能为空');
			}
			$data = array(
				'status'		=> 1,
				'feedback'		=> $feedback,
				'username'		=> \Admin\Service\User::getInstance()->username ? : '',
				'update_time' 	=> time()
			);
			$result = D('Common/Feedback')->where(array('id'=>$id))->save($data);
			if ($result){
				$this->success('保存成功！');
			}else {
				$this->error('保存失败，请重试！');
			}
		}else{
			$id = I('id');
			if (empty($id)){
				$this->error('必须指定反馈信息ID');
			}
			$data = D('Common/Feedback')->where(array('id'=>$id))->find();
			$this->assign('data',$data);
			$this->display();
		}
	}
}