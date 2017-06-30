<?php
return array(
	/* 应用设定 */
	'URL_CASE_INSENSITIVE' => true,
	'MODULE_DENY_LIST' => array('Common', 'Runtime'),    // 禁止访问的模块列表
	'MODULE_ALLOW_LIST' => array('Admin','Api','Home'),    // 允许访问的模块列表

	/* Cookie设置 */
	'COOKIE_DOMAIN' => '',      // Cookie有效域名
	'COOKIE_PATH' => '/',     // Cookie路径
	'COOKIE_PREFIX' => 'thank_',      // Cookie前缀 避免冲突

	/* 默认设定 */
	'DEFAULT_AJAX_RETURN' => 'json',
	'DEFAULT_MODULE' => 'Home',  // 默认模块
	'DEFAULT_FILTER' => 'trim,htmlspecialchars', // 默认参数过滤方法 用于I函数...

	/* SESSION设置 */
	'SESSION_PREFIX' => 'thank_', // session 前缀

	/* 模板引擎设置 */
	'TMPL_CONTENT_TYPE' => 'text/html', // 默认模板输出类型
	'TMPL_ACTION_ERROR' => 'Public:error', // 默认错误跳转对应的模板文件
	'TMPL_ACTION_SUCCESS' => 'Public:success', // 默认成功跳转对应的模板文件
	//'TMPL_EXCEPTION_FILE'   =>  APP_PATH . 'Admin/View/Common/Exception', // 异常页面的模板文件
	'TMPL_DETECT_THEME' => false, // 自动侦测模板主题
	'TMPL_TEMPLATE_SUFFIX' => '.php', // 默认模板文件后缀
	'TMPL_FILE_DEPR' => '/', //模板文件CONTROLLER_NAME与ACTION_NAME之间的分割符

	/* URL设置 */
	'URL_CASE_INSENSITIVE' => true,   // 默认false 表示URL区分大小写 true则表示不区分大小写
	'URL_MODEL' => 2,       // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
	// 0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE  模式); 3 (兼容模式)  默认为PATHINFO 模式
	'URL_PATHINFO_DEPR' => '/',    // PATHINFO模式下，各参数之间的分割符号

    // 子域名配置
    'APP_SUB_DOMAIN_DEPLOY' => 1, // 开启子域名配置
    'APP_SUB_DOMAIN_RULES' 	=> array(
        'manage' 	=> 'Admin',
        '*' 	    => 'Home',
    ),

	/* 系统变量名称设置 */
	'VAR_MODULE' => 'g',     // 默认模块获取变量
	'VAR_CONTROLLER' => 'm',    // 默认控制器获取变量
	'VAR_ACTION' => 'a',    // 默认操作获取变量

	/* 缓存设置 */
	'DATA_CACHE_PREFIX' => '',     // 缓存前缀
	'DATA_CACHE_TYPE' => 'File', // 数据缓存类型,支持:File|Db|Apc|Memcache|Shmop|Sqlite|Xcache|Apachenote|Eaccelerator
	'DATA_CACHE_PATH' => TEMP_PATH,// 缓存路径设置 (仅对File方式缓存有效)
	'DATA_CACHE_KEY' => '',    // 缓存文件KEY (仅对File方式缓存有效)

	/* token验证*/
	'TOKEN_ON' => false,  // 是否开启令牌验证 默认关闭
	'TOKEN_NAME' => '__hash__',    // 令牌验证的表单隐藏字段名称，默认为__hash__
	'TOKEN_TYPE' => 'md5',  //令牌哈希验证规则 默认为MD5
	'TOKEN_RESET' => true,  //令牌验证出错后是否重置令牌 默认为true

	//Auth权限设置
	'AUTH_CONFIG' => array(
		'AUTH_ON' => true,  // 认证开关
		'AUTH_TYPE' => 1, // 认证方式，1为实时认证；2为登录认证。
		'AUTH_GROUP' => 'thank_role', // 用户组数据表名
		'AUTH_GROUP_ACCESS' => 'thank_access', // 用户-用户组关系表
		'AUTH_RULE' => 'thank_menu', // 权限规则表
		'AUTH_USER' => 'thank_user', // 用户信息表
	),

	/* 命名空间 */
	'AUTOLOAD_NAMESPACE' => array(
		'Common' => COMMON_PATH,
		'Libs' => PROJECT_PATH . 'Libs',
	),

	/* 替换函数修改 */
	'TMPL_PARSE_STRING' => array(
		'__PUBLIC__' => '/statics', // 更改默认的/Public 替换规则
		'__JS__' => '/statics/js', // 增加新的JS类库路径替换规则
		'__UPLOAD__' => '/data/uploads', // 增加新的上传路径替换规则
	),
);