/*
Navicat MySQL Data Transfer

Source Server         : baidu_lotus
Source Server Version : 50558
Source Host           : 182.61.54.187:3306
Source Database       : lotus

Target Server Type    : MYSQL
Target Server Version : 50558
File Encoding         : 65001

Date: 2018-01-12 09:52:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for sm_admin_user
-- ----------------------------
DROP TABLE IF EXISTS `sm_admin_user`;
CREATE TABLE `sm_admin_user` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '' COMMENT '管理员用户名',
  `password` varchar(50) NOT NULL DEFAULT '' COMMENT '管理员密码',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1 启用 0 禁用',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `last_login_time` datetime DEFAULT NULL COMMENT '最后登录时间',
  `last_login_ip` varchar(20) DEFAULT NULL COMMENT '最后登录IP',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- ----------------------------
-- Records of sm_admin_user
-- ----------------------------
INSERT INTO `sm_admin_user` VALUES ('1', 'admin', '\r\n\r\ne10adc3949ba59abbe56e057f20f883e', '1', '2016-10-18 15:28:37', '2017-04-12 12:45:08', '127.0.0.1');

-- ----------------------------
-- Table structure for sm_api
-- ----------------------------
DROP TABLE IF EXISTS `sm_api`;
CREATE TABLE `sm_api` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `base_url` varchar(255) DEFAULT NULL,
  `hash` varchar(50) DEFAULT NULL,
  `method` varchar(10) DEFAULT NULL,
  `is_token` varchar(255) DEFAULT '0',
  `app_id` int(11) DEFAULT NULL,
  `param` varchar(255) DEFAULT NULL,
  `key` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sm_api
-- ----------------------------
INSERT INTO `sm_api` VALUES ('1', 'test', 'https://www.lotusadmin.top/index/index/testPost.html', 'NGPJPXYFLBFCTASBXYMYJ97R5', 'get', '1', null, 'id:2|name:jack5558888jack555', null, null, '1511938273', '1515675051');

-- ----------------------------
-- Table structure for sm_app
-- ----------------------------
DROP TABLE IF EXISTS `sm_app`;
CREATE TABLE `sm_app` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `app_id` int(11) NOT NULL,
  `secret` varchar(255) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `app_id` (`app_id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sm_app
-- ----------------------------
INSERT INTO `sm_app` VALUES ('40', '11111', '88933469', 'KHVGZMSQL539NPCN4OHP2ENKO', '1512894631', '1515563415');
INSERT INTO `sm_app` VALUES ('41', '1234', '79840987', '2W8E78MVTB6PO5VWQX41JL119', '1512894694', '1515499962');
INSERT INTO `sm_app` VALUES ('48', '67890', '83315454', 'T5TIKY52PXW92KI8T47YNCPY2', '1512900450', '1514554017');
INSERT INTO `sm_app` VALUES ('49', '1213', '89701605', 'CSOS6G1EX3PBE5QLWVOKJ4S4N', '1513262603', '1513262603');
INSERT INTO `sm_app` VALUES ('50', '1213', '89701605', 'CSOS6G1EX3PBE5QLWVOKJ4S4N', '1513262604', '1513262604');
INSERT INTO `sm_app` VALUES ('51', '33213213', '36632265', 'SJXMOASBN1F7ZD85V44FPFZD5', '1513749512', '1513749512');
INSERT INTO `sm_app` VALUES ('52', '66', '41119516', 'VG57ZSSDC1PN66QWHTQ167BXW', '1514170106', '1514170106');
INSERT INTO `sm_app` VALUES ('54', 'fff', '35381515', 'FW8R3HD2DK7UVSK1UNPWUX3VR', '1514337763', '1514337763');
INSERT INTO `sm_app` VALUES ('55', 'gggg', '17816116', 'V42T5EVD39Y19PHVQVKAP6AAM', '1514337920', '1514337920');
INSERT INTO `sm_app` VALUES ('57', 'cccc', '49974162', 'ZO17VP3DNTDRKP97MDH8QPVP1', '1514942818', '1514942818');
INSERT INTO `sm_app` VALUES ('58', 'ccccccc', '7590978', 'Z49SLTXW6ZXF3EUE8WINYKQ5M', '1514942861', '1514942861');
INSERT INTO `sm_app` VALUES ('60', 'kkk', '54715303', '5CCDKWB5RF2VEEFSXMK3OPI81', '1515595547', '1515595547');

-- ----------------------------
-- Table structure for sm_article
-- ----------------------------
DROP TABLE IF EXISTS `sm_article`;
CREATE TABLE `sm_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章ID',
  `cid` smallint(5) unsigned NOT NULL COMMENT '分类ID',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `introduction` varchar(255) DEFAULT '' COMMENT '简介',
  `content` longtext COMMENT '内容',
  `author` varchar(20) DEFAULT '' COMMENT '作者',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态 0 待审核  1 审核',
  `reading` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '阅读量',
  `thumb` varchar(255) DEFAULT '' COMMENT '缩略图',
  `photo` text COMMENT '图集',
  `is_top` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否置顶  0 不置顶  1 置顶',
  `is_recommend` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否推荐  0 不推荐  1 推荐',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `create_time` datetime NOT NULL COMMENT '创建时间',
  `publish_time` datetime NOT NULL COMMENT '发布时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Records of sm_article
-- ----------------------------
INSERT INTO `sm_article` VALUES ('1', '1', '测试文章一', '', '<p>测试内容</p>', 'admin', '1', '0', '', null, '0', '0', '0', '2017-04-11 14:10:10', '2017-04-11 14:09:45');

-- ----------------------------
-- Table structure for sm_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `sm_auth_group`;
CREATE TABLE `sm_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` varchar(255) NOT NULL COMMENT '权限规则ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=178 DEFAULT CHARSET=utf8 COMMENT='权限组表';

-- ----------------------------
-- Records of sm_auth_group
-- ----------------------------
INSERT INTO `sm_auth_group` VALUES ('1', '超级管理组', '1', '1,2,3,103');
INSERT INTO `sm_auth_group` VALUES ('145', 'asfasdf2', '1', '7,8');
INSERT INTO `sm_auth_group` VALUES ('144', '11133', '0', '197');
INSERT INTO `sm_auth_group` VALUES ('172', 'test', '1', '5,6,7,8,203,204,205');
INSERT INTO `sm_auth_group` VALUES ('173', 'sadxzc', '1', '1,2,3,4,5,6,7,8');
INSERT INTO `sm_auth_group` VALUES ('176', '123', '0', '');
INSERT INTO `sm_auth_group` VALUES ('177', '123123', '0', '');

-- ----------------------------
-- Table structure for sm_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `sm_auth_group_access`;
CREATE TABLE `sm_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='权限组规则表';

-- ----------------------------
-- Records of sm_auth_group_access
-- ----------------------------
INSERT INTO `sm_auth_group_access` VALUES ('1', '1');
INSERT INTO `sm_auth_group_access` VALUES ('27', '2');
INSERT INTO `sm_auth_group_access` VALUES ('28', '2');
INSERT INTO `sm_auth_group_access` VALUES ('29', '50');
INSERT INTO `sm_auth_group_access` VALUES ('30', '52');
INSERT INTO `sm_auth_group_access` VALUES ('31', '54');
INSERT INTO `sm_auth_group_access` VALUES ('32', '2');
INSERT INTO `sm_auth_group_access` VALUES ('33', '64');
INSERT INTO `sm_auth_group_access` VALUES ('34', '1');
INSERT INTO `sm_auth_group_access` VALUES ('35', '52');
INSERT INTO `sm_auth_group_access` VALUES ('36', '35');
INSERT INTO `sm_auth_group_access` VALUES ('37', '52');
INSERT INTO `sm_auth_group_access` VALUES ('38', '65');
INSERT INTO `sm_auth_group_access` VALUES ('39', '59');
INSERT INTO `sm_auth_group_access` VALUES ('40', '69');
INSERT INTO `sm_auth_group_access` VALUES ('41', '69');
INSERT INTO `sm_auth_group_access` VALUES ('42', '69');
INSERT INTO `sm_auth_group_access` VALUES ('43', '61');
INSERT INTO `sm_auth_group_access` VALUES ('44', '62');
INSERT INTO `sm_auth_group_access` VALUES ('45', '64');
INSERT INTO `sm_auth_group_access` VALUES ('46', '69');
INSERT INTO `sm_auth_group_access` VALUES ('47', '70');
INSERT INTO `sm_auth_group_access` VALUES ('48', '70');
INSERT INTO `sm_auth_group_access` VALUES ('49', '70');
INSERT INTO `sm_auth_group_access` VALUES ('50', '69');
INSERT INTO `sm_auth_group_access` VALUES ('51', '70');
INSERT INTO `sm_auth_group_access` VALUES ('52', '70');
INSERT INTO `sm_auth_group_access` VALUES ('53', '70');
INSERT INTO `sm_auth_group_access` VALUES ('54', '70');
INSERT INTO `sm_auth_group_access` VALUES ('55', '1');
INSERT INTO `sm_auth_group_access` VALUES ('56', '1');
INSERT INTO `sm_auth_group_access` VALUES ('57', '72');
INSERT INTO `sm_auth_group_access` VALUES ('58', '72');
INSERT INTO `sm_auth_group_access` VALUES ('59', '72');
INSERT INTO `sm_auth_group_access` VALUES ('60', '72');
INSERT INTO `sm_auth_group_access` VALUES ('61', '1');
INSERT INTO `sm_auth_group_access` VALUES ('62', '78');
INSERT INTO `sm_auth_group_access` VALUES ('63', '78');
INSERT INTO `sm_auth_group_access` VALUES ('64', '1');
INSERT INTO `sm_auth_group_access` VALUES ('65', '117');
INSERT INTO `sm_auth_group_access` VALUES ('66', '90');
INSERT INTO `sm_auth_group_access` VALUES ('67', '90');
INSERT INTO `sm_auth_group_access` VALUES ('68', '102');
INSERT INTO `sm_auth_group_access` VALUES ('69', '102');
INSERT INTO `sm_auth_group_access` VALUES ('70', '102');
INSERT INTO `sm_auth_group_access` VALUES ('71', '106');
INSERT INTO `sm_auth_group_access` VALUES ('72', '106');
INSERT INTO `sm_auth_group_access` VALUES ('73', '112');
INSERT INTO `sm_auth_group_access` VALUES ('74', '111');
INSERT INTO `sm_auth_group_access` VALUES ('75', '78');
INSERT INTO `sm_auth_group_access` VALUES ('76', '126');
INSERT INTO `sm_auth_group_access` VALUES ('77', '1');
INSERT INTO `sm_auth_group_access` VALUES ('78', '123');
INSERT INTO `sm_auth_group_access` VALUES ('79', '1');
INSERT INTO `sm_auth_group_access` VALUES ('80', '123');
INSERT INTO `sm_auth_group_access` VALUES ('81', '129');
INSERT INTO `sm_auth_group_access` VALUES ('82', '135');
INSERT INTO `sm_auth_group_access` VALUES ('83', '129');
INSERT INTO `sm_auth_group_access` VALUES ('84', '138');
INSERT INTO `sm_auth_group_access` VALUES ('85', '137');
INSERT INTO `sm_auth_group_access` VALUES ('86', '1');
INSERT INTO `sm_auth_group_access` VALUES ('87', '138');
INSERT INTO `sm_auth_group_access` VALUES ('88', '138');
INSERT INTO `sm_auth_group_access` VALUES ('89', '138');
INSERT INTO `sm_auth_group_access` VALUES ('90', '138');
INSERT INTO `sm_auth_group_access` VALUES ('91', '117');
INSERT INTO `sm_auth_group_access` VALUES ('92', '156');
INSERT INTO `sm_auth_group_access` VALUES ('93', '156');
INSERT INTO `sm_auth_group_access` VALUES ('94', '163');
INSERT INTO `sm_auth_group_access` VALUES ('95', '164');
INSERT INTO `sm_auth_group_access` VALUES ('96', '145');
INSERT INTO `sm_auth_group_access` VALUES ('97', '172');
INSERT INTO `sm_auth_group_access` VALUES ('98', '175');
INSERT INTO `sm_auth_group_access` VALUES ('99', '1');
INSERT INTO `sm_auth_group_access` VALUES ('100', '173');

-- ----------------------------
-- Table structure for sm_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `sm_auth_rule`;
CREATE TABLE `sm_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL DEFAULT '' COMMENT '规则名称',
  `title` varchar(20) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `pid` smallint(5) unsigned NOT NULL COMMENT '父级ID',
  `icon` varchar(50) DEFAULT '' COMMENT '图标',
  `sort` tinyint(4) unsigned NOT NULL COMMENT '排序',
  `condition` char(100) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=206 DEFAULT CHARSET=utf8 COMMENT='规则表';

-- ----------------------------
-- Records of sm_auth_rule
-- ----------------------------
INSERT INTO `sm_auth_rule` VALUES ('1', 'admin/user/default', '用户管理', '1', '1', '0', 'xe68e', '100', '');
INSERT INTO `sm_auth_rule` VALUES ('2', 'admin/user/userlist', '用户列表', '1', '1', '1', '', '0', '');
INSERT INTO `sm_auth_rule` VALUES ('3', 'admin/auth/index', '权限管理', '1', '1', '1', '', '0', '');
INSERT INTO `sm_auth_rule` VALUES ('4', 'admin/auth/showRole', '角色列表', '1', '1', '1', '', '0', '');
INSERT INTO `sm_auth_rule` VALUES ('8', 'admin/api/app_list', '接口仓库', '1', '1', '7', '', '0', '');
INSERT INTO `sm_auth_rule` VALUES ('5', 'admin/db_manage/default', '数据库', '1', '1', '0', 'xe631', '0', '');
INSERT INTO `sm_auth_rule` VALUES ('6', 'admin/db_manage/index', '优化', '1', '1', '5', '', '0', '');
INSERT INTO `sm_auth_rule` VALUES ('7', 'admin/api/default', '接口管理', '1', '1', '0', 'xe857', '0', '');
INSERT INTO `sm_auth_rule` VALUES ('202', 'admin/file_system/index', '文件管理', '1', '1', '0', 'xe61d', '0', '');
INSERT INTO `sm_auth_rule` VALUES ('203', 'sadasd', '一级菜单', '1', '1', '0', 'xe600', '200', '');
INSERT INTO `sm_auth_rule` VALUES ('204', 'asdasd', '二级菜单', '1', '1', '203', 'xe60a', '200', '');
INSERT INTO `sm_auth_rule` VALUES ('205', 'sadasdasd', '三级菜单', '1', '1', '204', '', '255', '');

-- ----------------------------
-- Table structure for sm_category
-- ----------------------------
DROP TABLE IF EXISTS `sm_category`;
CREATE TABLE `sm_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `name` varchar(50) NOT NULL COMMENT '分类名称',
  `alias` varchar(50) DEFAULT '' COMMENT '导航别名',
  `content` longtext COMMENT '分类内容',
  `thumb` varchar(255) DEFAULT '' COMMENT '缩略图',
  `icon` varchar(20) DEFAULT '' COMMENT '分类图标',
  `list_template` varchar(50) DEFAULT '' COMMENT '分类列表模板',
  `detail_template` varchar(50) DEFAULT '' COMMENT '分类详情模板',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '分类类型  1  列表  2 单页',
  `sort` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类ID',
  `path` varchar(255) DEFAULT '' COMMENT '路径',
  `create_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='分类表';

-- ----------------------------
-- Records of sm_category
-- ----------------------------
INSERT INTO `sm_category` VALUES ('1', '分类一', '', '', '', '', '', '', '1', '0', '0', '0,', '2016-12-22 18:22:24');

-- ----------------------------
-- Table structure for sm_file
-- ----------------------------
DROP TABLE IF EXISTS `sm_file`;
CREATE TABLE `sm_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `size` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sm_file
-- ----------------------------
INSERT INTO `sm_file` VALUES ('30', '/public/uploads/20180109/c3be19bb67f119378a744246f8547d7d.jpg', '444k');
INSERT INTO `sm_file` VALUES ('32', '/public/uploads/20180109/6d781405b9283e686ce7c35318296f72.jpg', '233k');
INSERT INTO `sm_file` VALUES ('33', '/public/uploads/20180109/148c62e0934cd97545897fabdc94fb43.jpg', '411k');
INSERT INTO `sm_file` VALUES ('35', '/public/uploads/20180109/278d28de60b3a222b9de9a2feeac1811.jpg', '559k');
INSERT INTO `sm_file` VALUES ('37', '/public/uploads/20180109/ee0b71f4ff2b34e4e28b3ecf08100691.jpg', '261k');
INSERT INTO `sm_file` VALUES ('39', '/public/uploads/20180109/8b4339a3900b49bc4b1d99547bd4eade.jpg', '211k');
INSERT INTO `sm_file` VALUES ('43', '/public/uploads/20180109/099c801727609fd3d69417b70e0302b8.jpg', '215k');
INSERT INTO `sm_file` VALUES ('46', '/public/uploads/20180109/9a58b24da7b35462c5d7f5125ac5cae9.jpg', '197k');
INSERT INTO `sm_file` VALUES ('47', '/public/uploads/20180109/57201c4836970c35ed3eed13b7530597.jpg', '166k');

-- ----------------------------
-- Table structure for sm_link
-- ----------------------------
DROP TABLE IF EXISTS `sm_link`;
CREATE TABLE `sm_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '链接名称',
  `link` varchar(255) DEFAULT '' COMMENT '链接地址',
  `image` varchar(255) DEFAULT '' COMMENT '链接图片',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1 显示  2 隐藏',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='友情链接表';

-- ----------------------------
-- Records of sm_link
-- ----------------------------

-- ----------------------------
-- Table structure for sm_nav
-- ----------------------------
DROP TABLE IF EXISTS `sm_nav`;
CREATE TABLE `sm_nav` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL COMMENT '父ID',
  `name` varchar(20) NOT NULL COMMENT '导航名称',
  `alias` varchar(20) DEFAULT '' COMMENT '导航别称',
  `link` varchar(255) DEFAULT '' COMMENT '导航链接',
  `icon` varchar(255) DEFAULT '' COMMENT '导航图标',
  `target` varchar(10) DEFAULT '' COMMENT '打开方式',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态  0 隐藏  1 显示',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='导航表';

-- ----------------------------
-- Records of sm_nav
-- ----------------------------

-- ----------------------------
-- Table structure for sm_slide
-- ----------------------------
DROP TABLE IF EXISTS `sm_slide`;
CREATE TABLE `sm_slide` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(10) unsigned NOT NULL COMMENT '分类ID',
  `name` varchar(50) NOT NULL COMMENT '轮播图名称',
  `description` varchar(255) DEFAULT '' COMMENT '说明',
  `link` varchar(255) DEFAULT '' COMMENT '链接',
  `target` varchar(10) DEFAULT '' COMMENT '打开方式',
  `image` varchar(255) DEFAULT '' COMMENT '轮播图片',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态  1 显示  0  隐藏',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='轮播图表';

-- ----------------------------
-- Records of sm_slide
-- ----------------------------

-- ----------------------------
-- Table structure for sm_slide_category
-- ----------------------------
DROP TABLE IF EXISTS `sm_slide_category`;
CREATE TABLE `sm_slide_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '轮播图分类',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='轮播图分类表';

-- ----------------------------
-- Records of sm_slide_category
-- ----------------------------
INSERT INTO `sm_slide_category` VALUES ('1', '首页轮播');

-- ----------------------------
-- Table structure for sm_system
-- ----------------------------
DROP TABLE IF EXISTS `sm_system`;
CREATE TABLE `sm_system` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '配置项名称',
  `value` text NOT NULL COMMENT '配置项值',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='系统配置表';

-- ----------------------------
-- Records of sm_system
-- ----------------------------
INSERT INTO `sm_system` VALUES ('1', 'site_config', 'a:7:{s:10:\"site_title\";s:30:\"Think Admin 后台管理系统\";s:9:\"seo_title\";s:0:\"\";s:11:\"seo_keyword\";s:0:\"\";s:15:\"seo_description\";s:0:\"\";s:14:\"site_copyright\";s:0:\"\";s:8:\"site_icp\";s:0:\"\";s:11:\"site_tongji\";s:0:\"\";}');

-- ----------------------------
-- Table structure for sm_user
-- ----------------------------
DROP TABLE IF EXISTS `sm_user`;
CREATE TABLE `sm_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL COMMENT '用户名',
  `password` varchar(50) NOT NULL COMMENT '密码',
  `mobile` varchar(11) DEFAULT '' COMMENT '手机',
  `email` varchar(50) DEFAULT '' COMMENT '邮箱',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '用户状态  1 正常  2 禁止',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `last_login_time` datetime DEFAULT NULL COMMENT '最后登陆时间',
  `last_login_ip` varchar(50) DEFAULT '' COMMENT '最后登录IP',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of sm_user
-- ----------------------------
INSERT INTO `sm_user` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '', 'whnde@qq.com', '1', '2017-09-20 07:01:19', '2018-01-12 09:49:58', '101.80.103.37');
INSERT INTO `sm_user` VALUES ('97', 'test123', 'e10adc3949ba59abbe56e057f20f883e', '', 'admin@qq.com', '1', '2018-01-09 04:34:44', '2018-01-09 04:35:00', '119.96.112.97');
INSERT INTO `sm_user` VALUES ('98', 'yyy111', 'e10adc3949ba59abbe56e057f20f883e', '', '111111@qq.com', '1', '2018-01-10 05:21:32', '2018-01-10 05:22:53', '115.206.125.139');
INSERT INTO `sm_user` VALUES ('96', '123123', '4297f44b13955235245b2497399d7a93', '', '123123@123.com', '1', '2018-01-09 03:17:02', '2018-01-09 11:16:33', '222.188.41.89');
INSERT INTO `sm_user` VALUES ('99', 'admins', '256e718e8ce80acf09081508b1a2520c', '', 'test@test.com', '1', '2018-01-10 06:42:34', null, '0.0.0.0');
