/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : thankcms

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-06-22 18:40:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for thank_access
-- ----------------------------
DROP TABLE IF EXISTS `thank_access`;
CREATE TABLE `thank_access` (
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `role_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '角色id',
  UNIQUE KEY `uid_role_id` (`uid`,`role_id`),
  KEY `uid` (`uid`),
  KEY `role_id` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='角色权限明细表';

-- ----------------------------
-- Records of thank_access
-- ----------------------------
INSERT INTO `thank_access` VALUES ('1', '1');
INSERT INTO `thank_access` VALUES ('2', '2');
INSERT INTO `thank_access` VALUES ('4', '1');
INSERT INTO `thank_access` VALUES ('4', '2');

-- ----------------------------
-- Table structure for thank_area
-- ----------------------------
DROP TABLE IF EXISTS `thank_area`;
CREATE TABLE `thank_area` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `city_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '城市ID',
  `parentid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '父区域ID',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '区域板块名称',
  `letter` varchar(20) NOT NULL DEFAULT '' COMMENT '城市拼音',
  `seo` varchar(20) NOT NULL DEFAULT '' COMMENT '城市seo关键字',
  `mapx` varchar(50) NOT NULL DEFAULT '' COMMENT '地图纬度',
  `mapy` varchar(50) NOT NULL DEFAULT '' COMMENT '地图经度',
  `ishot` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否热门',
  `remark` varchar(1000) NOT NULL DEFAULT '' COMMENT '备注',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否显示',
  `listorder` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '排序字段',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `city_id` (`city_id`),
  KEY `parentid` (`parentid`),
  KEY `listorder` (`listorder`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='区域板块表';

-- ----------------------------
-- Records of thank_area
-- ----------------------------

-- ----------------------------
-- Table structure for thank_category
-- ----------------------------
DROP TABLE IF EXISTS `thank_category`;
CREATE TABLE `thank_category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `parentid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '父分类ID',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '分类名称',
  `remark` varchar(1000) NOT NULL DEFAULT '' COMMENT '备注',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否启用',
  `listorder` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '排序字段',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `parentid` (`parentid`),
  KEY `listorder` (`listorder`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='文章分类表';

-- ----------------------------
-- Records of thank_category
-- ----------------------------
INSERT INTO `thank_category` VALUES ('1', '0', '文章分类', '', '1', '2', '1438140622', '1438140622');
INSERT INTO `thank_category` VALUES ('3', '0', '资讯分类', '4324324', '1', '0', '1438140693', '1438140693');
INSERT INTO `thank_category` VALUES ('4', '3', '测试', '3242345', '1', '0', '1438140699', '1438140699');
INSERT INTO `thank_category` VALUES ('5', '1', 'ceshi 2', '', '1', '0', '1440040774', '1440040774');
INSERT INTO `thank_category` VALUES ('6', '1', 'ceshi3', '', '1', '0', '1440040784', '1440040784');

-- ----------------------------
-- Table structure for thank_city
-- ----------------------------
DROP TABLE IF EXISTS `thank_city`;
CREATE TABLE `thank_city` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `parentid` varchar(50) NOT NULL DEFAULT '' COMMENT '所属省份',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '城市名称',
  `letter` varchar(20) NOT NULL COMMENT '城市首字母',
  `seo` varchar(20) NOT NULL DEFAULT '' COMMENT '城市缩写',
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  `ishot` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否热门',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否显示',
  `listorder` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '排序字段',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `seo` (`seo`),
  KEY `ishot` (`ishot`),
  KEY `listorder` (`listorder`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='站点城市表';

-- ----------------------------
-- Records of thank_city
-- ----------------------------

-- ----------------------------
-- Table structure for thank_comment
-- ----------------------------
DROP TABLE IF EXISTS `thank_comment`;
CREATE TABLE `thank_comment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `belong` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '评论所属',
  `belong_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '所属ID',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '用户名昵称',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '邮箱',
  `phone` varchar(50) NOT NULL DEFAULT '' COMMENT '手机号码',
  `content` text NOT NULL COMMENT '内容',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否审核',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='评论管理表';

-- ----------------------------
-- Records of thank_comment
-- ----------------------------

-- ----------------------------
-- Table structure for thank_content
-- ----------------------------
DROP TABLE IF EXISTS `thank_content`;
CREATE TABLE `thank_content` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `category` int(11) NOT NULL COMMENT '分类',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `short_title` varchar(255) NOT NULL DEFAULT '' COMMENT '短标题',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '关键字',
  `source` varchar(500) NOT NULL DEFAULT '' COMMENT '来源',
  `excerpt` varchar(3000) NOT NULL DEFAULT '' COMMENT '摘要',
  `content` text NOT NULL COMMENT '内容',
  `thumb` varchar(255) NOT NULL DEFAULT '' COMMENT '缩略图',
  `isphoto` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否为图库',
  `photos` text NOT NULL COMMENT '图库',
  `istop` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否置顶',
  `ishot` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否热',
  `isrecom` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否推荐',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否审核',
  `listorder` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '排序字段',
  `hits` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '点击率',
  `post_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '发布时间',
  `post_member` int(11) NOT NULL,
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `listorder` (`listorder`),
  KEY `istop` (`istop`),
  KEY `ishot` (`ishot`),
  KEY `isrecom` (`isrecom`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='文章分类表';

-- ----------------------------
-- Records of thank_content
-- ----------------------------
INSERT INTO `thank_content` VALUES ('4', '4', '54354353', '534534', '5345435', '43534', '534543', '534543', '', '0', '[]', '0', '0', '0', '0', '0', '0', '1465976940', '0', '1465976985', '1465976985');

-- ----------------------------
-- Table structure for thank_feedback
-- ----------------------------
DROP TABLE IF EXISTS `thank_feedback`;
CREATE TABLE `thank_feedback` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `member_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '会员ID',
  `content` varchar(3000) NOT NULL DEFAULT '' COMMENT '反馈内容',
  `feedback` varchar(3000) NOT NULL DEFAULT '' COMMENT '回复内容',
  `username` varchar(100) NOT NULL DEFAULT '' COMMENT '回复用户',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否处理',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`),
  KEY `status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='意见反馈表';

-- ----------------------------
-- Records of thank_feedback
-- ----------------------------

-- ----------------------------
-- Table structure for thank_loginlog
-- ----------------------------
DROP TABLE IF EXISTS `thank_loginlog`;
CREATE TABLE `thank_loginlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '日志ID',
  `username` varchar(50) NOT NULL DEFAULT '' COMMENT '登录帐号',
  `logintime` int(10) NOT NULL DEFAULT '0' COMMENT '登录时间戳',
  `loginip` varchar(50) NOT NULL DEFAULT '' COMMENT '登录IP',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态,1为登录成功，0为登录失败',
  `password` varchar(50) NOT NULL DEFAULT '' COMMENT '尝试错误密码',
  `info` varchar(1000) NOT NULL DEFAULT '' COMMENT '其他说明',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COMMENT='后台登陆日志表';

-- ----------------------------
-- Records of thank_loginlog
-- ----------------------------
INSERT INTO `thank_loginlog` VALUES ('23', 'ztao', '1463969634', '127.0.0.1', '0', 'Ztao159753', '用户名登录');
INSERT INTO `thank_loginlog` VALUES ('24', 'ztao', '1463969824', '127.0.0.1', '1', '密码保密', '用户名登录');
INSERT INTO `thank_loginlog` VALUES ('25', 'ztao', '1463989979', '127.0.0.1', '0', 'Ztao159753', '用户名登录');
INSERT INTO `thank_loginlog` VALUES ('26', 'ztao', '1463989988', '127.0.0.1', '0', 'Ztao159753', '用户名登录');
INSERT INTO `thank_loginlog` VALUES ('27', 'ztao', '1463990004', '127.0.0.1', '0', 'ztao159753', '用户名登录');
INSERT INTO `thank_loginlog` VALUES ('28', 'ztao', '1463990019', '127.0.0.1', '1', '密码保密', '用户名登录');
INSERT INTO `thank_loginlog` VALUES ('29', 'ztao', '1463990100', '127.0.0.1', '1', '密码保密', '用户名登录');
INSERT INTO `thank_loginlog` VALUES ('30', 'ztao', '1463990195', '127.0.0.1', '0', 'ztaohyy159753', '用户名登录');
INSERT INTO `thank_loginlog` VALUES ('31', 'ztao', '1463990206', '127.0.0.1', '1', '密码保密', '用户名登录');
INSERT INTO `thank_loginlog` VALUES ('32', 'ztao', '1463995167', '127.0.0.1', '1', '密码保密', '用户名登录');
INSERT INTO `thank_loginlog` VALUES ('33', 'ztao', '1464675720', '127.0.0.1', '1', '密码保密', '用户名登录');
INSERT INTO `thank_loginlog` VALUES ('34', 'ztao', '1464676012', '127.0.0.1', '1', '密码保密', '用户名登录');
INSERT INTO `thank_loginlog` VALUES ('35', 'admin', '1464676099', '127.0.0.1', '1', '密码保密', '用户名登录');
INSERT INTO `thank_loginlog` VALUES ('36', 'ztao', '1464676120', '127.0.0.1', '1', '密码保密', '用户名登录');
INSERT INTO `thank_loginlog` VALUES ('37', 'admin', '1464676148', '127.0.0.1', '1', '密码保密', '用户名登录');
INSERT INTO `thank_loginlog` VALUES ('38', 'ztao', '1464676377', '127.0.0.1', '1', '密码保密', '用户名登录');
INSERT INTO `thank_loginlog` VALUES ('39', 'admin', '1464676440', '127.0.0.1', '1', '密码保密', '用户名登录');
INSERT INTO `thank_loginlog` VALUES ('40', 'ztao', '1464676502', '127.0.0.1', '1', '密码保密', '用户名登录');
INSERT INTO `thank_loginlog` VALUES ('41', 'admin', '1464676526', '127.0.0.1', '1', '密码保密', '用户名登录');
INSERT INTO `thank_loginlog` VALUES ('42', 'ztao', '1464677735', '127.0.0.1', '1', '密码保密', '用户名登录');
INSERT INTO `thank_loginlog` VALUES ('43', 'admin', '1464677809', '127.0.0.1', '1', '密码保密', '用户名登录');
INSERT INTO `thank_loginlog` VALUES ('44', 'ztao', '1465970028', '127.0.0.1', '1', '密码保密', '用户名登录');
INSERT INTO `thank_loginlog` VALUES ('45', 'ztao', '1465984681', '127.0.0.1', '1', '密码保密', '用户名登录');
INSERT INTO `thank_loginlog` VALUES ('46', 'ztao', '1466586209', '127.0.0.1', '1', '密码保密', '用户名登录');

-- ----------------------------
-- Table structure for thank_member
-- ----------------------------
DROP TABLE IF EXISTS `thank_member`;
CREATE TABLE `thank_member` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `email` varchar(100) NOT NULL DEFAULT '' COMMENT '登陆邮箱',
  `password` varchar(50) NOT NULL DEFAULT '' COMMENT '密码',
  `phone` varchar(50) NOT NULL DEFAULT '' COMMENT '手机号码',
  `amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '账户余额',
  `cash` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '现金卷',
  `verify` varchar(50) NOT NULL DEFAULT '' COMMENT '证验码',
  `nickname` varchar(50) NOT NULL DEFAULT '' COMMENT '会员名称',
  `truename` varchar(50) NOT NULL DEFAULT '' COMMENT '真实姓名',
  `sex` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '性别0:保密1:男2:女',
  `age` tinyint(11) unsigned NOT NULL DEFAULT '0' COMMENT '年龄',
  `card` varchar(50) NOT NULL DEFAULT '' COMMENT '身份证',
  `company` varchar(255) NOT NULL DEFAULT '' COMMENT '公司',
  `website` varchar(255) NOT NULL DEFAULT '' COMMENT '公司网址',
  `last_login_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '上次登录时间',
  `last_login_ip` varchar(50) NOT NULL DEFAULT '' COMMENT '上次登录IP',
  `remark` varchar(1000) NOT NULL DEFAULT '' COMMENT '备注',
  `recom_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '推荐人ID',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否启用',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `phone` (`phone`),
  KEY `recom_id` (`recom_id`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=10002 DEFAULT CHARSET=utf8 COMMENT='会员表';

-- ----------------------------
-- Records of thank_member
-- ----------------------------
INSERT INTO `thank_member` VALUES ('10000', 'ztao8@qq.com', 'ztaohyy159753', '', '0.00', '0.00', 'Pzgs7W', '', '', '0', '0', '', '', '', '0', '', '', '0', '1', '1437643453', '1437643453');

-- ----------------------------
-- Table structure for thank_member_config
-- ----------------------------
DROP TABLE IF EXISTS `thank_member_config`;
CREATE TABLE `thank_member_config` (
  `member_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '会员ID',
  `template` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '默认模板',
  UNIQUE KEY `member_id` (`member_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员配置表';

-- ----------------------------
-- Records of thank_member_config
-- ----------------------------

-- ----------------------------
-- Table structure for thank_member_limit
-- ----------------------------
DROP TABLE IF EXISTS `thank_member_limit`;
CREATE TABLE `thank_member_limit` (
  `limit_type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '类型0:黑名单1:白名单',
  `member_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '会员ID',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  UNIQUE KEY `member_id` (`member_id`),
  KEY `limit_type` (`limit_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='黑白名单表';

-- ----------------------------
-- Records of thank_member_limit
-- ----------------------------
INSERT INTO `thank_member_limit` VALUES ('0', '10000', '1463987274');

-- ----------------------------
-- Table structure for thank_member_viplog
-- ----------------------------
DROP TABLE IF EXISTS `thank_member_viplog`;
CREATE TABLE `thank_member_viplog` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `member_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '会员ID',
  `vip_days` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'VIP天数',
  `vip_start_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'VIP开始时间',
  `vip_end_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'VIP结束时间',
  `operation` varchar(50) NOT NULL DEFAULT '' COMMENT '操作用户',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='VIP申请记录';

-- ----------------------------
-- Records of thank_member_viplog
-- ----------------------------

-- ----------------------------
-- Table structure for thank_menu
-- ----------------------------
DROP TABLE IF EXISTS `thank_menu`;
CREATE TABLE `thank_menu` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '父级id',
  `app` char(20) NOT NULL DEFAULT '' COMMENT '模块',
  `controller` char(20) NOT NULL DEFAULT '' COMMENT '控制器',
  `action` char(20) NOT NULL DEFAULT '' COMMENT '方法',
  `name` char(80) NOT NULL DEFAULT '' COMMENT '规则唯一标识',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '规则中文名称',
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态：为1正常，为0禁用',
  `condition` char(100) NOT NULL DEFAULT '' COMMENT '规则表达式，为空表示存在就验证，不为空表示按照条件验证',
  `icon` char(20) NOT NULL DEFAULT '' COMMENT '图标',
  `remark` varchar(1000) NOT NULL DEFAULT '' COMMENT '备注',
  `listorder` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf8 COMMENT='菜单表';

-- ----------------------------
-- Records of thank_menu
-- ----------------------------
INSERT INTO `thank_menu` VALUES ('1', '0', 'admin', 'setting', 'index', 'setting/index', '设置', '1', '1', '', 'cogs', '', '0');
INSERT INTO `thank_menu` VALUES ('2', '1', 'admin', 'setting', 'user', 'setting/user', '个人信息', '0', '1', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('3', '1', 'admin', 'user', 'index', 'user/index', '用户管理', '0', '1', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('4', '1', 'admin', 'menu', 'index', 'menu/index', '后台菜单', '1', '1', '', '', '', '998');
INSERT INTO `thank_menu` VALUES ('5', '1', 'admin', 'setting', 'clearcache', 'setting/clearcache', '清楚缓存', '1', '1', '', '', '', '999');
INSERT INTO `thank_menu` VALUES ('6', '2', 'admin', 'user', 'userinfo', 'user/userinfo', '修改信息', '1', '1', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('7', '2', 'admin', 'setting', 'password', 'setting/password', '修改密码', '1', '1', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('22', '4', 'admin', 'menu', 'delete', 'menu/delete', '删除菜单', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('21', '4', 'admin', 'menu', 'edit', 'menu/edit', '编辑菜单', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('10', '3', 'admin', 'role', 'index', 'role/index', '角色管理', '1', '1', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('11', '10', 'admin', 'role', 'authorize', 'role/authorize', '权限设置', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('12', '10', 'admin', 'role', 'edit', 'role/edit', '编辑角色', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('13', '10', 'admin', 'role', 'delete', 'role/delete', '删除角色', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('15', '3', 'admin', 'user', 'index', 'user/index', '管理员', '1', '1', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('16', '15', 'admin', 'user', 'edit', 'user/edit', '管理员编辑', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('18', '15', 'admin', 'user', 'delete', 'user/delete', '管理员删除', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('19', '15', 'admin', 'user', 'status', 'user/status', '管理员状态', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('23', '4', 'admin', 'menu', 'listorders', 'menu/listorders', '菜单排序', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('24', '4', 'admin', 'menu', 'lists', 'menu/lists', '所有菜单', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('25', '1', 'admin', 'logs', 'index', 'logs/index', '日志管理', '1', '1', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('26', '25', 'admin', 'logs', 'operationlog', 'logs/operationlog', '操作日志', '1', '1', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('27', '25', 'admin', 'logs', 'loginlog', 'logs/loginlog', '登录日志', '1', '1', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('28', '26', 'admin', 'logs', 'deletelog', 'logs/deletelog', '删除一个月前操作日志', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('29', '27', 'admin', 'logs', 'deleteloginlog', 'logs/deleteloginlog', '删除一个月前登陆日志', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('30', '0', 'admin', 'member', 'index', 'member/index', '会员管理', '1', '1', '', 'group', '', '0');
INSERT INTO `thank_menu` VALUES ('31', '0', 'admin', 'content', 'index', 'content/index', '内容管理', '1', '1', '', 'th', '', '0');
INSERT INTO `thank_menu` VALUES ('32', '0', 'admin', 'city', 'index', 'city/index', '城市管理', '1', '1', '', 'globe', '', '0');
INSERT INTO `thank_menu` VALUES ('33', '30', 'admin', 'member', 'index', 'member/index', '会员列表', '1', '1', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('34', '30', 'admin', 'member', 'blacklist', 'member/blacklist', '黑白名单', '1', '1', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('45', '39', 'admin', 'member', 'vipedit', 'member/vipedit', '编辑VIP', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('36', '33', 'admin', 'member', 'edit', 'member/edit', '编辑会员', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('37', '33', 'admin', 'member', 'delete', 'member/delete', '删除会员', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('39', '33', 'admin', 'member', 'show', 'member/show', '查看会员', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('63', '48', 'admin', 'city', 'listorders', 'city/listorders', '城市排序', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('41', '34', 'admin', 'member', 'blackdelete', 'member/blackdelete', '删除黑白名单', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('42', '34', 'admin', 'member', 'blackadd', 'member/blackadd', '添加黑白名单', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('46', '39', 'admin', 'member', 'vipdelete', 'member/vipdelete', '删除VIP', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('48', '32', 'admin', 'city', 'index', 'city/index', '城市管理', '1', '1', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('49', '32', 'admin', 'area', 'index', 'area/index', '区域管理', '1', '1', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('50', '31', 'admin', 'content', 'index', 'content/index', '文章管理', '1', '1', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('51', '50', 'admin', 'content', 'edit', 'content/edit', '编辑文章', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('52', '50', 'admin', 'content', 'delete', 'content/delete', '删除文章', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('54', '48', 'admin', 'city', 'edit', 'city/edit', '编辑城市', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('55', '48', 'admin', 'city', 'delete', 'city/delete', '删除城市', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('57', '49', 'admin', 'area', 'edit', 'area/edit', '编辑区域', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('58', '49', 'admin', 'area', 'delete', 'area/delete', '删除区域', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('62', '39', 'admin', 'member', 'viplist', 'member/viplist', 'VIP记录', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('64', '49', 'admin', 'area', 'listorders', 'area/listorders', '区域排序', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('65', '50', 'admin', 'content', 'status', 'content/status', '审核文章', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('66', '31', 'admin', 'comment', 'index', 'comment/index', '评论管理', '1', '1', '', '', '', '1');
INSERT INTO `thank_menu` VALUES ('67', '66', 'admin', 'comment', 'delete', 'comment/delete', '删除评论', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('68', '66', 'admin', 'comment', 'status', 'comment/status', '审核评论', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('69', '31', 'admin', 'feedback', 'index', 'feedback/index', '意见反馈', '1', '1', '', '', '', '2');
INSERT INTO `thank_menu` VALUES ('70', '69', 'admin', 'feedback', 'back', 'feedback/back', '回复意见反馈', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('71', '31', 'admin', 'category', 'index', 'category/index', '分类管理', '1', '1', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('72', '71', 'admin', 'category', 'delete', 'category/delete', '删除分类', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('73', '71', 'admin', 'category', 'edit', 'category/edit', '编辑分类', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('75', '71', 'admin', 'category', 'listorders', 'category/listorders', '分类排序', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('76', '71', 'admin', 'category', 'lists', 'category/lists', '所有分类', '1', '0', '', '', '', '0');

-- ----------------------------
-- Table structure for thank_operationlog
-- ----------------------------
DROP TABLE IF EXISTS `thank_operationlog`;
CREATE TABLE `thank_operationlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '日志ID',
  `uid` smallint(6) NOT NULL DEFAULT '0' COMMENT '操作帐号ID',
  `username` varchar(50) NOT NULL DEFAULT '' COMMENT '用户名',
  `time` int(10) NOT NULL COMMENT '操作时间',
  `ip` char(20) NOT NULL DEFAULT '' COMMENT 'IP',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态,0错误提示，1为正确提示',
  `info` text NOT NULL COMMENT '其他说明',
  `get` varchar(1000) NOT NULL DEFAULT '' COMMENT 'get数据',
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `username` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=220 DEFAULT CHARSET=utf8 COMMENT='后台操作日志表';

-- ----------------------------
-- Records of thank_operationlog
-- ----------------------------
INSERT INTO `thank_operationlog` VALUES ('66', '1', 'ztao', '1463986334', '127.0.0.1', '1', '提示语：授权成功模块：Admin, 控制器：Role, 方法：authorize请求方式：Ajax', 'http://92ws.co:8080/role/authorize/id/3.html');
INSERT INTO `thank_operationlog` VALUES ('65', '1', 'ztao', '1463986272', '127.0.0.1', '0', '提示语：模块：Admin, 控制器：Role, 方法：authorize请求方式：Ajax', 'http://92ws.co:8080/role/authorize/id/3.html');
INSERT INTO `thank_operationlog` VALUES ('64', '1', 'ztao', '1463986253', '127.0.0.1', '0', '提示语：模块：Admin, 控制器：Role, 方法：authorize请求方式：Ajax', 'http://92ws.co:8080/role/authorize/id/3.html');
INSERT INTO `thank_operationlog` VALUES ('63', '1', 'ztao', '1463986250', '127.0.0.1', '0', '提示语：模块：Admin, 控制器：Role, 方法：authorize请求方式：Ajax', 'http://92ws.co:8080/role/authorize/id/3.html');
INSERT INTO `thank_operationlog` VALUES ('62', '1', 'ztao', '1463986248', '127.0.0.1', '0', '提示语：模块：Admin, 控制器：Role, 方法：authorize请求方式：Ajax', 'http://92ws.co:8080/role/authorize/id/3.html');
INSERT INTO `thank_operationlog` VALUES ('61', '1', 'ztao', '1463986247', '127.0.0.1', '0', '提示语：模块：Admin, 控制器：Role, 方法：authorize请求方式：Ajax', 'http://92ws.co:8080/role/authorize/id/3.html');
INSERT INTO `thank_operationlog` VALUES ('60', '1', 'ztao', '1463986234', '127.0.0.1', '1', '提示语：授权成功模块：Admin, 控制器：Role, 方法：authorize请求方式：Ajax', 'http://92ws.co:8080/role/authorize/id/3.html');
INSERT INTO `thank_operationlog` VALUES ('59', '1', 'ztao', '1463986038', '127.0.0.1', '1', '提示语：授权成功模块：Admin, 控制器：Role, 方法：authorize请求方式：Ajax', 'http://92ws.co:8080/role/authorize/id/3.html');
INSERT INTO `thank_operationlog` VALUES ('58', '1', 'ztao', '1463986006', '127.0.0.1', '1', '提示语：授权成功模块：Admin, 控制器：Role, 方法：authorize请求方式：Ajax', 'http://92ws.co:8080/role/authorize/id/3.html');
INSERT INTO `thank_operationlog` VALUES ('57', '1', 'ztao', '1463985994', '127.0.0.1', '1', '提示语：提交成功模块：Admin, 控制器：Role, 方法：edit请求方式：Ajax', 'http://92ws.co:8080/role/edit/id/3.html');
INSERT INTO `thank_operationlog` VALUES ('56', '1', 'ztao', '1463985925', '127.0.0.1', '1', '提示语：提交成功模块：Admin, 控制器：Role, 方法：edit请求方式：Ajax', 'http://92ws.co:8080/role/edit.html');
INSERT INTO `thank_operationlog` VALUES ('55', '1', 'ztao', '1463985823', '127.0.0.1', '1', '提示语：删除操作日志成功！模块：Admin, 控制器：Logs, 方法：deletelog请求方式：GET', 'http://92ws.co:8080/logs/operationlog.html');
INSERT INTO `thank_operationlog` VALUES ('54', '1', 'ztao', '1463985815', '127.0.0.1', '1', '提示语：删除操作日志成功！模块：Admin, 控制器：Logs, 方法：deletelog请求方式：GET', 'http://92ws.co:8080/logs/operationlog.html');
INSERT INTO `thank_operationlog` VALUES ('14', '0', '', '1463969634', '127.0.0.1', '0', '提示语：用户名或者密码错误，登陆失败！模块：Admin, 控制器：Public, 方法：dologin请求方式：Ajax', 'http://92ws.co:8080/public/login.html');
INSERT INTO `thank_operationlog` VALUES ('15', '1', 'ztao', '1463969824', '127.0.0.1', '1', '提示语：登陆成功！模块：Admin, 控制器：Public, 方法：dologin请求方式：Ajax', 'http://92ws.co:8080/public/login.html');
INSERT INTO `thank_operationlog` VALUES ('16', '1', 'ztao', '1463973874', '127.0.0.1', '1', '提示语：删除成功模块：Admin, 控制器：Menu, 方法：delete请求方式：Ajax', 'http://92ws.co:8080/menu/index.html');
INSERT INTO `thank_operationlog` VALUES ('17', '1', 'ztao', '1463974052', '127.0.0.1', '1', '提示语：排序更新成功！模块：Admin, 控制器：Menu, 方法：listorders请求方式：Ajax', 'http://92ws.co:8080/menu/index.html');
INSERT INTO `thank_operationlog` VALUES ('18', '1', 'ztao', '1463974056', '127.0.0.1', '1', '提示语：排序更新成功！模块：Admin, 控制器：Menu, 方法：listorders请求方式：Ajax', 'http://92ws.co:8080/menu/index.html');
INSERT INTO `thank_operationlog` VALUES ('19', '1', 'ztao', '1463975563', '127.0.0.1', '1', '提示语：删除成功模块：Admin, 控制器：Menu, 方法：delete请求方式：Ajax', 'http://92ws.co:8080/menu/index.html');
INSERT INTO `thank_operationlog` VALUES ('20', '1', 'ztao', '1463975577', '127.0.0.1', '1', '提示语：删除成功模块：Admin, 控制器：Menu, 方法：delete请求方式：Ajax', 'http://92ws.co:8080/menu/index.html');
INSERT INTO `thank_operationlog` VALUES ('21', '1', 'ztao', '1463978193', '127.0.0.1', '1', '提示语：删除成功模块：Admin, 控制器：Menu, 方法：delete请求方式：Ajax', 'http://92ws.co:8080/menu/index/menuid/4.html');
INSERT INTO `thank_operationlog` VALUES ('22', '1', 'ztao', '1463978205', '127.0.0.1', '1', '提示语：删除成功模块：Admin, 控制器：Menu, 方法：delete请求方式：Ajax', 'http://92ws.co:8080/menu/index/menuid/4.html');
INSERT INTO `thank_operationlog` VALUES ('23', '1', 'ztao', '1463978243', '127.0.0.1', '1', '提示语：删除成功模块：Admin, 控制器：Menu, 方法：delete请求方式：Ajax', 'http://92ws.co:8080/menu/index/menuid/4.html');
INSERT INTO `thank_operationlog` VALUES ('24', '1', 'ztao', '1463978253', '127.0.0.1', '1', '提示语：删除成功模块：Admin, 控制器：Menu, 方法：delete请求方式：Ajax', 'http://92ws.co:8080/menu/index/menuid/4.html');
INSERT INTO `thank_operationlog` VALUES ('25', '1', 'ztao', '1463978279', '127.0.0.1', '1', '提示语：删除成功模块：Admin, 控制器：Menu, 方法：delete请求方式：Ajax', 'http://92ws.co:8080/menu/index/menuid/4.html');
INSERT INTO `thank_operationlog` VALUES ('26', '1', 'ztao', '1463978291', '127.0.0.1', '1', '提示语：删除成功模块：Admin, 控制器：Menu, 方法：delete请求方式：Ajax', 'http://92ws.co:8080/menu/index/menuid/4.html');
INSERT INTO `thank_operationlog` VALUES ('27', '1', 'ztao', '1463978443', '127.0.0.1', '1', '提示语：修改成功模块：Admin, 控制器：User, 方法：status请求方式：Ajax', 'http://92ws.co:8080/user/index.html');
INSERT INTO `thank_operationlog` VALUES ('28', '1', 'ztao', '1463978446', '127.0.0.1', '1', '提示语：修改成功模块：Admin, 控制器：User, 方法：status请求方式：Ajax', 'http://92ws.co:8080/user/index.html');
INSERT INTO `thank_operationlog` VALUES ('29', '1', 'ztao', '1463979612', '127.0.0.1', '0', '提示语：该页面不存在！模块：Admin, 控制器：Member, 方法：add请求方式：GET', 'http://92ws.co:8080/member/index.html');
INSERT INTO `thank_operationlog` VALUES ('30', '1', 'ztao', '1463979660', '127.0.0.1', '1', '提示语：修改成功模块：Admin, 控制器：User, 方法：status请求方式：Ajax', 'http://92ws.co:8080/user/index/menuid/15.html');
INSERT INTO `thank_operationlog` VALUES ('31', '1', 'ztao', '1463979662', '127.0.0.1', '1', '提示语：修改成功模块：Admin, 控制器：User, 方法：status请求方式：Ajax', 'http://92ws.co:8080/user/index/menuid/15.html');
INSERT INTO `thank_operationlog` VALUES ('32', '1', 'ztao', '1463981120', '127.0.0.1', '1', '提示语：排序更新成功！模块：Admin, 控制器：City, 方法：listorders请求方式：Ajax', 'http://92ws.co:8080/city/index.html');
INSERT INTO `thank_operationlog` VALUES ('33', '1', 'ztao', '1463981123', '127.0.0.1', '1', '提示语：排序更新成功！模块：Admin, 控制器：City, 方法：listorders请求方式：Ajax', 'http://92ws.co:8080/city/index.html');
INSERT INTO `thank_operationlog` VALUES ('34', '1', 'ztao', '1463981787', '127.0.0.1', '0', '提示语：该页面不存在！模块：Admin, 控制器：Category, 方法：add请求方式：GET', 'http://92ws.co:8080/category/lists.html');
INSERT INTO `thank_operationlog` VALUES ('35', '1', 'ztao', '1463981849', '127.0.0.1', '1', '提示语：排序更新成功！模块：Admin, 控制器：Category, 方法：listorders请求方式：Ajax', 'http://92ws.co:8080/category/index.html');
INSERT INTO `thank_operationlog` VALUES ('36', '1', 'ztao', '1463981871', '127.0.0.1', '0', '提示语：该页面不存在！模块：Admin, 控制器：Category, 方法：add请求方式：GET', 'http://92ws.co:8080/category/lists.html');
INSERT INTO `thank_operationlog` VALUES ('37', '1', 'ztao', '1463981898', '127.0.0.1', '0', '提示语：该页面不存在！模块：Admin, 控制器：Category, 方法：add请求方式：GET', 'http://92ws.co:8080/category/index.html');
INSERT INTO `thank_operationlog` VALUES ('38', '1', 'ztao', '1463983600', '127.0.0.1', '1', '提示语：提交成功模块：Admin, 控制器：Menu, 方法：edit请求方式：Ajax', 'http://92ws.co:8080/menu/edit.html');
INSERT INTO `thank_operationlog` VALUES ('39', '1', 'ztao', '1463983643', '127.0.0.1', '1', '提示语：提交成功模块：Admin, 控制器：Menu, 方法：edit请求方式：Ajax', 'http://92ws.co:8080/menu/edit.html');
INSERT INTO `thank_operationlog` VALUES ('40', '1', 'ztao', '1463984555', '127.0.0.1', '1', '提示语：提交成功模块：Admin, 控制器：Menu, 方法：edit请求方式：Ajax', 'http://92ws.co:8080/menu/edit.html');
INSERT INTO `thank_operationlog` VALUES ('41', '1', 'ztao', '1463985049', '127.0.0.1', '1', '提示语：删除成功模块：Admin, 控制器：Menu, 方法：delete请求方式：Ajax', 'http://92ws.co:8080/menu/index/menuid/4.html');
INSERT INTO `thank_operationlog` VALUES ('42', '1', 'ztao', '1463985363', '127.0.0.1', '1', '提示语：删除成功模块：Admin, 控制器：Menu, 方法：delete请求方式：Ajax', 'http://92ws.co:8080/menu/index.html');
INSERT INTO `thank_operationlog` VALUES ('43', '1', 'ztao', '1463985368', '127.0.0.1', '1', '提示语：排序更新成功！模块：Admin, 控制器：Menu, 方法：listorders请求方式：Ajax', 'http://92ws.co:8080/menu/index.html');
INSERT INTO `thank_operationlog` VALUES ('44', '1', 'ztao', '1463985374', '127.0.0.1', '1', '提示语：排序更新成功！模块：Admin, 控制器：Menu, 方法：listorders请求方式：Ajax', 'http://92ws.co:8080/menu/index.html');
INSERT INTO `thank_operationlog` VALUES ('45', '1', 'ztao', '1463985414', '127.0.0.1', '1', '提示语：排序更新成功！模块：Admin, 控制器：Menu, 方法：listorders请求方式：Ajax', 'http://92ws.co:8080/menu/lists.html');
INSERT INTO `thank_operationlog` VALUES ('46', '1', 'ztao', '1463985427', '127.0.0.1', '1', '提示语：排序更新成功！模块：Admin, 控制器：Menu, 方法：listorders请求方式：Ajax', 'http://92ws.co:8080/menu/lists.html');
INSERT INTO `thank_operationlog` VALUES ('47', '1', 'ztao', '1463985443', '127.0.0.1', '1', '提示语：提交成功模块：Admin, 控制器：Menu, 方法：edit请求方式：Ajax', 'http://92ws.co:8080/menu/edit.html');
INSERT INTO `thank_operationlog` VALUES ('48', '1', 'ztao', '1463985706', '127.0.0.1', '1', '提示语：提交成功模块：Admin, 控制器：Menu, 方法：edit请求方式：Ajax', 'http://92ws.co:8080/menu/edit.html');
INSERT INTO `thank_operationlog` VALUES ('49', '1', 'ztao', '1463985720', '127.0.0.1', '1', '提示语：删除成功模块：Admin, 控制器：Menu, 方法：delete请求方式：Ajax', 'http://92ws.co:8080/menu/index.html');
INSERT INTO `thank_operationlog` VALUES ('50', '1', 'ztao', '1463985729', '127.0.0.1', '1', '提示语：提交成功模块：Admin, 控制器：Menu, 方法：edit请求方式：Ajax', 'http://92ws.co:8080/menu/edit/parentid/80.html');
INSERT INTO `thank_operationlog` VALUES ('51', '1', 'ztao', '1463985751', '127.0.0.1', '1', '提示语：删除成功模块：Admin, 控制器：Menu, 方法：delete请求方式：Ajax', 'http://92ws.co:8080/menu/index.html');
INSERT INTO `thank_operationlog` VALUES ('52', '1', 'ztao', '1463985782', '127.0.0.1', '1', '提示语：删除成功模块：Admin, 控制器：Menu, 方法：delete请求方式：Ajax', 'http://92ws.co:8080/menu/index.html');
INSERT INTO `thank_operationlog` VALUES ('53', '1', 'ztao', '1463985803', '127.0.0.1', '1', '提示语：删除登陆日志成功！模块：Admin, 控制器：Logs, 方法：deleteloginlog请求方式：GET', 'http://92ws.co:8080/logs/loginlog/menuid/27.html');
INSERT INTO `thank_operationlog` VALUES ('67', '1', 'ztao', '1463986411', '127.0.0.1', '1', '提示语：授权成功模块：Admin, 控制器：Role, 方法：authorize请求方式：Ajax', 'http://92ws.co:8080/role/authorize/id/3.html');
INSERT INTO `thank_operationlog` VALUES ('68', '1', 'ztao', '1463986424', '127.0.0.1', '1', '提示语：授权成功模块：Admin, 控制器：Role, 方法：authorize请求方式：Ajax', 'http://92ws.co:8080/role/authorize/id/3.html');
INSERT INTO `thank_operationlog` VALUES ('69', '1', 'ztao', '1463986432', '127.0.0.1', '0', '提示语：模块：Admin, 控制器：Role, 方法：authorize请求方式：Ajax', 'http://92ws.co:8080/role/authorize/id/3.html');
INSERT INTO `thank_operationlog` VALUES ('70', '1', 'ztao', '1463986434', '127.0.0.1', '0', '提示语：模块：Admin, 控制器：Role, 方法：authorize请求方式：Ajax', 'http://92ws.co:8080/role/authorize/id/3.html');
INSERT INTO `thank_operationlog` VALUES ('71', '1', 'ztao', '1463986470', '127.0.0.1', '1', '提示语：授权成功模块：Admin, 控制器：Role, 方法：authorize请求方式：Ajax', 'http://92ws.co:8080/role/authorize/id/3.html');
INSERT INTO `thank_operationlog` VALUES ('72', '1', 'ztao', '1463986479', '127.0.0.1', '1', '提示语：授权成功模块：Admin, 控制器：Role, 方法：authorize请求方式：Ajax', 'http://92ws.co:8080/role/authorize/id/3.html');
INSERT INTO `thank_operationlog` VALUES ('73', '1', 'ztao', '1463986483', '127.0.0.1', '1', '提示语：刪除成功模块：Admin, 控制器：Role, 方法：delete请求方式：Ajax', 'http://92ws.co:8080/role/index/menuid/10.html');
INSERT INTO `thank_operationlog` VALUES ('74', '1', 'ztao', '1463986538', '127.0.0.1', '1', '提示语：提交成功模块：Admin, 控制器：User, 方法：edit请求方式：Ajax', 'http://92ws.co:8080/user/edit.html');
INSERT INTO `thank_operationlog` VALUES ('75', '1', 'ztao', '1463986653', '127.0.0.1', '1', '提示语：提交成功模块：Admin, 控制器：User, 方法：edit请求方式：Ajax', 'http://92ws.co:8080/user/edit/id/4.html');
INSERT INTO `thank_operationlog` VALUES ('76', '1', 'ztao', '1463986682', '127.0.0.1', '1', '提示语：提交成功模块：Admin, 控制器：User, 方法：edit请求方式：Ajax', 'http://92ws.co:8080/user/edit/id/4.html');
INSERT INTO `thank_operationlog` VALUES ('77', '1', 'ztao', '1463986695', '127.0.0.1', '1', '提示语：提交成功模块：Admin, 控制器：User, 方法：edit请求方式：Ajax', 'http://92ws.co:8080/user/edit/id/4.html');
INSERT INTO `thank_operationlog` VALUES ('78', '1', 'ztao', '1463986835', '127.0.0.1', '1', '提示语：修改成功模块：Admin, 控制器：User, 方法：status请求方式：Ajax', 'http://92ws.co:8080/user/index.html');
INSERT INTO `thank_operationlog` VALUES ('79', '1', 'ztao', '1463986838', '127.0.0.1', '1', '提示语：修改成功模块：Admin, 控制器：User, 方法：status请求方式：Ajax', 'http://92ws.co:8080/user/index.html');
INSERT INTO `thank_operationlog` VALUES ('80', '1', 'ztao', '1463986858', '127.0.0.1', '1', '提示语：提交成功模块：Admin, 控制器：User, 方法：edit请求方式：Ajax', 'http://92ws.co:8080/user/edit/id/2.html');
INSERT INTO `thank_operationlog` VALUES ('81', '1', 'ztao', '1463986873', '127.0.0.1', '1', '提示语：提交成功模块：Admin, 控制器：User, 方法：edit请求方式：Ajax', 'http://92ws.co:8080/user/edit/id/2.html');
INSERT INTO `thank_operationlog` VALUES ('82', '1', 'ztao', '1463986888', '127.0.0.1', '1', '提示语：提交成功模块：Admin, 控制器：User, 方法：edit请求方式：Ajax', 'http://92ws.co:8080/user/edit/id/2.html');
INSERT INTO `thank_operationlog` VALUES ('83', '1', 'ztao', '1463986980', '127.0.0.1', '1', '提示语：提交成功模块：Admin, 控制器：User, 方法：edit请求方式：Ajax', 'http://92ws.co:8080/user/edit/id/4.html');
INSERT INTO `thank_operationlog` VALUES ('84', '1', 'ztao', '1463986990', '127.0.0.1', '1', '提示语：刪除成功模块：Admin, 控制器：User, 方法：delete请求方式：Ajax', 'http://92ws.co:8080/user/index.html');
INSERT INTO `thank_operationlog` VALUES ('85', '1', 'ztao', '1463987017', '127.0.0.1', '1', '提示语：修改成功模块：Admin, 控制器：User, 方法：userinfo请求方式：Ajax', 'http://92ws.co:8080/user/userinfo/menuid/6.html');
INSERT INTO `thank_operationlog` VALUES ('86', '1', 'ztao', '1463987140', '127.0.0.1', '1', '提示语：提交成功模块：Admin, 控制器：Member, 方法：edit请求方式：Ajax', 'http://92ws.co:8080/member/edit.html');
INSERT INTO `thank_operationlog` VALUES ('87', '1', 'ztao', '1463987154', '127.0.0.1', '1', '提示语：提交成功模块：Admin, 控制器：Member, 方法：edit请求方式：Ajax', 'http://92ws.co:8080/member/edit/id/10001.html');
INSERT INTO `thank_operationlog` VALUES ('88', '1', 'ztao', '1463987159', '127.0.0.1', '1', '提示语：修改成功模块：Admin, 控制器：Member, 方法：status请求方式：Ajax', 'http://92ws.co:8080/member/index.html');
INSERT INTO `thank_operationlog` VALUES ('89', '1', 'ztao', '1463987164', '127.0.0.1', '1', '提示语：修改成功模块：Admin, 控制器：Member, 方法：status请求方式：Ajax', 'http://92ws.co:8080/member/index.html');
INSERT INTO `thank_operationlog` VALUES ('90', '1', 'ztao', '1463987192', '127.0.0.1', '1', '提示语：提交成功模块：Admin, 控制器：Member, 方法：edit请求方式：Ajax', 'http://92ws.co:8080/member/edit/id/10001.html');
INSERT INTO `thank_operationlog` VALUES ('91', '1', 'ztao', '1463987204', '127.0.0.1', '1', '提示语：提交成功模块：Admin, 控制器：Member, 方法：edit请求方式：Ajax', 'http://92ws.co:8080/member/edit/id/10001.html');
INSERT INTO `thank_operationlog` VALUES ('92', '1', 'ztao', '1463987216', '127.0.0.1', '1', '提示语：刪除成功模块：Admin, 控制器：Member, 方法：delete请求方式：Ajax', 'http://92ws.co:8080/member/index.html');
INSERT INTO `thank_operationlog` VALUES ('93', '1', 'ztao', '1463987229', '127.0.0.1', '0', '提示语：该会员ID不存在模块：Admin, 控制器：Member, 方法：blackadd请求方式：Ajax', 'http://92ws.co:8080/member/blackadd.html');
INSERT INTO `thank_operationlog` VALUES ('94', '1', 'ztao', '1463987261', '127.0.0.1', '0', '提示语：该会员已经存在！模块：Admin, 控制器：Member, 方法：blackadd请求方式：Ajax', 'http://92ws.co:8080/member/blackadd.html');
INSERT INTO `thank_operationlog` VALUES ('95', '1', 'ztao', '1463987267', '127.0.0.1', '1', '提示语：刪除成功模块：Admin, 控制器：Member, 方法：blackdelete请求方式：Ajax', 'http://92ws.co:8080/member/blacklist.html');
INSERT INTO `thank_operationlog` VALUES ('96', '1', 'ztao', '1463987274', '127.0.0.1', '1', '提示语：提交成功模块：Admin, 控制器：Member, 方法：blackadd请求方式：Ajax', 'http://92ws.co:8080/member/blackadd.html');
INSERT INTO `thank_operationlog` VALUES ('97', '0', '', '1463989979', '127.0.0.1', '0', '提示语：用户名或者密码错误，登陆失败！模块：Admin, 控制器：Public, 方法：dologin请求方式：Ajax', 'http://92ws.co:8080/public/login.html');
INSERT INTO `thank_operationlog` VALUES ('98', '0', '', '1463989988', '127.0.0.1', '0', '提示语：用户名或者密码错误，登陆失败！模块：Admin, 控制器：Public, 方法：dologin请求方式：Ajax', 'http://92ws.co:8080/public/login.html');
INSERT INTO `thank_operationlog` VALUES ('99', '0', '', '1463990004', '127.0.0.1', '0', '提示语：用户名或者密码错误，登陆失败！模块：Admin, 控制器：Public, 方法：dologin请求方式：Ajax', 'http://92ws.co:8080/public/login.html');
INSERT INTO `thank_operationlog` VALUES ('100', '1', 'ztao', '1463990019', '127.0.0.1', '1', '提示语：登陆成功！模块：Admin, 控制器：Public, 方法：dologin请求方式：Ajax', 'http://92ws.co:8080/public/login.html');
INSERT INTO `thank_operationlog` VALUES ('101', '1', 'ztao', '1463990065', '127.0.0.1', '1', '提示语：提交成功模块：Admin, 控制器：User, 方法：edit请求方式：Ajax', 'http://92ws.co:8080/user/edit/id/1.html');
INSERT INTO `thank_operationlog` VALUES ('102', '1', 'ztao', '1463990081', '127.0.0.1', '1', '提示语：提交成功模块：Admin, 控制器：User, 方法：edit请求方式：Ajax', 'http://92ws.co:8080/user/edit/id/2.html');
INSERT INTO `thank_operationlog` VALUES ('103', '0', '', '1463990085', '127.0.0.1', '1', '提示语：注销成功！模块：Admin, 控制器：Public, 方法：logout请求方式：GET', 'http://92ws.co:8080/');
INSERT INTO `thank_operationlog` VALUES ('104', '1', 'ztao', '1463990100', '127.0.0.1', '1', '提示语：登陆成功！模块：Admin, 控制器：Public, 方法：dologin请求方式：Ajax', 'http://92ws.co:8080/public/login.html');
INSERT INTO `thank_operationlog` VALUES ('105', '0', '', '1463990124', '127.0.0.1', '1', '提示语：注销成功！模块：Admin, 控制器：Public, 方法：logout请求方式：GET', 'http://92ws.co:8080/?safe=ztao');
INSERT INTO `thank_operationlog` VALUES ('106', '0', '', '1463990195', '127.0.0.1', '0', '提示语：用户名或者密码错误，登陆失败！模块：Admin, 控制器：Public, 方法：dologin请求方式：Ajax', 'http://92ws.co:8080/public/login.html');
INSERT INTO `thank_operationlog` VALUES ('107', '1', 'ztao', '1463990206', '127.0.0.1', '1', '提示语：登陆成功！模块：Admin, 控制器：Public, 方法：dologin请求方式：Ajax', 'http://92ws.co:8080/public/login.html');
INSERT INTO `thank_operationlog` VALUES ('108', '1', 'ztao', '1463990213', '127.0.0.1', '0', '提示语：该页面不存在！模块：Admin, 控制器：Setting, 方法：__public请求方式：GET', 'http://92ws.co:8080/setting/clearcache.html');
INSERT INTO `thank_operationlog` VALUES ('109', '0', '', '1463990217', '127.0.0.1', '1', '提示语：注销成功！模块：Admin, 控制器：Public, 方法：logout请求方式：GET', 'http://92ws.co:8080/');
INSERT INTO `thank_operationlog` VALUES ('110', '1', 'ztao', '1463995167', '127.0.0.1', '1', '提示语：登陆成功！模块：Admin, 控制器：Public, 方法：dologin请求方式：Ajax', 'http://92ws.co:8080/public/login.html');
INSERT INTO `thank_operationlog` VALUES ('111', '1', 'ztao', '1464000699', '127.0.0.1', '1', '提示语：授权成功模块：Admin, 控制器：Role, 方法：authorize请求方式：Ajax', 'http://92ws.co:8080/role/authorize/id/2.html');
INSERT INTO `thank_operationlog` VALUES ('112', '1', 'ztao', '1464675720', '127.0.0.1', '1', '提示语：登陆成功！模块：Admin, 控制器：Public, 方法：dologin请求方式：Ajax', 'http://92ws.co:8080/public/login.html');
INSERT INTO `thank_operationlog` VALUES ('113', '1', 'ztao', '1464675734', '127.0.0.1', '0', '提示语：该页面不存在！模块：Admin, 控制器：Setting, 方法：__public请求方式：GET', 'http://92ws.co:8080/setting/clearcache.html');
INSERT INTO `thank_operationlog` VALUES ('114', '0', '', '1464675737', '127.0.0.1', '1', '提示语：注销成功！模块：Admin, 控制器：Public, 方法：logout请求方式：GET', 'http://92ws.co:8080/');
INSERT INTO `thank_operationlog` VALUES ('115', '1', 'ztao', '1464676012', '127.0.0.1', '1', '提示语：登陆成功！模块：Admin, 控制器：Public, 方法：dologin请求方式：Ajax', 'http://92ws.co:8080/public/login.html');
INSERT INTO `thank_operationlog` VALUES ('116', '1', 'ztao', '1464676086', '127.0.0.1', '1', '提示语：提交成功模块：Admin, 控制器：User, 方法：edit请求方式：Ajax', 'http://92ws.co:8080/user/edit/id/2.html');
INSERT INTO `thank_operationlog` VALUES ('117', '0', '', '1464676091', '127.0.0.1', '1', '提示语：注销成功！模块：Admin, 控制器：Public, 方法：logout请求方式：GET', 'http://92ws.co:8080/');
INSERT INTO `thank_operationlog` VALUES ('118', '2', 'admin', '1464676099', '127.0.0.1', '1', '提示语：登陆成功！模块：Admin, 控制器：Public, 方法：dologin请求方式：Ajax', 'http://92ws.co:8080/public/login.html');
INSERT INTO `thank_operationlog` VALUES ('119', '2', 'admin', '1464676103', '127.0.0.1', '0', '提示语：您没有权限！模块：Admin, 控制器：Setting, 方法：__public请求方式：GET', 'http://92ws.co:8080/setting/clearcache.html');
INSERT INTO `thank_operationlog` VALUES ('120', '0', '', '1464676107', '127.0.0.1', '1', '提示语：注销成功！模块：Admin, 控制器：Public, 方法：logout请求方式：GET', 'http://92ws.co:8080/');
INSERT INTO `thank_operationlog` VALUES ('121', '1', 'ztao', '1464676120', '127.0.0.1', '1', '提示语：登陆成功！模块：Admin, 控制器：Public, 方法：dologin请求方式：Ajax', 'http://92ws.co:8080/public/login.html');
INSERT INTO `thank_operationlog` VALUES ('122', '0', '', '1464676142', '127.0.0.1', '1', '提示语：注销成功！模块：Admin, 控制器：Public, 方法：logout请求方式：GET', 'http://92ws.co:8080/');
INSERT INTO `thank_operationlog` VALUES ('123', '2', 'admin', '1464676148', '127.0.0.1', '1', '提示语：登陆成功！模块：Admin, 控制器：Public, 方法：dologin请求方式：Ajax', 'http://92ws.co:8080/public/login.html');
INSERT INTO `thank_operationlog` VALUES ('124', '0', '', '1464676369', '127.0.0.1', '1', '提示语：注销成功！模块：Admin, 控制器：Public, 方法：logout请求方式：GET', 'http://92ws.co:8080/');
INSERT INTO `thank_operationlog` VALUES ('125', '1', 'ztao', '1464676377', '127.0.0.1', '1', '提示语：登陆成功！模块：Admin, 控制器：Public, 方法：dologin请求方式：Ajax', 'http://92ws.co:8080/public/login.html');
INSERT INTO `thank_operationlog` VALUES ('126', '1', 'ztao', '1464676429', '127.0.0.1', '1', '提示语：提交成功模块：Admin, 控制器：Menu, 方法：edit请求方式：Ajax', 'http://92ws.co:8080/menu/edit/id/1.html');
INSERT INTO `thank_operationlog` VALUES ('127', '0', '', '1464676435', '127.0.0.1', '1', '提示语：注销成功！模块：Admin, 控制器：Public, 方法：logout请求方式：GET', 'http://92ws.co:8080/');
INSERT INTO `thank_operationlog` VALUES ('128', '2', 'admin', '1464676441', '127.0.0.1', '1', '提示语：登陆成功！模块：Admin, 控制器：Public, 方法：dologin请求方式：Ajax', 'http://92ws.co:8080/public/login.html');
INSERT INTO `thank_operationlog` VALUES ('129', '2', 'admin', '1464676451', '127.0.0.1', '0', '提示语：您没有权限！模块：Admin, 控制器：Setting, 方法：__public请求方式：GET', 'http://92ws.co:8080/setting/clearcache.html');
INSERT INTO `thank_operationlog` VALUES ('130', '0', '', '1464676493', '127.0.0.1', '1', '提示语：注销成功！模块：Admin, 控制器：Public, 方法：logout请求方式：GET', 'http://92ws.co:8080/');
INSERT INTO `thank_operationlog` VALUES ('131', '1', 'ztao', '1464676502', '127.0.0.1', '1', '提示语：登陆成功！模块：Admin, 控制器：Public, 方法：dologin请求方式：Ajax', 'http://92ws.co:8080/public/login.html');
INSERT INTO `thank_operationlog` VALUES ('132', '1', 'ztao', '1464676510', '127.0.0.1', '1', '提示语：提交成功模块：Admin, 控制器：Menu, 方法：edit请求方式：Ajax', 'http://92ws.co:8080/menu/edit/id/1/menuid/4.html');
INSERT INTO `thank_operationlog` VALUES ('133', '1', 'ztao', '1464676517', '127.0.0.1', '1', '提示语：提交成功模块：Admin, 控制器：Menu, 方法：edit请求方式：Ajax', 'http://92ws.co:8080/menu/edit/id/2/menuid/4.html');
INSERT INTO `thank_operationlog` VALUES ('134', '0', '', '1464676519', '127.0.0.1', '1', '提示语：注销成功！模块：Admin, 控制器：Public, 方法：logout请求方式：GET', 'http://92ws.co:8080/');
INSERT INTO `thank_operationlog` VALUES ('135', '2', 'admin', '1464676526', '127.0.0.1', '1', '提示语：登陆成功！模块：Admin, 控制器：Public, 方法：dologin请求方式：Ajax', 'http://92ws.co:8080/public/login.html');
INSERT INTO `thank_operationlog` VALUES ('136', '2', 'admin', '1464677707', '127.0.0.1', '0', '提示语：您没有权限！模块：Admin, 控制器：Menu, 方法：index请求方式：GET', '');
INSERT INTO `thank_operationlog` VALUES ('137', '0', '', '1464677727', '127.0.0.1', '1', '提示语：注销成功！模块：Admin, 控制器：Public, 方法：logout请求方式：GET', 'http://92ws.co:8080/');
INSERT INTO `thank_operationlog` VALUES ('138', '1', 'ztao', '1464677735', '127.0.0.1', '1', '提示语：登陆成功！模块：Admin, 控制器：Public, 方法：dologin请求方式：Ajax', 'http://92ws.co:8080/public/login.html');
INSERT INTO `thank_operationlog` VALUES ('139', '1', 'ztao', '1464677752', '127.0.0.1', '0', '提示语：模块：Admin, 控制器：Role, 方法：authorize请求方式：Ajax', 'http://92ws.co:8080/role/authorize/id/2.html');
INSERT INTO `thank_operationlog` VALUES ('140', '1', 'ztao', '1464677754', '127.0.0.1', '0', '提示语：模块：Admin, 控制器：Role, 方法：authorize请求方式：Ajax', 'http://92ws.co:8080/role/authorize/id/2.html');
INSERT INTO `thank_operationlog` VALUES ('141', '1', 'ztao', '1464677755', '127.0.0.1', '0', '提示语：模块：Admin, 控制器：Role, 方法：authorize请求方式：Ajax', 'http://92ws.co:8080/role/authorize/id/2.html');
INSERT INTO `thank_operationlog` VALUES ('142', '1', 'ztao', '1464677755', '127.0.0.1', '0', '提示语：模块：Admin, 控制器：Role, 方法：authorize请求方式：Ajax', 'http://92ws.co:8080/role/authorize/id/2.html');
INSERT INTO `thank_operationlog` VALUES ('143', '1', 'ztao', '1464677756', '127.0.0.1', '0', '提示语：模块：Admin, 控制器：Role, 方法：authorize请求方式：Ajax', 'http://92ws.co:8080/role/authorize/id/2.html');
INSERT INTO `thank_operationlog` VALUES ('144', '1', 'ztao', '1464677761', '127.0.0.1', '0', '提示语：模块：Admin, 控制器：Role, 方法：authorize请求方式：Ajax', 'http://92ws.co:8080/role/authorize/id/2.html');
INSERT INTO `thank_operationlog` VALUES ('145', '1', 'ztao', '1464677782', '127.0.0.1', '0', '提示语：模块：Admin, 控制器：Role, 方法：authorize请求方式：Ajax', 'http://92ws.co:8080/role/authorize/id/2.html');
INSERT INTO `thank_operationlog` VALUES ('146', '1', 'ztao', '1464677789', '127.0.0.1', '1', '提示语：授权成功模块：Admin, 控制器：Role, 方法：authorize请求方式：Ajax', 'http://92ws.co:8080/role/authorize/id/2.html');
INSERT INTO `thank_operationlog` VALUES ('147', '1', 'ztao', '1464677797', '127.0.0.1', '1', '提示语：授权成功模块：Admin, 控制器：Role, 方法：authorize请求方式：Ajax', 'http://92ws.co:8080/role/authorize/id/2.html');
INSERT INTO `thank_operationlog` VALUES ('148', '0', '', '1464677800', '127.0.0.1', '1', '提示语：注销成功！模块：Admin, 控制器：Public, 方法：logout请求方式：GET', 'http://92ws.co:8080/');
INSERT INTO `thank_operationlog` VALUES ('149', '2', 'admin', '1464677809', '127.0.0.1', '1', '提示语：登陆成功！模块：Admin, 控制器：Public, 方法：dologin请求方式：Ajax', 'http://92ws.co:8080/public/login.html');
INSERT INTO `thank_operationlog` VALUES ('150', '2', 'admin', '1464678011', '127.0.0.1', '0', '提示语：您没有权限！模块：Admin, 控制器：Setting, 方法：__public请求方式：GET', 'http://92ws.co:8080/setting/clearcache.html');
INSERT INTO `thank_operationlog` VALUES ('151', '2', 'admin', '1464678445', '127.0.0.1', '0', '提示语：您没有权限！模块：Admin, 控制器：User, 方法：userinfo请求方式：GET', 'http://92ws.co:8080/');
INSERT INTO `thank_operationlog` VALUES ('152', '2', 'admin', '1464678455', '127.0.0.1', '0', '提示语：您没有权限！模块：Admin, 控制器：User, 方法：userinfo请求方式：GET', 'http://92ws.co:8080/');
INSERT INTO `thank_operationlog` VALUES ('153', '2', 'admin', '1464678782', '127.0.0.1', '0', '提示语：您没有权限！模块：Admin, 控制器：User, 方法：userinfo请求方式：GET', '');
INSERT INTO `thank_operationlog` VALUES ('154', '0', '', '1465970022', '127.0.0.1', '0', '提示语：验证码错误，请重新输入！模块：Admin, 控制器：Public, 方法：dologin请求方式：Ajax', 'http://thankcms.dev:8080/public/login.html');
INSERT INTO `thank_operationlog` VALUES ('155', '1', 'ztao', '1465970028', '127.0.0.1', '1', '提示语：登陆成功！模块：Admin, 控制器：Public, 方法：dologin请求方式：Ajax', 'http://thankcms.dev:8080/public/login.html');
INSERT INTO `thank_operationlog` VALUES ('156', '1', 'ztao', '1465970115', '127.0.0.1', '0', '提示语：该菜单下还有子菜单，无法删除！模块：Admin, 控制器：Menu, 方法：delete请求方式：Ajax', 'http://thankcms.dev:8080/menu/index/menuid/4.html');
INSERT INTO `thank_operationlog` VALUES ('157', '1', 'ztao', '1465970120', '127.0.0.1', '1', '提示语：删除成功模块：Admin, 控制器：Menu, 方法：delete请求方式：Ajax', 'http://thankcms.dev:8080/menu/index/menuid/4.html');
INSERT INTO `thank_operationlog` VALUES ('158', '1', 'ztao', '1465970124', '127.0.0.1', '1', '提示语：删除成功模块：Admin, 控制器：Menu, 方法：delete请求方式：Ajax', 'http://thankcms.dev:8080/menu/index/menuid/4.html');
INSERT INTO `thank_operationlog` VALUES ('159', '1', 'ztao', '1465970335', '127.0.0.1', '1', '提示语：提交成功模块：Admin, 控制器：Menu, 方法：edit请求方式：Ajax', 'http://thankcms.dev:8080/menu/edit/id/32/menuid/4.html');
INSERT INTO `thank_operationlog` VALUES ('160', '1', 'ztao', '1465970338', '127.0.0.1', '0', '提示语：该页面不存在！模块：Admin, 控制器：Setting, 方法：__public请求方式：GET', 'http://thankcms.dev:8080/setting/clearcache.html');
INSERT INTO `thank_operationlog` VALUES ('161', '1', 'ztao', '1465970389', '127.0.0.1', '1', '提示语：刪除成功模块：Admin, 控制器：Area, 方法：delete请求方式：Ajax', 'http://thankcms.dev:8080/area/index/menuid/49.html');
INSERT INTO `thank_operationlog` VALUES ('162', '1', 'ztao', '1465970404', '127.0.0.1', '1', '提示语：刪除成功模块：Admin, 控制器：City, 方法：delete请求方式：Ajax', 'http://thankcms.dev:8080/city/index/menuid/48.html');
INSERT INTO `thank_operationlog` VALUES ('163', '1', 'ztao', '1465970407', '127.0.0.1', '1', '提示语：刪除成功模块：Admin, 控制器：City, 方法：delete请求方式：Ajax', 'http://thankcms.dev:8080/city/index/menuid/48.html');
INSERT INTO `thank_operationlog` VALUES ('164', '1', 'ztao', '1465970495', '127.0.0.1', '0', '提示语：该页面不存在！模块：Admin, 控制器：Setting, 方法：__public请求方式：GET', 'http://thankcms.dev:8080/setting/clearcache.html');
INSERT INTO `thank_operationlog` VALUES ('165', '1', 'ztao', '1465970556', '127.0.0.1', '1', '提示语：提交成功模块：Admin, 控制器：Menu, 方法：edit请求方式：Ajax', 'http://thankcms.dev:8080/menu/edit/id/71/menuid/4.html');
INSERT INTO `thank_operationlog` VALUES ('166', '1', 'ztao', '1465970565', '127.0.0.1', '0', '提示语：该页面不存在！模块：Admin, 控制器：Setting, 方法：__public请求方式：GET', 'http://thankcms.dev:8080/setting/clearcache.html');
INSERT INTO `thank_operationlog` VALUES ('167', '1', 'ztao', '1465970951', '127.0.0.1', '1', '提示语：排序更新成功！模块：Admin, 控制器：Content, 方法：listorders请求方式：Ajax', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('168', '1', 'ztao', '1465970953', '127.0.0.1', '1', '提示语：排序更新成功！模块：Admin, 控制器：Content, 方法：listorders请求方式：Ajax', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('169', '1', 'ztao', '1465970956', '127.0.0.1', '0', '提示语：模块：Admin, 控制器：Content, 方法：status请求方式：Ajax', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('170', '1', 'ztao', '1465970958', '127.0.0.1', '0', '提示语：模块：Admin, 控制器：Content, 方法：status请求方式：Ajax', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('171', '1', 'ztao', '1465970960', '127.0.0.1', '1', '提示语：修改成功模块：Admin, 控制器：Content, 方法：status请求方式：GET', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('172', '1', 'ztao', '1465970964', '127.0.0.1', '1', '提示语：修改成功模块：Admin, 控制器：Content, 方法：status请求方式：GET', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('173', '1', 'ztao', '1465970967', '127.0.0.1', '0', '提示语：模块：Admin, 控制器：Content, 方法：status请求方式：Ajax', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('174', '1', 'ztao', '1465970970', '127.0.0.1', '0', '提示语：模块：Admin, 控制器：Content, 方法：status请求方式：Ajax', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('175', '1', 'ztao', '1465970971', '127.0.0.1', '0', '提示语：模块：Admin, 控制器：Content, 方法：status请求方式：Ajax', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('176', '1', 'ztao', '1465971021', '127.0.0.1', '0', '提示语：该页面不存在！模块：Admin, 控制器：Content, 方法：deleteselect请求方式：Ajax', 'http://thankcms.dev:8080/content/index/menuid/50.html');
INSERT INTO `thank_operationlog` VALUES ('177', '1', 'ztao', '1465972475', '127.0.0.1', '1', '提示语：提交成功模块：Admin, 控制器：Content, 方法：edit请求方式：Ajax', 'http://thankcms.dev:8080/content/edit.html');
INSERT INTO `thank_operationlog` VALUES ('178', '1', 'ztao', '1465972482', '127.0.0.1', '1', '提示语：修改成功模块：Admin, 控制器：Content, 方法：status请求方式：GET', 'http://thankcms.dev:8080/content/index/menuid/50.html');
INSERT INTO `thank_operationlog` VALUES ('179', '1', 'ztao', '1465972701', '127.0.0.1', '1', '提示语：排序更新成功！模块：Admin, 控制器：Content, 方法：listorders请求方式：Ajax', 'http://thankcms.dev:8080/content/index/menuid/50.html');
INSERT INTO `thank_operationlog` VALUES ('180', '1', 'ztao', '1465972729', '127.0.0.1', '0', '提示语：文章标题不能为空！模块：Admin, 控制器：Content, 方法：edit请求方式：Ajax', 'http://thankcms.dev:8080/content/edit.html');
INSERT INTO `thank_operationlog` VALUES ('181', '1', 'ztao', '1465972860', '127.0.0.1', '0', '提示语：文章标题不能为空！模块：Admin, 控制器：Content, 方法：edit请求方式：Ajax', 'http://thankcms.dev:8080/content/edit.html');
INSERT INTO `thank_operationlog` VALUES ('182', '1', 'ztao', '1465972877', '127.0.0.1', '0', '提示语：文章分类不能为空！模块：Admin, 控制器：Content, 方法：edit请求方式：Ajax', 'http://thankcms.dev:8080/content/edit.html');
INSERT INTO `thank_operationlog` VALUES ('183', '1', 'ztao', '1465973222', '127.0.0.1', '1', '提示语：排序更新成功！模块：Admin, 控制器：Content, 方法：listorders请求方式：Ajax', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('184', '1', 'ztao', '1465973385', '127.0.0.1', '1', '提示语：排序更新成功！模块：Admin, 控制器：Content, 方法：listorders请求方式：Ajax', 'http://thankcms.dev:8080/content/index/menuid/50.html');
INSERT INTO `thank_operationlog` VALUES ('185', '1', 'ztao', '1465973604', '127.0.0.1', '0', '提示语：该页面不存在！模块：Admin, 控制器：Content, 方法：isrecom请求方式：GET', 'http://thankcms.dev:8080/content/index/menuid/50.html');
INSERT INTO `thank_operationlog` VALUES ('186', '1', 'ztao', '1465974383', '127.0.0.1', '1', '提示语：修改成功模块：Admin, 控制器：Content, 方法：change请求方式：Ajax', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('187', '1', 'ztao', '1465974387', '127.0.0.1', '0', '提示语：模块：Admin, 控制器：Content, 方法：change请求方式：Ajax', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('188', '1', 'ztao', '1465974389', '127.0.0.1', '0', '提示语：模块：Admin, 控制器：Content, 方法：change请求方式：Ajax', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('189', '1', 'ztao', '1465974391', '127.0.0.1', '0', '提示语：模块：Admin, 控制器：Content, 方法：change请求方式：Ajax', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('190', '1', 'ztao', '1465974391', '127.0.0.1', '0', '提示语：模块：Admin, 控制器：Content, 方法：change请求方式：Ajax', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('191', '1', 'ztao', '1465974393', '127.0.0.1', '0', '提示语：模块：Admin, 控制器：Content, 方法：change请求方式：Ajax', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('192', '1', 'ztao', '1465974395', '127.0.0.1', '0', '提示语：模块：Admin, 控制器：Content, 方法：change请求方式：Ajax', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('193', '1', 'ztao', '1465974548', '127.0.0.1', '1', '提示语：修改成功模块：Admin, 控制器：Content, 方法：change请求方式：GET', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('194', '1', 'ztao', '1465974552', '127.0.0.1', '1', '提示语：修改成功模块：Admin, 控制器：Content, 方法：change请求方式：GET', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('195', '1', 'ztao', '1465974558', '127.0.0.1', '1', '提示语：修改成功模块：Admin, 控制器：Content, 方法：change请求方式：Ajax', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('196', '1', 'ztao', '1465974561', '127.0.0.1', '0', '提示语：模块：Admin, 控制器：Content, 方法：change请求方式：Ajax', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('197', '1', 'ztao', '1465974567', '127.0.0.1', '0', '提示语：模块：Admin, 控制器：Content, 方法：change请求方式：Ajax', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('198', '1', 'ztao', '1465974572', '127.0.0.1', '0', '提示语：模块：Admin, 控制器：Content, 方法：change请求方式：Ajax', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('199', '1', 'ztao', '1465975841', '127.0.0.1', '0', '提示语：模块：Admin, 控制器：Content, 方法：change请求方式：Ajax', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('200', '1', 'ztao', '1465976011', '127.0.0.1', '0', '提示语：非法数据对象！模块：Admin, 控制器：Content, 方法：change请求方式：Ajax', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('201', '1', 'ztao', '1465976026', '127.0.0.1', '0', '提示语：非法数据对象！模块：Admin, 控制器：Content, 方法：change请求方式：Ajax', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('202', '1', 'ztao', '1465976030', '127.0.0.1', '0', '提示语：非法数据对象！模块：Admin, 控制器：Content, 方法：change请求方式：POST', '');
INSERT INTO `thank_operationlog` VALUES ('203', '1', 'ztao', '1465976076', '127.0.0.1', '0', '提示语：非法数据对象！模块：Admin, 控制器：Content, 方法：change请求方式：Ajax', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('204', '1', 'ztao', '1465976156', '127.0.0.1', '0', '提示语：没有操作对象！模块：Admin, 控制器：Content, 方法：change请求方式：GET', '');
INSERT INTO `thank_operationlog` VALUES ('205', '1', 'ztao', '1465976351', '127.0.0.1', '1', '提示语：修改成功模块：Admin, 控制器：Content, 方法：change请求方式：Ajax', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('206', '1', 'ztao', '1465976354', '127.0.0.1', '1', '提示语：修改成功模块：Admin, 控制器：Content, 方法：change请求方式：Ajax', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('207', '1', 'ztao', '1465976357', '127.0.0.1', '1', '提示语：修改成功模块：Admin, 控制器：Content, 方法：change请求方式：Ajax', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('208', '1', 'ztao', '1465976362', '127.0.0.1', '1', '提示语：修改成功模块：Admin, 控制器：Content, 方法：change请求方式：Ajax', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('209', '1', 'ztao', '1465976365', '127.0.0.1', '1', '提示语：修改成功模块：Admin, 控制器：Content, 方法：change请求方式：Ajax', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('210', '1', 'ztao', '1465976368', '127.0.0.1', '1', '提示语：修改成功模块：Admin, 控制器：Content, 方法：change请求方式：Ajax', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('211', '1', 'ztao', '1465976374', '127.0.0.1', '1', '提示语：刪除成功模块：Admin, 控制器：Content, 方法：delete请求方式：Ajax', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('212', '1', 'ztao', '1465976376', '127.0.0.1', '1', '提示语：修改成功模块：Admin, 控制器：Content, 方法：change请求方式：GET', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('213', '1', 'ztao', '1465976380', '127.0.0.1', '1', '提示语：修改成功模块：Admin, 控制器：Content, 方法：change请求方式：GET', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('214', '1', 'ztao', '1465976384', '127.0.0.1', '1', '提示语：刪除成功模块：Admin, 控制器：Content, 方法：delete请求方式：Ajax', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('215', '1', 'ztao', '1465976387', '127.0.0.1', '1', '提示语：刪除成功模块：Admin, 控制器：Content, 方法：delete请求方式：Ajax', 'http://thankcms.dev:8080/content/index.html');
INSERT INTO `thank_operationlog` VALUES ('216', '1', 'ztao', '1465976985', '127.0.0.1', '1', '提示语：提交成功模块：Admin, 控制器：Content, 方法：edit请求方式：Ajax', 'http://thankcms.dev:8080/content/edit.html');
INSERT INTO `thank_operationlog` VALUES ('217', '1', 'ztao', '1465984681', '127.0.0.1', '1', '提示语：登陆成功！模块：Admin, 控制器：Public, 方法：dologin请求方式：Ajax', 'http://manage.thankcms.dev:8080/public/login.html');
INSERT INTO `thank_operationlog` VALUES ('218', '1', 'ztao', '1466047452', '127.0.0.1', '0', '提示语：该页面不存在！模块：Admin, 控制器：Content, 方法： 请求方式：GET', 'http://manage.thankcms.dev:8080/content/edit.html');
INSERT INTO `thank_operationlog` VALUES ('219', '1', 'ztao', '1466586209', '127.0.0.1', '1', '提示语：登陆成功！模块：Admin, 控制器：Public, 方法：dologin请求方式：Ajax', 'http://manage.thankcms.dev:8080/public/login.html');

-- ----------------------------
-- Table structure for thank_role
-- ----------------------------
DROP TABLE IF EXISTS `thank_role`;
CREATE TABLE `thank_role` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '角色名称',
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态：为1正常，为0禁用',
  `rules` varchar(500) NOT NULL DEFAULT '' COMMENT '规则',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='角色表';

-- ----------------------------
-- Records of thank_role
-- ----------------------------
INSERT INTO `thank_role` VALUES ('1', '超级管理员', '拥有最高权限！', '1', '');
INSERT INTO `thank_role` VALUES ('2', '普通管理员', '拥有部分权限', '1', '1,2,6,7,3,10,11,12,13,15,16,18,19,25,26,27,5,30,33,36,37,39,45,46,62,34,41,42,31,50,51,52,65,71,72,73,75,76,66,67,68,69,70,32,48,63,54,55,49,57,58,64,60,61');

-- ----------------------------
-- Table structure for thank_user
-- ----------------------------
DROP TABLE IF EXISTS `thank_user`;
CREATE TABLE `thank_user` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL DEFAULT '' COMMENT '用户名',
  `truename` varchar(50) NOT NULL DEFAULT '' COMMENT '昵称/姓名',
  `password` varchar(50) NOT NULL COMMENT '密码',
  `last_login_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '上次登录时间',
  `last_login_ip` varchar(50) NOT NULL DEFAULT '' COMMENT '上次登录IP',
  `verify` varchar(50) NOT NULL DEFAULT '' COMMENT '证验码',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '邮箱',
  `remark` varchar(1000) NOT NULL DEFAULT '' COMMENT '备注',
  `create_time` int(11) unsigned NOT NULL COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL COMMENT '更新时间',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`),
  UNIQUE KEY `account` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='后台用户表';

-- ----------------------------
-- Records of thank_user
-- ----------------------------
INSERT INTO `thank_user` VALUES ('1', 'ztao', '张涛', '9e3008a34f8ffcb85752c5b4bdd0a8ee', '1466586209', '127.0.0.1', 'SgqZIN', 'ztao8@qq.com', '备注3', '1435807894', '1463990065', '1');
INSERT INTO `thank_user` VALUES ('2', 'admin', '张三', '2cb2b3d11ab7a05c0ffe0577864c49d9', '1464677809', '127.0.0.1', 'SSoEoJ', 'ztao668@sina.com', '324234', '1435807944', '1464676086', '1');
