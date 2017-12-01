/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : yajie

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-12-01 10:57:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for clt_product
-- ----------------------------
DROP TABLE IF EXISTS `clt_product`;
CREATE TABLE `clt_product` (
  `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL COMMENT '顾客ID',
  `model_vip_code` varchar(255) NOT NULL COMMENT '产品身份证号',
  `model` char(100) NOT NULL COMMENT '产品型号',
  `barcode` char(100) NOT NULL COMMENT '激活码',
  `sale_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sale_oulets` char(100) NOT NULL COMMENT '销售网点',
  `cust_tel` char(100) NOT NULL COMMENT '客户电话',
  `cust_name` char(100) NOT NULL COMMENT '客户姓名',
  `cust_addr` varchar(255) NOT NULL,
  `province` char(100) NOT NULL,
  `city` char(100) NOT NULL,
  `zone` char(100) NOT NULL,
  `mater` char(100) NOT NULL,
  `direct` char(100) NOT NULL,
  `setup_op` char(100) NOT NULL,
  `stick` char(5) DEFAULT NULL COMMENT '带天地钩？布尔值',
  `sample` char(5) DEFAULT NULL COMMENT '样品锁？布尔值',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:未申请报修，1:已申请报修，-1:不在保修期内',
  `add_time` timestamp NOT NULL,
  `sid` varchar(255) NOT NULL DEFAULT '' COMMENT '客户编号',
  `phone` varchar(255) DEFAULT NULL COMMENT '店长电话1',
  `phone2` varchar(255) DEFAULT NULL COMMENT '店长电话2',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of clt_product
-- ----------------------------
INSERT INTO `clt_product` VALUES ('00000000002', '1', '174FD893', 'AJ1021-03A-KJ', '99646343', '2017-11-20 09:44:14', '雅洁', '18857115777', '陈姐', '赞成良渚8-1', '31', '383', '3236', '木门', '左内开', '龙', '', '', '1', '0000-00-00 00:00:00', '', null, null);
INSERT INTO `clt_product` VALUES ('00000000004', '1', '9C543D96', 'AJ1021-03A-KJ0', '30256781', '2017-11-27 16:29:58', '雅洁总公司', '13923211553', '潘院长', '季华七路二号怡翠玫瑰园六座1603房', '6', '80', '746', '木门', '左内开', '陈赵国', '', '', '0', '0000-00-00 00:00:00', '', null, null);
INSERT INTO `clt_product` VALUES ('00000000005', '1', '00BBD4CB', 'J1021-03', '23273216', '2017-11-29 18:28:20', '宁波新铭佳', '13736004209', '王燕萍', '春江花城', '31', '388', '3280', '钢门', '左外开', '张礼涛', '', '', '1', '0000-00-00 00:00:00', 'A015', '0574-87891219', '13906683996');
