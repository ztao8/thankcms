<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// 应用入口文件

// 检测PHP环境
if (version_compare(PHP_VERSION, '5.3.0', '<'))
	die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
if(file_exists('dev')){
	define('APP_DEBUG',true);
	define('APP_STATUS','config_dev');
	ini_set("session.cookie_domain",'92ws.co');
}else{
	define('APP_DEBUG',false);
	ini_set("session.cookie_domain",'92ws.cn');
}
// 当前目录路径
define('SITE_PATH', getcwd() . '/');

// 项目路径
define('PROJECT_PATH', SITE_PATH . 'project/');

// 定义应用目录
define('APP_PATH', PROJECT_PATH . 'Application/');

// 应用公共目录
define('COMMON_PATH', PROJECT_PATH . 'Common/');

//应用运行缓存目录
define("RUNTIME_PATH", SITE_PATH . "data/#runtime/");

//模板存放路径
define('TMPL_PATH', PROJECT_PATH . 'Template/');

// 引入ThinkPHP入口文件
require PROJECT_PATH . 'Core/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单