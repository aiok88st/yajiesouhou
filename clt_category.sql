/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : yajie

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-11-20 21:12:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for clt_category
-- ----------------------------
DROP TABLE IF EXISTS `clt_category`;
CREATE TABLE `clt_category` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `catname` varchar(255) NOT NULL DEFAULT '',
  `catdir` varchar(30) NOT NULL DEFAULT '',
  `parentdir` varchar(50) NOT NULL DEFAULT '',
  `parentid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `moduleid` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `module` char(24) NOT NULL DEFAULT '',
  `arrparentid` varchar(100) NOT NULL DEFAULT '',
  `arrchildid` varchar(100) NOT NULL DEFAULT '',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `title` varchar(150) NOT NULL DEFAULT '',
  `keywords` varchar(200) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `listorder` smallint(5) unsigned NOT NULL DEFAULT '0',
  `ishtml` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ismenu` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `image` varchar(100) NOT NULL DEFAULT '',
  `child` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `url` varchar(100) NOT NULL DEFAULT '',
  `template_list` varchar(20) NOT NULL DEFAULT '',
  `template_show` varchar(20) NOT NULL DEFAULT '',
  `pagesize` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `readgroup` varchar(100) NOT NULL DEFAULT '',
  `listtype` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `lang` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1：PC中文，2：pc英文，3：手机中文，4：手机英文',
  PRIMARY KEY (`id`),
  KEY `parentid` (`parentid`),
  KEY `listorder` (`listorder`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of clt_category
-- ----------------------------
INSERT INTO `clt_category` VALUES ('1', '视频分类', 'video_type', '', '0', '19', 'video', '0', '1,3,18,19,20,21,8,22,23,24,25', '0', '视频分类', '视频分类', '视频分类', '0', '0', '1', '0', '', '0', '', '', '', '0', '1,2', '0', '1');
INSERT INTO `clt_category` VALUES ('3', '维修', 'v1', 'video_type/', '1', '19', 'video', '0,1', '3,18,19,20,21', '0', '维修', '维修', '维修', '0', '0', '1', '0', '', '0', '', '', '', '0', '1,2', '0', '1');
INSERT INTO `clt_category` VALUES ('4', '文章分类', 'article', '', '0', '2', 'article', '0', '4,5,7,9,10,6,11,12,13,14,15,16,17', '0', '文章分类', '文章分类', '文章分类', '0', '0', '1', '0', '', '0', '', '', '', '0', '1,2', '0', '1');
INSERT INTO `clt_category` VALUES ('5', '智能门锁', 'a1', 'article/', '4', '2', 'article', '0,4', '5,7,9,10', '0', '智能门锁', '智能门锁', '智能门锁', '0', '0', '1', '0', '', '0', '', '', '', '0', '1,2', '0', '1');
INSERT INTO `clt_category` VALUES ('6', '机械门锁', 'a2', 'article/', '4', '2', 'article', '0,4', '6,11,12,13', '0', '机械门锁', '机械门锁', '机械门锁', '0', '0', '1', '0', '', '0', '', '', '', '0', '1,2', '0', '1');
INSERT INTO `clt_category` VALUES ('7', '智能指纹锁', 'a11', 'article/a1/', '5', '2', 'article', '0,4,5', '7', '0', '智能指纹锁', '智能指纹锁', '智能指纹锁', '0', '0', '1', '0', '', '0', '', '', '', '0', '1,2', '0', '1');
INSERT INTO `clt_category` VALUES ('8', '安装', 'v2', 'video_type/', '1', '19', 'video', '0,1', '8,22,23,24,25', '0', '安装', '安装', '安装', '0', '0', '1', '0', '', '0', '', '', '', '0', '1,2', '0', '1');
INSERT INTO `clt_category` VALUES ('9', '快捷系列', 'a12', 'article/a1/', '5', '2', 'article', '0,4,5', '9', '0', '快捷系列', '快捷系列', '快捷系列', '0', '0', '1', '0', '', '0', '', '', '', '0', '1,2', '0', '1');
INSERT INTO `clt_category` VALUES ('10', '智能公寓锁', 'a13', 'article/a1/', '5', '2', 'article', '0,4,5', '10', '0', '智能公寓锁', '智能公寓锁', '智能公寓锁', '0', '0', '1', '0', '', '0', '', '', '', '0', '1,2', '0', '1');
INSERT INTO `clt_category` VALUES ('11', '智能指纹锁', 'b1', 'article/a2/', '6', '2', 'article', '0,4,6', '11', '0', '智能指纹锁', '智能指纹锁', '智能指纹锁', '0', '0', '1', '0', '', '0', '', '', '', '0', '1,2', '0', '1');
INSERT INTO `clt_category` VALUES ('12', '快捷系列', 'b2', 'article/a2/', '6', '2', 'article', '0,4,6', '12', '0', '快捷系列', '快捷系列', '快捷系列', '0', '0', '1', '0', '', '0', '', '', '', '0', '1,2', '0', '1');
INSERT INTO `clt_category` VALUES ('13', '智能公寓锁', 'b3', 'article/a2/', '6', '2', 'article', '0,4,6', '13', '0', '智能公寓锁', '智能公寓锁', '智能公寓锁', '0', '0', '1', '0', '', '0', '', '', '', '0', '1,2', '0', '1');
INSERT INTO `clt_category` VALUES ('14', '其他', 'c1', 'article/', '4', '2', 'article', '0,4', '14,15,16,17', '0', '其他', '其他其他', '其他', '0', '0', '1', '0', '', '0', '', '', '', '0', '1,2', '0', '1');
INSERT INTO `clt_category` VALUES ('15', '智能指纹锁', 'c1', 'article/c1/', '14', '2', 'article', '0,4,14', '15', '0', '智能指纹锁', '智能指纹锁', '智能指纹锁', '0', '0', '1', '0', '', '0', '', '', '', '0', '1,2', '0', '1');
INSERT INTO `clt_category` VALUES ('16', '快捷系列', 'c2', 'article/c1/', '14', '2', 'article', '0,4,14', '16', '0', '快捷系列', '快捷系列', '快捷系列', '0', '0', '1', '0', '', '0', '', '', '', '0', '1,2', '0', '1');
INSERT INTO `clt_category` VALUES ('17', '智能公寓锁', 'c3', 'article/c1/', '14', '2', 'article', '0,4,14', '17', '0', '智能公寓锁', '智能公寓锁', '智能公寓锁', '0', '0', '1', '0', '', '0', '', '', '', '0', '1,2', '0', '1');
INSERT INTO `clt_category` VALUES ('18', '智能门锁', 'x1', 'video_type/v1/', '3', '19', 'video', '0,1,3', '18', '0', '智能门锁', '智能门锁', '智能门锁', '0', '0', '1', '0', '', '0', '', '', '', '0', '1,2', '0', '1');
INSERT INTO `clt_category` VALUES ('19', '机械门锁', 'x2', 'video_type/v1/', '3', '19', 'video', '0,1,3', '19', '0', '机械门锁', '机械门锁', '机械门锁', '0', '0', '1', '0', '', '0', '', '', '', '0', '1,2', '0', '1');
INSERT INTO `clt_category` VALUES ('20', '指纹锁', 'x3', 'video_type/v1/', '3', '19', 'video', '0,1,3', '20', '0', '指纹锁', '指纹锁', '指纹锁', '0', '0', '1', '0', '', '0', '', '', '', '0', '1,2', '0', '1');
INSERT INTO `clt_category` VALUES ('21', '其他', 'x4', 'video_type/v1/', '3', '19', 'video', '0,1,3', '21', '0', '其他', '其他', '其他', '0', '0', '1', '0', '', '0', '', '', '', '0', '1,2', '0', '1');
INSERT INTO `clt_category` VALUES ('22', '智能门锁', 'z1', 'video_type/v2/', '8', '19', 'video', '0,1,8', '22', '0', '智能门锁', '智能门锁', '智能门锁', '0', '0', '1', '0', '', '0', '', '', '', '0', '1,2', '0', '1');
INSERT INTO `clt_category` VALUES ('23', '机械门锁', 'z2', 'video_type/v2/', '8', '19', 'video', '0,1,8', '23', '0', '机械门锁', '机械门锁', '机械门锁', '0', '0', '1', '0', '', '0', '', '', '', '0', '1,2', '0', '1');
INSERT INTO `clt_category` VALUES ('24', '指纹锁', 'z3', 'video_type/v2/', '8', '19', 'video', '0,1,8', '24', '0', '指纹锁', '指纹锁', '指纹锁', '0', '0', '1', '0', '', '0', '', '', '', '0', '1,2', '0', '1');
INSERT INTO `clt_category` VALUES ('25', '其他', 'z4', 'video_type/v2/', '8', '19', 'video', '0,1,8', '25', '0', '其他', '其他', '其他', '0', '0', '1', '0', '', '0', '', '', '', '0', '1,2', '0', '1');
INSERT INTO `clt_category` VALUES ('26', '培训视频资料分类', 'p1', '', '0', '23', 'tvd', '0', '26,27,28', '0', '培训视频资料分类', '培训视频资料分类', '培训视频资料分类', '0', '0', '1', '0', '', '0', '', '', '', '0', '1,2', '0', '1');
INSERT INTO `clt_category` VALUES ('27', '教学视频', 'p2', 'p1/', '26', '23', 'tvd', '0,26', '27', '0', '教学视频', '教学视频', '教学视频', '0', '0', '1', '0', '', '0', '', '', '', '0', '1,2', '0', '1');
INSERT INTO `clt_category` VALUES ('28', '视频小知识', 'p3', 'p1/', '26', '23', 'tvd', '0,26', '28', '0', '视频小知识', '视频小知识', '视频小知识', '0', '0', '1', '0', '', '0', '', '', '', '0', '1,2', '0', '1');
INSERT INTO `clt_category` VALUES ('29', '教学视频1', 'j1', 'p1/p2/', '27', '23', 'tvd', '0,26,27', '29', '0', '教学视频1', '教学视频1', '教学视频1', '0', '0', '1', '0', '', '0', '', '', '', '0', '1,2', '0', '1');
