/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : ci

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2016-04-08 19:00:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `books`
-- ----------------------------
DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(60) NOT NULL DEFAULT '' COMMENT '书名',
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '简介',
  `category` int(11) NOT NULL DEFAULT '0' COMMENT '分类id',
  `status` tinyint(10) NOT NULL DEFAULT '1' COMMENT '状态 1-可用，2-借出，3-下架',
  `location` varchar(60) NOT NULL DEFAULT '' COMMENT '图书位置',
  `borrow_num` int(11) NOT NULL DEFAULT '0' COMMENT '借出次数',
  `create_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='图书表';

-- ----------------------------
-- Records of books
-- ----------------------------
INSERT INTO `books` VALUES ('1', '书1', '书1简介', '1', '1', '301室F1书架', '0', '0000-00-00 00:00:00');
INSERT INTO `books` VALUES ('2', '书2', '书2简介', '2', '1', '302室F2书架', '0', '0000-00-00 00:00:00');
INSERT INTO `books` VALUES ('3', '书3', '书3简介', '2', '1', '123123撒地方', '0', '2016-04-07 15:51:32');

-- ----------------------------
-- Table structure for `book_borrow`
-- ----------------------------
DROP TABLE IF EXISTS `book_borrow`;
CREATE TABLE `book_borrow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
  `book_id` int(11) NOT NULL DEFAULT '0' COMMENT '图书id',
  `create_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间-借书时间',
  `expect_back_time` date NOT NULL DEFAULT '0000-00-00' COMMENT '约定归还时间',
  `back_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '归还时间',
  `borrow_status` tinyint(10) NOT NULL DEFAULT '1' COMMENT '状态 1-借出，2-归还，3-丢失',
  `admin_id` int(11) NOT NULL DEFAULT '0' COMMENT '管理员id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='借阅关系表';

-- ----------------------------
-- Records of book_borrow
-- ----------------------------
INSERT INTO `book_borrow` VALUES ('5', '1', '1', '2016-04-08 17:10:46', '2016-04-09', '2016-04-08 17:23:06', '2', '1');

-- ----------------------------
-- Table structure for `book_category`
-- ----------------------------
DROP TABLE IF EXISTS `book_category`;
CREATE TABLE `book_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(60) NOT NULL DEFAULT '' COMMENT '分类名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='图书分类表';

-- ----------------------------
-- Records of book_category
-- ----------------------------
INSERT INTO `book_category` VALUES ('1', '文学');
INSERT INTO `book_category` VALUES ('2', '经济');
INSERT INTO `book_category` VALUES ('3', '测试新增1');

-- ----------------------------
-- Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('1', '1', '123', 'asdf');
INSERT INTO `news` VALUES ('2', '2', '333', 'fgdf');
INSERT INTO `news` VALUES ('3', '3', '444', 'fgfgb');

-- ----------------------------
-- Table structure for `user_info`
-- ----------------------------
DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `password` varchar(255) NOT NULL DEFAULT '' COMMENT '密码',
  `email` varchar(255) NOT NULL DEFAULT '' COMMENT '邮箱',
  `status` smallint(6) NOT NULL DEFAULT '1' COMMENT '状态：1-启用，0-禁用，-1-删除',
  `createtime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `updatetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间',
  `student_code` varchar(50) NOT NULL DEFAULT '0' COMMENT '学号',
  `user_type` tinyint(10) NOT NULL DEFAULT '2' COMMENT '用户类型：1-管理员，2-学生',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of user_info
-- ----------------------------
INSERT INTO `user_info` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12', '1');
