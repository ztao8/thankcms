/*
Navicat MySQL Data Transfer

Source Server         : llocalhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : thankcms

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-06-30 14:36:54
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='角色权限明细表';

-- ----------------------------
-- Records of thank_access
-- ----------------------------
INSERT INTO `thank_access` VALUES ('1', '1');
INSERT INTO `thank_access` VALUES ('2', '2');
INSERT INTO `thank_access` VALUES ('4', '1');
INSERT INTO `thank_access` VALUES ('4', '2');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='文章分类表';

-- ----------------------------
-- Records of thank_category
-- ----------------------------
INSERT INTO `thank_category` VALUES ('3', '0', '资讯分类', '4324324', '1', '0', '1438140693', '1438140693');

-- ----------------------------
-- Table structure for thank_comment
-- ----------------------------
DROP TABLE IF EXISTS `thank_comment`;
CREATE TABLE `thank_comment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `content_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '所属ID',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '用户名昵称',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '邮箱',
  `phone` varchar(50) NOT NULL DEFAULT '' COMMENT '手机号码',
  `content` text NOT NULL COMMENT '内容',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否审核',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='评论管理表';

-- ----------------------------
-- Records of thank_comment
-- ----------------------------

-- ----------------------------
-- Table structure for thank_content
-- ----------------------------
DROP TABLE IF EXISTS `thank_content`;
CREATE TABLE `thank_content` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `member_id` int(11) NOT NULL DEFAULT '0' COMMENT '会员id',
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章分类表';

-- ----------------------------
-- Records of thank_content
-- ----------------------------

-- ----------------------------
-- Table structure for thank_feedback
-- ----------------------------
DROP TABLE IF EXISTS `thank_feedback`;
CREATE TABLE `thank_feedback` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `member_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '会员ID',
  `category` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '回复分类0:问题反馈1需求提交',
  `picture` varchar(1000) NOT NULL DEFAULT '' COMMENT '图片',
  `content` varchar(3000) NOT NULL DEFAULT '' COMMENT '反馈内容',
  `feedback` varchar(3000) NOT NULL DEFAULT '' COMMENT '回复内容',
  `username` varchar(100) NOT NULL DEFAULT '' COMMENT '回复用户',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否处理',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='意见反馈表';

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='后台登陆日志表';

-- ----------------------------
-- Records of thank_loginlog
-- ----------------------------

-- ----------------------------
-- Table structure for thank_member
-- ----------------------------
DROP TABLE IF EXISTS `thank_member`;
CREATE TABLE `thank_member` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `email` varchar(100) NOT NULL DEFAULT '' COMMENT '登陆邮箱',
  `password` varchar(50) NOT NULL DEFAULT '' COMMENT '密码',
  `remain_amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '存上家的余款',
  `grade` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '级别',
  `alipay_account` varchar(255) NOT NULL DEFAULT '' COMMENT '支付宝账号',
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
  `avatar` varchar(255) NOT NULL DEFAULT '' COMMENT '头像',
  `recom_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '推荐人ID',
  `is_init` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否同步',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否启用',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `phone` (`phone`),
  KEY `recom_id` (`recom_id`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员表';

-- ----------------------------
-- Records of thank_member
-- ----------------------------

-- ----------------------------
-- Table structure for thank_member_loginlog
-- ----------------------------
DROP TABLE IF EXISTS `thank_member_loginlog`;
CREATE TABLE `thank_member_loginlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '日志ID',
  `username` varchar(50) NOT NULL DEFAULT '' COMMENT '登录帐号',
  `logintime` int(10) NOT NULL DEFAULT '0' COMMENT '登录时间戳',
  `loginip` varchar(50) NOT NULL DEFAULT '' COMMENT '登录IP',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态,1为登录成功，0为登录失败',
  `password` varchar(50) NOT NULL DEFAULT '' COMMENT '尝试错误密码',
  `info` varchar(1000) NOT NULL DEFAULT '' COMMENT '其他说明',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员登录日志表';

-- ----------------------------
-- Records of thank_member_loginlog
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
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8 COMMENT='菜单表';

-- ----------------------------
-- Records of thank_menu
-- ----------------------------
INSERT INTO `thank_menu` VALUES ('1', '0', 'admin', 'setting', 'index', 'setting/index', '设置', '1', '1', '', 'cogs', '', '0');
INSERT INTO `thank_menu` VALUES ('2', '1', 'admin', 'setting', 'user', 'setting/user', '个人信息', '0', '1', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('3', '1', 'admin', 'user', 'index', 'user/index', '用户管理', '1', '1', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('4', '1', 'admin', 'menu', 'index', 'menu/index', '后台菜单', '1', '1', '', '', '', '998');
INSERT INTO `thank_menu` VALUES ('5', '1', 'admin', 'setting', 'clearcache', 'setting/clearcache', '清楚缓存', '1', '1', '', '', '', '999');
INSERT INTO `thank_menu` VALUES ('6', '2', 'admin', 'user', 'userinfo', 'user/userinfo', '修改信息', '1', '1', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('7', '2', 'admin', 'setting', 'password', 'setting/password', '修改密码', '1', '1', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('10', '3', 'admin', 'role', 'index', 'role/index', '角色管理', '1', '1', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('11', '10', 'admin', 'role', 'authorize', 'role/authorize', '权限设置', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('12', '10', 'admin', 'role', 'edit', 'role/edit', '编辑角色', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('13', '10', 'admin', 'role', 'delete', 'role/delete', '删除角色', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('15', '3', 'admin', 'user', 'index', 'user/index', '管理员', '1', '1', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('16', '15', 'admin', 'user', 'edit', 'user/edit', '管理员编辑', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('18', '15', 'admin', 'user', 'delete', 'user/delete', '管理员删除', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('19', '15', 'admin', 'user', 'status', 'user/status', '管理员状态', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('21', '4', 'admin', 'menu', 'edit', 'menu/edit', '编辑菜单', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('22', '4', 'admin', 'menu', 'delete', 'menu/delete', '删除菜单', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('23', '4', 'admin', 'menu', 'listorders', 'menu/listorders', '菜单排序', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('24', '4', 'admin', 'menu', 'lists', 'menu/lists', '所有菜单', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('25', '1', 'admin', 'logs', 'index', 'logs/index', '日志管理', '1', '1', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('26', '25', 'admin', 'logs', 'operationlog', 'logs/operationlog', '操作日志', '1', '1', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('27', '25', 'admin', 'logs', 'loginlog', 'logs/loginlog', '登录日志', '1', '1', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('28', '26', 'admin', 'logs', 'deletelog', 'logs/deletelog', '删除一个月前操作日志', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('29', '27', 'admin', 'logs', 'deleteloginlog', 'logs/deleteloginlog', '删除一个月前登陆日志', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('30', '0', 'admin', 'member', 'index', 'member/index', '会员管理', '1', '1', '', 'group', '', '0');
INSERT INTO `thank_menu` VALUES ('31', '0', 'admin', 'content', 'index', 'content/index', '内容管理', '1', '1', '', 'th', '', '0');
INSERT INTO `thank_menu` VALUES ('33', '30', 'admin', 'member', 'index', 'member/index', '会员列表', '1', '1', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('36', '33', 'admin', 'member', 'edit', 'member/edit', '编辑会员', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('37', '33', 'admin', 'member', 'delete', 'member/delete', '删除会员', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('39', '33', 'admin', 'member', 'show', 'member/show', '查看会员', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('50', '31', 'admin', 'content', 'index', 'content/index', '文章管理', '1', '1', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('51', '50', 'admin', 'content', 'edit', 'content/edit', '编辑文章', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('52', '50', 'admin', 'content', 'delete', 'content/delete', '删除文章', '1', '0', '', '', '', '0');
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
INSERT INTO `thank_menu` VALUES ('85', '25', 'admin', 'logs', 'memberLoginlog', 'logs/memberLoginlog', '会员登录日志', '1', '1', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('86', '85', 'admin', 'logs', 'deleteMemberLoginlog', 'logs/deleteMemberLoginlog', '删除一个月前会员日志', '1', '0', '', '', '', '0');
INSERT INTO `thank_menu` VALUES ('87', '30', 'admin', 'recharge', 'index', 'recharge/index', '充值记录', '1', '1', '', '', '', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='后台操作日志表';

-- ----------------------------
-- Records of thank_operationlog
-- ----------------------------
INSERT INTO `thank_operationlog` VALUES ('1', '2', 'admin', '1498804559', '127.0.0.1', '1', '提示语：修改成功模块：Admin, 控制器：User, 方法：userinfo请求方式：Ajax', 'http://manage.thinkcms.dev/user/userinfo/menuid/6.html');

-- ----------------------------
-- Table structure for thank_recharge
-- ----------------------------
DROP TABLE IF EXISTS `thank_recharge`;
CREATE TABLE `thank_recharge` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `member_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '会员ID',
  `amount` decimal(10,0) NOT NULL DEFAULT '0' COMMENT '充值金额',
  `remark` varchar(200) NOT NULL DEFAULT '' COMMENT '操作用户',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态0：未成功1：成功',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员充值记录';

-- ----------------------------
-- Records of thank_recharge
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='角色表';

-- ----------------------------
-- Records of thank_role
-- ----------------------------
INSERT INTO `thank_role` VALUES ('1', '超级管理员', '拥有最高权限！', '1', '');
INSERT INTO `thank_role` VALUES ('2', '普通管理员', '拥有部分权限', '1', '1,2,6,7,25,26,28,27,29,85,86,5,30,33,36,37,39,87,31,50,51,52,65,71,72,73,75,76,66,67,68,69,70');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='后台用户表';

-- ----------------------------
-- Records of thank_user
-- ----------------------------
INSERT INTO `thank_user` VALUES ('1', 'ztao', '张涛', '9e3008a34f8ffcb85752c5b4bdd0a8ee', '1498802462', '127.0.0.1', 'SgqZIN', 'ztao8@qq.com', '备注3', '1435807894', '1463990065', '1');
INSERT INTO `thank_user` VALUES ('2', 'admin', '管理员', '3b080f823c0943b56d6b40ad2083dcf9', '1498802551', '127.0.0.1', 'JjNtNn', 'ztao668@sina.com', '', '1498801142', '1498804559', '1');
