<?php
/**
 * 上传控制器
 */
namespace Api\Controller;

use Common\Controller\ApiBase;

class UploadController extends ApiBase {

	protected static $qiniu = tre;
	protected static $accessKey = 'pygOmZVw3G4YQxhS63OIv0IPFdx5NMC5A-9GBZI0';
	protected static $secretKey = 'e4j0keqhfLEqldZFRjSPn7-VwRk2swaVPwwnwqmn';
	//初始化
	protected function _initialize() {
		parent::_initialize();
	}

	/**
	 * 图片上传init
	 */
	public function init()
	{
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
		if (I('tmp_name')){
			$name = I('name');
			$tmp_name = I('tmp_name');
		}else{
			$name = $_FILES['file']['name'];
			$tmp_name = $_FILES['file']['tmp_name'];
		}
		require_once(PROJECT_PATH.'Libs/Util/qiniu/autoload.php');
		$res = array();
		$res['status'] 	= 0;
		$res['info'] 	= '上传失败';
		$res['url'] 	= '';
		$auth = new \Qiniu\Auth(self::$accessKey, self::$secretKey);
		$picName = date('YmdHis').mt_rand(1111,9999);
		$bucket = 'picture';
		// 生成上传 Token
		$token = $auth->uploadToken($bucket);
		// 上传到七牛后保存的文件名
		$key = $picName.'.'.end(explode('.', $name));
		// 初始化 UploadManager 对象并进行文件的上传。
		$uploadMgr = new \Qiniu\Storage\UploadManager();
		list($ret, $err) = $uploadMgr->putFile($token, $key, $tmp_name);
		if ($err !== null) {
			$res['info'] 	= $err;
			$this->ajaxReturn($res);
		} else {
			$res['status'] 	= 1;
			$res['info'] 	= '上传成功';
			$res['url'] 	= UPLOAG_MAGE_URL.$ret['key'];
			$this->ajaxReturn($res);
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
		$res = array();
		$res['status'] 	= 0;
		$res['info'] 	= '上传失败';
		$res['url'] 	= '';
    	if(!$info) {
			$res['info'] 	= $upload->getError();
			$this->ajaxReturn($res);
    	}else{// 上传成功
		    foreach($info as $file){
				$res['status'] 	= 1;
				$res['info'] 	= '上传成功';
				$res['url'] 	= SITE_URL.C('TMPL_PARSE_STRING.__UPLOAD__').$file['savepath'].$file['savename'];
				$this->ajaxReturn($res);
		    }
    	}
    }
    
}