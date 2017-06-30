<?php
return array(
	// 加载扩展配置文件
	'LOAD_EXT_CONFIG' => 'config_com,db,const',

	// 子域名配置
	'APP_SUB_DOMAIN_DEPLOY' => 1, // 开启子域名配置
	'APP_SUB_DOMAIN_RULES' => array(
		'manage.92ws.cn' => 'Admin',
	),
);