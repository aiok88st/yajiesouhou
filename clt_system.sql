/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : yajie

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-11-20 20:19:55
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for clt_system
-- ----------------------------
DROP TABLE IF EXISTS `clt_system`;
CREATE TABLE `clt_system` (
  `id` int(36) unsigned NOT NULL,
  `tel` varchar(15) DEFAULT NULL COMMENT '公司电话',
  `guangyu` text NOT NULL,
  `agree` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of clt_system
-- ----------------------------
INSERT INTO `clt_system` VALUES ('1', '10086', '<p><span style=\"color: rgb(34, 34, 34); font-family: Consolas, &quot;Lucida Console&quot;, &quot;Courier New&quot;, monospace; font-size: 12px; white-space: pre-wrap; background-color: rgb(255, 255, 255);\">广东雅洁五金有限公司，始创于1990年，坐落风景秀丽、经济发达的珠江三角洲腹心——佛山市南海区大沥长虹岭工业园，占地面积达200亩。主要生产建筑门锁、五金、门用五金和家具五金四大类产品，涵盖插芯门锁、玻璃门锁、智能门锁、铜锁、工程用锁、卫浴挂件、卫生间附件、门用功能五金、玻璃五金、闭门器、地弹簧、工程配套五金、家具锁、小拉手、滑轨和抽屉、铰链及连接件等共 2000多个品种，150多种专利产品。</span></p>', '<p><span style=\"color: rgb(34, 34, 34); font-family: Consolas, &quot;Lucida Console&quot;, &quot;Courier New&quot;, monospace; font-size: 12px; white-space: pre-wrap; background-color: rgb(255, 255, 255);\">广东雅洁五金有限公司，始创于1990年，坐落风景秀丽、经济发达的珠江三角洲腹心——佛山市南海区大沥长虹岭工业园，占地面积达200亩。主要生产建筑门锁、五金、门用五金和家具五金四大类产品，涵盖插芯门锁、玻璃门锁、智能门锁、铜锁、工程用锁、卫浴挂件、卫生间附件、门用功能五金、玻璃五金、闭门器、地弹簧、工程配套五金、家具锁、小拉手、滑轨和抽屉、铰链及连接件等共 2000多个品种，150多种专利产品。</span></p>');
