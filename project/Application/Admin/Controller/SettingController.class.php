<?php
namespace Admin\Controller;
use Common\Controller\AdminBase;
class SettingController extends AdminBase{
	
	function _initialize() {
		parent::_initialize();
	}
	
	//清除缓存
	function clearcache(){	
		$this->_clear_cache();
		$this->display();
	}
	
	public function password(){
		$model = D('User');
		if (! IS_POST){
			$user = $model->where(array("id"=>self::$ADMIN_ID))->find();
			$this->assign($user);
			$this->display();
		} else {
			if(! I('old_password')){
				$this->error("原始密码不能为空！");
			}
			if(! I('password')){
				$this->error("新密码不能为空！");
			}
			$id = I('id');
			$user = $model->where(array("id"=>$id))->find();
			$old_password = I('old_password');
			$old_password = hashPassword($old_password, $user['verify']);
			if($old_password == $user['password']){
				if (! $model->create()) {
	                $this->error($model->getError());
	            }
	            if ($model->password) {
	                $model->verify = genRandomString(6);;
	                $model->password = hashPassword($model->password, $model->verify);
	            }
	            if (false !== $model->save()) {
	                $this->success('修改成功');
	            } else {
	                $this->error($model->getError());
	            }
			}else{
				$this->error("原始密码不正确！");
			}
		}
	}
	
	/**
	 * 清空缓存
	 */
	public function _clear_cache(){
		$dirs = array ();
		// runtime/
		$rootdirs = $this->scan_dir( RUNTIME_PATH."*" );
		//$noneed_clear=array(".","..","Data");
		$noneed_clear=array(".","..");
		$rootdirs=array_diff($rootdirs, $noneed_clear);
		foreach ( $rootdirs as $dir ) {
	
			if ($dir != "." && $dir != "..") {
				$dir = RUNTIME_PATH . $dir;
				if (is_dir ( $dir )) {
					//array_push ( $dirs, $dir );
					$tmprootdirs = $this->scan_dir( $dir."/*" );
					foreach ( $tmprootdirs as $tdir ) {
						if ($tdir != "." && $tdir != "..") {
							$tdir = $dir . '/' . $tdir;
							if (is_dir ( $tdir )) {
								array_push ( $dirs, $tdir );
							}else{
								@unlink($tdir);
							}
						}
					}
				}else{
					@unlink($dir);
				}
			}
		}
		$dirtool=new \Dir("");
		foreach ( $dirs as $dir ) {
			$dirtool->delDir ( $dir );
		}
		if(defined('APP_MODE') && APP_MODE=='sae'){
			$global_mc=@memcache_init();
			if($global_mc){
				$global_mc->flush();
			}
	
			$no_need_delete=array("THINKCMF_DYNAMIC_CONFIG");
			$kv = new SaeKV();
			// 初始化KVClient对象
			$ret = $kv->init();
			// 循环获取所有key-values
			$ret = $kv->pkrget('', 100);
			while (true) {
				foreach($ret as $key =>$value){
					if(!in_array($key, $no_need_delete)){
						$kv->delete($key);
					}
				}
				end($ret);
				$start_key = key($ret);
				$i = count($ret);
				if ($i < 100) break;
				$ret = $kv->pkrget('', 100, $start_key);
			}
		}
	}
	
	/**
	 * 替代scan_dir的方法
	 * @param string $pattern 检索模式 搜索模式 *.txt,*.doc; (同glog方法)
	 * @param int $flags
	 */
	function scan_dir($pattern,$flags=null){
		$files = array_map('basename',glob($pattern, $flags));
		return $files;
	}
}