<?php
/**
 * 上传控制器
 */
namespace Admin\Controller;

use Common\Controller\ThankCMS;
class UploadController extends ThankCMS {

	protected static $qiniu = false;
	protected static $accessKey = 'pygOmZVw3G4YQxhS63OIv0IPFdx5NMC5A-9GBZI0';
	protected static $secretKey = 'e4j0keqhfLEqldZFRjSPn7-VwRk2swaVPwwnwqmn';

	//初始化
	protected function _initialize() {
		parent::_initialize();
	}
	
	/**
	 * diy图片附件上传
	 */
	public function diyupload(){
		$num = I('num',50);
		$callback = I('callback','callback');
		$this->assign('num',$num);
		$this->assign('callback',$callback);
		$this->display();
	}
	
    /**
     * swf图片上传显示
     */
    public function swfupload(){
    	$num = I('num',50);
    	$this->assign('num',$num);
    	$this->display();
    }

	/**
	 * 图片上传处理
	 */
	public function upload()
	{
		if (self::$qiniu){
			$this->qiniu_upload();
		}else{
			$this->local_upload();
		}
	}

	/**
	 * 七牛存储
	 */
	public function qiniu_upload(){
		require_once(PROJECT_PATH.'Libs/Util/qiniu/autoload.php');
		$auth = new \Qiniu\Auth(self::$accessKey, self::$secretKey);
		$picName = date('YmdHis').mt_rand(1111,9999);
		$bucket = 'picture';
		// 生成上传 Token
		$token = $auth->uploadToken($bucket);
		// 上传到七牛后保存的文件名
		$key = $picName.'.'.end(explode('.', $_FILES['file']['name']));
		// 初始化 UploadManager 对象并进行文件的上传。
		$uploadMgr = new \Qiniu\Storage\UploadManager();
		list($ret, $err) = $uploadMgr->putFile($token, $key, $_FILES['file']['tmp_name']);
		if ($err !== null) {
			$this->ajaxReturn($err);
		} else {
			echo UPLOAG_MAGE_URL.$ret['key'];die;
		}
	}

	/**
	 * 本地处理
	 */
	public function local_upload(){
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   = 2145728  ;// 设置附件上传大小
		$upload->exts      = array('jpg', 'gif', 'png', 'jpeg','bmp');// 设置附件上传类型
		$upload->rootPath  = '.'.C('TMPL_PARSE_STRING.__UPLOAD__'); // 设置附件上传根目录
		$upload->savePath  = "/"; // 设置附件上传（子）目录
		// 上传文件
		$info   =   $upload->upload();
		if(!$info) {
			$this->ajaxReturn($upload->getError());
		}else{// 上传成功
			foreach($info as $file){
				echo SITE_URL.C('TMPL_PARSE_STRING.__UPLOAD__').$file['savepath'].$file['savename'];die;
			}
		}
	}
    
    /**
     * 图片删除
     */
    public function del(){
    	$src = '.'.str_replace(C('SITE_URL'), '', $_GET['src']);
    	if (file_exists($src)){
    		unlink($src);
    	}
    	echo $_GET['src'];
    	exit();
    }
    
}